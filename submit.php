<!DOCTYPE html>
<?php
session_start();
if(!session_is_registered(myusername)){
header("location:index.html");
}
?>
<html> 
 <head> 
 <title>Submit</title> 
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

 
   <table class="table1">
 <tr>
<form name="form2" method="post" action="createticket.php">
 <td>
 <table class="table2">
 <tr>
 <td colspan="3"><strong>Submit New Incident</strong></td>
 </tr>
 <tr>
   <td>User ID</td>
 <td></td>
<td><input name="user_id" type="text" id="user_id" disabled value = <?php echo $_SESSION['user_id'];?>></td> 
  
   <td>Department ID</td>
 <td></td>
 <td><input name="department_id" type="text" id="department_id" disabled value = <?php echo $_SESSION['department_id'];?>></td>
 
 <tr>
   <td>First Name</td>
 <td></td>
<td><input name="first_name" type="text" id="first_name" disabled value = <?php echo $_SESSION['first_name'];?>></td> 
<td>Last Name</td>
 <td></td>
<td><input name="last_name" type="text" id="last_name" disabled value = <?php echo $_SESSION['last_name'];?>></td> 
</tr>
 <tr>
 <td width="78">Date Submitted</td>
 <td width="6">:</td>
 <td><script>

var d=new Date();
var monthname=new Array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec")
document.write(monthname[d.getMonth()] + " " + (d.getDate()) + ", " + d.getFullYear());
</script></td>
 </br>
 <tr>
 <td>Problem:</td>
 <td>:</td>
 <td><select name="problem">
  <option value="1">Hardware</option>
  <option value="2">Software</option>
</select> 

 </tr>
  </br>
 <tr>
 <td>Comments</td>
 <td>:</td>
 <td><input name="comments" type="text" id="comments"></td>
 </tr>
  </br>
 <tr>
 <td>&nbsp;</td>
 <td>&nbsp;</td>
 <td><input type="submit" name="Submit" value="Submit"></td>
   </tr>
 
 </table>
 </td>
</form>
 </tr>
 </table>

 
 
 
 
 
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