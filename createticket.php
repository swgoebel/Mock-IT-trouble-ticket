<!DOCTYPE html>
<?php
session_start();
if(!session_is_registered(myusername)){
header("location:index.html");
}
?>
<html> 
 <head> 
 <title>Home</title> 
     <meta charset="UTF-8" />

   <link href="styles.css" type="text/css" rel="stylesheet" />
 </head> 
 <body>
 <div class="main">

  <div class="header">
    <div class="header_resize">
      <div class="logo"><h1><a href="Index.html">Jade Arrow Help Desk</a></h1></div>
    </div>
  </div>
 
 <div class="menu_nav">
    <div class="menu_nav_resize">
 <ul>
	<li><a href="review.php">Review</a></li>
<li class="active"><a href="submit.php">Submit</a></li>
<li><a href="report.php">Reporting</a></li>
	 		 <li><a href="documents.html">Documents</a></li>
</ul>
</div>
</div>
<br>

<div class="content">
<div class="content_resize">

 <h1>Ticket Submitted</h1>
       <?php

        extract( $_POST ); 
      
$user_id = ($_SESSION['user_id']);
       $problem_id = ($_POST['problem']);
	$comments = ($_POST['comments']);

	if($problem_id == 1){
	$problem = hardware;
	}
	else{
	$problem = software;
	}

         $username = ($_POST['Admin']); //added this line to assign the username to a local variable
         $password = ($_POST['Password']); //added this line to assign the password to a local variable
       
	 $id_query = "SELECT ticket_id from Ticket ORDER BY ticket_id DESC LIMIT 0,1";//This gets the highest id number
         
	// Connect to MySQL
         if ( !( $database = mysql_connect( "dev.cictspace.net", 
            "Admin", "Password" ) ) )
            die( "Could not connect to server" );
   
         // open Jade Arrow database
         if ( !mysql_select_db( "CSC272_JADE_ARROW", $database ) )
            die( "Could not open Jade Arrow database database" );
   	
	//creates new id
	//if ( !( $new_id = (mysql_query( $id_query, $database ) + 1)) )
        //    die( "Could not create new id" );
        
	//database query variable
	$insert_query = "insert into Ticket (date_submitted, comments, status_id, problem_id, user_id)
	values ( NOW(), '" .$comments. "', 1, '" .$problem_id. "', '".$user_id."' );";


	 // query Ticket database
         if ( !( $result = mysql_query( $insert_query, $database ) ) )
            die( "Could not execute query! <br /></p></div></body></html>" );
       if ( !( $result2 = mysql_query( $id_query, $database ) ) )
            die( "Could not execute select query! <br /></p></div></body></html>" );
			
			$row = mysql_fetch_row( $result2 );
      ?>


  <table class="table1">
 <tr>
<form name="form2">
 <td>
 <table class="table2">
 <tr>
<td> Ticket ID:</td>
<td><input list="problems" type="text" id="problem_id" disabled value = <?php echo $row[0];?>></td> </tr>
<tr>
 <td width="78">Date Submitted: </td>
<td colspan="2"><script>

var d=new Date();
var monthname=new Array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec")
document.write(monthname[d.getMonth()] + " " + (d.getDate()) + ", " + d.getFullYear());

</script></td>
 <br>
 <tr>
 <td>Problem</td>
<td><input list="problems" type="text" id="problem_id" disabled value = <?php echo $problem;?>></td> 
</select> 

 </tr>
  <br>
 <tr>
 <td>Comments:</td>
<td><input list="problems" type="text" id="problem_id" disabled value = <?php echo "'$comments'";?>></td> 
 </tr>
  <br>
 <tr>
 <td>&nbsp;</td>
 <td>&nbsp;</td>
   </tr>
 
 </table>
 </td>
</form>
 </tr>
 </table>
 <td width="6">:</td>
  </div>
  <div class="footer">
    <div class="footer_resize">
      <ul class="fmenu">
		  <li><a href="review.php">Review</a></li>
		          <li class="active"><a href="submit.php">Submit</a></li>
		 		 <li><a href="report.php">Reporting</a></li>
	 		 <li><a href="documents.html">Documents</a></li>
      </ul>
      <div class="clr"></div>
    </div>
  </div>
  </div>
 </body> 
 </html>
