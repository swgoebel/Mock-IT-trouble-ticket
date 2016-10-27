<!DOCTYPE html>
<html> 
 <head> 
 <title>Review</title> 
     <meta charset="UTF-8" />

   <link href="styles.css" type="text/css" rel="stylesheet" />
 </head> 
 <body>
 <?php

extract( $_POST ); 

$ticket_id = ($_POST['ticket_id']);

	$select_query = "SELECT Ticket.ticket_id, Ticket.date_submitted, Ticket.status_id, Ticket.problem_id, User.first_name, User.last_name, User.user_id, User.department_id, Ticket.comments, Ticket.representative_id, Ticket.keywords
	From Ticket INNER JOIN User ON Ticket.user_id = User.user_id
	WHERE ticket_id='$ticket_id';";

	
	$date_query = "SELECT date_submitted FROM Ticket WHERE ticket_id='$ticket_id';";

      $problem_query = "SELECT problem_id FROM Ticket WHERE ticket_id='$ticket_id';";  
	
	$keyword_query = "SELECT keywords FROM Ticket WHERE ticket_id='$ticket_id';";
		// Connect to MySQL
         if ( !( $database = mysql_connect( "dev.cictspace.net", 
            "Admin", "Pass" ) ) )
            die( "Could not connect to server" );
   
         // open Jade Arrow database
         if ( !mysql_select_db( "CSC272_JADE_ARROW", $database ) )
            die( "Could not open Jade Arrow database database" );
   	
   
         // query Ticket table
		//if ( !( $keywords = mysql_query( $keyword_query, $database ) ) )
       //     die( "Could not execute query! <br /></p></div></body></html>" );
		
		 // query Ticket table
		if ( !( $result2 = mysql_query( $select_query, $database ) ) )
            die( "Could not execute query! <br /></p></div></body></html>" );
		
		$row = mysql_fetch_row( $result2 ); 	
		//$keyword_array = mysql_fetch_row($keywords);
		
		$user_name = $row[4]." ".$row[5];
			if($row[3] == 1){
				$problem = "Hardware";
				}
			else{
			$problem = "Software";
			}
			
			if($row[7] == 1){
			$department= "Accounting";
			}
			else if($row[7] == 2){
			$department = "HR";
			}
			else if($row[7] == 3){
			$department= "IT";
			}
			else if($row[7] == 5){
			$department = "Restaurant";
			}
			
			
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
 	<li class="active"><a href="review.php">Review</a></li>
<?php if($_SESSION['is_user'] == true){print( "<li ><a href=\"submit.php\">Submit</a></li>" );}?>
<li><a href="report.php" >Reporting</a></li>
	 		 <li><a href="documents.html">Documents</a></li>
</ul>
</div>
</div>
<br>

<div class="content">
<div class="content_resize">

 <table class="table1">
  <tr>
  <form name="form8" method="post" action="getticket.php">
  <td>
 <table class="table2">
 <td>Incident Number</td>
 <td>:</td>
 <td><input name="ticket_id" type="text" id="ticket_id"></td>
  <br>
 <tr>
 <td>&nbsp;</td> 
 <td>&nbsp;</td>
 <td><input type="submit" name="Submit" value="Submit"></td>
   </tr>

 
   </tr>
   </table>
 </form>
</table>
  <table class="table1">
 <tr>
<form name="form2" method="post" action="reviewticket.php">
 <td>
 <table class="table2">
 </tr>
 
 <tr>
 <td colspan="3"><strong>Review Incident </strong></td>
 </tr>
 <tr>
 <td>Date Submitted</td>
 <td>:</td>
 <td> <input name="date_submitted" type="text" id="date_submitted" disabled value=<?php 
				$timestamp2 = strtotime($row[1]);
				echo date("m-d-Y", $timestamp2);?>></td>
				  <td>Ticket ID</td>
 <td></td>
 <td><input name="ticket_id" type="text" id="ticket_id"  value = "<?php echo $ticket_id;?>"></td>
  </tr>
 <tr>
  <td>Tech ID</td>
 <td></td>
 <td>
  		<select name="representative_id"> 
		<option value="1" <?php if ($row[9] == 1) echo 'selected="selected"';?>>None</option>
		<option value="2"<?php if ($row[9] == 2) echo 'selected="selected"';?>>Thomas Jefferson</option>
		<option value="3"<?php if ($row[9] == 3) echo 'selected="selected"';?>>Mark Jackson</option>
		</select> 
		</td>
 </tr> 
 <tr>
  <td>User ID</td>
 <td></td>
 <td><input name="user_id" type="text" id="user_id" disabled value = <?php echo $row[6];?>></td>
 
   <td>Department ID</td>
 <td></td>
 <td><input name="department_id" type="text" id="department_id" disabled value = <?php echo $department;?>></td>
 
 </tr> 
 <br>
 
 <tr>
  <td>Problem</td>
 <td></td>
 <td><input list="problems" type="text" id="problem_id" disabled value = <?php echo $problem;?>></td>
 </datalist>
 
  <td>Status</td>
 <td>:</td>
 <td>
 		<select name="status"> 
		<option value="1" <?php if ($row[2] == 1) echo 'selected="selected"';?>>Open</option>
		<option value="2"<?php if ($row[2] == 2) echo 'selected="selected"';?>>Closed</option>
		<option value="3"<?php if ($row[2] == 3) echo 'selected="selected"';?>>Pending</option>
		</select> 
 </td>
 </datalist>

 </tr>
  <br>
 <tr>
 <td>Comments</td>
 <td>:</td>
 <td><input name="comments" type="text" id="comments" disabled value= <?php echo "'$row[8]'";?>></td>
   <td>Keywords</td>
 <td>:</td>
 <td><input name="keyword" type="text" id="keyword"  value= <?php echo "'$row[10]'";?>></td>
 </tr>
  <br>
 <tr>
 <td>&nbsp;</td>
 <td>&nbsp;</td>
 <td><input type="submit" name="Submit" value="Resubmit"></td>
   </tr>
 </td>
 </td>
 </table>
 
</form>
 
 </table>


 
 
 
  </div>
  <div class="footer">
    <div class="footer_resize">
      <ul class="fmenu">
		  <li class="active"><a href="review.php">Review</a></li>
<?php if($_SESSION['is_user'] == true){print( "<li ><a href=\"submit.php\">Submit</a></li>" );}?>
		 		 <li><a href="report.php">Reporting</a></li>
	 		 <li><a href="documents.html">Documents</a></li>
      </ul>
      <div class="clr"></div>
    </div>
  </div>
  </div>
 </body> 
 </html>
