<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="main.css">
	<script src="main.js"></script>
</head>

<body>



	<ul>
		<li><a href="#home">View Marks</a></li>
		<li><a href="#news">Insert Marks</a></li>
		<li><a href="#contact">Update Marks</a></li>
		<li style="float:right"><a class="active" href="#about">About</a></li>
	</ul>

	<!-- Mark Saech Portion-------------------- Start -->
	<div style="background-color: aquamarine; height: 800px; display:flex; justify-content: center;">

		<div style="background-color: lightgray; height: 400px; width: 455px; margin: 10px; padding:10px;">
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
		Student ID : <input type="text" name="stdidTextBox" placeholder="Input Student Id Here">

		<br>
		<input type="submit" name="submitSearch" value="Search">
        </form>
        <?php
				if(isset($_POST['submitSearch']) && isset($_POST['stdidTextBox']))
				{
					$id = $_POST['stdidTextBox'];

				$conn = mysqli_connect("localhost","root","","advprjectdata");
				if($conn){
					//echo "Db connected !!!"."<br>";
					$sql = "call studentMarks('$id');";
					if($result = mysqli_query($conn,$sql)){
						
						while($row = mysqli_fetch_assoc($result)){
							
							echo $row['c_code'] ."   ". $row['c_name'] ."   ".$row['marks']."<br>";
						}

						
					}
	
				}

             else
             {
	            echo "Db not connected !!!";

			 }
			}
			?>
		</div>
	<!-- Mark Saech Portion-------------------- End -->



	<!-- Mark Insert Portion-------------------- Start -->

		<div style="background-color: lightgray; height: 400px; width: 455px; margin: 10px; padding:10px;">
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
		Student ID : <input type="text" name="stdidInTextBox" placeholder="Input Student Id Here"><br>
		Teacher ID : <input type="text" name="tsridTextBox" placeholder="Input Student Id Here"><br>
		Course Code : <input type="text" name="corscodTextBox" placeholder="Input Student Id Here"><br>
		Course Marks : <input type="text" name="corsmrkTextBox" placeholder="Input Student Id Here">

		<br>
		<input type="submit" name="submitInsert" value="Submit">
        </form>
        <?php
				if(isset($_POST['submitInsert']) && isset($_POST['stdidInTextBox']) && isset($_POST['tsridTextBox']) && isset($_POST['corscodTextBox']) && isset($_POST['corsmrkTextBox']))
				{
					$s_id = $_POST['stdidInTextBox'];
					$t_id = $_POST['tsridTextBox'];
					$c_cod = $_POST['corscodTextBox'];
					$c_mrk = $_POST['corsmrkTextBox'];

				$conn = mysqli_connect("localhost","root","","advprjectdata");
				if($conn){
					//echo "Db connected !!!"."<br>";
					$sql = "call stdMarkInsert('$s_id','$t_id','$c_cod','$c_mrk');";
					if($result = mysqli_query($conn,$sql)){
						  echo "<lebel>Data Inserted!!!!!</lebel>";
					}
					else
					{
						echo "<lebel>Something Went Wrong!!!!!</lebel>";
					}
	
				}

             else
             {
	            echo "Db not connected !!!";

			 }
			}
			?>
		</div>
	<!-- Mark Insert Portion-------------------- End -->



	<!-- Mark Update Portion-------------------- Start -->
		<div style="background-color: lightgray; height: 400px; width: 455px; margin: 10px; padding:10px;">
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
		Student ID : <input type="text" name="ssidTextBox" placeholder="Input Student Id Here"><br>
		Teacher ID : <input type="text" name="ttidTextBox" placeholder="Input Student Id Here"><br>
		Course Code : <input type="text" name="ccodTextBox" placeholder="Input Student Id Here"><br>
		Course Marks : <input type="text" name="ccmrkTextBox" placeholder="Input Student Id Here">

		<br>
		<input type="submit" name="submitUpdate" value="UPDATE">
        </form>
        <?php
				if(isset($_POST['submitUpdate']) && isset($_POST['ssidTextBox']) && isset($_POST['ttidTextBox'])&& isset($_POST['ccodTextBox'])&& isset($_POST['ccmrkTextBox']))
				{
					$s_id = $_POST['ssidTextBox'];
					$t_id = $_POST['ttidTextBox'];
					$c_cod = $_POST['ccodTextBox'];
					$c_mrk = $_POST['ccmrkTextBox'];

				$conn = mysqli_connect("localhost","root","","advprjectdata");
				if($conn){
					//echo "Db connected !!!"."<br>";
					$sql = "call stdMarkUpdate('$s_id','$t_id','$c_cod','$c_mrk');";
					if($result = mysqli_query($conn,$sql)){
						while($row = mysqli_fetch_assoc($result)){
							
							echo $row['status'] ."<br>";
						}
					}
					else
					{

					}
	
				}

             else
             {
	            echo "Db not connected !!!";

			 }
			}
			?>
		</div>
	<!-- Mark Update Portion-------------------- End -->


		

	</div>
</body>
</html>