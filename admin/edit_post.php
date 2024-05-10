<?php include 'includes/header.php'; ?>
<?php
$id = $_GET['id'];
//Create DB object
$db = new Database();
if(isset($_POST['submit'])){
	//Set vars
	$title=mysqli_real_escape_string($db->link,$_POST['title']);
	$body=mysqli_real_escape_string($db->link,$_POST['body']);
	$category= (int)$_POST['category'];
	$author=mysqli_real_escape_string($db->link,$_POST['author']);
	$tags=mysqli_real_escape_string($db->link,$_POST['tags']);
	//query
	$query="UPDATE `posts` SET category={$category}, title='{$title}', body='{$body}' ,author='{$author}', tags='{$tags}' WHERE id =".$id;
					
	//Call insert method
	$update_row=$db->update($query);
	
}
?>
<?php
if(isset($_POST['delete'])){
		//query
	$query="DELETE FROM `posts` WHERE id =".$id;
					
	//Call insert method
	$delete_row=$db->delete($query);
	
}
?>
<?php
//Create query
$query = 'SELECT * FROM `posts` WHERE id='.$id;
//Run query
$post = $db->select($query)->fetch_assoc();

//Create query
$query = 'SELECT * FROM categories';
//Run query
$categories = $db->select($query);
?>
<div class="post-form">
<form method="POST" action="edit_post.php?id=<?php echo $id; ?>">
  <div class="form-group">
    <label for="title">Post Title </label>
    <input type="text" class="form-control my-2" id="title" name="title" value="<?= $post['title']; ?>">
  </div>
  
  <div class="form-group">
    <label for="body">Post Content </label>
    <textarea name="body" class="form-control my-2" id="body" rows="5"><?= $post['body']; ?></textarea>
  </div>
  <div class="form-group">
    <label for="category">Category</label>
    <select name="category" class="form-control my-2" id="category">
        <?php while ($row = $categories->fetch_assoc()) : ?>
            <option <?php
                if ($row['id'] == $post['category']) {
                    echo 'selected';
                }

                ?> value="<?= $row["id"]; ?>" ><?= $row['name']; ?></option>
        <?php endwhile; ?>
    </select>
  </div>
  <div class="form-group">
    <label for="author">Author</label>
    <input type="text" class="form-control my-2" id="author" name="author" value="<?= $post['author']; ?>">
  </div>
  <div class="form-group">
    <label for="tags">Tags</label>
    <input type="text" class="form-control my-2" id="tags" name="tags" value="<?= $post['tags']; ?>">
  </div>
  <div class="form-group my-4">
  <input type="submit" class="btn btn-outline-dark"  name="submit" value="submit" />
    <a href="index.php" class="btn btn-outline-dark  ">Cansel</a>
	  <input type="submit" class="btn  btn-outline-danger"  name="delete" value="Delete" />
  </div>
</form>
</div>
<?php include 'includes/footer.php'; ?>