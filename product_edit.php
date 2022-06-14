<?php
include "sidebar.php";
$id =$_GET['editid'];
$query = mysqli_query($connect, "SELECT `product_name` FROM `product` WHERE `product_id` = '$id'");
$row = mysqli_fetch_assoc($query);

$name = $row['product_name'];
if(isset($_POST['submit'])) {

$name = clear($_POST['product']);
$query= mysqli_query($connect, "UPDATE `product` SET  `product_name`='$name' WHERE `product_id` = '$id'");
if($query) {
    header("location:product.php");
}else {
     die(mysqli_error($connect));
}
}
if(isset($_POST['cancel'])) {
    header("location:product.php");
}

?>
<body>
<div class="home_content">
  <div class="text">
    <div class="con ">
        <form class="form" method="POST">
           <div class="label"><label > Product_name:</label>
            </div>
            <div>
            <input type="text" class="input" name="product" value="<?php echo $name ?>">
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
   
    .btn2{
        width: 75px;
        height: 38px;
    }
   
</style>