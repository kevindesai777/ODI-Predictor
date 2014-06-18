<?php

require 'connect.php';

function probw($a, $s)
{
if ($s == 0)
{return 0;}
else{
	$x=$a/$s;
	
	return $x;
}
}
function probl($a, $s)
{
if ($s == 0)
{return 0;}
else{
	$x=($s-$a)/$s;
	
	return $x;
	
}
}
//$t2='South Africa';
//$t1='India';
$t1=$_POST["team1"];
$t2=$_POST["team2"];
$date1='2010-04-01';
$date='2008-04-01';
//$sname='Wankhede Stadium';
//$scountry='India';
$sname=$_POST["venue"];
$query="select country as cstad from grounds where name='$sname'";
$result=mysqli_query($con,$query);
$row = mysqli_fetch_array($result);
$scountry=$row['cstad'];
//echo $scountry;
if ($t2==$scountry) {
	$temp=$t1;
	$t1=$t2;
	$t2=$temp;
}
$neutral='false';
if($t1!=$scountry && $t2!=$scountry)
{
	$neutral='true';
}
//echo $neutral;
///echo "wp1";
//echo "<br>";
//wp1
if($neutral == 'false'){
$query="select count(*) as tot from cricket1 where team1='$t1' OR team2='$t1' "; 
$result=mysqli_query($con,$query);
$row = mysqli_fetch_array($result);


//echo $row['tot'];
$den=$row['tot'];  
//echo "<br>";

//India win 10 years
$query="select count(*) as tot from cricket1 where (team1='$t1' OR team2='$t1') and winteam='$t1' ";
$result=mysqli_query($con,$query);
$row = mysqli_fetch_array($result);
//echo $row['tot'];
$num=$row['tot']; 
//echo "<br>";
$wp1 = probw($num, $den);
//echo $wp1;
$lp1=probl($num, $den);
//echo $lp1;
//echo "<br>";
//echo "<br>";
//echo "wp2";
//echo "<br>";
//wp2

//India played last one year
$query="select count(*) as tot from cricket1 where (team1='$t1' OR team2='$t1') AND start_date>='$date1' ";
$result=mysqli_query($con,$query);
$row = mysqli_fetch_array($result);
//echo $row['tot'];
$den=$row['tot'];  
//echo "<br>";

$query="select count(*) as tot from cricket1 where (team1='$t1' OR team2='$t1') and winteam='$t1' and start_date>='$date1' ";
$result=mysqli_query($con,$query);
$row = mysqli_fetch_array($result);
//echo $row['tot'];
$num=$row['tot']; 
//echo "<br>";
$wp2 = probw($num, $den);
//echo $wp2;
$lp2=probl($num, $den);
//echo $lp2;
//echo "<br>";
//echo "<br>";


//echo "wp3";
//echo "<br>";
//wp3
//INdia played in india
$query="select count(*) as tot from cricket1 where (team1='$t1' OR team2='$t1') AND gcountry='$scountry' ";
$result=mysqli_query($con,$query);
$row = mysqli_fetch_array($result);
//echo $row['tot'];
$den=$row['tot'];  
//echo "<br>";
$query="select count(*) as tot from cricket1 where (team1='$t1' OR team2='$t1') and winteam='$t1' AND gcountry='$scountry' ";
$result=mysqli_query($con,$query);
$row = mysqli_fetch_array($result);
//echo $row['tot'];
$num=$row['tot']; 
//echo "<br>";
$wp3 = probw($num, $den);
//echo $wp3;
//echo "<br>";
$lp3=probl($num, $den);
//echo $lp3;
//echo "<br>";
//echo "<br>";


//echo "wp4";echo "<br>";
//wp4
//india in india in last year
$query="select count(*) as tot from cricket1 where (team1='$t1' OR team2='$t1') AND start_date>='$date1' AND gcountry='$scountry' ";
$result=mysqli_query($con,$query);
$row = mysqli_fetch_array($result);
//echo $row['tot'];
$den=$row['tot'];  
//echo "<br>";
$query="select count(*) as tot from cricket1 where (team1='$t1' OR team2='$t1') and winteam='$t1' and start_date>='$date1' AND gcountry='$scountry' ";
$result=mysqli_query($con,$query);
$row = mysqli_fetch_array($result);
//echo $row['tot'];
$num=$row['tot']; 
//echo "<br>";
$wp4 = probw($num, $den);
//echo $wp4;
//echo "<br>";
$lp4=probl($num, $den);
//echo $lp4;
//echo "<br>";
//echo "<br>";


//echo "wp5";echo "<br>";
//wp5
//india vs aus lastg 10 years
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
//echo "<br>";
//echo "<br>";


//echo "wp6";echo "<br>";
//wp6
// ind vs aus last 3 years
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
//echo $wp6;
//echo "<br>";
//echo $lp6;
//echo "<br>";

//echo "<br>";
//echo "<br>";



//home away
//echo "wp7";echo "<br>";
//wp8
// ind at wankhede
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
//echo $wp7;
//echo "<br>";
//echo $lp7;
//echo "<br>";


//echo "<br>";
//echo "<br>";

//echo "wp8";echo "<br>";
//wp8
//ind vs aus at wankhede
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
//echo $wp8;
//echo "<br>";
//echo $lp8;
//echo "<br>";

//echo "<br>";
//echo "<br>";


//echo "wp9";echo "<br>";
//wp9
//ind vs aus inind
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
//echo $wp9;
//echo "<br>";
//echo $lp9;
//echo "<br>";

//echo "<br>";
//echo "<br>";



//echo "wp10";echo "<br>";
//wp10
//ind vs aus last 3 years
$query = "Select count(*) as tot from cricket1 where ((team1='$t1' AND team2='$t2') OR (team2='$t1' AND team1='$t2')) AND gcountry = '$scountry' AND start_date >= '$date'";
$result = mysqli_query($con,$query);
$row = mysqli_fetch_array($result);
$den=$row['tot'];
//echo $den;
//echo "<br>";
$query = "Select count(*) as tot from cricket1 where ((team1='$t1' AND team2='$t2') OR (team2='$t1' AND team1='$t2')) AND winteam='$t1' AND gcountry = '$scountry' AND start_date >= '$date'" ;
$result = mysqli_query($con,$query);
$row = mysqli_fetch_array($result);
$num=$row['tot'];
//echo $num;
//echo "<br>";
$wp10 = probw($num,$den);
$lp10 = probl($num,$den);
//echo $wp10;
//echo "<br>";
//echo $lp10;
//echo "<br>";
//echo "<br>";
//echo "<br>";







//echo "wp11";echo "<br>";
//wp11
//aus last 10 years
$query="select count(*) as tot from cricket1 where (team1='$t2' OR team2='$t2') ";
$result=mysqli_query($con,$query);
$row = mysqli_fetch_array($result);
//echo $row['tot'];
$den=$row['tot'];  
//echo "<br>";
$query="select count(*) as tot from cricket1 where (team1='$t2' OR team2='$t2') and winteam <> '$t2' ";
$result=mysqli_query($con,$query);
$row = mysqli_fetch_array($result);
//echo $row['tot'];
$num=$row['tot']; 
//echo "<br>";
$wp11 = probw($num, $den);
//echo $wp11;
$lp11=probl($num, $den);
//echo $lp11;
//echo "<br>";
//echo "<br>";


//echo "wp12";echo "<br>";
//wp12
//aus last year
$query="select count(*) as tot from cricket1 where (team1='$t2' OR team2='$t2') AND start_date>='$date1' ";
$result=mysqli_query($con,$query);
$row = mysqli_fetch_array($result);
//echo $row['tot'];
$den=$row['tot'];  
//echo "<br>";
$query="select count(*) as tot from cricket1 where (team1='$t2' OR team2='$t2') and winteam <> '$t2' AND start_date>='$date1' ";
$result=mysqli_query($con,$query);
$row = mysqli_fetch_array($result);
//echo $row['tot'];
$num=$row['tot']; 
//echo "<br>";
$wp12 = probw($num, $den);
//echo $wp12;
$lp12=probl($num, $den);
//echo $lp12;
//echo "<br>";
//echo "<br>";


$res1 = $wp1 + $wp2 + $wp3 + $wp4 + $wp5 + $wp6 + $wp7+ $wp8+ $wp9 + $wp10 + $wp11 + $wp12;

$res2 = $lp1 + $lp2 + $lp3 + $lp4 + $lp5 + $lp6 + $lp7 + $lp8  + $lp9 + $lp10 + $lp11 + $lp12;

//echo $res1;
//echo "<br>";
//echo $res2;
//echo "<br>";
$total = $res1 + $res2;

$wint1 = ($res1*100)/$total;
$wint2 = ($res2*100)/$total;

//echo $wint1;
//echo "<br>";
//echo $wint2;
}
else
{




	




//ind last 10 year
$query="select count(*) as tot from cricket1 where team1='$t1' OR team2='$t1' "; 
$result=mysqli_query($con,$query);
$row = mysqli_fetch_array($result);


//echo $row['tot'];
$den=$row['tot'];  
//echo "<br>";


$query="select count(*) as tot from cricket1 where (team1='$t1' OR team2='$t1') and winteam='$t1' ";
$result=mysqli_query($con,$query);
$row = mysqli_fetch_array($result);
//echo $row['tot'];
$num=$row['tot']; 
//echo "<br>";
$wp1 = probw($num, $den);
//echo $wp1;
$lp1=probl($num, $den);
//echo $lp1;
//echo "<br>";
//echo "<br>";
//echo "wp2";
//echo "<br>";
//wp2

//India played last one year
$query="select count(*) as tot from cricket1 where (team1='$t1' OR team2='$t1') AND start_date>='$date1' ";
$result=mysqli_query($con,$query);
$row = mysqli_fetch_array($result);
//echo $row['tot'];
$den=$row['tot'];  
//echo "<br>";

$query="select count(*) as tot from cricket1 where (team1='$t1' OR team2='$t1') and winteam='$t1' and start_date>='$date1' ";
$result=mysqli_query($con,$query);
$row = mysqli_fetch_array($result);
//echo $row['tot'];
$num=$row['tot']; 
//echo "<br>";
$wp2 = probw($num, $den);
//echo $wp2;
$lp2=probl($num, $den);
//echo $lp2;
//echo "<br>";
//echo "<br>";


//echo "wp3";
//echo "<br>";
//wp3
//INdia played in aus
$query="select count(*) as tot from cricket1 where (team1='$t1' OR team2='$t1') AND gcountry='$scountry' ";
$result=mysqli_query($con,$query);
$row = mysqli_fetch_array($result);
//echo $row['tot'];
$den=$row['tot'];  
//echo "<br>";
$query="select count(*) as tot from cricket1 where (team1='$t1' OR team2='$t1') and winteam='$t1' AND gcountry='$scountry' ";
$result=mysqli_query($con,$query);
$row = mysqli_fetch_array($result);
//echo $row['tot'];
$num=$row['tot']; 
//echo "<br>";
$wp3 = probw($num, $den);
//echo $wp3;
//echo "<br>";
$lp3=probl($num, $den);
//echo $lp3;
//echo "<br>";
//echo "<br>";


//echo "wp4";echo "<br>";
//wp4
//india in aus in last 3 year
$query="select count(*) as tot from cricket1 where (team1='$t1' OR team2='$t1') AND start_date>='$date' AND gcountry='$scountry' ";
$result=mysqli_query($con,$query);
$row = mysqli_fetch_array($result);
//echo $row['tot'];
$den=$row['tot'];  
//echo "<br>";
$query="select count(*) as tot from cricket1 where (team1='$t1' OR team2='$t1') and winteam='$t1' and start_date>='$date1' AND gcountry='$scountry' ";
$result=mysqli_query($con,$query);
$row = mysqli_fetch_array($result);
//echo $row['tot'];
$num=$row['tot']; 
//echo "<br>";
$wp4 = probw($num, $den);
//echo $wp4;
//echo "<br>";
$lp4=probl($num, $den);
//echo $lp4;
//echo "<br>";
//echo "<br>";




//echo "wp5";echo "<br>";
//wp5
//india vs sl lastg 10 years
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
//echo "<br>";
//echo "<br>";


//echo "wp6";echo "<br>";
//wp6
// ind vs sl last 3 years
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
//echo $wp6;
//echo "<br>";
//echo $lp6;
//echo "<br>";

//echo "<br>";
//echo "<br>";



//sl last 10 year
$query="select count(*) as tot from cricket1 where team1='$t2' OR team2='$t2' "; 
$result=mysqli_query($con,$query);
$row = mysqli_fetch_array($result);


//echo $row['tot'];
$den=$row['tot'];  
//echo "<br>";

//India win 10 years
$query="select count(*) as tot from cricket1 where (team1='$t2' OR team2='$t2') and winteam='$t2' ";
$result=mysqli_query($con,$query);
$row = mysqli_fetch_array($result);
//echo $row['tot'];
$num=$row['tot']; 
//echo "<br>";
$lp7 = probw($num, $den);
//echo $wp1;
$wp7=probl($num, $den);
//echo $lp1;
//echo "<br>";
//echo "<br>";
//echo "wp2";
//echo "<br>";
//wp2

//sl played last one year
$query="select count(*) as tot from cricket1 where (team1='$t2' OR team2='$t2') AND start_date>='$date1' ";
$result=mysqli_query($con,$query);
$row = mysqli_fetch_array($result);
//echo $row['tot'];
$den=$row['tot'];  
//echo "<br>";

$query="select count(*) as tot from cricket1 where (team1='$t2' OR team2='$t2') and winteam='$t2' and start_date>='$date1' ";
$result=mysqli_query($con,$query);
$row = mysqli_fetch_array($result);
//echo $row['tot'];
$num=$row['tot']; 
//echo "<br>";
$lp8 = probw($num, $den);
//echo $wp2;
$wp8=probl($num, $den);
//echo $lp2;
//echo "<br>";
//echo "<br>";


//echo "wp3";
//echo "<br>";
//wp3
//sl played in aus
$query="select count(*) as tot from cricket1 where (team1='$t2' OR team2='$t2') AND gcountry='$scountry' ";
$result=mysqli_query($con,$query);
$row = mysqli_fetch_array($result);
//echo $row['tot'];
$den=$row['tot'];  
//echo "<br>";
$query="select count(*) as tot from cricket1 where (team1='$t2' OR team2='$t2') and winteam='$t2' AND gcountry='$scountry' ";
$result=mysqli_query($con,$query);
$row = mysqli_fetch_array($result);
//echo $row['tot'];
$num=$row['tot']; 
//echo "<br>";
$lp9 = probw($num, $den);
//echo $wp3;
//echo "<br>";
$wp9=probl($num, $den);
//echo $lp3;
//echo "<br>";
//echo "<br>";



//sl in aus in last 3 year
$query="select count(*) as tot from cricket1 where (team1='$t2' OR team2='$t2') AND start_date>='$date' AND gcountry='$scountry' ";
$result=mysqli_query($con,$query);
$row = mysqli_fetch_array($result);
//echo $row['tot'];
$den=$row['tot'];  
//echo "<br>";
$query="select count(*) as tot from cricket1 where (team1='$t2' OR team2='$t2') and winteam='$t1' and start_date>='$date1' AND gcountry='$scountry' ";
$result=mysqli_query($con,$query);
$row = mysqli_fetch_array($result);
//echo $row['tot'];
$num=$row['tot']; 
//echo "<br>";
$lp10 = probw($num, $den);
//echo $wp4;
//echo "<br>";
$wp10=probl($num, $den);
//echo $lp4;
//echo "<br>";
//echo "<br>";



// ind vs sl in aus last 10 years
$query = "Select count(*) as tot from cricket1 where ((team1='$t1' AND team2='$t2') OR (team2='$t1' AND team1='$t2')) And gcountry = '$scountry' ";
$result = mysqli_query($con,$query);
$row = mysqli_fetch_array($result);
$den=$row['tot'];
//echo $den;
//echo "<br>";
$query = "Select count(*) as tot from cricket1 where ((team1='$t1' AND team2='$t2') OR (team2='$t1' AND team1='$t2')) And gcountry = '$scountry' AND winteam='$t1'" ;
$result = mysqli_query($con,$query);
$row = mysqli_fetch_array($result);
$num=$row['tot'];

//echo $num;
//echo "<br>";
$wp11 = probw($num,$den);
$lp11 = probl($num,$den);
//echo $wp6;
//echo "<br>";
//echo $lp6;
//echo "<br>";

//echo "<br>";
//echo "<br>";



//echo "wp6";echo "<br>";
//wp6
// ind vs sl last 3 years
$query = "Select count(*) as tot from cricket1 where ((team1='$t1' AND team2='$t2') OR (team2='$t1' AND team1='$t2')) And gcountry = '$scountry' AND start_date >= '$date'";
$result = mysqli_query($con,$query);
$row = mysqli_fetch_array($result);
$den=$row['tot'];
//echo $den;
//echo "<br>";
$query = "Select count(*) as tot from cricket1 where ((team1='$t1' AND team2='$t2') OR (team2='$t1' AND team1='$t2')) And gcountry = '$scountry' AND winteam='$t1' AND start_date >= '$date'" ;
$result = mysqli_query($con,$query);
$row = mysqli_fetch_array($result);
$num=$row['tot'];

//echo $num;
//echo "<br>";
$wp12 = probw($num,$den);
$lp12 = probl($num,$den);
//echo $wp6;
//echo "<br>";
//echo $lp6;
//echo "<br>";

//echo "<br>";
//echo "<br>";








$res1 = $wp1 + $wp2 + $wp3 + $wp4 + $wp5 + $wp6 + $wp7+ $wp8+ $wp9 + $wp10 + $wp11 +$wp12;

$res2 = $lp1 + $lp2 + $lp3 + $lp4 + $lp5 + $lp6 + $lp7 + $lp8  + $lp9 + $lp10 + $lp11 +$wp12;

//echo $res1;
//echo "<br>";
//echo $res2;
//echo "<br>";
$total = $res1 + $res2;

$wint1 = ($res1*100)/$total;
$wint2 = ($res2*100)/$total;



}
?>

