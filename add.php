<?php

include('db.php');

if (isset($_POST['submit'])) {
	$id = $_POST['id'];
	$name = $_POST['name'];
	$description = $_POST['description'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];

	//image upload

	$msg = "";
	$image = $_FILES['image']['name'];
	$target = "images/" . basename($image);

	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
		$msg = "Image uploaded successfully";
	} else {
		$msg = "Failed to upload image";
	}

	$insert_data = "INSERT INTO book_mentors (id,name,description,phone,address,image) VALUES ('$id','$name','$description','$phone','$address','$image')";
	$run_data = mysqli_query($con, $insert_data);

	if ($run_data) {
		header('location:admin.php');
	} else {
		$failure = "Unable to INSERT into DB: " . mysqli_error($con);
		//echo "Data not insert";
	}
}
