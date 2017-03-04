<?php

	session_start();

	function employee_db(){
		return new PDO("mysql:host=localhost;dbname=payroll;", 'root', '');
	}

	function add_employee($firstName, $lastName, $middleName, $address, $phone, $email){
		$db = employee_db();
		$sql = "INSERT INTO employee(firstName, lastName, middleName, address, phone, email)VALUES(?, ?, ?, ?, ?, ?)";
		$query = $db->prepare($sql);
		$query->execute(array($firstName, $lastName, $middleName, $address, $phone, $email));
		$db = null;
	}

	function get_all_employee(){
		$db = employee_db();
		$sql = "SELECT * FROM employee";
		$query = $db->prepare($sql);
		$query->execute();
		$employees = $query->fetchAll();
		$db = null;

		return $employees;
	}

	function get_employee($employee_id){
		$db = employee_db();
		$sql = "SELECT * FROM employee WHERE employee_id=?";
		$query = $db->prepare($sql);
		$query->execute(array($employee_id));
		$employee = $query->fetch();
		$db = null;

		return $employee;
	}

	function edit_employee($emp){
		$db = employee_db();
		$sql = "UPDATE employee SET firstName=?, lastName=?, middleName=?, address=?, phone=?, email=? WHERE employee_id=?";
		$query = $db->prepare($sql);
		$query->execute(array($emp['firstName'], $emp['lastName'], $emp['middleName'], $emp['address'], $emp['phone'], $emp['email'], $emp['employee_id']));
		$db = null;
	}

	function del_employee($employee_id){
		$db = employee_db();
		$sql = "DELETE FROM employee WHERE employee_id=?";
		$query = $db->prepare($sql);
		$query->execute(array($employee_id));
		$db = null;
	}
?>