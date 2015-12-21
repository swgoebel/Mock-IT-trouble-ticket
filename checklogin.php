
<?php

session_start();
$tbl_name=$_POST['user']; // Table name


		// Connect to server and select databse.
         if ( !( $database = mysql_connect( "dev.cictspace.net", 
            "SGOEBE8199", "GeorgeWashington" ) ) )
            die( "Could not connect to server" );
         
		 // open Jade Arrow database
         if ( !mysql_select_db( "CSC272_JADE_ARROW", $database ) )
            die( "Could not open Jade Arrow database database" );
   	

// username and password sent from form
$myusername=$_POST['myusername'];
$mypassword=$_POST['mypassword'];

// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);

$sql="SELECT * FROM $tbl_name WHERE username='" .$myusername. "'and password='" .$mypassword. "'";
$result=mysql_query($sql, $database)or die( "Could execute" );

// Mysql_num_row is counting table row
$count=mysql_num_rows($result) ;

// If result matched $myusername and $mypassword, table row must be 1 row

if($count==1 && $tbl_name == "User"){
$row = mysql_fetch_row( $result ); 	
// Register $myusername, $mypassword and redirect to file "login_success.php"
$_SESSION['user_id'] = $row[0];
$_SESSION['department_id'] = $row[1];
$_SESSION['first_name'] = $row[2];
$_SESSION['last_name'] = $row[3];
$_SESSION['is_user'] = True;
session_register("myusername");
session_register("mypassword");
header("location:submit.php");
}
else if ($count==1 && $tbl_name == "Representative"){
$row = mysql_fetch_row( $result ); 	
// Register $myusername, $mypassword and redirect to file "login_success.php"
$_SESSION['representativ_id'] = $row[0];
$_SESSION['department_id'] = $row[5];
$_SESSION['first_name'] = $row[1];
$_SESSION['last_name'] = $row[2];
$_SESSION['is_user'] = False;
session_register("myusername");
session_register("mypassword");
header("location:review.php");
}
else {echo "Wrong Username or Password";
}

ob_end_flush();
?>
