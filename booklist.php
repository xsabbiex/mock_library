<!DOCTYPE html>

<html lang="en">

  <head>

    <meta charset="utf-8">


    <title>King Library Registration</title>

    <link rel="stylesheet" type="text/css" href="css/KingLib_8.css" />


  </head>

  <body>

  <div id="container">

  	<div id="logo">

  		<a href="assignment_8.php"><img src="http://ntowl.com/images/KingLibLogo.jpg" /></a>


	</div>


	<div id="results">

		<?php


			//********************************************

			//*  Connect to include file and database

			//********************************************

			include 'assignment_8_common_functions.php';


    		$db = connectDatabase($server);


			//********************************************

			//*  Set $keyword as user input or ALL

			//*	 and print appropriate title

			//********************************************


			$keyword = $_POST['title'];


			if (empty($keyword))

			{

				$keyword = "ALL";

			}

			if ($keyword == "ALL")

			{

				print "<h2>Current Titles</h2>";

			}

			elseif ($keyword !== "ALL")

			{

				print "<h2>Current Titles that Match: ".$keyword."</h2>";

			}


			//********************************************

			//*  Build $statement query

			//********************************************


			$statement = "SELECT isbn, title, type, pubdate ";

			$statement .= "FROM booklib ";


			if ($keyword != 'ALL')

			{

				$statement .= "WHERE title LIKE '%".$keyword."%' ";

			}

			$statement .= "ORDER BY title ";


			//*****************************************************

			//*  Run $statement query and display results or errors

			//*****************************************************


			$sqlResults = selectResults($statement, $db);

			$error_or_rows = $sqlResults[0];

			if (substr($error_or_rows, 0, 5) == 'ERROR')

			{

				print "<br />Error on DB</br >";

				print $error_or_rows;

			} else {

				$arraySize = $error_or_rows;

				$cntr = 0;

				for ($i=1; $i <= $error_or_rows; $i++)

				{

					$isbn = $sqlResults[$i]['isbn'];

					$title = $sqlResults[$i]['title'];

					$type = $sqlResults[$i]['type'];

					$pubdate = $sqlResults[$i]['pubdate'];


					$cntr++;

					print "<p>".$cntr.". Title: ".$title."<br />Category: ".$type."<br />Publication Date:: ".$pubdate."<br />ISBN: ".$isbn."</p>";

				}

			}

		?>

		<p id="server">

			<?php

			getServer($a_server);


			?>

		</p>

	</div>

</div>

</body>

</html>
