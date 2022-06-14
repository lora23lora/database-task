<?php ob_start(); ?>
<?php include "config.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tables</title>
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/7613f6b695.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

</head>
<style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
       
    }
    .sidebar{
        position: fixed;
        top: 0;
        left: 0;
        height: 100%;
        width: 78px;
        background-color: #11101d;
        padding: 6px 14px;
        transition: all 0.5s ease;
    }
    .sidebar.active{
     width: 240px;
    }
    
    .logo{
        
        display: flex;
        margin-left: 30px;
        margin-top:  80px;
        height: 30px;
        width: 40px;
        opacity: 0;
        pointer-events: none;
        transition: all 0.5s ease;
        
    }
    .sidebar.active .logo_content .logo{
        opacity: 1;
    }
    #btn{
        position: absolute;
        color:white;
        left: 50%;
        top: 16px;
        font-size: 20px;
        height: 50px;
        width: 50px;
        text-align: center;
       line-height: 50px;
       transform: translateX(-50%);
       cursor: pointer;

    }
    .sidebar.active #btn{
        left: 90%;
    }
    .sidebar .nav_list{
        /* margin-top: 20px; */
        
    }
    .sidebar .nav_list .list{
        list-style: none;
        /* height: 50px;  change this */
        height: 70px;
        
        
    }
    .sidebar .nav_list .list a{
        color: #fff;
        display: flex;
        align-items: center;
        line-height: 50px;
        text-decoration: none;
        transition: all 0.4s ease;
        border-radius: 12px;
        /* this one down is important so the text wont go to new line */
        white-space: nowrap;
        
    }
    .sidebar .nav_list .list a:hover{
        color: #11101d;
        background-color: lightgray;
    }
    .sidebar .nav_list .list  i{
        /* we used height and min_width to seperate i with a and then we added line height to add space */
        height: 50px;
        min-width: 50px;
        border-radius: 12px;
        line-height: 50px;
        text-align: center;
        
    }
    /* .sidebar .nav_list .list .search{
        position: absolute;
        height: 7%;
        width: 90%;
        left: 0;
        top: 5;
        margin-left: 7px;
        border-radius: 12px;
        outline: none;
        border: none;
        background: lightgray;
        padding-left: 70px;
        font-size: 18px;
        color: #11101d;
    } */
   
    /* .sidebar .nav_list .list .bx-search{
        position: absolute;
        z-index: 99;
        color: #fff;
        margin-right: 200px;
        font-size: 22px;
        transition: all 0.5s ease;
    }
    .sidebar .nav_list .list .bx-search:hover{
        background: lightgrey;
        color: #11101d;
    } */
    .sidebar .profile_content{
        position: absolute;
        color: #fff;
        bottom: 0;
        left: 0;
        width: 100%;
    }
    .sidebar .profile_content .profile{
        position: relative;
        padding: 10px 6px;
        height: 60px;
        
    }
    .profile_content .profile .profile_detail{
        display: flex;
        align-items: center;
        opacity: 0;
        pointer-events: none;
        white-space: nowrap;
    }
    .sidebar.active  .profile_content .profile{
        background: none;
    }
    .sidebar.active .profile .profile_detail{
        opacity: 1;
        pointer-events: auto;
    }
    .profile .profile_detail .name{
        font-size: 15px;
        font-weight: 400;
    }
    .profile #log_out{
        position: absolute;
        bottom: 5px;
        left: 50%;
        transform: translateX(-50%);
        min-width: 50px;
        line-height: 75px;
        font-size: 20px;
        text-align: center;
        
    }
    .sidebar.active .profile #log_out{
        left: 88%;
    }
    .home_content{
        position: absolute;
        width: calc(100% - 78px);
        height: 100%;
        left: 78px;
        transition: all 0.5s ease;
    }
    .sidebar.active ~ .home_content{
        width: calc(100% - 240px);
        left: 240px;
        
}
    .sidebar .nav_list .list .tooltip{
        position: absolute;
        left: 90px;
      
        transform: translateY(-50%);
        line-height: 35px;
        border-radius: 6px;
        height: 35px;
        width: 122px;
        background: #fff;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
        text-align: center;
        transition: 0s;
        pointer-events: none;
        opacity: 0;
        display: block;
    }
    .sidebar.active .nav_list .list .tooltip{
        display: none;
    }
    .sidebar .links_name{
        opacity: 0;
        pointer-events: none;
    }
    .sidebar.active .links_name{
        opacity: 1;
        pointer-events: auto;
    }
    .tooltip1{
        top: 31.5%;
    }
    .tooltip2{
        top: 33.5%;
    }
    .tooltip3{
        top: 43.5%;
    }
    .tooltip4{
        top: 14.5%;
    }
    .sidebar .nav_list .list:hover .tooltip{
        
    transition: all 0.5s ease;
    opacity: 1;
    }
    .list_in_list{
        list-style: none;
    }
    .list_in_list a{
        color: #fff;
        display: flex;
        align-items: center;
        line-height: 50px;
        text-decoration: none;
        transition: all 0.4s ease;
        border-radius: 12px;
        /* this one down is important so the text wont go to new line */
        white-space: nowrap;
        
    }
    .lis{
        list-style: none;
    }
    .lis a{
        color: #fff;
        display: flex;
        align-items: center;
        line-height: 30px;
        margin-left: 20px;
        border-radius: 6px;
        white-space: nowrap;
    }
    .list_in_list a:hover{
        background: lightgray;
        color: #11101d;
        

    }
    .symbol{
        position: absolute;
        top: 38.4%;
        right: 20px;
        transform: translateY(-50%);
        font-size: 22px;
        transition: all 0.4s ease;
        opacity: 0;
    }
    
    .symbol.rotate {
        transform: translateY(-50%) rotate(-180deg);
    }
    .feat-show{
        position: static;
        display: none;

    }
    .sidebar.active .symbol{
        opacity: 1;
    }
    .sidebar.active .feat-show.show{
      display: block;
    }
    .sidebar .nav_list .list_in_list  i{
        /* we used height and min_width to seperate i with a(link) and then we added line height to add space */
        height: 50px;
        min-width: 50px;
        border-radius: 12px;
        line-height: 50px;
        text-align: center;
    }
    
   /* for all */
   .con {
    background-color: white;
    margin-left: 140px;
    margin-top: 30px;
    
    }
   

    .th {   
    padding: 15px;
    border-bottom: 1px solid black;
    font-size: 20px;
    font-family: Verdana, Geneva, Tahoma, sans-serif;
    }

    .td {
    padding: 12px;
    text-align: center;
    font-size: 15px;
    background-color: white;
    border-bottom: 1px solid black;
    font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
    }
    .pagin {
    border: 1px solid #11101d;
    border-radius: 4px;
    background-color: #11101d;
    margin: 2px;
    padding: 6px;
    }

    .btn1 {
    font-weight: 600;
    border: 1px solid #11101d;
    border-radius: 4px;
    background-color: #11101d;
    padding: 7px;
    width: 80px;
    height: 37px;
    color: white;
    cursor: pointer;
    
    }

    .btn2 {
    font-weight: 600;
   border: none;
   outline: none;
   background: lightgray;
   border-radius: 4px;
   color: #11101d;
   cursor: pointer;
    }
    .a-link {
    color: white;
    text-decoration: none;
    
    font-size: 17px;
    }
    .tex {
    color: white;
    text-decoration: none;
    }
    .dbtn{
    float: right;
}

