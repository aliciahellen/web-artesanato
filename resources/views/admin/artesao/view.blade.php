@extends('adminlte::page')

@section('title', 'Visualizar Artesão')

@section('content_header')
    <h1>Visualização <small>Artesão</small></h1>
@stop

@section('content')
		<!-- SELECT2 EXAMPLE -->
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Dados do Artesão</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				@if (session()->has('sucesso'))
				<div class="alert alert-success alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<h4><i class="icon fa fa-check"></i> Sucesso!</h4>
					{{ session('sucesso') }}
				</div>
				@endif
				@if (session()->has('erro'))
				<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<h4><i class="icon fa fa-check"></i> Erro!</h4>
					{{ session('erro') }}
				</div>
				@endif
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="nome">Nome</label>
							<input type="text" class="form-control" name="nome" id="nome" placeholder="" value="{{ $artesao['nome'] }}" disabled>
						</div>
						<div class="form-group">
							<label for="nome">Endereço</label>
							<input type="text" class="form-control" name="endereco" id="endereco" placeholder="" value="{{ $artesao['endereco'] }}" disabled>
						</div>
						<div class="form-group">
							<label for="nome">Telefone</label>
							<input type="text" class="form-control phone" name="telefone" id="telefone" placeholder="" value="{{ $artesao['telefone'] }}" disabled>
						</div>
						<div class="form-group">
							<label for="nome">E-mail</label>
							<input type="text" class="form-control" name="email" id="email" placeholder="" value="{{ $artesao['email'] }}" disabled>
						</div>
						<div class="form-group">
							<label>Tipos de Artesanato</label>
							<select name="tipos_artesanato[]" class="form-control select2" multiple="multiple" data-placeholder="" style="width: 100%;" disabled>
								@foreach($tipos_artesanato as $skey=>$tipo_artesanato)
									<option value="{{$tipo_artesanato->id }}" {{ ($artesao->tipos_artesanato->contains($tipo_artesanato->id) ? 'selected' : '') }}>
										{{ $tipo_artesanato->nome }}
									</option>
								@endforeach
							</select>
						</div>
						<!-- /.col -->
					</div>
					<!-- /.col -->
					
					<div class="col-md-6">
						<div class="form-group">
							<label>Finalidades da Produção</label>
							<select name="finalidades_producao[]" class="form-control select2" multiple="multiple" data-placeholder="" style="width: 100%;" disabled>
								@foreach($finalidades_producao as $skey=>$finalidade_producao)
									<option value="{{$finalidade_producao->id }}" {{ ($artesao->finalidades_producao->contains($finalidade_producao->id) ? 'selected' : '') }}>
										{{ $finalidade_producao->nome }}
									</option>
								@endforeach
							</select>
						</div>
						<!-- /.form-group -->

						<div class="form-group">
							<label>Técnicas de Produção</label>
							<select name="tecnicas_producao[]" class="form-control select2" multiple="multiple" data-placeholder="" style="width: 100%;" disabled>
								@foreach($tecnicas_producao as $skey=>$tecnica_producao)
									<option value="{{$tecnica_producao->id }}" {{ ($artesao->tecnicas_producao->contains($tecnica_producao->id) ? 'selected' : '') }}>
										{{ $tecnica_producao->nome }}
									</option>
								@endforeach
							</select>
						</div>
						<!-- /.form-group -->

						<div class="form-group {{ $errors->has('descricao') ? 'has-error' : '' }}">
							<label for="descricao">Descrição</label>
							<textarea class="form-control" rows="8" name="descricao" id="descricao" placeholder="Informe a Descrição" disabled>{{ $artesao['descricao'] }}</textarea>
						</div>
						<!-- /.form-group -->
					</div>
					<!-- /.col -->
					
				</div>
				<!-- /.row -->

			</div>
			<!-- /.box-body -->

			<div class="box-body">
				<div class="row">
					<div class="col-md-12">
						<h4 class="box-title">Imagens</h4>
					</div>
					<div class="col-md-12">
						
					</div>
				</div>
				
				<!-- Copy Fields -->
				<div id="after-add-more">
					@if($artesao->imagens)
						@foreach($artesao->imagens->toArray() as $key => $imagem)
						@if(is_numeric($key) && is_array($imagem))
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<div class="row vertical-align">
										<div class="col-xs-4">
										<div class="content-img">
											<a class="thumbnail gallery" style="margin-bottom: 0px;" data-lightbox="imagens_planta" data-title="{{ (isset($imagem['autor']) ? 'Autor: '.$imagem['autor'] : '') }} <br> {{ (isset($imagem['fonte']) ? 'Fonte: '.$imagem['fonte'] : '') }}" href="{{ (!isset($imagem['url']) ? asset('public/img/img-planta-default-336x180.png') : $imagem['url']) }}">
												<img id="imagem_preview_{{ $key }}" class="thumb-planta" src="{{ (!isset($imagem['url']) ? asset('public/img/img-planta-default-336x180.png') : $imagem['url']) }}" alt="Imagem {{ $key+1 }}" title="Imagem {{ $key+1 }}"/>
											</a>
										</div>
										</div>
										<div class="col-xs-8" style="padding-left:0px;">
											<div class="col-xs-12" style="padding-left:0px;padding-right:0px;">
												<label for="url">URL</label>	
												<input type="text" class="form-control" name="imagens[{{ $key }}][url]" id="imagem_url_{{ $key }}" value="{{ (isset($imagem['url']) ? $imagem['url'] : '') }}" placeholder="Informe a URL da Imagem. http://www.site.com/imagem.jpg" disabled>
											</div>
											<div class="col-xs-12" style="padding-left:0px;padding-right:0px;">
												<div class="col-xs-6" style="padding-left:0px;">
													<label for="autoria">Autor:</label>
													<input type="text" class="form-control" name="imagens[{{ $key }}][autor]" id="imagem_autor_{{ $key }}" placeholder="Informe o Autor da Imagem" value="{{ (isset($imagem['autor']) ? $imagem['autor'] : '') }}" disabled>
												</div>
												<div class="col-xs-6" style="padding-left:0px;padding-right:0px;">
													<label for="autoria">Fonte:</label>
													<input type="text" class="form-control" name="imagens[{{ $key }}][fonte]" id="imagem_fonte_{{ $key }}" placeholder="Informe a Fonte da Imagem" value="{{ (isset($imagem['fonte']) ? $imagem['fonte'] : '') }}" disabled>
												</div>
											</div>
											<div class="col-xs-12" style="padding-left:0px;padding-right:0px;margin-top:10px;">
												<div class="col-xs-6" style="padding-left:0px;">
												</div>
												<div class="col-xs-6" style="padding-left:0px;padding-right:0px;text-align:right;">
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- /.form-group -->
							</div>
						</div>
						@endif
						@endforeach
					@endif
				</div>
			</div>

			<div class="box-footer">
				<a href="{{ route('artesao.edit.get', $artesao['id']) }}" class="btn btn-primary" title="Editar">Editar</a>
				<a href="{{ route('artesao.index.get') }}" class="btn btn-warning " title="Voltar">Voltar</a>
			</div>
		</div>
		<!-- /.box -->
@stop

@section('custom_js')
	<!-- Page script -->
	<script>
		$(function () {
			//Initialize Select2 Elements
			$('.select2').select2({
				language: "pt-BR"
			});

			function disableTagsInput(){
				$(".bootstrap-tagsinput > input").prop("readonly", true);
			}

			disableTagsInput();

			$('input.minimal[type=radio]').iCheck({
				checkboxClass: 'icheckbox_minimal-blue',
				radioClass   : 'iradio_minimal-blue'
			});

			configjQueryMask('.phone');

			configLightbox();
		});
	</script>
@append