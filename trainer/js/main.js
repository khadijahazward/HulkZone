//Show the next day box

//Add Exercise to Textarea

let day1AddExerciseButton;
let day1removeExerciseButton;

let day2AddExerciseButton;
let day2removeExerciseButton;

let day3AddExerciseButton;
let day3removeExerciseButton;

let day4AddExerciseButton;
let day4removeExerciseButton;

let day5AddExerciseButton;
let day5removeExerciseButton;

let day6AddExerciseButton = 0;
let day6removeExerciseButton = 0;

let day7AddExerciseButton = 0;
let day7removeExerciseButton = 0;

let exerciseNameElement;
let repsElement;
let restTimeElement;
let textAreaElement;

//Day 1
day1AddExerciseButton = document.getElementById("day1_add-exercise-btn");
day1removeExerciseButton = document.getElementById("day1_remove-exercise-btn");

//Day 2
day2AddExerciseButton = document.getElementById("day2_add-exercise-btn");
day2removeExerciseButton = document.getElementById("day2_remove-exercise-btn");

//Day 3
day3AddExerciseButton = document.getElementById("day3_add-exercise-btn");
day3removeExerciseButton = document.getElementById("day3_remove-exercise-btn");

//Day 4
day4AddExerciseButton = document.getElementById("day4_add-exercise-btn");
day4removeExerciseButton = document.getElementById("day4_remove-exercise-btn");

//Day 5
day5AddExerciseButton = document.getElementById("day5_add-exercise-btn");
day5removeExerciseButton = document.getElementById("day5_remove-exercise-btn");

//Day 6
day6AddExerciseButton = document.getElementById("day6_add-exercise-btn");
day6removeExerciseButton = document.getElementById("day6_remove-exercise-btn");

//Day 7
day7AddExerciseButton = document.getElementById("day7_add-exercise-btn");
day7removeExerciseButton = document.getElementById("day7_remove-exercise-btn");

//Day 1
if (day1AddExerciseButton) {
  day1AddExerciseButton.addEventListener("mouseover", handleButtonClick);
}

if (day1removeExerciseButton) {
  day1removeExerciseButton.addEventListener("mouseover", handleButtonClick);
}

//Day 2
if (day2AddExerciseButton) {
  day2AddExerciseButton.addEventListener("mouseover", handleButtonClick);
}

if (day2removeExerciseButton) {
  day2removeExerciseButton.addEventListener("mouseover", handleButtonClick);
}

//Day 3
if (day3AddExerciseButton) {
  day3AddExerciseButton.addEventListener("mouseover", handleButtonClick);
}

if (day3removeExerciseButton) {
  day3removeExerciseButton.addEventListener("mouseover", handleButtonClick);
}

//Day 4
if (day4AddExerciseButton) {
  day4AddExerciseButton.addEventListener("mouseover", handleButtonClick);
}

if (day4removeExerciseButton) {
  day4removeExerciseButton.addEventListener("mouseover", handleButtonClick);
}

//Day 5
if (day5AddExerciseButton) {
  day5AddExerciseButton.addEventListener("mouseover", handleButtonClick);
}

if (day5removeExerciseButton) {
  day5removeExerciseButton.addEventListener("mouseover", handleButtonClick);
}

//Day 6
if (day6AddExerciseButton) {
  day6AddExerciseButton.addEventListener("mouseover", handleButtonClick);
}

if (day6removeExerciseButton) {
  day6removeExerciseButton.addEventListener("mouseover", handleButtonClick);
}

//Day 7
if (day7AddExerciseButton) {
  day7AddExerciseButton.addEventListener("mouseover", handleButtonClick);
}

if (day7removeExerciseButton) {
  day7removeExerciseButton.addEventListener("mouseover", handleButtonClick);
}

