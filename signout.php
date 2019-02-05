<?php session_start();
?>
<!doctype html>
<html>
    <head>
      <meta charset="utf-8">
      <meta http-equiv="Content-Type" content="text/html; charset=GBK">
      <link rel="icon" href="images/lanin_logo.ico" type="image/x-icon">
      <link rel="shortcut icon" href="images/lanin_logo.ico" type="image/x-icon">
      <title>SignOut Page</title>
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
          }
          .grid:hover{
            width:0%;
            height:0%;
          }
          .agree{
             position:absolute;
             width:15%;//3.7%;//20%;
             height:20%;//4%;//20%;
             left:60%;//57.25%;
             top:68%;

          }
          .agree:hover{
            position:absolute;
            width:55%;//22.2%;//120%;
            left:20%;//38.75%;
            top:68%;
          }
          .inputscale{
            position:absolute;
            width:45%;//18.5%;//100%;
            height:15%;//3%;//15%;
            left:25%;//38.75%;//-13%;
            top:50%;
          }
          .inputscale-1{
            position:absolute;
            width:45%;//18.5%;//100%;
            height:15%;//3%;//15%;
            left:20%;//38.75%;//-13%;
            top:68%;
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



                  
                      <div class="same" id="mid">
                        <?php
                        session_destroy();
                        echo<<<Eof
                         <p style="font-size:25px;"> You has been signout.</p>
                         <div style="position:absolute;left: 40%;top: 55%;width:20%;text-align:center">

                             <br>
                           <a href="account.php">login again</a>
                         </div>
Eof;
                         ?>

                      </div>

        </div>

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
          <div style="font-size:10px;"><br></div>



        </div>
        <!--</div>-->
    </body>

</html>
