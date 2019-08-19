<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagem extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tb_imagem';
	
    public $timestamps = true;

    const CREATED_AT = 'dthr_cadastro';
    const UPDATED_AT = 'dthr_alteracao';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'url', 'autor', 'fonte', 'artesao_id'
    ];

    protected $visible = [
        'id', 'url', 'autor', 'fonte', 'artesao_id'
    ];

    public function artesao()
    {
        return $this->belongsTo(Artesao::class);
    }

    public static function getTableName(){
        return (new Imagem())->getTable();
    }
}
