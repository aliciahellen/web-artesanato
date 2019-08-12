<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipoArtesanato;
use App\FinalidadeProducao;
use App\TecnicaProducao;
use App\Artesao;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $qtd = [
            'artesaos' => Artesao::count(),
            'tiposArtesanato' => TipoArtesanato::count(),
            'finalidadesProducao' => FinalidadeProducao::count(),
            'tecnicasProducao' => TecnicaProducao::count(),
        ];
        return view('home', compact('qtd'));
    }
}
