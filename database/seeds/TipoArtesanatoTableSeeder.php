<?php

use Illuminate\Database\Seeder;
use App\TipoArtesanato;

class TipoArtesanatoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoArtesanato::create(
            [
                'nome' => 'Arte Popular',
                'cod' => 'arte_popular',
                'descricao' => 'Caracteriza-se pelo trabalho individual do artista popular, artesão autodidata, reconhecido pelo valor histórico e/ou artístico e/ou cultural, trabalhado em harmonia com um tema, uma realidade e uma matéria, expressando aspectos identitários da comunidade ou do imaginário do artista.',
            ]
        );
        TipoArtesanato::create(
            [
                'nome' => 'Contemporâneo-Conceitual',
                'cod' => 'contemp_conceitual',
                'descricao' => 'Produção artesanal, predominantemente urbana, resultante da inovação de materiais e processos e da incorporação de elementos criativos, em diferentes formas de expressão, resgatando técnicas tradicionais, utilizando, geralmente, matéria-prima manufaturada reciclada e reaproveitada, com identidade cultural.',
            ]
        );
        TipoArtesanato::create(
            [
                'nome' => 'Indígena',
                'cod' => 'indigena',
                'descricao' => 'É resultado do trabalho produzido por membros de etnias indígenas, no qual se identifica o valor de uso, a relação social e a cultural da comunidade, sendo os produtos, em sua maioria, incorporados ao cotidiano da vida tribal e resultantes de trabalhos coletivos, de acordo com a divisão do trabalho indígena.',
            ]
        );
        TipoArtesanato::create(
            [
                'nome' => 'Quilombola',
                'cod' => 'quilombola',
                'descricao' => 'É resultado do trabalho produzido coletivamente por membros remanescentes dos quilombos, de acordo com a divisão do trabalho quilombola, no qual se identifica o valor de uso, a relação social e cultural da comunidade, sendo os produtos, em sua maioria, incorporados ao cotidiano da vida comunitária.',
            ]
        );
        TipoArtesanato::create(
            [
                'nome' => 'Referência Cultural',
                'cod' => 'referencia_cultural',
                'descricao' => 'Produção artesanal decorrente do resgate ou da releitura de elementos culturais tradicionais nacionais ou estrangeiros assimilados, podendo se dar por meio da utilização da iconografia (símbolos e imagens) e/ou pelo emprego de técnicas tradicionais que podem ser somadas à inovação; dinamiza a produção, sem descaracterizar as referências tradicionais locais',
            ]
        );
        TipoArtesanato::create(
            [
                'nome' => 'Tradicional',
                'cod' => 'tradicional',
                'descricao' => 'A produção, geralmente de origem familiar ou comunitária, que possibilita e favorece a transferência de conhecimentos de técnicas, processos e desenhos originais, cuja importância e valor cultural decorrem do fato de preservar a memória cultural de uma comunidade, transmitida de geração em geração.',
            ]
        );
        
    }
}
