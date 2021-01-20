
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Welcome to my page</title>
  </head>
  <body>
<table>
<tr><center><img src="2.jpeg" alt="2"></center></tr>

<?php
$conn = mysqli_connect('localhost' , 'Amjad' , 'Amjad123', 'Player') or die (mysqli_connect_error());
  ?>
  <tr>
  <form method="get" action="#">
  <table>
  <tr><td colspan="2"><center> <h1>Compare players</h1></td></tr>
  <tr><td><b>Enter 1st player's name: </b> : </td><td><input type="text" name="player1"  /></td></tr>
  <tr><td><b>Enter 2nd player's name: </b></td><td><input type="text" name="player2" /></td></tr>
  <tr><td colspan="2"><center> <input type="submit" name="comparebtn" value="Compare!" /></td></tr>
  </table>
</tr>
<br>


  <?php
  //$name1 = $_GET['player1'];
  //$name2 = $_GET['player2'];
  //function compare(){
  $name1 = $_GET['player1'];
  $a = "%$name1%";
  $result1 = mysqli_query($conn , "SELECT * FROM player_table WHERE name LIKE '$a'");
  $rows1 = mysqli_num_rows($result1);
  while ($row = mysqli_fetch_assoc($result1)){
      $p1id =  $row['pid'];
      $p1name =  $row['name'];
      $p1team =  $row['team'];
      $p1goals = $row['goals'];
      $p1succdrib = $row['succ_dribb'];
      $p1tackles = $row['tackles'];
      $p1assists = $row['assists'];
      $p1accpasses = $row['acc_passes'];
      $p1rating = $row['rating'];
    }

    $name2 = $_GET['player2'];
    $b = "%$name2%";
    $result2 = mysqli_query($conn , "SELECT * FROM player_table WHERE name LIKE '$b'");
    $rows2 = mysqli_num_rows($result2);
    while ($row = mysqli_fetch_assoc($result2)){
      $p2id =  $row['pid'];
      $p2name =  $row['name'];
      $p2team =  $row['team'];
      $p2goals = $row['goals'];
      $p2succdrib = $row['succ_dribb'];
      $p2tackles = $row['tackles'];
      $p2assists = $row['assists'];
      $p2accpasses = $row['acc_passes'];
      $p2rating = $row['rating'];
      }

if(isset($_GET['comparebtn'])){
      // if (($name1 = " ") or ($name2 = " "))
      // {echo "<font color='#FF0000'>One Or more fields are empty, try again please!!</font>";}
      //  echo $rows1;echo $rows2;
        if (($rows1 > 0) and ($rows2 > 0)){
        echo "<table><tr>";
        echo "<td><b>First player : </b></td>";echo "<td>";echo $p1name;echo "</td>";
        echo "<td><b> Plays for: </b></td>";echo "<td>";echo $p1team;echo "</td>";
        echo "<td><b> Goals scored: </b></td>";
        if ($p1goals>=$p2goals){echo "<td><font color='#00CC00'>"; echo $p1goals; echo "</font></td>";}
        else {echo "<td><font color='#FF0000'>"; echo $p1goals; echo "</font></td>";}
        echo "<td><b>   Successfull dribbles: </b></td>";
        if ($p1succdrib>=$p2succdrib){echo "<td><font color='#00CC00'>"; echo $p1succdrib; echo "</font></td>";}
        else {echo "<td><font color='#FF0000'>"; echo $p1succdrib; echo "</font></td>";}
        echo "<td><b>   Assists: </b></td>";
        if ($p1assists>=$p2assists){echo "<td><font color='#00CC00'>"; echo $p1assists; echo "</font></td>";}
        else {echo "<td><font color='#FF0000'>"; echo $p1assists; echo "</font></td>";}
        echo "<td><b>   Accurate Passes (%): </b></td>";
        if ($p1accpasses>=$p2accpasses){echo "<td><font color='#00CC00'>"; echo $p1accpasses; echo "</font></td>";}
        else {echo "<td><font color='#FF0000'>"; echo $p1accpasses; echo "</font></td>";}
        echo "<td><b>   Rating: </b></td>";
        if ($p1rating>=$p2rating){echo "<td><font color='#00CC00'>"; echo $p1rating; echo "</font></td>";}
        else {echo "<td><font color='#FF0000'>"; echo $p1rating; echo "</font></td>";}
        echo "<br></tr>";

        echo "<tr>";
        echo "<td><b>Second player : </b></td>";echo "<td>"; echo $p2name;echo "</td>";
        echo "<td><b> Plays for: </b></td>";echo "<td>"; echo $p2team; echo "</td>";
        echo "<td><b> Goals scored: </b></td>";
        if ($p2goals>=$p1goals){echo "<td><font color='#00CC00'>"; echo $p2goals; echo "</font></td>";}
        else {echo "<td><font color='#FF0000'>"; echo $p2goals; echo "</font></td>";}
        echo "<td><b>   Successfull dribbles: </b></td>";
        if ($p2succdrib>=$p1succdrib){echo "<td><font color='#00CC00'>"; echo $p2succdrib; echo "</font></td>";}
        else {echo "<td><font color='#FF0000'>"; echo $p2succdrib; echo "</font></td>";}
        echo "<td><b>   Assists: </b></td>";
        if ($p2assists>=$p1assists){echo "<td><font color='#00CC00'>"; echo $p2assists; echo "</font></td>";}
        else {echo "<td><font color='#FF0000'>"; echo $p2assists; echo "</font><td>";}
        echo "<td><b>   Accurate Passes (%): </b></td>";
        if ($p2accpasses>=$p1accpasses){echo "<td><font color='#00CC00'>"; echo $p2accpasses; echo "</font></td>";}
        else {echo "<td><font color='#FF0000'>"; echo $p2accpasses; echo "</font></td>";}
        echo "<td><b>   Rating: </b></td>";
        if ($p2rating>=$p1rating){echo "<td><font color='#00CC00'>"; echo $p2rating; echo "</font></td>";}
        else {echo "<td><font color='#FF0000'>"; echo $p2rating; echo "</font></td>";}
        echo "</tr></table>";

      }
        else {
          echo "<font color='#FF0000'>Wrong entries, please try again!!</font>";}

//if(array_key_exists('comparebtn', $_GET)) {compare(); }
}


?>
<br><br><br><br><br>
<tr><b>The results are provided by: <a href="https://www.sofascore.com/">SofaScore</a></b></tr>
<br>
<tr><img src="SofaScore.jpeg" alt="sofa"></tr>
</table>
  </body>
  </html>
