<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "project";
	// Create connection
	$conn = mysqli_connect($servername, $username, $password,$database);
	$conn->query('SET NAMES utf8');
	// Check connection
	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}
?>