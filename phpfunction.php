<?php

  $conn = mysqli_connect("localhost", "root", "5797@Puri", "auction");

  function highestbid($conn, $tablename){
    $highsql = "SELECT * FROM $tablename order by bidprice DESC limit 1";
    $result = $conn->query($highsql);
    $rows = $result->fetch_assoc();
    if($rows===null){
      echo "No bid is placed yet";
    }
    else{
      return $rows['bidprice'];
    }
  }


  function updatebid($conn, $tablename, $bidnumber, $username){
    $newbid =  $_REQUEST[$bidnumber];
    
    $sql = "UPDATE $tablename
    set bidprice=$newbid
    where username= '$username' ";

    $highestbid = highestbid($conn, $tablename);

    if($newbid> $highestbid){
      if(mysqli_query($conn, $sql)){
        echo "Your bid is successfully updated<br>";
      }
    }
    else{
      echo "Entered bid is lower than highest bid. Place a higher bid.";
    }
  }   

  
  function userdetailschecker($conn){
    $counter=0;
    $sql = "SELECT username, password FROM userdetails";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {              
        while($row = $result->fetch_assoc()) {
            if( $row["username"] === $_SESSION['username']){
                $counter=1;
                if( $row["password"] === $_SESSION['password']){
                    return true;  
                }
                else{
                  echo "<h1 style='margin-top:100px;'>Incorrect password!! Try again.</h1>";
                    return false;
                }
            }
        }
        if($counter===0){
          echo "<h1 style='margin-top:100px;'>Username not found!! Create your account first.</h1>";
          return false;
        }
    }
  }

  function getusername($conn){
    $username=$_SESSION['username'];
    $sql = "SELECT name FROM userdetails where username='$username' ";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    echo $row['name'];
  }
?>