@extends('adminlte::page')



@section('title', 'Adicionar Nova Planta')

@section('content_header')
    <h1>Adicionar <small>Nova Planta</small></h1>
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
						<input type="text" class="form-control" name="nome_cientifico" id="nome_cientifico" placeholder="Informe o Nome Científico" value="{{ old('nome_cientifico') }}">
						@if ($errors->has('nome_cientifico'))
						<span class="help-block">
							{{ $errors->first('nome_cientifico') }}
						</span>
						@endif
					</div>
					<div class="form-group {{ $errors->has('nome_popular') ? 'has-error' : '' }}">
						<label for="nome_popular">Nome(s) Popular(es)</label> {{ old('nome_popular') }}
						<input type="text" class="form-control" style="width: 100%;" name="nome_popular" id="nome_popular" placeholder="Informe os Nomes Populares" value="{{ old('nome_popular') }}"/>
						@if ($errors->has('nome_popular'))
						<span class="help-block">
							{{ $errors->first('nome_popular') }}
						</span>
						@endif
					</div>

					<div class="form-group {{ $errors->has('autoria') ? 'has-error' : '' }}">
						<label for="autoria">Autoria</label>
						<input type="text" class="form-control" name="autoria" id="autoria" placeholder="Informe a Autoria" value="{{ old('autoria') }}">
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
								<input type="radio" class="minimal" value="1" name="e_panc" id="e_panc_sim" {{ (old('e_panc') == '1' ? 'checked' : '') }}>
							</label>
							<label>
								Nao
								<input type="radio" class="minimal" value="0" name="e_panc" id="e_panc_sim" {{ (old('e_panc') == '0' ? 'checked' : '') }}>
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
										<option value="{{ $key_mes }}"}} {{ (old('ep_floracao_inicio') == $key_mes ? 'selected' : '') }}>
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
										<option value="{{ $key_mes }}"}} {{ (old('ep_floracao_fim') == $key_mes ? 'selected' : '') }}>
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
							<option value="{{ $key_iucn }}"}} {{ (old('grau_ameaca_iucn') == $key_iucn ? 'selected' : '') }}>
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
								<option value="{{$bioma->id }}"}} {{ (collect(old('biomas'))->contains($bioma->id) ? 'selected' : '') }}>
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
								<option value="{{ $estado->id }}"}} {{ (collect(old('dist_geografica'))->contains($estado->id) ? 'selected' : '') }}>
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
					<h4 class="box-title">Imagens</h3>
				</div>
				<div class="col-md-12">
					<button class="btn btn-success add-imagem" type="button" style="float:right;"><i class="glyphicon glyphicon-plus"></i> Nova Imagem</button>
				</div>
			</div>
			
			<!-- Copy Fields -->
			<div id="after-add-more">
				
			</div>
		</div>

		<div class="box-footer">
			<button type="submit" class="btn btn-success" title="Salvar">Salvar</button>
			<a href="{{ route('planta.index.get') }}" class="btn btn-danger" title="Salvar">Cancelar</a>
		</div>
	</div>
	<!-- /.box -->
	</form>
	<div class="copy hide">
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<div class="row vertical-align">
						<div class="col-xs-4">
							<a href="#" class="thumbnail">
								<img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTcxIiBoZWlnaHQ9IjE4MCIgdmlld0JveD0iMCAwIDE3MSAxODAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzEwMCV4MTgwCkNyZWF0ZWQgd2l0aCBIb2xkZXIuanMgMi42LjAuCkxlYXJuIG1vcmUgYXQgaHR0cDovL2hvbGRlcmpzLmNvbQooYykgMjAxMi0yMDE1IEl2YW4gTWFsb3BpbnNreSAtIGh0dHA6Ly9pbXNreS5jbwotLT48ZGVmcz48c3R5bGUgdHlwZT0idGV4dC9jc3MiPjwhW0NEQVRBWyNob2xkZXJfMTZhZDNiNWE4YWMgdGV4dCB7IGZpbGw6I0FBQUFBQTtmb250LXdlaWdodDpib2xkO2ZvbnQtZmFtaWx5OkFyaWFsLCBIZWx2ZXRpY2EsIE9wZW4gU2Fucywgc2Fucy1zZXJpZiwgbW9ub3NwYWNlO2ZvbnQtc2l6ZToxMHB0IH0gXV0+PC9zdHlsZT48L2RlZnM+PGcgaWQ9ImhvbGRlcl8xNmFkM2I1YThhYyI+PHJlY3Qgd2lkdGg9IjE3MSIgaGVpZ2h0PSIxODAiIGZpbGw9IiNFRUVFRUUiLz48Zz48dGV4dCB4PSI1OS41NTQ2ODc1IiB5PSI5NC41Ij4xNzF4MTgwPC90ZXh0PjwvZz48L2c+PC9zdmc+" alt="Nome da Imagem">
							</a>
						</div>
						<div class="col-xs-8" style="padding-left:0px;">
							<div class="col-xs-12" style="padding-left:0px;padding-right:0px;">
								<label for="autoria">Selecione uma imagem</label>	
								<input class="form-control" name="imagem" id="imagem" type="file" class="filestyle" data-buttonName="btn-primary" multiple="multiple" data-placeholder="Nenhuma imagem selecionada">	
							</div>
							<div class="col-xs-12" style="padding-left:0px;padding-right:0px;">
								<div class="col-xs-6" style="padding-left:0px;">
									<label for="autoria">Autor:</label>
									<input type="text" class="form-control" name="imagem[]" id="autor" placeholder="Informe o Autor da Imagem" value="">
								</div>
								<div class="col-xs-6" style="padding-left:0px;padding-right:0px;">
									<label for="autoria">Fonte:</label>
									<input type="text" class="form-control" name="imagem[]" id="fonte" placeholder="Informe a Fonte da Imagem" value="">
								</div>
							</div>
							<div class="col-xs-12" style="padding-left:0px;padding-right:0px;">
								<div class="col-xs-12" style="padding-left:0px;">
									<button type="submit" class="btn btn-danger btn-xs" title="Cancelar" style="margin-top:10px;">Remover</button>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /.form-group -->
			</div>
		</div>
	</div>
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
				tagClass: function(item) {
					return 'label label-primary';
				}
			});
			$('#nome_popular').on('beforeItemAdd', function(event) {
				if (event.item !== event.item.toLowerCase()) {
					event.cancel = true;
					$(this).tagsinput('add', event.item.toLowerCase());
				}
			});
			//iCheck for checkbox and radio inputs
			$('input.minimal[type=radio]').iCheck({
				checkboxClass: 'icheckbox_minimal-blue',
				radioClass   : 'iradio_minimal-blue'
			});

			//Date picker
			$('#ep_floracao_inicio,#ep_floracao_fim').datepicker({
				autoclose: true,
				language: 'pt-BR',
				format: "mm",
				viewMode: "months", 
				minViewMode: "months",
				changeMonth: false,
				changeYear: false,
				showButtonPanel: false,
				stepMonths: 0,
				minDate: 0,
				maxDate: 0,
				startVal: 0,
				endVal: 0
			});

			function start_FileStyle(){
				$(":file").filestyle({
					buttonName: "btn-primary",
					buttonText : 'Selecione',
				});
			}
			

			

		
			$(".add-imagem").click(function(){ 
				var html = $(".copy").html();
				$("#after-add-more").append(html);
				if($('#after-add-more').children('div.row').length == 6){
					$('.add-imagem').prop("disabled", true);
				}
				start_FileStyle();
				//$('#after-add-more').children('div.row').length;
			});
			$("body").on("click",".remove",function(){ 
				$(this).parents(".control-group").remove();
			});
			
		});
	</script>
@append