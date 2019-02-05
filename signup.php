<?php
session_start();
if(isset($_SESSION["RegistID"]))
{
  header("location:information.php");
}


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

            text-align: center;
              display:block;
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
          .page2{
            display:none;
          }
          .page1{
            display:block;
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
        <a href="account.php"><img id="backward" height="50" width="50" src="images/back.svg"></a>
        <img id="scale2" class="grid" src="images/account-background-opposite.svg">
        <div class="grid" style="border-width: 2px;border-style: inset;border-color: initial;border-image: initial;">
              <img id="scale1" src="images/account-background.svg">
        </div>
        <!--<div class="grid">-->
        <div>



                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                      <div class="same">
                        <p class="page1" style="font-size:20px;position:absolute;left:5%;top:-30%;width:90%;height:20%;text-align: center;"> Please choose you Course</p>
                        <p class="page2" style="font-size:20px;position:absolute;left:5%;top:-30%;width:90%;height:20%;text-align: center;"> Finish question to continue</p>
                        <div style="position:absolute;left: 30%;top: 45%;width:20%;height:auto;text-align:center">
                            <input class="page2" style="position:absolute;width:250%;height:25%;top:70%;left:-70%;" type="text" name="QuestionAnswer">
                            <input class="page2" id="agree" type="submit" value="Finish">
                            <?php

                                  $conn = new mysqli("localhost:3306", "lanin", "Lanin2well","lanin");
                                  if (!$conn)
                                  {
                                    die('Could not connect database: ' . mysql_error());
                                  }

                                  $sql = "SELECT CourseName FROM course";
                                  $result = $conn->query($sql);
                                  if ($result->num_rows > 0) {

                                    while($row = $result->fetch_assoc()) {
                                      echo "<input class=\"page1\" style=\"width:200%;height:30%;\" type=\"submit\" value=\"" . $row["CourseName"] . "\" name=\"CourseA\">";
                                      echo "<br>";
                                    }
                                  }
                                  unset($result);
                                  unset($row);

                                  unset($sql);
                                  //$conn->close();
                                  echo "<br></div>";





                      if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        if (isset($_POST["QuestionAnswer"]) ==1 && $_POST["QuestionAnswer"]!=""){

                          if($_SESSION["QuestionAnswer"]==$_POST["QuestionAnswer"])
                          {
                            $_SESSION["QuestionFinish"]=1;

                            exit;
                          }else{
                            echo "wrong answer,please try again";
                            exit;
                          }
                        }elseif(isset($_POST["CourseA"])==1){
                            $_SESSION["CourseA"]=$_POST["CourseA"];
                            echo<<<Eof
                            <style>
                            .page1{
                              display:none;
                            }
                            .page2{
                              display:block;
                            }
                            #agree{
                              position:absolute;
                              top:70%;
                              width:70%;
                              height:30%;
                              left:180%;
                              display:block;
                            }
                            #agree:hover{

                              width:320%;
                              left:-70%;


                            }
                            </style>
Eof;

                            include("generatequestion.php");
                            $retarray=generatequestion($_POST["CourseA"],"1");
                            echo "<p>" . $retarray[0] ."</p><br>";
                            $_SESSION["QuestionAnswer"]=$retarray[1];
                          }
                        }
                         ?>

                      </div>
                    </form>
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
