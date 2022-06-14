<?php
include "sidebar.php";
$id =$_GET['editid'];
$query = mysqli_query($connect, "SELECT * FROM `ordering` WHERE `order_id` = '$id'");
$row = mysqli_fetch_assoc($query);

$country = $row['country'];
$vehicle = $row['car_num'];
$quantity = $row['quantity'];
$price = $row['price'];
$product_id = $row['product_id'];
$date = $row['order_date'];

if(isset($_POST['submit'])) {

    $country =  clear($_POST['country']);
    $date =  clear($_POST['order_date']);
    $price= clear($_POST['price']);
    $quantity =  clear($_POST['quantity']);
    $vehicle =  clear($_POST['vehicle']);
    $product_id =  clear($_POST['product_id']);
    
    $query= mysqli_query($connect, "UPDATE `ordering` SET  `country`='$country',`car_num` = '$vehicle', `quantity`='$quantity', `price`='$price', `product_id`='$product_id' WHERE `order_id` = '$id'");
    if($query) {
        header("location:ordering.php");
    }else {
        die(mysqli_error($connect));
    }
}
if(isset($_POST['cancel'])) {
    header("location:ordering.php");
}
?>
<body>
 <div class="home_content">
    <div class="text">
      <div class="con">
        <form method="POST">
        <div class="label">
        <label class="form-label">Country:</label>
        </div>
        <div>
        <input type="text" class="input" name="country" value="<?php echo $country?>">
        </div>
        <div class="label">
        <label class="form-label">Date: </label>
        </div>
        <div>
        <input type="text" class="input" name="date" value=" <?php echo $date ?>">
        </div>
    
        <div class="label">
        <label class="form-label">Price:</label>
        </div>
        <div>
        <input type="text" class="input" name="price" value="<?php echo $price ?>">
        </div>
        <div class="label">
        <label class="form-label">Quantity:</label>
        </div>
        <div>
        <input type="text" class="input" name="quantity" value="<?php echo $quantity ?>">
        </div>
        <div class="label">
        <label class="form-label">Vehicle:</label>
        </div>
        <div>
        <input type="text" class="input" name="vehicle" value="<?php echo $vehicle ?>">
        </div>
        <div class="label">
        <label class="form-label">Product_id:</label>
        </div>
        <div>
        <input type="text" class="input" name="product_id" value="<?php echo $product_id ?>">
        </div>
    <div class="btns">
    <button type="submit" class="btn1" name="submit">Edit</button>
    <button type="submit" class="btn2" name="cancel">Cancel</button>
    </div>
</form>
</div>
</div> 
</div>
</body>

<style>
    .btn2 {
        width: 75px;
        height: 38px;
    }
</style>