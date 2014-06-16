<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php echo $title?></title>
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
	#head
	{
		width: 100%;
	}
	#head div, #nav div
	{
		display: inline-block;
		text-align: center;
	}
	#head #titre
	{
		width: 50%;
	}
	#head #notify
	{
		width: 10%;
	}
	#head #profil
	{
		width: 30%;
	}
	#nav
	{
		width: 100%;
	}
	#nav div
	{
		width: 10%;
	}
	</style>
</head>
<body>
	<div id="page">
		<div id="head">
			<div id="titre">
				Index
			</div>
			<div id="notify">
				0
			</div>
			<div id="profil">
				Bienvenue Petit Panda
			</div>
		</div>
		<div id="nav">
			<div>
				Activités
			</div>
			<div>
				Planning
			</div>
			<div>
				E-learning
			</div>
			<div>
				Forum
			</div>
		</div>
	</div>
	<div id="main">

	</div>
</body>
</html>
