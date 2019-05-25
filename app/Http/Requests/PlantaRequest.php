<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Planta;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PlantaRequest extends FormRequest
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        //print_r($request->all());
        //print_r(array_key_exists($request->get('grau_ameaca_iucn'), Planta::lista_iucn()));
        //exit;
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome_cientifico' => 'required|max:255',
            'nome_popular' => 'required|max:500',
            'autoria' => 'max:255',
            'e_panc' => 'required',
            'grau_ameaca_iucn' => [
                'required',
                Rule::in(array_keys(Planta::lista_iucn())),
            ],
            'ep_floracao_inicio' => [
                'required',
                Rule::in(array_keys(Planta::lista_meses())),
            ],
            'ep_floracao_fim' => [
                'required',
                Rule::in(array_keys(Planta::lista_meses())),
            ],
            'biomas'  => 'required|array|min:1',
            'biomas.*'  => 'integer',
            'dist_geografica' => 'required|array|min:1',
            'dist_geografica.*' => 'integer',
            'imagens'  => 'array',
		];
    }

    /**
     * Custom message for validation
     *
     * @return array
     */
    //public function messages(){
        //return [];
    //}

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'nome_cientifico' => 'Nome Científico',
            'nome_popular' => 'Nome Popular',
            'nome_cientifico' => 'Nome Científico',
            'autoria' => 'Autoria',
            'e_panc' => 'PANC',
            'ep_floracao_inicio' => 'Início da Floração',
            'ep_floracao_fim' => 'Fim da Floração',
            'dist_geografica' => 'Distribuição Geográfica',
            'grau_ameaca_iucn' => 'Grau de Ameaça IUCN',
            'biomas' => 'Biomas',
        ];
    }

    
}
