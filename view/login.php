 <?php
include(Path::view(array('includes','head.php')));
include(Path::view(array('includes','plugin.php')));
echo $data['test'];
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Identification</title>
        <?= $head ?>
        
    </head>

    <body data-spy="scroll" data-target=".navbar" data-offset="50">
	
        <div id="top"></div>
        <form action="login/verify" method="post">
			<div class="container">
				<label for="uname"><b>Mail</b></label>
				<input type="text" placeholder="Enter Username" name="mail" required>
				
				<label for="psw"><b>Password</b></label>
				<input type="password" placeholder="Enter Password" name="psw" required>

				<button type="submit">Login</button>
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
 