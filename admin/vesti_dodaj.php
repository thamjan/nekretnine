<?php $thisPage = "Vesti"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <?php include './include/head.php'; ?>
		<script type="text/javascript" src="js/tinymce/tinymce.min.js"></script>
    </head>
    <body>
        <div class="wrap">
            <?php include './include/header.php'; ?>
            <div id="content">
                <?php include './include/sidebar.php'; ?>
                <div id="main">


                    <div class="full_w">
                        <div class="h_title">Dodaj vest</div>
						<form method="POST" id="dodaj-vest" action="#">
							<div class="form-title">
								<label for="naslov">Naslov</label>
								<input name="naslov" type="text" />
							</div>
							<div class="form-content">
								<label for="sadrzaj">Sadržaj</label>
								<textarea name="sadrzaj" id="content-post" class="editor-content"></textarea>
							</div>
							<div class="entry" style="overflow:hidden;">
								<div class="checkbox-wrap">
									Objavi vest
									<input name="objavi" type="checkbox" value="1" checked/>
								</div>
								<input type="hidden" name="tip_posta" value="1"/>
								<button type="submit" class="btnSubmit right" id="dodaj-post">Dodaj</button>
							</div>
						</form>
                    </div>			
                </div>	
            </div>

            <div id="footer">

            </div>
        </div>
		<script>
			tinymce.init({
				selector: "textarea"
			});
			
			$(document).ready(function(){
				$("#dodaj-post").click(function(){
					
					tinymce.triggerSave();
					console.log("tu smo")
					$.post("logic/dodajpost.php", $("#dodaj-vest").serialize(),  function(response) {
					
						console.log(response)
						});
					return false;
				})
				
			})
		</script>
    </body>

</html>
