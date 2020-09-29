 <?php 
include('../include/db.php');
$id= $_POST['cat_id'];
$cat_title= $_POST['cat_title'];
$query='select count(cat_id) from categories';
$count=mysqli_query($connect, $query);
if ($count) {
	$update="update categories set 
	cat_title='$cat_title'
	where cat_id=".$id;
	$result=mysqli_query($connect,$update);
	if ($result) {
		header('location:categories.php?msg=Modification faite');
		
	}
	else{
		header('location:index_admin.php?msg=Modification faite');
	}
	}
	
 ?>