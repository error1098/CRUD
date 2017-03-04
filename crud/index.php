<?php
	include("employeedb.php");

	$employee = get_all_employee();

	if(isset($_GET['employee_id']))
	{
		$employee_id = $_GET['employee_id'];
		del_employee($employee_id);
		header('Location: index.php');
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Employee List</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
</head>
<body>

	<nav class="navbar navbar-inverse navbar-static-top">
		<div class="container">
			<div class="navbar-header">
				<a href="#" class="navbar-brand">Paryroll System</a>
			</div>
		</div>
	</nav>

	<div class="container">
		<a href="employeeAdd.php">Add Employee</a>
		<br /><br />
		<table class="table table-bordered table-condensed table-hover table-responsive">
			<thead>
				<tr class="info">
					<td>
						First Name
					</td>
					<td>
						Last Name
					</td>
					<td>
						Middle Name
					</td>
					<td>
						Address
					</td>
					<td>
						Phone
					</td>
					<td>
						Email
					</td>
					<td>
						Query
					</td>
				</tr>
			</thead>

			<tbody>
				<?php
					if(count($employee)>0){
						foreach($employee as $row){
				?>
				<tr>
					<td>
						<?php echo htmlentities($row['firstName']); ?>
					</td>
					<td>
						<?php echo htmlentities($row['lastName']); ?>
					</td>
					<td>
						<?php echo htmlentities($row['middleName']); ?>
					</td>
					<td>
						<?php echo htmlentities($row['address']); ?>
					</td>
					<td>
						<?php echo htmlentities($row['phone']); ?>
					</td>
					<td>
						<?php echo htmlentities($row['email']); ?>
					</td>
					<td>
						<a href="employeeEdit.php?employee_id=<?php echo htmlentities($row['employee_id']); ?>">Edit</a> | <a href="index.php?employee_id=<?php echo htmlentities($row['employee_id']); ?>">Delete</a>
					</td>
				</tr>
				<?php
						}
					}
					else{
				?>
				<tr>
					<td>
						No Data in Databse
					</td>
					<td>
						No Data in Databse
					</td>
					<td>
						No Data in Databse
					</td>
					<td>
						No Data in Databse
					</td>
					<td>
						No Data in Databse
					</td>
					<td>
						No Data in Databse
					</td>
					<td>
						No Query Available
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</body>
</html>