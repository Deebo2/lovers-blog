<?php include 'includes/header.php'; ?>
<?php
//Create DB object
$db = new Database();
if(isset($_POST['submit'])){
	//Set vars
	$title=mysqli_real_escape_string($db->link,$_POST['title']);
	$body=mysqli_real_escape_string($db->link,$_POST['body']);
	$category= (int)$_POST['category'];
	$author=mysqli_real_escape_string($db->link,$_POST['author']);
	$tags=mysqli_real_escape_string($db->link,$_POST['tags']);
	//simple validate
	if($title=='' ||$body=='' ||$category=='' ||$author=='' ||$tags==''){
		//set error
		header('location: add_post.php?error='.urlencode("Every field is required"));
		exit();
	}else{
		//query
		$query="INSERT INTO `posts` (category,title,body,author,tags) VALUE
						({$category},'{$title}','{$body}','{$author}','{$tags}')";
		//Call insert method
		$insert_row=$db->insert($query);
	}
}
?>
<?php
//Create query
$query = 'SELECT * FROM categories';
//Run query
$categories = $db->select($query);
?>
<div class="post-form">
<form method="POST" action="add_post.php">
  <div class="form-group">
    <label for="title">Post Title </label>
    <input type="text" class="form-control my-2" id="title" name="title" placeholder="Enter Title">
  </div>
  
  <div class="form-group">
    <label for="body">Post Content </label>
    <textarea name="body" class="form-control my-2" id="body" rows="3"></textarea>
  </div>
  <div class="form-group">
    <label for="category">Category</label>
    <select name="category" class="form-control my-2" id="category">
    <?php while ($row = $categories->fetch_assoc()) : ?>
      <option value="<?= $row['id']; ?>"><?= $row['name']; ?></option>
      <?php endwhile; ?>
   
    </select>
  </div>
  <div class="form-group">
    <label for="author">Author</label>
    <input type="text" class="form-control my-2" id="author" name="author" placeholder="Enter Author Name">
  </div>
  <div class="form-group">
    <label for="tags">Tags</label>
    <input type="text" class="form-control my-2" id="tags" name="tags" placeholder="Enter Tags">
  </div>
  <div class="form-group my-4">
  <input type="submit" class="btn btn-outline-dark"  name="submit" value="submit" />
    <a href="index.php" class="btn btn-outline-dark  ">Cansel</a>
  </div>
</form>
</div>
<?php include 'includes/footer.php'; ?>

