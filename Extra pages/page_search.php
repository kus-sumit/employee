 <?php
        error_reporting(E_ALL & ~E_NOTICE);
        error_reporting(E_ERROR | E_PARSE);
        session_start();

    ?>

    <?php

       include ('connection.php'); 

        $results_per_page = 3;
        $select= "SELECT * FROM employee_insert";
        $result = mysqli_query($conn, $select);
        $number_of_results = mysqli_num_rows($result);

        if(!isset($_GET['page']))
        {
            $page = 1;
        }
        else
        {
            $page = $_GET['page'];
        }

        $this_page_first_result = ($page-1)*$results_per_page;

        $sql = "SELECT * FROM employee_insert LIMIT " . $this_page_first_result . ',' . $results_per_page;
        $result = mysqli_query($conn, $sql);

        $number_of_pages = ceil($number_of_results/$results_per_page);


    ?>

    <div id="paging-div">
    <?php
        for($page=1;$page<=$number_of_pages;$page++)
        {
            echo '<a id="pagingLink" href="adminControl.php?page=' . $page . '">' . $page . '</a>';
        }
    ?>

    <?php
        if(isset($_POST['search']))
        {
            $valueToSearch = $_POST['valueToSearch'];
            $query = "SELECT * FROM employee_insert WHERE CONCAT(name, department, gender, salary)LIKE '%".$valueToSearch."%'";
            //$search_result = filterTable($query);
			$filter_result= mysqli_query($conn,$query);
        }
        else
        {
            $query = "SELECT * FROM employee_insert";
            $filter_result= mysqli_query($conn,$query);
        }

        /* function filterTable($query)
        {
            $conn = mysqli_connect("localhost", "root", "", "srdatabase");
            $filter_Result = mysqli_query($conn, $query);
            return $filter_Result;
        } */
    ?>


    </div>
    <!DOCTYPE html>
    <html>
    <head>
    <title>Admin Control</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    </head>
    <body>

    <div class="topnav" id="myTopnav">
        <a href="index.php">Home</a>
        <a href="speaker.php">Speakers</a>
        <a href="about.php">About</a>
        <a href="contact.php">Contact</a>
        <a href="reservation.php">Reservation</a>
        <a href="signOut.php" id="signOut" style="float:right">Sign Out</a>
        <a href="user.php" id="user" style="float:right; text-transform:capitalize;"><?php echo $_SESSION['firstname']; ?></a>
        <a href="signUp.php" id="signUp" style="float:right">Sign Up</a>
        <a href="signIn.php" id="signIn" style="float:right" onclick="document.getElementById('id01').style.display='block'">Sign In</a>
        <a href="adminControl.php" id="adminControl" style="float:right; width:110px;">Admin control</a>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a>
    </div>

    <br>
    <br>
    <br>
    <br>
    <h4 style="padding-left:10px; text-align:center;">Reservation List</h4>
    <hr>

    <form action="adminControl.php" method="POST">
    <input type="text" name="valueToSearch" placeholder="type a value">
    <input type="submit" name="search" value="Filter">
    </form>
    <br>
    <br>
    <div style="overflow-x:auto;">
        <table class="employee_insert-table">
        <tr>
			<th>&nbsp;Sl.No&nbsp;</th>

			<th>&nbsp;Employee Name&nbsp;</th>

			<th>&nbsp;Mobile&nbsp;</th>
			<th>&nbsp;Email&nbsp;</th>
			<th>&nbsp;Gender&nbsp;</th>
			<th>&nbsp;Description&nbsp;</th>
			<th>&nbsp;Image&nbsp;</td>
			<th>&nbsp;Salary&nbsp;</th>
			<th>&nbsp;Status&nbsp;</th>
<th colspan=2 style="text-align: center;">&nbsp;Action</th>
        </tr>
         <?php while($row = mysqli_fetch_array($filter_result)):?>
                    <tr>
						<td>&nbsp;<?php echo $row['emp_id'] ?></td>

						<td>&nbsp;<?php echo $row['name'] ?></td>

						<td>&nbsp;<?php echo $row['mobile'] ?>&nbsp;</td>
						<td>&nbsp;<?php echo $row['email'] ?>&nbsp;</td>
						<td>&nbsp;<?php echo $row['gender'] ?></td>
						<td>&nbsp;&nbsp;<?php echo $row['description'] ?>&nbsp;&nbsp;</td>
						<td>&nbsp;<?php echo '<img src="images/'.$row['image'].'"  style="border: 2px solid #23d423; border-radius: 50px; width: 70px; height: 70px;" />' ?>&nbsp;</td>
						<td>&nbsp;<?php echo $row['salary'] ?>&nbsp;</td>
						<td>&nbsp;<?php echo $row['status'] ?></td>
						<td><?php echo '<a class="update" onclick="return checkUpdate()" href="update.php?edit_id='.$row['emp_id'].'">Update</a>' ?></td>
						<td><?php echo '<a class="delete" onclick="return checkDelete()" href="delete.php?delete_id='.$row['emp_id'].'">Delete</a>' ?></td>


					</tr>
                    <?php endwhile;?>
        </table>
        </form>
    </div>

    <?php

        $epr='';
        $msg='';
        if(isset($_GET['epr']))
        $epr=$_GET['epr'];

        if($epr=='delete')
        {
           $id=$_GET['id'];
           $delete=mysqli_query($conn, "DELETE FROM employee_insert WHERE id=$id");
           if($delete)
             header('location:adminControl.php');
           else
             $msg='Error :'.mysqli_error(); 
        }
    ?>

    <?php

        $epr='';
        $msg='';
        if(isset($_GET['epr']))
        $epr=$_GET['epr'];

        if($epr=='approve')
        {
           $id=$_GET['id'];
           $approve=mysqli_query($conn, "UPDATE employee_insert SET employee_inserttatus='approved' WHERE id=$id");
           header('location:adminControl.php');
        }
    ?>

    <script>
    function myFunction() {
        var x = document.getElementById("myTopnav");
        if (x.className === "topnav") {
            x.className += " responsive";
        } else {
            x.className = "topnav";
        }
    }
    </script>

    <script>
    function ifAdmin() 
    { 
       document.getElementById("signIn").style.display = "none";
       document.getElementById("signUp").style.display = "none";
       document.getElementById("signOut").style.display = "block";
       document.getElementById("adminControl").style.display = "block";
    }
    </script>

    <script>
    function ifNotAdmin() 
    { 
       document.getElementById("signIn").style.display = "none";
       document.getElementById("signUp").style.display = "none";
       document.getElementById("signOut").style.display = "block";
       document.getElementById("adminControl").style.display = "none";
    }
    </script>

    <script>
    function ifNotLogin() 
    { 
       document.getElementById("user").style.display = "none";
       document.getElementById("signOut").style.display = "none";
       document.getElementById("adminControl").style.display = "none";
    }
    </script>

    <?php

        if (isset($_SESSION['signedIn']) && $_SESSION['signedIn'] == true) 
            //if login
            {
                if($_SESSION['type'] == 1)
                {
                    echo "<script type='text/javascript'>ifAdmin();</script>";  
                }
                elseif($_SESSION['type'] == 0)
                {
                    echo "<script type='text/javascript'>ifNotAdmin();</script>";
                }
            }
            //if not login
            else
            {
                echo "<script type='text/javascript'>ifNotLogin();</script>";   
            }
    ?>

    <div id="footer" class="push">Copyright 2017</div>

    </body>
    </html>
