<?php
include 'connect.php';
session_start();
if($_SERVER['REQUEST_METHOD'] =="POST"){
    $user=$_POST['userName'];
    $password=$_POST['password'];
$hashedpass=md5($password);
$stmt = $con->prepare("INSERT INTO `users`(`userName`, `password`) VALUES (?,?) ");
$stmt->execute(array($user,$hashedpass));
$_SESSION['userId']=$con->lastInsertId();
$_SESSION['userName']=$_POST['userName'];
header("location:mygallary.php");
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
<h1 class="text-center">signup</h1>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">userName</label>
    <input type="text" class="form-control"  name="userName" aria-describedby="userNamehelp" required>
    <div id="userNamehelp" class="form-text">We'll never share your userName with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" required>
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<a href="index.php">login</a>

</div>
<script src="jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>