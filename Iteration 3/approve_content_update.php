
<?php 
include("include/conn.php");

if(isset($_GET['id'])){
	$id=$_GET['id'];
	$sql="SELECT * from course_content where id='$id'";
	$sql_find=mysqli_query($conn,$sql);
	if(mysqli_num_rows($sql_find)>0){
		$update_status="UPDATE course_content set status='Approved' where id='$id'";
		$update_status_run=mysqli_query($conn,$update_status);
		echo "<script>alert('Content Approved')</script>";
		echo "<script>window.location.href='approve_content.php'</script>";
	}else{
		echo "<script>alert('Content Not Found')</script>";
		echo "<script>window.location.href='approve_content.php'</script>";

	}
}

?>