<!DOCTYPE html>

<html lang="en">

  <head>

    <meta charset="utf-8">


    <title>King Library Registration</title>

    <link rel="stylesheet" type="text/css" href="css/KingLib_8.css" />


  </head>

  <body>

	<div id="logo">

		<a href="assignment_8.php"><img src="http://ntowl.com/images/KingLibLogo.jpg" /></a>


	</div>


	<div id="featuredtitle">

		<h1>Featured Title</h1>

		<img src="book_children_of_men.jpg" />


	</div>

	<div id="stafflist">

		<h1>Our Staff</h1>

		<table border = "0">

			<tr>

				<td>

				<?php

					include 'assignment_8_common_functions.php';

					$db = connectDatabase($server);

					display_staff($db);

					function display_staff($db)

					{

						$statement = "SELECT image_file ";

						$statement .= "FROM staff ";

						$statement .= "ORDER BY firstname ";

						$sql_results = selectResults($statement, $db);

						$error_or_rows = $sql_results[0];

						if (substr($error_or_rows, 0, 5) == 'ERROR')

						{

							print "<br />Error on DB<br />";

							print $error_or_rows;

						} else {


							$arraySize = $error_or_rows;


							for ($i = 1; $i <= $error_or_rows; $i++)

							{

								$image_file = $sql_results[$i]['image_file'];


								print "<td><img src='images/".$image_file."'>";

								print "</td>";

							}

						}

					}

				?>

			</tr>

		</table>


	</div>


	<div id="logon">

        <form method="post" id="login_form" action="assignment_8_logon.php">

            <h1>Logon to your account</h1>

            <table>

                <tr>

                    <td>User Id:</td>

                    <td><input type="text" name="username" size="10" /></td>

                </tr>

                <tr>

                    <td>Password:</td>

                    <td><input type="password" name="password" size="10" /></td>

                </tr>

            </table>

            <input type="submit" value="Logon" />

            <a href="assignment_8_register.php">Click to Register</a></p>

        

        </form>


	</div>

	<div id="findtitle">

		<form method="post" id="title_form" action="assignment_8_booklist.php">

			<h1>Enter KeyWord to Search for Titles:</h1>

			<p><input type="text" name="title" size="30" /><br />

			(leave blank to list all titles)</p>

			<p><input type="submit" value="Find Titles" /></p>

		</form>

	</div>

	<p style="margin-top: 605px;">

		<?php

			getServer($a_server);

		?>

	</p>

  </body>

</html>
