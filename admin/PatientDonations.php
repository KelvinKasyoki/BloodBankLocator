
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
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "1";
$MM_donotCheckaccess = "false";

// *** Restrict Access To Page: Grant or deny access to this page
function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 
  // For security, start by assuming the visitor is NOT authorized. 
  $isValid = False; 

  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username. 
  // Therefore, we know that a user is NOT logged in if that Session variable is blank. 
  if (!empty($UserName)) { 
    // Besides being logged in, you may restrict access to only certain users based on an ID established when they login. 
    // Parse the strings into arrays. 
    $arrUsers = Explode(",", $strUsers); 
    $arrGroups = Explode(",", $strGroups); 
    if (in_array($UserName, $arrUsers)) { 
      $isValid = true; 
    } 
    // Or, you may restrict access to only certain users based on their username. 
    if (in_array($UserGroup, $arrGroups)) { 
      $isValid = true; 
    } 
    if (($strUsers == "") && false) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "adminlogin.php";
if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {   
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($_SERVER['QUERY_STRING']) && strlen($_SERVER['QUERY_STRING']) > 0) 
  $MM_referrer .= "?" . $_SERVER['QUERY_STRING'];
  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  header("Location: ". $MM_restrictGoTo); 
  exit;
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
$query_PatientDonationsrecds = "SELECT * FROM donation";
$PatientDonationsrecds = mysql_query($query_PatientDonationsrecds, $connect) or die(mysql_error());
$row_PatientDonationsrecds = mysql_fetch_assoc($PatientDonationsrecds);
$totalRows_PatientDonationsrecds = mysql_num_rows($PatientDonationsrecds);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PatientDonations</title>
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
<strong><a href="<?php echo $logoutAction ?>">logout</a></strong>
</div> 
      
    </td>
  </tr>
</table> 
</div>
</head>


<h1><strong>LIST OF PATIENT  BLOOD DONATION</strong> </h1>
<table border="1" align="center" cellpadding="8" cellspacing="1" >
  <tr bgcolor="#4CAF50" valign="top">
    <td><strong>ID</strong></td>
    <td><strong>username</strong></td>
    <td><strong>password</strong></td>
    <td><strong>age</strong></td>
    <td><strong>homeaddress</strong></td>
    <td><strong>mobileno</strong></td>
    <td><strong>gender</strong></td>
    <td><strong>emailaddress</strong></td>
    <td><strong>bloodgroup</strong></td>
    <td><strong>date</strong></td>
    <td><strong>quantity</strong></td>
    <td><strong>bloodbank</strong></td>
    <td>&nbsp;</td>
  </tr>
  <?php do { ?>
    <tr>
      <td bgcolor="#999999"><?php echo $row_PatientDonationsrecds['ID']; ?></td>
      <td bgcolor="#999999"><?php echo $row_PatientDonationsrecds['username']; ?></td>
      <td bgcolor="#999999"><?php echo $row_PatientDonationsrecds['password']; ?></td>
      <td bgcolor="#999999"><?php echo $row_PatientDonationsrecds['age']; ?></td>
      <td bgcolor="#999999"><?php echo $row_PatientDonationsrecds['homeaddress']; ?></td>
      <td bgcolor="#999999"><?php echo $row_PatientDonationsrecds['mobileno']; ?></td>
      <td bgcolor="#999999"><?php echo $row_PatientDonationsrecds['gender']; ?></td>
      <td bgcolor="#999999"><?php echo $row_PatientDonationsrecds['emailaddress']; ?></td>
      <td bgcolor="#999999"><?php echo $row_PatientDonationsrecds['bloodgroup']; ?></td>
      <td bgcolor="#999999"><?php echo $row_PatientDonationsrecds['date']; ?></td>
      <td bgcolor="#999999"><?php echo $row_PatientDonationsrecds['quantity']; ?></td>
       <td bgcolor="#999999"><?php echo $row_PatientDonationsrecds['BBname']; ?></td>
      
      <td><a href="editPatientDonations.php?ID=<?php echo $row_PatientDonationsrecds['ID']; ?>"><strong>EDIT</strong></a></td>
    </tr>
    
    
    <?php } while ($row_PatientDonationsrecds = mysql_fetch_assoc($PatientDonationsrecds)); ?>
</table>


  



</body>
</html>
<?php
mysql_free_result($PatientDonationsrecds);
?>
