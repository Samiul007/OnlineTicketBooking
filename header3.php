
<head>
<title>Online ticket booking system for travelling</title>

<link rel="stylesheet" type="text/CSS" href="style.css">
</head>

<body>

   <header>
   
	<div id="left">
		<ul>
			<li><a href="u_home.php">Journey</a></li>
			<li><a href="#">On Service</a></li>
		</ul>

	</div>

	<div id="right">
		<ul>
			<li>Hello, <?php echo $_SESSION["user"]; ?></li>
			<li><a href="sign_out.php">Sign out</a></li>	
		</ul>

	</div>
	
	<div id="logo">
	
	     <img src="image.png"/>
		
	</div>
	

	
  </header>	
  
</body>
</html>