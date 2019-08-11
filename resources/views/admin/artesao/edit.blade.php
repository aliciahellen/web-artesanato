@extends('adminlte::page')

@section('title', 'Visualizar Artesão')

@section('content_header')
    <h1>Visualização <small>Artesão</small></h1>
@stop

@section('content')
	<form id="edicao_artesao" action="{{ route('artesao.edit.post', $artesao['id']) }}" method="post">
		{!! csrf_field() !!}
		<!-- SELECT2 EXAMPLE -->
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Dados do Artesão</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group {{ $errors->has('nome') ? 'has-error' : '' }}">
							<label for="nome">Nome</label>
							<input type="text" class="form-control" name="nome" id="nome" placeholder="" value="{{ (old('nome') !== null ? old('nome') : $artesao['nome']) }}">
							@if ($errors->has('nome'))
							<span class="help-block">
								{{ $errors->first('nome') }}
							</span>
							@endif
						</div>
						<div class="form-group {{ $errors->has('endereco') ? 'has-error' : '' }}">
							<label for="nome">Endereço</label>
							<input type="text" class="form-control" name="endereco" id="endereco" placeholder="" value="{{ (old('endereco') !== null ? old('endereco') : $artesao['endereco']) }}">
							@if ($errors->has('endereco'))
							<span class="help-block">
								{{ $errors->first('endereco') }}
							</span>
							@endif
						</div>
						<div class="form-group {{ $errors->has('telefone') ? 'has-error' : '' }}">
							<label for="nome">Telefone</label>
							<input type="text" class="form-control phone" name="telefone" id="telefone" placeholder="" value="{{ (old('telefone') !== null ? old('telefone') : $artesao['telefone']) }}">
							@if ($errors->has('telefone'))
							<span class="help-block">
								{{ $errors->first('telefone') }}
							</span>
							@endif
						</div>
						<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
							<label for="nome">E-mail</label>
							<input type="text" class="form-control" name="email" id="email" placeholder="" value="{{ (old('email') !== null ? old('email') : $artesao['email']) }}">
							@if ($errors->has('email'))
							<span class="help-block">
								{{ $errors->first('email') }}
							</span>
							@endif
						</div>
						<div class="form-group {{ $errors->has('tipos_artesanato') ? 'has-error' : '' }}">
							<label>Tipos de Artesanato</label>
							<select name="tipos_artesanato[]" class="form-control select2" multiple="multiple" data-placeholder="Selecione o(s) Tipo(s) de Artesanato(s)" style="width: 100%;">
								@foreach($tipos_artesanato as $skey=>$tipo_artesanato)
									<option value="{{$tipo_artesanato->id }}" {{ (old('tipos_artesanato') !== null ? (collect(old('tipos_artesanato'))->contains($tipo_artesanato->id) ? 'selected' : '') : ($artesao['tipos_artesanato']->contains($tipo_artesanato->id) ? 'selected' : '')) }}>
										{{ $tipo_artesanato->nome }}
									</option>
								@endforeach
							</select>
							@if ($errors->has('tipos_artesanato'))
							<span class="help-block">
								{{ $errors->first('tipos_artesanato') }}
							</span>
							@endif
						</div>
					</div>
					<!-- /.col -->
					
					<div class="col-md-6">

						<div class="form-group {{ $errors->has('finalidades_producao') ? 'has-error' : '' }}">
							<label>Finalidades da Produção</label>
							<select name="finalidades_producao[]" class="form-control select2" multiple="multiple" data-placeholder="" style="width: 100%;">
								@foreach($finalidades_producao as $skey=>$finalidade_producao)
									<option value="{{$finalidade_producao->id }}" {{ (old('finalidades_producao') !== null ? (collect(old('finalidades_producao'))->contains($finalidade_producao->id) ? 'selected' : '') : ($artesao['finalidades_producao']->contains($finalidade_producao->id) ? 'selected' : '')) }}>
										{{ $finalidade_producao->nome }}
									</option>
								@endforeach
							</select>
							@if ($errors->has('finalidades_producao'))
							<span class="help-block">
								{{ $errors->first('finalidades_producao') }}
							</span>
							@endif
						</div>
						<!-- /.form-group -->

						<div class="form-group {{ $errors->has('tecnicas_producao') ? 'has-error' : '' }}">
							<label>Técnicas de Produção</label>
							<select name="tecnicas_producao[]" class="form-control select2" multiple="multiple" data-placeholder="" style="width: 100%;">
								@foreach($tecnicas_producao as $skey=>$tecnica_producao)
									<option value="{{$tecnica_producao->id }}" {{ (old('tecnicas_producao') !== null ? (collect(old('tecnicas_producao'))->contains($tecnica_producao->id) ? 'selected' : '') : ($artesao['tecnicas_producao']->contains($tecnica_producao->id) ? 'selected' : '')) }}>
										{{ $tecnica_producao->nome }}
									</option>
								@endforeach
							</select>
							@if ($errors->has('tecnicas_producao'))
							<span class="help-block">
								{{ $errors->first('tecnicas_producao') }}
							</span>
							@endif
						</div>
						<!-- /.form-group -->

						<div class="form-group {{ $errors->has('descricao') ? 'has-error' : '' }}">
							<label for="descricao">Descrição</label>
							<textarea class="form-control" rows="8" name="descricao" id="descricao" placeholder="Informe a Descrição">{{ (old('descricao') !== null ? old('descricao') : $artesao['descricao']) }}</textarea>
							@if ($errors->has('descricao'))
							<span class="help-block">
								{{ $errors->first('descricao') }}
							</span>
							@endif
						</div>
						<!-- /.form-group -->
					</div>
					<!-- /.col -->
					
				</div>
				<!-- /.row -->

			</div>
			<!-- /.box-body -->

			@if(!empty(old('imagens')))
				@php
				$imagens = Helper::remove_empty_itens_array(old('imagens'), true);
				@endphp
			@else
				@php
				$imagens = $artesao->imagens->toArray();
				@endphp
			@endif

			<div class="box-body">
				<div class="row">
					<div class="col-md-12">
						<h4 class="box-title">Imagens</h3>
					</div>
					<div class="col-md-12">
						<button class="btn btn-success add-imagem" type="button" style="float:right;" {{ (sizeof($imagens) < 6 ? '' : 'disabled' ) }}><i class="glyphicon glyphicon-plus"></i> Nova Imagem</button>
					</div>
				</div>
				
				<!-- Copy Fields -->
				<div id="after-add-more">
					@if(!empty($imagens))
						@foreach($imagens as $key => $imagem)
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
											<div id="overlay_{{ $key }}" class="overlay overlay-hide">
												<div class="overlay-content"><img src="{{ asset('public/img/loading.gif') }}" alt="Carregando..."/></div>
											</div>
										</div>
										</div>
										<div class="col-xs-8" style="padding-left:0px;">
											<div class="col-xs-12" style="padding-left:0px;padding-right:0px;">
												<label for="url">URL</label>	
												<input type="text" class="form-control" onchange="loadImageWeb(this)" name="imagens[{{ $key }}][url]" id="imagem_url_{{ $key }}" value="{{ (isset($imagem['url']) ? $imagem['url'] : '') }}" placeholder="Informe a URL da Imagem. http://www.site.com/imagem.jpg">
											</div>
											<div class="col-xs-12" style="padding-left:0px;padding-right:0px;">
												<div class="col-xs-6" style="padding-left:0px;">
													<label for="autoria">Autor:</label>
													<input type="text" class="form-control" name="imagens[{{ $key }}][autor]" id="imagem_autor_{{ $key }}" placeholder="Informe o Autor da Imagem" value="{{ (isset($imagem['autor']) ? $imagem['autor'] : '') }}">
												</div>
												<div class="col-xs-6" style="padding-left:0px;padding-right:0px;">
													<label for="autoria">Fonte:</label>
													<input type="text" class="form-control" name="imagens[{{ $key }}][fonte]" id="imagem_fonte_{{ $key }}" placeholder="Informe a Fonte da Imagem" value="{{ (isset($imagem['fonte']) ? $imagem['fonte'] : '') }}">
												</div>
											</div>
											<div class="col-xs-12" style="padding-left:0px;padding-right:0px;margin-top:10px;">
												<div class="col-xs-6" style="padding-left:0px;">
												</div>
												<div class="col-xs-6" style="padding-left:0px;padding-right:0px;text-align:right;">
													<button type="submit" id="remove_imagem_{{ $key }}" class="btn btn-danger btn-xs remove-image" title="Excluir"><i class="fa fa-trash"></i> Excluir</button>
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
				<button type="submit" class="btn btn-success" title="Salvar">Salvar</button>
				<a href="{{ route('artesao.index.get') }}" class="btn btn-danger" title="Cancelar">Cancelar</a>
			</div>
		</div>
		<!-- /.box -->
	</form>
