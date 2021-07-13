<?php
$year = date('Y');
ob_start();
require_once "config.php";
session_start();
ob_end_flush();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basic Banking System</title>
    <!-- Bootstrap CSS -->
    <link rel="icon" type="image/png" href="images/f%20small.jpg">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://code.jquery.com/jquery-3.3.1.slim.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js">

  </head>

  <body>
  <style>
    body{
      font-family: 'Lato', sans-serif;
    }
    .carousel-fade .carousel-inner .item {
      opacity: 0;
      transition-property: opacity;
    }

    .carousel-fade .carousel-inner .active {
      opacity: 1;
    }

    .carousel-fade .carousel-inner .active.left,
    .carousel-fade .carousel-inner .active.right {
      left: 0;
      opacity: 0;
      z-index: 1;
    }

    .carousel-fade .carousel-inner .next.left,
    .carousel-fade .carousel-inner .prev.right {
      opacity: 1;
    }

    .carousel-fade .carousel-control {
      z-index: 2;
    } 
    @media all and (transform-3d), (-webkit-transform-3d) {
      .carousel-fade .carousel-inner > .item.next,
      .carousel-fade .carousel-inner > .item.active.right {
        opacity: 0;
        -webkit-transform: translate3d(0, 0, 0);
                transform: translate3d(0, 0, 0);
      }
      .carousel-fade .carousel-inner > .item.prev,
      .carousel-fade .carousel-inner > .item.active.left {
        opacity: 0;
        -webkit-transform: translate3d(0, 0, 0);
                transform: translate3d(0, 0, 0);
      }
      .carousel-fade .carousel-inner > .item.next.left,
      .carousel-fade .carousel-inner > .item.prev.right,
      .carousel-fade .carousel-inner > .item.active {
        opacity: 1;
        -webkit-transform: translate3d(0, 0, 0);
                transform: translate3d(0, 0, 0);
      }
    } 
    .carousel-caption {
        text-shadow: 0 1px 4px rgba(0,0,0,.9);
      font-size:17px
    }
    .carousel-caption h3 {
      font-size: 30px;
      font-family: 'Lato', sans-serif;
    }
    html,
    body,
    .carousel,
    .carousel-inner,
    .carousel-inner .item {
      height: 100%;
    } 
    .item:nth-child(1) {
      background: url('images/bg.jpg');
      background-size: cover;
      background-position: center center;
      background-repeat: no-repeat;
    }

    .item:nth-child(2) {
      background: url('images/users.jpg');
      background-size: cover;
      background-position: center center;
      background-repeat: no-repeat;
        }

    .item:nth-child(3) {
      background: url('images/trans.jpg');
      background-size: cover;
      background-position: center center;
      background-repeat: no-repeat;
    }
    .square_btn {
    display: inline-block;
    padding: 0.3em 1em;
    text-decoration: none;
    color: #67c5ff;
    border: solid 2px #67c5ff;
    border-radius: 3px;
    transition: .4s;
    }

    .square_btn:hover {
      background: #67c5ff;
      color: white;
    }

  </style>

  <div>
  <header class="header">
      <nav class="navbar navbar-expand-lg fixed-top py-3">
        <div class="container"><a href="index.php" style='font-size: 25px; color:#ceebcf' class="navbar-brand text-uppercase font-weight-bold">Very Basic Bank</a>
            <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler navbar-toggler-right"><i class="fa fa-bars"></i></button>
            <div id="navbarSupportedContent" class="collapse navbar-collapse">
              <ul class="navbar-nav ml-auto">
                  <li class="nav-item active"><a href="./index.php" style='font-size: 16px' class="nav-link text-uppercase font-weight-bold">Home </a></li>
                  <li class="nav-item"><a href="./users.php" style='font-size: 16px' class="nav-link text-uppercase font-weight-bold">Users</a></li>
                  <li class="nav-item"><a href="./history.php" style='font-size: 16px' class="nav-link text-uppercase font-weight-bold">Transaction History</a></li>
              </ul>
            </div>
        </div> 
      </nav>
    </header>
  </div>

  <div id="carouselFade" class="carousel slide carousel-fade" data-ride="carousel" style="padding-top:70px">
    <div class="carousel-inner" role="listbox">
      <div class="item active" style="align:center margin:auto">  
          <div class="carousel-caption">
            <h1>A Very Basic Bank</h1>
            <h4>This is a demo web banking application for educational purposes</h4>
            <br><br><br><br><br><br><br><br>
          </div>
        </div>
        <div class="item"> 
            <div class="carousel-caption">
              <h1>Account Holders</h1>
              <a href="./users.php" class="square_btn">View Users</a>
              <br><br><br><br><br><br><br><br>
            </div>
        </div>
        <div class="item"> 
            <div class="carousel-caption">
              <h1>Transaction History</h1>
              <a href="./history.php" class="square_btn">View Transactions</a>
              <br><br><br><br><br><br><br><br>
            </div>
          </div>
        </div>
       <a class="left carousel-control" href="#carouselFade" role="button" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
       </a>
       <a class="right carousel-control" href="#carouselFade" role="button" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
   </div>
  </div>
  <div class="footer">
    <p><a href="https://www.linkedin.com/in/kunal-kamble-404aab15a/" style='color: rgba(255,255,255,0.5);'>@2021 Made by Kunal Kamble</a><br><a href="https://thesparksfoundationsingapore.org/" style='color: rgba(255,255,255,0.5);'>The Sparks Foundation</a></p>
  </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
<script>
  $('#carouselFade').carousel();
</script>
</html>