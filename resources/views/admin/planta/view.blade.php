@extends('adminlte::page')



@section('title', 'Adicionar Nova Planta')

@section('content_header')
    <h1>Visualização <small>Planta</small></h1>
@stop

@section('content')
	<form action="{{ route('planta.add.post') }}" method="post">
		{!! csrf_field() !!}
		<!-- SELECT2 EXAMPLE -->
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Dados da Planta</h3>
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
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="nome_cientifico">Nome Científico</label>
							<input type="text" class="form-control" name="nome_cientifico" id="nome_cientifico" placeholder="Informe o Nome Científico" value="{{ $planta['nome_cientifico'] }}" disabled>
						</div>
						<div class="form-group">
							<label for="nome_popular">Nome(s) Popular(es)</label>
							<input type="text" class="form-control" style="width: 100%;" name="nome_popular" id="nome_popular" placeholder="Informe os Nomes Populares" value="{{ $planta['nome_popular'] }}" disabled>
						</div>

						<div class="form-group">
							<label for="autoria">Autoria</label>
							<input type="text" class="form-control" name="autoria" id="autoria" placeholder="Informe a Autoria" value="{{ $planta['autoria'] }}" disabled>
						</div>

						<div class="form-group">
							<label for="e_panc">Planta Alimentícia Não Convencional (PANC)?</label>
							<div class="radio">
								<label>
									Sim
									<input type="radio" class="minimal" value="1" name="e_panc" id="e_panc_sim" {{ ($planta['e_panc'] == '1' ? 'checked' : '') }} disabled>
								</label>
								<label>
									Nao
									<input type="radio" class="minimal" value="0" name="e_panc" id="e_panc_sim" {{ ($planta['e_panc'] == '0' ? 'checked' : '') }} disabled>
								</label>
							</div>
						</div>

						<div class="form-group">
							<label>Época de Floração</label>
							<div class="row">
								<div class="col-xs-6">
									<label>Mês de Início</label>
									<div class="input-group date">
										<div class="input-group-addon">
											<i class="fa fa-calendar"></i>
										</div>
										<select name="ep_floracao_inicio" class="form-control select2" style="width: 100%;" data-placeholder="Selecione" disabled>
											<option></option>
										@foreach($lista_meses as $key_mes=>$item_mes)                                   
											<option value="{{ $key_mes }}" {{ ($planta['ep_floracao_inicio'] == $key_mes ? 'selected' : '') }}>
												{{ $item_mes }}
											</option>
										@endforeach
										</select>
									</div>
								</div>
								<div class="col-xs-6">
									<label>Mês de Fim</label>
									<div class="input-group date">
										<div class="input-group-addon">
											<i class="fa fa-calendar"></i>
										</div>
										<select name="ep_floracao_fim" class="form-control select2" style="width: 100%;" data-placeholder="Selecione" disabled>
											<option></option>
										@foreach($lista_meses as $key_mes=>$item_mes)                                   
											<option value="{{ $key_mes }}" {{ ($planta['ep_floracao_fim'] == $key_mes ? 'selected' : '') }}>
												{{ $item_mes }}
											</option>
										@endforeach
										</select>
									</div>
								</div>
							</div>
						</div>
						<!-- /.form-group -->
					</div>
					<!-- /.col -->
					<div class="col-md-6">
						<div class="form-group {{ $errors->has('grau_ameaca_iucn') ? 'has-error' : '' }}">
							<label>Grau de Risco IUCN</label>
							<select name="grau_ameaca_iucn" class="form-control select2" style="width: 100%;" data-placeholder="Selecione" disabled>
								<option></option>
							@foreach($lista_iucn as $key_iucn=>$item_iucn)
								<option value="{{ $key_iucn }}" {{ ($planta['grau_ameaca_iucn'] == $key_iucn ? 'selected' : '') }}>
									{{ $item_iucn }}
								</option>
							@endforeach
							</select>
						</div>
						<!-- /.form-group -->
						<div class="form-group">
							<label>Biomas</label>
							<select name="biomas[]" class="form-control select2" multiple="multiple" data-placeholder="Selecione o(s) Bioma(s)" style="width: 100%;" disabled>
								@foreach($biomas as $skey=>$bioma)
									<option value="{{$bioma->id }}" {{ ($planta->biomas->contains($bioma->id) ? 'selected' : '') }}>
										{{ $bioma->nome }}
									</option>
								@endforeach
							</select>
						</div>
						<!-- /.form-group -->

						<div class="form-group">
							<label>Distribuição Geográfica</label>
							<select name="dist_geografica[]" class="form-control select2" multiple="multiple" data-placeholder="Selecione o(s) Estados(s)" style="width: 100%;" disabled>
								@foreach($estados as $estado)
									<option value="{{ $estado->id }}" {{ ($planta->dist_geografica->contains($estado->id) ? 'selected' : '') }}>
										{{ $estado->nome }} ({{ $estado->sigla }})
									</option>
								@endforeach
							</select>
						</div>
						<!-- /.form-group -->

						<div class="form-group {{ $errors->has('descricao') ? 'has-error' : '' }}">
							<label for="descricao">Descrição</label>
							<textarea class="form-control" rows="6" name="descricao" id="descricao" placeholder="Informe a Descrição" disabled>{{ $planta['descricao'] }}</textarea>
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
					@if($planta->imagens)
						@foreach($planta->imagens->toArray() as $key => $imagem)
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
				<a href="{{ route('planta.edit.get', $planta['id']) }}" class="btn btn-primary" title="Editar">Editar</a>
				<a href="{{ route('planta.index.get') }}" class="btn btn-warning " title="Voltar">Voltar</a>
			</div>
		</div>
		<!-- /.box -->
	</form>
@stop

@section('custom_js')
	<!-- Page script -->
	<script>
		$(function () {
			//Initialize Select2 Elements
			$('.select2').select2({
				language: "pt-BR"
			});
			$("#nome_popular").tagsinput({
				confirmKeys: [13, 188],
				tagClass: function(item) {
					return 'label label-primary';
				},
				interactive: false,
				freeinput: false
			});

			function disableTagsInput(){
				$(".bootstrap-tagsinput > input").prop("readonly", true);
			}

			disableTagsInput();			

			$('.bootstrap-tagsinput input').on('keypress', function(e){
				if (e.keyCode == 13){
					e.keyCode = 188;
					e.preventDefault();
				};
			});
			$('#nome_popular').on('beforeItemAdd', function(event) {
				if (event.item !== event.item.toLowerCase()) {
					event.cancel = true;
					$(this).tagsinput('add', event.item.toLowerCase());
				}
			});
			//iCheck for checkbox and radio inputs
			function startiCheck(element, index){
				$('#'+element+index).iCheck({
					checkboxClass: 'icheckbox_minimal-blue',
					radioClass   : 'iradio_minimal-blue'
				});

				$('#'+element+index).on('ifChecked', function(event){
					$('[id^='+element+']').not('#'+element+index).each(function(){
						$(this).iCheck('uncheck');
					});
				});
			}

			$('input.minimal[type=radio]').iCheck({
				checkboxClass: 'icheckbox_minimal-blue',
				radioClass   : 'iradio_minimal-blue'
			});

			function start_FileStyle(){
				$(":file").filestyle({
					buttonName: "btn-primary",
					buttonText : 'Selecione',
				});
			}	

			configLightbox();
			
		});

		

	</script>
@append