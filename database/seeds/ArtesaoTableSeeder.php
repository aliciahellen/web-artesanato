<?php

use Illuminate\Database\Seeder;
use App\Artesao;
use App\TipoArtesanato;
use App\FinalidadeProducao;
use App\TecnicaProducao;
use App\Imagem;

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
                'descricao' => 'Associação de artesãs que trabalham com o couro e escamas de peixe, produzindo brincos, colares, bolsas, cintos, entre outros produtos.',
            ]
        );
        $artesao->tipos_artesanato()->attach(TipoArtesanato::whereIn('cod', ['tradicional'])->get('id')->pluck('id')->toArray());
        $artesao->finalidades_producao()->attach(FinalidadeProducao::whereIn('cod', ['adorno_acess_vest', 'decorativo'])->get('id')->pluck('id')->toArray());
        $artesao->tecnicas_producao()->attach(TecnicaProducao::whereIn('cod', ['fiacao', 'montagem'])->get('id')->pluck('id')->toArray());
        Imagem::create(['url' => 'http://www.artesol.org.br/novo/app/webroot/files/uploads/ckfinder/images/IMG_4329.JPG', 'autor' => 'Renata Mendes', 'fonte' => 'Artesanato Solidário (Artesol)', 'artesao_id' => $artesao->id]);
        Imagem::create(['url' => 'http://www.artesol.org.br//files/uploads/gallery_items/item_1407.jpg', 'autor' => 'Renata Mendes', 'fonte' => 'Artesanato Solidário (Artesol)', 'artesao_id' => $artesao->id]);
        Imagem::create(['url' => 'http://www.artesol.org.br//files/uploads/gallery_items/item_1408.jpg', 'autor' => 'Renata Mendes', 'fonte' => 'Artesanato Solidário (Artesol)', 'artesao_id' => $artesao->id]);
        Imagem::create(['url' => 'http://www.artesol.org.br//files/uploads/gallery_items/item_1409.jpg', 'autor' => 'Renata Mendes', 'fonte' => 'Artesanato Solidário (Artesol)', 'artesao_id' => $artesao->id]);
        Imagem::create(['url' => 'http://www.artesol.org.br//files/uploads/gallery_items/item_1532.jpg', 'autor' => 'Renata Mendes', 'fonte' => 'Artesanato Solidário (Artesol)', 'artesao_id' => $artesao->id]);
        Imagem::create(['url' => 'https://i.ibb.co/3Ffmw67/20190510-101327.jpg', 'autor' => 'Autoria Própria', 'fonte' => 'Própria', 'artesao_id' => $artesao->id]);

        $artesao = Artesao::create(
            [
                'nome' => 'Angelino e Davi',
                'endereco' => 'Rua Dom Aquino, 405 - Centro, Corumbá - MS, 79302-040',
                'telefone' => '6732312715',
                'email' => 'fundacaodeculturadecorumba@gmail.com',
                'descricao' => 'Produção de peças de cestarias a partir da salsaparrilha e farinha de Bocaíuva.',
            ]
        );
        $artesao->tipos_artesanato()->attach(TipoArtesanato::whereIn('cod', ['tradicional'])->get('id')->pluck('id')->toArray());
        $artesao->finalidades_producao()->attach(FinalidadeProducao::whereIn('cod', ['decorativo', 'utilitario'])->get('id')->pluck('id')->toArray());
        $artesao->tecnicas_producao()->attach(TecnicaProducao::whereIn('cod', ['fiacao'])->get('id')->pluck('id')->toArray());
        Imagem::create(['url' => 'https://i.ibb.co/dcKfLPd/20190510-100026.jpg', 'autor' => 'Autoria Própria', 'fonte' => 'Própria', 'artesao_id' => $artesao->id]);
        Imagem::create(['url' => 'https://i.ibb.co/GdsNPm4/20190510-100136.jpg', 'autor' => 'Autoria Própria', 'fonte' => 'Própria', 'artesao_id' => $artesao->id]);
        Imagem::create(['url' => 'https://i.ibb.co/WFRtFkD/20190510-100259.jpg', 'autor' => 'Autoria Própria', 'fonte' => 'Própria', 'artesao_id' => $artesao->id]);
        Imagem::create(['url' => 'https://i.ibb.co/hCqpxLf/20190510-095544.jpg', 'autor' => 'Autoria Própria', 'fonte' => 'Própria', 'artesao_id' => $artesao->id]);
        Imagem::create(['url' => 'https://i.ibb.co/x6Q8012/20190510-093554.jpg', 'autor' => 'Autoria Própria', 'fonte' => 'Própria', 'artesao_id' => $artesao->id]);
        
        $artesao = Artesao::create(
            [
                'nome' => 'Catarina',
                'endereco' => 'Rua Dom Aquino, 405 - Centro, Corumbá - MS, 79302-040',
                'telefone' => '6732312715',
                'email' => 'fundacaodeculturadecorumba@gmail.com',
                'descricao' => 'Produção de itens de tapeçaria e decorativos com uso de fibras de aguapés.',
            ]
        );
        $artesao->tipos_artesanato()->attach(TipoArtesanato::whereIn('cod', ['tradicional'])->get('id')->pluck('id')->toArray());
        $artesao->finalidades_producao()->attach(FinalidadeProducao::whereIn('cod', ['decorativo', 'utilitario'])->get('id')->pluck('id')->toArray());
        $artesao->tecnicas_producao()->attach(TecnicaProducao::whereIn('cod', ['fiacao'])->get('id')->pluck('id')->toArray());
        Imagem::create(['url' => 'https://i.ibb.co/wwk6vXP/20190510-091755.jpg', 'autor' => 'Autoria Própria', 'fonte' => 'Própria', 'artesao_id' => $artesao->id]);
        Imagem::create(['url' => 'https://i.ibb.co/xJm3M1H/20190510-092223.jpg', 'autor' => 'Autoria Própria', 'fonte' => 'Própria', 'artesao_id' => $artesao->id]);
        Imagem::create(['url' => 'https://i.ibb.co/Fg0L538/20190510-092138.jpg', 'autor' => 'Autoria Própria', 'fonte' => 'Própria', 'artesao_id' => $artesao->id]);
        Imagem::create(['url' => 'https://i.ibb.co/PDtf9xr/20190510-092237.jpg', 'autor' => 'Autoria Própria', 'fonte' => 'Própria', 'artesao_id' => $artesao->id]);
        Imagem::create(['url' => 'https://i.ibb.co/wKkBZW8/20190510-091935.jpg', 'autor' => 'Autoria Própria', 'fonte' => 'Própria', 'artesao_id' => $artesao->id]);

        $artesao = Artesao::create(
            [
                'nome' => 'Iza',
                'endereco' => 'Rua Dom Aquino, 405 - Centro, Corumbá - MS, 79302-040',
                'telefone' => '6732312715',
                'email' => 'fundacaodeculturadecorumba@gmail.com',
                'descricao' => 'Produção de itens de tapeçaria e decorativos com uso de fibras de aguapés.',
            ]
        );
        $artesao->tipos_artesanato()->attach(TipoArtesanato::whereIn('cod', ['tradicional'])->get('id')->pluck('id')->toArray());
        $artesao->finalidades_producao()->attach(FinalidadeProducao::whereIn('cod', ['decorativo'])->get('id')->pluck('id')->toArray());
        $artesao->tecnicas_producao()->attach(TecnicaProducao::whereIn('cod', ['fiacao'])->get('id')->pluck('id')->toArray());
        Imagem::create(['url' => 'https://i.ibb.co/FWCvf78/20190510-085843.jpg', 'autor' => 'Autoria Própria', 'fonte' => 'Própria', 'artesao_id' => $artesao->id]);
        Imagem::create(['url' => 'https://i.ibb.co/xJm3M1H/20190510-092223.jpg', 'autor' => 'Autoria Própria', 'fonte' => 'Própria', 'artesao_id' => $artesao->id]);
        Imagem::create(['url' => 'https://i.ibb.co/WHH3xv6/20190510-085925.jpg', 'autor' => 'Autoria Própria', 'fonte' => 'Própria', 'artesao_id' => $artesao->id]);
        Imagem::create(['url' => 'https://i.ibb.co/F0kFDq6/20190510-085919.jpg', 'autor' => 'Autoria Própria', 'fonte' => 'Própria', 'artesao_id' => $artesao->id]);
        

        $artesao = Artesao::create(
            [
                'nome' => 'Mauro',
                'endereco' => 'Rua Dom Aquino, 405 - Centro, Corumbá - MS, 79302-040',
                'telefone' => '6732312715',
                'email' => 'fundacaodeculturadecorumba@gmail.com',
                'descricao' => 'Produção de peças artesanais de entalhe em madeira.',
            ]
        );
        $artesao->tipos_artesanato()->attach(TipoArtesanato::whereIn('cod', ['tradicional'])->get('id')->pluck('id')->toArray());
        $artesao->finalidades_producao()->attach(FinalidadeProducao::whereIn('cod', ['decorativo'])->get('id')->pluck('id')->toArray());
        $artesao->tecnicas_producao()->attach(TecnicaProducao::whereIn('cod', ['entalhe_madeira', 'marcenaria'])->get('id')->pluck('id')->toArray());
        Imagem::create(['url' => 'https://i.ibb.co/25MTwTV/20190510-090828.jpg', 'autor' => 'Autoria Própria', 'fonte' => 'Própria', 'artesao_id' => $artesao->id]);
        Imagem::create(['url' => 'https://i.ibb.co/ZW2vx0m/20190510-091316.jpg', 'autor' => 'Autoria Própria', 'fonte' => 'Própria', 'artesao_id' => $artesao->id]);
        Imagem::create(['url' => 'https://i.ibb.co/5MKWM9s/20190510-091525.jpg', 'autor' => 'Autoria Própria', 'fonte' => 'Própria', 'artesao_id' => $artesao->id]);
        Imagem::create(['url' => 'https://i.ibb.co/VHkyJ69/20190510-091614.jpg', 'autor' => 'Autoria Própria', 'fonte' => 'Própria', 'artesao_id' => $artesao->id]);

    }
}