function handleButtonClick(event) {
  const clickedButton = event.target.id;

  //Day 1
  if (clickedButton === "day1_add-exercise-btn") {
    day1AddExerciseButton.addEventListener("click", addToTextArea);
    exerciseNameElement = document.getElementById("day1_exerciseName");
    repsElement = document.getElementById("day1_reps");
    restTimeElement = document.getElementById("day1_restTime");
  }

  if (clickedButton === "day1_remove-exercise-btn") {
    day1removeExerciseButton.addEventListener("click", removeExercise);
    textAreaElement = document.getElementById("day1_execise_list");
  }

  //Day 2
  if (clickedButton === "day2_add-exercise-btn") {
    day2AddExerciseButton.addEventListener("click", addToTextArea);
    exerciseNameElement = document.getElementById("day2_exerciseName");
    repsElement = document.getElementById("day2_reps");
    restTimeElement = document.getElementById("day2_restTime");
  }

  if (clickedButton === "day2_remove-exercise-btn") {
    day2removeExerciseButton.addEventListener("click", removeExercise);
    textAreaElement = document.getElementById("day2_execise_list");
  }

  //Day 3
  if (clickedButton === "day3_add-exercise-btn") {
    day3AddExerciseButton.addEventListener("click", addToTextArea);
    exerciseNameElement = document.getElementById("day3_exerciseName");
    repsElement = document.getElementById("day3_reps");
    restTimeElement = document.getElementById("day3_restTime");
  }

  if (clickedButton === "day3_remove-exercise-btn") {
    day3removeExerciseButton.addEventListener("click", removeExercise);
    textAreaElement = document.getElementById("day3_execise_list");
  }

  //Day 4
  if (clickedButton === "day4_add-exercise-btn") {
    day4AddExerciseButton.addEventListener("click", addToTextArea);
    exerciseNameElement = document.getElementById("day4_exerciseName");
    repsElement = document.getElementById("day4_reps");
    restTimeElement = document.getElementById("day4_restTime");
  }

  if (clickedButton === "day4_remove-exercise-btn") {
    day4removeExerciseButton.addEventListener("click", removeExercise);
    textAreaElement = document.getElementById("day4_execise_list");
  }

  //Day 5
  if (clickedButton === "day5_add-exercise-btn") {
    day5AddExerciseButton.addEventListener("click", addToTextArea);
    exerciseNameElement = document.getElementById("day5_exerciseName");
    repsElement = document.getElementById("day5_reps");
    restTimeElement = document.getElementById("day5_restTime");
  }

  if (clickedButton === "day5_remove-exercise-btn") {
    day5removeExerciseButton.addEventListener("click", removeExercise);
    textAreaElement = document.getElementById("day5_execise_list");
  }

  //Day 6
  if (clickedButton === "day6_add-exercise-btn") {
    day6AddExerciseButton.addEventListener("click", addToTextArea);
    exerciseNameElement = document.getElementById("day6_exerciseName");
    repsElement = document.getElementById("day6_reps");
    restTimeElement = document.getElementById("day6_restTime");
  }

  if (clickedButton === "day6_remove-exercise-btn") {
    day6removeExerciseButton.addEventListener("click", removeExercise);
    textAreaElement = document.getElementById("day6_execise_list");
  }

  //Day 7
  if (clickedButton === "day7_add-exercise-btn") {
    day7AddExerciseButton.addEventListener("click", addToTextArea);
    exerciseNameElement = document.getElementById("day7_exerciseName");
    repsElement = document.getElementById("day7_reps");
    restTimeElement = document.getElementById("day7_restTime");
  }

  if (clickedButton === "day7_remove-exercise-btn") {
    day7removeExerciseButton.addEventListener("click", removeExercise);
    textAreaElement = document.getElementById("day7_execise_list");
  }
}

function addToTextArea(event) {
  const exerciseName = exerciseNameElement.value;
  const reps = repsElement.value;
  const restTime = restTimeElement.value;
  let textArea = event.target.parentNode.nextElementSibling.firstElementChild;

  if (exerciseName !== "" && reps !== "" && restTime !== "") {
    const exerciseText = `${exerciseName}, ${reps}, ${restTime}\n`; //Line
    textArea.value += exerciseText;
  }

  // Clear the input fields after adding the exercise
  exerciseNameElement.value = "";
  repsElement.value = "";
  restTimeElement.value = "";
}

function removeExercise(event) {
  let lines = textAreaElement.value.split("\n");
  if (lines.length >= 2) {
    lines.splice(-2, 1);
    textAreaElement.value = lines.join("\n");
  }
}

//CURRENT DATE

let today = new Date();
let dd = String(today.getDate()).padStart(2, "0");
let mm = String(today.getMonth() + 1).padStart(2, "0"); //January is 0!
let yyyy = today.getFullYear();
let day = today.getDay();
today = mm + "/" + dd + "/" + yyyy;

let daylist = [
  "Sunday",
  "Monday",
  "Tuesday",
  "Wednesday ",
  "Thursday",
  "Friday",
  "Saturday",
];

const todayDate = document.getElementById("today-date");
const todayDay = document.getElementById("today-day");
if (todayDate) {
  todayDate.textContent = today;
  todayDay.textContent = daylist[day];
}
