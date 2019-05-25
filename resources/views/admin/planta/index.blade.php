@extends('adminlte::page')

@section('title', 'Plantas')

@section('content_header')
    <h1>Plantas <small>Listagem de Plantas</small></h1>
@stop

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="box">
				
				<!-- /.box-header -->
				<div class="box-header with-border">
					<div class="btn-group">
						<a class="btn btn-block btn-info " href="{{ route('planta.add.get')}}" role="button" title="Adicionar">
							Adicionar <i class="fa fa-plus"></i>
						</a>
					</div>
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
					<div class="box-body table-responsive no-padding">
						<table class="table table-bordered text-center">
							<tbody>
								<tr>
									<th style="min-width: 10px !important;vertical-align:middle;" class="align-middle">#</th>
									<th style="vertical-align:middle;" class="align-middle">Nome Científico</th>
									<th style="vertical-align:middle;" class="align-middle">Nome Popular</th>
									<th style="vertical-align:middle;" style="width: 40px;" class="align-middle">Ações</th>
								</tr>
								@foreach($plantas as $planta)
								<tr>
									<td style="vertical-align:middle;" class="align-middle">{{ $planta->id }}</td>
									<td style="vertical-align:middle;" class="align-middle"><i>{{ str_limit($planta->nome_cientifico, 50) }}</i></td>
									<td style="vertical-align:middle;" class="align-middle">{{ str_limit($planta->nome_popular, 50) }}</td>
									<td style="vertical-align:middle;" class="text-center align-middle">
										<div style="display:block;min-width:50px !important;">
											<a class="btn btn-info btn-xs" style="" href="{{ route('planta.view.get', $planta->id)}}" role="button" title="Ver"><i class="fa fa-eye"></i></a>
											<a href="{{ route('planta.edit.get', $planta['id']) }}" class="btn btn-primary btn-xs" title="Editar"><i class="fa fa-pencil"></i></a>
											<form id="del_planta_{{$planta->id}}" class="delete" style="display: inline-block;" action="{{ route('planta.delete', $planta->id)}}" method="POST">			
												<button type="text" id="btn_del_planta_{{$planta->id}}" class="btn btn-danger btn-xs" title="Excluir"><i class="fa fa-trash"></i></button>
												@csrf
												@method('DELETE')
											</form>
										</div>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
				<!-- /.box-body -->
				<div class="box-footer clearfix">
					{{ $plantas->links() }}
				</div>
			</div>
			<!-- /.box -->
		</div>
		<!-- /.col -->
	</div>
	<!-- Modal -->
	<div id="content-modal">
		
	</div>
@stop

@section('custom_js')
	<script>
		$(".delete2").on("submit", function(value){
			console.log(value);
			return confirm("Desejar realmente Excluir?");
		});

		function deletePlanta(id_form){
			$('#'+id_form).submit();
		}

		$(".delete").on("click", function(e){
			e.preventDefault();
			titulo = 'Confirmação de Exclusão';
			mensagem = '<p>A exclusão de um registro é um processo irreversível!</p><p>Deseja prosseguir com a exclusão?</p>';
			data = $(this).attr('id');
			modal = templateModalDelete(titulo, mensagem, data);
			$('#content-modal').html(modal);
			confirmDelete();
			$('#modal').modal('show');
		});

		function confirmDelete(){
			$(".delete-confirm").on("click", function(e){
				e.preventDefault();
				idform = $(this).attr('data-idform');
				$('#'+idform).submit();
			});
		}
	</script>
@append