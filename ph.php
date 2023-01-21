<?php
/*$mysqli_connect("localhost","root","");
if(mysqli_select_db($conn,"class db"))
{
	echo 'connectionsuccess';
}
else
{
	echo 'connectionfailed';
}*/
$conn=new mysqli("localhost","root","", "class db");
if($conn->connect_error)
{
	die("connection failed".$conn->connect_error);
}
if(isset($_POST['submit']))
{
	$name=$_POST['name'];
	$hour1=$_POST['hour1'];
	$sql="insert into attendence(name,hour1) values('$name','$hour1')";
	$result=$conn->query($sql);
	if($result==TRUE)
		ECHO 'INSETEDSUCCESSFULLY';
	
}
$sql="select * from attendence";
$result=$conn->query($sql);
echo '<table border=1><tr><th>NAME</th><th>ROLLNO</th><th>HOUR1</th></tr>';
while($row=$result->fetch_assoc())
{
	echo '<tr><td>'.$row['name'].'</td><td>'. $row['rollno'].'</td><td>'.$row['hour1'].'</td></tr>';
	/*echo $row['name'];
	echo $row['rollno'].'<br>';*/
	
}
echo '</table>';
?>
<form method=post>
name:<input type="text" id="name" name="name"><br>
1hour:<input type="text" id="name" name="hour1"><br>
<input type="submit" name="submit" value="submit"><br>
</form>