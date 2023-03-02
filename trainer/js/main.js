//ADD DAYS BOXES

const addBtn1 = document.getElementById("add-day-btn1");
const hiddenBox1 = document.getElementById("hiddenDaysBox1");

const addBtn2 = document.getElementById("add-day-btn2");
const hiddenBox2 = document.getElementById("hiddenDaysBox2");

if (addBtn1) {
  addBtn1.addEventListener("click", openNextBox1);
}

if (addBtn2) {
  addBtn2.addEventListener("click", openNextBox2);
}

function openNextBox1() {
  if (hiddenBox1.style.display === "none") {
    hiddenBox1.style.display = "flex";
    addBtn1.textContent = "Remove";
  } else {
    hiddenBox1.style.display = "none";
    addBtn1.innerHTML = "Add<br>Days";
  }
}

function openNextBox2() {
  if (hiddenBox2.style.display === "none") {
    hiddenBox2.style.display = "flex";
    addBtn2.textContent = "Remove";
  } else {
    hiddenBox2.style.display = "none";
    addBtn2.innerHTML = "Add<br>Days";
  }
}

//CURRENT DATE

let today = new Date();
let dd = String(today.getDate()).padStart(2, "0");
let mm = String(today.getMonth() + 1).padStart(2, "0"); //January is 0!
let yyyy = today.getFullYear();
let day = today.getDay();
today = mm + "/" + dd + "/" + yyyy;

let daylist = ["Sunday","Monday","Tuesday","Wednesday ","Thursday","Friday","Saturday"];


const todayDate = document.getElementById('today-date');
const todayDay = document.getElementById('today-day');

todayDate.textContent = today;
todayDay.textContent = daylist[day];

