$(document).ready(function(e){

	// $('body').on('blur', '#freekc', function(e){
	// 	var qty = parseInt($(this).val());
	// 	if(qty > 10 || qty < 0 || $(this).val()==""){
	// 		if ($(this).val()!="") {
	// 			$('#modal-10-free-keychains').modal('show');
	// 		};
	// 	}else{
	// 		// get_style_size('fixed_price');
	// 	}
	// 	return;
	// });

	$('#modal-10-free-keychains').on('hidden.bs.modal', function (){
		$('#freekc').val('').focus();
	});

	// $('body').on('blur', '#btnfreekc', function(e){
	// 	if($('#btnfreekc').hasClass('btn-success')){
	// 		$('#btnfreekc').removeClass('btn-success glyphicon-ok').addClass('btn-warning glyphicon-erase');
	// 		$('#freekc').prop('disabled', true);
	// 	} else {
	// 		$('#btnfreekc').removeClass('btn-warning glyphicon-erase').addClass('btn-success glyphicon-ok');
	// 		$('#freekc').prop('disabled', false);
	// 		$(this).val('').focus();
	// 	}
	// });

});