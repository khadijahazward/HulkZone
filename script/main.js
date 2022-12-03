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
        index++;
    }else if(btn == 'prev'){
        index--;
    }
    steps[index].classList.add('active');
}