<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
//use Illuminate\Validation\Rule;
//use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ArtesaoRequest extends FormRequest
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        
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
            'nome' => 'required|max:255',
            'endereco' => 'required|max:255',
            'telefone' => 'max:11',
            'email' => 'email',
            'descricao'  => 'required',
            'tipos_artesanato'  => 'required|array|min:1',
            'tipos_artesanato.*'  => 'integer',
            'finalidades_producao'  => 'required|array|min:1',
            'finalidades_producao.*'  => 'integer',
            'tecnicas_producao'  => 'required|array|min:1',
            'tecnicas_producao.*'  => 'integer',
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
            'nome' => 'Nome',
            'endereco' => 'Endereço',
            'telefone' => 'Telefone',
            'email' => 'E-mail',
            'tipos_artesanato'  => 'Tipos de Artesanato',
            'finalidades_producao'  => 'Finalidades da Producao',
            'tecnicas_producao'  => 'Técnicas de Producao',
            'imagens'  => 'Imagens',
        ];
    }

    
}
