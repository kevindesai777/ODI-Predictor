<?php
	require 'connect.php';
	function probw($a, $s){
		
		if ($s == 0){
			return 0;
		} else {
			$x=$a/$s;
			return $x;
		}

	}

	
	function probl($a, $s){
		
		if ($s == 0){
			return 0;
		} else {
			$x=($s-$a)/$s;
			return $x;
		}

	}

	$t1=$_POST["team1"];
	$t2=$_POST["team2"];
	$date1='2010-04-01';
	$date='2008-04-01';
	$sname=$_POST["venue"];
	$query="select country as cstad from grounds where name='$sname'";
	$result=mysqli_query($con,$query);
	$row = mysqli_fetch_array($result);
	$scountry=$row['cstad'];
	
	if ($t2==$scountry) {
		$temp=$t1;
		$t1=$t2;
		$t2=$temp;
	}

	$neutral='false';
	
	if($t1!=$scountry && $t2!=$scountry){
		$neutral='true';
	}

	
	if($neutral == 'false'){
		$query="select count(*) as tot from cricket1 where team1='$t1' OR team2='$t1' ";
		$result=mysqli_query($con,$query);
		$row = mysqli_fetch_array($result);
		$den=$row['tot'];
		$query="select count(*) as tot from cricket1 where (team1='$t1' OR team2='$t1') and winteam='$t1' ";
		$result=mysqli_query($con,$query);
		$row = mysqli_fetch_array($result);
		$num=$row['tot'];
		$wp1 = probw($num, $den);
		$lp1=probl($num, $den);
		$query="select count(*) as tot from cricket1 where (team1='$t1' OR team2='$t1') AND start_date>='$date1' ";
		$result=mysqli_query($con,$query);
		$row = mysqli_fetch_array($result);
		$den=$row['tot'];
		$query="select count(*) as tot from cricket1 where (team1='$t1' OR team2='$t1') and winteam='$t1' and start_date>='$date1' ";
		$result=mysqli_query($con,$query);
		$row = mysqli_fetch_array($result);
		$num=$row['tot'];
		$wp2 = probw($num, $den);
		$lp2=probl($num, $den);
		$query="select count(*) as tot from cricket1 where (team1='$t1' OR team2='$t1') AND gcountry='$scountry' ";
		$result=mysqli_query($con,$query);
		$row = mysqli_fetch_array($result);
		$den=$row['tot'];
		$query="select count(*) as tot from cricket1 where (team1='$t1' OR team2='$t1') and winteam='$t1' AND gcountry='$scountry' ";
		$result=mysqli_query($con,$query);
		$row = mysqli_fetch_array($result);
		$num=$row['tot'];
		$wp3 = probw($num, $den);
		$lp3=probl($num, $den);
		$query="select count(*) as tot from cricket1 where (team1='$t1' OR team2='$t1') AND start_date>='$date1' AND gcountry='$scountry' ";
		$result=mysqli_query($con,$query);
		$row = mysqli_fetch_array($result);
		$den=$row['tot'];
		$query="select count(*) as tot from cricket1 where (team1='$t1' OR team2='$t1') and winteam='$t1' and start_date>='$date1' AND gcountry='$scountry' ";
		$result=mysqli_query($con,$query);
		$row = mysqli_fetch_array($result);
		$num=$row['tot'];
		$wp4 = probw($num, $den);
		$lp4=probl($num, $den);
		$query = "Select count(*) as tot from cricket1 where (team1='$t1' AND team2='$t2') OR (team2='$t1' AND team1='$t2')";
		$result = mysqli_query($con,$query);
		$row = mysqli_fetch_array($result);
		$den=$row['tot'];
		$query = "Select count(*) as tot from cricket1 where ((team1='$t1' AND team2='$t2') OR (team2='$t1' AND team1='$t2')) AND winteam='$t1'" ;
		$result = mysqli_query($con,$query);
		$row = mysqli_fetch_array($result);
		$num=$row['tot'];
		$wp5 = probw($num,$den);
		$lp5 = probl($num,$den);
		$query = "Select count(*) as tot from cricket1 where ((team1='$t1' AND team2='$t2') OR (team2='$t1' AND team1='$t2')) AND start_date >= '$date'";
		$result = mysqli_query($con,$query);
		$row = mysqli_fetch_array($result);
		$den=$row['tot'];
		$query = "Select count(*) as tot from cricket1 where ((team1='$t1' AND team2='$t2') OR (team2='$t1' AND team1='$t2')) AND winteam='$t1' AND start_date >= '$date'" ;
		$result = mysqli_query($con,$query);
		$row = mysqli_fetch_array($result);
		$num=$row['tot'];
		$wp6 = probw($num,$den);
		$lp6 = probl($num,$den);
		$query = "Select count(*) as tot from cricket1 where (team1='$t1' OR team2='$t1' ) AND gname = '$sname'";
		$result = mysqli_query($con,$query);
		$row = mysqli_fetch_array($result);
		$den=$row['tot'];
		$query = "Select count(*) as tot from cricket1 where (team1='$t1' OR team2='$t1') AND winteam='$t1' AND gname = '$sname'" ;
		$result = mysqli_query($con,$query);
		$row = mysqli_fetch_array($result);
		$num=$row['tot'];
		$wp7 = probw($num,$den);
		$lp7 = probl($num,$den);
		$query = "Select count(*) as tot from cricket1 where ((team1='$t1' AND team2='$t2') OR (team2='$t1' AND team1='$t2')) AND gname = '$sname'";
		$result = mysqli_query($con,$query);
		$row = mysqli_fetch_array($result);
		$den=$row['tot'];
		$query = "Select count(*) as tot from cricket1 where ((team1='$t1' AND team2='$t2') OR (team2='$t1' AND team1='$t2')) AND winteam='$t1' AND gname = '$sname'" ;
		$result = mysqli_query($con,$query);
		$row = mysqli_fetch_array($result);
		$num=$row['tot'];
		$wp8 = probw($num,$den);
		$lp8 = probl($num,$den);
		$query = "Select count(*) as tot from cricket1 where ((team1='$t1' AND team2='$t2') OR (team2='$t1' AND team1='$t2')) AND gcountry = '$scountry'";
		$result = mysqli_query($con,$query);
		$row = mysqli_fetch_array($result);
		$den=$row['tot'];
		$query = "Select count(*) as tot from cricket1 where ((team1='$t1' AND team2='$t2') OR (team2='$t1' AND team1='$t2')) AND winteam='$t1' AND gcountry = '$scountry'" ;
		$result = mysqli_query($con,$query);
		$row = mysqli_fetch_array($result);
		$num=$row['tot'];
		$wp9 = probw($num,$den);
		$lp9 = probl($num,$den);
		$query = "Select count(*) as tot from cricket1 where ((team1='$t1' AND team2='$t2') OR (team2='$t1' AND team1='$t2')) AND gcountry = '$scountry' AND start_date >= '$date'";
		$result = mysqli_query($con,$query);
		$row = mysqli_fetch_array($result);
		$den=$row['tot'];
		$query = "Select count(*) as tot from cricket1 where ((team1='$t1' AND team2='$t2') OR (team2='$t1' AND team1='$t2')) AND winteam='$t1' AND gcountry = '$scountry' AND start_date >= '$date'" ;
		$result = mysqli_query($con,$query);
		$row = mysqli_fetch_array($result);
		$num=$row['tot'];
		$wp10 = probw($num,$den);
		$lp10 = probl($num,$den);
		$query="select count(*) as tot from cricket1 where (team1='$t2' OR team2='$t2') ";
		$result=mysqli_query($con,$query);
		$row = mysqli_fetch_array($result);
		$den=$row['tot'];
		$query="select count(*) as tot from cricket1 where (team1='$t2' OR team2='$t2') and winteam <> '$t2' ";
		$result=mysqli_query($con,$query);
		$row = mysqli_fetch_array($result);
		$num=$row['tot'];
		$wp11 = probw($num, $den);
		$lp11=probl($num, $den);
		$query="select count(*) as tot from cricket1 where (team1='$t2' OR team2='$t2') AND start_date>='$date1' ";
		$result=mysqli_query($con,$query);
		$row = mysqli_fetch_array($result);
		$den=$row['tot'];
		$query="select count(*) as tot from cricket1 where (team1='$t2' OR team2='$t2') and winteam <> '$t2' AND start_date>='$date1' ";
		$result=mysqli_query($con,$query);
		$row = mysqli_fetch_array($result);
		$num=$row['tot'];
		$wp12 = probw($num, $den);
		$lp12=probl($num, $den);
		$res1 = abs(log($wp1 + 0.99,2)) + abs(log($wp2 + 0.99,2)) + abs(log($wp3 + 0.99,2)) + abs(log($wp4 + 0.99,2)) + abs(log($wp5 + 0.99,2)) + abs(log($wp6 + 0.99,2)) + abs(log($wp7 + 0.99,2)) + abs(log($wp8 + 0.99,2)) + abs(log($wp9 + 0.99,2)) + abs(log($wp10 + 0.99,2)) + abs(log($wp11 + 0.99,2)) + abs(log($wp12 + 0.99,2));
		$res2 = abs(log($lp1 + 0.99,2)) + abs(log($lp2 + 0.99,2)) + abs(log($lp3 + 0.99,2)) + abs(log($lp4 + 0.99,2)) + abs(log($lp5 + 0.99,2)) + abs(log($lp6 + 0.99,2)) + abs(log($lp7 + 0.99,2)) + abs(log($lp8 + 0.99,2)) + abs(log($lp9 + 0.99,2)) + abs(log($lp10 + 0.99,2)) + abs(log($lp11 + 0.99,2)) + abs(log($lp12 + 0.99,2)) ;
		$res1=pow(2,$res1);
		$res2=pow(2,$res2);
		$total = $res1 + $res2;
		$wint1 = ($res1*100)/$total;
		$wint2 = ($res2*100)/$total;
	} else {
		$query="select count(*) as tot from cricket1 where team1='$t1' OR team2='$t1' ";
		$result=mysqli_query($con,$query);
		$row = mysqli_fetch_array($result);
		$den=$row['tot'];
		$query="select count(*) as tot from cricket1 where (team1='$t1' OR team2='$t1') and winteam='$t1' ";
		$result=mysqli_query($con,$query);
		$row = mysqli_fetch_array($result);
		$num=$row['tot'];
		$wp1 = probw($num, $den);
		$lp1=probl($num, $den);
		$query="select count(*) as tot from cricket1 where (team1='$t1' OR team2='$t1') AND start_date>='$date1' ";
		$result=mysqli_query($con,$query);
		$row = mysqli_fetch_array($result);
		$den=$row['tot'];
		$query="select count(*) as tot from cricket1 where (team1='$t1' OR team2='$t1') and winteam='$t1' and start_date>='$date1' ";
		$result=mysqli_query($con,$query);
		$row = mysqli_fetch_array($result);
		$num=$row['tot'];
		$wp2 = probw($num, $den);
		$lp2=probl($num, $den);
		$query="select count(*) as tot from cricket1 where (team1='$t1' OR team2='$t1') AND gcountry='$scountry' ";
		$result=mysqli_query($con,$query);
		$row = mysqli_fetch_array($result);
		$den=$row['tot'];
		$query="select count(*) as tot from cricket1 where (team1='$t1' OR team2='$t1') and winteam='$t1' AND gcountry='$scountry' ";
		$result=mysqli_query($con,$query);
		$row = mysqli_fetch_array($result);
		$num=$row['tot'];
		$wp3 = probw($num, $den);
		$lp3=probl($num, $den);
		$query="select count(*) as tot from cricket1 where (team1='$t1' OR team2='$t1') AND start_date>='$date' AND gcountry='$scountry' ";
		$result=mysqli_query($con,$query);
		$row = mysqli_fetch_array($result);
		$den=$row['tot'];
		$query="select count(*) as tot from cricket1 where (team1='$t1' OR team2='$t1') and winteam='$t1' and start_date>='$date1' AND gcountry='$scountry' ";
		$result=mysqli_query($con,$query);
		$row = mysqli_fetch_array($result);
		$num=$row['tot'];
		$wp4 = probw($num, $den);
		$lp4=probl($num, $den);
		$query = "Select count(*) as tot from cricket1 where (team1='$t1' AND team2='$t2') OR (team2='$t1' AND team1='$t2')";
		$result = mysqli_query($con,$query);
		$row = mysqli_fetch_array($result);
		$den=$row['tot'];
		$query = "Select count(*) as tot from cricket1 where ((team1='$t1' AND team2='$t2') OR (team2='$t1' AND team1='$t2')) AND winteam='$t1'" ;
		$result = mysqli_query($con,$query);
		$row = mysqli_fetch_array($result);
		$num=$row['tot'];
		$wp5 = probw($num,$den);
		$lp5 = probl($num,$den);
		$query = "Select count(*) as tot from cricket1 where ((team1='$t1' AND team2='$t2') OR (team2='$t1' AND team1='$t2')) AND start_date >= '$date'";
		$result = mysqli_query($con,$query);
		$row = mysqli_fetch_array($result);
		$den=$row['tot'];
		$query = "Select count(*) as tot from cricket1 where ((team1='$t1' AND team2='$t2') OR (team2='$t1' AND team1='$t2')) AND winteam='$t1' AND start_date >= '$date'" ;
		$result = mysqli_query($con,$query);
		$row = mysqli_fetch_array($result);
		$num=$row['tot'];
		$wp6 = probw($num,$den);
		$lp6 = probl($num,$den);
		$query="select count(*) as tot from cricket1 where team1='$t2' OR team2='$t2' ";
		$result=mysqli_query($con,$query);
		$row = mysqli_fetch_array($result);
		$den=$row['tot'];
		$query="select count(*) as tot from cricket1 where (team1='$t2' OR team2='$t2') and winteam='$t2' ";
		$result=mysqli_query($con,$query);
		$row = mysqli_fetch_array($result);
		$num=$row['tot'];
		$lp7 = probw($num, $den);
		$wp7=probl($num, $den);
		$query="select count(*) as tot from cricket1 where (team1='$t2' OR team2='$t2') AND start_date>='$date1' ";
		$result=mysqli_query($con,$query);
		$row = mysqli_fetch_array($result);
		$den=$row['tot'];
		$query="select count(*) as tot from cricket1 where (team1='$t2' OR team2='$t2') and winteam='$t2' and start_date>='$date1' ";
		$result=mysqli_query($con,$query);
		$row = mysqli_fetch_array($result);
		$num=$row['tot'];
		$lp8 = probw($num, $den);
		$wp8=probl($num, $den);
		$query="select count(*) as tot from cricket1 where (team1='$t2' OR team2='$t2') AND gcountry='$scountry' ";
		$result=mysqli_query($con,$query);
		$row = mysqli_fetch_array($result);
		$den=$row['tot'];
		$query="select count(*) as tot from cricket1 where (team1='$t2' OR team2='$t2') and winteam='$t2' AND gcountry='$scountry' ";
		$result=mysqli_query($con,$query);
		$row = mysqli_fetch_array($result);
		$num=$row['tot'];
		$lp9 = probw($num, $den);
		$wp9=probl($num, $den);
		$query="select count(*) as tot from cricket1 where (team1='$t2' OR team2='$t2') AND start_date>='$date' AND gcountry='$scountry' ";
		$result=mysqli_query($con,$query);
		$row = mysqli_fetch_array($result);
		$den=$row['tot'];
		$query="select count(*) as tot from cricket1 where (team1='$t2' OR team2='$t2') and winteam='$t1' and start_date>='$date1' AND gcountry='$scountry' ";
		$result=mysqli_query($con,$query);
		$row = mysqli_fetch_array($result);
		$num=$row['tot'];
		$lp10 = probw($num, $den);
		$wp10=probl($num, $den);
		$query = "Select count(*) as tot from cricket1 where ((team1='$t1' AND team2='$t2') OR (team2='$t1' AND team1='$t2')) And gcountry = '$scountry' ";
		$result = mysqli_query($con,$query);
		$row = mysqli_fetch_array($result);
		$den=$row['tot'];
		$query = "Select count(*) as tot from cricket1 where ((team1='$t1' AND team2='$t2') OR (team2='$t1' AND team1='$t2')) And gcountry = '$scountry' AND winteam='$t1'" ;
		$result = mysqli_query($con,$query);
		$row = mysqli_fetch_array($result);
		$num=$row['tot'];
		$wp11 = probw($num,$den);
		$lp11 = probl($num,$den);
		$query = "Select count(*) as tot from cricket1 where ((team1='$t1' AND team2='$t2') OR (team2='$t1' AND team1='$t2')) And gcountry = '$scountry' AND start_date >= '$date'";
		$result = mysqli_query($con,$query);
		$row = mysqli_fetch_array($result);
		$den=$row['tot'];
		$query = "Select count(*) as tot from cricket1 where ((team1='$t1' AND team2='$t2') OR (team2='$t1' AND team1='$t2')) And gcountry = '$scountry' AND winteam='$t1' AND start_date >= '$date'" ;
		$result = mysqli_query($con,$query);
		$row = mysqli_fetch_array($result);
		$num=$row['tot'];
		$wp12 = probw($num,$den);
		$lp12 = probl($num,$den);
		$res1 = abs(log($wp1 + 0.99,2)) + abs(log($wp2 + 0.99,2)) + abs(log($wp3 + 0.99,2)) + abs(log($wp4 + 0.99,2)) + abs(log($wp5 + 0.99,2)) + abs(log($wp6 + 0.99,2)) + abs(log($wp7 + 0.99,2)) + abs(log($wp8 + 0.99,2)) + abs(log($wp9 + 0.99,2)) + abs(log($wp10 + 0.99,2)) + abs(log($wp11 + 0.99,2)) + abs(log($wp12 + 0.99,2));
		$res2 = abs(log($lp1 + 0.99,2)) + abs(log($lp2 + 0.99,2)) + abs(log($lp3 + 0.99,2)) + abs(log($lp4 + 0.99,2)) + abs(log($lp5 + 0.99,2)) + abs(log($lp6 + 0.99,2)) + abs(log($lp7 + 0.99,2)) + abs(log($lp8 + 0.99,2)) + abs(log($lp9 + 0.99,2)) + abs(log($lp10 + 0.99,2)) + abs(log($lp11 + 0.99,2)) + abs(log($lp12 + 0.99,2)) ;
		$res1=pow(2,$res1);
		$res2=pow(2,$res2);
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
<div align="center">
<canvas id="canvas" height="450" width="450" align="center"></canvas>
</div>
	<script>
var w1=<?php  echo json_encode($wint1); ?>;
var w2=<?php  echo json_encode($wint2); ?>;
var wintt1=<?php  echo json_encode($t1); ?>;
var wintt2=<?php  echo json_encode($t2); ?>;
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
	<h1 align="center">
 <?php  echo $t1   ?> has a <?php  echo $wint1   ?> % chance of winning the match at <?php  echo $sname   ?> against <?php  echo $t2   ?>. </h1>
</body>
</html>