$(document).ready(function() {

    $('.table-icon').click(function(e) {

	//alert('table-icon');
	
        //e.preventDefault();
		
        $action = $(this).attr("title");
		
		if($action === 'Edit') {
		
			alert('edit');
			
		}
		else if($action === 'Delete') {
		
			alert('delete');
		
		}
		
        /* $naziv = $('#txtNaziv').val();
		$tip = $('#txtTip').val();
		
		$.post("logic/adding.php",{
			p: $p,
			naziv: $naziv,
			tip: $tip
		},function(result){
			alert(result);
			$naziv = $('#txtNaziv').val('');
			$tip = $('#txtTip').val('');
		}); */
      
    });
});



