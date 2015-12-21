<!DOCTYPE html>
<?php
session_start();
if(!session_is_registered(myusername)){
header("location:index.html");
}
?>
<html> 
 <head> 
 <title>Reporting</title> 
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
<?php if($_SESSION['is_user'] == true){print( "<li ><a href=\"submit.php\">Submit</a></li>" );}?>
<li class="active"><a href="report.php" >Reporting</a></li>
	 		 <li><a href="documents.html">Documents</a></li>
</ul>
</div>
</div>
<br>

<div class="content">
<div class="content_resize">


 <form name="form4" method="post" action="reportresults.php">
    <table class="table1">
 <tr>

 <td>
 <table class="table2">
 <tr>
 <td colspan="3"><strong>Report</strong></td>
 </tr>
 <tr>
 <td >Select Report</td>
 <td>:</td>
 <td><select name="status">
  <option value="0">All</option>  
<option value="1">Open</option>
  <option value="2">Closed</option>
  <option value="3">Pending</option>
</select> </td>
 </tr>
<tr>
   <td>Search for a problem</td>
 <td>:</td>
 <td><input name="keyword" type="text" id="keyword"></td>
 </tr>
  </br>
 <tr>
 <td>&nbsp;</td>
 <td>&nbsp;</td>
 <td><input type="submit" name="Submit" value="Submit"></td>
  
 </tr>
 
 </table>
 </td>

 </tr>
 </table>
</form>
 
 
 
 
 
 
 
 
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
 </body> 
 </html>