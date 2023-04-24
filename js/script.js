let menu = document.querySelector('#menu-btn');
let navbar = document.querySelector('.navbar');
let header = document.querySelector('.header');
let option = document.querySelector('.options');


let LoginformBtn = document.querySelector('#LogInBtn');
let SignUpformBtn = document.querySelector('#SignUpBtn');


let LoginPopUp = document.querySelector('.LoginPopUp');
let LoginPopUpCloseBtn = document.querySelector('#loginPopUpCloseBtn');

let SignUpPopUp = document.querySelector('.SignUpPopUp');
let SignUpPopUpCloseBtn = document.querySelector('#signupPopUpCloseBtn');

menu.onclick =()=>{
    menu.classList.toggle('fa-times');
    navbar.classList.toggle('active');
    login.classList.remove('active');
};

document.querySelector('#user-btn').onclick = ()=>{
    option.classList.toggle('active');
    navbar.classList.remove('active');
    menu.classList.remove('fa-times');
}

window.onscroll =()=>{
    menu.classList.remove('fa-times');
    navbar.classList.remove('active');
    option.classList.remove('active');
    header.classList.toggle('active', scrollY>0);
};


LoginformBtn.addEventListener('click', ()=>{
    LoginPopUp.classList.add('active');
    menu.classList.remove('fa-times');
    navbar.classList.remove('active');
    option.classList.remove('active');
});

LoginPopUpCloseBtn.addEventListener('click', ()=>{
    LoginPopUp.classList.remove('active');
});

SignUpformBtn.addEventListener('click', ()=>{
    SignUpPopUp.classList.add('active');
    menu.classList.remove('fa-times');
    navbar.classList.remove('active');
    option.classList.remove('active');
});

SignUpPopUpCloseBtn.addEventListener('click', ()=>{
    SignUpPopUp.classList.remove('active');
});



