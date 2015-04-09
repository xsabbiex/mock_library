<?php


	function getServer($server)

	{

		$server = $_SERVER['SERVER_NAME'];

		if ($server == "ntowl.com")

		{

			$server = "Practice Area";

		}

		else

		{

			$server = "localhost";

		}

		print "<p>SERVER: ".$server."</p>";

	}

?>


<?php

	function doValidation($a_first_name, $a_last_name, $a_email, $a_birth_year, $a_length_of_year, $a_city, $b_userid, $b_password)

	{



				$errmsg = '';

				if (empty($a_first_name))

				{

					$errmsg .= "Error: You must enter a First Name<br />";



				}

				if (empty($a_last_name))

				{

					$errmsg .= "Error: You must enter a Last Name<br />";



				}

				if (empty($a_email))

				{

					$errmsg .= "Error: You must enter your Email<br />";



				}

				if (empty($a_birth_year))

				{

					$errmsg .= "Error: You must enter your Birth Year<br />";



				}



				else if (!is_numeric($a_birth_year))

				{

					$errmsg .= "Error: Birth Year must be numeric<br />";



				}

				else if ($a_length_of_year != 4)

				{

					$errmsg .= "Error: Birth Year must be four numbers<br />";



				}

				if ($a_city == '-')

				{

					$errmsg .= "Error: You must select a City<br />";



				}

                if (empty($b_userid))

    			{

					$errmsg .= "Error: You must enter a Userid<br />";



				}

                if (empty($b_password))

    			{

					$errmsg .= "Error: You must enter a Password<br />";



				}



		   			if (!empty($errmsg))

		   			{

		   			$errmsg .= "<br /><strong>Go BACK and make corrections</strong>";

		   			}

		   			return $errmsg;


	}

?>



<?php



//**********************************************

//*  Connect to MySQL and Database

//**********************************************



function connectDatabase($server)

{

	   if ($server == 'localhost')

	   	{

	   		$db = mysql_connect('localhost','root','');



	   		if (!$db)

	   		{

	   			print "<h1>Unable to Connect to MySQL</h1>";

	   		}



	   		$dbname = 'test';



	   		$btest = mysql_select_db($dbname);



	   		if (!$btest)

	   		{

	   			print "<h1>Unable to Select the Database</h1>";

	   		}



	       } else {



	   		 require('../../../../../DBtest.php');



	   		 $host = 'localhost';

	   		 $userid = '7admin7';

	   		 $password ='7dosql7';



	   		 $db = mysql_perry_pconnect($host, $userid, $password);



	   		 if (!$db)

	   		 {

	   		     print "<h1>Unable to Connect to MySQL</h1>";

	   		     exit;

	   		 }



	   		 $dbname ='7phpmysql7';

	   		 $dbtest= mysql_perry_select_db($dbname);



	   		 if (!$dbtest)

	   		 {

	   		 	 print "<h1>Unable to Select the Database</h1>";

	   		 }



	   	}



		return $db;



}


//********************************************************

//*  Get results from table and put them in $outputArray

//********************************************************



function selectResults($statement, $db)

{



	$output = "";

	$outputArray = array();



	if ($db)

	{

		$result = mysql_query($statement);



		if (!$result) {

			$output .= "ERROR";

			$output .= "<br /><font color=red>MySQL No: ".mysql_errno();

			$output .= "<br />MySQL Error: ".mysql_error();

			$output .= "<br />SQL Statement: ".$statement;

			$output .= "<br />MySQL Affected Rows: ".mysql_affected_rows()."</font><br />";



			array_push($outputArray, $output);



		} else {



			$numresults = mysql_num_rows($result);



			array_push($outputArray, $numresults);



			for ($i = 0; $i < $numresults; $i++)

			{

				$row = mysql_fetch_array($result);



				array_push($outputArray, $row);

			}

		}



	} else {



		array_push($outputArray, 'ERROR-No DB Connection');



	}



	return $outputArray;

}



//********************************************************

//*  Display errors as $ouput

//********************************************************



function iduResults($statement, $db)

{

	$output = "";

	$outputArray = array();

	if ($db)

	{

		$result = mysql_query($statement);



		if (!$result)

		{

		   $errno = mysql_errno($db);



		   if ($errno == '1062')

			{

				$output .= "ERROR";

				$output .= "<br />Userid is already in system";

			} else {

				$output .= "ERROR";

				$output .= "<br /><font color=red>MySQL No: ".mysql_errno();

				$output .= "<br />MySQL Error: ".mysql_error();

				$output .= "<br />SQL Statement: ".$statement;

				$output .= "<br />MySQL Affected Rows: ".mysql_affected_rows()."</font><br />";

			}


		} else {

			$output = mysql_affected_rows();

		}

	} else {



		$output =  'ERROR-No DB Connection';

	}

	return $output;

}
?>
