<?php
include "config.php";
if(isset($_SESSION['admin']) ){
echo '<button class="btn1 dbtn"><a class="a-link" href="?logout">Logout</a></button>';
 }?>
<style>
*{
    font-size: 13px;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Lucida Sans Regular', 'Lucida Grande', Verdana, sans-serif;
    

 }
 .rightd{
        margin-left: 250px;
        
    }
   
.sidebar {
    background-color: lightseagreen;
    width:170px;
    height: 100%;
    position: fixed;

}
.dbtn{
    float: right;
}

.c {
    color: white;
    line-height: 60px;
    font-weight: 600;
    letter-spacing: 1px;


}

    ul {
    background-color: lightseagreen;

    list-style: none;

    }

    .list{
    line-height: 65px;
    margin-left: 20px;

    }

    .link{
    background-color: lightseagreen;
    color: white;
    text-decoration: none;
    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    position: relative;
    display: block;
    width: 100%;
    margin-right: 6px;
    }
    a:hover{
    color: lightgray;
    }
    a:active{
    color: lightgray;
    }

    .tex {
    color: white;
    text-decoration: none;
    }

    .con {
    background-color: white;
    margin-left: 320px;
    }

    .th {
    padding: 15px;
    border-bottom: 1px solid black;
    font-size: 20px;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: white;
    }

    .td {
    padding: 12px;
    text-align: center;
    font-size: 15px;
    background-color: white;
    border-bottom: 1px solid black;
    }

    .pagin {
    border: 1px solid lightseagreen;
    border-radius: 4px;
    background-color: lightseagreen;
    margin: 2px;
    padding: 6px;
    }

    .btn1 {
    border: 1px solid lightseagreen;
    border-radius: 4px;
    background-color: lightseagreen;
    margin: 2px;
    padding: 10px;
    width: 70px;
    color: white;
    }

    .btn2 {
    border: none;
    border: 1px solid lightgray;
    border-radius: 4px;
    background-color: lightgray;
    margin: 2px;
    padding: 10px;
    width: 70px;
    color: white;
    font-weight: 600;
    }

    .a-link {
    color: white;
    text-decoration: none;
    font-weight: 600;
    }

</style>
<nav class="sidebar">
<div class="c">
<ul>
<li class="list"><a class="link" href="login.php">Login</a></li>
<li class="list"><a class="link" href="product.php">Products</a></li>
<li class="list"><a class="link"  href="ordering.php">Order</a></li>
<li class="list"><a class="link"  href="merchant.php">Merchant</a></li>
<li class="list"><a class="link" href="order_detail.php">Order_detail</a></li>
<li class="list"><a class="link" href="cost_type.php">Cost_type</a></li>
<li class="list"><a class="link" href="merchant&order.php">Merchant&Order</a></li>
</ul>
</div>
</nav>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
