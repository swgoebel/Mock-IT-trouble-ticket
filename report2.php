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
 
  		 		 <li><a href="index.html">Home</a></li>
		  <li><a href="incident.html">Incident</a></li>
		 <li><a href="search.html">Search</a></li>
				        <li class="active"><a href="report.html">Reporting</a></li>
</ul>
</div>
</div>
<br>

<div class="content">
<div class="content_resize">

 <h1>Reports</h1>
 
    <table width="300" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
 <tr>
<form name="form4" method="post" action="report.php">
 <td>
 <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
 <tr>
 <td colspan="3"><strong>Report</strong></td>
 </tr>
 <tr>
 <td width="78">Select Report</td>
 <td width="6">:</td>
 <td width="294"><select name="status">
  <option value="0">All</option>  
<option value="1">Open</option>
  <option value="2">Closed</option>
  <option value="3">Pending</option>
</select> 
 </tr>


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
  		 		 <li><a href="index.html">Home</a></li>
		  <li><a href="incident.html">Incident</a></li>
		 <li><a href="search.html">Search</a></li>
				        <li class="active"><a href="report.html">Reporting</a></li>
      </ul>
      <div class="clr"></div>
    </div>
  </div>
  </div>
 </body> 
 </html>