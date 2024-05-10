<?php include 'includes/header.php'; ?>
<?php
$id = $_GET['id'];
//Create DB object
$db = new Database();
if(isset($_POST['submit'])){
	//Set vars
	$name=mysqli_real_escape_string($db->link,$_POST['name']);
	

	//query
	$query="UPDATE `categories` SET name='{$name}' WHERE id =".$id;
					
	//Call insert method
	$update_row=$db->update($query);
	
}
?>
<?php
if(isset($_POST['delete'])){
	//query
	$query="DELETE FROM `categories` WHERE id =".$id;
					
	//Call insert method
	$delete_row=$db->delete($query);
	
}
?>
<?php
//Create query
$query = 'SELECT * FROM categories WHERE id ='.$id;
//Run query
$category = $db->select($query)->fetch_assoc();
?>
<div class="post-form">
<form method="POST" action="edit_category.php?id=<?= $id; ?>">
  <div class="form-group">
    <label for="title">Category Name </label>
    <input type="text" class="form-control my-2" id="category" name="name" value="<?= $category['name']; ?>">
  </div>
  
 
  
  <div class="form-group my-4">
    <input type="submit" class="btn btn-outline-dark"  name="submit" value="submit" />
    <a href="index.php" class="btn btn-outline-dark  ">Cansel</a>
     <input type="submit" class="btn  btn-outline-danger"  name="delete" value="Delete" />
  </div>
</form>
</div>
<?php include 'includes/footer.php'; ?>