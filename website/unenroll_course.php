<?php
include("include/conn.php");
include("include/authentication.php");

if(isset($_GET['id'])){
	$course_id=$_GET['id'];
	$email_session=$_SESSION['userloggedin'];
	$fetch_uname="SELECT * FROM users where email='$email_session'";
	$fetch_uname_run=mysqli_query($conn,$fetch_uname);
	$fetch_uname_data=mysqli_fetch_array($fetch_uname_run);
	$user_id= $fetch_uname_data['id'];

	$delete_view_history="DELETE FROM view_history where course_id='$course_id' and user_id='$user_id'";
	$run_delete_view_history=mysqli_query($conn,$delete_view_history);

	$delete_view_history="DELETE FROM enroll where course_id='$course_id' and user_id='$user_id'";
	$run_delete_view_history=mysqli_query($conn,$delete_view_history);

	echo "<script>alert('Course Un-Enrolled')</script>";
	echo "<script>window.location.href='view_enrolled_courses.php'</script>";
}


?>