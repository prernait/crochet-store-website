<?php

$search = strtolower($_GET['search'] ?? '');

if(strpos($search,"bag") !== false){
header("Location: products/products4.html");
exit();
}

elseif(strpos($search,"scarf") !== false){
header("Location:  products/products7.html");
exit();
}

elseif(strpos($search,"toy") !== false){
header("Location:  products/products8.html");
exit();
}

elseif(strpos($search,"keychain") !== false){
header("Location:  products/products2.html");
exit();
}

elseif(strpos($search,"bookmark") !== false){
header("Location:  products/products5.html");
exit();
}

elseif(strpos($search,"glove") !== false){
header("Location:  products/products6.html");
exit();
}

elseif(strpos($search,"hair") !== false){
header("Location:  products/products3.html");
exit();
}

elseif(strpos($search,"cardigan") !== false || strpos($search,"top") !== false){
header("Location:  products/products1.html");
exit();
}

else{
echo "<h2>Product not found</h2>";
}

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Product Search</title>

<style>
body{
    font-family: Arial;
    background:#f7f7f7;
    text-align:center;
    margin-top:120px;
}

.container{
    background:white;
    width:320px;
    margin:auto;
    padding:30px;
    border-radius:10px;
    box-shadow:0 0 10px rgba(0,0,0,0.1);
}

input{
    width:85%;
    padding:10px;
    border:1px solid #ccc;
    border-radius:5px;
}

button{
    margin-top:15px;
    padding:10px 20px;
    background:#ff6fa5;
    color:white;
    border:none;
    border-radius:5px;
    cursor:pointer;
}

button:hover{
    background:#ff4f8b;
}

.error{
    margin-top:15px;
    color:red;
}
</style>
</head>

<body>

<div class="container">
<h2>Search Product</h2>

<form method="GET">
<input type="text" name="search" placeholder="Search product..." required>
<br>
<button type="submit">Search</button>
</form>

<?php
if(isset($error)){
    echo "<div class='error'>$error</div>";
}
?>

</div>

</body>
</html>

