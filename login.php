<?php
session_start();

$conn = mysqli_connect("localhost","root","","crochetbysp");

if(isset($_POST['login']))
{
$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";

$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result)>0)
{
$row = mysqli_fetch_assoc($result);

$_SESSION['user'] = $row['name'];

header("Location:index.php");
}
else
{
$error = "Login Failed";
}
}
?>

<html>
<head>
<title>Login</title>

<style>

body{
font-family:Arial;
background:#fff0f5;
text-align:center;
}

.login_box{
background:white;
width:300px;
margin:auto;
margin-top:100px;
padding:20px;
border-radius:15px;
box-shadow:0px 2px 10px lightgray;
}

input{
width:90%;
padding:10px;
margin:10px;
border-radius:8px;
border:1px solid #ddd;
}

button{
background:#e785ad;
border:none;
padding:10px 20px;
color:white;
border-radius:8px;
cursor:pointer;
}

button:hover{
background:pink;
}

.link{
margin-top:10px;
}

a{
color:#e785ad;
text-decoration:none;
font-weight:bold;
}

.footer{
margin-top:40px;
background:#e785ad;
color:white;
padding:10px;
}

</style>
</head>

<body>

<div class="login_box">

<h2>Login</h2>

<form method="POST">

<input type="text" name="email" placeholder="Email" required>
<input type="password" name="password" placeholder="Password" required>

<button type="submit" name="login">Login</button>

</form>

<?php
if(isset($error)){
echo "<p style='color:red;'>$error</p>";
}
?>

<div class="link">
<p>Don't have an account? <a href="signin.php">Sign Up</a></p>
</div>

</div>
<br>
<br>
<br>
<br>
<br>
<div class="footer">
Made with love 🧶 | Contact: crochetbysp
</div>

</body>
</html>