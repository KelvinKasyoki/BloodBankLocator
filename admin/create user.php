<?php require_once('../Connections/connect.php'); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>manageusers</title>
<link rel="stylesheet" type="text/css" href="file:///C|/New folder (2)/htdocs/style.css">
	

<body>
<table width="100%" cellspacing="0" cellpadding="15" align="center">
  <tr>
    <td>
    <div align="center">
      <h1><strong>BLOOD BANK LOCATOR</strong></h1>
    </div>
    </td>
  </tr>
  <tr>
    <td> 
    <div class="topnav">
  <a class="active" href="PatientOrders.php"><strong>PatientOrders</strong></a>
 <a href="PatientDonations.php"><strong>PatientDonations</strong></a>
 <a href="bloodstock.php"><strong>BloodStock</strong></a>
  <a href="ManageUsers.php"><strong>Manage Users</strong></a> 
  <a href="<?php echo $logoutAction ?>" ><strong>Logout</strong></a>
    </div>  
</td>
  </tr>
</table> 
</div>
</head>

<body>
<div class="header">
		<h1><strong>Create  new user </strong></h1>
</div>

<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
  <table align="center">
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Username:</td>
      <td><input type="text" name="username" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">User_type:</td>
   <td>
      <input type = "radio" name = "gender" value = "admin">Admin
       <input type = "radio" name = "gender" value = "user">User
      </td>
      </td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Password:</td>
      <td><input type="text" name="password" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right"> Confirm Password:</td>
      <td><input type="text" name="password" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" value="create user" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1" />
</form>
<p>&nbsp;</p>
</body>
</html>