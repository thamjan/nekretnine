$(document).ready(function(){

	$s = 'S: ';

	$imageFile = null;
	var dropbox;  
	  
	dropbox = document.getElementById("dropbox");  
	dropbox.addEventListener("dragenter", dragenter, false);  
	dropbox.addEventListener("dragleave", dragleave, false);  
	dropbox.addEventListener("dragover", dragover, false);  
	dropbox.addEventListener("drop", drop, false);  
	
	function defaults(e){
       e.stopPropagation();  
       e.preventDefault();  
	}
    function dragenter(e) {  
	   $(this).addClass("active");
	   defaults(e);
	}  
      
    function dragover(e) { 
	   defaults(e);
    }  
    function dragleave(e) {  
	   $(this).removeClass("active");
	   defaults(e);
    }  

    function drop(e) {  
	   $(this).removeClass("active");
	   defaults(e);
      
       var dt = e.dataTransfer;  
       var files = dt.files;  
      
       handleFiles(files,e);  
    }  
   
	handleFiles = function (files,e){
		$hiddValue = '';

		var imageType = /image.*/;  
		for(var i=0; i<files.length; i++) {
			var file = files[i];
			

			if (!file.type.match(imageType)) {  
			  alert("Fajl \""+file.name+"\" nije slika! ");
			  return false;	
			} 
	
			if (parseInt(file.size / 1024) > 5200) {  
			  alert("File \""+file.name+"\" je prevelik!");
			  return false;	
			} 
			
			var info = '<div class="preview active-win"><div class="preview-image"><img /></div><div class="progress-holder"><span id="progress"></span></div><span class="percents"></span><div style="float:left;">Uploaded <span class="up-done"></span> KB of '+parseInt(file.size / 1024)+' KB</div>';

			$(".upload-progress").show("fast",function(){
				$(".upload-progress").html(info); 
				uploadFile(file);
			});

		}
		setTimeout(function(){
			for(var i=0; i<files.length; i++) {
				var file = files[i];
				addTableRow(file.name);
			}
		},1000);
				
		refreshImgList();
		
	}		
  

  uploadFile = function(file){

	if (typeof FileReader !== "undefined"){

	
	reader = new FileReader();
	reader.onload = function(e){

		$fileName = e.target.result;

		$('.preview img').attr('src',e.target.result).css("width","70px").css("height","70px");
	}
	reader.readAsDataURL(file);	
	xhr = new XMLHttpRequest();
	xhr.open("post", "logic/fileUpload.php", true);

	xhr.upload.addEventListener("progress", function (event) {
		if (event.lengthComputable) {
			$("#progress").css("width",(event.loaded / event.total) * 100 + "%");
			$(".percents").html(" "+((event.loaded / event.total) * 100).toFixed() + "%");
			$(".up-done").html((parseInt(event.loaded / 1024)).toFixed(0));
		}
		else {
			alert("Failed to compute file upload length");
		}
	}, false);

	xhr.onreadystatechange = function (oEvent) { 

		$s += xhr.responseText + ' :: ';

	  if (xhr.readyState === 4) {  
		if (xhr.status === 200) {  
		  $("#progress").css("width","100%");
		  $(".percents").html("100%");
		  $(".up-done").html((parseInt(file.size / 1024)).toFixed(0));
		} else {  
		  alert("Error"+ xhr.statusText);  
		}  
	  }  
	};  
	
	xhr.setRequestHeader("Content-Type", "multipart/form-data");
	xhr.setRequestHeader("X-File-Name", file.name);
	xhr.setRequestHeader("X-File-Size", file.size);
	xhr.setRequestHeader("X-File-Type", file.type);

	xhr.send(file);
	console.log('OVER: ' + $s);
	}else{
		alert("Your browser doesnt support FileReader object");
	} 		
  }
  	
	function removeLinkFromDb($name) {
		
	}
	
	function fillTableFromDb($id) {
		
	}
	
	function refreshImgList() {
		$hidImgList = $(' #hidImgList ');
		$hidImgList.val('');
		
		$featuredImg = $("input[type='radio'][name='rFeatured']:checked");
	
		$(' .thumbName ').each(function(e) {

				if($featuredImg.val() === $(this).text()) {
					$hidImgList.val($hidImgList.val() + "<img src='" + $(this).text() + "' featured='1' />");
				}
				else {
					$hidImgList.val($hidImgList.val() + "<img src='" + $(this).text() + "' />");
				}
				
				
			});

		console.log('$hidImgList.val() ::: ' + $hidImgList.val());
	}
	
	function addTableRow($name) {
	
		$tBody = $(' .content ');

		// $newTableRow = "<tr><td class='align-center'><img class='thumb' src='uploads/" + $name + "' /></td><td class='thumbName'>" + $name + "</td><td class='radioTd'><input type='radio' value='" + $name + "' name='rFeatured' /></td><td><a href='#' class='table-icon delete' title='Delete'></a></td></tr>";
		$newTableRow = '<tr><td class="align-center"><img class=thumb src=uploads/' + $name + ' /></td><td class=thumbName>' + $name + '</td><td class=radioTd><input type=radio value=' + $name + ' name=rFeatured /></td><td><a href=# class="table-icon delete" title=Delete></a></td></tr>';

		 $tBody.append($newTableRow);


	}
		
	$('#content').on('change', '[name="rFeatured"]', function() {
		refreshImgList();
	});
	
	
});