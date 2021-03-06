<?php
session_start();
$_SESSION;
include("connection.php");
include("functions.php");
$user_data = check_login($con);

if(isset($_POST["reg_user"])){
    
    $Reg_No = mysqli_real_escape_string($con, $_POST['Reg_No']);
    $lastName = mysqli_real_escape_string($con, $_POST['lastname']);
    $firstName = mysqli_real_escape_string($con, $_POST['firstname']);
    $tel_No = mysqli_real_escape_string($con, $_POST['tel_No']);
    $course = mysqli_real_escape_string($con, $_POST['course']);
    $year = mysqli_real_escape_string($con, $_POST['year']);
    $semester = mysqli_real_escape_string($con, $_POST['semester']);
    $faculty = mysqli_real_escape_string($con, $_POST['faculty']);
    $password = mysqli_real_escape_string($con, $_POST['password_1']);
    $confirm = mysqli_real_escape_string($con, $_POST['password_2']);

    if ($password != $confirm) {
        echo "Password missmatch!!!";
    }else {
        $sql = "SELECT * FROM student WHERE Reg_No = '$Reg_No'";
        $result = mysqli_query($con, $sql);
        $user = mysqli_fetch_assoc($result);
        
        if ($user) {
            echo "The student exists.";
        }else {
            $sqlr = "INSERT INTO student (Reg_No, Last_Name, First_Name, Tel_No, Course, Year, Semester, Faculty, Password)
                    VALUES('$Reg_No', '$lastName', '$firstName', '$tel_No','$course', '$year', '$semester', '$faculty', '$password')";
            $results = mysqli_query($con, $sqlr);

            if (!$results) {
                echo "Registration Failed!!!";
            }else {
                echo "Registration successively.";
            }
        }
    }
    
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
    <link rel="stylesheet" href="./bootstrap-4.0.0-dist/css/bootstrap.min.css">
    <script src="./bootstrap-4.0.0-dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href='./font-awesome-4.7.0/font-awesome-4.7.0/css/font-awesome.min.css'> </head>
<style>
     :root {
        --main-color: #DD2F6E;
        --color-dark: #1D2231;
        --text-grey: #8390A2;
    }
    
    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
        list-style: none;
        text-decoration: none;
        font-family: 'poppins', sana-serif;
    }
    
    .sidebar {
        width: 345px;
        position: fixed;
        left: 0;
        top: 0;
        height: 100%;
        background-color: black;
        z-index: 100;
        transition: width 300ms;
    }
    
    .sidebar-brand {
        height: 90px;
        padding: 1rem 0rem 1rem 2rem;
        color: white;
    }
    
    .sidebar-menu {
        margin-top: 1rem;
    }
    
    .sidebar-menu li {
        width: 100%;
        margin-bottom: 1.9rem;
        padding-left: 2rem;
    }
    
    .sidebar-menu a {
        padding-left: 1rem;
        display: block;
        color: white;
        font-size: 1.2rem;
    }
    
    .active {
        padding: 1rem;
    }
    
    .sidebar-menu a.active {
        background-color: white;
        padding-top: 1rem;
        color: var(--main-color);
        border-radius: 30px 0px 0px 30px;
    }
    
    .sidebar-menu a i {
        font-size: 1.5rem;
        padding-right: 1.5rem;
    }
    
    .sidebar-menu a i:first-child {
        font-size: 1.5rem;
        padding-top: 1rem;
        padding-bottom: 1rem;
        color: white;
        border-radius: 30px 0px 0px 30px;
    }
    
    .sidebar-menu a i:first-child {
        font-size: 1.5rem;
        padding-right: 1rem;
    }
    
    #nav-toggle:checked+.sidebar {
        width: 100px;
    }
    
    #nav-toggle:checked+.sidebar {
        width: 100px;
    }
    
    #nav-toggle:checked+.sidebar .sidebar-brand,
    #nav-toggle:checked+.sidebar li a {
        padding-left: 1rem;
        text-align: left;
    }
    
    #nav-toggle:checked+.sidebar li a {
        padding-left: 0rem;
    }
    
    #nav-toggle:checked+.sidebar .sidebar-brand h2 i:last-child,
    #nav-toggle:checked+.sidebar li a i:last-child {
        display: none;
    }
    
    #nav-toggle:checked~.main-content {
        margin-left: 100px;
    }
    
    #nav-toggle:checked~.main-content header {
        width: calc(100%-100px);
        left: 100px;
    }
    
    .main-content {
        transition: marin-left 300ms;
        margin-left: 345px;
    }
    
    header {
        display: flex;
        justify-content: space-between;
        padding: 1.3rem 1.5rem;
        box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
        position: fixed;
        left: 345px;
        width: calc(100% - 345px);
        top: 0;
        z-index: 100;
        transition: left 300ms;
    }
    
    header h2 {
        color: #222;
    }
    
    header label i {
        font-size: 1.7rem;
        padding-right: 1rem;
    }
    
    .search-wrapper {
        border: 1px solid #ccc;
        border-radius: 30px;
        height: 50px;
        display: flex;
        align-items: center;
        overflow-x: hidden;
    }
    
    .search-wrapper i {
        display: inline-block;
        padding: 0rem 1rem;
        font-size: 1.5rem;
        color: #757575;
    }
    
    .search-wrapper input {
        height: 100%;
        padding: .5rem;
        border: none;
        outline: none;
        font-size: 1.5rem;
    }
    
    .user-wrapper {
        display: flex;
        align-items: center;
    }
    /* .user-wrapper img {
        border-radius: 100%;
        margin-right: 1rem;
    } */
    
    .user-wrapper small {
        display: inline-block;
        color: var(--text-grey);
        margin-left: .5rem;
        font-size: 1.5rem;
        font-weight: bold;
    }
    
    main {
        margin-top: 85px;
        padding: 2rem 1.5rem;
        background-color: #f1f5f9;
        min-height: calc(100vh - 90px);
    }
    
    .cards {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        grid-gap: 2rem;
        margin-bottom: 1rem;
    }
    
    .card-single {
        display: flex;
        justify-content: space-between;
        background-color: #fff;
        padding: 2rem;
        border-radius: 2px;
    }
    
    .card-single div:last-child i {
        font-size: 3rem;
        color: var(--main-color);
    }
    
    .card-single div:first-child span {
        color: var(--text-grey);
        font-size: 1.3rem;
        font-weight: regular;
    }
    
    @media only screen and (max-width:1200px) {
        .sidebar {
            width: 100px;
        }
        .sidebar .sidebar-brand,
        .sidebar li {
            padding-left: 1rem;
            text-align: center;
        }
        .sidebar li a {
            padding-left: 0rem;
        }
        .sidebar .sidebar-brand h2 i:last-child,
        .sidebar li a i:last-child {
            display: none;
        }
        .main-content {
            margin-left: 100px;
        }
        .main-content header {
            width: calc(100%-100px);
            left: 100px;
        }
        .sidebar:hover {
            width: 345px;
            z-index: 200;
        }
        .sidebar:hover .sidebar-brand,
        .sidebar:hover li {
            padding-left: 1rem;
            text-align: left;
        }
        .sidebar:hover li a {
            padding-left: 0rem;
        }
        .sidebar:hover .sidebar-brand h2 i:last-child,
        .sidebar:hover li a i:last-child {
            display: inline;
        }
    }
    
    @media only screen and (max-width: 768px) {
        .cards {
            grid-template-columns: repeat(2, 1fr);
        }
        .recent-grid {
            width: 100%;
            grid-template-columns: 100%;
        }
        .search-wrapper {
            display: none;
        }
        .sidebar {
            left: -100% !important
        }
        header h2 {
            display: flex;
            align-items: center;
        }
        header h2 label {
            background: var(--main-color);
            display: inline-block;
            padding-right: 0rem;
            margin-right: 1rem;
            height: 40px;
            width: 40px;
            border-radius: 50%;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center !important;
        }
        header h2 i {
            text-align: center;
            padding-right: 0rem;
        }
        header h2 {
            font-size: 1.1rem;
        }
        .main-content {
            width: 100%;
            margin-left: 0rem;
        }
        header {
            width: 100% !important;
            left: 0 !important;
        }
        #nav-toggle:checked+.sidebar {
            left: 0 !important;
            z-index: 100;
            width: 345px;
        }
        #nav-toggle:checked+.sidebar .sidebar-brand,
        #nav-toggle:checked+.sidebar li {
            padding-left: 2rem;
            text-align: left;
        }
        #nav-toggle:checked+.sidebar li a {
            padding-left: 1rem;
        }
        #nav-toggle:checked+.sidebar .sidebar-brand h2 i:last-child,
        #nav-toggle:checked+.sidebar li a i:last-child {
            display: inline;
        }
        #nav-toggle:checked+.main-content {
            margin-left: 0rem !important;
        }
        form div label {
            width: 100%;
        }
    }
    
    @media only screen and (max-width: 560px) {
        .cards {
            grid-template-columns: 100%;
        }
        .recent-grid {
            grid-template-columns: 100%;
        }
    }
    
    .recent-grid {
        margin-top: 3.5rem;
        display: grid;
        grid-gap: 2rem;
        grid-template-columns: repeat(1, ifr);
    }
    
    .card {
        background-color: white;
        border-radius: 5px;
    }
    
    .card-header {
        padding: 1rem;
    }
    
    .card-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 2px solid #f0f0f0;
    }
    
    .card-header button {
        background-color: var(--main-color);
        border-radius: 10px;
        color: white;
        font-size: .8rem;
        padding: .5rem 1rem;
        border: 1px solid var(--main-color);
    }
    
    .card-header button a {
        color: white;
        text-decoration: none;
        font-weight: bold;
        font-size: .8rem;
    }
    
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
        margin-left: 10%;
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
        /* background-color: #FFFFFF; */
        color: gray;
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
                    <a href="Borrowed_book.php"><i class="fa fa-drivers-license-o fa-lg"></i> <i>Borrowed Books</i> </a>
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
                <!-- <img src="Resources/code-base2.png" width="30px" height="40px" alt=""> -->
                <h4>Group-3</h4>
                <small>Admin</small>
            </div>
        </header>
        <main>
            <div class="cards">
            <div class="card-single">
                        <div>
                            <h1>
                                <?php
                                    $usql = "SELECT * FROM student";
                                    $uresult= mysqli_query($con, $usql);
                                    echo mysqli_num_rows($uresult);    
                                ?>
                            </h1>
                            <span>Students </span>
                        </div>
                        <div>
                            <i class="fa fa-users"></i>
                        </div>
                    </div>
                    <div class="card-single">
                        <div>
                            <h1>
                                <?php
                                   $csql = "SELECT * FROM book";
                                   $cresult= mysqli_query($con, $csql);
                                   echo mysqli_num_rows($cresult);
                                ?>
                            </h1>
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
                            <h2><a href="Students.php">Back</a></h2>
                                

                        </div>
                        <div class="form-body">
                        <form method="post" action="">
                                    <div class="input-group">
                                        <label>Registration No:</label>
                                        <input type="text" name="Reg_No" required >
                                    </div>
                                    <div class="input-group">
                                        <label>Last Name:</label>
                                        <input type="text" name="lastname" required >
                                    </div>
                                    <div class="input-group">
                                        <label>First Name:</label>
                                        <input type="text" name="firstname" required >
                                    </div>
                                    <div class="input-group">
                                        <label>Email:</label>
                                        <input type="email" name="email" required  > 
                                    </div>
                                    <div class="input-group">
                                        <label>Course:</label>
                                        <input type="text" name="course" required >
                                    </div>
                                    <div class="input-group">
                                        <label>Year:</label>
                                        <input type="text" name="year" required >
                                    </div>
                                    <div class="input-group">
                                        <label>Semester:</label>
                                        <input type="text" name="semester" required >
                                    </div>
                                    <div class="input-group">
                                        <label>Faculty:</label>
                                        <input type="text" name="faculty" required >
                                    </div>
                                    <div class="input-group">
                                        <label style="display: inline;">Password:</label>
                                        <input type="password" name="password_1" style="display: inline;" required > 
                                    </div>
                                    <div class="input-group">
                                        <label style="display: inline;">Confirm password:</label>
                                        <input type="password" name="password_2"  style="display: inline;" required> 
                                    </div>
                                    <div class="input-group">
                                        <button type="submit" class="btn" name="reg_user" >Register</button>
                                        </div>
                                </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>

</html>