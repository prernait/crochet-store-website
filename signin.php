<?php

$conn = mysqli_connect("localhost","root","","crochetbysp");

if(isset($_POST['signup']))
{

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

$check = "SELECT * FROM users WHERE email='$email'";
$result = mysqli_query($conn,$check);

if(mysqli_num_rows($result) > 0)
{
$error = "Email already registered";
}
else
{

$sql = "INSERT INTO users(name,email,password) VALUES('$name','$email','$password')";

if(mysqli_query($conn,$sql))
{
$success = "Signup Successful! You can login now.";
}
else
{
$error = "Error creating account";
}

}

}

?>

<html>
<head>
<title>Sign Up</title>

<style>

body{
font-family:Arial;
background:#fff0f5;
text-align:center;
}

.signup_box{
background:white;
width:320px;
margin:auto;
margin-top:80px;
padding:25px;
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

<div class="signup_box">

<h2>Create Account</h2>

<form method="POST">

<input type="text" name="name" placeholder="Full Name" required>

<input type="email" name="email" placeholder="Email" required>

<input type="password" name="password" placeholder="Password" required>

<button type="submit" name="signup">Sign Up</button>

</form>

<?php

if(isset($error))
{
echo "<p style='color:red;'>$error</p>";
}

if(isset($success))
{
echo "<p style='color:green;'>$success</p>";
}

?>

<p>Already have an account? <a href="login.php">Login</a></p>

</div>

<div class="footer">
Made with love 🧶 | Contact: crochetbysp
</div>

</body>
</html>