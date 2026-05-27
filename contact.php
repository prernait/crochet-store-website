<?php

$conn = mysqli_connect("localhost","root","","crochetbysp");

if(isset($_POST['submit']))
{

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

$sql = "INSERT INTO contact(name,email,message) VALUES('$name','$email','$message')";

mysqli_query($conn,$sql);

echo "Message Sent Successfully";

}

?>
<html>
<head>
<title>Contact Us</title>
<style>

body
{
font-family:Arial;
background:#fff0f5;
text-align:center;
}

h1
{
color:rgb(231,133,173);
}

form
{
background:white;
width:400px;
margin:auto;
padding:20px;
border-radius:20px;
box-shadow:0px 2px 10px lightgray;
}

input,textarea
{
width:90%;
padding:10px;
margin:10px;
border-radius:10px;
border:1px solid lightgray;
}

button
{
background:rgb(231,133,173);
color:white;
border:none;
padding:10px 20px;
border-radius:20px;
cursor:pointer;
}

button:hover
{
background:pink;
 transition:0.4s;
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
<br>
<br>
<br>
<br>
<h1>Contact Us</h1>

<form method="post">

<input type="text" name="name" placeholder="Your Name" required>

<input type="email" name="email" placeholder="Email" required>

<textarea name="message" placeholder="Your Message"></textarea>

<button type="submit" name="submit">Send Message</button>

</form>

<div class="footer">
Made with love 🧶 | Contact: crochetbysp
</div>

</body>
</html>