<?php

include "sidebar.php"; 
$id =$_GET['editid'];
$query = mysqli_query($connect, "SELECT * FROM `order_detail` WHERE `id` = '$id'");
$row = mysqli_fetch_assoc($query);

$cost_id = $row['cost_id'];
$order_id = $row['order_id'];
$amount = $row['amount'];



if(isset($_POST['submit'])) {

    $cost_id = clear($_POST['cost']);
    $order_id = clear($_POST['order']);
    $amount =clear( $_POST['amount']);

    $query= mysqli_query($connect, "UPDATE `order_detail` SET  `cost_id`='$cost_id', `order_id`='$order_id', `amount`='$amount' WHERE `id` = '$id'");
    if($query) {
        header("location:order_detail.php");
    }else {
        die(mysqli_error($connect));
    }
}
if (isset($_POST['cancel'])) {
    header("location:order_detail.php");
}

?>
<style>
     .btn2 {
        width: 75px;
        height: 38px;
    }
</style>
<body>
<div class="home_content">
  <div class="text">
    <div class="con">
        <form class="form" method="POST">
            <div class="label">
                <label class="form-label">cost_id</label>
            </div>
            <div>
                <input type="text" class="input" name="cost" value="<?php echo $cost_id ?>">
            </div>
            <div class="label">
                <label class="form-label">Order_id</label>
            </div>
            <div>
                <input type="text" class="input" name="order" value="<?php echo $order_id ?>">
            </div>
            <div class="label">
            <label>Amount</label>
            </div>
            <div>
            <input type="text" class="input" name="amount" value="<?php echo $amount ?>">
            </div>
            <div class="btns">
            <button type="submit" class="btn1" name="submit">Edit</button>
            <button type="cancel" class="btn2" name="cancel">Cancel</button>
            </div>
        </form>
    </div>
    </div>
    </div>
</body>