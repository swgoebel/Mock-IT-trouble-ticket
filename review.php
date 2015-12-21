<!DOCTYPE html>
<?php
session_start();
if(!session_is_registered(myusername)){
header("location:index.html");
}
?>
<html> 
 <head> 
 <title>Review</title> 
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
 
	<li class="active"><a href="review.php">Review</a></li>
<?php 
if($_SESSION['is_user'] == true)
{
print( "<li ><a href=\"submit.php\">Submit</a></li>" );}?>
<li><a href="report.php" >Reporting</a></li>
	 		 <li><a href="documents.html">Documents</a></li>
</ul>
</div>
</div>
<br>

<div class="content">
<div class="content_resize">

<form name="form8" method="post" action="getticket.php">
 <table class="table1">
  <tr>
  
  <td>
 <table class="table2">
 <td>Incident Number</td>
 <td>:</td>
 <td><input name="ticket_id" type="text" id="ticket_id"></td>
  </br>
 <tr>
 <td>&nbsp;</td> 
 <td>&nbsp;</td>
 <td><input type="submit" name="Submit" value="Submit"></td>
   </tr>

 
   </tr>
   </table>
 </form>
</table>

 <form name="form2" method="post" action="reviewticket.php">
  <table class="table1">
 <tr>

 <td>
 <table class="table2">
 </tr>
 
 <tr>
 <td colspan="3"><strong>Review Incident </strong></td>
 </tr>
 <tr>
 <td>Date Submitted</td>
 <td>:</td>
 <td><input name="date_submitted" type="text" id="date_submitted"></td>
  </tr>
 <tr>
  <td>Tech ID</td>
 <td></td>
 <td><input name="representative_id" type="text" id="representative_id"></td>
 </tr> 
 <tr>
  <td>User ID</td>
 <td></td>
 <td><input name="user_id" type="text" id="user_id"></td>
 
   <td>Department ID</td>
 <td></td>
 <td><input name="department_id" type="text" id="department_id"></td>
 
 </tr> 
 </br>
 
 <tr>
  <td>Problem</td>
 <td></td>
 <td><input list="problems" type="text" id="problem_id"></td>
  <datalist id="problems">
   <option value="Hardware">
   <option value="Software">
 </datalist>
 
  <td>Status</td>
 <td>:</td>
 <td><input list="status" type="text" id="status_id"></td>
  <datalist id="status">
   <option value="Open">
   <option value="Pending">
   <option value="Closed">
 </datalist>

 </tr>
  </br>
 <tr>
 <td>Comments</td>
 <td>:</td>
 <td><input name="comments" type="text" id="comments"></td>
  <td>Keywords</td>
 <td>:</td>
 <td><input name="keywords" type="text" id="keywords"></td>
 </tr>
  </br>
 <tr>
 <td>&nbsp;</td>
 <td>&nbsp;</td>
 <td><input type="submit" name="Submit" value="Submit"></td>
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