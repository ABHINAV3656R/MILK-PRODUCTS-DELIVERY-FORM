<?php
include('connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="contact.css"> 
</head>
<body> 
    <div class="container">
        <h1 class="contact">Contact Form</h1>
        <p>Please fill all the fields.</p>

        <form action="contact.php" method="POST">
            <p class="bold">
                Your Name:<br>
                <input type="text" name="uname" required placeholder="Your full name" />
            </p>
            <p class="bold">
                Your Email:<br>
                <input type="email" name="email" required placeholder="Enter valid email address" />
            </p>
            <p class="bold">
                Message:<br>
                <textarea name="msg" cols="50" rows="5" required></textarea>
            </p>
            <p class="bold">
                Subject:<br>
                <input type="text" name="subject" required placeholder="Subject of your message" />
            </p>
            <br>
            <input type="submit" value="Send" class="bold" name="submit">
        </form>
    </div>
</body>
</html>

<?php

if(isset($_POST['submit']))
{
    $namee = $_POST['uname'];
    $email = $_POST['email'];
    $msg = $_POST['msg'];
    $sub = $_POST['subject'];

    if($namee != "" && $email != "" && $msg != "" && $sub != "")
    {
        $query = "INSERT INTO contact_messages (`Uname`, `email`, `message`, `subject`) VALUES ('$namee', '$email', '$msg', '$sub')";

        $dd = mysqli_query($conn, $query);

        if($dd)
        {
            echo "<script>alert('Data Submitted');</script>";
        }
    }
}
?>
