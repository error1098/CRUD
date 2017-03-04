<?php
	include("employeedb.php");

	if(isset($_POST['update']))
	{
		edit_employee($_POST);
		header('Location: index.php');
	}
	else
	{
		$employee_id = $_GET['employee_id'];
		$employ = get_employee($employee_id);
		$_POST['employee_id'] = $employ['employee_id'];
		$_POST['firstName'] = $employ['firstName'];
		$_POST['lastName'] = $employ['lastName'];
		$_POST['middleName'] = $employ['middleName'];
		$_POST['address'] = $employ['address'];
		$_POST['phone'] = $employ['phone'];
		$_POST['email'] = $employ['email'];
	}

	function post_value($key)
	{
		if(isset($_POST[$key]))
		{
			echo htmlentities($_POST[$key]);
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Employee</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
</head>
<body>

	<nav class="navbar navbar-inverse navbar-static-top">
		<div class="container">
			<div class="navbar-header">
				<a href="index.php" class="navbar-brand">Paryroll System</a>
			</div>
		</div>
	</nav>

	<div class="container">
		<h1>Add Employee</h1>
		<hr />
		<form method="post" class="form-horizontal">
			<input type="hidden" name="employee_id" value="<?php post_value('employee_id'); ?>">
			<div class="form-group container">
				<label class="control-label">First Name</label>
				<br />
				<input type="text" name="firstName" class="form-control" value="<?php post_value('firstName'); ?>">
			</div>

			<div class="form-group container">
				<label class="control-label">Last Name</label>
				<br />
				<input type="text" name="lastName" class="form-control" value="<?php post_value('lastName'); ?>">
			</div>

			<div class="form-group container">
				<label class="control-label">Middle Name</label>
				<br />
				<input type="text" name="middleName" class="form-control" value="<?php post_value('middleName'); ?>">
			</div>

			<div class="form-group container">
				<label class="control-label">Address</label>
				<br />
				<input type="text" name="address" class="form-control" value="<?php post_value('address'); ?>">
			</div>

			<div class="form-group container">
				<label class="control-label">Phone Number</label>
				<br />
				<input type="text" name="phone" class="form-control" value="<?php post_value('phone'); ?>">
			</div>

			<div class="form-group container">
				<label class="control-label">Email</label>
				<br />
				<input type="email" name="email" class="form-control" value="<?php post_value('email'); ?>">
			</div>

			<div class="form-group container">
				<input type="submit" name="update" class="btn btn-primary"> <a href="index.php" class="btn btn-default">Cancel</a>
			</div>
		</form>
	</div>

</body>
</html>