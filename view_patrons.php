<!DOCTYPE HTML>

<html>

<head>

	<title>King Library Registration - SDomingues LIBR246</title>

    <link rel="stylesheet" type="text/css" href="css/KingLib_8.css" />

</head>

<body>

	<div id="logo">

		<a href="assignment_8.php"><img src="http://ntowl.com/images/KingLibLogo.jpg" /></a>

	</div>


	<div id = "patron_table">


		<h1>View Patrons</h1>


		<?php


		include 'assignment_8_common_functions.php';

		$db = connectDatabase($server);


		//******************************************************

		//*  SELECT from d1898_patron table and display Results

		//******************************************************

		$sql_statement  = "SELECT patron_id, firstname, lastname, email, birthyear, city, a_userid, a_password ";

		$sql_statement .= "FROM d1898_patron ";

		$sql_statement .= "ORDER BY patron_id ";

		$result = mysql_query($sql_statement);


		$outputDisplay = "";

		$myrowcount = 0;

		if (!$result) {

			$outputDisplay .= "<br /><font color=red>MySQL No: ".mysql_errno();

			$outputDisplay .= "<br />MySQL Error: ".mysql_error();

			$outputDisplay .= "<br />SQL Statement: ".$sql_statement;

			$outputDisplay .= "<br />MySQL Affected Rows: ".mysql_affected_rows()."</font><br />";

		} else {


			$outputDisplay = '<table border=1 style="color: black;">';

			$outputDisplay .= '<tr><th>ID</th><th>Last Name</th><th>First Name</th><th>Email</th><th>Birth Year</th><th>City</th><th>Username</th><th>Password</th></tr>';

			$numresults = mysql_num_rows($result);

			for ($i = 0; $i < $numresults; $i++)

			{

				if (!($i % 2) == 0)

				{

					 $outputDisplay .= "<tr style=\"background-color: #F5DEB3;\">";

				} else {

					 $outputDisplay .= "<tr style=\"background-color: white;\">";

				}

				$myrowcount++;

				$row = mysql_fetch_array($result);

				$id = $row['patron_id'];

				$last_name  = $row['lastname'];

				$first_name = $row['firstname'];

				$email = $row['email'];

				$birth_year = $row['birthyear'];

				$city = $row['city'];

                $user_name = $row['a_userid'];

                $password = $row['a_password'];


				if ($rtncode == $id)

				{

					$outputDisplay .= "<td style='color: red;'>".$id."</td>";

				} else {

					$outputDisplay .= "<td>".$id."</td>";

				}

				$outputDisplay .= "<td>".$first_name."</td>";

				$outputDisplay .= "<td>".$last_name."</td>";

				$outputDisplay .= "<td>".$email."</td>";

				$outputDisplay .= "<td>".$birth_year."</td>";

				$outputDisplay .= "<td>".$city."</td>";

        $outputDisplay .= "<td>".$user_name."</td>";

        $outputDisplay .= "<td>".$password."</td>";

				$outputDisplay .= "</tr>";

			}

			$outputDisplay .= "</table>";

		}


		print $outputDisplay;

		?>


		</table>

		<?php


			getServer($a_server);


		?>


	</div>


</body>

</html>



