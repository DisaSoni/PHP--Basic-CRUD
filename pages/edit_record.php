<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./../css/site.css?php echo time(); ?>">
</head>

<body>
    <h1>Edit</h1>
    <?php include './../components/db_connection.php'; ?>

    <?php
    if (isset($_REQUEST['id']) && isset($_REQUEST['op']) && $_REQUEST['op'] == 'edit') {
        $id = $_REQUEST['id'];
        $query = "SELECT * from student where id='" . $id . "'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
    ?>
        <form method="POST">
            <input type="text" name="first_name" placeholder="Enter first name" value="<?php echo $row["first_name"] ?>" />
            <input type="text" name="last_name" placeholder="Enter last name" value="<?php echo $row["last_name"] ?>" />
            <input type="date" name="dob" placeholder="Enter DOB" value="<?php echo $row["dob"] ?>" />
            <input type="text" name="semester" placeholder="Enter semester" value="<?php echo $row["sem"] ?>" />
            <input type="text" name="course" placeholder="Enter course" value="<?php echo $row["course_id"] ?>" />
            <input type="text" name="campus" placeholder="Enter campus" value="<?php echo $row["campus_id"] ?>" />
            <input type="submit" name="edit_record" value="Edit" />
        </form>

    <?php
    } else {
        header("Location: index.php");
    }


    if (isset($_POST["edit_record"])) {
        $first_name = $_POST["first_name"];
        $last_name = $_POST["last_name"];
        $dob = $_POST["dob"];
        $semester = $_POST["semester"];
        $course = $_POST["course"];
        $campus = $_POST["campus"];

        $sql = "UPDATE student SET first_name='" . $first_name . "',
    last_name='" . $last_name . "', dob='" . $dob . "',
    sem='" . $semester . "', course_id='" . $course . "' where ID='" . $_REQUEST['id'] . "'";

        if (mysqli_query($conn, $sql)) {
            echo "Record updated successfully";
            header("Location: index.php");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    mysqli_close($conn);
    ?>

</body>

</html>