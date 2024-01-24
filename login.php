<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign In - Bid Crush</title>

  <link rel="icon" href="images/logo.png">

  <link rel="stylesheet" href="css/loginstyle.css">

  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
</head>

<body>

  <div id="wrapper">
    <div id="left">

      <div id="signin">
        <div class="quote">
          <h1>
            It creates an AUCTION TYPE of environment.
          </h1>
        </div>

        <form action="mainPage.php" method="POST">
          <div>
            <label for="username">Username</label>
            <input type="text" class="text-input" name="loginusername" placeholder="Username should be unique">
          </div>
          <div>
            <label for="password">Password</label>
            <input type="password" class="text-input" name="loginpassword" placeholder="type your password here">
          </div>
          <button type="submit"  class="primary-btn" name="login">Login</button>
        </form>
        
      </div>
      <footer id="main-footer">
        <p>Copyright &copy; 2021, BidCrush All Rights Reserved</p>
        <div>
          <a href="#">Terms of Use</a> | <a href="#">Privacy Policy</a>
        </div>
      </footer>
    </div>


    <div id="right">
      <div id="showcase">
        <div class="container">
          <img height="550px" src="images/right_background.jpg" alt="company"
              style="width:100%;">
          <div class="content">
            <h1>New here?</h1>
            <h2>Create your account</h2>
            <form action="login.php" method="POST" class="createform">
              
              <div>
                <label for="username">Username</label> <br>
                <input type="text" class="text-input" name="username">
              </div>
              <div>
                <label for="password">Password</label> <br>
                <input type="password" class="text-input" name="password">
              </div>
              <div>
                <label for="name">Name</label> <br>
                <input type="text" class="text-input" name="name">
              </div>
              <div>
                <label for="email">Email ID</label> <br>
                <input type="email" class="text-input" name="email">
              </div>

              <button type="submit"  class="create-btn" name="createaccount">Create account</button>
            </form>


            <center>
          <?php
          $conn = mysqli_connect("localhost", "root", "5797@Puri", "auction");
          function createaccount($conn){
              // Check connection
              if($conn === false){
                  die("ERROR: Could not connect. " 
                      . mysqli_connect_error());
              }

              $username =  $_REQUEST['username'];
              $password = $_REQUEST['password'];
              $name = $_REQUEST['name'];
              $email = $_REQUEST['email'];   
              
              if($username==='' or $password==='' or $name==='' or $email===''){
                echo "Information is missing";
              }
              else{
                $sql = "INSERT into userdetails values ('$username', '$password', '$name', '$email')";
                if(mysqli_query($conn, $sql)){
                  echo "Account created successfully! Please login.";
                  $sql1 = "INSERT into item1 values ('$username', 0)";
                  $sql2 = "INSERT into item2 values ('$username', 0)";
                  $sql3 = "INSERT into item3 values ('$username', 0)";
                  $sql4 = "INSERT into item4 values ('$username', 0)";
                  mysqli_query($conn, $sql1);
                  mysqli_query($conn, $sql2);
                  mysqli_query($conn, $sql3);
                  mysqli_query($conn, $sql4);
                }
                else{
                  echo "Username already exist";
                }
              }
          }
          // Close connection
          if(isset($_POST['createaccount']))
            {
              createaccount($conn);
            } 
            
          mysqli_close($conn);
          ?>
        </center>



          </div>
        </div>
      </div>
    </div>
  </div>

  

</body>

</html>