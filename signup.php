<?php
include("connection.php");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Sign Up</title>
  </head>
<link rel="stylesheet" href="signup.css">

<body>
  <div class="signup-box">
    <img class="can" src="milkcanlogo.png" alt="Logo" height="250" width="250">
    <button class="signup-button" onclick="document.getElementById('id01').style.display='block'">Sign Up</button>
  </div>


<div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
  <form class="modal-content" action="signup.php" method="POST" onsubmit=" return formValidation()" name="myForm">
    <div class="container">
      <h1>Sign Up</h1>
      <p>Please fill in this form to create an account.</p>
      <hr>
      <label for="email"><b>Email</b></label>
      <input type="text" placeholder="Enter Email" name="email">

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw">

      <label for="psw-repeat"><b>Confirm Password</b></label>
      <input type="password" placeholder="Confirm Password" name="psw-repeat">

      <label>
        <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
      </label>

      <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

      <div class="clearfix">
        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
        <button type="submit" class="signupbtn" name="submit">Sign Up</button>
      </div>
    </div>
  </form>
</div>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

</body>
</html>
<script>
    function formValidation()
    {
        let a = document.forms["myForm"]["email"].value;
        let b = document.forms["myForm"]["psw"].value;
        let c = document.forms["myForm"]["psw-repeat"].value;

        if(a == "")
        {
            alert('Email cannot be empty.!!!');
            return false;
        }

        if(b == "")
        {
            alert('Password cannot be empty.!!!');
            return false;
        }
        if(c == "")
        {
            alert('Confirm-Password cannot be empty.!!!');
            return false;
        }
        if(b != c)
        {
            alert('Both Passwords doesnt Match..!!!');
            return false;
        }
    }

</script>

<?php
error_reporting(0);
$email = $_POST['email'];
$pass = $_POST['psw'];
$query = "INSERT INTO acc_registration (`Email`,`Password`) VALUES ('$email', '$pass')";
$data = mysqli_query($conn, $query);
if($email != "" && $pass != "")
{
    if($data)
    {
        echo "<script>alert('Data inserted into the database...!!!!');</script>";
    }
    else
    {
        echo "<script>alert('Data NOT inserted into the database...!!!!');</script>";
    }
}
?>