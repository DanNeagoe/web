<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Admin panal</title></head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<link rel="stylesheet" href="css/style.css">
<style type="text/css">
table, th, td {
  border: 1px solid;
}

h3 {
  position: absolute;
  right: 100px;
  top: 20px;
}

/*
th, td {
	background-color: crimson;
}*/

</style>
<body>
	  <h1 class="text-danger">WELCOME ADMIN!</h1>
	  <p class="lead" >
	  Choose option from Below to take action!!!!
	  Create new user account click button <a class="btn btn-outline-primary"  data-bs-target="offcanvas" href="register_form.php" role="button">here</a></p>
	  <h3><a class="btn btn-outline-danger"  data-bs-target="offcanvas" href="logout.php" role="button">logout</a></h3>
	  <?php
	  include 'config.php';
	  $sql="select * from user_form ";
	  $row=mysqli_query($conn,$sql);
	  ?>
	  	  <div class="form-container" > 

			<table class="table table-striped" border="3" style="width: 90%; height: 90%"><tbody><tr align="center"> 
			<th class="table-danger">ID</th> 
			<th class="table-danger">NAME</th> 
			<th class="table-danger">EMAIL</th> 
			<th class="table-danger">PASSWORD</th> 
			<th class="table-danger">UPDATE</th> 
			<th class="table-danger">DELETE</th> 	
	  <?php
			  
	  while($data=mysqli_fetch_array($row,MYSQLI_ASSOC))
	  {
	  ?>
	  <tr class="table-danger">
	  <td class="table-danger"><?php echo $data['id']; ?></td>
	  <td class="table-danger"><?php echo $data['name']; ?></td>
	  <td class="table-danger"><?php echo $data['email']; ?></td>
	  <td class="table-danger"><?php echo $data['password']; ?></td>
	  <td class="table-danger"><a class="btn btn-outline-success"  data-bs-target="offcanvas" href="userupdateadmin.php?id=<?php echo $data['id']; ?>" role="button">update</a></td>

	  <td class="table-danger"><a class="btn btn-outline-danger" data-bs-toggle="offcanvas" href="deleteusers.php?id=<?php echo $data['id']; ?>" role="button" aria-controls="offcanvasExample">delete</a></td>
	  </tr>
	  <?php
	  }
	  
	  ?>
	  </table>
	  
	  </div>
	
</div>
</body>
</html>