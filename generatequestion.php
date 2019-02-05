<?php
function generatequestion($lesson,$difficulty){
      $conn = new mysqli("localhost:3306", "lanin", "Lanin2well","lanin");
      if (!$conn)
      {
          die('Could not connect database: ' . mysql_error());
      }
      $sql = "SELECT QNum,CourseName FROM course";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {

        while($row = $result->fetch_assoc()) {
            if($lesson==$row["CourseName"]){
                $random=rand(0,$row["QNum"]-1);
            }
        }
      }
      unset($result);
      unset($row);
      unset($sql);

      $sql = "SELECT QID,Q,VAR,A,AChoice,Difficulty,ValueMoney FROM " . $lesson;
      $result = $conn->query($sql);

      //  echo $random;
      $varmin=0;
      $varmax=10000;
      if ($result->num_rows > 0) {

        while($row = $result->fetch_assoc()) {

          if($random==$row["QID"]){
            $vararray=explode(",", $row["VAR"]);
            $QAppearance=$row["Q"];
            STATIC $AAppearance;
            $AAppearance=$row["A"];
            for($i=0;$i<count($vararray);$i++){
              $temporarynumber=rand($varmin,$varmax);
              $QAppearance=str_replace($vararray[$i],$temporarynumber,$QAppearance);
              $AAppearance=str_replace($vararray[$i],$temporarynumber,$AAppearance);
            }
            unset($vararray);
            include('formulatoresult.php');
            $AAppearance=formula2result($AAppearance);
            //echo "<p>" . $AAppearance ."</p>";
            break;
          }
        }

        unset($result);
        unset($row);
        unset($sql);
      }

      $conn->close();
      $retarray=array(0=>$QAppearance,1=>$AAppearance);
      return $retarray;
}
?>
