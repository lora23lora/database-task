<?php
include "sidebar.php";

$id = $_GET['editid'];
$query = mysqli_query($connect, "SELECT * FROM `cost_type` WHERE `cost_id` = '$id'");
$row = mysqli_fetch_assoc($query);
$cost_type = $row['cost_type'];
if (isset($_POST['submit'])) {

    $cost_type = clear($_POST['cost_type']);
    $query = mysqli_query($connect, "UPDATE `cost_type` SET  `cost_type`='$cost_type' WHERE `cost_id` = '$id'");
    if ($query) {
        header("location:cost_type.php");
    } else {
        die(mysqli_error($connect));
    }
}
if (isset($_POST['cancel'])) {
    header("location:cost_type.php");
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
                    <label class="label">Cost_type</label>
                    </div>
                    <div>
                    <input type="text" class="input" name="cost_type" value="<?php echo $cost_type ?>">
                    </div>
                    <div class="btns">
                        <button type="submit" class="btn1" name="submit">Edit</button>
                        <button type="submit" class="btn2" name="cancel">Cancel</button>
                    </div>
           

        </form>
        </div>
        </div>

        </html>

        </tbody>
        </table>
    </div>
    </div>
</body>