<?php
session_start();
$_SESSION;
include("connection.php");
include("functions.php");
$user_data = check_login($con);

// Get URL parameter
$ids =  $_GET['book'];
                        
if(isset($_GET["book"]) && !empty($_GET["book"])){
    
    $ssql = "SELECT * FROM book WHERE ISBN = '$ids' ";
    $query = mysqli_query($con, $ssql);
    $sresult = mysqli_fetch_assoc($query);
    
    // Retrieve individual field value
    $ISBN = $sresult["ISBN"];
    $title = $sresult["Title"];
    $author = $sresult["Author"];
    $publisher = $sresult["Publisher"];
    $edition = $sresult["Edition"];
    $qty = $sresult["Qty"];
    $description = $sresult["Description"];

        // Define variables and initialize with empty values
        $titlei = $authori = $publisheri = $editioni = $qtyi = $descriptioni = "";
        $title_err = $author_err = $publisher_err = $edition_err = $qty_err = $description_err = "";
        
    // Processing form data when form is submitted
    if(isset($_POST["book"]) && !empty($_POST["book"])){
        // Get hidden input value
        //$id = $_POST["id"];
        
        // Validate title
        $input_title = trim($_POST["title"]);
        if(empty($input_title)){
            $title_err = "Please enter a Title."; echo $title_err; 
        } else{
            $titlei = $input_title;
        }

        // Validate author
        $input_author = trim($_POST["author"]);
        if(empty($input_author)){
            $author_err = "Please enter a Author."; echo $author_err;
        } elseif(!filter_var($input_author, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
            $author_err = "Please enter a valid namea."; echo $author_err;
        } else{
            $authori = $input_author;
        }
        
        // Validate publisher 
        $input_publisher = trim($_POST["publisher"]);
        if(empty($input_publisher)){
            $publisher_err = "Please enter a publisher.";  echo $publisher_err;
        } elseif(!filter_var($input_publisher, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
            $publisher_err = "Please enter a valid namep."; echo $publisher_err;   
        } else{
            $publisheri = $input_publisher;
        }

        // Validate edition
        $input_edition = trim($_POST["edition"]);
        if(empty($input_edition)){
            $edition_err = "Please enter a Edition."; echo $edition_err;
        } else{
            $editioni = $input_edition;
        }

        // Validate qty
        $input_qty = trim($_POST["qty"]);
        if(empty($input_qty)){
            $qty_err = "Please enter the Qauntity.";  echo $qty_err;   
        } elseif(!ctype_digit($input_qty)){
            $qty_err = "Please enter a positive integer value."; echo $qty_err;
        } else{
            $qtyi = $input_qty;
        }

        // Validate description
        $input_description = trim($_POST["description"]);
        if(empty($input_description)){
            $description_err = "Please enter a description."; echo $description_err;
        } else{
            $descriptioni = $input_description;
        }
        
        // Check input errors before inserting in database
        if(empty($ISBN_err) && empty($title_err) && empty($author_err) && empty($publisher_err) && empty($edition_err) && empty($qty_err) && empty($description_err) && isset($_POST['update'])){
            // Prepare an update statement
            $sqlr = "UPDATE book SET Title ='$titlei', Author ='$authori', Publisher ='$publisheri', Edition ='$editioni', Qty = '$qtyi', Description ='$descriptioni' WHERE ISBN = '$ids'";
            
            $results = mysqli_query($con, $sqlr);

            if (!$results) {
                echo "Updation Failed!!!";
            }else {
                echo "Updation successively.";
                header("location: Admin.php");
            }
            
        }else {
            echo "Verify the inputs.";
        } 
    }
    mysqli_close($con);
}else{
    echo"URL doesn't contain id parameter." ; 
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
                                    <h4>Please edit the input values and submit to update the book record.</h4>
                                    
                                    <form action='' method="post">
                                        <div class="form-group">
                                            <label>ISBN</label>
                                            <h6><?php echo $ISBN; ?></h6>
                                            
                                        </div>
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input type="text" name="title" class="form-control" value="<?php echo $title; ?>">
                                            <span class="invalid-feedback"><?php echo $title_err;?></span>
                                        </div>
                                        <div class="form-group">
                                            <label>Author</label>
                                            <input type="text" name="author" class="form-control" value="<?php echo $author; ?>">
                                            <span class="invalid-feedback"><?php echo $author_err;?></span>
                                        </div>
                                        <div class="form-group">
                                            <label>Publisher</label>
                                            <input type="text" name="publisher" class="form-control" value="<?php echo $publisher; ?>">
                                            <span class="invalid-feedback"><?php echo $publisher_err;?></span>
                                        </div>
                                        <div class="form-group">
                                            <label>Edition</label>
                                            <input type="text" name="edition" class="form-control" value="<?php echo $edition; ?>">
                                            <span class="invalid-feedback"><?php echo $edition_err;?></span>
                                        </div>
                                        <div class="form-group">
                                            <label>Quantity</label>
                                            <input type="text" name="qty" class="form-control" value="<?php echo $qty; ?>">
                                            <span class="invalid-feedback"><?php echo $qty_err;?></span>
                                        </div>
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea name="description" class="form-control"><?php echo $description; ?></textarea>
                                            <span class="invalid-feedback"><?php echo $description_err; ?></span>
                                        </div>

                                        <input type="hidden" name="book" value="<?php echo $ids; ?>"/>
                                        <input type="submit" onclick="return confirm('Are you sure you want to update')" class="btn btn-primary" value="Submit" name='update'>
                                        <a href="Admin.php" class="btn btn-secondary ml-2">Cancel</a>
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
