<?php
include "sidebar.php";
include "modal.php";
?>
<div class="home_content">
  <div class="text">
    <?php
    if (isset($_POST['deletedata'])) {
      $id = $_POST['delete_id'];
      $query = mysqli_query($connect, "DELETE FROM `product` WHERE `product_id` = '$id'");
      if ($query) {
        header("location: product.php");
      } else {
        die(mysqli_error($connect));
      }
    }
    ?>
    <link rel="stylesheet" href="style.css">
    <div class="con">
      <table>
        <thead>
          <tr>

            <th class="th">Product_id</th>
            <th class="th">Product_name</th>

            <?php
            if (isset($admin)) {
              echo '
      <th class="th" ></th>';
            }
            ?>


          </tr>
        </thead>
        <tbody>
          <?php
          $query = mysqli_query($connect, "SELECT * FROM `product`");
          $number = mysqli_num_rows($query);
          $result_per_page = 5;
          ?>
          <?php
          $no_of_page = ceil($number / $result_per_page);
          if (!isset($_GET['page'])) {
            $page = 1;
          } else {
            $page =  $_GET['page'];
            //$page = htmlspecialchars($_GET['page']);
            if (!preg_match("/^[0-9]*$/", $page)) {
              header("location:error.html");
            } elseif ($page > $no_of_page) {
              $page = $no_of_page;
            } else {
              $page = $_GET['page'];
            }
          }


          $this_page = ($page - 1) * $result_per_page;
          $query = mysqli_query($connect, "SELECT * FROM `product` LIMIT " . $this_page . ',' . $result_per_page);


          if ($query) {
            while ($row = mysqli_fetch_assoc($query)) {
              $product_id = $row['product_id'];
              $product_name = $row['product_name'];



              echo '<tr>
    <td class="td">' .   $product_id . '</td>
    <td class="td" >' .  $product_name . '</td>'
          ?>
              <?php
              if (isset($admin)) { ?>



                <?php echo '
       <td  class="td">
        <button class="btn1"><a class="a-link" href=" product_edit.php?editid=' . $product_id . '">Edit</a></button>
        <button class="btn2 deletebtn" id="delete" name="delete deletebtn" onclick="onDelete()">Delete</button>
        
        </td>
        </tr>' ?>
              <?php } ?>

          <?php }
          } ?>
      </table>
      <?php
      for ($page = 1; $page <= $no_of_page; $page++) {
        echo '<button class="pagin"><a class="tex" href="product.php?page=' . $page . '">' . $page . '</a></button>';
      }
      ?>
       <!-- modal -->
<div id="confirmation" class="modal-container">
    <div class="modal">
      <section>
        <header class="modal-header">
          <span onclick="onCancel()">&times;</span>
          <h2>Are you sure you want to delete?</h2>
        </header>
        <form action="product.php" method="POST">
          <div>
            <input type="hidden" name="delete_id" id="delete_id">
          </div>
          <footer class="modal-footer">
            <button class="modal-button btn2" onclick="onCancel()">Cancel</button>
            <button name="deletedata" class="modal-button modal-confirm-button btn1" onclick="onConfirm()">
              Delete
            </button>
            </footer>
        </form>
      
      </section>
    </div>
  </div>
    </div>
  </div>
  </body>
  <?php ob_flush(); ?>