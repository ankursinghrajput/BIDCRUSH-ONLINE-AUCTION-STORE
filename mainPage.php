<?php
session_start();
include 'phpfunction.php'
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  
  <title>BidCrush | Online Bidding Site</title>

  <link rel="icon" href="images/logo.png" />

  <link rel="stylesheet" href="mainPage.css" />

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet" />

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css"
  integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">

  <script>
      function timer(tag, bidend) {
      var countDownDate = new Date(bidend).getTime();
      var now = new Date().getTime();
      var timeleft = countDownDate - now;
          
      var days = Math.floor(timeleft / (1000 * 60 * 60 * 24));
      var hours = Math.floor((timeleft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      var minutes = Math.floor((timeleft % (1000 * 60 * 60)) / (1000 * 60));
      var seconds = Math.floor((timeleft % (1000 * 60)) / 1000);
      document.getElementById(tag).innerHTML = days + "d " + hours + "h " +  minutes + "m " + seconds + "s ";
      }
  </script>
    
</head>

<body>
  <center>
  <?php
    if(isset($_POST['login']))
      { 
        $_SESSION['username'] = $_POST['loginusername'];
        $_SESSION['password'] = $_POST['loginpassword'];
        $_SESSION['showDivFlag']=userdetailschecker($conn);  
      } 
    ?>
  </center>

<section id="results" <?php if ($_SESSION['showDivFlag']===false){?>style="display:none"<?php } ?>>
  <section class="header">
    <nav>
      <img src="images/logo.png" alt="logo"/>
      <div class="logo-name">BidCrush</div>
      <div id="mySidebar" class="sidebar nav-link">
        <ul>
          <li><a href="#home">HOME</a></li>
          <li><a href="#products">PRODUCTS</a></li>
          <li><a href="#contact">CONTACT</a></li>
          <li><a id="userBox" href="#contact"><?php echo $_SESSION['username']?></a></li>
        </ul>
      </div>
    </nav>

    <div id="home">
      <div class="about">
        <h1>Hi, <?php getusername($conn)?></h1>
        <br>
        <h2>About us</h2>
        <p>
          Through honesty, integrity and excellence, we provide expert service and consideration to our clients while
          providing an enjoyable environment for our clients, customers and employees.
        </p>
      </div>
      <div class="home-img">
        <img src="images/homeimg.png" alt="auction">
      </div>
    </div>
  </section>


  <div id="products">
    <section class="items-sec-1">
      <div class="item-container">
        <div class="item-img">
          <div class="item-img-inner">
            <div class="item-img-front">
              <img src="images/item1.jpeg" alt="ancient clock" height="310px" width="350px">
            </div>
            <div class="item-img-back">
              <h1>Item Description</h1>
              <p>Fashion Retro and high quality pocket watch</pre>
              <h1>Features</h1>
              <pre>Gender:  Unisex</pre>
              <pre>Thickness:  about 1.8cm</pre>
              <pre>Diameter:  about 4.5cm</pre>
              <pre>Color:  Bronze silver Golden Black</pre>
              <pre>Total Length of Chain:  about 38cm</pre>
            </div>
          </div>
        </div>
        <div class="item-bid">
          <div class="bidinfo">
            <br><br>
            <h3>Antique Steampunk Vintage Roman Numerals Quartz Pocket Watch Multicolor Case Necklace Pendant Clock
              Chain
              Men's Women</h3>
            <br>
            <pre>Listing id: 76328  |  item no.: #1</pre>
          </div>
          <br><br>
          <div>
            <form action="mainPage.php" method="POST" class="bidupdate">
              <input type="text" name="enteredbid1"class="input-bid" placeholder="Place your Bid">
              <button type="submit" name="updatebid1" class="btn">.</button><br>
              <?php    
                
                if(isset($_POST['updatebid1']))
                  {
                    updatebid($conn, 'item1', 'enteredbid1', $_SESSION['username']);
                  } 

                  $highestbid=highestbid($conn, 'item1');
                  if($highestbid!=null){
                  echo  "<br><pre><h3>Current bid                   <i class='fas fa-rupee-sign'></i> $highestbid</h3></pre>";
                  }
              ?>
            </form>
          </div>
        </div>
        <div class="sidebox">
          <i class="far fa-clock fa-4x"></i>
          <br><br>
          <p id="item1timer"></p>    
          <script>
            setInterval( function() { timer('item1timer', 'Jul 25, 2021 16:37:52'); }, 1000 );
          </script>
          <br><br>
          <h5>Ends Jul 25, 2021 at 16:37:52  </h5>
          <br>
          <hr><br>
          <h5>Shipping & Handling</h5>
          <br>
          <h5>$0.00 (5-7 business days)</h5>
        </div>
      </div>
    </section>

    <section class="items-sec-2">
      <div class="item-container">

        <div class="item-img">
          <div class="item-img-inner">
            <div class="item-img-front">
              <img src="images/item2.jpeg" alt="ancient clock" height="310px" width="350px">
            </div>
            <div class="item-img-back">
              <h1>Item Description</h1>
              <p>High quality incense burner for decoration</pre>
              <h1>Features</h1>
              <pre>Gender:  Unisex</pre>
              <pre>Design:  Ancient</pre>
              <pre>Color:  Golden Black</pre>
              <pre>Thickness:  about 1.8cm</pre>
              <pre>Texture:  Fish picture art</pre>
            </div>
          </div>
        </div>
        <div class="item-bid">
          <div class="bidinfo">
            <br><br>
            <h3>Craftsman antique copper incense burner pure copper home decoration household zen xuande stove plate
              sandalwood burner carving</h3>
            <br>
            <pre>Listing id: 282409  |  item no.: #2</pre>
            
            
          </div>
          <br><br>
          <div>
            <form action="mainPage.php" method="POST">
              <input type="text" name="enteredbid2"class="input-bid" placeholder="Place your Bid">
              <button type="submit"  class="btn" name="updatebid2">.</button><br>
            </form>
            <?php    
                if(isset($_POST['updatebid2']))
                  {
                      updatebid($conn, 'item2', 'enteredbid2', $_SESSION['username']);
                  } 
                  $highestbid=highestbid($conn, 'item2');
                  if($highestbid!=null){
                  echo  "<br><pre><h3>Current bid                   <i class='fas fa-rupee-sign'></i> $highestbid</h3></pre>";
                  }
              ?>
          </div>
        </div>
        <div class="sidebox">
          <i class="far fa-clock fa-4x"></i>
          <br><br>
          <p id="item2timer"></p>
          <script>
            setInterval( function() { timer('item2timer', 'Jul 21, 2021 11:32:29'); }, 1000 );
          </script>
          <br><br>
          <h5>Ends Jul 21, 2021 at 11:32:29 </h5>
          <br>
          <hr><br>
          <h5>Shipping & Handling</h5>
          <br>
          <h5>$0.00 (5-7 business days)</h5>
        </div>
      </div>
    </section>

    <section class="items-sec-3">
      <div class="item-container">
        <div class="item-img">
          <div class="item-img-inner">
            <div class="item-img-front">
              <img src="images/item3.jpeg" alt="ancient clock" height="310px" width="350px">
            </div>
            <div class="item-img-back">
              <h1>Item Description</h1>
              <p>Handmade item with hook closure</p>
              <h1>Features</h1>
              <pre>Gender:  Men</pre>
              <pre>Material:  Brass</pre>
              <pre>Bracelet width: 6mm</pre>
              <pre>Bracelet length:  21cm</pre>
              <pre>Style: celtic, can be personalised</pre>
            </div>
          </div>
        </div>
        <div class="item-bid">
          <div class="bidinfo">
            <br><br>
            <h3>Viking bracelet made of paracord, Celtic knots and original beads made of brass with the image of
              ancient Scandinavian patterns. Mens style</h3>
            <br>
            <pre>Listing id: 10728  |  item no.: #3</pre>
          </div>
          <br><br>
          <div>
            <form action="mainPage.php" method="POST">
              <input type="text" name="enteredbid3"class="input-bid" placeholder="Place your Bid">
              <button type="submit" name="updatebid3" class="btn">.</button><br>     
            </form>
            <?php    
                if(isset($_POST['updatebid3']))
                  {
                      updatebid($conn, 'item3', 'enteredbid3', $_SESSION['username']);
                  } 
                  $highestbid=highestbid($conn, 'item3');
                  if($highestbid!=null){
                  echo  "<br><pre><h3>Current bid                   <i class='fas fa-rupee-sign'></i> $highestbid</h3></pre>";
                  }
              ?>
          </div>
        </div>
        <div class="sidebox">
          <i class="far fa-clock fa-4x"></i>
          <br><br>
          <p id="item3timer"></p>
          <script>
            setInterval( function() { timer('item3timer', 'Jul 22, 2021 06:09:06'); }, 1000 );
          </script>
          <br><br>
          <h5>Ends Jul 22, 2021 at 06:09:06 </h5>
          <br>
          <hr><br>
          <h5>Shipping & Handling</h5>
          <br>
          <h5>$0.00 (5-7 business days)</h5>
        </div>
      </div>
    </section>

    <section class="items-sec-4">
      <div class="item-container">
        <div class="item-img">
          <div class="item-img-inner">
            <div class="item-img-front">
              <img src="images/item4.jpg" alt="ancient clock" height="310px" width="350px">
            </div>
            <div class="item-img-back">
              <h1>Item Description</h1>
              <p>As per Malabar Gold and Diamonds store policy</pre>
              <h1>Features</h1>
              <pre>Color:  Golden</pre>
              <pre>Stone: 	Diamond</pre>
              <pre>Item Width:	18 Millimeters</pre>
              <pre>Item Length:	 18 Millimeters</pre>
              <pre>Minimum Total Metal Weight:  2 Grams</pre>
            </div>
          </div>
        </div>
        <div class="item-bid">
          <div class="bidinfo">
            <br><br>
            <h3>Malabar Gold & Diamonds 22k (916) 2 gm Yellow Gold Coin</h3>
            <br>
            <pre>Listing id: 67543  |  item no.: #4</pre>
          </div>
          <br><br>
          <div>
            <form action="mainPage.php" method="POST">
              <input type="text" name="enteredbid4" class="input-bid" placeholder="Place your Bid">
              <button type="submit" name="updatebid4" class="btn">.</button><br>
            </form>
            <?php    
                if(isset($_POST['updatebid4']))
                  {
                      updatebid($conn, 'item4', 'enteredbid4', $_SESSION['username']);
                  } 
                  $highestbid=highestbid($conn, 'item4');
                  if($highestbid!=null){
                  echo  "<br><pre><h3>Current bid                   <i class='fas fa-rupee-sign'></i> $highestbid</h3></pre>";
                  }
              ?>
          </div>
        </div>
        <div class="sidebox">
          <i class="far fa-clock fa-4x"></i>
          <br><br>
          <p id="item4timer"></p>
          <script>
            setInterval( function() { timer('item4timer', 'Jul 19, 2021 12:39:12'); }, 1000 );
          </script>
          <br><br>
          <h5>Ends Jul 19, 2021 at 12:39:12 </h5>
          <br>
          <hr><br>
          <h5>Shipping & Handling</h5>
          <br>
          <h5>$0.00 (5-7 business days)</h5>
        </div>
      </div>
    </section>
  </div>


  <div id="contact">
    <a href=""><i class="fabn fab fa-facebook-f fa-2x"></i></a>
    <a href=""><i class="fabn fab fa-instagram fa-2x"></i></a>
    <a href=""><i class="fabn fab fa-twitter fa-2x"></i></a>
    <a href=""><i class="fabn far fa-envelope fa-2x"></i></a>
    <h4 class="copyright">© Copyright 2021 BidCrush</h4>
  </div>
</section>
</body>
</html>