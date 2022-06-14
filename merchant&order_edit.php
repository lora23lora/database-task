<?php

include "sidebar.php"; ;
$id =$_GET['editid'];
if(!preg_match("/^[0-9]*$/", $id)) {
    header("location:error.html");
  }
$query = mysqli_query($connect, "SELECT `trade` FROM `merchant_order` WHERE `id` = '$id'");
$row = mysqli_fetch_assoc($query);
$trade = $row['trade'];
if(isset($_POST['submit'])) {

    $trade = clear($_POST['trade']);
    $query= mysqli_query($connect, "UPDATE `merchant_order` SET  `trade`='$trade' WHERE `id` = '$id'");
    if($query) {
        header("location:merchant&order.php");
    }else {
        die(mysqli_error($connect));
    }
}
if(isset($_POST['cancel'])) {
    header("location:merchant&order.php");
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
    <div class="con ">
        <form method="POST">
            <div class="label">
                <label class="form-label">Trade</label>
            </div>
            <div>
                <input type="text" class="input" name="trade" value="<?php echo $trade ?>">
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