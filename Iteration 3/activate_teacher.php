
<?php 
include("include/conn.php");

if(isset($_GET['id'])){
	$id=$_GET['id'];
	$sql="SELECT * from teachers where id='$id'";
	$sql_find=mysqli_query($conn,$sql);
	if(mysqli_num_rows($sql_find)>0){
		$update_status="UPDATE teachers set status='Active' where id='$id'";
		$update_status_run=mysqli_query($conn,$update_status);
		echo "<script>alert('Teacher Activated')</script>";
		echo "<script>window.location.href='manage_teachers.php'</script>";
	}else{
		echo "<script>alert('Teacher Id Not Found')</script>";
		echo "<script>window.location.href='manage_teachers.php'</script>";

	}
}

?>