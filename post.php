<?php include "includes/header.php"; ?>
<?php 
$id=$_GET['id'];
//Create DB instance
 $db=new Database();
 //Create query
 $query="SELECT * FROM `posts` WHERE id = ".$id;
 //Run query
 $post=$db->select($query)->fetch_assoc();
  //Create query
 $query="SELECT * FROM categories";
 //Run query
 $categories=$db->select($query);
 ?>
<?php if($post): ?>
      <article class="blog-post">
        <h2 class="blog-post-title"><?php echo $post['title'];?></h2>
                <p class="blog-post-meta"><?php echo formatDate($post["date"]); ?> by <a href="#"><?php echo $post["author"]; ?></a></p>

        <p><?php echo $post["body"]; ?></p>
      </article>
<?php else: ?>
      <p>Couldn't Found this post !!</p>
<?php endif; ?>
    <?php include "includes/footer.php"; ?>