<?php include "sidebar.php";
include "modal.php";
?>
<?php 
if (isset($_POST['deletedata'])) {
  $id = $_POST['delete_id'];
  $query = mysqli_query($connect, "DELETE FROM `ordering` WHERE `order_id` = '$id'");
  if ($query) {
    header("location:ordering.php");
  } else {
    die(mysqli_error($connect));
  }
} 
?>
<div class="home_content">
  <div class="text">
<div class="con">
<table class="ta">
  <thead>
    <tr>
      <th class="th">Order_id</th>
      <th class="th">Country</th>
      <th class="th">Order_date</th>
      <th class="th">Price</th>
      <th class="th">Quantity</th>
      <th class="th">Vehicle</th>
      <th class="th">Product_id</th>
      <?php
    if(isset($admin)){
       echo '
      <th class="th" ></th>';}
    ?>
    </tr>
  </thead>
  <tbody>

<?php 
$query = mysqli_query($connect,"SELECT * FROM `ordering`");
$number = mysqli_num_rows($query) ;
$result_per_page = 5;
?>
<?php
    $no_of_page = ceil($number/$result_per_page);
   if(!isset($_GET['page'])) {
     $page = 1;
   }else {
     $page =  $_GET['page'];
     //$page = htmlspecialchars($_GET['page']);
     if(!preg_match("/^[0-9]*$/", $page)) {
       header("location:error.html");
     }elseif($page > $no_of_page){
       $page = $no_of_page ;
     }else {
      $page = $_GET['page'];
     }
   }
   
 
  $this_page = ($page-1)*$result_per_page;
  $query = mysqli_query($connect, "SELECT * FROM `ordering` LIMIT " . $this_page. ',' . $result_per_page) ;
   
if($query){
 
  while($row = mysqli_fetch_array($query)) {
    $order_id = $row['order_id'];
    $country = $row['country'];
    $date = $row['order_date'];
    $price = $row['price'];
    
    $quantity = $row['quantity'];
    $car_num = $row['car_num'];
    $product_id = $row['product_id'];

    echo '<tr class="tr">
    <td class="td">'. $order_id .'</td>
    <td class="td">'.$country.'</td>
    <td class="td">'. $date .'</td>
    <td class="td">'. $price.'</td>
    <td class="td">'.$quantity .'</td>
    <td class="td">'.  $car_num.'</td>
    <td class="td">'.  $product_id.'</td>'?>
<?php
if(isset($admin)){
echo '
<td class="td">
<button class="btn1"><a class="a-link" href=" orderedit.php?editid='.$order_id.'">Edit</a></button>
<button class="btn2 deletebtn" id="delete" name="delete deletebtn" onclick="onDelete()">Delete</button>
</td>
</tr>'?>
<?php }}}?>
</tbody>
</table>
<?php
for($page= 1; $page<= $no_of_page; $page++){
echo '<button class="pagin"><a class="tex" href="ordering.php?page=' . $page . '">' . $page . '</a></button>';

}
?>
 </div>

 <!-- modal -->
<div id="confirmation" class="modal-container">
    <div class="modal">
      <section>
        <header class="modal-header">
          <span onclick="onCancel()">&times;</span>
          <h2>Are you sure you want to delete?</h2>
        </header>
        <form action="ordering.php" method="POST">
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