@stop

@section('custom_js')
	<!-- Page script -->
	<script>
		$(function () {
			configSelect2();

			configLightbox();

			$(".add-imagem").click(function(){ 
				var qtd_images = countImages();
				if(qtd_images < 6){
					$("#after-add-more").append(templateImagemInput(qtd_images, img_loading));
					disableButtonAdd('remove_imagem_'+qtd_images);
					qtd_images++;
				}
				if(!(qtd_images < 6)){
					$('.add-imagem').prop("disabled", true);
				}
			});
		});

		function countImages(){
			var length = $('#after-add-more').children('div.row').length;
			return length;
		}

		$("button.remove-image").click(function( event ) {
			removeImage(this);
			enableButtonAdd();
			event.preventDefault();
		});

		configjQueryMask('.phone');
		$("#edicao_artesao").submit(function() {
			$(".phone").unmask();
		});

		function disableButtonAdd(element){
			$('#'+element).click(function( event ) {
				removeImage($('#'+element));
				enableButtonAdd();
				event.preventDefault();
			});			
		}

		function enableButtonAdd(){
			var qtd_images = countImages();
			if(qtd_images < 6){
				$('.add-imagem').prop("disabled", false);
			}
		}

		function removeImage(obj){
			$(obj).parent().parent().parent().parent().parent().parent().parent().remove();
		}

		function loadImageWeb(obj){
			var url = $(obj).val();
			if (validURL(url)){
				var image = $(obj).parent().parent().parent().children('div.col-xs-4').find('[id^=imagem_preview_]').first();
				var $downloadingImage = $("<img>");
				$(obj).parent().parent().parent().children('div.col-xs-4').find('[id^=overlay_]').first().removeClass('overlay-hide');
				$(image).on('load', function () {
					$(image).parent().next().addClass('overlay-hide');
				}).on('error', function(){
					var id = $(this).attr('id');
					var id_input = id.split('_').pop();
					$('#imagem_url_'+id_input).val('');
					$(this).attr('src', imagemPlantaDefault());
				});

				var loadImage = function(){
					setTimeout(function(){
						image.attr("src", url);
					}, 2000);
				}
				loadImage();
			}else{
				$(obj).val('');
			}
		}
	</script>
@append