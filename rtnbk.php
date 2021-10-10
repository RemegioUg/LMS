<?php
include("connection.php");
// Get URL parameter

$id =  $_GET["book"];
if(isset($_GET["book"]) && !empty($_GET["book"])){
    

    
        $bsql = "UPDATE book SET Available = Available + 1 WHERE ISBN = $id";
        $bresult = mysqli_query($con, $bsql);

        if ($bresult) {
            
            $isql = "UPDATE issued_book_details SET Returned_Date = CURRENT_TIMESTAMP, Returned_Stutus = 'Returned' WHERE Book_ID = $id";
            $iresult = mysqli_query($con, $isql);

            if ($iresult) {
                echo '<script>
                   alert("Book returned. ");
                   window.location.href = "borrowed_book.php";
            </script>';
            }else {
                echo "Couldn't update book table!!";
            }
                
        }else {
            echo "Couldn't return book!!";
        }
    
    
    mysqli_close($con);
}

?>


  