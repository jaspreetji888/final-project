<?php
include("include/conn.php");
include("include/authentication.php");
if(isset($_GET['id']) && isset($_GET['course_id'])){
	$course_id=$_GET['course_id'];
	$topic_id=$_GET['id'];
	$delete_query=mysqli_query($conn,"DELETE FROM `course_content` WHERE id='$topic_id'");
	echo "<script>alert('Course Content Deleted')</script>";
	echo "<script>window.location.href='view_course.php?id=".$course_id."'</script>";	
}

?>