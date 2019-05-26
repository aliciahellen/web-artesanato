<?php

use Illuminate\Database\Seeder;
use App\Artesao;
use App\TipoArtesanato;
use App\FinalidadeProducao;
use App\TecnicaProducao;
use App\Imagem2;

class ArtesaoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $artesao = Artesao::create(
            [
                'nome' => 'Nome do Artesão 1',
                'endereco' => 'Endereço do Artesão 1',
                'telefone' => '67999996789',
                'endereco' => 'Endereço Completo do Artesão 1',
                'loc_latitude' => -19.0000933,
                'loc_longitude' => -57.6491193,
                'descricao' => 'Descrição do Artesão 1',
            ]
        );
        $artesao->tipos_artesanato()->attach(TipoArtesanato::whereIn('cod', ['arte_popular', 'contemp_conceitual', 'indigena'])->get('id')->pluck('id')->toArray());
        $artesao->finalidades_producao()->attach(FinalidadeProducao::whereIn('cod', ['utilitario', 'rel_mistico', 'decorativo', 'adorno_acess_vest'])->get('id')->pluck('id')->toArray());
        $artesao->tecnicas_producao()->attach(TecnicaProducao::whereIn('cod', ['fiacao', 'montagem'])->get('id')->pluck('id')->toArray());
        Imagem2::create(['url' => 'http://imagens3.jbrj.gov.br/fsi/server?type=image&source=/reflora/producao/imagens_de_campo/1275323.jpg&width=3072&height=2304', 'autor' => 'Renata C. Martins', 'fonte' => 'Sistema de Informação sobre a Biodiversidade Brasileira (SiBBr)', 'artesao_id' => $artesao->id]);
        Imagem2::create(['url' => 'http://imagens3.jbrj.gov.br/fsi/server?type=image&source=/reflora/producao/imagens_de_campo/1275324.jpg&width=3072&height=2304', 'autor' => 'Renata C. Martins', 'fonte' => 'Sistema de Informação sobre a Biodiversidade Brasileira (SiBBr)', 'artesao_id' => $artesao->id]);
		Imagem2::create(['url' => 'http://imagens3.jbrj.gov.br/fsi/server?type=image&source=/reflora/producao/imagens_de_campo/1275325.jpg&width=2304&height=3072', 'autor' => 'Renata C. Martins', 'fonte' => 'Sistema de Informação sobre a Biodiversidade Brasileira (SiBBr)', 'artesao_id' => $artesao->id]);
        Imagem2::create(['url' => 'http://imagens3.jbrj.gov.br/fsi/server?type=image&source=/reflora/producao/imagens_de_campo/1275326.jpg&width=3072&height=2304', 'autor' => 'Renata C. Martins', 'fonte' => 'Sistema de Informação sobre a Biodiversidade Brasileira (SiBBr)', 'artesao_id' => $artesao->id]);

        Artesao::create(
            [
                'nome' => 'Nome do Artesão 2',
                'endereco' => 'Endereço do Artesão 2',
                'telefone' => '67999996789',
                'endereco' => 'Endereço Completo do Artesão 2',
                'loc_latitude' => -19.0000933,
                'loc_longitude' => -57.6491193,
                'descricao' => 'Descrição do Artesão 2',
            ]
        );
        Artesao::create(
            [
                'nome' => 'Nome do Artesão 3',
                'endereco' => 'Endereço do Artesão 3',
                'telefone' => '67999996789',
                'endereco' => 'Endereço Completo do Artesão 3',
                'loc_latitude' => -19.0000933,
                'loc_longitude' => -57.6491193,
                'descricao' => 'Descrição do Artesão 3',
            ]
        );
    }
}