/* modal style */
#delete {
    font-size: large;
    padding: 0.5em 1em;
  }

  .modal-container {
    z-index: 9999;
    position: fixed;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    display: none;
    justify-content: center;
  }

  .modal-open {
    display: flex;
  }

  .modal {
    max-width: 700px;
    max-height: 160px;
    background-color: white;
    border-radius: 3px;
    margin-top: 20px;

  }

  .modal-button {
    text-transform: uppercase;
    padding: 0.5em 1em;
    border: none;
    color: #fff;
    background-color:lightgray;
    border-radius: 3px;
    margin-left: 0.5em;
    cursor: pointer;
  }

  .modal-confirm-button {
    background-color: #11101d;
  }

  .modal-header {
    background-color: white;
    display: flex;
    flex-direction: column;
  }

  .modal-header h2 {
    margin: 1em;
  }

  .modal-header span {
    padding-right: 0.3em;
    cursor: default;
    align-self: flex-end;
  }

  .modal-footer {
    padding: 1em;
    background-color: white;
    display: flex;
    justify-content: flex-end;
  }

  .close-button {
    border: none;
    text-align: center;
    cursor: pointer;
    white-space: nowrap;
  }
  /* edit part  */
  .sn{
        margin-left: 250px;
    }
    .input{
        width: 80%;
        height: 40px;
        margin: 10px;
        border-radius: 7px;
        padding-left: 10px;
        font-size: 18px;
      
    }
    .form{
       margin-top: 100px;
        align-items: center;
    }
    .btns{
        margin-left: 40px;
    }
    .label{
       margin-left: 20px;
     
    }
 
