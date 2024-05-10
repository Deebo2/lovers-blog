<?php include "includes/header.php"; ?>
<?php 
//Create DB instance
 $db=new Database();
 //Create query
 $query="SELECT * FROM posts ORDER BY id DESC";
 //Run query
 $posts=$db->select($query);
  //Create query
 $query="SELECT * FROM categories ORDER BY id DESC";
 //Run query
 $categories=$db->select($query);
 ?>

<?php if($posts): ?>
<?php while($row=$posts->fetch_assoc()) : ?>
      <article class="blog-post">
        <h2 class="blog-post-title"><?php echo $row["title"]; ?></h2>
        <p class="blog-post-meta"><?php echo formatDate($row["date"]); ?> by <a href="#"><?php echo $row["author"]; ?></a></p>

        <p><?php echo shortenText($row["body"]); ?></p>
		        <a class="btn btn-outline-dark" href="post.php?id=<?php echo $row["id"]; ?>">Continue reading .......</a>

       
      </article>
<?php endwhile; ?>
<?php else : ?>
  <p>There are no Posts yet.</p>
<?php endif;?>   
 


  


    <?php include "includes/footer.php"; ?>