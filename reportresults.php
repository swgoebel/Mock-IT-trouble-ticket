<!DOCTYPE html>
<html> 
 <head> 
 <title>Review</title> 
     <meta charset="UTF-8" />

   <link href="styles.css" type="text/css" rel="stylesheet" />
 </head> 
 <body>
<?php



extract($_POST); 

$status_id = ($_POST['status']);
$keywords = ($_POST['keyword']);
//$keys = explode(" ",$keywords);

	if($status_id  == 0 && $keywords==NULL)
	{
	$select_query = "SELECT Ticket.ticket_id, Ticket.date_submitted, Ticket.status_id, Ticket.problem_id, User.first_name, User.last_name, User.user_id, User.department_id, Ticket.comments, Ticket.representative_id, Ticket.keywords
	From Ticket INNER JOIN User ON Ticket.user_id = User.user_id ORDER BY Ticket.ticket_id ASC;";
	}
	else if($status_id  == 0)
	{
	$keys = explode(" ",$keywords);
	$select_query = "SELECT Ticket.ticket_id, Ticket.date_submitted, Ticket.status_id, Ticket.problem_id, User.first_name, User.last_name, User.user_id, User.department_id, Ticket.comments, Ticket.representative_id, Ticket.keywords
	From Ticket INNER JOIN User ON Ticket.user_id = User.user_id
	WHERE Ticket.comments LIKE '%$keywords%'";
	
	foreach($keys as $k){
	$select_query .= " OR Ticket.comments LIKE '%$k%' ";
		}
	
	$select_query .= "  ORDER BY Ticket.ticket_id ASC;";
	}
	else if($status_id  != 0 && empty($keywords))
	{
	$select_query = "SELECT Ticket.ticket_id, Ticket.date_submitted, Ticket.status_id, Ticket.problem_id, User.first_name, User.last_name, User.user_id, User.department_id, Ticket.comments, Ticket.representative_id, Ticket.keywords
	From Ticket INNER JOIN User ON Ticket.user_id = User.user_id 
	WHERE status_id='".$status_id."' 
	ORDER BY Ticket.ticket_id ASC;";
	}
	else{
	$keys = explode(" ",$keywords);
	$select_query = "SELECT Ticket.ticket_id, Ticket.date_submitted, Ticket.status_id, Ticket.problem_id, User.first_name, User.last_name, User.user_id, User.department_id, Ticket.comments, Ticket.representative_id, Ticket.keywords
	From Ticket INNER JOIN User ON Ticket.user_id = User.user_id
	WHERE status_id='".$status_id."' 
	AND Ticket.comments LIKE '%$keywords%'";
	
	foreach($keys as $k){
	$select_query .= " OR Ticket.comments LIKE '%$k%' ";
		}
	
	$select_query .= "  ORDER BY Ticket.ticket_id ASC;";
		
	}
	
		// Connect to MySQL
         if ( !( $database = mysql_connect( "dev.cictspace.net", 
            "Admin", "Pass" ) ) )
            die( "Could not connect to server" );
   
         // open Jade Arrow database
         if ( !mysql_select_db( "CSC272_JADE_ARROW", $database ) )
            die( "Could not open Jade Arrow database database" );
   	
   
         // query Ticket table
		if ( !( $result2 = mysql_query( $select_query, $database ) ) )
            die( "Could not execute query! <br /></p></div></body></html>" );

			

?>
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
<?php if($_SESSION['is_user'] == true){print( "<li ><a href=\"submit.php\">Submit</a></li>" );}?>

<li class="active"><a href="report.php" >Reporting</a></li>
	 		 <li><a href="documents.html">Documents</a></li>
</ul>
</div>
</div>

	<h3>Search Results</h3>

	<table border = "1" cellpadding = "3" cellspacing = "2" >
		<tr>
			<td>Ticket ID</td>
			<td>Date Submitted</td>
			<td>Status</td>
			<td>Problem</td>
			<td>First Name</td>
			<td>Last Name</td>
			<td>User ID</td>
			<td>Department ID</td>
			<td>Comments</td>
			<td>Representative ID</td>
			<td>Keywords</td>
			
		</tr>
	 <?php

		// fetch each record in result set
		for ( $counter = 0; $row = mysql_fetch_row( $result2 ); $counter++ )
		{

		   // build table to display results
		   print( "<tr>" );

		   foreach ( $row as $key => $value ) 
			  print( "<td>$value</td>" );

		   print( "</tr>" );
		}

		mysql_close( $database );
	 ?>

	</table>
 
  </div>
  <div class="footer">
    <div class="footer_resize">
      <ul class="fmenu">
		  <li><a href="review.php">Review</a></li>
<?php if($_SESSION['is_user'] == true){print( "<li ><a href=\"submit.php\">Submit</a></li>" );}?>

		 		 <li class="active"><a href="report.php">Reporting</a></li>
	 		 <li><a href="documents.html">Documents</a></li>
      </ul>
      <div class="clr"></div>
    </div>
  </div>
  </div>
	
</html>
