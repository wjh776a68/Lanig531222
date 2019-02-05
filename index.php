<?php session_start();
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=GBK">
        <link rel="icon" href="images/lanin_logo.ico" type="image/x-icon">
        <link rel="shortcut icon" href="images/lanin_logo.ico" type="image/x-icon">
        <title>Lanin Search</title>
        <style type="text/css">
        * {margin:0; padding:0;list-style:none;margin-left:auto;margin-right:auto;text-decoration: none;}
            div{


            }
            .typeitem{
              display:block;
              float:left;
              height:35%;
              width:15%;
              background:url("images/label.svg");
              background-size: 100% 100%;
              margin-left: 0.3%;
              margin-right: 0.3%;
            }
            .typeitem:hover{
              background:url("images/labelhover.svg");
              background-size: 100% 100%;
            }
            #blackdiv{
                left:25%;
                top:5%;
                height: 100%;
                width: 100%;
                display:block;
                image-rendering: crisp-edges;
                position: absolute;
                display:block;
                width:50%;
                height:70%;
            }

            #searchlist{
                left:25%;
                top:85%;
                image-rendering: crisp-edges;
                position: absolute;
                display:block;
                width:50%;
                height:70%;
            }

            .logo_head{
                top:0%;
                height:20%;
                position: absolute;
            }
            .logo-name{
                top:1%;
                height: 100%;
                width: 100%;
                display:block;
                image-rendering: crisp-edges;
                position: absolute;


                background:url(images/lanin_name.svg) repeat-x;
            }
            .logo-name:hover{
                top:0%;

                background:url(images/logo_name.svg) repeat-x;
            }
            #sign{
                position: absolute;
                display:block;
                top:5%;
                left:91%;
            }

            #sign2{
                position: absolute;
                display:block;
                top:1%;
                width:100%;
                height:99%;
            }

            input{
                display:block;
                text-align:center;
                position:absolute;
                left:20%;
                border-radius: 6px;
                bottom:15%;
                width:60%;
                height:5%;
                border-color: rgb(175, 195, 238);
            }
            input:hover{
                display:block;
                left:15%;

                bottom:14.6%;
                color:rgb(57, 57, 139);
                background:rgb(214, 224, 245);
                width:70%;
                height:6%;
            }
            input:hover #labellist{
                display:none;

            }
            #footer{
              position: absolute;
              background:rgb(105, 105, 238);
              bottom:-74%;
              left:5%;
              width:95%;
              height:6%;
              overflow: hidden;
            }
            #padd{
              position: absolute;
              left:0%;
              background:rgb(105, 105, 238);
              bottom:-74%;
              width:5%;
              height:6%;
            }
            .under{
              color: rgb(214, 224, 245);
              font-size: 18px;
              float:left;
              width: 15%;
              overflow: hidden;

            }
            .agree{

               border: 1% solid rgba(119, 120, 159, 0.5);
               position:absolute;
               width:5%;
               height:5.5%;
               left:81%;
               background: linear-gradient(to bottom, #fafaff 50%, #e8e8ff 50%) #f2f2ff;
               box-shadow: 0px 0px 1px #ccf;

            }
            .agree:active {
                box-shadow: inset -2px -2px 3px rgba(255, 255, 255, .6),
                inset 2px 2px 3px rgba(0, 0, 0, .6);
            }
            #labellist{
              left:25%;
              top:76.5%;

              image-rendering: crisp-edges;
              position: absolute;
              display:block;
              width:50%;
              height:3.5%;
              float:top;
            }
            #tabel{

              display:none;

            }
            #sign:hover #tabel{
              display:block;
              position:absolute;
              top:100%;
              left:0%;
              width:100%;
              height:40%;
              font-size: 10px;
              text-align: center;
              color: grey;
            }
            .menuitem{
              float:top;
              font-size:15px;
              display:block;
              text-align:center;
              border-radius: 2px;
              border-color: rgb(128,128,128);

              border-width: 2px;
    border-style: solid;
            }
            .menuitemhidden{
              display:none;


            }
            .menuitem:hover .menuitemhidden{
              display:block;
              font-size:15px;
              border-radius: 2px;
              border-color: rgb(211,211,211);
              height:70%;
              border-top-width: 2px;
              border-top-style: solid;
            }

        </style>
    </head>

    <body>
    <div>
      <!--  <img class="logo_head" src="images/lanin_logo.svg"> -->
      <div id="sign">
      <a href="<?php if(isset($_SESSION["RegistID"])){echo "information.php";}else{echo "account.php";} ?>"><img height="50" width="50" src="<?php if(isset($_SESSION["UserPic"])){echo $_SESSION["UserPic"];}else{echo "images/student.svg";} ?>"></a>

      <div id="tabel"><?php if(isset($_SESSION["RegistID"])){
        echo<<<Eof
         <a href="signout.php">Sign Out</a>
Eof;
      }else{echo " ";} ?></div>
      </div>
        <div id="blackdiv">



            <br>
            <i class="logo-name" width="100px" height="100px">
            </i>

            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <div id="sign2">
            </div>
        </div>

        <div id="labellist">

          <?php
            //链接数据库
            $conn = new mysqli("localhost:3306", "lanin", "Lanin2well","lanin");
            if (!$conn)
            {
              die('Could not connect database: ' . mysql_error());
            }


            $sql = "SELECT SearchType, PeopleUsage, ExtraURL, UsingRank FROM searchvartype";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // 输出数据
                echo "<ul>";
                while($row = $result->fetch_assoc()) {
                    echo "<li class=\"typeitem\" style=\"text-align:center;\">" . $row["SearchType"] . " </li>";
                    //  echo "id: " . $row["SearchType"]. " - Name: " . $row["PeopleUsage"]. " " . $row["ExtraURL"]. " " . $row["UsingRank"]. "<br>";
                  }
                echo "</ul>";
            } else {
                echo "Disconnected to the server,Please try later!";
            }

            $conn->close();
          ?>
        </div>
        <div style="top:77%">

          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

            <input type="text" name="searchbox">

            <input class="agree" id="sunset" type="submit" value="GO">
          </form>



        </div>

        <div id="searchlist">
          <br>
          <?php
          if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["searchbox"]!=null) {
            $conn = new mysqli("localhost:3306", "lanin", "Lanin2well","lanin");
            if (!$conn)
            {
              die('Could not connect database: ' . mysql_error());
            }
          //  $Step=1;
            $sql = "SELECT Name,ID FROM APPList";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
            // 输出数据


                while($row = $result->fetch_assoc()) {
                    if( $_POST["searchbox"]==$row["Name"]){

                       $thekey=$row["ID"];
                       break;
                    }
                }


                    //  $Step=1;
                $sql = "SELECT SoftwareRealName,SoftwareID,SoftwareIconPath,SoftwarePrice,SoftwareWebsite,SoftwareIntroduction,SoftwareLocalPath,SoftwareVersion FROM software_introduction";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {

                  while($row = $result->fetch_assoc()) {

                      if(isset($thekey) && $row["SoftwareID"]==$thekey){

                          echo "<div style=\"position:absolute;top:5%;left:15%;height:22%;width:100%;font-size:20px;color:blue;\"><div style=\"position:absolute;top:0%;left:40%;width:30%;height:60%;font-size:30px;color:orange;\"><p>$" . $row["SoftwarePrice"] . "</p></div><div style=\"position:absolute;top:0%;left:-15%;width:10%;height:60%;\"><img width=\"100%\" height=\"100%\" src=\"" . $row["SoftwareIconPath"] . "\"></div><p>" . $row["SoftwareRealName"] . "</p><p style=\"font-size:15px;color:black;\">" . $row["SoftwareIntroduction"] . "</p><a href=\"" . $row["SoftwareWebsite"] . "\"><p style=\"font-size:12px;color:green;float:bottom;\">" . $row["SoftwareWebsite"] . "</p></a><div style=\"position:absolute;left:60%;top:0%;\"><ul class=\"menuitem\" style=\"width:400%;width:100%;height:30%;\"><li name=\"softversion\"  style=\"background:white;\">Version</li>";
                          $tmp1=explode(";", $row["SoftwareVersion"]);

                          for($i=0;$i<count($tmp1);$i++){
                          echo "<a  class=\"menuitemhidden\" style=\"font-size:20px;\" href=\"recourse\APP/" . $row["SoftwareLocalPath"] . $tmp1[$i] . ".exe\"><li style=\"width:30%;height:50%;font-size:10px;background:white;\">" . $tmp1[$i] . "</li></a>";
                          }
                          echo "</ul></div></div>";
                          break;
                        //echo $row["ID"];
                      }
                  }
                }
            //}

              //  }
            }
            $conn->close();
            echo<<<Eof
             <style>
             #sign2{display:none;}
             .logo-name{display:none;}
             #blackdiv{display:none;}
             input{top:5%;}
             input:hover{top:4.5%;}
             #footer{bottom:0%;}
             #padd{bottom:0%;}
             #searchlist{top:15%;}
             #labellist{position:absolute;top:2%;}

             </style>
             <a href="index.php"><img style="position:absolute;top:-20%;left:-35%;" width="18%" height="18%" src="images\lanin_logo.svg"></a>
Eof;
          //  echo $_POST["searchbox"];
        }

          ?>
        </div>
           <!-- <img align="right" height=50 src="images/loading.svg"> -->
        <div id="padd">
            <br>
            <br>
        </div>
        <div id="footer">
          <div style="font-size:10px;"><br></div>
          <div class="under"><a href="about.php"> About us </a></div>
          <div class="under"><a href="contact.php"> Contact us </a></div>
          <div class="under"><a href="report.php"> Report a problem </a></div>
          <div class="under" style="float:right;width: 9%;">Lanin 2019</div>
          <div style="font-size:10px;"><br></div>



        </div>
    </div>


    </body>
</html>
