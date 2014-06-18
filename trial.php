<?php
require 'connect.php';

$date='2009-04-01';
$t1='India';
$t2='Australia';
$sname = 'Wankhede Stadium';
$scountry='India';


//wp5
$query = "Select count(*) as tot from cricket1 where (team1='$t1' AND team2='$t2') OR (team2='$t1' AND team1='$t2')";
$result = mysqli_query($con,$query);
$row = mysqli_fetch_array($result);
$den=$row['tot'];
//echo $den;
//echo "<br>";
$query = "Select count(*) as tot from cricket1 where ((team1='$t1' AND team2='$t2') OR (team2='$t1' AND team1='$t2')) AND winteam='$t1'" ;
$result = mysqli_query($con,$query);
$row = mysqli_fetch_array($result);
$num=$row['tot'];
//echo $num;
//echo "<br>";
$wp5 = probw($num,$den);
$lp5 = probl($num,$den);
//echo $wp1;
//echo "<br>";
//echo $lp1;
//echo "<br>";


//wp6
$query = "Select count(*) as tot from cricket1 where ((team1='$t1' AND team2='$t2') OR (team2='$t1' AND team1='$t2')) AND start_date >= '$date'";
$result = mysqli_query($con,$query);
$row = mysqli_fetch_array($result);
$den=$row['tot'];
//echo $den;
//echo "<br>";
$query = "Select count(*) as tot from cricket1 where ((team1='$t1' AND team2='$t2') OR (team2='$t1' AND team1='$t2')) AND winteam='$t1' AND start_date >= '$date'" ;
$result = mysqli_query($con,$query);
$row = mysqli_fetch_array($result);
$num=$row['tot'];
//echo $num;
//echo "<br>";
$wp6 = probw($num,$den);
$lp6 = probl($num,$den);
/*echo $wp6;
echo "<br>";
echo $lp6;
echo "<br>";
*/



//wp8
$query = "Select count(*) as tot from cricket1 where (team1='$t1' OR team2='$t1' ) AND gname = '$sname'";
$result = mysqli_query($con,$query);
$row = mysqli_fetch_array($result);
$den=$row['tot'];
//echo $den;
//echo "<br>";
$query = "Select count(*) as tot from cricket1 where (team1='$t1' OR team2='$t1') AND winteam='$t1' AND gname = '$sname'" ;
$result = mysqli_query($con,$query);
$row = mysqli_fetch_array($result);
$num=$row['tot'];
//echo $num;
//echo "<br>";
$wp7 = probw($num,$den);
$lp7 = probl($num,$den);
/*echo $wp7;
echo "<br>";
echo $lp7;
echo "<br>";
*/


//wp8
$query = "Select count(*) as tot from cricket1 where ((team1='$t1' AND team2='$t2') OR (team2='$t1' AND team1='$t2')) AND gname = '$sname'";
$result = mysqli_query($con,$query);
$row = mysqli_fetch_array($result);
$den=$row['tot'];
//echo $den;
//echo "<br>";
$query = "Select count(*) as tot from cricket1 where ((team1='$t1' AND team2='$t2') OR (team2='$t1' AND team1='$t2')) AND winteam='$t1' AND gname = '$sname'" ;
$result = mysqli_query($con,$query);
$row = mysqli_fetch_array($result);
$num=$row['tot'];
//echo $num;
//echo "<br>";
$wp8 = probw($num,$den);
$lp8 = probl($num,$den);
/*echo $wp8;
echo "<br>";
echo $lp8;
echo "<br>";
*/

//wp9
$query = "Select count(*) as tot from cricket1 where ((team1='$t1' AND team2='$t2') OR (team2='$t1' AND team1='$t2')) AND gcountry = '$scountry'";
$result = mysqli_query($con,$query);
$row = mysqli_fetch_array($result);
$den=$row['tot'];
//echo $den;
//echo "<br>";
$query = "Select count(*) as tot from cricket1 where ((team1='$t1' AND team2='$t2') OR (team2='$t1' AND team1='$t2')) AND winteam='$t1' AND gcountry = '$scountry'" ;
$result = mysqli_query($con,$query);
$row = mysqli_fetch_array($result);
$num=$row['tot'];
//echo $num;
//echo "<br>";
$wp9 = probw($num,$den);
$lp9 = probl($num,$den);
/*echo $wp9;
echo "<br>";
echo $lp9;
echo "<br>";
*/


//wp10
$query = "Select count(*) as tot from cricket1 where ((team1='$t1' AND team2='$t2') OR (team2='$t1' AND team1='$t2')) AND gcountry = '$scountry' AND start_date >= '$date'";
$result = mysqli_query($con,$query);
$row = mysqli_fetch_array($result);
$den=$row['tot'];
echo $den;
echo "<br>";
$query = "Select count(*) as tot from cricket1 where ((team1='$t1' AND team2='$t2') OR (team2='$t1' AND team1='$t2')) AND winteam='$t1' AND gcountry = '$scountry' AND start_date >= '$date'" ;
$result = mysqli_query($con,$query);
$row = mysqli_fetch_array($result);
$num=$row['tot'];
echo $num;
echo "<br>";
$wp10 = probw($num,$den);
$lp10 = probl($num,$den);
echo $wp10;
echo "<br>";
echo $lp10;
echo "<br>";




function probw($a,$s)
{
$x=$a/$s;
return $x;
}
function probl($a,$s)
{
$x=($s-$a)/$s;

return $x;
}

?>