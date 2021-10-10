<?php
include 'connect.php';
session_start();

if(isset($_SESSION['userId']))
header("location:myGallary.php");
if($_SERVER['REQUEST_METHOD'] =="POST"){
    $user=$_POST['userName'];
    $password=$_POST['password'];
    $hashedpass=md5($password);
$stmt = $con->prepare("SELECT *
                        FROM 
                        users 
                        WHERE
                        userName = ? AND password = ? ");
$stmt->execute(array($user,$hashedpass));
$get=$stmt->fetch();
$count=$stmt->rowcount();
if($count>0){
    $_SESSION['userId']=$get['id'];
    $_SESSION['userName']=$get['userName'];
    header("location:mygallary.php");}
else 
$error ='wrong userName or password';
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
<form action="<?php echo $_SERVER['PHP_SELF'];?>" class="submit"  method="POST">
<h2 class="test-center">login</h2>
<div class="<?php if(isset($error)) echo "alert alert-danger";?> "><?php if(isset($error)) echo $error;?></div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">userName</label>
    <input type="text" class="form-control"  name="userName" aria-describedby="userNamehelp">
    <div id="userNamehelp" class="form-text">We'll never share your userName with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<a href="signUp.php">signUp</a>
</div>
<script src="jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>