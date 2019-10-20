<?php include 'inc/header.php'; ?>
<?php include 'config.php'; ?>
<?php include 'database_file.php'; ?>

<?php 
	
	$id = $_GET['id'];
	$db = new Database(); //object of database
	$selectData = "select * from tbl_userinfo where id=$id"; //select all data from table
	$getData = $db->select($selectData)->fetch_assoc();

//update part

if (isset($_POST['submit'])) {

	$name = mysqli_real_escape_string($db->link,$_POST['name']);
	$email = mysqli_real_escape_string($db->link,$_POST['email']);
	$skill = mysqli_real_escape_string($db->link,$_POST['skill']);

	if ( $name == '' || $email == '' || $skill == '') {
		$error='Field must not be empty !';
	}
	else{
		$insertData= " UPDATE tbl_userinfo
		SET
		name = '$name',
		email = '$email',
		skill = '$skill'
		WHERE id = $id ";


		$update= $db->update($insertData);
	}
}
?>
<?php
	//delete part

	if (isset($_POST['delete'])) {
		
		$query= "DELETE FROM tbl_userinfo WHERE id=$id";
		$deleteData=$db->delete($query);
	}
?>

<?php
	if (isset($error)) {
		echo "<span style='color:red'>".$error."</span>";
	}
?>

<form action="update.php?id=<?php echo $id; ?>" method="post">
<table class="tblone">
	<tr>
		<td>Name</td>
		<td> <input type="text" name="name" value="<?php echo $getData['name'] ?>"> </td>
	</tr>
	<tr>
		<td>Email</td>
		<td> <input type="text" name="email" value="<?php echo $getData['email'] ?>"> </td>
	</tr>
	<tr>
		<td>Skill</td>
		<td> <input type="text" name="skill" value="<?php echo $getData['skill'] ?>"> </td>
	</tr>
	<tr>
		<td></td>
		<td>
			<input type="submit" name="submit" value="Submit">
			<input type="reset" value="Cancel">
			<input type="submit" name="delete" value="Delete">
		</td>
	</tr>
</table>
</form>
<a href="index.php">Go Back</a>



<?php include 'inc/footer.php'; ?>