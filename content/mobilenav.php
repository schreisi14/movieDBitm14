<!DOCTYPE html>
<html>
	<head>
		<title>
			MovieDB
		</title>
		<meta charset="utf-8" />
		<link type="text/css" rel="stylesheet" href="../css/reset.css" />
		<!-- Smartphones: 320px bis 480px Tablets: 768px bis 1024px Computer-Desktop: 1024px+  -->
		<link type="text/css" rel="stylesheet"  href="../css/style.css">
		<link type="text/css" rel="stylesheet" href="../css/desktop.css" media="screen and (min-width: 1024px)" />
		<link type="text/css" rel="stylesheet" href="../css/tablet.css" media="screen and (max-width: 1023px) and (min-width: 481px)" />
		<link type="text/css" rel="stylesheet" href="../css/smartphone.css" media="screen and (max-width: 480px)" />
	</head>
	<body>
		<div id="header">
			<div id="topcontent">
				<a href="index.php" >
					<div id="logo">
						<h1>
							<?php include 'logo.txt'; ?>
						</h1>
					</div>
				</a>
				<div id="nav">
					<?php include 'nav.php'; ?>
				</div>
				<div id="hamburger">
					<a href="mobilenav.php">
						<img src="../img/hamburger.png" alt="Navigation" />
					</a>
				</div>
				<div id="login">
					<h1>
						<?php include 'login.php'; ?>
					</h1>
				</div>
			</div>
		</div>
		<div id="content">
		<?php include 'nav.php';?>

		</div>
	</body>
</html>