<?php
include('connection.php');
?>

<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login to find your account</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="login.css">

</head>

<body  style="background-color: lightblue;">

  <div class="container">
    <form method="POST">
      <div class="row">
        <h2 style="text-align:center">Login with Social Media or Manually</h2>
        <div class="vl">
          <span class="vl-innertext">or</span>
        </div>

        <div class="col">
          <a href="#" class="fb btn">
            <i class="fa fa-facebook fa-fw"></i> Login with Facebook
          </a>
          <a href="#" class="twitter btn">
            <i class="fa fa-twitter fa-fw"></i> Login with Twitter
          </a>
          <a href="#" class="google btn"><i class="fa fa-google fa-fw">
            </i> Login with Google+
          </a>
        </div>

        <div class="col">
          <div class="hide-md-lg">
            <p>Or Sign in manually:</p>
          </div>

          <input type="text" name="username" placeholder="Username" required>
          <input type="password" name="password" placeholder="Password" required>
          <input type="submit" value="Login" name="submit">
          
        </div>

      </div>
    </form>
    <br>
    <div class="bottom-container">
      <div class="row">
        <div class="col">
          <a href="signup.html" style="color:white" class="btn">Sign
            up</a>
        </div>
        <div class="col">
          <a href="signup.html" style="color:white" class="btn">Forgot password?</a>
        </div>
      </div>
    </div>

  </div>


</body>

</html>

<?php
error_reporting(0);
$user = $_POST['username'];
$pass = $_POST['password'];

if(isset($_POST['submit']))
{
    $q1 = "SELECT * FROM acc_registration WHERE Email = '$user' && Password = '$pass'";
    $data = mysqli_query($conn, $q1);
    $total = mysqli_num_rows($data);
    // $qwerty = mysqli_fetch_assoc($data);
    if($total == 1)
    {
        // $qwerty = mysqli_fetch_assoc($data);
        echo "<script>alert('Login Successfull...!!!');</script>";
        header('location:index.html');
    }
    else
    {
        echo "<script>alert('Login failed...!!!!');</script>";
    }
}
?>