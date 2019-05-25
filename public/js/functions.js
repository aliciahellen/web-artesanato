function templateImagemInput(index, img_loading){
	let template = '<div class="row">\
		<div class="col-md-12">\
			<div class="form-group">\
				<div class="row vertical-align">\
					<div class="col-xs-4">\
					<div class="content-img">\
						<a href="#" class="thumbnail" style="margin-bottom: 0px;">\
							<img id="imagem_preview_'+index+'" class="thumb-planta" src="'+imagemPlantaDefault()+'" alt="Nome da Imagem" title="Imagem ${index+1}">\
						</a>\
						<div id="overlay_'+index+'" class="overlay overlay-hide">\
							<div class="overlay-content"><img src="'+img_loading+'" alt="Carregando..."/></div>\
						</div>\
					</div>\
					</div>\
					<div class="col-xs-8" style="padding-left:0px;">\
						<div class="col-xs-12" style="padding-left:0px;padding-right:0px;">\
							<label for="url">URL</label>\
							<input type="text" class="form-control" onchange="loadImageWeb(this)" name="imagens['+index+'][url]" id="imagem_url_'+index+'" value="" placeholder="Informe a URL da Imagem. http://www.site.com/imagem.jpg">\
						</div>\
						<div class="col-xs-12" style="padding-left:0px;padding-right:0px;">\
							<div class="col-xs-6" style="padding-left:0px;">\
								<label for="autoria">Autor:</label>\
								<input type="text" class="form-control" name="imagens['+index+'][autor]" id="imagem_autor_'+index+'" placeholder="Informe o Autor da Imagem" value="">\
							</div>\
							<div class="col-xs-6" style="padding-left:0px;padding-right:0px;">\
								<label for="autoria">Fonte:</label>\
								<input type="text" class="form-control" name="imagens['+index+'][fonte]" id="imagem_fonte_'+index+'" placeholder="Informe a Fonte da Imagem" value="">\
							</div>\
						</div>\
						<div class="col-xs-12" style="padding-left:0px;padding-right:0px;margin-top:10px;">\
							<div class="col-xs-6" style="padding-left:0px;">\
							</div>\
							<div class="col-xs-6" style="padding-left:0px;padding-right:0px;text-align:right;">\
								<button type="submit" id="remove_imagem_'+index+'" class="btn btn-danger btn-xs remove-image" title="Excluir"><i class="fa fa-trash"></i> Excluir</button>\
							</div>\
						</div>\
					</div>\
				</div>\
			</div>\
			<!-- /.form-group -->\
		</div>\
	</div>';
	return template;
}

function templateModalDelete(titulo, mensagem, data){
	let template = '\
	<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">\
		<div style="max-width: 96%; margin: auto; height: 100%;">\
			<div class="vertical-alignment-helper">\
				<div class="modal-dialog vertical-align-center">\
					<div class="modal-content">\
						<div class="modal-header">\
							<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>\
							<h4 class="modal-title" id="modalLabel"><strong>'+titulo+'}</strong></h4>\
						</div>\
						<div class="modal-body">\
							'+mensagem+'\
						</div>\
						<div class="modal-footer">\
							<button type="button" class="btn btn-default" data-dismiss="modal" title="Cancelar">Cancelar</button>\
							<button type="button" class="btn btn-danger delete-confirm" data-idform="'+data+'" title="Excluir">Excluir</button>\
						</div>\
					</div>\
				</div>\
			</div>\
		</div>\
	</div>';
	return template;
}

function configLightbox(){
	window.lightbox.option({
		albumLabel: 'Imagem %1 de %2',
		alwaysShowNavOnTouchDevices: true,
		fadeDuration: 1000,
		fitImagesInViewport: true,
		imageFadeDuration: 1000,
		maxHeight: '98%',
		positionFromTop: 0,
		resizeDuration: 700,
		showImageNumberLabel: true,
		wrapAround: true,
		disableScrolling: true,
	});
}

function configDatepicker(str_element, config){
	if(!config){
		config = {
			autoclose: true,
			language: 'pt-BR',
			//format: "mm",
			//viewMode: "months", 
			//minViewMode: "months",
			changeMonth: true,
			changeYear: true,
			showButtonPanel: true,
			stepMonths: 0,
			minDate: 0,
			maxDate: 0,
			startVal: 0,
			endVal: 0
		}
	}
	$(str_element).datepicker(config);
}

function configFileStyle(str_element, config){
	if(!str_element){
		str_element = ':file';
	}
	$(str_element).filestyle({
		buttonName: "btn-primary",
		buttonText : 'Selecione',
	});
}

function configSelect2(str_element, config){
	if(!str_element){
		str_element = '.select2';
	}
	if(!config){
		config = {
			language: "pt-BR"
		};
	}
	$(str_element).select2(config);
}

function configTagsInput(str_element, config){
	if(!str_element){
		str_element = 'input';
	}
	if(!config){
		config = {
			confirmKeys: [13, 188],
			tagClass: function() {
				return 'label label-primary';
			}
		};
	}
	$(str_element).tagsinput(config);

	$('.bootstrap-tagsinput input').on('keypress', function(e){
		if (e.keyCode == 13){
			e.keyCode = 188;
			e.preventDefault();
		};
	});
}

function configICheck(str_element, config){
	if(!str_element){
		str_element = 'input[type=radio]';
	}
	if(!config){
		config = {
			checkboxClass: 'icheckbox_minimal-blue',
			radioClass   : 'iradio_minimal-blue'
		};
	}
	$(str_element).iCheck(config);
}


function validURL(str) {
	var pattern = new RegExp('^(https?:\\/\\/)?'+ // protocol
		'((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.)+[a-z]{2,}|'+ // domain name
		'((\\d{1,3}\\.){3}\\d{1,3}))'+ // OR ip (v4) address
		'(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*'+ // port and path
		'(\\?[;&a-z\\d%_.~+=-]*)?'+ // query string
		'(\\#[-a-z\\d_]*)?$','i'); // fragment locator
	return !!pattern.test(str);
}