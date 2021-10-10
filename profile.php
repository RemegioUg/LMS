<?php

session_start();
$_SESSION;
include("connection.php");
include("functions.php");
$user_data = check_login($con);

    $user_id = $_SESSION['user_id'];
    $sql = "SELECT * FROM login WHERE user_id = $user_id";
    $stmt = mysqli_query($con, $sql);
    if (mysqli_num_rows($stmt)==1) {
        $result = mysqli_fetch_assoc($stmt);

            // Retrieve individual field value
        $username = $result["user_name"];
        $firstname = $result["First_Name"];
        $lastname = $result["Last_Name"];
        $email = $result["Email"];
        
        if (isset($_POST['submit'])) {
            
            $pd = $_POST['password1'];
            $cpd = $_POST['password2'];

            if ($pd===$cpd) {
                $rsql = "UPDATE login SET password = '$pd' WHERE user_id = $user_id";
                $pass = mysqli_query($con, $rsql);
                if ($pass) {
                    echo "Password was reset";
                }
            }else {
                echo "Password missmatch!!";
            }

        }
    }   mysqli_close($con);

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
    <link rel="stylesheet" href='./font-awesome-4.7.0/font-awesome-4.7.0/css/font-awesome.min.css'> 
</head>
    <link rel="stylesheet" href="style.css">
    <style>
    form input{
        width:40%;
    }
    .conatiner .container-fluid{
        width:70%;
    }
    </style>
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
                    <a href="borrowed_book.php"><i class="fa fa-drivers-license-o fa-lg"></i> <i>Borrowed Books</i> </a>
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
        <main>     <div style="background-image: url(./Resources/back2.jpg);"></div>
    
            
            
            
            
        <div class="recent-grid">
                <div class="manage-books">
                    <div class="card">
                        <div class="card-header">
                        <h4>My Profile</h4>
                           
                        </div>
                        <div class="card-body">
                        <div class="container-fluid">
                <div style="width:70%; margin:20px auto">
                   
                    <img src="./Resources/user.png" width="50px" height="50px" >
                </div>
                <div class="row conatiner container-fluid " style="width:70%; margin:20px auto">
                    <div class="col-md-12">

                        <form action='' method="post">
                            <h4>Adminstrator</h4>
                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" name="firstname" disabled class="form-control" style="width:60%;" value="<?php echo $firstname; ?>">
                                
                            </div>
                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" name="lastname" disabled class="form-control" style="width:60%;" value="<?php echo $lastname; ?>">
                                
                            </div>
                            <div class="form-group">
                                <label>User Name</label>
                                <input type="text" name="username" disabled class="form-control" style="width:60%;" value="<?php echo $username; ?>">
                                
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="email" disabled  class="form-control" style="width:60%;" value="<?php echo $email; ?>">
                                
                            </div>
                           
                            <div >
                                <h4>To Change your password</h4>
                                <label>Enter new password</label>
                               
                                <input type="password" class=" form-control mb-2 mr-sm-2" placeholder="enter new password" style="width:60%;" name="password1" required >
                                <label>Confirm password</label>
                                <input type="password" class=" form-control mb-2 mr-sm-2" placeholder="confirm new password" style="width:60%;" name="password2" required>
                                <input type="submit" name="submit" class = 'btn btn-primary' >
                            </div>
                            
                        </form>
                    </div>
                </div>        
            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
         
        </main>
</body>
</html>