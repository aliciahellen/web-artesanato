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
                'descricao' => 'Associação de artesãs que trabalham com o couro e escamas de peixe, produzindo brincos, colares, bolsas, cintos, entre outros produtos.',
            ]
        );
        $artesao->tipos_artesanato()->attach(TipoArtesanato::whereIn('cod', ['tradicional'])->get('id')->pluck('id')->toArray());
        $artesao->finalidades_producao()->attach(FinalidadeProducao::whereIn('cod', ['adorno_acess_vest', 'decorativo'])->get('id')->pluck('id')->toArray());
        $artesao->tecnicas_producao()->attach(TecnicaProducao::whereIn('cod', ['fiacao', 'montagem'])->get('id')->pluck('id')->toArray());
        Imagem2::create(['url' => 'http://www.artesol.org.br/novo/app/webroot/files/uploads/ckfinder/images/IMG_4329.JPG', 'autor' => 'Renata Mendes', 'fonte' => 'Artesanato Solidário (Artesol)', 'artesao_id' => $artesao->id]);
        Imagem2::create(['url' => 'http://www.artesol.org.br//files/uploads/gallery_items/item_1407.jpg', 'autor' => 'Renata Mendes', 'fonte' => 'Artesanato Solidário (Artesol)', 'artesao_id' => $artesao->id]);
        Imagem2::create(['url' => 'http://www.artesol.org.br//files/uploads/gallery_items/item_1408.jpg', 'autor' => 'Renata Mendes', 'fonte' => 'Artesanato Solidário (Artesol)', 'artesao_id' => $artesao->id]);
        Imagem2::create(['url' => 'http://www.artesol.org.br//files/uploads/gallery_items/item_1409.jpg', 'autor' => 'Renata Mendes', 'fonte' => 'Artesanato Solidário (Artesol)', 'artesao_id' => $artesao->id]);
        Imagem2::create(['url' => 'http://www.artesol.org.br//files/uploads/gallery_items/item_1532.jpg', 'autor' => 'Renata Mendes', 'fonte' => 'Artesanato Solidário (Artesol)', 'artesao_id' => $artesao->id]);
        Imagem2::create(['url' => 'http://www.artesol.org.br//files/uploads/gallery_items/item_1533.jpg', 'autor' => 'Renata Mendes', 'fonte' => 'Artesanato Solidário (Artesol)', 'artesao_id' => $artesao->id]);

        $artesao = Artesao::create(
            [
                'nome' => 'Angelino e Davi',
                'endereco' => 'Rua Dom Aquino, 405 - Centro, Corumbá - MS, 79302-040',
                'telefone' => '6732312715',
                'email' => 'fundacaodeculturadecorumba@gmail.com',
                'loc_latitude' => -19.0000933,
                'loc_longitude' => -57.6491193,
                'descricao' => 'Produção de peças de cestarias a partir da salsaparrilha e farinha de Bocaíuva.',
            ]
        );
        $artesao->tipos_artesanato()->attach(TipoArtesanato::whereIn('cod', ['tradicional'])->get('id')->pluck('id')->toArray());
        $artesao->finalidades_producao()->attach(FinalidadeProducao::whereIn('cod', ['decorativo', 'utilitario'])->get('id')->pluck('id')->toArray());
        $artesao->tecnicas_producao()->attach(TecnicaProducao::whereIn('cod', ['fiacao'])->get('id')->pluck('id')->toArray());
        Imagem2::create(['url' => 'http://www.artesol.org.br//files/uploads/gallery_items/item_1407.jpg', 'autor' => 'Renata Mendes', 'fonte' => 'Artesanato Solidário (Artesol)', 'artesao_id' => $artesao->id]);
        Imagem2::create(['url' => 'http://www.artesol.org.br//files/uploads/gallery_items/item_1407.jpg', 'autor' => 'Renata Mendes', 'fonte' => 'Artesanato Solidário (Artesol)', 'artesao_id' => $artesao->id]);
        Imagem2::create(['url' => 'http://www.artesol.org.br//files/uploads/gallery_items/item_1407.jpg', 'autor' => 'Renata Mendes', 'fonte' => 'Artesanato Solidário (Artesol)', 'artesao_id' => $artesao->id]);

        $artesao = Artesao::create(
            [
                'nome' => 'Catarina',
                'endereco' => 'Rua Dom Aquino, 405 - Centro, Corumbá - MS, 79302-040',
                'telefone' => '6732312715',
                'email' => 'fundacaodeculturadecorumba@gmail.com',
                'loc_latitude' => -19.0000933,
                'loc_longitude' => -57.6491193,
                'descricao' => 'Produção de itens de tapeçaria e decorativos com uso de fibras de aguapés.',
            ]
        );
        $artesao->tipos_artesanato()->attach(TipoArtesanato::whereIn('cod', ['tradicional'])->get('id')->pluck('id')->toArray());
        $artesao->finalidades_producao()->attach(FinalidadeProducao::whereIn('cod', ['decorativo', 'utilitario'])->get('id')->pluck('id')->toArray());
        $artesao->tecnicas_producao()->attach(TecnicaProducao::whereIn('cod', ['fiacao'])->get('id')->pluck('id')->toArray());
        Imagem2::create(['url' => 'http://www.artesol.org.br//files/uploads/gallery_items/item_1407.jpg', 'autor' => 'Renata Mendes', 'fonte' => 'Artesanato Solidário (Artesol)', 'artesao_id' => $artesao->id]);
        Imagem2::create(['url' => 'http://www.artesol.org.br//files/uploads/gallery_items/item_1407.jpg', 'autor' => 'Renata Mendes', 'fonte' => 'Artesanato Solidário (Artesol)', 'artesao_id' => $artesao->id]);
        Imagem2::create(['url' => 'http://www.artesol.org.br//files/uploads/gallery_items/item_1407.jpg', 'autor' => 'Renata Mendes', 'fonte' => 'Artesanato Solidário (Artesol)', 'artesao_id' => $artesao->id]);

        $artesao = Artesao::create(
            [
                'nome' => 'Iza',
                'endereco' => 'Rua Dom Aquino, 405 - Centro, Corumbá - MS, 79302-040',
                'telefone' => '6732312715',
                'email' => 'fundacaodeculturadecorumba@gmail.com',
                'loc_latitude' => -19.0000933,
                'loc_longitude' => -57.6491193,
                'descricao' => 'Produção de itens de tapeçaria e decorativos com uso de fibras de aguapés.',
            ]
        );
        $artesao->tipos_artesanato()->attach(TipoArtesanato::whereIn('cod', ['tradicional'])->get('id')->pluck('id')->toArray());
        $artesao->finalidades_producao()->attach(FinalidadeProducao::whereIn('cod', ['decorativo'])->get('id')->pluck('id')->toArray());
        $artesao->tecnicas_producao()->attach(TecnicaProducao::whereIn('cod', ['fiacao'])->get('id')->pluck('id')->toArray());
        Imagem2::create(['url' => 'http://www.artesol.org.br//files/uploads/gallery_items/item_1407.jpg', 'autor' => 'Renata Mendes', 'fonte' => 'Artesanato Solidário (Artesol)', 'artesao_id' => $artesao->id]);
        Imagem2::create(['url' => 'http://www.artesol.org.br//files/uploads/gallery_items/item_1407.jpg', 'autor' => 'Renata Mendes', 'fonte' => 'Artesanato Solidário (Artesol)', 'artesao_id' => $artesao->id]);
        Imagem2::create(['url' => 'http://www.artesol.org.br//files/uploads/gallery_items/item_1407.jpg', 'autor' => 'Renata Mendes', 'fonte' => 'Artesanato Solidário (Artesol)', 'artesao_id' => $artesao->id]);

        $artesao = Artesao::create(
            [
                'nome' => 'Mauro',
                'endereco' => 'Rua Dom Aquino, 405 - Centro, Corumbá - MS, 79302-040',
                'telefone' => '6732312715',
                'email' => 'fundacaodeculturadecorumba@gmail.com',
                'loc_latitude' => -19.0000933,
                'loc_longitude' => -57.6491193,
                'descricao' => 'Produção de peças artesanais de entalhe em madeira.',
            ]
        );
        $artesao->tipos_artesanato()->attach(TipoArtesanato::whereIn('cod', ['tradicional'])->get('id')->pluck('id')->toArray());
        $artesao->finalidades_producao()->attach(FinalidadeProducao::whereIn('cod', ['decorativo'])->get('id')->pluck('id')->toArray());
        $artesao->tecnicas_producao()->attach(TecnicaProducao::whereIn('cod', ['entalhe_madeira', 'marcenaria'])->get('id')->pluck('id')->toArray());
        Imagem2::create(['url' => 'http://www.artesol.org.br//files/uploads/gallery_items/item_1407.jpg', 'autor' => 'Renata Mendes', 'fonte' => 'Artesanato Solidário (Artesol)', 'artesao_id' => $artesao->id]);
        Imagem2::create(['url' => 'http://www.artesol.org.br//files/uploads/gallery_items/item_1407.jpg', 'autor' => 'Renata Mendes', 'fonte' => 'Artesanato Solidário (Artesol)', 'artesao_id' => $artesao->id]);
        Imagem2::create(['url' => 'http://www.artesol.org.br//files/uploads/gallery_items/item_1407.jpg', 'autor' => 'Renata Mendes', 'fonte' => 'Artesanato Solidário (Artesol)', 'artesao_id' => $artesao->id]);

    }
}
