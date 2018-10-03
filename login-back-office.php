<?php 
	include('config.php');
	session_start();


?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="icon" href="img/admin.png">
	<style type="text/css">
		
		.loginWindow{
		    width: 25%;
		    margin-left: 37.5%;
		   	margin-top: 5%;
		}

		.loginWindow p{
    		width: 100%;
	    	text-align: center;
	    	font-family: Andale Mono;
		}

		.loginWindow input{
			width: 98%;
		    height: 25px;
		    font-size: 15px;
		    border: none;
		    border-bottom: 1px solid #b7b7b7;
		    text-align: center;
		}

		.loginWindow input:focus{
			outline: none;
		}

		.loginWindow input:-webkit-autofill {
		    -webkit-box-shadow: 0 0 0 30px white inset;
		}

		.loginWindow button{
		    width: 25%;
		    margin-left: 37%;
		    margin-top: 5%;
		    color: #69819a;
		    font-family: Andale Mono;
		    font-weight: bold;
		    font-size: 13px;
		    padding: 1%;
		    cursor: pointer;
		    border: 1px solid #69819a;
		    border-radius: 5px;
		    background: white;

		}

		.loginWindow button:active{
		    background: #69819a;
		    color: white;
		    outline: none;
		}

		.loginWindow button:focus{
			outline: none;
		}


	}
	</style>
</head>
<body>
	<div class="wrapper">
		<div class="loginWindow">
			<form action="login-verify.php" method="post" onsubmit="return validate(this);">
				<p>User name:</p>
				<input type="text" name="loginName" autocomplete="off">
				<p>Password:</p>
				<input type="password" name="pass" autocomplete="new-password">
				<button type="submit" id="login">Login</button>
				<p style="color: darkred"><?php 
				if(isset($_SESSION['var'])) { echo $_SESSION['var'];}
				?></p>
			</form>
		</div>
	</div>
	<?php session_destroy(); ?>

<script type="text/javascript">
function validate(form) {
  var re = /^[a-z,A-Z]+$/i;

  if (!re.test(form.foo.value)) {
    alert('Please enter only letters from a to z');
    return false;
  }
}
</script>
</body>
</html>