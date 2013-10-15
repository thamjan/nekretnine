$(document).ready(function() {
    $('.btnSubmit').click(function(e) {

        e.preventDefault();
        $p = $(this).attr("val");
        $naziv = $('#txtNaziv').val();
		$tip = $('#txtTip').val();
		
		//conslole.log($naziv + ", " + $tip);
		
		$.post("logic/adding.php",{
			p: $p,
			naziv: $naziv,
			tip: $tip
		},function(result){
			alert(result);
			$naziv = $('#txtNaziv').val('');
			$tip = $('#txtTip').val('');
		});
      
    });
});



