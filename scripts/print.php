<!DOCTYPE html>

<?php require_once('../Connections/connect.php'); ?>

	
<html lang="en">
	<head>
		<style>	
		.table {
			width: 100%;
			margin-bottom: 20px;
		}	
		
		.table-striped tbody > tr:nth-child(odd) > td,
		.table-striped tbody > tr:nth-child(odd) > th {
			background-color: #f9f9f9;
		}
		
		@media print{
			#print {
				display:none;
			}
		}
		@media print {
			#PrintButton {
				display: none;
			}
		}
		
		@page {
			size: auto;   /* auto is the initial value */
			margin: 0;  /* this affects the margin in the printer settings */
		}
	</style>
	</head>
<body>
	
	<br /> <br /> <br /> <br />

	
	<br /><br />
	<table class="table table-striped">
		<thead>
			<tr>
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
			</tr>
		</thead>
		<tbody>
			<?php
				 require_once('../Connections/connect.php'); 
				
				$query = $connect->query("SELECT * FROM `donations`");
				while($fetch = $query->fetch_array()){
					
			?>
			
			<tr>
				<td style="text-align:center;"><?php echo $fetch['username']?></td>
				<td style="text-align:center;"><?php echo $fetch['password']?></td>
				<td style="text-align:center;"><?php echo $fetch['age']?></td>
				<td style="text-align:center;"><?php echo $fetch['homeaddress']?></td>
                <td style="text-align:center;"><?php echo $fetch['mobileno']?></td>
                <td style="text-align:center;"><?php echo $fetch['gender']?></td>
                <td style="text-align:center;"><?php echo $fetch['emailaddress']?></td>
                <td style="text-align:center;"><?php echo $fetch['bloodgroup']?></td>
                <td style="text-align:center;"><?php echo $fetch['date']?></td>
                <td style="text-align:center;"><?php echo $fetch['quantity']?></td>
                
			</tr>
			
			<?php
				}
			?>
		</tbody>
	</table>
	<center><button id="PrintButton" onclick="PrintPage()">Print</button></center>
</body>
<script type="text/javascript">
	function PrintPage() {
		window.print();
	}
</script>
</html>


