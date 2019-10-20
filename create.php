<?php include 'inc/header.php'; ?>
<?php include 'config.php'; ?>
<?php include 'database_file.php'; ?>

<?php 
	
	$db = new Database(); //object of database
if (isset($_POST['submit'])) {

	$name = mysqli_real_escape_string($db->link,$_POST['name']);
	$email = mysqli_real_escape_string($db->link,$_POST['email']);
	$skill = mysqli_real_escape_string($db->link,$_POST['skill']);

	if ( $name == '' || $email == '' || $skill == '') {
		$error='Field must not be empty !';
	}
	else{
		$insertData= "INSERT INTO tbl_userinfo(name,email,skill) Values('$name','$email','$skill')";
		$create= $db->insert($insertData);
	}
}
?>

<?php
	if (isset($error)) {
		echo "<span style='color:red'>".$error."</span>";
	}
?>

<form action="" method="post">
<table class="tblone">
	<tr>
		<td>Name</td>
		<td> <input type="text" name="name" placeholder="Enter your name"> </td>
	</tr>
	<tr>
		<td>Email</td>
		<td> <input type="text" name="email" placeholder="Enter your email"> </td>
	</tr>
	<tr>
		<td>Skill</td>
		<td> <input type="text" name="skill" placeholder="Enter your skill"> </td>
	</tr>
	<tr>
		<td></td>
		<td>
			<input type="submit" name="submit" value="Submit">
			<input type="reset" value="Cancel">
		</td>
	</tr>
</table>
</form>
<a href="index.php">Go Back</a>



<?php include 'inc/footer.php'; ?>