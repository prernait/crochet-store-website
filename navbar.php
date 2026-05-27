<?php
session_start();
?>

<div class="navbar">

<a href="index.php">Home</a>
<a href="about.html">About</a>
<a href="category2.html">Products</a>
<a href="review.php">Reviews</a>
<a href="contact.php">Contact</a>

<?php
if(isset($_SESSION['user'])) {
    echo "<a href='logout.php'>Logout</a>";
} else {
    echo "<a href='login.php'>Login</a>";
    echo "<a href='signin.php'>SignUp</a>";
}
?>

</div>