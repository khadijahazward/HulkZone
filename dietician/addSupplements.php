<?php

include 'authorization.php';
include 'connect.php';
include 'setProfilePic.php';

$userID = mysqli_real_escape_string($conn, $_SESSION['userID']);

$query1 = "SELECT * FROM employee INNER JOIN user ON employee.userID = user.userID WHERE user.userID = '$userID'";
$result1 = mysqli_query($conn, $query1);
if(mysqli_num_rows($result1) == 1){
    $row = mysqli_fetch_assoc($result1);
    $employeeID = $row['employeeID'];
}else{
    echo '<script> window.alert("Error receiving employee ID!");</script>';
}

$memberID = "";
if(isset($_GET['new'])){
    $memberID = $_GET['new'];
}

$supplement = $supplementType = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $supplement = mysqli_real_escape_string($conn, $_POST['supplement']);

    if (($supplement == "100% Whey Protein Professional") || ($supplement == "BSN Syntha 6") || ($supplement == "Combat Power 4.2lbs") || ($supplement == "Iso-Tropic Max Protein Isolate") || ($supplement == "Gold Standard Whey") || ($supplement == "Levro Whey Supreme")) {
        $supplementType = "Protein";
    } elseif (($supplement == "Animal Prime Pre Workout") || ($supplement == "Animal Rage XL") || ($supplement == "ASSAULT") || ($supplement == "C4 Ripped") || ($supplement == "Cirtrulline Malate 90 Servings") || ($supplement == "GAT Nitraflex")) {
        $supplementType = "Pre-Workout";
    } elseif (($supplement == "ANABOLIC PEAK") || ($supplement == "Carnivor Mass") || ($supplement == "Critical Mass") || ($supplement == "JUMBO HARDCORE") || ($supplement == "Serious Mas") || ($supplement == "Super Mass Gainer")) {
        $supplementType = "Mass Gainer";
    } elseif (($supplement == "Animal Cuts") || ($supplement == "CLA GOLD 1000") || ($supplement == "Hydroxycut Hardcore Elite") || ($supplement == "L-Carnitine XS Liquid 3000MG") || ($supplement == "Nutrex Lipo 6 Black Strim Free 60 TB") || ($supplement == "Shred JYM Fat Burner")) {
        $supplementType = "Fat Burner";
    } else {
        echo '<script> window.alert("Error of receiving supplement type!");</script>';
    }
        
    if(isset($_POST['save'])){       

        $query2 = "INSERT INTO supplement (employeeID, supplementName, supplementType, memberID) VALUES ('$employeeID', '$supplement', '$supplementType', '$memberID')";
        $result2 = mysqli_query($conn, $query2);

        if($result2){
            echo "<script> window.alert('Inserting data id successful!');window.location.href='dietPlan.php'</script>";
        }else{
            echo "<script> window.alert('Error of Inserting data!');</script>";
        }
    }else{
        echo "<script> window.alert('Error of isset !');</script>";
    }
    
}else{
    echo "<script> window.alert('Error of post method!');</script>";
}
// if ($_SERVER["REQUEST_METHOD"] = "POST") {

//     $supplement = $_POST['supplement'];
//     $supplementType = "";

//     $query1 = "SELECT * FROM supplement WHERE memberID = '$memberID'";
//     $result1 = mysqli_query($conn, $query1);

//     if (mysqli_num_rows($result1) == 0) {

//         if (isset($_POST['submit'])) {

            // if (($supplement = "100% Whey Protein Professional") || ($supplement = "BSN Syntha 6") || ($supplement = "Combat Power 4.2lbs") || ($supplement = "Iso-Tropic Max Protein Isolate") || ($supplement = "Gold Standard Whey") || ($supplement = "Levro Whey Supreme")) {
            //     $supplementType = "Protein";
            // } elseif (($supplement = "Animal Prime Pre Workout") || ($supplement = "Animal Rage XL") || ($supplement = "ASSAULT") || ($supplement = "C4 Ripped") || ($supplement = "Cirtrulline Malate 90 Servings") || ($supplement = "GAT Nitraflex")) {
            //     $supplementType = "Pre-Workout";
            // } elseif (($supplement = "ANABOLIC PEAK") || ($supplement = "Carnivor Mass") || ($supplement = "Critical Mass") || ($supplement = "JUMBO HARDCORE") || ($supplement = "Serious Mas") || ($supplement = "Super Mass Gainer")) {
            //     $supplementType = "Mass Gainer";
            // } elseif (($supplement = "Animal Cuts") || ($supplement = "CLA GOLD 1000") || ($supplement = "Hydroxycut Hardcore Elite") || ($supplement = "L-Carnitine XS Liquid 3000MG") || ($supplement = "Nutrex Lipo 6 Black Strim Free 60 TB") || ($supplement = "Shred JYM Fat Burner")) {
            //     $supplementType = "Fat Burner";
            // } else {
            //     echo '<script> window.alert("Error of receiving supplement type!");</script>';
            // }