</style>

<body>
    <div class="sidebar">
        <div class="logo_content">
            <div class="logo">
                <img src="download.jpg" alt="">
                
            </div>
            <i class='bx bx-menu' id="btn"></i>
        </div>
        <ul class="nav_list">
            <li class="list">
<!--             
            <i class='bx bx-search' id="search"></i>
            <input class="search" type="text" placeholder="Search...">
           
             <span class="tooltip tooltip4">search</span>  -->
            </li>
            <li class="list">
            <a href="login.php">
            <i class='bx bx-user' ></i>
            <span class="links_name">Login</span>
            </a>
             <span class="tooltip tooltip1">Login</span> 
            </li>
            <li class="list_in_list">
            <a class="feat-btn" href="#">
            <i class='bx bx-table' ></i>
            <span class="links_name">Tables</span>
            <span class="symbol fas fa-caret-down first"></span>
            <ul class="feat-show">
                        <li class="lis"><a href="ordering.php">order</a></li>
                        <li class="lis"><a href="product.php">product</a></li>
                        <li class="lis"><a href="cost_type.php">cost_type</a></li>
                        <li class="lis"><a href="merchant.php">merchant</a></li>
                        <li class="lis"><a href="order_detail.php">order_detail</a></li>
                        <li class="lis"><a href="merchant&order.php">order&merchant</a></li>
                    </ul>
                    </a>
            </li>
            <!-- <li>
            <a href="#">
            <i class='bx bxs-contact'></i>
            <span class="links_name">Contact Us</span>
            </a>
             <span class="tooltip tooltip3">Contact Us</span> 
            </li>  -->
            
          
        <div class="profile_content">
            <div class="profile">
                <div class="profile_detail">
                <div class="name"> <?php 
                if(isset($_POST['admin'])){
                echo '$username'; }?></div>
             </div>
            <?php if(isset($admin)){ 
           echo '<a class="a-link" href="?logout"><i class="bx bx-log-out" id="log_out" ></i></a>'; }?>
          
   
            </div>
        </div>
    </div>
   
    <script>
        let btn = document.querySelector("#btn");
        let sidebar = document.querySelector(".sidebar");
        // let search= document.querySelector(".bx-search");
        let table= document.querySelector(".bx-table");
       

        btn.onclick = function(){
            sidebar.classList.toggle("active");
        }
        // search.onclick = function(){
        //     sidebar.classList.toggle("active");
        // }
        table.onclick = function(){
            sidebar.classList.toggle("active");
        }
       

    </script>
    <script>
        $('.feat-btn').click(function(){
    $('.feat-show').toggleClass("show");
    $('.first').toggleClass("rotate");
})
    </script>
    
