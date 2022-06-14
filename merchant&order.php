<?php
include "sidebar.php";
include "modal.php";
if (isset($_POST['deletedata'])) {
  $id = $_POST['delete_id'];
  echo $query = mysqli_query($connect, "DELETE FROM `merchant_order` WHERE `id` = '$id'");
  if($query) {
    header("location:merchant&order.php");
  }else {
    die(mysqli_error($connect));
}
}

?>
<div class="home_content">
  <div class="text">
<div class="con">
<table class="">
  <thead>
    <tr>
      <th class="th">Merchant_id</th>
      <th class="th" >Order_id</th>
      <th class="th">Trade</th>
<?php
if(isset($admin)){
  echo '
<th class="th" ></th>';}
?>
    </tr>
  </thead>
  <tbody>
<?php 
$query = mysqli_query($connect,"SELECT * FROM `merchant_order`");
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
  $query = mysqli_query($connect, "SELECT * FROM `merchant_order` LIMIT " . $this_page. ',' . $result_per_page) ;
if($query){
  while($row = mysqli_fetch_assoc($query)){
    $id = $row['id'];
    $merchant_id = $row['merchant_id'];
    $order_id = $row['order_id'];
    $trade = $row['trade'];
    echo '<tr>
    <td class="td">'.   $merchant_id .'</td>
    <td class="td">'.  $order_id .'</td>
    <td class="td">'.$trade .'</td>' ?>
    <?php
    if(isset($admin)){?>
    <?php echo '
       <td  class="td">
        <button class="btn1"><a class="a-link" href=" merchant&order_edit.php?editid='.$id.'">Edit</a></button>
        <button class="btn2 deletebtn" id="delete" name="delete deletebtn" onclick="onDelete()">Delete</button>
        </td>
        </tr>'?>
    <?php }?>
 <?php }}?>
  </tbody>
  </div>
  </table>
 <?php
for($page= 1; $page<= $no_of_page; $page++){
echo '<button class="pagin"><a class="tex" href="merchant&order.php?page=' . $page . '">' . $page . '</a></button>';

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
        <form action="merchant&order.php" method="POST">
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