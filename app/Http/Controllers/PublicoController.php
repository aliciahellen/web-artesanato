<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artesao;
use App\TipoArtesanato;
use App\FinalidadeProducao;
use App\TecnicaProducao;
use App\Http\Requests\ArtesaoRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Imagem;
use App\Helpers\Helper;

class PublicoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index()
    {
        $artesaos = Artesao::with(['imagens'])->paginate(10);
        $tipos_artesanato = TipoArtesanato::all();
        $finalidades_producao = FinalidadeProducao::all();
        $tecnicas_producao = TecnicaProducao::all();
        return view('publico.home', compact('artesaos', 'tipos_artesanato', 'finalidades_producao', 'tecnicas_producao'));
    }

    public function view($id)
    {
        $artesao = Artesao::where('id', '=', $id)->with(['tipos_artesanato', 'finalidades_producao', 'tecnicas_producao', 'imagens'])->first();
        return view('publico.view', compact('artesao'));
    }

    public function addGet()
    {
        $tipos_artesanato = TipoArtesanato::all();
        $finalidades_producao = FinalidadeProducao::all();
        $tecnicas_producao = TecnicaProducao::all();
        return view('admin.artesao.add', compact('tipos_artesanato', 'finalidades_producao', 'tecnicas_producao'));
    }

    public function addPost(ArtesaoRequest $request)
    {
        $sucesso = false;
        DB::beginTransaction();
        try {
            $artesao = Artesao::create($request->only([
                'nome', 'endereco', 'telefone', 'email', 'descricao',
            ]));
            if ($artesao->id) {
                $artesao->tipos_artesanato()->sync($request->input('tipos_artesanato'));
                $artesao->finalidades_producao()->sync($request->input('finalidades_producao'));
                $artesao->tecnicas_producao()->sync($request->input('tecnicas_producao'));
                $imagens = $request->input('imagens');
                if(!empty($imagens)){
                    foreach ($imagens as $imagem) {
                        $imagem['artesao_id'] = $artesao->id;
                        $artesao->imagens()->save(new Imagem($imagem));
                    }
                }    
                $sucesso = true;
            }
        } catch (\Exception $e) {

        }
        if ($sucesso) {
            DB::commit();
            return redirect()->route('artesao.index.get')->with('sucesso', 'Artesão Cadastrado com Sucesso!');
        } else {
            DB::rollback();
            return Redirect::back()->with('erro','Erro ao Cadastrar Artesão!');
        }
    }

    public function viewGet($id)
    {
        $artesao = Artesao::where('id', '=', $id)->with(['tipos_artesanato', 'finalidades_producao', 'tecnicas_producao', 'imagens'])->first();
        if(isset($artesao->id)){
            $tipos_artesanato = TipoArtesanato::all();
            $finalidades_producao = FinalidadeProducao::all();
            $tecnicas_producao = TecnicaProducao::all();
            return view('admin.artesao.view', compact('artesao', 'tipos_artesanato', 'finalidades_producao', 'tecnicas_producao'));
        }else{
            return redirect()->route('artesao.index.get')->with('erro', 'Artesão Inválido!');
        }
    }

    public function editGet($id)
    {
        $artesao = Artesao::where('id', '=', $id)->with(['tipos_artesanato', 'finalidades_producao', 'tecnicas_producao', 'imagens'])->first();
        if(isset($artesao->id)){
            $tipos_artesanato = TipoArtesanato::all();
            $finalidades_producao = FinalidadeProducao::all();
            $tecnicas_producao = TecnicaProducao::all();
            return view('admin.artesao.edit', compact('artesao', 'tipos_artesanato', 'finalidades_producao', 'tecnicas_producao'));
        }else{
            return redirect()->route('artesao.index.get')->with('erro', 'Artesão Inválido!');
        }
    }

    public function editPost(ArtesaoRequest $request)
    {
        $artesao = Artesao::find($request->id);
        $sucesso = false;
        DB::beginTransaction();
        try {
            if ($artesao->id) {
                $artesao->update($request->only([
                    'nome', 'endereco', 'telefone', 'email', 'descricao',
                ]));
                $artesao->tipos_artesanato()->sync($request->input('tipos_artesanato'));
                $artesao->finalidades_producao()->sync($request->input('finalidades_producao'));
                $artesao->tecnicas_producao()->sync($request->input('tecnicas_producao'));
                $imagens = Helper::remove_empty_itens_array($request->input('imagens'), true);
                $artesao->imagens()->delete();
                if(!empty($imagens)){
                    foreach ($imagens as $key => $imagem) {
                        $imagens[$key]['artesao_id'] = $artesao->id;
                        $imagens[$key] = new Imagem($imagens[$key]);
                    }
                    $artesao->imagens()->saveMany($imagens);
                }
                $sucesso = true;
            }
        } catch (\Exception $e) {

        }
        if ($sucesso) {
            DB::commit();
            return redirect()->route('artesao.view.get', $artesao->id)->with('sucesso', 'Artesão Atualizado com Sucesso!');
        } else {
            DB::rollback();
            return Redirect::back()->with('erro','Erro ao Atualizar Artesão!');
        }       
    }

    public function delete($id)
    {
        Artesao::destroy($id);
        return redirect()->route('artesao.index.get')->with('sucesso', 'Artesão Excluído com Sucesso!');
    }

    public function apiArtesaosGet()
    {
        $artesaos = Artesao::with(['tipos_artesanato', 'finalidades_producao', 'tecnicas_producao', 'imagens'])->paginate(10)->toArray();
        return response()->json($artesaos, 200, array('Content-Type' => 'application/json; charset=utf-8'), JSON_UNESCAPED_UNICODE);
    }
    
    public function apiArtesaoGet($id)
    {
        $artesao = Artesao::where('id', '=', $id)->with(['tipos_artesanato', 'finalidades_producao', 'tecnicas_producao', 'imagens'])->get()->toArray();
        return response()->json($artesao, 200, array('Content-Type' => 'application/json; charset=utf-8'), JSON_UNESCAPED_UNICODE);
    }

    public function getSearch(){
        return redirect()->route('index.get');
    }

    public function postSearch(Request $request, Artesao $artesaos){
        $filtrar = false;
        $artesaos = $artesaos->newQuery();
        if ($request->has('nome') && !empty($request->nome)) {
            $artesaos->where('nome', 'LIKE', '%'.$request->nome.'%');
            $filtrar = true;
        }
        if ($request->has('tipos_artesanato')) {
            $artesaos->where(function ($query) use ($request) {
                $query->whereHas('tipos_artesanato', function ($query) use ($request) {
                    $query->whereIn(TipoArtesanato::getTableName().'.id', $request->tipos_artesanato);                   
                });
            });
            $filtrar = true;
        }
        if ($request->has('finalidades_producao')) {
            $artesaos->where(function ($query) use ($request) {
                $query->whereHas('finalidades_producao', function ($query) use ($request) {
                    $query->whereIn(FinalidadeProducao::getTableName().'.id', $request->finalidades_producao);                   
                });
            });
            $filtrar = true;
        }
        if ($request->has('tecnicas_producao')) {
            $artesaos->where(function ($query) use ($request) {
                $query->whereHas('tecnicas_producao', function ($query) use ($request) {
                    $query->whereIn(TecnicaProducao::getTableName().'.id', $request->tecnicas_producao);                   
                });
            });
            $filtrar = true;
        }
        $tipos_artesanato = TipoArtesanato::all();
        $finalidades_producao = FinalidadeProducao::all();
        $tecnicas_producao = TecnicaProducao::all();    
        $artesaos = $artesaos->with(['tipos_artesanato', 'finalidades_producao', 'tecnicas_producao', 'imagens'])->paginate(10);
        if($filtrar == true){
            return view('publico.home', compact('artesaos', 'tipos_artesanato', 'finalidades_producao', 'tecnicas_producao', 'filtrar'));
        }
        return view('publico.home', compact([], 'tipos_artesanato', 'finalidades_producao', 'tecnicas_producao', 'filtrar'));
    }
}