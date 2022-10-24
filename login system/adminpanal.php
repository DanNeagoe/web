<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title></head>
<link rel="stylesheet" href="css/style.css">
<style type="text/css">
table, th, td {
  border: 1px solid;
}
th, td {
	background-color: crimson;
}
</style>
<body>
	  <h1>welcome admin</h1>
	  Choose option from Below to take action!!!!
	  Create new Booking click <a href="reservation.php"> Here</a>
	  <?php
	  include('db.php');
	  $sql="select * from roomdetail ";
	  $row=mysqli_query($con1,$sql);
	  ?>
	  	  <div class="form-container"> 

			<table border="3" style="width: 100%; height: 100%"><tbody><tr align="center"> 
	  <?php
			  
	  while($data=mysqli_fetch_array($row,MYSQLI_ASSOC))
	  {
	  ?>

	  <tr>
	  <td><?php echo $data['id']; ?></td>
	  <td><?php echo $data['username']; ?></td>
	  <td><?php echo $data['checkin_date']; ?></td>
	  <td><?php echo $data['checkout_date']; ?></td>
	  <td><?php echo $data['room_type']; ?></td>
	  <td><?php echo $data['no_of_room']; ?></td>
	  <td><?php echo $data['amount']; ?></td>
	  <td><a href="update.php?id=<?php echo $data['id']; ?>">update</a></td>
	  <td><a href="delete.php?id=<?php echo $data['id']; ?>">delete</a></td>
	  </tr>
	  <?php
	  }
	  
	  
	  ?>
	  </table>
	  
	  </div>
	
</div>
</body>
</html>
