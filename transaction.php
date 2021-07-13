<?php
ob_start();
require_once "config.php";
session_start();
if (isset($_POST['submit'])){
  $receiver=$_POST['receiver'];
  $amount=$_POST['amount'];
  $stmt = $pdo->prepare("SELECT * FROM users WHERE user_id=:xyz");
  $stmt->execute(array(":xyz" => $_GET['user_id']));
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
  $sender=$row['user_name'];
  $balance=$row['user_credits'];
  if($balance<$amount){
    ?>
      <script>
        alert("Insufficient balance");
      </script>
    <?php
  }
  else{
  $sql = "INSERT INTO history (sender, receiver, trans_amount) VALUES (?,?,?)";
  $stmt= $pdo->prepare($sql);
  $stmt->execute([$sender, $receiver, $amount]);

  $sql = "UPDATE users SET user_credits=user_credits-$amount WHERE user_name='$sender'";
  $stmt= $pdo->prepare($sql);
  $stmt->execute();

  $sql = "UPDATE users SET user_credits=user_credits+$amount WHERE user_name='$receiver'";
  $stmt= $pdo->prepare($sql);
  $stmt->execute();
?>
 <script>
   alert("Payment Successful");
 </script>
<?php 
}
} 
ob_end_flush();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Basic Banking System</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="style/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://code.jquery.com/jquery-3.3.1.slim.min.js">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js">
  <link rel="stylesheet" href="https://code.jquery.com/jquery-2.2.4.min.js">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js'></script>
  <style>
    .temp-modal{
      z-index:3;
      display:none;
      padding-top:100px;
      position:fixed;left:0;top:0;width:100%;height:100%;overflow:auto;background-color:rgb(0,0,0);background-color:rgba(0,0,0,0.4)}
    .temp-modal-content{
      margin:auto;
      background-color:#fff;
      position:relative;
      padding:0;
      outline:0;
      width:600px
    }
    @media (max-width:600px){
      .temp-modal-content{
        margin:0 10px;
        width:auto!important
      }
      .temp-modal{
        padding-top:30px
      }
      .temp-dropdown-hover.temp-mobile .temp-dropdown-content,.temp-dropdown-click.temp-mobile .temp-dropdown-content{
        position:relative
      }	
      .temp-hide-small{
        display:none!important
      }
      .temp-mobile{
        display:block;
        width:100%!important
      }
      .temp-bar-item.temp-mobile,.temp-dropdown-hover.temp-mobile,.temp-dropdown-click.temp-mobile{
        text-align:center
      }
      .temp-dropdown-hover.temp-mobile,.temp-dropdown-hover.temp-mobile .temp-btn,.temp-dropdown-hover.temp-mobile .temp-button,.temp-dropdown-click.temp-mobile,.temp-dropdown-click.temp-mobile .temp-btn,.temp-dropdown-click.temp-mobile .temp-button{
        width:100%
      }
    }
    @media (max-width:768px){
      .temp-modal-content{
        width:500px
      }
      .temp-modal{
        padding-top:50px
      }
    }
    @media (min-width:993px){
      .temp-modal-content{
        width:900px
      }
      .temp-hide-large{
        display:none!important
      }
      .temp-sidebar.temp-collapse{
        display:block!important
      }
    }
    .temp-card-4,.temp-hover-shadow:hover{
      box-shadow:0 4px 10px 0 rgba(0,0,0,0.2),0 4px 20px 0 rgba(0,0,0,0.19)
    }
    .temp-animate-zoom {
      animation:animatezoom 0.6s
    }
    @keyframes animatezoom{
      from{transform:scale(0)} to{transform:scale(1)
      }
    }
    .temp-button{
      border:none;
      display:inline-block;
      padding:8px 16px;
      vertical-align:middle;
      overflow:hidden;
      text-decoration:none;
      color:inherit;
      background-color:inherit;
      text-align:center;
      cursor:pointer;
      white-space:nowrap
    }
    .temp-xlarge{
      font-size:24px!important
    }
    .temp-xxlarge{
      font-size:36px!important
    }
    .temp-xxxlarge{
      font-size:48px!important
    }
    .temp-jumbo{
      font-size:64px!important
    }
    .temp-red,.temp-hover-red:hover{
      color:#fff!important;
      background-color:#f44336!important
    }
    .temp-display-topright{
      position:absolute;
      right:0;
      top:0
    }
    body,h1,h2,h3,h4,h5 {
      font-family: "Poppins", sans-serif
    }
    body {
      font-size:16px;
    }
    .page-half img{
      margin-bottom:-6px;
      margin-top:16px;
      opacity:0.8;
      cursor:pointer
    }
    .page-half img:hover{
      opacity:1
    }
        
    table {
      font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }

    td,th {
      border: 1px solid #ddd;
      padding: 8px;
    }

    tr:nth-child(even){background-color: #f2f2f2;}
    tr:nth-child(odd){background-color: #f2f2f2;}
    tr:hover {background-color: #ddd;}

    th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;
      background-color: #607d8b;
      color: white;
    }

    #footer p{
      color: white;
      margin-top: 20vh;
      font-size: 2vw;
      font-weight: 500;
    }
  </style>
</head>
<body>
  <header class="header">
    <nav class="navbar navbar-expand-lg fixed-top py-3">
      <div class="container"><a href="index.php" style='font-size: 25px; color: #ceebcf;' class="navbar-brand text-uppercase font-weight-bold">Very Basic Bank</a>
        <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler navbar-toggler-right"><i class="fa fa-bars"></i></button>
          <div id="navbarSupportedContent" class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a href="./index.php" style='font-size: 16px' class="nav-link text-uppercase font-weight-bold">Home </a></li>
                <li class="nav-item"><a href="./users.php" style='font-size: 16px' class="nav-link text-uppercase font-weight-bold">Users</a></li>
                <li class="nav-item"><a href="./history.php" style='font-size: 16px' class="nav-link text-uppercase font-weight-bold">Transaction History</a></li>
            </ul>
          </div>
      </div> 
    </nav>
  </header>
  <br><br>
  <?php
    $stmt = $pdo->prepare("SELECT * FROM users where user_id = :xyz");
    $stmt->execute(array(":xyz" => $_GET['user_id']));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $sender=$row['user_name'];
  ?>
  <script src="./app.js"></script>
    <div class="limiter">
      <div class="container-login100">
        <div class="wrap-login100">
          <div class="login100-pic js-tilt" data-tilt>
            <img src="images/R.png" alt="IMG">
				  </div> 
				  <div class="login100-form">
            <span class="login100-form-title">
              User Info
            </span>
            <p style='font-size: 16px'><b>ID:</b> <?php echo htmlentities($row['user_id']); ?></p>
            <p style='font-size: 16px'><b>Name:</b> <?php echo htmlentities($row['user_name']); ?></p>
            <p style='font-size: 16px'><b>Email:</b> <?php echo htmlentities($row['email']); ?></p>
            <p style='font-size: 16px'><b>Credit:</b> ₹<?php echo htmlentities($row['user_credits']); ?></p>
					  <div class="container-login100-form-btn">
              <button  class="login100-form-btn" onclick="document.getElementById('id01').style.display='block'" data-toggle="modal" data-target="#transfer<?php echo $row['user_id'] ?>">
							  Transfer Credits
              </button>    
            </div>
					</div>
        </div>
			</div>
		</div>
	</div>

  <div id="id01" class="temp-modal">
    <div class="temp-modal-content temp-card-4 temp-animate-zoom" style="max-width:600px">
      <div class="temp-center"><br>
        <span onclick="document.getElementById('id01').style.display='none'" class="temp-button temp-xlarge temp-hover-red temp-display-topright" title="Close Modal">&times;</span>
          <div id="transfer<?php echo $row['user_id'] ?>" role="dialog">
            <?php $id=$row['user_id']; ?>
            <h4 style='text-align: center'>Transfer Money </h4>    
          </div>
          <div class="modal-body">
            <form method="POST" enctype="multipart/form-data">
              <div class="form-group row">
                <label for="name" name="<?php echo $row['user_id'] ?>" >&nbsp&nbsp&nbsp Sender: <?php echo $row['user_name'] ?></label>   
              </div>
              
              <div class="form-group row">
                <label for="name">&nbsp&nbsp&nbsp Reciever:</label>
                &nbsp&nbsp&nbsp  <select name="receiver" >
                  <?php 
                    $stmt = $pdo->query("SELECT * FROM users WHERE user_id!=$id ");
                    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    if(count($rows)>0){
                    foreach($rows as $row ) { ?>
                      <option><?php echo $row['user_name'] ?></option> 
                  <?php }
                      }?>
               </select>
              </div>
              <div class="form-group row">
                <label for="amount" class="col-form-label">&nbsp&nbsp&nbsp Transfer Amount(in ₹):</label>
                <div class="col-md-10">
                  <input type="number" class="form-control" id="amount" name="amount" placeholder=" Credits\Amount" required>
                </div>
              </div>   
              <div class="form-group row2">
                <button href="profile.php?user_id=$id" type="submit" id="submit" name="submit" class="login100-form-btn">Transfer</button>  
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>                                    
  </div>

  <div class="footer">
    <p><a href="https://www.linkedin.com/in/kunal-kamble-404aab15a/" style='color: rgba(255,255,255,0.5);'>@2021 Made by Kunal Kamble</a><br><a href="https://thesparksfoundationsingapore.org/" style='color: rgba(255,255,255,0.5);'>The Sparks Foundation</a></p>
  </div>

  <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="vendor/select2/select2.min.js"></script>
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script>
    $( document ).ready(function() {
      $('.trigger').on('click', function() {
        $('.modal-wrapper').toggleClass('open');
        $('.page-wrapper').toggleClass('blur-it');
         return false;
      });
    });

		$('.js-tilt').tilt({
			scale: 1.1
		})
        
    $(document).ready(function(){
      document.getElementById("submit").onclick = function () {
          if() {
            alert('error please fill all fields!');
          }      
      };   
    });
	</script>
</body>
</html>