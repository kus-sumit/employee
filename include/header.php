<?php
//session_start();
//$_SESSION["login"]=$email;
include ('connection.php');
$sql= "SELECT * FROM employee_signup WHERE email='".$_SESSION["login"]."'";
//echo $sql; die();
$result= mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
//echo $row['photo']; 
//echo $row['name']; die();
?>
<!--<input type="hidden" name="user_id" id="user_id" value="<?php echo $rows['user_id']; ?>">-->
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-3" style="background-color:yellow;">
		<div class="col-sm-3" >
		<!--<img src="include/igr.jpg" class="kus_addimg" name="adminimg" id="adminimg" width="60" height="60"/>-->
		
		<a  href="dashboard.php">
<img src="EX _IMG/Circle-K-1.png" class="kus_addim" name="adminimg" id="adminimg" width="60" height="60"/>
</a>
		
		</div>
				<div class="col-sm-3" >
				<a class="dash" href="dashboard.php">Dashboard</a>
					</div>
	    
    </div>
    <div class="col-lg-9" style="background-color:pink;">

		<div class="col-md-6 kus_rt" >
			    <div class="col-sm-3" >

		<span class="kus_l"><img src="images/<?php echo $row['photo'] ?>" class="kus_addimg" name="adminimg" id="adminimg" width="60" height="60"/>	</span>	
</div>
<div class="col-sm-6" >
<h3 class="kus_name"><?php echo $row['name']; ?></h3></div>
<div class="col-sm-3" >
      <p class="kus_logout">
	  <a href="./logout.php" class="logout" >Logout</a></p>  </div></div>
    </div>
  </div>
</div>




















  <style>
  
a.dash {
    font-weight: 700;
    font-size: 20px;
    margin: 0;
    line-height: 3;
    vertical-align: middle;
    border-radius: 2px 19px;
    background: #000;
    color: #fff;
    padding: 4px 9px;
    transition: all 0.3s ease-in;
}
a.dash:hover {
    text-decoration: none;
    color: #ffffff;
    background: #58c552;
    border-radius: 10px 0px 10px 10px;
}


  .kus_addimg {
    border-radius: 100px;
    margin: 0 42px;
    border: 1px solid #2030a5;
}

h3.kus_name {
    border: 1px solid #000;
    font-size: 16px;
    padding: 6px 8px;
}
.kus_rt {
    float: right;
}
a.logout {
    /* float: right; */
    border: 0px;
    background: #337ab7;
    padding: 6px 10px;
    color: #fff;
}
  
 p.kus_logout {
    margin: 25px 0 13px;
/*     float: right;
 */} 
  </style>



