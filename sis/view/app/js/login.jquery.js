$(document).ready(function() {

	var hj=0;

	$('#view-pass').click(function(){
		

		hj = hj+1;

		

		if(hj==1){
			console.log('muestra pass');
			$('#password').attr('type','text');
			$('.btn-view-pass').html('<span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span><i></i>');
		}else if(hj>1){
			console.log('oculta pass');
			$('#password').attr('type','password');
			$('.btn-view-pass').html('<span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span><i></i>');
			hj=0;
		}
		//ocultamos el primer boton
		//

	});	

});

