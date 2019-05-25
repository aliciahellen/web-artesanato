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
	
    public $timestamps = false;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'url', 'autor', 'fonte', 'planta_id'
    ];

    protected $visible = [
        'id', 'url', 'autor', 'fonte', 'planta_id'
    ];

    public function planta()
    {
        //return $this->belongsTo(Planta::class, 'planta_id', 'id');
        return $this->belongsTo(Planta::class);
    }

}
