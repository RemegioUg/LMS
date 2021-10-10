<?php
session_start();
$_SESSION;
include("connection.php");
include("functions.php");
$user_data = check_login($con);

// Get URL parameter
$id =  $_GET["student"];
                        
if(isset($_GET["student"]) && !empty($_GET["student"])){
    
    $ssql = "SELECT * FROM student WHERE Reg_No = '$id' ";
    $query = mysqli_query($con, $ssql);
    $sresult = mysqli_fetch_assoc($query);
    
    // Retrieve individual field value
    $Reg_No = $sresult["Reg_No"];
    $firstname = $sresult["First_Name"];
    $lastname = $sresult["Last_Name"];
    $tel_No = $sresult["Tel_No"];
    $course = $sresult["Course"];
    $year = $sresult["Year"];
    $semester = $sresult["Semester"];
    $faculty = $sresult["Faculty"];

        // Define variables and initialize with empty values
        $Reg_Noi = $lastnamei = $firstnamei = $teli = $coursei = $yeari = $semesteri = $facultyi = "";
        $Reg_No_err = $lastname_err = $firstname_err = $tel_No_err = $course_err = $year_err = $semester_err = $faculty_err = "";
        
    // Processing form data when form is submitted
    if(isset($_POST["student"]) && !empty($_POST["student"])){
        // Get hidden input value
        //$id = $_POST["id"];

        // Validate name
        $input_lastname = trim($_POST["lastname"]);
        if(empty($input_lastname)){
            $lastname_err = "Please enter a name."; echo $lastname_err; 
        } elseif(!filter_var($input_lastname, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
            $lastname_err = "Please enter a valid name."; echo $lastname_err; 
        } else{
            $lastnamei = $input_lastname;
        }

        // Validate name
        $input_firstname = trim($_POST["firstname"]);
        if(empty($input_firstname)){
            $firstname_err = "Please enter a name."; echo $firstname_err;
        } elseif(!filter_var($input_firstname, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
            $firstname_err = "Please enter a valid name."; echo $firstname_err;
        } else{
            $firstnamei = $input_firstname;
        }
        
        // Validate email 
        $input_tel_No = trim($_POST["tel_No"]);
        if(empty($input_tel_No)){
            $tel_No_err = "Please enter the tel number."; echo $tel_No_err;    
        } elseif(!ctype_digit($input_tel_No)){
            $tel_No_err = "Please enter a positive integer value."; echo $tel_No_err;
        } else{
            $tel_Noi = $input_tel_No;
        }

        // Validate course
        $input_course = trim($_POST["course"]);
        if(empty($input_course)){
            $course_err = "Please enter a name."; echo $course_err;
        } elseif(!filter_var($input_course, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
            $course_err = "Please enter a valid name."; echo $course_err;
        } else{
            $coursei = $input_course;
        }

        // Validate year
        $input_year = trim($_POST["year"]);
        if(empty($input_year)){
            $year_err = "Please enter the salary amount.";  echo $year_err;   
        } elseif(!ctype_digit($input_year)){
            $year_err = "Please enter a positive integer value."; echo $year_err;
        } else{
            $yeari = $input_year;
        }

        // Validate semester
        $input_semester = trim($_POST["semester"]);
        if(empty($input_semester)){
            $semester_err = "Please enter the salary amount."; echo $semester_err;    
        } elseif(!ctype_digit($input_semester)){
            $semester_err = "Please enter a positive integer value."; echo $semester_err;
        } else{
            $semesteri = $input_semester;
        }
        
        // Validate faculty
        $input_faculty = trim($_POST["faculty"]);
        if(empty($input_faculty)){
            $faculty_err = "Please enter a name."; echo $faculty_err;
        } elseif(!filter_var($input_faculty, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
            $faculty_err = "Please enter a valid name."; echo $faculty_err;
        } else{
            $facultyi = $input_faculty;
        }
        
        // Check input errors before inserting in database
        if(empty($Reg_No_err) && empty($firstname_err) && empty($lastname_err) && empty($tel_No_err) && empty($course_err) && empty($year_err) && empty($semester_err) && empty($faculty_err) && isset($_POST['update'])){
            // Prepare an update statement
            $sqlr = "UPDATE student SET First_Name='$firstnamei', Last_Name='$lastnamei', Tel_No='$tel_Noi', Course='$coursei', Year='$yeari', Semester='$semesteri', Faculty='$facultyi' WHERE Reg_No='$id'";
            
            $results = mysqli_query($con, $sqlr);

            if (!$results) {
                echo "Updation Failed!!!";
            }else {
                echo "Updation successively.";
                header("location: Students.php");
            }
            
        }else {
            
            echo '<script>
                   alert("Verify the inputs.");
                   window.location.href = "update_student.php";
            </script>';
        } 
    }
    mysqli_close($con);
}else{
    echo"URL doesn't contain id parameter.";  //Redirect to error page
    //header("location: error.php");
    
    exit();
}
?>
 
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="./Resources/code-base2.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
    <title>Library Management System</title>
    <link rel="stylesheet" href="./bootstrap-4.0.0-dist/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="./bootstrap-4.0.0-dist/css/bootstrap.css">
    <script src="./bootstrap-4.0.0-dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href='./font-awesome-4.7.0/font-awesome-4.7.0/css/font-awesome.min.css'> </head>
    <link rel="stylesheet" href="style.css">
<body>
    <input type="checkbox" id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
            <h2>Library Management System</h2>
        </div>
        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="" class="active"><i class="fa fa-igloo"></i> <i>Dashboard</i> </a>
                </li>
                <li>
                    <a href="Admin.php"><i class="fa fa-book fa-lg"></i> <i>Manage Books</i> </a>
                </li>
                <li>
                    <a href="Students.php"><i class="fa fa-users fa-lg"></i> <i>Manage Students</i> </a>
                </li>
                <li>
                    <a href="Borrowed.php"><i class="fa fa-drivers-license-o fa-lg"></i> <i>Borrowed Books</i> </a>
                </li>
                <li>
                    <a href="profile.php"><i class="fa fa-cog fa-lg"></i><i>Settings</i> </a>
                </li>
                <li>
                    <a href="logout.php"><i style="color: red;" class="fa fa-power-off fa-lg"></i><i>Log Out</i> </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="main-content">
        <header>
            <h2>
                <label for="nav-toggle"><i class="fa fa-bars"></i></label> Dashboard
            </h2>
            <div class="search-wrapper">
                <i class="fa fa-search"></i>
                <input type="search" placeholder="search here">
            </div>
            <div class="user-wrapper">
                <img src="Resources/code-base2.png" width="30px" height="40px" alt="">
                <h4>Group-3</h4>
                <small>Admin</small>
            </div>
        </header>
        <main> 
        
            <div class="manage-books">
                <div class="card">

                
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <a href="Students.php" class="btn btn-primary">Back</a>
                                <h4>Please edit the input values and submit to update the student record.</h4>
                                
                                <form action='' method="post">
                                    <div class="form-group">
                                        <label>Registration No</label>
                                        <h6><?php echo $Reg_No; ?></h6>
                                        
                                    </div>
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input type="text" name="firstname" class="form-control" value="<?php echo $firstname; ?>">
                                        <span class="invalid-feedback"><?php echo $firstname_err;?></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input type="text" name="lastname" class="form-control" value="<?php echo $lastname; ?>">
                                        <span class="invalid-feedback"><?php echo $lastname_err;?></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Tel Number</label>
                                        <input type="text" name="tel_No" class="form-control" value="<?php echo $tel_No; ?>">
                                        <span class="invalid-feedback"><?php echo $tel_No_err;?></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Course</label>
                                        <input type="text" name="course" class="form-control" value="<?php echo $course; ?>">
                                        <span class="invalid-feedback"><?php echo $course_err;?></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Year</label>
                                        <input type="text" name="year" class="form-control" value="<?php echo $year; ?>">
                                        <span class="invalid-feedback"><?php echo $year_err;?></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Semester</label>
                                        <input type="text" name="semester" class="form-control" value="<?php echo $semester; ?>">
                                        <span class="invalid-feedback"><?php echo $semester_err;?></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Faculty</label>
                                        <input type="text" name="faculty" class="form-control" value="<?php echo $faculty; ?>">
                                        <span class="invalid-feedback"><?php echo $faculty_err;?></span>
                                    </div>

                                    <input type="hidden" name='student' value="<?php echo $id; ?>"/>
                                    <input type="submit" onclick="return confirm('Are you sure you want to update')" class="btn btn-primary" value="Submit" name='update'>
                                    <a href="Students.php" class="btn btn-secondary ml-2">Cancel</a>
                                </form>
                            </div>
                        </div>        
                    </div>
                </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>