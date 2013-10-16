<?php 
	$thisPage = "Vesti"; 
	include_once './logic/common.php';
		
	$id = @$_GET['i'];
	$naslov = null;
	$tekst = null;
	$datum_objave = null;
	
	//echo 'id::' . $id;
	
	$query = "
	SELECT *
	FROM post
	WHERE id_post=$id					
	";
		
    try {
        $stmt = $db->prepare($query);
        $result = $stmt->execute();
    } catch (PDOException $ex) {
        die("Failed to run query: " . $ex->getMessage());
    }

	$row = $stmt->fetch();
	
	$naslov = $row['naslov'];
	$tekst = $row['text'];
	
	                    


?>

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
                        <div class="h_title">Izmeni zaposlenje</div>
						<form method="POST" id="dodaj-vest" action="#">
							<input type='hidden' name='id' value='<?php echo $id; ?>' />
							<div class="form-title">
								<label for="naslov">Naslov</label>
								<input name="naslov" type="text" value="<?php echo $naslov; ?>" />
							</div>
							<div class="form-content">
								<label for="sadrzaj">Sadržaj</label>
								<textarea name="sadrzaj" id="content-post" class="editor-content"><?php echo $tekst; ?></textarea>
							</div>
							<div class="entry" style="overflow:hidden;">
								<div class="checkbox-wrap">
									Objavi zaposlenje
									<input name="objavi" type="checkbox" value="1" checked/>
								</div>
								<input type="hidden" name="tip_posta" value="1"/>
								<button type="submit" class="btnSubmit right" id="dodaj-post">Sačuvaj</button>
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
					
					$.post("logic/promenipost.php", $("#dodaj-vest").serialize(),  function(response) {
						//console.log(response)
						alert(response);
						window.open('zaposlenje_lista.php', '_self');
						});
					return false;
				})
				
			})
		</script>
    </body>

</html>
