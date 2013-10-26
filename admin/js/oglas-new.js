$(document).ready(function() {

	$progressBarStep = 100/5;
	$progressBarValue = $progressBarStep;
	$progressBar = $( "#add_progressbar" );
	updateProgressBar($progressBarValue);
	$currentSection = 1;

	//updateProgressBar($progressBarValue);

	$('#btnAddWrapPrevious').click(function(e) {
		e.preventDefault();
		
		$progressBarValue -= $progressBarStep;
		updateProgressBar($progressBarValue);
		slideSection(--$currentSection);
	});
	
	$('#btnAddWrapNext').click(function(e) {
		e.preventDefault();
		//console.log($currentSection);
		
		if($("#add-kat").val()>0){
			if($currentSection == 1){
				izaberiAttr();
			}
		
			$progressBarValue += $progressBarStep;
			updateProgressBar($progressBarValue);
			slideSection(++$currentSection);
			
		}
		else{
			
			alert("Izaberite Kategoriju!");
		}
		
		//console.log('btnAddWrapNext');
		
	});
	
	//$(function() {
   	function updateProgressBar($value) {
		// $( "#add_progressBar" ).progressbar({
		  // value: $value
		// });
		//console.log($value);
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

		//console.log($next);
		//console.log($num);
		
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

//Ostatak

var submitted = false; //settuj na true kada se oglas preda
var geocoder, adresa; 
var map, marker;
var M_lat, M_lon; //ovo treba da se cuva u bazu.
			
geocoder = new google.maps.Geocoder();

function initialize() {
	$("#gmaps, #map-canvas, .marker-add").toggle();		  
		
		var mapOptions = {
			center: new google.maps.LatLng(44.802416, 20.465600999999992000),
			zoom: 15,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		};
				
		map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
					
		marker = new google.maps.Marker({
			map: map,
			draggable: true,
			animation: google.maps.Animation.DROP,
			position: mapOptions.center
		});	
}
			
function codeAddress() {
	adresa = $("#grad-lista option:selected").text() +" " + $("#opstine-lista option:selected").text() + " " + $("#ulica").val();
	console.log(adresa)				
	geocoder.geocode( { 'address': adresa}, function(results, status) { 
	if (status == google.maps.GeocoderStatus.OK) {
		map.setCenter(results[0].geometry.location);
		//console.log(results[0].geometry.location)
		marker.setPosition(results[0].geometry.location);		 
		M_lat = marker.position.lb;
		M_lon = marker.position.mb;
		//console.log("LAT JE "+M_lat+" I LON "+M_lon)
	}
	else{
		alert("Greška: " + status);
	}
	
	google.maps.event.addListener(marker, 'dragend', function(evt){
		M_lat = marker.position.lb;
		M_lon = marker.position.mb;
		//console.log("*NA DROP* LAT JE "+M_lat+" I LON "+M_lon)
	});					
	});
}
			
function listaj(val){
	//console.log(val)
	$.post("logic/listanje.php",  { value: val, tip: "1" },  function(response) {
		$("#opstine-lista").html(response);
		$("#mz-lista").html("");
		$("#mz-lista").hide();
	});				
}
			
function listajM(val){
	//console.log(val)
	$.post("logic/listanje.php",  { value: val, tip: "2" },  function(response) {
		if(response != ""){
			$("#mz-lista").show();
			$("#mz-lista").html(response);
		}
		else {
			$("#mz-lista").hide();
		}
	});
}
			
function izaberiAttr(){
	var id = $("#add-kat").val();
	console.log('idemo u neriljano' + id);
		 
	$.post("logic/listanje_atr.php",  { value: id },  function(result) {
		$("#attr-list").html("");				//prazni ako ima nesto pre appendovanja				
		var data = $.parseJSON(result);
			$.each(data, function(i, item){
				var tip = this['tip'];
					if(tip=='1'){
						$("#attr-list").append("<tr class='entry'><td>"+this['naziv']+":</td><td>DA <input data-id='"+this['id']+"' type='radio' class='err' value='1' name='"+this['naziv']+"'/> NE <input data-id='"+this['id']+"' type='radio' class='err' value='0' name='"+this['naziv']+"'/></td></tr>");
					}
					else if(tip=='2'){
						$("#attr-list").append("<tr class='entry'><td>"+this['naziv']+":</td><td><input data-id='"+this['id']+"' type='text' class='err' name='inputs[]'/></td></tr>");
					}
			});							
	});		
}
			
window.onbeforeunload = function() {
	if(!submitted){
		return "Podaci će biti izgubljeni ako zatvorite stranu, da li ste sigurni?";
	}
};
			
//skupljamo samo popunjene vrednosti atributa za kategoriju i pisemo u oglas
function pokupiAtr(){
	$("#attr-list input[type=text]").each(function(){
		var id_atr = $(this).attr('data-id');
		var vrednost_atr = $(this).val();
			if(vrednost_atr.length > 0){
					console.log("ID JE "+id_atr+"  I vrednost: "+vrednost_atr)
			}
	});			
				
	$("#attr-list input[type=radio]:checked").each(function(){
		var id_atr = $(this).attr('data-id');
		var vrednost_atr = $(this).val();
		console.log("RADIO ID JE "+id_atr+"  I vrednost: "+vrednost_atr)
	})
}


