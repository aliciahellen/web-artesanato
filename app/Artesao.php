<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artesao extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tb_artesao';
	
    public $timestamps = false;
    
    protected $fillable = [
        'id', 'nome', 'endereco', 'telefone', 'email', 'loc_latitude', 'loc_longitude', 'descricao', 'tipos_artesanato', 'finalidades_producao', 'tecnicas_producao', 'imagens'
    ];

    protected $visible = [
        'id', 'nome', 'endereco', 'telefone', 'email', 'loc_latitude', 'loc_longitude', 'descricao', 'tipos_artesanato', 'finalidades_producao', 'tecnicas_producao', 'imagens'
    ];

    public static function getTableName(){
        return (new Artesao())->getTable();
    }

    public function tipos_artesanato()
    {
        $tb_nome = TipoArtesanato::getTableName();
        return $this->belongsToMany(TipoArtesanato::class, 'tb_artesao_tipo_artesanato')->select([$tb_nome.'.id', $tb_nome.'.nome', $tb_nome.'.cod']);
    }

    public function finalidades_producao()
    {
        $tb_nome = FinalidadeProducao::getTableName();
        return $this->belongsToMany(FinalidadeProducao::class, 'tb_artesao_finalidade_producao')->select([$tb_nome.'.id', $tb_nome.'.nome', $tb_nome.'.cod']);
    }

    public function tecnicas_producao()
    {
        $tb_nome = TecnicaProducao::getTableName();
        return $this->belongsToMany(TecnicaProducao::class, 'tb_artesao_tecnica_producao')->select([$tb_nome.'.id', $tb_nome.'.nome', $tb_nome.'.cod']);
    }

    public function imagens()
    {
        $tb_nome = Imagem2::getTableName();
        return $this->hasMany(Imagem2::class);
    }
}
