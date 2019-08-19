<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FinalidadeProducao extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tb_finalidade_producao';
	
    public $timestamps = true;

    const CREATED_AT = 'dthr_cadastro';
    const UPDATED_AT = 'dthr_alteracao';
    
    protected $fillable = [
        'id', 'nome', 'cod', 'descricao', 'artesaos'
    ];

    protected $visible = [
        'id', 'nome', 'cod', 'descricao', 'artesaos'
    ];

    public function artesaos()
    {
        return $this->belongsToMany(Artesao::class, 'tb_artesao_finalidade_producao');
    }
    
    public static function getTableName(){
        return (new FinalidadeProducao())->getTable();
    }
}
