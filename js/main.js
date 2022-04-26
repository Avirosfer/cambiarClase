
/*Inicia modulos/pestañas de la consulta.*/
$(document).ready(function(){
	$('ul.tabs li a:first').addClass('active');
	$('.secciones section').hide();
	$('.secciones section:first').show();

	$('ul.tabs li a').click(function(){
		$('ul.tabs li a').removeClass('active');
		$(this).addClass('active');
		$('.secciones section').hide();

		var activeTab = $(this).attr('href');
		$(activeTab).show();
		return false;
	});
});

/* Inicia Popup ventana emergente "Información almacenada con éxito".*/
$(document).ready(function (){

	function showPopup(){
		$('.pop-up').addClass('show');
		$('.pop-wrap').addClass('show');
	}	

	$("#close").click(function(){
		$('.pop-up').removeClass('show');
		$('.pop-wrap').removeClass('show');
	});

	$(".btn1").click(showPopup);
	$(".btn2").click(showPopup);
	$(".btn3").click(showPopup);

	/*setTimeout(showPopup, 5000);*/

});
/* Finaliza Popup ventana emergente "Información almacenada con éxito".*/

/*Inicia Popup ventana emergente "Cancelar registro - Respuesta: No".*/
$(document).ready(function (){

	function showCancelar(){
		$('.cancelar-pop-up').addClass('show');
		$('.cancelar-pop-wrap').addClass('show');
	}	

	$("#close-cancelar").click(function(){
		$('.cancelar-pop-up').removeClass('show');
		$('.cancelar-pop-wrap').removeClass('show');
	});

	$(".btnCancelar").click(showCancelar);
	/*$(".switch-button").click(showCancelar);*/
	/*$(".switch-button__checkbox").click(showCancelar);*/

	/*setTimeout(showPopup, 5000);*/

});
/*Finaliza Popup ventana emergente "Cancelar registro - Respuesta: No".*/



/*" Inicia limpieza de campos digitados"*/
function vaciar(control) {
        control.value = '';
 }
/*" Inicia limpieza de campos digitados"*/

/*$(document).ready(function() {
       $('#limpiar').click(function() {
              $('.descripcion').val('');
              $('.antecedentes').val('');
              $('.cirugias').val('');
              $('.estadoMedico').val('');
              $('.procedimiento').val('');
              $('.cancelar-pop-up').removeClass('show');
		$('.cancelar-pop-wrap').removeClass('show');
        });
});*/

/* Inicia Popup ventana emergente visualizar paciente.*/
$(document).ready(function (){

	function showVispac(){
		$('.vis-pac-pop-up').addClass('show');
		$('.vis-pac-pop-wrap').addClass('show');
	}	

	$("#close-vis-pac").click(function(){
		$('.vis-pac-pop-up').removeClass('show');
		$('.vis-pac-pop-wrap').removeClass('show');
	});

	$(".icon.icon-tabler.icon-tabler-eye-pac").click(showVispac);

});
/* Finaliza Popup ventana emergente visualizar paciente.*/


/* Inicia ALERT EDITAR POP UP*/
$(document).ready(function (){

	function showAlertEditar(){
		$('.alert-editar-pop-up').addClass('show');
		$('.alert-editar-pop-wrap').addClass('show');
	}	

	$("#close-alert-editar").click(function(){
		$('.alert-editar-pop-up').removeClass('show');
		$('.alert-editar-pop-wrap').removeClass('show');
	});

	$(".icon.icon-tabler.icon-tabler-pencil-pac").click(showAlertEditar);

});
 /*Finaliza ALERT EDITAR POP UP.*/

/* Inicia Popup ventana emergente EDITAR paciente.
$(document).ready(function (){

	function showVisPacEdit(){
		$('.vis-pac-pop-up-edit').addClass('show');
		$('.vis-pac-pop-wrap-edit').addClass('show');
	}	

	$("#close-vis-pac-edit").click(function(){
		$('.vis-pac-pop-up-edit').removeClass('show');
		$('.vis-pac-pop-wrap-edit').removeClass('show');
	});

	$(".icon.icon-tabler.icon-tabler-pencil-pac").click(showVisPacEdit);

});
 Finaliza Popup ventana emergente EDITAR paciente.*/

