@extends('publico.layout.page')

@section('title', 'Início')

@section('content_header')
    <h1>Início</h1>
@stop

@section('content')

<section class="blog-area section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    @if(!empty($artesaos) & count($artesaos) > 0)
                    @foreach($artesaos as $artesao)
                    <div class="col-md-6 col-sm-12">
                        <div class="card">
                            <div class="single-post post-style-1">
                                <div class="blog-image"><img src="{{ $artesao->imagens[0]->url }}" alt="{{ $artesao->nome }}" title="{{ $artesao->nome }}"></div>
                                <div class="blog-info">
                                    <h4 class="title"><a href="{{ route('artesao.get', $artesao->id)}}" title="{{ $artesao->nome }}"><b>{{ $artesao->nome }}</b></a>
                                    </h4>
                                    <ul class="post-footer view">
                                        <li><a href="{{ route('artesao.get', $artesao->id)}}" title="{{ $artesao->nome }}"><i class="ion-eye"></i>Visualizar</a></li>
                                    </ul>
                                </div>
                                <!-- blog-info -->
                            </div>
                            <!-- single-post -->
                        </div>
                        <!-- card -->
                    </div>
                    <!-- col-md-6 col-sm-12 -->
                    @endforeach
                    @else
                    Nenhum Artesão Cadastrado!
                    @endif
                </div>
                <!-- row -->
            </div>
            <!-- col-lg-8 col-md-12 -->

            <div class="col-lg-4 col-md-12 ">
                <div class="single-post info-area">
                    <div class="subscribe-area">
                        <h4 class="title"><b>Filtrar</b></h4>
						<div class="input-group">
						   <input type="text" class="form-control" placeholder="Informe o Nome do Artesão">
						   <span class="input-group-btn">
								<button class="btn btn-default" type="button" type="submit" style="cursor: pointer;"><i class="ion-ios-search-strong"></i></button>
						   </span>
						</div>
                    </div>
                    <!-- subscribe-area -->

                    <div class="tag-area">
                        <h4 class="title"><b>Tipos</b></h4>
                        <div class="form-group">
                            @foreach($tipos_artesanato as $tipo_artesanato)
                            <div class="checkbox">
                                <label>
                                <input type="checkbox" name="tipos_artesanato[]" value="{{ $tipo_artesanato->id }}">
                                {{ $tipo_artesanato->nome }}
                                </label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- tag-area -->

                    <div class="tag-area">
                        <h4 class="title"><b>Finalidades</b></h4>
                        <div class="form-group">
                            @foreach($finalidades_producao as $finalidade_producao)
                            <div class="checkbox">
                                <label>
                                <input type="checkbox" name="finalidades_producao[]" value="{{ $finalidade_producao->id }}">
                                {{ $finalidade_producao->nome }}
                                </label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- tag-area -->

                    <div class="tag-area">
                        <h4 class="title"><b>Técnicas</b></h4>
                        <div class="form-group">
                            @foreach($tecnicas_producao as $tecnica_producao)
                            <div class="checkbox">
                                <label>
                                <input type="checkbox" name="tecnicas_producao[]" value="{{ $tecnica_producao->id }}">
                                {{ $tecnica_producao->nome }}
                                </label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- tag-area -->
                </div>
                <!-- info-area -->
            </div>
            <!-- col-lg-4 col-md-12 -->
        </div>
        <!-- row -->
        
    </div>
    <!-- container -->
</section>
<!-- section -->
@stop