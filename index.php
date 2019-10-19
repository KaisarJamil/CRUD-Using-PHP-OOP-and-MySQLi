<?php include 'inc/header.php'; ?>
<?php include 'config.php'; ?>
<?php include 'database_file.php'; ?>

<?php 
	
	$db 	     = new Database(); //object of database
	$selectData  = "select * from tbl_userinfo"; //select all data from table
	$read        = $db->select($selectData);

?>


<?php
	//successfull operation message

	if (isset($_GET['msg'])) {
		echo "<span style='color:green'>".$_GET['msg']."</span>";
	}
?>
<table class="tblone">
<tr>
	<th width="10%">Serial</th>
	<th width="35%">Name</th>
	<th width="25%">Email</th>
	<th width="25%">Skill</th>
	<th width="15%">Update</th>
</tr>

<?php if($read) { ?>
<?php 
$serial_no=1;
while($row=$read->fetch_assoc()) { ?>
<tr>
	<td><?php echo $serial_no++; ?></td>
	<td><?php echo $row['name']; ?></td>
	<td><?php echo $row['email']; ?></td>
	<td><?php echo $row['skill']; ?></td>
	<td> <a href="update.php?id=<?php echo urldecode($row['id']); ?>">Update</a> </td>
</tr>

<?php } ?>
<?php } else{ ?>
	<p> Data is not available.</p>
<?php } ?>
</table>

<a href="create.php">Create</a>




<?php include 'inc/footer.php'; ?>