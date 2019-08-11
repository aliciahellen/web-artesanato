@extends('adminlte::page')



@section('title', 'Cadastro Novo Artesão')

@section('content_header')
    <h1>Adicionar <small>Novo Artesão</small></h1>
@stop

@section('content')
	<form id="novo_artesao" action="{{ route('artesao.add.post') }}" method="post">
		{!! csrf_field() !!}
		<!-- SELECT2 EXAMPLE -->
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Dados do Artesão</h3>
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
						<div class="form-group {{ $errors->has('nome') ? 'has-error' : '' }}">
							<label for="nome">Nome</label>
							<input type="text" class="form-control" name="nome" id="nome" placeholder="Informe o Nome" value="{{ old('nome') }}">
							@if ($errors->has('nome'))
							<span class="help-block">
								{{ $errors->first('nome') }}
							</span>
							@endif
						</div>
						<div class="form-group {{ $errors->has('endereco') ? 'has-error' : '' }}">
							<label for="nome">Endereço</label>
							<input type="text" class="form-control" name="endereco" id="endereco" placeholder="Informe o Endereço" value="{{ old('endereco') }}">
							@if ($errors->has('endereco'))
							<span class="help-block">
								{{ $errors->first('endereco') }}
							</span>
							@endif
						</div>

						<div class="form-group {{ $errors->has('telefone') ? 'has-error' : '' }}">
							<label for="nome">Telefone</label>
							<input type="text" class="form-control phone" name="telefone" id="telefone" placeholder="Informe o Telefone" value="{{ old('telefone') }}">
							@if ($errors->has('telefone'))
							<span class="help-block">
								{{ $errors->first('telefone') }}
							</span>
							@endif
						</div>

						<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
							<label for="email">E-mail</label>
							<input type="text" class="form-control" name="email" id="email" placeholder="Informe o E-mail" value="{{ old('email') }}">
							@if ($errors->has('email'))
							<span class="help-block">
								{{ $errors->first('email') }}
							</span>
							@endif
						</div>

						<div class="form-group {{ $errors->has('loc_latitude') ? 'has-error' : '' }}">
							<label for="nome">Latitude</label>
							<input type="text" class="form-control" name="loc_latitude" id="loc_latitude" placeholder="Informe a Latitude" value="{{ old('telefone') }}">
							@if ($errors->has('loc_latitude'))
							<span class="help-block">
								{{ $errors->first('loc_latitude') }}
							</span>
							@endif
						</div>

						<div class="form-group {{ $errors->has('loc_longitude') ? 'has-error' : '' }}">
							<label for="nome">Longitude</label>
							<input type="text" class="form-control" name="loc_longitude" id="loc_longitude" placeholder="Informe a Longitude" value="{{ old('loc_longitude') }}">
							@if ($errors->has('loc_longitude'))
							<span class="help-block">
								{{ $errors->first('loc_longitude') }}
							</span>
							@endif
						</div>
					</div>
					<!-- /.col -->
					<div class="col-md-6">
						<div class="form-group {{ $errors->has('tipos_artesanato') ? 'has-error' : '' }}">
							<label>Tipos de Artesanato</label>
							<select name="tipos_artesanato[]" class="form-control select2" multiple="multiple" data-placeholder="Selecione o(s) Tipos(s) de Artesanato" style="width: 100%;">
								@foreach($tipos_artesanato as $skey=>$tipo_artesanato)
									<option value="{{$tipo_artesanato->id }}" {{ (collect(old('tipos_artesanato'))->contains($tipo_artesanato->id) ? 'selected' : '') }}>
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
						<!-- /.form-group -->

						<div class="form-group {{ $errors->has('finalidades_producao') ? 'has-error' : '' }}">
							<label>Finalidades da Produção</label>
							<select name="finalidades_producao[]" class="form-control select2" multiple="multiple" data-placeholder="Selecione a(s) Finalidade(s) da Produção" style="width: 100%;">
								@foreach($finalidades_producao as $skey=>$finalidade_producao)
									<option value="{{$finalidade_producao->id }}" {{ (collect(old('finalidades_producao'))->contains($finalidade_producao->id) ? 'selected' : '') }}>
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
							<select name="tecnicas_producao[]" class="form-control select2" multiple="multiple" data-placeholder="Selecione a(s) Técnica(s) de Produção" style="width: 100%;">
								@foreach($tecnicas_producao as $skey=>$tecnica_producao)
									<option value="{{$tecnica_producao->id }}" {{ (collect(old('tecnicas_producao'))->contains($tecnica_producao->id) ? 'selected' : '') }}>
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
							<textarea class="form-control" rows="6" name="descricao" id="descricao" placeholder="Informe a Descrição">{{ old('descricao') }}</textarea>
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

			<div class="box-body">
				<div class="row">
					<div class="col-md-12">
						<h4 class="box-title">Imagens</h4>
					</div>
					<div class="col-md-12">
						<button class="btn btn-success add-imagem" type="button" style="float:right;"><i class="glyphicon glyphicon-plus"></i> Nova Imagem</button>
					</div>
				</div>
				
				<!-- Copy Fields -->
				<div id="after-add-more">
					@if(old('imagens') && is_array(old('imagens')))
						@foreach(Helper::remove_empty_itens_array(old('imagens'), true) as $key => $imagem)
						@if(is_numeric($key) && is_array($imagem))
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<div class="row vertical-align">
										<div class="col-xs-4">
										<div class="content-img">
											<a href="#" class="thumbnail" style="margin-bottom: 0px;">
												<img id="imagem_preview_{{ $key }}" class="thumb-planta" src="{{ (!isset($imagem['url']) ? asset('public/img/img-planta-default-336x180.png') : $imagem['url']) }}" alt="Imagem {{ $key+1 }}" title="Imagem {{ $key+1 }}">
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
				<a href="{{ route('artesao.index.get') }}" class="btn btn-danger" title="Salvar">Cancelar</a>
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

		configjQueryMask('.phone');
		$("#novo_artesao").submit(function() {
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