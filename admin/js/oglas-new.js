$(document).ready(function() {

	$progressBarStep = 100/5;
	$progressBarValue = $progressBarStep;
	$progressBar = $( "#add_progressbar" );
	updateProgressBar($progressBarValue);
	$currentSection = 1;

	//updateProgressBar($progressBarValue);

	$('#btnAddWrapPrevious').click(function(e) {
		e.preventDefault();
		//console.log('btnAddWrapPrevious');
		$progressBarValue -= $progressBarStep;
		updateProgressBar($progressBarValue);
		slideSection(--$currentSection);
	});
	
	$('#btnAddWrapNext').click(function(e) {
		e.preventDefault();
		console.log('btnAddWrapNext');
		$progressBarValue += $progressBarStep;
		updateProgressBar($progressBarValue);
		slideSection(++$currentSection);
	});
	
	//$(function() {
   	function updateProgressBar($value) {
		// $( "#add_progressBar" ).progressbar({
		  // value: $value
		// });
		console.log($value);
		$progressBar.progressbar({
			value: $value
		});
	}
	
	//$('.addSection').slideUp(0);
	$('.addSection:not(.add_1)').css("display", "none");
	$('#btnAddWrapPrevious').css("display", "none");
	
	function slideSection($num) {
		//$current = '.add_' + ($num-1);
		$next = '.add_' + $num;
		$('.addSection').css("display", "none");
		$($next).css("display", "inline");

		console.log($next);
		console.log($num);
		
		switch($num) {
			case 1:
			  $('#btnAddWrapPrevious').css("display", "none");
			  break;
			case 5:
			  $('#btnAddWrapNext').css("display", "none");
			  break;
			default:
			  $('#btnAddWrapPrevious').css("display", "inline");
			  $('#btnAddWrapNext').css("display", "inline");
		}
	}
});



