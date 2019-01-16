 <?php
include(Path::view(array('includes','head.php')));
include(Path::view(array('includes','plugin.php')));
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Identification</title>
        <?= $head ?>
        
    </head>

    <body data-spy="scroll" data-target=".navbar" data-offset="50">
	
        <div id="top"></div>
        <form action="<?= $data['url'] ?>" method="post">
			<div class="container">
				<div class="form-group">
					<label for="uname"><b>Mail</b></label>
					<input class="form-control" type="text" placeholder="Enter Username" name="mail" required>
				</div>
				
				<div class="form-group">
					<label for="psw"><b>Password</b></label>
					<input class="form-control" type="password" placeholder="Enter Password" name="password" required>
				</div>
				<button class="btn btn-primary" type="submit">Login</button>
				<label>
				<input type="checkbox" checked="checked" name="remember"> Remember me
				</label>
			</div>

			<div class="container" style="background-color:#f1f1f1">
				<button type="button" class="cancelbtn">Cancel</button>
				<span class="psw">Forgot <a href="#">password?</a></span>
			</div>
		</form> 
    </body>
</html>
 