//             $query = "INSERT INTO supplement (supplementName, supplementType, employeeID, memberID) VALUES ('$supplement', '$supplementType', '$employeeID', '$memberID')";
//             $result = mysqli_query($conn, $query);

//             if ($result) {
//                 echo '<script> window.alert("Success"); window.location.href="dietPlan.php";</script>';
                
//             } else {
//                 echo '<script> window.alert("Error");</script>';
//             }
//         }
//     } else {
//         echo '<script> window.alert("Already assign a supplement");window.location.href="dietPlan.php";</script>';
//     }
// }


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supplement</title>
    <link href="Style/supplements.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <!-- <img src="Images/supplements.png" alt="healthy food" class="backgroundImage"> -->
        <div class="topBar">
            <div class="gymLogo"><img src="Images/Gym Logo.png" alt="Gym Logo" class="gymLogo"></div>
            <div class="gymName">
                <p>HULK ZONE</p>
            </div>
            <div>
                <img src="<?php echo $profilePic ?>" alt="my profile" class="myProfile">
            </div>
        </div>
        <div class="content">
            <form method="POST"
                action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?new=<?php echo $memberID ?>">
                <div class="topic">
                    <p>Supplements</p>
                </div>
                <div class="subContainer">
                    <p class="subTopic">Protein</p>
                    <br>
                    <br>
                    <br>
                    <br>
                    <table>
                        <tr>
                            <td>
                                <label class="radioButton">
                                    <input type="radio" name="supplement" value="100% Whey Protein Professional">
                                    <span class="radioButtonLable">
                                        <img src="Images/supplements/Protein/100  Whey Protein Professional.png"
                                            alt="100% Whey Protein Professional.png">
                                        <p>100% Whey Protein Professional</p>
                                    </span>
                                </label>
                            </td>
                            <td>
                                <label class="radioButton">
                                    <input type="radio" name="supplement" value="BSN Syntha 6">
                                    <span class="radioButtonLable">
                                        <img src="Images/supplements/Protein/BSN Syntha 6.png" alt="BSN Syntha 6.png">
                                        <p>BSN Syntha 6</p>
                                    </span>
                                </label>
                            </td>
                            <td>
                                <label class="radioButton">
                                    <input type="radio" name="supplement" value="Combat Power 4.2lbs">
                                    <span class="radioButtonLable">
                                        <img src="Images/supplements/Protein/Combat Power 4.2lbs.png"
                                            alt="Combat Power 4.2lbs.png">
                                        <p>Combat Power 4.2lbs</p>
                                    </span>
                                </label>
                            </td>
                            <td>
                                <label class="radioButton">
                                    <input type="radio" name="supplement" value="Iso-Tropic Max Protein Isolate">
                                    <span class="radioButtonLable">
                                        <img src="Images/supplements/Protein/Iso-Tropic Max Protein Isolate.png"
                                            alt="Iso-Tropic Max Protein Isolate.png">
                                        <p>Iso-Tropic Max Protein Isolate</p>
                                    </span>
                                </label>
                            </td>
                            <td>
                                <label class="radioButton">
                                    <input type="radio" name="supplement" value="Gold Standard Whey">
                                    <span class="radioButtonLable">
                                        <img src="Images/supplements/Protein/Gold Standard Whey.png"
                                            alt="Gold Standard Whey.png">
                                        <p>Gold Standard Whey</p>
                                    </span>
                                </label>
                            </td>
                            <td>
                                <label class="radioButton">
                                    <input type="radio" name="supplement" value="Levro Whey Supreme">
                                    <span class="radioButtonLable">
                                        <img src="Images/supplements/Protein/Levro Whey Supreme.png"
                                            alt="Levro Whey Supreme.png">
                                        <p>Levro Whey Supreme</p>
                                    </span>
                                </label>
                            </td>
                        </tr>
                    </table>
                    <p class="subTopic">Pre-Workout</p>
                    <br>
                    <br>
                    <br>
                    <br>
                    <table>
                        <tr>
                            <td>
                                <label class="radioButton">
                                    <input type="radio" name="supplement" value="Animal Prime Pre Workout">
                                    <span class="radioButtonLable">
                                        <img src="Images/supplements/Pre-Workout/Animal-Prime-Pre-Workout.png"
                                            alt="Animal Prime Pre Workout.png">
                                        <p>Animal Prime Pre Workout</p>
                                    </span>
                                </label>
                            </td>
                            <td>
                                <label class="radioButton">
                                    <input type="radio" name="supplement" value="Animal Rage XL">
                                    <span class="radioButtonLable">
                                        <img src="Images/supplements/Pre-Workout/Animal-Rage-XL.png"
                                            alt="Animal Rage XL.png">
                                        <p>Animal Rage XL</p>
                                    </span>
                                </label>
                            </td>
                            <td>
                                <label class="radioButton">
                                    <input type="radio" name="supplement" value="ASSAULT">
                                    <span class="radioButtonLable">
                                        <img src="Images/supplements/Pre-Workout/ASSAULT.png" alt="ASSAULT.png">
                                        <p>ASSAULT</p>
                                    </span>
                                </label>
                            </td>
                            <td>
                                <label class="radioButton">
                                    <input type="radio" name="supplement" value="C4 Ripped">
                                    <span class="radioButtonLable">
                                        <img src="Images/supplements/Pre-Workout/C4-Ripped.png" alt="C4 Ripped.png">
                                        <p>C4 Ripped</p>
                                    </span>
                                </label>
                            </td>
                            <td>
                                <label class="radioButton">
                                    <input type="radio" name="supplement" value="Cirtrulline Malate 90 Servings">
                                    <span class="radioButtonLable">
                                        <img src="Images/supplements/Pre-Workout/Cirtrulline-Malate-90-Servings.png"
                                            alt="Cirtrulline Malate 90 Servings.png">
                                        <p>Cirtrulline Malate 90 Servings</p>
                                    </span>
                                </label>
                            </td>
                            <td>
                                <label class="radioButton">
                                    <input type="radio" name="supplement" value="bby">
                                    <span class="radioButtonLable">
                                        <img src="Images/supplements/Pre-Workout/GAT-Nitraflex.png"
                                            alt="GAT Nitraflex.png">
                                        <p>GAT Nitraflex</p>
                                    </span>
                                </label>
                            </td>
                        </tr>
                    </table>
                    <p class="subTopic">Mass Gainer</p>
                    <br>
                    <br>
                    <br>
                    <br>
                    <table>
                        <tr>
                            <td>
                                <label class="radioButton">
                                    <input type="radio" name="supplement" value="ANABOLIC PEAK">
                                    <span class="radioButtonLable">
                                        <img src="Images/supplements/Mass Gainers/ANABOLIC PEAK.png"
                                            alt="ANABOLIC PEAK.png">
                                        <p>ANABOLIC PEAK</p>
                                    </span>
                                </label>
                            </td>
                            <td>
                                <label class="radioButton">
                                    <input type="radio" name="supplement" value="Carnivor Mass">
                                    <span class="radioButtonLable">
                                        <img src="Images/supplements/Mass Gainers/Carnivor Mass.png"
                                            alt="Carnivor Mass.png">
                                        <p>Carnivor Mass</p>
                                    </span>
                                </label>
                            </td>
                            <td>
                                <label class="radioButton">
                                    <input type="radio" name="supplement" value="Critical Mass">
                                    <span class="radioButtonLable">
                                        <img src="Images/supplements/Mass Gainers/Critical Mass.png"
                                            alt="Critical Mass.png">
                                        <p>Critical Mass</p>
                                    </span>
                                </label>
                            </td>
                            <td>
                                <label class="radioButton">
                                    <input type="radio" name="supplement" value="JUMBO HARDCORE">
                                    <span class="radioButtonLable">
                                        <img src="Images/supplements/Mass Gainers/JUMBO HARDCORE.png"
                                            alt="JUMBO HARDCORE.png">
                                        <p>JUMBO HARDCORE</p>
                                    </span>
                                </label>
                            </td>
                            <td>
                                <label class="radioButton">
                                    <input type="radio" name="supplement" value="Serious Mas">
                                    <span class="radioButtonLable">
                                        <img src="Images/supplements/Mass Gainers/Serious-Mass.png"
                                            alt="Serious Mass.png">
                                        <p>Serious Mass</p>
                                    </span>
                                </label>
                            </td>
                            <td>
                                <label class="radioButton">
                                    <input type="radio" name="supplement" value="Super Mass Gainer">
                                    <span class="radioButtonLable">
                                        <img src="Images/supplements/Mass Gainers/Super-Mass-Gainer.png"
                                            alt="Super Mass Gainer.png">
                                        <p>Super Mass Gainer</p>
                                    </span>
                                </label>
                            </td>
                        </tr>
                    </table>
                    <p class="subTopic">Fat Burner</p>
                    <br>
                    <br>
                    <br>
                    <br>
                    <table>
                        <tr>
                            <td>
                                <label class="radioButton">
                                    <input type="radio" name="supplement" value="Animal Cuts">
                                    <span class="radioButtonLable">
                                        <img src="Images/supplements/Fat Burners/Animal Cuts.png" alt="Animal Cuts.png">
                                        <p>Animal Cuts</p>
                                    </span>
                                </label>
                            </td>
                            <td>
                                <label class="radioButton">
                                    <input type="radio" name="supplement" value="CLA GOLD 1000">
                                    <span class="radioButtonLable">
                                        <img src="Images/supplements/Fat Burners/CLA GOLD 1000.png"
                                            alt="CLA GOLD 1000.png">
                                        <p>CLA GOLD 1000</p>
                                    </span>
                                </label>
                            </td>
                            <td>
                                <label class="radioButton">
                                    <input type="radio" name="supplement" value="Hydroxycut Hardcore Elite">
                                    <span class="radioButtonLable">
                                        <img src="Images/supplements/Fat Burners/Hydroxycut Hardcore Elite.png"
                                            alt="Hydroxycut Hardcore Elite.png">
                                        <p>Hydroxycut Hardcore Elite</p>
                                    </span>
                                </label>
                            </td>
                            <td>
                                <label class="radioButton">
                                    <input type="radio" name="supplement" value="L-Carnitine XS Liquid 3000MG">
                                    <span class="radioButtonLable">
                                        <img src="Images/supplements/Fat Burners/L-Carnitine XS Liquid 3000MG.png"
                                            alt="L-Carnitine XS Liquid 3000MG.png">
                                        <p>L-Carnitine XS Liquid 3000MG</p>
                                    </span>
                                </label>
                            </td>
                            <td>
                                <label class="radioButton">
                                    <input type="radio" name="supplement" value="Nutrex Lipo 6 Black Strim Free 60 TB">
                                    <span class="radioButtonLable">
                                        <img src="Images/supplements/Fat Burners/Nutrex Lipo 6 Black Strim Free 60 TB.png"
                                            alt="Nutrex Lipo 6 Black Strim Free 60 TB.png">
                                        <p>Nutrex Lipo 6 Black Strim Free 60 TB</p>
                                    </span>
                                </label>
                            </td>
                            <td>
                                <label class="radioButton">
                                    <input type="radio" name="supplement" value="Shred JYM Fat Burner">
                                    <span class="radioButtonLable">
                                        <img src="Images/supplements/Fat Burners/Shred JYM Fat Burner.png"
                                            alt="Shred JYM Fat Burner.png">
                                        <p>Shred JYM Fat Burner</p>
                                    </span>
                                </label>
                            </td>
                        </tr>
                    </table>
                </div>
                <button name="save" class="saveButton">Save</button>
            </form>
        </div>
</body>

</html>