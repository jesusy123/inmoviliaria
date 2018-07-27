	$('#nick').change(function(){
		$.post('ajax_val_nick.php',{
		nick:$('#nick').val(),
		beforeSend: function(){
			$('.validar').html("Espere un momento");
		}

		}, function(respuesta){
			$('.validar').html(respuesta);
		});
	});

	$('#btn_guardar').hide();
	$('#pass2').change(function(event){
		if ($('#pass1').val()==$('#pass2').val()) {
			swal('Bien hecho...','Contrasenas iguales','success');
			$('#btn_guardar').show();
		}else{
			swal('Atencion...','Repite contrasena','error');
			$('#btn_guardar').hide();
		}
	});

	$('.form').keypress(function(e){
		if (e.which==13) {
			return false;
		}
	})