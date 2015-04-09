<!DOCTYPE html>

<html lang="en">

  <head>

    <meta charset="utf-8">


    <title>King Library Registration - SDomingues LIBR246</title>

    <link rel="stylesheet" type="text/css" href="KingLib_8.css" />


  </head>

  <body>

	<div id="logo">

		<a href="assignment_8.php"><img src="http://ntowl.com/images/KingLibLogo.jpg" /></a>

	</div>

	<div id="my_form">

		<p>Please sign up</p>



  		<form method="post" action=" assignment_8_add_patron.php">

    		<p>First Name:<br />

    		<input type="text" name="firstname" size="30" />

    		</p>

  			<p>Last Name:<br />

    		<input type="text" name="lastname" size="30" />

    		</p>

  			<p>Email:<br />

    		<input type="text" name="email" size="30" />

    		</p>

			<p>Birth Year:<br />

    		<input type="text" name="birth_year" size="4" />

    		</p>

  			<p>City of Residence:<br />

  				<?php

					include 'assignment_8_common_functions.php';

					$db = connectDatabase($server);


    				$sql_statement  = "SELECT name ";

					$sql_statement .= "FROM city ";

					$sql_statement .= "ORDER BY name ";


					$result = mysql_query($sql_statement);


					$outputDisplay = "";

					$myrowcount = 0;


					if (!$result) {

						$outputDisplay .= "<br /><font color=red>MySQL No: ".mysql_errno();

						$outputDisplay .= "<br />MySQL Error: ".mysql_error();

						$outputDisplay .= "<br />SQL Statement: ".$sql_statement;

						$outputDisplay .= "<br />MySQL Affected Rows: ".mysql_affected_rows()."</font><br />";

					} else {



						$outputDisplay  = "<select name='city' size='1'>";



						$numresults = mysql_num_rows($result);



						for ($i = 0; $i < $numresults; $i++)

						{

							$row = mysql_fetch_array($result);

							$name  = $row['name'];

							$outputDisplay .= "<option value='".$name."'>".$name."</option>";

						}

						$outputDisplay .= "</select>";

					}

					print $outputDisplay;



    			?>

                <p>Choose Userid and Password<br />

                (10 character maximum)</p>

                <p>Userid:

        	    <input type="text" name="userid" size="10" />

    	    	Password:

    		    <input type="password" name="password" size="10" />

    		    </p>


  			<p><input type="submit" value="Submit Information" /></p>

  		</form>

  		<p>For Admin use only: <a href="assignment_8_view_patrons.php">View Patrons</a></p>

  		<?php

			getServer($a_server);



		?>



	</div>



  </body>

</html>
