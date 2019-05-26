<?php

use Illuminate\Database\Seeder;
use App\FinalidadeProducao;

class FinalidadeProducaoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FinalidadeProducao::create(
            [
                'nome' => 'Adorno, Acessório e Vestuário',
                'cod' => 'adorno_acess_vest',
                'descricao' => 'Objetos de enfeite de uso pessoal com função estética.',
            ]
        );
        FinalidadeProducao::create(
            [
                'nome' => 'Decorativo',
                'cod' => 'decorativo',
                'descricao' => 'Objetos produzidos para enfeitar e compor ambientes.',
            ]
        );
        FinalidadeProducao::create(
            [
                'nome' => 'Educativo',
                'cod' => 'educativo',
                'descricao' => 'Objetos destinados às práticas pedagógicas, que visam atuar na capacidade do indivíduo de aprender novas habilidades e assimilar novos conhecimentos.',
            ]
        );
        FinalidadeProducao::create(
            [
                'nome' => 'Lúdico',
                'cod' => 'ludico',
                'descricao' => 'Objetos para o entretenimento e representação do imaginário popular, normalmente em forma de jogos, bonecos, máscaras, instrumentos musicais, brinquedos, entre outros. Os produtos destinados ao público infantil deverão observar a legislação específica vigente.',
            ]
        );
        FinalidadeProducao::create(
            [
                'nome' => 'Religioso/Místico',
                'cod' => 'rel_mistico',
                'descricao' => 'Objetos destinados ao uso ritualístico ou para a demonstração de uma crença ou fé, a exemplo de amuletos, altares, imagens, mandalas, oratórios, entre outros.',
            ]
        );
        FinalidadeProducao::create(
            [
                'nome' => 'Profano',
                'cod' => 'profano',
                'descricao' => 'Peças que expressam crenças e/ou manifestações artísticas desvinculadas de concepções religiosas.',
            ]
        );
        FinalidadeProducao::create(
            [
                'nome' => 'Utilitário',
                'cod' => 'utilitario',
                'descricao' => 'Objetos que visam atender as necessidades oriundas de trabalho ou de atividade doméstica, cujo valor é determinado pela importância funcional.',
            ]
        );
        FinalidadeProducao::create(
            [
                'nome' => 'Lembrança/Souvenir',
                'cod' => 'lembranca_souvenir',
                'descricao' => 'Objetos representativos de uma região ou de manifestações culturais adquiridos ou distribuídos com a finalidade de identificar as características do destino visitado e geralmente presentear alguém.',
            ]
        );
    }
}
