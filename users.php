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
  <title>TSF Bank</title>
  <link rel = "icon" href = "./images/inr.png" type = "image/x-icon">
  <link rel="icon" type="image/png" href="images/f%20small.jpg">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
  <link rel="stylesheet" href="style/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://code.jquery.com/jquery-3.3.1.slim.min.js">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js">
</head>

<body>
  <header class="header">
    <nav class="navbar navbar-expand-lg fixed-top py-3">
      <div class="container"><a href="index.php" style='font-size: 25px; color: #ceebcf;'  class="navbar-brand text-uppercase font-weight-bold">TSF Bank</a>
        <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler navbar-toggler-right"><i class="fa fa-bars"></i></button>           
          <div id="navbarSupportedContent" class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item"><a href="./index.php" style='font-size: 16px' class="nav-link text-uppercase font-weight-bold">Home </a></li>
              <li class="nav-item active"><a href="./users.php" style='font-size: 16px' class="nav-link text-uppercase font-weight-bold">Users</a></li>
              <li class="nav-item"><a href="./history.php" style='font-size: 16px' class="nav-link text-uppercase font-weight-bold">Transaction History</a></li>
            </ul>
          </div>
        </div> 
      </nav>
  </header>
  <br><br>
  <br><br>
  <div class="page-main" style="margin-left:90px;margin-right:90px;margin-top: -5px;margin-bottom: 0px">
    <section>
      <h1>Account Holders</h1>
      <div class="tbl-header">
        <table cellpadding="0" cellspacing="0" border="0">
          <thead>
            <tr>
              <th style='font-size: 14px'>ID</th>
              <th style='font-size: 14px'>Account Holder</th>
              <th style='font-size: 14px'>Email ID</th>
              <th style='font-size: 14px'>Action</th>
            </tr>
          </thead>
        </table>
      </div>
      <div class="tbl-content">
        <table cellpadding="0" cellspacing="0" border="0">
          <?php 
            $stmt = $pdo->query("SELECT * FROM users");
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if(count($rows)>0){
              foreach($rows as $row ) { ?>
                <td style='font-size: 14px'><?php echo htmlentities($row['user_id']); ?> </td>
                <td style='font-size: 14px'><?php echo htmlentities($row['user_name']); ?> </td>
                <td style='font-size: 14px'><?php echo htmlentities($row['email']); ?> </td>
                <td style='font-size: 14px'>
                  <a href="transaction.php?user_id=<?php echo $row['user_id']; ?>" style="color:#5161ce">View Profile</a></td>
                </td>
              </tr>
          <?php }} ?>
        </table>
      </div>
    </section>         
  </div>   
  <div class="footer">
    <p><a href="https://www.linkedin.com/in/kunal-kamble-404aab15a/" style='color: rgba(255,255,255,0.5);'>@2021 Made by Kunal Kamble</a><br><a href="https://thesparksfoundationsingapore.org/" style='color: rgba(255,255,255,0.5);'>The Sparks Foundation</a></p>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>   
  <script>
  $(window).on("load resize ", function() {
    var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
    $('.tbl-header').css({'padding-right':scrollWidth});
  }).resize();
  $(function () {
    $(window).on('scroll', function () {
      if ( $(window).scrollTop() > 10 ) {
        $('.navbar').addClass('active');
      } 
      else {
        $('.navbar').removeClass('active');
      }
    });
  });

</script>
</body>
</html>


