<!DOCTYPE html>
<html>
	<head>
		<title>
			MovieDB | Film ausborgen.
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
			<?php include("../business.php");
				// init Movie Model from Business Logic
				$movie = new Movie();
				// now load all Movies
				$data = $movie->getAllMovies();

				// prepare HTML Table
				function getHTMLTable($tabledata) {
				  $html = '<h1>Filme ausborgen:</h1>';
				  $html .= '<table id="moviestable">';
				  $html .= '<thead><tr>';
				  $html .= '<th>Filmtitel</th>';
				  $html .= '<th>Jahr</th>';
				  $html .= '<th>Sprache</th>';
				  $html .= '</tr></thead>';

				  foreach($tabledata as $movie) {
				    $html .= '<tbody><tr>';
				    $html .= '<td>' . $movie['name'] . '</td>';
						$html .= '<td>' . $movie['year'] . '</td>';
						$html .= '<td>' . $movie['language'] . '</td>';
				    $html .= '</tr></tbody>';
				  }

				  $html .= '</table>';

				  return $html;
				}
				echo getHTMLTable($data);
			?>
		</div>
	</body>
</html>