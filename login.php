<?php
include "sidebar.php";
if(isset($_POST['admin'])){
    $username = clear($_POST['username']);
    $password = clear($_POST['password']);
    if(empty($username) || empty($password)){
        header("location:login.php");
    }else{
           $query = mysqli_query($connect,"SELECT * FROM `admin` WHERE `username`= '$username' AND `password` = '$password'");
           if(mysqli_num_rows($query)===1){
            while($row = mysqli_fetch_assoc($query)){
                $_SESSION['admin'] = $row['id'];
            }
            header("location:home.php");
           }else{
            header("locaion:login.php");
           }
    }
}
?>
<div class="cont">
    
    <form action="" class="f" method="POST">
        <div class="in">
        <div>
            <input autocomplete="off" autofocus class="inputs" type="text" name="username" id="" placeholder="name...">
        </div>
        <div>
            <input autocomplete="off"class="inputs" type="password" name="password" id="" placeholder="password...">
        </div>
        <button class="btn22" name="admin">Submit</button>
        </div>
    </form>
</div>


<style>
    .cont{
        position: absolute;
        left:25%;
        top:10%;
        width: 50%;
        height: 70%;
        text-align: center;
        background-color: lightgrey;
        border-radius: 10px ;
        box-shadow: 4px 4px 13px -1px rgba(0,0,0,0.57);
        
    }
    .f{
        margin-top: 20%;
    }
    .inputs{
        width: 50%;
        height: 40px;
        outline: none;
        margin: 9px;
        border-radius: 5px;
        padding-left: 10px;
        border: none;
    }
    .inputs:focus{
        box-shadow: 3px 3px 10px -1px rgba(0,0,0,0.5);
    }
    .btn22{
        margin-top: 6px;
        width: 50%;
        height: 40px;
        background: #11101d; 
        color: white; 
        font-size: 20px;
        font-weight: 600;
        border-radius: 5px;
       border: none;
       cursor: pointer;
       transition: all 0.04s ease;
    }
    .btn22:active{
        background: lightgrey;
        color: #11101d;
        box-shadow: 3px 3px 10px -1px rgba(0,0,0,0.5);
      
    }
   
  
</style>