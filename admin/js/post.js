$(document).ready(function() {

	$idToUpdate = null;

	$('.tranparentOverlay').fadeOut(0);
	$('.deleteWindow').fadeOut(0);

    $('.table-icon').click(function(e) {
			
        $action = $(this).attr("title");
		$idToUpdate = $(this).attr("idTu");
		$stariNaziv = $(this).attr("naz");
		$p = $(this).attr("par");
		
		
		if($action === 'Edit') {
	
			$('.tranparentOverlay').fadeTo(2,0.5,
				function() {
					window.open("vesti_izmeni.php?i=" + $idToUpdate, '_self');
				}
			);
			
		}
		else if($action === 'Delete') {		
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



