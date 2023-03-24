<form method="POST">
    <input type="text" name="first_name" placeholder="Enter first name" />
    <input type="text" name="last_name" placeholder="Enter last name" />
    <input type="date" name="dob" placeholder="Enter DOB" />
    <input type="text" name="semester" placeholder="Enter semester" />
    <input type="text" name="course" placeholder="Enter course" />
    <input type="text" name="campus" placeholder="Enter campus" />
    <input type="submit" name="insert_record" value="Add" />
</form>

<?php
if (isset($_POST["insert_record"])) {
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $dob = $_POST["dob"];
    $sem = $_POST["semester"];
    $course_id = $_POST["course"];
    $campus_id = $_POST["campus"];

    if ($first_name && $last_name && $dob && $sem && $course_id && $campus_id) {
        $sql = "INSERT INTO student (first_name, last_name, dob, sem, course_id,campus_id) 
        VALUES ('$first_name', '$last_name', '$dob', $sem, $course_id,$campus_id)";

        if (mysqli_query($conn, $sql)) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}
?>