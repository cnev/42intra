<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
	<style type="text/css">

	#page
	{
		position:relative;
		height: 100%;
		width: 100%;
	}
	#form
	{
		position:absolute;
		top: 0;
		left: 0;
	}
	</style>
</head>
<script>
function myFunction()
{
	var h1 = document.getElementById("page").scrollHeight;
	var w1 = document.getElementById("page").scrollWidth;
	var h2 = document.getElementById("form").scrollHeight;
	var w2 = document.getElementById("form").scrollWidth;
	document.getElementById("form").style.top = h1 / 2 - h2 / 2;
	document.getElementById("form").style.left = w1 / 2 - w2 / 2;
}
</script>
<body onresize="myFunction()">

	<div id="page"><div id="form"><form action="/index.php/login/log_in" method="POST"><table>
	<tr>
		<td colspan=2>Veuillez vous connecter</td>
	</tr>
	<tr>
		<td>Login</td>
		<td><input type="text" name="login" value="" /></td>
	</tr>
	<tr>
		<td>Mot de passe</td>
		<td><input type="password" name="pw" value="" /></td>
	</tr>
	<tr>
		<td colspan=2><input type="submit" name="submit" value="Se connecter" /></td>
	</tr>
	</table></form></div></div>
	<script>
	var h1 = document.getElementById("page").scrollHeight;
	var w1 = document.getElementById("page").scrollWidth;
	var h2 = document.getElementById("form").scrollHeight;
	var w2 = document.getElementById("form").scrollWidth;
	document.getElementById("form").style.top = h1 / 2 - h2 / 2;
	document.getElementById("form").style.left = w1 / 2 - w2 / 2;
	</script>
</body>
</html>
