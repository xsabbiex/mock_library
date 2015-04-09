<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">

    <title>King Library Registration - SDomingues LIBR246</title>
    <link rel="stylesheet" type="text/css" href="css/KingLib_8.css" />

  </head>
  <body>
    <?php
    
        if (isset($_POST['username']))
        {
             $userid = $_POST['username'];
        } else {
	        $userid = '';
        }

        if (isset($_POST['password']))
        {
            $password = $_POST['password'];
        } else {
	        $password = '';
        }
        
        include 'assignment_8_common_functions.php';
    	$db = connectDatabase($server);
        
        $sql_statement  = "SELECT a_userid ";
    	$sql_statement .= "FROM d1898_patron ";
		$sql_statement .= "WHERE a_userid = '".$userid."' ";
        $sql_statement .= "AND a_password = '".$password."' ";
        
       
        
		$result = mysql_query($sql_statement);
        
        $outputDisplay = "";
        $myrowcount = 0;
        
        if (!$result) {
            $outputDisplay .= "<br /><font color=red>MySQL No: ".mysql_errno();
        	$outputDisplay .= "<br />MySQL Error: ".mysql_error();
            $outputDisplay .= "<br />SQL Statement: ".$sql_statement;
        	$outputDisplay .= "<br />MySQL Affected Rows: ".mysql_affected_rows()."</font><br />";
        } else {

        	$numresults = mysql_num_rows($result);

	        if ($numresults == 0)
	        {
    	    	$outputDisplay .= "<p>The username and/or password you have entered is invalid<br />
                                    System cannot log you onto the system.<br />
                                    GO BACK and try again.</p> ";
    		
	        } else {
                $outputDisplay .= showNames($userid, $password);
	        }
        }
        print $outputDisplay;
    ?>
    </body>
    </html>
    
    <?php
        function showNames($userid, $password)
        {
        
        $sql_statement = "SELECT firstname, lastname, email ";
        $sql_statement .= "FROM d1898_patron ";
        $sql_statement .= "WHERE a_userid = '".$userid."' ";
        $sql_statement .= "AND a_password = '".$password."' ";
       
       
        $result = mysql_query($sql_statement);
        
        $names = mysql_fetch_array($result);
        
        $first_name = $names['firstname'];
        $last_name = $names['lastname'];
        $e_mail = $names['email'];
        
        $outputDisplay = "";
        $myrowcount = 0;
        
        if (!$result) {
            $outputDisplay .= "<br /><font color=red>MySQL No: ".mysql_errno();
            $outputDisplay .= "<br />MySQL Error: ".mysql_error();
            $outputDisplay .= "<br />SQL Statement: ".$sql_statement;
        	$outputDisplay .= "<br />MySQL Affected Rows: ".mysql_affected_rows()."</font><br />";
        } else {
        
            $outputDisplay .= "<p><strong>Sucessful Logon for Patron:</strong></p>";
            $outputDisplay .= "<p>Name: ".$first_name." ".$last_name."</p>";
            $outputDisplay .= "<p>Email: ".$e_mail."</p>";
        }
        print $outputDisplay;
        }
    ?>   
       
       
