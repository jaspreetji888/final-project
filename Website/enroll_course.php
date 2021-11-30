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
	$enroll_course_query="INSERT INTO `enroll`(`course_id`, `user_id`) VALUES('$course_id','$user_id')";
	$enroll_course_query_run=mysqli_query($conn,$enroll_course_query);
	$topics_load="SELECT * from course_content where course_id='$course_id'";
	$topics_load_run=mysqli_query($conn,$topics_load);
	while ($fetch_data=mysqli_fetch_array($topics_load_run)) {
		$topic_id=$fetch_data['id'];
		$enroll_course_query="INSERT INTO `view_history`(`course_id`,`topic_id`, `user_id`) VALUES('$course_id','$topic_id','$user_id')";
		$enroll_course_query_run=mysqli_query($conn,$enroll_course_query);
	}
	echo "<script>alert('Course Enrolled')</script>";
	echo "<script>window.location.href='view_enrolled_courses.php'</script>";
}


?>