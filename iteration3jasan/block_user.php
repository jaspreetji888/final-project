
<?php 
include("include/conn.php");

if(isset($_GET['id'])){
	$id=$_GET['id'];
	$sql="SELECT * from users where id='$id'";
	$sql_find=mysqli_query($conn,$sql);
	if(mysqli_num_rows($sql_find)>0){
		$update_status="UPDATE users set status='Blocked' where id='$id'";
		echo $update_status;
		$update_status_run=mysqli_query($conn,$update_status);
		echo "<script>alert('Student Blocked from Access')</script>";
		echo "<script>window.location.href='manage_students.php'</script>";
	}else{
		echo "<script>alert('Student Id Not Found')</script>";
		echo "<script>window.location.href='manage_students.php'</script>";

	}
}

?>