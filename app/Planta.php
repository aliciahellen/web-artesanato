<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use function Opis\Closure\unserialize;

class Planta extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tb_planta';
	
	public $timestamps = false;
	
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'nome_popular', 'nome_cientifico', 'autoria', 'e_panc', 'ep_floracao_inicio', 'ep_floracao_fim', 'biomas', 'grau_ameaca_iucn', 'descricao', 'dist_geografica', 'imagens'
    ];

    protected $visible = [
        'id', 'nome_popular', 'nome_cientifico', 'autoria', 'e_panc', 'ep_floracao_inicio', 'ep_floracao_fim', 'biomas', 'grau_ameaca_iucn', 'descricao', 'dist_geografica', 'imagens'
    ];

    private static $iucn_itens = [
        'ex' => 'Extinto (EX)',
        'ew' => 'Extinto na natureza (EW)',
        'cr' => 'Em perigo crítico (CR)',
        'en' => 'Em perigo (EN)',
        'vu' => 'Vulnerável (VU)',
        'nt' => 'Quase ameaçada (NT)',
        'lc' => 'Segura ou pouco preocupante (LC)',
        'ne' => 'Espécie não avaliada quanto à ameaça (NE)',
    ];

    public static function lista_iucn($item = null){
        if (!$item || !array_key_exists($item, static::$iucn_itens)){
            return static::$iucn_itens;
        }
        return static::$iucn_itens[$item];
    }

    private static $meses = [
        'jan' => 'Janeiro', 'fev' => 'Fevereiro', 'mar' => 'Março', 'abr' => 'Abril',
        'mai' => 'Maio', 'jun' => 'Junho', 'jul' => 'Julho', 'ago' => 'Agosto',
        'set' => 'Setembro', 'out' => 'Outubro', 'nov' => 'Novembro', 'dez' => 'Dezembro'
    ];

    public static function lista_meses($mes = null){
        if (!$mes || !array_key_exists($mes, static::$meses)){
            return static::$meses;
        }
        return static::$meses[$mes];
    }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [

    ];


    // having this mutator
    //public function setImagensAttribute($value){
    //    $this->imagens = $value;
    //}
    
    public function imagens()
    {
        //return $this->hasMany(Imagem::class, 'planta_id', 'id');
        return $this->hasMany(Imagem::class);
    }

    public function biomas()
    {
        return $this->belongsToMany(Bioma::class, 'tb_planta_bioma');
    }

    public function dist_geografica()
    {
        return $this->belongsToMany(Estado::class, 'tb_planta_dist_geografica');
    }
}