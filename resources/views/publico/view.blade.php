@extends('publico.layout.page')

@section('title', 'Início')

@section('content_header')
    <h1>Início</h1>
@stop

@section('content')
<div class="slider"></div>
<section class="post-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-1 col-md-0"></div>
            <div class="col-lg-10 col-md-12">
                <div class="main-post">
                    <div class="post-image"><img src="{{ $artesao->imagens[0]->url }}" alt="{{ $artesao->nome }}" title="{{ $artesao->nome }}"></div>
                    <div class="post-top-area">
                        <h3 class="title"><b>{{ $artesao->nome }}</b></h3>
                    </div>
                    <!-- post-top-area -->
                    <div class="post-bottom-area">
                        <p class="para">
                            {{ $artesao->descricao }}
                        </p>
                        <h4><b>Informações</b></h4>
                        <br>
                        <div class="row">
                            <div class="col-lg-4 col-md-12">
                                <b>Tipo de Artesanato:</b>
                            </div>
                            <div class="col-lg-8 col-md-12">
                            @foreach($artesao->tipos_artesanato as $tipo_artesanato)
                                <p>{{ $tipo_artesanato->nome }}</p>
                            @endforeach
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-12">
                                <b>Finalidades:</b>
                            </div>
                            <div class="col-lg-8 col-md-12">
                            @foreach($artesao->finalidades_producao as $finalidade_producao)
                                <p>{{ $finalidade_producao->nome }}</p>
                            @endforeach
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-12">
                                <b>Técnicas:</b>
                            </div>
                            <div class="col-lg-8 col-md-12">
                            @foreach($artesao->tecnicas_producao as $tecnica_producao)
                                <p>{{ $tecnica_producao->nome }}</p>
                            @endforeach
                            </div>
                        </div>
                        
                        <h4><b>Imagens</b></h4>
                        <br>
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                            <div class="popup-galeria">
                                @foreach($artesao->imagens as $imagem)
                                    <a href="{{ $imagem->url }}" title="{{ $imagem->autor }} - {{ $imagem->fonte }}" data-autor="{{ $imagem->autor }}" data-fonte="{{ $imagem->fonte }}"><img src="{{ $imagem->url }}" style="width:96px;height:96px;padding:4px;margin:0px auto;"></a>
                                @endforeach
                            </div>
                            </div>
                        </div>

                        <div class="post-icons-area">
                            <ul class="icons">
                                <li>COMPARTILHAR : </li>
                                <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                                <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                                <li><a href="#"><i class="ion-social-pinterest"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- post-bottom-area -->
                </div>
                <!-- main-post -->
            </div>
            <!-- col-lg-8 col-md-12 -->
        </div>
        <!-- row -->
    </div>
    <!-- container -->
</section>
@stop

@section('custom_js')
    <script>
        $(document).ready(function() {
            $('.popup-galeria').magnificPopup({
                delegate: 'a',
                type: 'image',
                tLoading: 'Carregando imagem #%curr%...',
                mainClass: 'mfp-img-mobile',
                gallery: {
                    enabled: true,
                    navigateByImgClick: true,
                    preload: [0,1], // Will preload 0 - before current, and 1 after the current image
                    tPrev: 'Anterior (seta esquerda)',
                    tNext: 'Próximo (seta direita)',
                    tCounter: '%curr% de %total%',
                },
                image: {
                    tError: '<a href="%url%">A imagem #%curr%</a> não pode ser carregada.',
                    titleSrc: function(item) {
                    return 'Autor: ' + item.el.attr('data-autor') + '<small>Fonte: '+ item.el.attr('data-fonte') +'</small>';
                    }
                },
                closeOnBgClick: false,
                
            });
        });
    </script>
@append