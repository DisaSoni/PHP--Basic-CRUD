<?php
if (isset($_REQUEST['id']) && isset($_REQUEST['op']) && $_REQUEST['op'] == 'delete') {
    $id=$_REQUEST['id'];
    $sql = "DELETE FROM student WHERE id=$id"; 
    if (mysqli_query($conn, $sql)) {
        echo "Record deleted successfully";
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>