<?php require_once('../Connections/connect.php'); ?>
<?php
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['PrevUrl']);
	
  $logoutGoTo = "adminlogin.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}
?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

mysql_select_db($database_connect, $connect);
$query_manageusers = "SELECT * FROM users";
$manageusers = mysql_query($query_manageusers, $connect) or die(mysql_error());
$row_manageusers = mysql_fetch_assoc($manageusers);
$totalRows_manageusers = mysql_num_rows($manageusers);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ManageUsers</title>
<style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #ddd;
  color: black;
}



</style>
<head>
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
  <a  href="PatientOrders.php"><strong>PatientOrders</strong></a>
 <a href="PatientDonations.php"><strong>PatientDonations</strong></a>
 <a href="bloodstock.php"><strong>BloodStock</strong></a>
<a href="ManageUsers.php"><strong>Manage Users</strong></a>
 <a href="<?php echo $logoutAction ?>"><strong>logout</strong></a> </div>  
</td>
  </tr>
</table> 
</div>
</head>
<h1><strong>LIST OF USERS</strong> </h1>


<table border="1" align="center" cellpadding="8" cellspacing="1" >
<tr bgcolor="#4CAF50" valign="top">

    <td>ID</td>
    <td>firstname</td>
    <td>lastname</td>
    <td>username</td>
    <td>password</td>
    <td>UserLevel</td>
    <td>&nbsp;</td>
  </tr>
  <?php do { ?>
    <tr>
      <td bgcolor="#999999"><?php echo $row_manageusers['ID']; ?></td>
      <td bgcolor="#999999"><?php echo $row_manageusers['firstname']; ?></td>
      <td bgcolor="#999999"><?php echo $row_manageusers['lastname']; ?></td>
      <td bgcolor="#999999"><?php echo $row_manageusers['username']; ?></td>
      <td bgcolor="#999999"><?php echo $row_manageusers['password']; ?></td>
      <td bgcolor="#999999"><?php echo $row_manageusers['UserLevel']; ?></td>
      <td><a href="editusers.php?ID=<?php echo $row_manageusers['ID']; ?>">EDIT</a></td>
    </tr>
    <?php } while ($row_manageusers = mysql_fetch_assoc($manageusers)); ?>
</table>
</body>
</html>
<?php
mysql_free_result($manageusers);
?>
