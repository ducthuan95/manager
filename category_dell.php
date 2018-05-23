<?php
	require 'includes/connect.php';
	if(isset($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_INT, array('min_range'=>1)))
	{
		$id = $_GET['id'];
		$sql = "DELETE FROM danhmuc WHERE id='$id'";
		$result = mysqli_query($conn,$sql);
		header('Location:category_list.php');
	}
	else {
		header('Location:category_list.php');
	}
?>