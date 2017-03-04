<?php
	include("employeedb.php");

	$message = "";
	if(isset($_POST['submit']))
	{
		$firstName = trim($_POST['firstName']);
		$lastName = trim($_POST['lastName']);
		$middleName = trim($_POST['middleName']);
		$address = trim($_POST['address']);
		$phone = trim($_POST['phone']);
		$email = trim($_POST['email']);

		if(empty($firstName) || empty($lastName) || empty($address) || empty($phone) || empty($email))
		{
			$message = "<div style='color: red;'>Don't leave the form blank</div>";
		}
		else
		{
			add_employee($firstName, $lastName, $middleName, $address, $phone, $email);
			header('Location: index.php');
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Add Employee</title>
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
			<?php echo $message; ?>
			<div class="form-group container">
				<label class="control-label">First Name</label>
				<br />
				<input type="text" name="firstName" class="form-control" placeholder="First Name">
			</div>

			<div class="form-group container">
				<label class="control-label">Last Name</label>
				<br />
				<input type="text" name="lastName" class="form-control" placeholder="Last Name">
			</div>

			<div class="form-group container">
				<label class="control-label">Middle Name</label>
				<br />
				<input type="text" name="middleName" class="form-control" placeholder="Middle Name">
			</div>

			<div class="form-group container">
				<label class="control-label">Address</label>
				<br />
				<input type="text" name="address" class="form-control" placeholder="Address">
			</div>

			<div class="form-group container">
				<label class="control-label">Phone Number</label>
				<br />
				<input type="text" name="phone" class="form-control" placeholder="Phone Number">
			</div>

			<div class="form-group container">
				<label class="control-label">Email</label>
				<br />
				<input type="email" name="email" class="form-control" placeholder="Email">
			</div>

			<div class="form-group container">
				<input type="submit" name="submit" class="btn btn-primary"> <a href="index.php" class="btn btn-default">Cancel</a>
			</div>
		</form>
	</div>

</body>
</html>