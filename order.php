<?php

$conn = new mysqli("localhost","root","","crochetbysp");

if($conn->connect_error)
{
die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['submit']))
{
$name = $_POST['name'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$product = $_POST['product'];
$quantity = $_POST['quantity'];
$order_date = $_POST['order_date'];

$sql = "INSERT INTO orders(name,phone,address,product,quantity,order_date)
VALUES('$name','$phone','$address','$product','$quantity','$order_date')";

$conn->query($sql);

echo "<h2 style='color:rgb(231,133,173);text-align:center;'>Order Confirmed 🧶</h2>";

echo "<center>";
echo "Name: " . $name . "<br><br>";
echo "Phone: " . $phone . "<br><br>";
echo "Address: " . $address . "<br><br>";
echo "Product: " . $product . "<br><br>";
echo "Quantity: " . $quantity . "<br><br>";
echo "order_date: ".$order_date. "<br><br>";
echo "Thank you for ordering from our Crochet Store 💗";
echo "</center>";
}
?>

<html>
<head>
<title>Order Page</title>

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
padding:25px;
border-radius:20px;
box-shadow:0px 2px 10px lightgray;
 transition:0.4s;
}

input, select, textarea
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

</style>
</head>

<body>

<h1>Place Your Order 🧶</h1>

<form method="post">

<input type="text" name="name" placeholder="Your Name" required>

<input type="text" name="phone" placeholder="Phone Number" required>

<textarea name="address" placeholder="Delivery Address"></textarea>

<select name="product">

<option>White Cardigan with Pink Bows</option>
<option>Black & White Lined Top</option>
<option>Crop Top with Long Sleeves</option>
<option>Mesh Top</option>
<option>Off Shoulder Top</option>
<option>Baby Top</option>
<option>Crop Top</option>
<option>Floral Mesh Top</option>

</select>

<input type="number" name="quantity" placeholder="Quantity">
<input type="timestamp" name="order_date" placeholder="order_date">
<button type="submit" name="submit">Submit Order</button>

</form>
<div class="footer">
Made with love 🧶 | Contact: crochetbysp
</div>
</body>
</html>