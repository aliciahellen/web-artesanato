<?php

use Illuminate\Database\Seeder;
use App\Planta;
use App\Bioma;
use App\Estado;
use Faker\Provider\Image;
use App\Imagem;

class PlantaTableSeeder extends Seeder
{
   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run()
   {
   
	//ACURI
	$planta = Planta::create(
	//https://ferramentas.sibbr.gov.br/ficha/bin/view/especie/attalea_phalerata
	//http://reflora.jbrj.gov.br/reflora/listaBrasil/FichaPublicaTaxonUC/FichaPublicaTaxonUC.do?id=FB15684
	//http://www.almanaquedocampo.com.br/verbete/exibir/414   //https://www.webambiente.gov.br/
      [
        'nome_popular' => 'acuri,aricuri,bacuri,uricuri,uricurí vermelho',
        'autoria' => 'Mart. ex Spreng.',
        'nome_cientifico' => 'Attalea phalerata',
        'e_panc' => 1,
        'ep_floracao_inicio' => 'ago',
        'ep_floracao_fim' => 'set',
        'grau_ameaca_iucn' => 'lc',
        'descricao' => 'Attalea phalerata Mart. ex Spreng, conhecido popularmente como acuri, urucuri, ouricuri, aricuri, alicuri, aricuí, iricuri, uricuri, licuri, urucuriiba, licurizeiro e nicuri, é uma palmeira que atinge mais de trinta metros de altura. É encontrada no Brasil, Bolívia, Paraguai e Peru.',
      ]
    );
    $planta->biomas()->attach(Bioma::whereIn('cod', ['pampa', 'pantanal', 'cerrado'])->get('id')->pluck('id')->toArray());
    $planta->dist_geografica()->attach(Estado::whereIn('sigla', ['AC', 'DF', 'GO', 'MG', 'MS', 'MT', 'PA', 'RO', 'SP', 'TO'])->get('id')->pluck('id')->toArray());
		Imagem::create(['url' => 'http://imagens3.jbrj.gov.br/fsi/server?type=image&source=/reflora/producao/imagens_de_campo/1275323.jpg&width=3072&height=2304', 'autor' => 'Renata C. Martins', 'fonte' => 'Sistema de Informação sobre a Biodiversidade Brasileira (SiBBr)', 'planta_id' => $planta->id]);
		Imagem::create(['url' => 'http://imagens3.jbrj.gov.br/fsi/server?type=image&source=/reflora/producao/imagens_de_campo/1275324.jpg&width=3072&height=2304', 'autor' => 'Renata C. Martins', 'fonte' => 'Sistema de Informação sobre a Biodiversidade Brasileira (SiBBr)', 'planta_id' => $planta->id]);
		Imagem::create(['url' => 'http://imagens3.jbrj.gov.br/fsi/server?type=image&source=/reflora/producao/imagens_de_campo/1275325.jpg&width=2304&height=3072', 'autor' => 'Renata C. Martins', 'fonte' => 'Sistema de Informação sobre a Biodiversidade Brasileira (SiBBr)', 'planta_id' => $planta->id]);
    Imagem::create(['url' => 'http://imagens3.jbrj.gov.br/fsi/server?type=image&source=/reflora/producao/imagens_de_campo/1275326.jpg&width=3072&height=2304', 'autor' => 'Renata C. Martins', 'fonte' => 'Sistema de Informação sobre a Biodiversidade Brasileira (SiBBr)', 'planta_id' => $planta->id]);
    Imagem::create(['url' => 'http://imagens3.jbrj.gov.br/fsi/server?type=image&source=/reflora/producao/imagens_de_campo/1275323.jpg&width=3072&height=2304', 'autor' => 'Renata C. Martins', 'fonte' => 'Sistema de Informação sobre a Biodiversidade Brasileira (SiBBr)', 'planta_id' => $planta->id]);
		Imagem::create(['url' => 'http://imagens3.jbrj.gov.br/fsi/server?type=image&source=/reflora/producao/imagens_de_campo/1275324.jpg&width=3072&height=2304', 'autor' => 'Renata C. Martins', 'fonte' => 'Sistema de Informação sobre a Biodiversidade Brasileira (SiBBr)', 'planta_id' => $planta->id]);


	//AMBURANA
    $planta = Planta::create(
      [
        'nome_popular' => 'cumaru,amburana,amburana-de-cheiro,angelim,baru',
        'autoria' => '(Allemão) A.C.Sm',
        'nome_cientifico' => 'Amburana cearensis',
        'e_panc' => 0,
        'ep_floracao_inicio' => 'mar',
        'ep_floracao_fim' => 'jun',
        'grau_ameaca_iucn' => 'nt',
        'descricao' => '',
      ]
    );
    $planta->biomas()->attach(Bioma::whereIn('cod', ['pampa', 'pantanal', 'cerrado'])->get('id')->pluck('id')->toArray());
    $planta->dist_geografica()->attach(Estado::whereIn('sigla', ['AL', 'BA', 'CE', 'DF', 'ES', 'GO', 'MA', 'MG', 'MS', 'PB', 'PE', 'PI', 'RN', 'SE', 'SP', 'TO'])->get('id')->pluck('id')->toArray());
   

	//ANGICO
    $planta = Planta::create(
      [
        'nome_popular' => 'angico-branco,farinha-secamulateira,frango-assado,canela-de-corvo,coxa-de-frango,farinha-seca-de-mico,manga-do-mato,pé-de-frango',
        'autoria' => '(Spruce ex Benth.) Burkart.',
        'nome_cientifico' => 'Albizia niopoides',
        'e_panc' => 0,
        'ep_floracao_inicio' => 'out',
        'ep_floracao_fim' => 'jan',
        'grau_ameaca_iucn' => 'lc',
        'descricao' => '',
      ]
    );
    $planta->biomas()->attach(Bioma::whereIn('cod', ['cerrado', 'pantanal', 'cerrado'])->get('id')->pluck('id')->toArray());
    $planta->dist_geografica()->attach(Estado::whereIn('sigla', ['AM', 'BA', 'ES', 'GO', 'MA', 'MG', 'MS', 'MT', 'PA', 'PE', 'PR', 'RS', 'SC', 'SP'])->get('id')->pluck('id')->toArray());
  

	//AROEIRA
    $planta = Planta::create(
      [
        'nome_popular' => 'aroeira,urundeúva,aroeira-do-sertão,aroeira-do-campo,aroeira-da-serra,urindeúva,arindeúva, arendiúva,aroeira-preta',
        'autoria' => 'Allemão.',
        'nome_cientifico' => 'Myracrodruon urundeuva',
        'e_panc' => 0,
        'ep_floracao_inicio' => 'ago',
        'ep_floracao_fim' => 'set',
        'grau_ameaca_iucn' => 'lc',
        'descricao' => '',
      ]
    );
    $planta->biomas()->attach(Bioma::whereIn('cod', ['caatinga', 'mata_atlantica', 'pantanal', 'cerrado'])->get('id')->pluck('id')->toArray());
    $planta->dist_geografica()->attach(Estado::whereIn('sigla', ['AC', 'DF', 'GO', 'MG', 'MS', 'MT', 'PA', 'RO', 'SP', 'TO'])->get('id')->pluck('id')->toArray());
   
      
	//BOCAIUVA
    $planta = Planta::create(
      [
        'nome_popular' => 'bocaiuva,macaúba,coco-babão,coco-babosa,coco-macaúba,coqueiro-de-espinho,macajuba,macaibeira,palmeira-macaúva,coquinho',
        'autoria' => 'Mart. ex Spreng.',
        'nome_cientifico' => 'Acrocomia aculeata',
        'e_panc' => 0,
        'ep_floracao_inicio' => 'out',
        'ep_floracao_fim' => 'fev',
        'grau_ameaca_iucn' => 'ne',
        'descricao' => '',
      ]
    );
    $planta->biomas()->attach(Bioma::whereIn('cod', ['amozonia', 'cerrado',  'pantanal', 'cerrado'])->get('id')->pluck('id')->toArray());
    $planta->dist_geografica()->attach(Estado::whereIn('sigla', ['AM',' CE', 'DF', 'GO', 'MA', 'MG', 'MS', 'MT', 'PA', 'PI', 'PE', 'PR', 'RJ', 'RR', 'SP', 'TO'])->get('id')->pluck('id')->toArray());

	
	//CAJA
    $planta = Planta::create(
      [
        'nome_popular' => 'taperebá,cajá,cajazeira,taperebá-de-anta,taperebá-de-veado,cajazeira-brava,cajá-da-mata,acaiá,caiá,cajá-miúdo,cajazeiro-miúdo,cajarana,cajá-mirim,cajá-pequeno',
        'autoria' => 'L.',
        'nome_cientifico' => 'Spondias mombin',
        'e_panc' => 1,
        'ep_floracao_inicio' => 'ago',
        'ep_floracao_fim' => 'set',
        'grau_ameaca_iucn' => 'lc',
        'descricao' => '',
      ]
    );
    $planta->biomas()->attach(Bioma::whereIn('cod', ['amazonia', 'cerrado','mata_atlantica','pantanal', 'cerrado'])->get('id')->pluck('id')->toArray());
    $planta->dist_geografica()->attach(Estado::whereIn('sigla', ['AC', 'AL', 'AM', 'AP', 'BA', 'CE', 'DF', 'ES', 'GO', 'MA','MS','MT','PA','PB','PI','RJ','RN','RO','RS','SP','TO'])->get('id')->pluck('id')->toArray());
    
	
	//CAJU
    $planta = Planta::create(
      [
        'nome_popular' => 'cajuzinho,caju,caju-do-cerrado,cajuzinho-do-campo,cajuí',
        'autoria' => 'A.St.-Hil.',
        'nome_cientifico' => 'Anacardium humile',
        'e_panc' => 0,
        'ep_floracao_inicio' => 'ago',
        'ep_floracao_fim' => 'nov',
        'grau_ameaca_iucn' => 'lc',
        'descricao' => '',
      ]
    );
	$planta->biomas()->attach(Bioma::whereIn('cod',['cerrado','pantanal'])->get('id')->pluck('id')->toArray());
    $planta->dist_geografica()->attach(Estado::whereIn('sigla', ['BA', 'DF', 'GO', 'MG', 'MS', 'MT', 'PR', 'RO', 'SP', 'TO'])->get('id')->pluck('id')->toArray());
   

	//CAQUI DO CERRADO
    $planta = Planta::create(
      [
        'nome_popular' => 'caquizeiro-do-mato,fruta-de-boi,fruta-de-jacu-fêmea,caqui-do-cerrado,bacupari-bravo,olho-de-boi',
        'autoria' => ' A.DC.',
        'nome_cientifico' => 'Diospyros hispida',
        'e_panc' => 0,
        'ep_floracao_inicio' => 'ago',
        'ep_floracao_fim' => 'nov',
        'grau_ameaca_iucn' => 'lc',
        'descricao' => '',
      ]
    );
    $planta->biomas()->attach(Bioma::whereIn('cod',['cerrado','pantanal'])->get('id')->pluck('id')->toArray());
    $planta->dist_geografica()->attach(Estado::whereIn('sigla', ['AL', 'CE', 'DF', 'ES', 'GO','MA','MG','MS', 'MT', 'PA', 'PB','PI','PR','RJ','RO', 'SP', 'TO'])->get('id')->pluck('id')->toArray());
   
	
	//CARANDA
    $planta = Planta::create(
      [
        'nome_popular' => 'carandá,carandeiro,carandaí',
        'autoria' => 'Morong ex Morong & Britton.',
        'nome_cientifico' => 'Copernicia alba',
        'e_panc' => 0,
        'ep_floracao_inicio' => 'jul',
        'ep_floracao_fim' => 'dez',
        'grau_ameaca_iucn' => 'ne',
        'descricao' => '',
      ]
    );
    $planta->biomas()->attach(Bioma::whereIn('cod', [ 'pantanal'])->get('id')->pluck('id')->toArray());
	$planta->dist_geografica()->attach(Estado::whereIn('sigla',['MS','MT'])->get('id')->pluck('id')->toArray());

	
	//GONCALO
    $planta = Planta::create(
      [
        'nome_popular' => 'jequira,pau-gonçalves,ponçalave,gonçalo-alves,aroeira,gonçalo,arueira-brava,arueira-da-mata,gonçaleiro,garapeiro,aroeira-do-campo,gonçalves,chibatã,ubatã,sete-cascas,birito,aroeira-mole,aroeira-vermelha,angelim',
        'autoria' => 'Schott.',
        'nome_cientifico' => 'Astronium fraxinifolium',
        'e_panc' => 1,
        'ep_floracao_inicio' => 'jul',
        'ep_floracao_fim' => 'set',
        'grau_ameaca_iucn' => 'lc',
        'descricao' =>'',
      ]
    );
    $planta->biomas()->attach(Bioma::whereIn('cod', ['cerrado', 'pantanal', 'mata_atlantica'])->get('id')->pluck('id')->toArray());
    $planta->dist_geografica()->attach(Estado::whereIn('sigla', ['AL', 'AP','BA','CE', 'DF','GO','MA','MG','MS', 'MT', 'PA', 'PB','PI','RJ','RN', 'SP', 'TO'])->get('id')->pluck('id')->toArray());


	//IPE-AMARELO
    $planta = Planta::create(
      [
        'nome_popular' => 'ipê-caraíba,caraíba,caraíba-do-cerrado,carobeira,claraíba,crabeira,caraúba,ipê-do-cerrado,carnaúba,ipê,paratudo,piúva-amarela,pratudinho,craibeira,para-tudo-do-campo,craíba,ipê-do-campo,pau-d’arco-do-campo,ipê-amarelo-do-cerrado',
        'autoria' => '(Silva Manso) Benth. & Hook. F ex S. Moore',
        'nome_cientifico' => 'Tabebuiua aurea',
        'e_panc' => 0,
        'ep_floracao_inicio' => 'ago',
        'ep_floracao_fim' => 'out',
        'grau_ameaca_iucn' => 'ne',
        'descricao' => '',
      ]
    );
    $planta->biomas()->attach(Bioma::whereIn('cod', ['caatinga', 'cerrado', 'pantanal'])->get('id')->pluck('id')->toArray());
    $planta->dist_geografica()->attach(Estado::whereIn('sigla', ['AL', 'AM', 'AP', 'BA', 'CE', 'DF', 'GO', 'MA', 'MG', 'MS', 'MT', 'PB', 'PE', 'PI', 'PR', 'RN', 'SE', 'SP', 'TO'])->get('id')->pluck('id')->toArray());
   

	//IPE-BRANCO
    $planta = Planta::create(
      [
        'nome_popular' => 'ipê-branco,piuxinga,piruxinga,pertinga,piúva-branca,ipê-do-cerrado',
        'autoria' => '(Ridl.) Sandwith',
        'nome_cientifico' => 'Tabebuia roseoalba',
        'e_panc' => 0,
        'ep_floracao_inicio' => 'ago',
        'ep_floracao_fim' => 'dez',
        'grau_ameaca_iucn' => 'ne',
        'descricao' => '',
      ]
    );
    $planta->biomas()->attach(Bioma::whereIn('cod', ['mata_atlantica', 'pantanal', 'cerrado'])->get('id')->pluck('id')->toArray());
    $planta->dist_geografica()->attach(Estado::whereIn('sigla', ['GO', 'MG', 'MS', 'SP'])->get('id')->pluck('id')->toArray());


	//IPE-VERDE
    $planta = Planta::create(
      [
        'nome_popular' => 'ipê-verde,caroba-de-flor-verde',
        'autoria' => '(Mart) Mart',
        'nome_cientifico' => 'Cybistax antisyphilitica',
        'e_panc' => 0,
        'ep_floracao_inicio' => 'ago',
        'ep_floracao_fim' => 'mar',
        'grau_ameaca_iucn' => 'ne',
        'descricao' => '',
      ]
    );
    $planta->biomas()->attach(Bioma::whereIn('cod', ['mata_atlantica', 'pantanal', 'cerrado'])->get('id')->pluck('id')->toArray());
    $planta->dist_geografica()->attach(Estado::whereIn('sigla', ['BA', 'CE',  'DF', 'ES', 'GO', 'MA', 'MG', 'MS', 'MT', 'PA', 'PI', 'PR', 'RJ', 'RS', 'SC', 'SP', 'TO'])->get('id')->pluck('id')->toArray());
  

	//JENIPAPO
    $planta = Planta::create(
      [
        'nome_popular' => 'jenipapo,jenipapeiro',
        'autoria' => 'L.',
        'nome_cientifico' => 'Genipa americana',
        'e_panc' => 0,
        'ep_floracao_inicio' => 'set',
        'ep_floracao_fim' => 'dez',
        'grau_ameaca_iucn' => 'lc',
        'descricao' => '',
      ]
    );
    $planta->biomas()->attach(Bioma::whereIn('cod', ['amazônia', 'caatinga', 'mata_atlantica', 'pantanal', 'cerrado'])->get('id')->pluck('id')->toArray());
    $planta->dist_geografica()->attach(Estado::whereIn('sigla', ['AC', 'AL', 'AM', 'AP', 'BA', 'CE', 'DF', 'ES', 'GO', 'MA', 'MG', 'MS', 'MT', 'PA', 'PB', 'PE', 'PI', 'PR', 'RJ', 'RN', 'RO', 'RR', 'RS', 'SC', 'SE', 'SP', 'TO'])->get('id')->pluck('id')->toArray());
   

	//LOURO PRETO
    $planta = Planta::create(
      [
        'nome_popular' => 'peteribi,claraíba,louro-preto,piquana-negra,claraibeira,louro-de-mato-grosso,louro-branco',
        'autoria' => '(Mart.) A.DC',
        'nome_cientifico' => 'Cordia glabrata',
        'e_panc' => 0,
        'ep_floracao_inicio' => 'ago',
        'ep_floracao_fim' => 'out',
        'grau_ameaca_iucn' => 'ne',
        'descricao' => '',
      ]
    );
    $planta->biomas()->attach(Bioma::whereIn('cod', ['pantanal', 'cerrado'])->get('id')->pluck('id')->toArray());
    $planta->dist_geografica()->attach(Estado::whereIn('sigla', ['BA', 'GO', 'MG', 'MS', 'MT', 'PA', 'PI'])->get('id')->pluck('id')->toArray());
   

	//PASSARINHO
    $planta = Planta::create(
      [
        'nome_popular' => 'pau-amendoim,amendoim-bravo,amendoim,madeira-nova,viraró,pau-de-fava,óleo-branco,madeira-nova,carne-de-vaca,bálsamo,bassourinha,sucupira,vilão,bálsamo,bálsamo-do-pantanal,bálsamo-bravo, passarinho',
        'autoria' => 'Tul',
        'nome_cientifico' => 'Pterogyne nitens',
        'e_panc' => 0,
        'ep_floracao_inicio' => 'fev',
        'ep_floracao_fim' => 'ago',
        'grau_ameaca_iucn' => 'lc',
        'descricao' => '',
      ]
    );
    $planta->biomas()->attach(Bioma::whereIn('cod', ['mata_atlantica', 'pantanal', 'cerrado'])->get('id')->pluck('id')->toArray());
    $planta->dist_geografica()->attach(Estado::whereIn('sigla', ['AL', 'AM', 'BA', 'CE', 'ES', 'MA', 'MG', 'MS', 'MT', 'PB', 'PR', 'RJ', 'RN', 'SP'])->get('id')->pluck('id')->toArray());
    
	
	//PATA-DE-VACA
    $planta = Planta::create(
      [
        'nome_popular' => 'pé-de-boi,pata-de-vaca,pé-de-vaca,unha-de-vaca',
        'autoria' => '(Bong.) Steud.',
        'nome_cientifico' => 'Bauhinia rufa',
        'e_panc' => 0,
        'ep_floracao_inicio' => 'mai',
        'ep_floracao_fim' => 'nov',
        'grau_ameaca_iucn' => 'ne',
        'descricao' => '',
      ]
    );
    $planta->biomas()->attach(Bioma::whereIn('cod', ['pantanal', 'cerrado'])->get('id')->pluck('id')->toArray());
    $planta->dist_geografica()->attach(Estado::whereIn('sigla', ['AC', 'AM', 'DF', 'GO', 'MA', 'MG', 'MS', 'MT', 'PA', 'RO', 'SP', 'TO'])->get('id')->pluck('id')->toArray());
    
	
	//SUCUPIRA
    $planta = Planta::create(
      [
        'nome_popular' => 'sucupira-preta,sucupira-do-campo,sepifirme,paricarana,sucupira,sucupira-mirim,sucupira-verdadeira,sapupura-do-campo,sucupira-amarela,sucupira-branca,sucupira-parda,sucupira-roxa,sucupiruçu-branco,sucupira-do-cerrado,macanaíba,macanaíba-parda,macanaíba-pele-de-sapo',
        'autoria' => 'Kunth',
        'nome_cientifico' => 'Bowdichia virgilioides',
        'e_panc' => 0,
        'ep_floracao_inicio' => 'jun',
        'ep_floracao_fim' => 'ago',
        'grau_ameaca_iucn' => 'nt',
        'descricao' => '',
      ]
    );
    $planta->biomas()->attach(Bioma::whereIn('cod', ['pantanal', 'cerrado'])->get('id')->pluck('id')->toArray());
    $planta->dist_geografica()->attach(Estado::whereIn('sigla', ['AL', 'AM', 'AP', 'BA', 'CE', 'DF', 'ES', 'GO', 'MA', 'MG', 'MS', 'MT', 'PA', 'PB', 'PE', 'PI', 'PR', 'RJ', 'RN', 'RO', 'RR', 'SE', 'SP', 'TO'])->get('id')->pluck('id')->toArray());
    
	
	//TARUMÃ
    $planta = Planta::create(
      [
        'nome_popular' => 'tarumã,azeitona do mato,tarumã do brejo,pau de flor,tarumeiro',
        'autoria' => 'Bertero ex Spreng.',
        'nome_cientifico' => 'Vitex cymosa',
        'e_panc' => 0,
        'ep_floracao_inicio' => 'set',
        'ep_floracao_fim' => 'nov',
        'grau_ameaca_iucn' => 'ne',
        'descricao' => '',
      ]
    );
    $planta->biomas()->attach(Bioma::whereIn('cod', ['pantanal'])->get('id')->pluck('id')->toArray());
    $planta->dist_geografica()->attach(Estado::whereIn('sigla', ['AM', 'BA', 'DF', 'MA', 'MG', 'MS', 'MT', 'PA', 'PI', 'PR', 'RO', 'SP'])->get('id')->pluck('id')->toArray());
   
   
   //XIMBUVA
    $planta = Planta::create(
      [
        'nome_popular' => 'tamboril,timburi,timbaúva,orelha-de-negro,tambori,pau-de-sabão,timbaíba,orelha-de-preto,ximbó,ximbuva,ximbuveira,arariba,arvore-das-patacas,cambanambi,chimbo,chimbuva,flor-de-algodao,morango,orelha-de-macaco,orelha-de-onca,tamboi,tambuvi,timbouba,timbuva,orelha-de-preto,pacara,timboril,ximbiuva,tambori,tamboril,timbauva-branca,timbaúva-preta',
        'autoria' => '(Vell.) Morong',
        'nome_cientifico' => 'Enterolobium contortisiliquum',
        'e_panc' => 0,
        'ep_floracao_inicio' => 'set',
        'ep_floracao_fim' => 'nov',
        'grau_ameaca_iucn' => 'ne',
        'descricao' => '',
      ]
    );
    $planta->biomas()->attach(Bioma::whereIn('cod', ['caatinga', 'mata_atlantica', 'pampa', 'pantanal', 'cerrado'])->get('id')->pluck('id')->toArray());
    $planta->dist_geografica()->attach(Estado::whereIn('sigla', ['AC', 'DF', 'GO', 'MG', 'MS', 'MT', 'PA', 'RO', 'SP', 'TO'])->get('id')->pluck('id')->toArray());
 }
}