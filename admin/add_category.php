<?php include 'includes/header.php'; ?>
<?php
//Create DB object
$db = new Database();
if(isset($_POST['submit'])){
	//Set vars
	$name=mysqli_real_escape_string($db->link,$_POST['name']);

	//simple validate
	if($name==''){
		//set error
		header('location: add_category.php?error='.urlencode("Name field is required"));
		exit();
	}else{
		//query
		$query="INSERT INTO `categories` (name) VALUE ('{$name}')";
		//Call insert method
		$insert_row=$db->insert($query);
	}
}
?>
<div class="post-form">
<form method="POST" action="add_category.php">
  <div class="form-group">
    <label for="title">Category Name </label>
    <input type="text" class="form-control my-2" id="category" name="name" placeholder="Enter Title">
  </div>
  
 
  
  <div class="form-group my-4">
  <input type="submit" class="btn btn-outline-dark"  name="submit" value="submit" />
    <a href="index.php" class="btn btn-outline-dark  ">Cansel</a>
  </div>
</form>
</div>
<?php include 'includes/footer.php'; ?>