<?php

use Illuminate\Database\Seeder;
use App\TecnicaProducao;

class TecnicaProducaoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TecnicaProducao::create(
            [
                'nome' => 'Fiação',
                'cod' => 'fiacao',
                'descricao' => 'Consiste no processo produtivo de retirada de fibras (da roca ou do cesto) para formar o fio, a torcedura das fibras (em poucas porções) e o enrolamento dos fios num suporte próprio (fuso).',
            ]
        );
        TecnicaProducao::create(
            [
                'nome' => 'Montagem',
                'cod' => 'montagem',
                'descricao' => 'Técnica de produção de uma série de peças com efeitos variados, sendo base para artesãos de áreas (Tipologias) distintas. Constitui-se em unir matéria-prima, de um só tipo ou diversa, formando uma única peça com identidade e função cultural. Em caso de montagem de adornos e acessórios deverá utilizar materiais beneficiados a partir da natureza, tais como: sementes diversas, fibras naturais, casca do coco, frutos secos, conchas, chifre, madrepérola, capim, madeira, ossos, penas e escamas, dentre outros utilizados repetidamente para formar e valorizar a criação original da peça.',
            ]
        );
    }
}
