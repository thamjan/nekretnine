$(document).ready(function() {

	$idToUpdate = null;
	//$stariNaziv = null;

	$('.tranparentOverlay').fadeOut(0);
	//$('.editWindow').fadeOut(0);
	$('.deleteWindow').fadeOut(0);

    $('.table-icon').click(function(e) {
			
        $action = $(this).attr("title");
		$idToUpdate = $(this).attr("idTu");
		$stariNaziv = $(this).attr("naz");
		$p = $(this).attr("par");
		
		if($action === 'Edit') {
			
/* 			$('.tranparentOverlay').fadeTo(2,0.5,
				function() {
					$('.editWindow').fadeIn(2, function() {
						$('#txtEditNaziv').val($stariNaziv);
					});					
				}
			); */
		}
		else if($action === 'Delete') {		
			//alert('delete');
			$('.tranparentOverlay').fadeTo(2,0.5,
				function() {
					$('.deleteWindow').fadeIn(2);
				}
			);
		}      
    });
	
	// fade overlay when clicked
	$('.tranparentOverlay').click(function(e) {
		$('.editWindow').fadeOut(1);
		$('.deleteWindow').fadeOut(1);
		$('.tranparentOverlay').fadeOut(1);
				
	});
	
	// update row
	/* $('#btnEditSubmit').click(function(e) {
		e.preventDefault();
		$.post("logic/editing.php",{
			p: $p,
			id: $idToUpdate,
			noviNaziv: $('#txtEditNaziv').val()
		},function(data, status){
				alert(data);			
			$('.tranparentOverlay').fadeOut(1);
			$('.editWindow').fadeOut(1);
			location.reload();			
		});
	}); */
	
	// delete row
	$('#btnDeleteYes').click(function(e) {
		e.preventDefault();
		$.post("logic/deleting.php",{
			p: $p,
			id: $idToUpdate			
		},function(data, status){
			alert(data);			
			$('.tranparentOverlay').fadeOut(1);
			$('.deleteWindow').fadeOut(1, function() {
				location.reload();	
			});				
		});
	});
	
	$('#btnDeleteNo').click(function(e) {
		$('.tranparentOverlay').fadeOut(1);
		$('.deleteWindow').fadeOut(1);
	});	
});



