<?php
$sql = "SELECT student.id, student.first_name, student.last_name, course.name, student.sem, student.dob, student.profile_photo, campus.name as campus_name
FROM student
INNER JOIN course ON (student.course_id = course.id)
INNER JOIN campus ON (student.campus_id = campus.id)";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) { ?>
    <div style="overflow-x:auto;">
        <table>
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Profile</td>
                    <td>Name</td>
                    <td>DOB</td>
                    <td>Course</td>
                    <td>Sem</td>
                    <td>Campus Name</td>
                    <td>Actions</td>
                </tr>
            </thead>
            <tbody>
                <?php
                // output data of each row
                while ($row = mysqli_fetch_assoc($result)) { ?>

                    <tr>
                        <td>
                            <?php echo $row["id"] ?>
                        </td>
                        <td><?php
                            if ($row['profile_photo'])
                                echo '<img class="profile" src="data:image/jpeg;base64,' . base64_encode($row['profile_photo']) . '"/>';
                            else
                                echo '<img class="profile" src="./../images/avatar.png"/>';
                            ?></td>
                        <td><?php echo $row["first_name"] . " " . $row["last_name"] ?></td>
                        <td><?php echo $row["dob"] ?></td>
                        <td><?php echo $row["name"] ?></td>
                        <td><?php echo $row["sem"] ?></td>
                        <td>
                            <?php echo $row["campus_name"] ?> 
                        </td>
                        <td>
                            <a class="edit" href="edit_record.php?op=edit&id=<?php echo $row["id"]; ?>">Edit</a>
                            <a class="delete" href="index.php?op=delete&id=<?php echo $row["id"]; ?>">Delete</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
<?php
} else {
    // echo "0 results";
}
?>