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
                'nome' => 'Amor Peixe',
                'endereco' => 'Rua Dom Aquino, 405 - Centro, Corumbá - MS, 79302-040',
                'telefone' => '6732312715',
                'email' => 'fundacaodeculturadecorumba@gmail.com',
                'loc_latitude' => -19.0000933,
                'loc_longitude' => -57.6491193,
                'descricao' => 'Descrição do Artesão 1',
            ]
        );
        $artesao->tipos_artesanato()->attach(TipoArtesanato::whereIn('cod', ['arte_popular', 'contemp_conceitual', 'indigena'])->get('id')->pluck('id')->toArray());
        $artesao->finalidades_producao()->attach(FinalidadeProducao::whereIn('cod', ['utilitario', 'rel_mistico', 'decorativo', 'adorno_acess_vest'])->get('id')->pluck('id')->toArray());
        $artesao->tecnicas_producao()->attach(TecnicaProducao::whereIn('cod', ['fiacao', 'montagem'])->get('id')->pluck('id')->toArray());
        Imagem2::create(['url' => 'http://www.artesol.org.br/novo/app/webroot/files/uploads/ckfinder/images/IMG_4329.JPG', 'autor' => 'Renata Mendes', 'fonte' => 'Artesanato Solidário (Artesol)', 'artesao_id' => $artesao->id]);
        Imagem2::create(['url' => 'http://www.artesol.org.br//files/uploads/gallery_items/item_1407.jpg', 'autor' => 'Renata Mendes', 'fonte' => 'Artesanato Solidário (Artesol)', 'artesao_id' => $artesao->id]);
        Imagem2::create(['url' => 'http://www.artesol.org.br//files/uploads/gallery_items/item_1408.jpg', 'autor' => 'Renata Mendes', 'fonte' => 'Artesanato Solidário (Artesol)', 'artesao_id' => $artesao->id]);
        Imagem2::create(['url' => 'http://www.artesol.org.br//files/uploads/gallery_items/item_1409.jpg', 'autor' => 'Renata Mendes', 'fonte' => 'Artesanato Solidário (Artesol)', 'artesao_id' => $artesao->id]);
        Imagem2::create(['url' => 'http://www.artesol.org.br//files/uploads/gallery_items/item_1532.jpg', 'autor' => 'Renata Mendes', 'fonte' => 'Artesanato Solidário (Artesol)', 'artesao_id' => $artesao->id]);
        Imagem2::create(['url' => 'http://www.artesol.org.br//files/uploads/gallery_items/item_1533.jpg', 'autor' => 'Renata Mendes', 'fonte' => 'Artesanato Solidário (Artesol)', 'artesao_id' => $artesao->id]);

        Artesao::create(
            [
                'nome' => 'Nome do Artesão 2',
                'endereco' => 'Endereço do Artesão 2',
                'telefone' => '67999996789',
                'email' => 'email-artesao2@gmail.com',
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
                'email' => 'email-artesao3@gmail.com',
                'loc_latitude' => -19.0000933,
                'loc_longitude' => -57.6491193,
                'descricao' => 'Descrição do Artesão 3',
            ]
        );
    }
}
