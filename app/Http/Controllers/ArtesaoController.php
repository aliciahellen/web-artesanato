<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artesao;
use App\TipoArtesanato;

class ArtesaoController extends Controller
{
    

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $artesaos =  Artesao::where('id', '=', 1)->with(['tipos_artesanato', 'finalidades_producao','tecnicas_producao', 'imagens'])->paginate(10);
        return response()->json($artesaos, 200, array('Content-Type' => 'application/json; charset=utf-8'), JSON_UNESCAPED_UNICODE);
        //return view('admin.planta.index', compact('plantas'));
    }

}
