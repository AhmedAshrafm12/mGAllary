<?php
include 'connect.php';
session_start();

if(!isset($_SESSION['userId']))
header("location:index.php");

if($_SERVER['REQUEST_METHOD'] =="POST"){
    $type = $_POST['type'];
    $valid = 1;
    $avatarname=$_FILES['item']['name'];
    $avatartmp=$_FILES['item']['tmp_name'];
    $Ex=@strtolower(end(explode('.',$avatarname)));
    $allowedEx = ['jpg','png','jpeg'];
    if(!in_array($Ex , $allowedEx)){
        $error = 'un allowed extension';
        $valid = 0;}
     if($valid != 0){   
$r=rand(0,1000);
$avatar=$r.'_'.$avatarname;

move_uploaded_file($avatartmp,"uploads\\".$avatar);

$insert =$con->prepare("INSERT INTO `items`(`item`, `typeId`, `userId`) VALUES (?,?,?)");
$insert->execute(array($avatar,$type,$_SESSION['userId']));
header("location:mygallary.php");}
}

?>

<head>
<link href="gal.css" rel="stylesheet">
<link href="css/font-awesome.min.css" rel="stylesheet">
<link href="css/bootstrap.min.css" rel="stylesheet">
</style>
</head>
<body>
<div class='container'>
<form class="submit" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data">
<h1>add item</h1>
<div class="<?php if(isset($error)) echo "alert alert-danger";?> "><?php if(isset($error)) echo $error;?></div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">upload your Item</label>
    <input type="file" class="form-control"  name="item" required>
  </div>
  <br>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">item Type</label>
    <select name="type" id="" class="form-control" required>  
    <option value="1">logo</option>
    <option value="2">edit</option>
    <option value="4">design</option>
    <option value="3">photography</option>
    </select>
</div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
<script src="jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>