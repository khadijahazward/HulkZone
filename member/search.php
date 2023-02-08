<?php 
include 'authorization.php';
include '../connect.php';
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $search = mysqli_real_escape_string($conn, $_POST['search']);

    $sql = "SELECT * FROM user WHERE (fName LIKE '%$search%' OR lName LIKE '%$search%') AND roles IN (2,3)";

    $result = mysqli_query($conn, $sql);

    $count = 0;

    echo '<table>';

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            $count++;
            if (isset($row['profilePhoto']) && $row['profilePhoto'] != NULL) {
                //dp link from db
                $profilePictureLink = $row['profilePhoto'];
            } else {
                $profilePictureLink = '../member/profileImages/default.png';
            }

            $fullName = $row["fName"] . " " . $row["lName"];
            if ($row["roles"] == 2) {
                $role = "Trainer";
            } else {
                $role = "Dietician";
            }

            echo "
                <td>
                    <div class = 'test'>
                        <div><img src='$profilePictureLink'></div>
                        <div>$fullName</div>
                        <div>$role</div>
                        <div><button onclick ='' >View Profile</button></div>
                    </div>
                </td> 
                ";


            //3 cols per row
            if ($count % 3 == 0) {
                echo "</tr><tr>";
            }
        }
        echo "</tr>";
    } else {
        echo "<tr>NO RESULTS MATCHED</tr>";
    }
    

}   
    

?>