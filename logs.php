<!doctype html>
<html>
	<head>
		<title>Log Entry System</title>
		<meta charset="utf-8">
	</head>
	<body>
		<?php
			if($storeset = isset($_POST['store'])){$store=$_POST['store'];}
			if($firstset = isset($_POST['firstname'])){$firstname=$_POST['firstname'];}
			if($lastset  = isset($_POST['lastname'])){$lastname=$_POST['lastname'];}
			if($titleset = isset($_POST['title'])){$title=$_POST['title'];}
		?>
		<form action="logs.php" method="post" autocomplete="off">
			<div id="person" style="display:inline-block;background-color:#AAAAFF">
				<fieldset style="display:inline-block;vertical-align:top"><br>Store<br><input type="text" size="2" name="store" <?php if($storeset){printf("value=%s",$store);}?>><br><br><br></fieldset>
				<fieldset style="display:inline-block;padding:0px">
					<input type="radio" name="title" value="ASM"<?php if($titleset){if($title=="ASM"){print("checked");}}?>>ASM<br>
					<input type="radio" name="title" value="SSL"<?php if($titleset){if($title=="SSL"){print("checked");}}?>>SSL<br>
					<input type="radio" name="title" value="MSA"<?php if($titleset){if($title=="MSA"){print("checked");}}?>>MSA<br>
					<input type="radio" name="title" value="CSM"<?php if($titleset){if($title=="CSM"){print("checked");}}?>>CSM<br>
					<input type="radio" name="title" value="DSL"<?php if($titleset){if($title=="DSL"){print("checked");}}?>>DSL<br>
				</fieldset>
				<fieldset style="display:inline-block;vertical-align:top"><br>First<br><input type="text" size="5" name="firstname"<?php if($firstset){printf("value=%s",$firstname);}?>><br><br><br></fieldset>
				<fieldset style="display:inline-block;vertical-align:top"><br>Last<br><input type="text" size="5" name="lastname"<?php if($lastset){printf("value=%s",$lastname);}?>><br><br><br></fieldset>
			</div>
			<input type="submit">
		</form>
		<?php
		if(!isset($employee)&&($storeset||$firstset||$lastset||$titleset)){
			$db = new mysqli('localhost', 'j', 'abc', 'loss_prevention');
			if($db->connect_errno > 0){die('unable to connect to database');}
			$query='SELECT * FROM employees WHERE title LIKE "ASM"';
			//$query="%".$firstname."%";
			//$query=sprintf('SELECT lastname FROM employees WHERE first_name LIKE "%s"',$query);
			//print $query;
			if(!$results=$db->query($query)){print "Query did not work!";}
			//$row=$results->fetch_assoc();
			//echo $row['first_name'];
			//$row=$results->fetch_assoc();
			//echo $row['last_name'];
			print_r($results->fetch_assoc());
		}
		?>
	</body>
</html>