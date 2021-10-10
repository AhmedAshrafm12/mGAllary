<?php
include "connect.php";
session_start();
$logo = $con->prepare('SELECT * FROM `items` WHERE typeId  = 1 And userId= ? ');
$logo ->execute(array($_SESSION['userId']));
$logos = $logo->fetchAll();

$edit = $con->prepare('SELECT * FROM `items` WHERE typeId  = 2 And userId= ? ');
$edit ->execute(array($_SESSION['userId']));
$edits = $edit->fetchAll();

$photography = $con->prepare('SELECT * FROM `items` WHERE typeId  = 3 And userId= ? ');
$photography ->execute(array($_SESSION['userId']));
$photographys = $photography->fetchAll();

$design = $con->prepare('SELECT * FROM `items` WHERE typeId  = 4 And userId= ? ');
$design ->execute(array($_SESSION['userId']));
$designs = $design->fetchAll();


$feed = $con->prepare('SELECT * FROM `feedback` WHERE  userId= ? ');
$feed ->execute(array($_SESSION['userId']));
$feeds = $feed->fetchAll();

if(!isset($_SESSION['userId']))
header("location:index.php");


?>
<head>
<link href="gal.css" rel="stylesheet">
<link href="css/font-awesome.min.css" rel="stylesheet">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>
  .mood{
    color: #fff;
    background:#000;
}

</style>
</head>
<body>
  
<nav class="navbar navbar-default navbar-fixed-top" id='nav'>
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" id="brand" href="#"><strong><?php echo $_SESSION['userName']; ?></strong>_<strong>G</strong>allary</a>
          </div>
      
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
           
            <ul class="nav navbar-nav navbar-right uul">
              <li><a href="addItem.php">add item</a></li>
              <li><a href="logout.php">logout</a></li>
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>

<main></main>

<section>
    <ul class="dep">
        <li data-par="logo" class="acti">Logo</li>
        <li data-par="Edit">Edit</li>
        <li data-par="design">Design</li>
        <li data-par="photography">pictures</li>
    </ul> 

    <section class="show">
     <div id="logo" class="text-center departs visible">
        <?php 
  if(!empty($logos)){
echo '<ul>';
foreach($logos as $logo)
echo '<li><img src="uploads/'.$logo['item'].'"><li>';
echo '</ul>';}
else
echo '<h3>no items here</h3>';?> </div>


   <div id="Edit" class="text-center departs">
        <?php 
  if(!empty($edits)){
echo '<ul>';
foreach($edits as $edit)
echo '<li><img src="uploads/'.$edit['item'].'"><li>';
echo '</ul>';}
else
echo '<h3>no items here</h3>';?> </div>


<div id="design" class="text-center departs">
        <?php 
  if(!empty($designs)){
echo '<ul>';
foreach($designs as $design)
echo '<li><img src="uploads/'.$design['item'].'"><li>';
echo '</ul>';}
else
echo '<h3>no items here</h3>';?> </div>



<div id="photography" class="text-center departs">
        <?php 
  if(!empty($photographys)){
echo '<ul>';
foreach($photographys as $photography)
echo '<li><img src="uploads/'.$photography['item'].'"><li>';
echo '</ul>';}
else
echo '<h3>no items here</h3>';?> </div>

    </section>
</section>

<button class="up" id="up"><i class="fa fa-arrow-circle-up" aria-hidden="true"></i></button>

<section class="footer">
<div class="bac">
<div class="container">
  <div style="max-height: 500px; overflow-y: scroll; padding:30px; margin-top: 20px;">
<h2>your feedbacks</h2>
<?php
if(!empty($feeds)){
foreach($feeds as $feed)
echo '<p class="alert alert-success">'.$feed['msg'].'</p>';
}
else echo '<p class="alert alert-info">no feedbacks</p>';
?>
</div>

<div class="alert alert-default">shere your gallary : 
<h3><?php echo 'https://localhost/amingallary/userGallary.php?userId='.$_SESSION['userId'];?></h3>
</div>
</div>
</section>  
<script src="jquery.min.js"></script>
<script src="main.js"></script>
<!-- <script src="gall.js"></script>  -->
<script src="js/bootstrap.min.js"></script>
</body>