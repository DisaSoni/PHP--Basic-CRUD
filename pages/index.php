<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment-1</title>
    <link rel="stylesheet" href="./../css/site.css?php echo time(); ?>">
</head>

<body>
    <h1>Student Table</h1>
    <?php include './../components/db_connection.php'; ?>
    
    
    <?php include './../components/insert_record.php'; ?>
    
    <?php include './../components/delete_record.php'; ?>
    
    <?php include './../components/fetch_records.php'; ?>
    
    <?php
    if (isset($_POST['insert'])) {
        //$sql = "INSERT INTO Student (first_name, last_name, course, semester, dob) VALUES ('John', 'Doe', 1, 4, '2000-09-04')";

        if (mysqli_query($conn, $sql)) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }

    mysqli_close($conn);
    ?>
</body>

</html>