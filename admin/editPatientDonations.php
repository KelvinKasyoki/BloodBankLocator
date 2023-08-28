<?php require_once('../Connections/connect.php'); ?>
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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE donation SET username=%s, password=%s, age=%s, homeaddress=%s, mobileno=%s, gender=%s, emailaddress=%s, bloodgroup=%s, quantity=%s, `date`=%s, BBname=%s WHERE ID=%s",
                       GetSQLValueString($_POST['username'], "text"),
                       GetSQLValueString($_POST['password'], "text"),
                       GetSQLValueString($_POST['age'], "int"),
                       GetSQLValueString($_POST['homeaddress'], "text"),
                       GetSQLValueString($_POST['mobileno'], "int"),
                       GetSQLValueString($_POST['gender'], "text"),
                       GetSQLValueString($_POST['emailaddress'], "text"),
                       GetSQLValueString($_POST['bloodgroup'], "text"),
                       GetSQLValueString($_POST['quantity'], "int"),
                       GetSQLValueString($_POST['date'], "int"),
                       GetSQLValueString($_POST['bloodbank'], "text"),
                       GetSQLValueString($_POST['ID'], "int"));

  mysql_select_db($database_connect, $connect);
  $Result1 = mysql_query($updateSQL, $connect) or die(mysql_error());

  $updateGoTo = "PatientDonations.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_editpatientdonation = "-1";
if (isset($_GET['ID'])) {
  $colname_editpatientdonation = $_GET['ID'];
}
mysql_select_db($database_connect, $connect);
$query_editpatientdonation = sprintf("SELECT * FROM donation WHERE ID = %s", GetSQLValueString($colname_editpatientdonation, "int"));
$editpatientdonation = mysql_query($query_editpatientdonation, $connect) or die(mysql_error());
$row_editpatientdonation = mysql_fetch_assoc($editpatientdonation);
$totalRows_editpatientdonation = mysql_num_rows($editpatientdonation);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>editpatientdonations</title>
   <style>
	* { margin: 0px; padding: 0px; }
body {
	font-size: 120%;
	background: #F8F8FF;
}
.header {
	width: 40%;
	margin: 50px auto 0px;
	color: white;
	background: #5F9EA0;
	text-align: center;
	border: 1px solid #B0C4DE;
	border-bottom: none;
	border-radius: 10px 10px 0px 0px;
	padding: 20px;
}
form, .content {
	width: 40%;
	margin: 0px auto;
	padding: 20px;
	border: 1px solid #B0C4DE;
	background: white;
	border-radius: 0px 0px 10px 10px;
}
.input-group {
	margin: 10px 0px 10px 0px;
}
.input-group label {
	display: block;
	text-align: left;
	margin: 3px;
}
.input-group input {
	height: 30px;
	width: 93%;
	padding: 5px 10px;
	font-size: 16px;
	border-radius: 5px;
	border: 1px solid gray;
}
#user_type {
	height: 40px;
	width: 98%;
	padding: 5px 10px;
	background: white;
	font-size: 16px;
	border-radius: 5px;
	border: 1px solid gray;
}
.btn {
	padding: 10px;
	font-size: 15px;
	color: white;
	background: #5F9EA0;
	border: none;
	border-radius: 5px;
}
.error {
	width: 92%; 
	margin: 0px auto; 
	padding: 10px; 
	border: 1px solid #a94442; 
	color: #a94442; 
	background: #f2dede; 
	border-radius: 5px; 
	text-align: left;
}
.success {
	color: #3c763d; 
	background: #dff0d8; 
	border: 1px solid #3c763d;
	margin-bottom: 20px;
}
</style>
</head>

<body>
<div class="header">
		<h1><strong>EDIT AND SAVE</strong></h1>
	</div>


<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
 <div class="input-group">
  <table  align="center" >
    <tr valign="baseline">
      <td nowrap="nowrap" align="right"><strong>ID:</strong></td>
      <td><?php echo $row_editpatientdonation['ID']; ?></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right"><strong>Username:</strong></td>
      <td><input type="text" name="username" value="<?php echo htmlentities($row_editpatientdonation['username'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right"><strong>Password:</strong></td>
      <td><input type="text" name="password" value="<?php echo htmlentities($row_editpatientdonation['password'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right"><strong>Age:</strong></td>
      <td><input type="text" name="age" value="<?php echo htmlentities($row_editpatientdonation['age'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right"><strong>Homeaddress:</strong></td>
      <td><input type="text" name="homeaddress" value="<?php echo htmlentities($row_editpatientdonation['homeaddress'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right"><strong>Mobileno:</strong></td>
      <td><input type="text" name="mobileno" value="<?php echo htmlentities($row_editpatientdonation['mobileno'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right"><strong>Gender:</strong></td>
      <td><input type="text" name="gender" value="<?php echo htmlentities($row_editpatientdonation['gender'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right"><strong>Emailaddress:</strong></td>
      <td><input type="text" name="emailaddress" value="<?php echo htmlentities($row_editpatientdonation['emailaddress'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right"><strong>Bloodgroup:</strong></td>
      <td><input type="text" name="bloodgroup" value="<?php echo htmlentities($row_editpatientdonation['bloodgroup'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right"><strong>Date:</strong></td>
      <td><input type="text" name="date" value="<?php echo htmlentities($row_editpatientdonation['date'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right"><strong>Quantity:</strong></td>
      <td><input type="text" name="quantity" value="<?php echo htmlentities($row_editpatientdonation['quantity'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right"><strong>BloodBank:</strong></td>
      <td><input type="text" name="bloodbank" value="<?php echo htmlentities($row_editpatientdonation['BBname'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" value="Update record" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form1" />
  <input type="hidden" name="ID" value="<?php echo $row_editpatientdonation['ID']; ?>" />
    </div>
</form>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($editpatientdonation);
?>
