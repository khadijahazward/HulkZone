const steps = Array.from(document.querySelectorAll('form .step'));
const nextBtn = document.querySelectorAll('form .next-Btn');
const prevBtn = document.querySelectorAll('form .previous-Btn');
const form = document.querySelector('form');

nextBtn.forEach(button=> {
    button.addEventListener('click', (e) =>{
        changeStep('next');
    })
})

prevBtn.forEach(button=> {
    button.addEventListener('click', (e) =>{
        changeStep('prev');
    })
})

form.addEventListener('submit', (e)=>{
    form.reset();
})

function changeStep(btn){
    let index = 0;
    const active = document.querySelector('form .step.active');
    index = steps.indexOf(active);
    steps[index].classList.remove('active');
    if(btn == 'next'){
        if(validateForm1() == false){
            index;
        }else{
            index++;
        }

    }else if(btn == 'prev'){
        index--;
    }
    steps[index].classList.add('active');
}

//for tab 1
function validateForm1() {
    var x = document.forms["regForm"]["fname"].value;
    if (x == "") {
      alert("First Name must be filled out");
      return false;
    }    

    var x = document.forms["regForm"]["lname"].value;
    if (x == "") {
      alert("Last Name must be filled out");
      return false;
    } 

    var x = document.forms["regForm"]["dob"].value;
    if (x == "") {
      alert("Date of birth must be filled out");
      return false;
    } 

    var x = document.forms["regForm"]["gender"].value;
    if (x == "") {
      alert("gender must be filled out");
      return false;
    } 

    //phone number - length 10
    var x = document.forms["regForm"]["number"].value;
    var phoneno = /^\d{10}$/;
    if (x == "") {
      alert("phone number must be filled out");
      return false;
    } else if((x.match(phoneno))){
        
    }else{
        alert("Not a valid Phone Number");
        return false;
    }

    //nic validation 10 / 12 length
    var x = document.forms["regForm"]["nic"].value;
    var oldFormat = /^\d{9}[V]$/;
    var newFormat = /^\d{12}$/;
    if (x == "") {
        alert("NIC must be filled out");
        return false;
    } else if(x.match(oldFormat) || x.match(newFormat)) {

    }else{
        alert("Not a valid NIC");
        return false;
    }

}

//for tab 2
function validateForm(){
    //payment plan
    ErrorText= "";
    if ( ( regForm.PaymentPlan[0].checked == false ) && ( regForm.PaymentPlan[1].checked == false ) && ( regForm.PaymentPlan[2].checked == false ) && ( regForm.PaymentPlan[3].checked == false ))
    {
    alert ( "Please choose your payment Plan");
    return false;
    }
    
    var x = document.forms["regForm"]["email"].value;
    if (x == "") {
      alert("email must be filled out");
      return false;
    }

    //password validation 
    var pw1 = document.forms["regForm"]["pass1"].value;
    if (pw1 == "") {
      alert("Password must be filled out");
      return false;
    }else if(pw1.length < 8){
        alert("Password must contain atleast 8 characters");
        return false;
    }else if(pw1.length > 15){
        alert("Password must must not exceed 15 characters");
        return false;
    }

    var pw2 = document.forms["regForm"]["pass2"].value;
    if (pw2 == "") {
        alert("Confirm Password must be filled out");
        return false;
    }
    else if(pw1 != pw2){
        alert("Passwords Don't match");
        return false;
    }
}


