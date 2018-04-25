<html>
<head>
  <title></title>
  <link href="css/style.css" rel="stylesheet">
  <script src="js/new.js"></script>
  <script src="js/jquery-1.9.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<link href="css/bootstrap.min.css" rel="stylesheet" />
<script src="js/bootstrap.min.js"></script>

</head>
<body  background="img/login_bg.png">
  <?php if($_GET['id'] == "fail") {?>
      <div class="alert alert-warning">
      <center>  Invalid User ID or Password. Please try again. </center>
      </div>
    <?php }  ?>
  <div class="container">
	<div class="login-container">
        <div id="output"></div>
          <img src="img/logo.png">
            <div class="form-box">
                <form action="check_login.php" method="post">
                    <input type="text" placeholder="username" name="userlogin">
                    <input type="password" placeholder="password" name="passlogin">
                    <button class="btn btn-info btn-block login" type="submit">Login</button>
                </form>
            </div>
        </div>
</div>
</body>
</html>