/* Inicia Popup ventana emergente NUEVO paciente.*/
$(document).ready(function (){

	function showVisPacNew(){
		$('.vis-pac-pop-up-new').addClass('show');
		$('.vis-pac-pop-wrap-new').addClass('show');
	}	

	$("#close-vis-pac-new").click(function(){
		$('.vis-pac-pop-up-new').removeClass('show');
		$('.vis-pac-pop-wrap-new').removeClass('show');
	});

	$(".icon.icon-tabler.icon-tabler-circle-plus-pac").click(showVisPacNew);
	$(".btnCrear").click(showVisPacNew);

});
/* Finaliza Popup ventana emergente NUEVO paciente.*/

/* Inicia Popup ventana emergente visualizar propietario.*/
$(document).ready(function (){

	function showVisPro(){
		$('.vis-pro-pop-up').addClass('show');
		$('.vis-pro-pop-wrap').addClass('show');
	}	

	$("#close-vis-pro").click(function(){
		$('.vis-pro-pop-up').removeClass('show');
		$('.vis-pro-pop-wrap').removeClass('show');
	});

	$(".icon.icon-tabler.icon-tabler-eye-pro").click(showVisPro);

});
/* Finaliza Popup ventana emergente visualizar propietario.*/

/* Inicia Popup ventana emergente EDITAR propietario.
$(document).ready(function (){

	function showVisProEdit(){
		$('.vis-pro-pop-up-edit').addClass('show');
		$('.vis-pro-pop-wrap-edit').addClass('show');
	}	

	$("#close-vis-pro-edit").click(function(){
		$('.vis-pro-pop-up-edit').removeClass('show');
		$('.vis-pro-pop-wrap-edit').removeClass('show');
	});

	$(".icon.icon-tabler.icon-tabler-pencil-pro").click(showVisProEdit);

});
Finaliza Popup ventana emergente EDITAR propietario.*/

function getFocus() {
       document.getElementById("edNomPac").focus();
 }


/*Inicia Popup ventana emergente "INACTIVAR AL PACIENTE".*/
$(document).ready(function (){

	function showInactivarPac(){
		$('.inactivar-pac-pop-up').addClass('show');
		$('.inactivar-pac-pop-wrap').addClass('show');
	}	

	$("#close-inactivar-pac").click(function(){
		$('.inactivar-pac-pop-up').removeClass('show');
		$('.inactivar-pac-pop-wrap').removeClass('show');
	});

	$(".switch-button").click(showInactivarPac);
	/*$(".switch-button__checkbox").click(showInactivarPac);*/

	/*setTimeout(showPopup, 5000);*/

});
/*Finaliza Popup ventana emergente  "INACTIVAR AL PACIENTE".*/

/*Inicia Popup ventana emergente "ACTIVAR AL PACIENTE".*/
$(document).ready(function (){

	function showActivarPac(){
		$('.activar-pac-pop-up').addClass('show');
		$('.activar-pac-pop-wrap').addClass('show');
	}	

	$("#close-activar-pac").click(function(){
		$('.activar-pac-pop-up').removeClass('show');
		$('.activar-pac-pop-wrap').removeClass('show');
	});

	 $("switch-button__checkbox").click(showActivarPac);
	/*$(".switch-button__label:before").click(showActivarPac);*/

	/*setTimeout(showPopup, 5000);*/

});
/*Finaliza Popup ventana emergente "ACTIVAR AL PACIENTE".*/

/* Inicia Popup REPORTES.*/
$(document).ready(function (){

	function showReportes(){
		$('.reportes-pop-up').addClass('show');
		$('.reportes-pop-wrap').addClass('show');
	}	

	$("#close-reportes").click(function(){
		$('.reportes-pop-up').removeClass('show');
		$('.reportes-pop-wrap').removeClass('show');
	});

	$(".btnReporte").click(showReportes);

});
/* Finaliza Popup ventana emergente REPORTES.*/

