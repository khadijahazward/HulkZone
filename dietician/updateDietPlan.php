<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Diet Plan</title>
    <link href="Style/updateDietPlan.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <img src="Images/DietPlan BG Image.png" alt="healthy food" class="backgroundImage">
        <div class="topBar">
            <div class="gymLogo"><img src="Images/Gym Logo.png" alt="Gym Logo" class="gymLogo"></div>
            <div class="gymName">
                <p>HULK ZONE</p>
            </div>
            <div>
                <img src="Images/Profile.png" alt="my profile" class="myProfile">
            </div>
        </div>
        <div class="topic">
            <p>DietPlan - Lina Johnson</p>
        </div>
        <div class="gridContainer">
            <div class="gridTopic"></div>
            <div class="gridTopic">Breakfast</div>
            <div class="gridTopic">Lunch</div>
            <div class="gridTopic">Dinner</div>
            <div class="gridTopic">Monday</div>
            <div class="gridText">
                <input type="text" name="mondayBreakfastMeal" class="meal">
                <input type="text" name="mondayBreakfastQuntity" class="quntity">
            </div>
            <div class="gridText">
                <input type="text" name="mondayLunchMeal" class="meal">
                <input type="text" name="mondayLunchQuntity" class="quntity">
            </div>
            <div class="gridText">
                <input type="text" name="mondayDinnerMeal" class="meal">
                <input type="text" name="mondayDinnerQuntity" class="quntity">
            </div>
            <div class="gridTopic">Tuesday</div>
            <div class="gridText">
                <input type="text" name="tuesdayBreakfastMeal" class="meal">
                <input type="text" name="tuesdayBreakfastQuntity" class="quntity">
            </div>
            <div class="gridText">
                <input type="text" name="tusedayLunchMeal" class="meal">
                <input type="text" name="tusedayLunchQuntity" class="quntity">
            </div>
            <div class="gridText">
                <input type="text" name="tusedayDinnerMeal" class="meal">
                <input type="text" name="tusedayDinnerQuntity" class="quntity">
            </div>
            <div class="gridTopic">Wednesday</div>
            <div class="gridText">
                <input type="text" name="wednesdayBreakfastMeal" class="meal">
                <input type="text" name="wednesdayBreakfastQuntity" class="quntity">
            </div>
            <div class="gridText">
                <input type="text" name="wednesdayLunchMeal" class="meal">
                <input type="text" name="wednesdayLunchQuntity" class="quntity">
            </div>
            <div class="gridText">
                <input type="text" name="wednesdayDInnerMeal" class="meal">
                <input type="text" name="wednesdayDInnerQuntity" class="quntity">
            </div>
            <div class="gridTopic">Thursday</div>
            <div class="gridText">
                <input type="text" name="thursdayBreakfastMeal" class="meal">
                <input type="text" name="thursdayBreakfastQuntity" class="quntity">
            </div>
            <div class="gridText">
                <input type="text" name="thursdayLunchMeal" class="meal">
                <input type="text" name="thursdayLunchQuntity" class="quntity">
            </div>
            <div class="gridText">
                <input type="text" name="thursdayDinnerMeal" class="meal">
                <input type="text" name="thursdayDinnerQuntity" class="quntity">
            </div>
            <div class="gridTopic">Friday</div>
            <div class="gridText">
                <input type="text" name="fridayBreakfastMeal" class="meal">
                <input type="text" name="fridayBreakfastQuntity" class="quntity">
            </div>
            <div class="gridText">
                <input type="text" name="fridayLunchMeal" class="meal">
                <input type="text" name="fridayLunchQuntity" class="quntity">
            </div>
            <div class="gridText">
                <input type="text" name="fridayDinnerMeal" class="meal">
                <input type="text" name="fridayDinnerQuntity" class="quntity">
            </div>
            <div class="gridTopic">Saturday</div>
            <div class="gridText">
                <input type="text" name="saturdayBreakfastMeal" class="meal">
                <input type="text" name="saturdayBreakfastQuntity" class="quntity">
            </div>
            <div class="gridText">
                <input type="text" name="saturdayLunchMeal" class="meal">
                <input type="text" name="saturdayLunchQuntity" class="quntity">
            </div>
            <div class="gridText">
                <input type="text" name="saturdayDinnerMeal" class="meal">
                <input type="text" name="saturdayDinnerQuntity" class="quntity">
            </div>
            <div class="gridTopic">Sunday</div>
            <div class="gridText">
                <input type="text" name="sundayBreakfastMeal" class="meal">
                <input type="text" name="sundayBreakfastQuntity" class="quntity">
            </div>
            <div class="gridText">
                <input type="text" name="sundayLunchMeal" class="meal">
                <input type="text" name="sundayLunchQuntity" class="quntity">
            </div>
            <div class="gridText">
                <input type="text" name="sundayDinnerMeal" class="meal">
                <input type="text" name="sundayDinnerQuntity" class="quntity">
            </div>
        </div>
        <button onclick="document.getElementById('popUp').style.display='block'" class="saveButton">Save</button>
    </div>


    <div id="popUp" class="popUpContent">
        <div class="popUpContainer">
            <span class="close">&times;</span>
            <img src="../../Images/Ok.png" alt="Done" style="width: 50px; height: 60px; top: 40px;">
            <p>Your Diet Plan has been Updated Successfully!</p>
            <button class="acceptBtn" onclick="window.location.href='../DietPlan/dietPlan.html'">OK</button>
        </div>
    </div>

    <script>
    var popUpContent = document.getElementById('popUp');
    var span = document.getElementsByClassName("close")[0];

    span.onclick = function() {
        popUpContent.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == popUpContent) {
            popUpContent.style.display = "none";
        }
    }
    </script>

</body>

</html>