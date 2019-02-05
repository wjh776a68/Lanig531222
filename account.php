<?php session_start();
?>
<!doctype html>
<html>
    <head>
      <meta charset="utf-8">
      <meta http-equiv="Content-Type" content="text/html; charset=GBK">
      <link rel="icon" href="images/lanin_logo.ico" type="image/x-icon">
      <link rel="shortcut icon" href="images/lanin_logo.ico" type="image/x-icon">
      <title>Login Page</title>
      <style type="text/css">
      *{margin:0; padding:0;list-style:none;margin-left:auto;margin-right:auto;text-decoration: none;}
      #cover{
          display:none;
      }
      #mid{
          display:block;
      }
          .same{
            position:absolute;
            left:35%;//43.75%;
            top:35%;
            width:30%;//13%;
            height:20%;
            overflow-y: hidden;
            text-align: center;
          }

          .grid{
            position:absolute;
            left:31.5%;
            top:20%;
            width:37%;
            height:50%;
            border-radius: 1%;

          }
          #backward{
            position:absolute;
            left:90%;
            top:5%;
          }
          #scale1{
            display:block;
            width:100%;
            height:100%;
            border-radius: 1%;
          }
          .grid:hover{
            width:0%;
            height:0%;
            border-radius: 1%;
          }
          .agree{
            position:absolute;
            top:68%;
            width:15%;
            height:18%;
            left:60%;
            display:none;


            //border-image: url();
          }
          .agree:hover{
            position:absolute;
            width:55%;//22.2%;//120%;
            left:20%;//38.75%;
            top:68%;


            //border-image: url();
          }
          .inputscale{
            position:absolute;
            width:45%;//18.5%;//100%;
            height:15%;//3%;//15%;
            left:25%;//38.75%;//-13%;
            top:50%;
            text-align: center;
          }
          .same:hover .agree{
              display:block;
          }

          #footer{
            position: absolute;
            background:rgb(105, 105, 238);
            bottom:0%;
            left:5%;
            width:95%;
            height:6%;
          }
          #padd{
            position: absolute;
            left:0%;
            background:rgb(105, 105, 238);
            bottom:0%;
            width:5%;
            height:6%;
          }
          .under{
            color: rgb(214, 224, 245);
            font-size: 18px;
            float:left;
            width: 15%;
            overflow-y: hidden;
          }
          button:active #cover{

                display:block;
          }
          button:active #mid{display:none;}
      </style>
    </head>
    <body>
        <a href="index.php"><img id="backward" height="50" width="50" src="images/back.svg"></a>
        <img id="scale2" class="grid" src="images/account-background-opposite.svg">
        <div class="grid" style="border-width: 2px;border-style: inset;border-color: initial;border-image: initial;">
              <img id="scale1" src="images/account-background.svg">
        </div>
        <!--<div class="grid">-->
        <div>



                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                      <div class="same" id="mid">
                        <p style="font-size:25px;"> Your Username and Password</p>
                        <input class="inputscale" type="text" name="Username" placeholder="Username">

                          <input class="agree" style="width:45%;height:15%;left:20%;" type="text" name="Password" placeholder="Password">
                          <input class="agree" type="submit" value="Login">

                      </div>

        </div>



        <?php

      //  STATIC $Step = 0;
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
          $conn = new mysqli("localhost:3306", "lanin", "Lanin2well","lanin");
          if (!$conn)
          {
            die('Could not connect database: ' . mysql_error());
          }
        //  $Step=1;
          $sql = "SELECT Username, Formula, RegistDate,UserPic, LastLoginDate,money, RegistID FROM laninid";
          $result = $conn->query($sql);



              if ($result->num_rows > 0) {
              // 输出数据


                  while($row = $result->fetch_assoc()) {
                      if( $_POST["Username"]==$row["Username"] && $_POST["Password"]==$row["Formula"]){

                        $_SESSION["RegistID"]=$row["RegistID"];
                        $_SESSION["Username"]=$row["Username"];
                        $_SESSION["money"]=$row["money"];
                        $_SESSION["UserPic"]=$row["UserPic"];

                        header("location:index.php");
                        exit;
                        break;


                      }else{
                            $tmp=<<<Eof
                            <div style="position:absolute;left: 40%;top: 55%;width:20%;text-align:center">
                              <p>Please check your ID again!</p>
                                <br>
                              <a href="dealproblem.php">Need help?</a>
                            </div>
Eof;
                            echo $tmp;
                      }
                  }
              }

        //  } else {
        //      echo "Disconnected to the server,Please try later!";
        //  }

          $conn->close();
          }

        ?>

        <div id="padd">
          <br>
          <br>
        </div>
        <div id="footer">
          <div style="font-size:10px;"><br></div>
          <div class="under"><a href="about.php"> About us </a></div>
          <div class="under"><a href="contact.php"> Contact us </a></div>
          <div class="under"><a href="report.php"> Report a problem </a></div>
          <div class="under" style="float:right;width: 9%;">Lanin 2018-2019</div>
          <div class="under" style="float:right;width: 8%;"><a href="signup.php"> Signup </a></div>
          <div style="font-size:10px;"><br></div>



        </div>
        <!--</div>-->
    </body>

</html>
