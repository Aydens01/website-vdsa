 <?php
include(Path::view(array('includes','head.php')));
include(Path::view(array('includes','plugin.php')));
echo $data['state'];
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Administration</title>
        <?= $head ?>
        
    </head>

    <body data-spy="scroll" data-target=".navbar" data-offset="50">
			
			
        <div id="top"></div>
		<div id='csv-import-zone'>
        <form action="<?= $data['url'] ?>" method="post" enctype="multipart/form-data">
			
			<div class="container">
				<div class="form-group">
					<label for="somename"><b>Importez un fichier csv (limit 8mo)</b></label>
					<input type="file" class="form-control-file" name="csv" value="" />
				</div>
			
				<?php
					//<input type="submit" name="submit" value="Save" /></form>
				?>
				<button class="btn btn-primary" type="submit">Envoyer</button>
			</div>
		</form>
		</div>
    </body>
</html>
 