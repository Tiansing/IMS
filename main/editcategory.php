<?php
include('../connect.php');
$id = $_GET['id'];
$result = $db->prepare("SELECT * FROM category WHERE cat_id= :userid");
$result->bindParam(':userid', $id);
$result->execute();
for ($i = 0; $row = $result->fetch(); $i++) {
?>
	<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
	<form action="saveeditcategory.php" method="post">
		<center>
			<h4><i class="icon-edit icon-large"></i> Edit Category</h4>
		</center>
		<hr>
		<div id="ac">
			<input type="hidden" name="memi" value="<?php echo $id; ?>" />
			<span>Category name : </span><input type="text" style="width:265px; height:30px;" name="cat_title" value="<?php echo $row['cat_title']; ?>" /><br>

			<span>Category Description : </span><textarea style="width:265px; height:80px;" name="cat_desc"><?php echo $row['cat_desc']; ?></textarea><br>
			<div style="float:right; margin-right:10px;">

				<button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i> Save Changes</button>
			</div>
		</div>
	</form>
<?php
}
?>