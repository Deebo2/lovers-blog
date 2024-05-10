<?php include '../config/config.php'; ?>
<?php include '../helpers/format_helper.php'; ?>
<?php include '../libraries/Database.php'; ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin Area</title>

    

    <!-- Bootstrap core CSS -->
<link href="../css/bootstrap.css" rel="stylesheet" >

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }
	  

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    
    <!-- Custom styles for this template -->
    <link href="../css/custom.css" rel="stylesheet">
  </head>
  <body>
    
<div class="container">
  <header class="blog-header py-3">
    <div class="row flex-nowrap justify-content-between align-items-center">
        <div class="col-12 text-center">
        <a class="blog-header-logo text-dark" href="#">Lovers Blog</a>
    
   
  </header>

  <div class="nav-scroller py-1 mb-2">
    <nav class="nav d-flex justify-content-left">
      <a class="p-2 link-secondary" href="index.php">Dashboard</a>
      <a class="p-2 link-secondary" href="add_post.php">Add Post</a>
      <a class="p-2 link-secondary" href="add_category.php">Add Category</a>
      <a class="p-2 link-secondary " href="http://localhost/php/loversblog">Visit Blog</a>
     
    </nav>
  </div>
</div>

<main class="container">
  <div class="logo-graph p-4 p-md-5 mb-4">
  <div class="row">

	  <div class="col-md-12">
      <h1 class="display-4 fst-italic text-center">Admin Area </h1>
     
    </div>
  </div>
 </div>


 <div class="row d-flex justify-content-center align-items-center">
        <div class="col-10 ">
		<?php if(isset($_GET['error'])) : ?>
		<div class="alert alert-danger"><?= $_GET['error']; ?></div>
		<?php endif; ?>
		<?php if(isset($_GET['msg'])) : ?>
		<div class="alert alert-success"><?= $_GET['msg']; ?></div>
		<?php endif; ?>