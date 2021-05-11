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
    <style>
         table {
        border-collapse: collapse;
    }
    
    thead tr {
        border-top: 1px solid #f0f0f0;
        border-bottom: 2px solid #f0f0f0;
    }
    
    thead td {
        font-weight: 700;
    }
    
    td {
        padding: .5rem 1rem;
        font-size: .9rem;
        color: #222;
    }
    
    tr td:last-child {
        display: flex;
        align-items: center;
    }
    
    .table-responsive {
        width: 100%;
        overflow-x: auto;
    }
    
    form {
        display: grid;
        grid-template-columns: repeat(1, 1fr);
        background-color: #FFFFFF;
    }
    
    form div {
        padding: .8rem;
    }
    
    form div label {
        margin-left: 20%;
        width: 30%;
        color: Gray;
        font-weight: bold;
        font-size: 1.2rem;
    }
    
    form div input {
        margin-left: 1rem;
        padding: .4rem;
        font-size: 1rem;
        width: 40%;
        background-color: #FFFFFF;
        color: white;
        outline: none;
        border-left: none;
        border-top: none;
        border-right: none;
        border-bottom: 1px solid gray;
    }
    
    button {
        justify-content: center;
        align-items: center;
        margin-left: 50%;
        width: 300px;
        padding: .5rem;
        background-color: var(--main-color);
        color: white;
    }
    
    button span {
        font-size: 2rem;
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
                                <a href="Add-Student.php">Add Student</a>
                            </div>
                            <div class="card-body">
                                <form action="Post">

                                    <div>
                                        <label for="name">Name</label>
                                        <input type="text" placeholder="student name" required name="name">
                                    </div>

                                    <div> <label for="user_name">User Name</label>
                                        <input type="text" placeholder="user_name" required name="user_name">
                                    </div>

                                    <div> <label for="reg">Reg.No</label>
                                        <input type="text" placeholder="Reg.No" required name="reg.no">
                                    </div>

                                    <div> <label for="Department">Department</label>
                                        <input type="text" placeholder="Department" required name="department">
                                    </div>

                                    <div> <label for="phone">Phone_No</label>
                                        <input type="text" placeholder="phone_no" required name="phone_no">
                                    </div>

                                    <div> <label for="password">Password</label>
                                        <input type="password" placeholder="Password" required name="password">
                                    </div>
                                    <div>
                                        <button class="btn "><i class="fa fa-save"></i> <span>save</span> </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </main>
        </div>


    </body>

    </html>