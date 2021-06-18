<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
	
	
	
</head>

<body>
<form id="form1" name="form1" method="post" action="index.php">
  <p>
    <label for="rollno">Roll No:</label>
    <input type="text" name="rollno" id="rollno">
    
  </p>
  <p>
    <label for="name">Name :</label>
    <input type="text" name="name" id="name">
  </p>
  <p>
    <input type="submit" name="insert" id="insert" value="insert">
    <input type="submit" name="update" id="update" value="update">
    <input type="submit" name="delete" id="delete" value="delete">
    <input type="submit" name="display" id="display" value="display">
  </p>
</form>
</body>
</html>

<?php 
		if(isset($_POST["insert"]))
		{
			$con=mysqli_connect("localhost","root","","test");
			$rollno=$_POST["rollno"];
			$name = $_POST["name"];
			
			if($con){
				$query="insert into tybca(rollno,name) values($rollno,'$name')";
				$result=mysqli_query($con,$query);
				
				if($result){
					echo "Record Successfully inserted.";
				}else{
					echo "Please check your Query";
				}
					
			}else{
				die("Database is not Connected");
			}
		}
?>

<?php 
		if(isset($_POST["update"]))
		{
			$con=mysqli_connect("localhost","root","","test");
			$rollno=$_POST["rollno"];
			$name = $_POST["name"];
			
			if($con){
				$query="update tybca set name='$name' where rollno=$rollno";
				$result=mysqli_query($con,$query);
				
				if($result){
					echo "Record Successfully Updated.";
				}else{
					echo "Please check your Query";
				}
					
			}else{
				die("Database is not Connected");
			}
		}
?>

<?php 
		if(isset($_POST["delete"]))
		{
			$con=mysqli_connect("localhost","root","","test");
			$rollno=$_POST["rollno"];
			$name = $_POST["name"];
			
			if($con){
				$query="delete from tybca where rollno=$rollno";
				$result=mysqli_query($con,$query);
				
				if($result){
					echo "Record Successfully Deleted.";
				}else{
					echo "Please check your Query";
				}
					
			}else{
				die("Database is not Connected");
			}
		}
?>

<?php 
		if(isset($_POST["display"]))
		{
			$con=mysqli_connect("localhost","root","","test");
			$rollno=$_POST["rollno"];
			$name = $_POST["name"];
			
			if($con){
				$query="select * from tybca";
				$result=mysqli_query($con,$query);
				
				if($result){
					
					$numRow=mysqli_num_rows($result);
					if($numRow>0){
						?>
<table border="1">
	<thead>
		<tr>
			<td>Roll NO</td>
			<td>Name</td>
		</tr>
	</thead>
	<tbody>
		<?php
			while($row=mysqli_fetch_assoc($result)){
				$rollno=$row["rollno"];
				$name=$row["name"];
				
				echo "<tr>
				<td>$rollno</td>
				<td>$name</td>
				</tr>";
			}				
		?>
	</tbody>
</table>
						<?php
					}
					
				}else{
					echo "Please check your Query";
				}
					
			}else{
				die("Database is not Connected");
			}
		}
?>