<html>
<head>
<script type="text/javascript" src="Chart.js-master/Chart.js"></script>
<style type="text/css">
	
			canvas{
			}
		
</style>
</head>
<body>

<canvas id="canvas" height="450" width="450"></canvas>


	<script>
		
var w1=<?php echo json_encode($wint1); ?>;
var w2=<?php echo json_encode($wint2); ?>;
var wintt1=<?php echo json_encode($t1); ?>;
var wintt2=<?php echo json_encode($t2); ?>;

if (wintt1=='India') {
	var c1='#24456D';
};
if (wintt1=='Australia') {
	var c1='#D6C81F';
};
if (wintt1=='England') {
	var c1='#C0333C';
};
if (wintt1=='Sri Lanka') {
	var c1='#274068';
};
if (wintt1=='South Africa') {
	var c1='#0E724C';
};
if (wintt1=='West Indies') {
	var c1='#590F1E';
};
if (wintt1=='Pakistan') {
	var c1='#45632D';
};
if (wintt1=='New Zealand') {
	var c1='#1A1926';
};
if (wintt1=='Bangladesh') {
	var c1='#1A7D48';
};
if (wintt1=='Zimbabwe') {
	var c1='#D02619';
};

if (wintt2=='India') {
	var c2='#24456D';
};
if (wintt2=='Australia') {
	var c2='#D6C81F';
};
if (wintt2=='England') {
	var c2='#C0333C';
};
if (wintt2=='Sri Lanka') {
	var c2='#274068';
};
if (wintt2=='South Africa') {
	var c2='#0E724C';
};
if (wintt2=='West Indies') {
	var c2='#590F1E';
};
if (wintt2=='Pakistan') {
	var c2='#45632D';
};
if (wintt2=='New Zealand') {
	var c2='#1A1926';
};
if (wintt2=='Bangladesh') {
	var c2='#1A7D48';
};
if (wintt2=='Zimbabwe') {
	var c2='#D02619';
};


		var pieData = [
				{
					value : w1,
					color : c1,
					label : wintt1,
					labelColor : 'white',
					labelFontSize : '15',
					labelAlign : 'center'
				},
				{
					value : w2,
					color : c2,
					label: wintt2,
					labelColor : 'white',
					labelFontSize : '15',
					labelAlign : 'center'
				
				}
			
			];

	var myPie = new Chart(document.getElementById("canvas").getContext("2d")).Pie(pieData);
	
	</script>
	<h1>
 <?php echo $t1 ?> has a <?php echo $wint1 ?> % chance of winning the match. </h1>
</body>
</html>
