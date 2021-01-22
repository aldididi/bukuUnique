<?php
include('db.php');
$id = $_GET['id'];

if (isset($_POST['submit'])) {
	$name = $_POST['name'];
	$description = $_POST['description'];
	$price = $_POST['price'];
	$address  = $_POST['address'];

	$msg = "";
	$image = $_FILES['image']['name'];
	$target = "images/" . basename($image);

	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
		$msg = "Image uploaded successfully";
	} else {
		$msg = "Failed to upload image";
	}

	$update = "UPDATE book_mentors SET name='$name', description = '$description', price = '$price', address = '$address', image = '$image' WHERE id=$id ";
	$run_update = mysqli_query($con, $update);

	if ($run_update) {
		header('location:admin.php');
	} else {
		echo "Data not update";
	}
}
