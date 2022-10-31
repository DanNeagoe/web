<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<link rel="stylesheet" href="css/style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

<style type="text/css">
	#contenar{
		height: 100%;
		width: 100%;
		
	}
	#r{
		margin-top: 5%;
		margin-bottom: 5%;
		margin-right: 5%;
		margin-left: 5%;
		float: center;
		background-color: crimson;
		
	}

  h5 {
  position: absolute;
  right: 200px;
  top: 20px;
  }


  h6 {
  position: absolute;
  right: 100px;
  top: 20px;
}
	</style>
</head>

<body>
<h5><a class="btn btn-outline-primary"  data-bs-target="offcanvas" href="user_page.php" role="button">back</a></h5>
<h6><a class="btn btn-outline-danger"  data-bs-target="offcanvas" href="logout.php" role="button">logout</a></h6>
<div class="form-container">
<?php
session_start();
include('db.php');
include('config.php');
if(isset($_POST['sub']))
{
$username=$_SESSION['user_name'];
$roomtype=$_POST['field_1'];
$startdate=$_POST['startdate'];
$enddate=$_POST['enddate'];
$room_nos=$_POST['room_nos'];
$amount=$_POST['roomprice'];
$_SESSION['user_name']=$row['name'];

$checkroom= "select count(*) from roomdetail where room_type='".$roomtype."' ";
$check=mysqli_query($con1,$checkroom);
$roomcount=mysqli_fetch_array($check,MYSQLI_NUM);
 $checkcount=$roomcount[0];
if($checkcount>=10)
{
?> <script>alert("Sorry Rooms Are not Available :( please try another Option !!");</script>
<?php }
else{
$s1="INSERT INTO roomdetail (username,checkin_date,checkout_date,room_type,no_of_room,amount)VALUES('".$username."','".$startdate."','".$enddate."','".$roomtype."','".$room_nos."','".$amount."')";
mysqli_query($con1,$s1);
header("location:reservation.php?success=true");
}
}
?>

<div id="contenar">
	<div id="r">
	<form action="reservation.php" method="POST">
	<h3> please select your preference, mister/miss <?php session_start(); if(isset($_SESSION['user_name'])){ echo $_SESSION['user_name']; } ?>!!!</h3>
  <?php if(isset($_GET['success'])){
		echo '<h4> Your room Booked successfully,You will be contacted soon. !!!</h4>';
	}?>
        <table >
          <tr>
            <td width="113">Check in Date</td>
            <td width="215">
              <input name="startdate1" type="date"  value="<?php if(isset($_POST['startdate1'])){ echo $_POST['startdate1']; }?>" /></td>
          </tr>
          <tr>
            <td>Check out Date</td>
            <td>
              <input name="enddate1" type="date" value="<?php if(isset($_POST['enddate1'])){ echo $_POST['enddate1']; }?>" onchange='this.form.submit()' /></td>
          </tr>
			
       </table>
		</form>
		<form action="reservation.php" method="POST">
        <table >
		
          <tr>
            <td width="113"></td>
            <td width="215">
              <input name="startdate" type="hidden" value=" <?php if(isset($_POST['startdate1'])){ echo $_POST['startdate1']; }?> " /></td>
          </tr>
          <tr>
            <td></td>
            <td><input name="username" type="hidden" value="<?php session_start(); if(isset($_SESSION['user_name'])){ echo $_SESSION['user_name']; } ?>"  />
              <input name="enddate" type="hidden" value=" <?php if(isset($_POST['enddate1'])){ echo $_POST['enddate1']; }?> "  /></td>
          </tr>
		  <tr>
            <td>Room Type </td>
            <td>
              <select class="text_select" id="field_1" name="field_1" >  
<option value="00">- Select -</option>   
<?php if(isset($_POST['startdate1'])){
$paymentDate = $_POST['startdate1'];
$contractDateBegin = '2013-12-20';
$contractDateEnd ='2014-03-25';

if (($paymentDate >= $contractDateBegin) && ($paymentDate <= $contractDateEnd))
{
 $s2="select * from roomtype where room_seson ='high season' ";
$s3=mysqli_query($con1,$s2);
}
else
{
$s2="select * from roomtype where room_seson='low season' ";
$s3=mysqli_query($con1,$s2);
}


?>
<?php while($catdata=mysqli_fetch_array($s3,MYSQLI_ASSOC)) { ?>  <option value="<?php echo $catdata['room_price']; ?>"><?php echo $catdata['room_type']; ?></option>
           <?php } ?>
		   <?php } ?>
           </select></td>
          </tr>
		  <tr>
            <td>Price per Room</td>
            <td>
             <span id="a1"  ></span>$
           </td>
          </tr>
		   <tr>
            <td>No. of Guest per Room</td>
            <td>
              <input name="guest" type="text " size="10"/></td>
          </tr>
		  <tr>
            <td>No. of Rooms </td>
            <td>
              <input name="room_nos" id="room_nos" type="text " size="10" onChange="gettotal1()" /></td>
          </tr>
		  <tr>
            <td>Total Amount To Pay</td>
            <td>
             <input type="text" name="roomprice" id="total1"  size="10px" readonly="" />
           </td>
          </tr>
		  
          <tr>
            <td colspan="2" align="center">
			<input type="submit" name="sub" value="Book" /></td>
            </tr>
			
       </table>
		</form>
		
		<script language="javascript" type="text/javascript">
function notEmpty(){

var e = document.getElementById("field_1");
var strUser = e.options[e.selectedIndex].value;
 var strUser=document.getElementById('a1').innerHTML=strUser;




}
notEmpty()
    
    document.getElementById("field_1").onchange = notEmpty;


   function gettotal1(){
      var gender1=document.getElementById('a1').innerHTML;
      var gender2=document.getElementById('room_nos').value;
      var gender3=parseFloat(gender1)* parseFloat(gender2);
			
      document.getElementById('total1').value=gender3;
	
   }
			</script>
 
		
	</div>
</div>

</div>
</body>
</html>