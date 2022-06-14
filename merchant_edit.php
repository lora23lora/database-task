<?php
include "sidebar.php";
$id =$_GET['editid'];
if(!preg_match("/^[0-9]*$/", $id)) {
    header("location:error.html");
  }
$query = mysqli_query($connect, "SELECT * FROM `merchant` WHERE `merchant_id` = '$id'");
$row = mysqli_fetch_assoc($query);

$id = $row['merchant_id'];
$name= $row['merchant_name'];
$country = $row['country'];
$credit = $row['credit'];
$debt = $row['debt'];
$balance = $row['balance'];


if(isset($_POST['submit'])) {
    $name = clear($_POST['name']);
    $country =  clear($_POST['country']);
    $credit =  clear($_POST['credit']);
    $debt= clear($_POST['debt']);
    $balance =  clear($_POST['balance']);
 
    
    $query= mysqli_query($connect, "UPDATE `merchant` SET  `country`='$country',`merchant_name` = '$name', `credit`='$credit', `debt`='$debt', `balance`='$balance' WHERE `merchant_id` = '$id'");
    if($query) {
        header("location:merchant.php");
    }else {
        die(mysqli_error($connect));
    }
}
if (isset($_POST['cancel'])) {
    header("location:merchant.php");
}
?>
<style>
     .btn2 {
        width: 75px;
        height: 38px;
    }
</style>
   <div class="home_content">
    <div class="text">
    <div class="con" >
        <form class="form" method="POST">
                <div class="label">
                <label >Merchant_name:</label>
                </div>
                <div>
                <input type="text" class="input" name="name" value="<?php echo $name?>">
                </div>
                <div class="label">
                <label class="form-label">Country:</label>
                </div>
                <div>
                <input type="text" class="input" name="country" value="<?php echo $country?>">
                </div>
                <div class="label">
                <label class="form-label">Credit: </label>
                </div>
                <div>
                <input type="text" class="input" name="credit" value="<?php echo $credit ?>">
                </div>
                <div class="label">
                <label class="form-label">Debt:</label>
                </div>
                <div>
                <input type="text" class="input" name="debt" value="<?php echo $debt ?>">
                </div>
                <div class="label">
                <label class="form-label">Balance:</label>
                </div>
                <div>
                <input type="text" class="input" name="balance" value="<?php echo $balance ?>">
                </div>
            <div class="btns">
            <button type="submit" class="btn1" name="submit">Edit</button>
            <button type="submit" class="btn2" name="cancel">Cancel</button>
            </div>
        </form>
    </div>
    </div>
   </div>
   
   

</html>
 
  </tbody>
</table>
</body>
</html>