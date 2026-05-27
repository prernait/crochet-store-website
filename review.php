<?php
session_start();

$conn = mysqli_connect("localhost","root","","crochetbysp");

if(!$conn){
die("Connection failed: ".mysqli_connect_error());
}

if(isset($_POST['login'])){
$_SESSION['user'] = $_POST['username'];
}

if(isset($_POST['submit'])){
$name = $_SESSION['user'];
$review = mysqli_real_escape_string($conn,$_POST['review']);
$rating = $_POST['rating'];

mysqli_query($conn,"INSERT INTO review(name,review,rating,user,likes) VALUES('$name','$review','$rating','$name',0)");
}

if(isset($_GET['delete'])){
$id = (int)$_GET['delete'];
$user = $_SESSION['user'];

mysqli_query($conn,"DELETE FROM review WHERE id=$id AND user='$user'");
header("Location: ".$_SERVER['PHP_SELF']);
exit();
}

if(isset($_GET['like'])){
$id = (int)$_GET['like'];
mysqli_query($conn,"UPDATE review SET likes = likes + 1 WHERE id=$id");
header("Location: ".$_SERVER['PHP_SELF']);
exit();
}
?>

<style>

body{
font-family:Arial;
background:#fff0f5;
text-align:center;
margin:0;
transition:0.3s;
}

.dark{
background:#1e1e1e;
color:white;
}

.container{
max-width:400px;
margin:auto;
}

.review_box, .login_box{
background:white;
padding:20px;
margin:15px;
border-radius:15px;
box-shadow:0 4px 15px rgba(0,0,0,0.1);
 transition:0.4s;
}

.dark .review_box, .dark .login_box{
background:#2c2c2c;
}

input, textarea{
width:90%;
padding:10px;
margin:8px;
border-radius:8px;
border:1px solid #ddd;
}

button{
background:#e785ad;
border:none;
padding:10px 15px;
border-radius:8px;
color:white;
cursor:pointer;
}

.stars{
display:flex;
flex-direction:row-reverse;
justify-content:center;
}

.stars input{display:none;}

.stars label{
font-size:25px;
color:#ccc;
cursor:pointer;
}

.stars label:hover,
.stars label:hover ~ label,
.stars input:checked ~ label{
color:gold;
}

.review_card{
background:white;
margin:15px;
padding:15px;
border-radius:15px;
text-align:left;
}

.dark .review_card{
background:#2c2c2c;
}

.top{
display:flex;
justify-content:space-between;
}

.actions{
margin-top:10px;
}

a{
text-decoration:none;
margin-right:10px;
}

.toggle{
position:fixed;
top:10px;
right:10px;
cursor:pointer;
}
.footer{
margin-top:40px;
background:#e785ad;
color:white;
padding:10px;
}
</style>

<html>
<head>
<title>Premium Reviews</title>

<script>
function toggleDark(){
document.body.classList.toggle("dark");
}
</script>

</head>

<body>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<div class="toggle" onclick="toggleDark()">🌙</div>

<h1>Customer Reviews</h1>

<div class="container">

<?php if(!isset($_SESSION['user'])){ ?>

<div class="login_box">
<form method="POST">
<input type="text" name="username" placeholder="Enter your name" required>
<button name="login">Login</button>
</form>
</div>

<?php } else { ?>

<div class="review_box">

<form method="POST">

<textarea name="review" placeholder="Write review" required></textarea>

<div class="stars">
<input type="radio" name="rating" value="5" id="5"><label for="5">★</label>
<input type="radio" name="rating" value="4" id="4"><label for="4">★</label>
<input type="radio" name="rating" value="3" id="3"><label for="3">★</label>
<input type="radio" name="rating" value="2" id="2"><label for="2">★</label>
<input type="radio" name="rating" value="1" id="1" required><label for="1">★</label>
</div>

<button name="submit">Post</button>

</form>

</div>

<?php

$result = mysqli_query($conn,"SELECT * FROM review ORDER BY id DESC");

$avg_query = mysqli_query($conn,"SELECT AVG(rating) as avg FROM review");
$avg = mysqli_fetch_assoc($avg_query);

echo "<h3>⭐ ".round($avg['avg'],1)."/5</h3>";

while($row = mysqli_fetch_assoc($result)){

echo "<div class='review_card'>";

echo "<div class='top'>";
echo "<b>".$row['name']."</b>";

if($_SESSION['user'] == $row['user']){
echo "<a href='?delete=".$row['id']."'>🗑️</a>";
}

echo "</div>";

for($i=1;$i<=5;$i++){
echo ($i <= $row['rating']) ? "⭐" : "☆";
}

echo "<p>".$row['review']."</p>";

echo "<div class='actions'>";
echo "<a href='?like=".$row['id']."'>❤️ ".$row['likes']."</a>";
echo "</div>";

echo "</div>";
}

?>

<?php } ?>

</div>
<div class="footer">
Made with love 🧶 | Contact: crochetbysp
</div>
</body>
</html>