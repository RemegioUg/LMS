<?php
session_start();
$_SESSION;
include("connection.php");
include("functions.php");
$user_data = check_login($con);

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
                    <a href=""><i class="fa fa-cog fa-lg"></i><i>Settings</i> </a>
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
                <!-- <img src="Resources/code-base2.png" width="30px" height="40px" alt=""> -->
                <h4>Group-3</h4>
                <small>Admin</small>
            </div>
        </header>
        <main>
            <div class="cards">
                <div class="card-single">
                    <div>
                        <h1>50</h1>
                        <span>Students </span>
                    </div>
                    <div>
                        <i class="fa fa-users"></i>
                    </div>
                </div>
                <div class="card-single">
                    <div>
                        <h1>50</h1>
                        <span>Books </span>
                    </div>
                    <div>
                        <i class="fa fa-book"></i>
                    </div>
                </div>
                <div class="card-single">
                    <div>
                        <h1>50</h1>
                        <span>Borrowed Books </span>
                    </div>
                    <div>
                        <i class="fa fa-drivers-license-o"></i>
                    </div>
                </div>
                <div class="card-single">
                    <div>
                        <h1>50</h1>
                        <span>Returned Books </span>
                    </div>
                    <div>
                        <i class="fa fa-id-card"></i>
                    </div>
                </div>
            </div>
            <div class="recent-grid">
                <div class="manage-books">
                    <div class="card">
                        <div class="card-header">
                            <h2>Available Students</h2>
                            <button><a href="#">Add Student</a></button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table width='100% '>
                                    <thead>
                                        <tr>
                                            <td>Id</td>
                                            <td>Name</td>
                                            <td>Reg_No</td>
                                            <td>Course</td>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Remegio</td>
                                            <td>18/U/0157/LCS</td>
                                            <td>Computer Science</td>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>

</html>