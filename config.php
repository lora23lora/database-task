<?php
session_start();
$connect = mysqli_connect('localhost','root','','mydatabase');
if(!$connect){
    echo 'connection error';
    mysqli_connect_error($connect);
}
function clear($data){
    global $connect;
    $data  = mysqli_real_escape_string($connect, htmlspecialchars($data));
    return $data;

}
if(isset($_SESSION['admin'])){
    $admin = $_SESSION['admin'];
}elseif(isset($_SESSION['username'])){
    $userid = $_SESSION['username']; 
}
if(isset($_GET['logout'])){
    session_unset();
    session_destroy();
    unset($admin);
    unset($userid);
    header("location:home.php");
}

?>