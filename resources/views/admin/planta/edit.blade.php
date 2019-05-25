@extends('adminlte::page')



@section('title', 'Edição de Planta')

@section('content_header')
    <h1>Editar <small> Planta</small></h1>
@stop

@section('content')
	<form action="{{ route('planta.edit.post', $planta['id']) }}" method="post">
		{!! csrf_field() !!}
		<!-- SELECT2 EXAMPLE -->
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Dados da Planta</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				@if ($errors->any())
				<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<h4><i class="icon fa fa-ban"></i> Erros de Validação!</h4>
					<ul>
						@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
				@endif
				<div class="row">
					<div class="col-md-6">
						<div class="form-group {{ $errors->has('nome_cientifico') ? 'has-error' : '' }}">
							<label for="nome_cientifico">Nome Científico</label>
							<input type="text" class="form-control" name="nome_cientifico" id="nome_cientifico" placeholder="Informe o Nome Científico" value="{{ (old('nome_cientifico') !== null ? old('nome_cientifico') : $planta['nome_cientifico']) }}">
							@if ($errors->has('nome_cientifico'))
							<span class="help-block">
								{{ $errors->first('nome_cientifico') }}
							</span>
							@endif
						</div>
						<div class="form-group {{ $errors->has('nome_popular') ? 'has-error' : '' }}">
							<label for="nome_popular">Nome(s) Popular(es)</label> {{ old('nome_popular') }}
							<input type="text" class="form-control" style="width: 100%;" name="nome_popular" id="nome_popular" placeholder="Informe os Nomes Populares" value="{{ (old('nome_popular') !== null ? old('nome_popular') : $planta['nome_popular']) }}"/>
							@if ($errors->has('nome_popular'))
							<span class="help-block">
								{{ $errors->first('nome_popular') }}
							</span>
							@endif
						</div>

						<div class="form-group {{ $errors->has('autoria') ? 'has-error' : '' }}">
							<label for="autoria">Autoria</label>
							<input type="text" class="form-control" name="autoria" id="autoria" placeholder="Informe a Autoria" value="{{ (old('autoria') !== null ? old('autoria') : $planta['autoria']) }}">
							@if ($errors->has('autoria'))
							<span class="help-block">
								{{ $errors->first('autoria') }}
							</span>
							@endif
						</div>

						<div class="form-group {{ $errors->has('e_panc') ? 'has-error' : '' }}">
							<label for="e_panc">Planta Alimentícia Não Convencional (PANC)?</label>
							<div class="radio">
								<label>
									Sim
									<input type="radio" class="minimal" value="1" name="e_panc" id="e_panc_sim" {{ (old('e_panc') !== null ? (old('e_panc') == '1' ? 'checked' : '') : ($planta['e_panc'] == '1' ? 'checked' : '')) }}>
								</label>
								<label>
									Nao
									<input type="radio" class="minimal" value="0" name="e_panc" id="e_panc_nao" {{ (old('e_panc') !== null ? (old('e_panc') == '0' ? 'checked' : '') : ($planta['e_panc'] == '0' ? 'checked' : '')) }}>
								</label>
							</div>
							@if ($errors->has('e_panc'))
							<span class="help-block">
								{{ $errors->first('e_panc') }}
							</span>
							@endif
						</div>

						<div class="form-group {{ $errors->has('ep_floracao_inicio') || $errors->has('ep_floracao_fim') ? 'has-error' : '' }}">
							<label>Época de Floração</label>
							<div class="row">
								<div class="col-xs-6">
									<label>Mês de Início</label>
									<div class="input-group date">
										<div class="input-group-addon">
											<i class="fa fa-calendar"></i>
										</div>
										<select name="ep_floracao_inicio" class="form-control select2" style="width: 100%;" data-placeholder="Selecione">
											<option></option>
										@foreach($lista_meses as $key_mes=>$item_mes)
											<option value="{{ $key_mes }}"}} {{ (old('ep_floracao_inicio') !== null ? (old('ep_floracao_inicio') == $key_mes ? 'selected' : '') : ($planta['ep_floracao_inicio'] == $key_mes ? 'selected' : '')) }}>
												{{ $item_mes }}
											</option>
										@endforeach
										</select>
									</div>
									@if ($errors->has('ep_floracao_inicio'))
									<span class="help-block">
										{{ $errors->first('ep_floracao_inicio') }}
									</span>
									@endif
								</div>
								<div class="col-xs-6">
									<label>Mês de Fim</label>
									<div class="input-group date">
										<div class="input-group-addon">
											<i class="fa fa-calendar"></i>
										</div>
										<select name="ep_floracao_fim" class="form-control select2" style="width: 100%;" data-placeholder="Selecione">
											<option></option>
										@foreach($lista_meses as $key_mes=>$item_mes)
											<option value="{{ $key_mes }}"}} {{ (old('ep_floracao_fim') !== null ? (old('ep_floracao_fim') == $key_mes ? 'selected' : '') : ($planta['ep_floracao_fim'] == $key_mes ? 'selected' : '')) }}>
												{{ $item_mes }}
											</option>
										@endforeach
										</select>
									</div>
									@if ($errors->has('ep_floracao_fim'))
									<span class="help-block">
										{{ $errors->first('ep_floracao_fim') }}
									</span>
									@endif
								</div>
							</div>
						</div>
						<!-- /.form-group -->
					</div>
					<!-- /.col -->
					<div class="col-md-6">
						<div class="form-group {{ $errors->has('grau_ameaca_iucn') ? 'has-error' : '' }}">
							<label>Grau de Risco IUCN</label>
							<select name="grau_ameaca_iucn" class="form-control select2" style="width: 100%;" data-placeholder="Selecione">
								<option></option>
							@foreach($lista_iucn as $key_iucn=>$item_iucn)
								<option value="{{ $key_iucn }}"}} {{ (old('grau_ameaca_iucn') !== null ? (old('grau_ameaca_iucn') == $key_iucn ? 'selected' : '') : ($planta['grau_ameaca_iucn'] == $key_iucn ? 'selected' : '')) }}>
									{{ $item_iucn }}
								</option>
							@endforeach
							</select>
							@if ($errors->has('grau_ameaca_iucn'))
							<span class="help-block">
								{{ $errors->first('grau_ameaca_iucn') }}
							</span>
							@endif
						</div>
						<!-- /.form-group -->
						<div class="form-group {{ $errors->has('biomas') ? 'has-error' : '' }}">
							<label>Biomas</label>
							<select name="biomas[]" class="form-control select2" multiple="multiple" data-placeholder="Selecione o(s) Bioma(s)" style="width: 100%;">
								@foreach($biomas as $skey=>$bioma)
									<option value="{{$bioma->id }}" {{ (old('biomas') !== null ? (collect(old('biomas'))->contains($bioma->id) ? 'selected' : '') : ($planta['biomas']->contains($bioma->id) ? 'selected' : '')) }}>
										{{ $bioma->nome }}
									</option>
								@endforeach
							</select>
							@if ($errors->has('biomas'))
							<span class="help-block">
								{{ $errors->first('biomas') }}
							</span>
							@endif
						</div>
						<!-- /.form-group -->

						<div class="form-group {{ $errors->has('dist_geografica') ? 'has-error' : '' }}">
							<label>Distribuição Geográfica</label>
							<select name="dist_geografica[]" class="form-control select2" multiple="multiple" data-placeholder="Selecione o(s) Estados(s)" style="width: 100%;">
								@foreach($estados as $estado)
									<option value="{{ $estado->id }}" {{ (old('dist_geografica') !== null ? (collect(old('dist_geografica'))->contains($estado->id) ? 'selected' : '') : ($planta['dist_geografica']->contains($estado->id) ? 'selected' : '')) }}>
										{{ $estado->nome }} ({{ $estado->sigla }})
									</option>
								@endforeach
							</select>
							@if ($errors->has('dist_geografica'))
							<span class="help-block">
								{{ $errors->first('dist_geografica') }}
							</span>
							@endif
						</div>
						<!-- /.form-group -->

						<div class="form-group {{ $errors->has('descricao') ? 'has-error' : '' }}">
							<label for="descricao">Descrição</label>
							<textarea class="form-control" rows="6" name="descricao" id="descricao" placeholder="Informe a Descrição">{{ (old('descricao') !== null ? old('descricao') : $planta['descricao']) }}</textarea>
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
				$imagens = $planta->imagens->toArray();
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
				<a href="{{ route('planta.index.get') }}" class="btn btn-danger" title="Salvar">Cancelar</a>
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

			configTagsInput('#nome_popular');
			$('#nome_popular').on('beforeItemAdd', function(event) {
				if (event.item !== event.item.toLowerCase()) {
					event.cancel = true;
					$(this).tagsinput('add', event.item.toLowerCase());
				}
			});

			configICheck();
			function startiCheck(element, index){
				configICheck('#'+element+index);
				$('#'+element+index).on('ifChecked', function(event){
					$('[id^='+element+']').not('#'+element+index).each(function(){
						$(this).iCheck('uncheck');
					});
				});
			}
			
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