<!DOCTYPE html>

<html lang="en">

  <head>


    <title>King Library Registration</title>

    <link rel="stylesheet" type="text/css" href="css/KingLib_8.css" />


  </head>

  <body>

	<div id="logo">

		<a href="assignment_8.php"><img src="http://ntowl.com/images/KingLibLogo.jpg" /></a>

	</div>

	<div id="my_form">

    	<?php

    	$first_name = $_POST["firstname"];

    	$last_name = $_POST["lastname"];

    	$fullname = $first_name.' '.$last_name;

    	$email = $_POST["email"];

	$birth_year = $_POST["birth_year"];

	$city = $_POST['city'];

        $user_name = $_POST['userid'];

        $password = $_POST['password'];

		$length_of_year = strlen($birth_year);

		date_default_timezone_set('America/Los_Angeles');

		$current_year = date('Y');

		$age = $current_year - $birth_year;


		include 'assignment_8_common_functions.php';

		$db = connectDatabase($server);

		$rtnmsg = doValidation($first_name, $last_name, $email, $birth_year, $length_of_year, $city, $user_name, $password);

		if (!empty($rtnmsg))

		{

			print $rtnmsg;

		}

		if (empty($rtnmsg))

		{

		print "<p>Thank you for registering!</p>";

		print "<p>Name: $fullname</p>";

    	print "<p>Email: $email</p>";

		print "<p>Birth Year: $birth_year</p>";

    	print "<p>City: $city</p>";

        //print "<p>Userid: $user_name</p>";

        //print "<p>Password: $password</p>";


		if ($age <= 15)

		{

			print "<p>Section: Children</p>";

		}

		if ($age >= 16 && $age <= 54)

		{

			print "<p>Section: Adult</p>";

		}

		if ($age >= 55)

		{

			print "<p>Section: Senior</p>";

		}


		$rtncode = mysql_insert($db, $first_name, $last_name, $email, $birth_year, $city, $user_name, $password);

		print $result;

		print '<p>For Admin use only: <a href="assignment_8_view_patrons.php">View Patrons</a></p>';

		}

		?>

		<p>

			<?php


			getServer($a_server);


			?>

		</p>

	</div>

 </body>

</html>

    <?php

    //********************************************

   	//*  Build $sql_statement query function

		//********************************************


		function mysql_insert($db, $first_name, $last_name, $email, $birth_year, $city, $user_name, $password)

		{

			$sql_statement = "INSERT into d1898_patron(firstname, lastname, email, birthyear, city, a_userid, a_password) ";

			$sql_statement .= "values (";

			$sql_statement .= "'".$first_name."', '".$last_name."', '".$email."', '".$birth_year."', '".$city."', '".$user_name."', '".$password."'";

			$sql_statement .= ")";



			$result = mysql_query($sql_statement);



			if ($result)

			{


			} else {

			    $errno = mysql_errno($db);

			    if ($errno == '1062') {

					echo "<br>Patron is already in Table: <br />".$last_name.", ".$first_name;

				} else {

					echo("<h4>MySQL No: ".mysql_errno($result)."</h4>");

					echo("<h4>MySQL Error: ".mysql_error($result)."</h4>");

					echo("<h4>SQL: ".$statement."</h4>");

					echo("<h4>MySQL Affected Rows: ".mysql_affected_rows($result)."</h4>");

				}

				return 'NotAdded';

			}


		}

    ?>
