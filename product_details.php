<?php
include_once("dbconnect.php");
session_start();

if(isset($_GET['submit'])){
    if (isset($_SESSION['sessionid'])){
        $userid = $_SESSION['user id'];
    }else{
        echo "<script>alert('Please register your account');</script>";
        echo "<script>window.location.replace('login.php')</script>";
    
    }
}

$sqlproduct = "SELECT * FROM table_product ORDER BY product_date DESC";
$stmt = $conn->prepare($sqlproduct);
$stmt->execute();
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$rows = $stmt->fetchAll();

foreach($rows as $product){

    $name = $product['name'];
    $price = $product['price'];
    $description = $product['description'];

}
?>

<!DOCTYPE html>
<html>
<title>Product Details</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karma">
<link rel="stylesheet" type="text/css" href="style.css">
<script src="script.js"></script>

<body>
    <body></body>

            <div class="w3-bar">
        <div class="w3-khaki w3-xlarge" style="max-width:1200px;margin:auto">
            <a href= "mainpage.php" class="w3-button w3-right w3-padding-16">Back</a>
            <div class="w3-center w3-padding-16">Product Details</div>
        </div>
    </div>

    <div class="w3-main w3-content w3-padding" style="max-width:1200px;margin-top:100px">

    <div class="w3-khaki w3-row w3-card">
        <div class="w3-half w3-center">
            <img class="w3-image w3-margin w3-center" style="height:100%;width:100%;max-width:330px" src="res/images/meals-icon.png?php echo $name?>.jpg">
        </div>
        <div class="w3-half w3-container">
            <?php 
            $cart = "cart";
               foreach ($rows as $product){
                $name = $product['name'];
                $price = $product['price'];
                $description = $product['description'];
            }

            echo "<h3 class='w3-center'><b>$name</h3></b>
            <i class= style='font-size 60px;'><p><b> Name :</i> &nbsp&nbsp$name<br>
            <i class='fas fa-map-marker-alt' style='font-size 60px;'> Price :</i> &nbsp&nbsp$price<br>
            <i class='fas fa-map-marker-alt' style='font-size 60px;'> Description :</i> &nbsp&nbsp$description<br></p><hr></b>
            <p> <a href='cart.php?name=$name&submit=$cart' class='w3-btn w3-red w3-round'>Add to Cart</a><p><br>

            ";
            
            ?>
        </div>
        </div>
    </div>
    </div>
    <footer class="w3-row-padding w3-padding-32">
        <p class="w3-center">Yuzie's Restaurant&reg;</p>
    </footer>
   

</body>

</html>