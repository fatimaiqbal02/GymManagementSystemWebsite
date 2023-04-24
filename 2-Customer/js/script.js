let menu = document.querySelector("#menu-btn");
let navbar = document.querySelector(".navbar");
let header = document.querySelector(".header");

let chatBoxPopUpButton = document.querySelector("#chatboxbtn");
let chatBox = document.querySelector(".chatboxSpace");

let cprofile = document.querySelector(".customerProfile");
let profileCloseBtn = document.querySelector("#customerProfilePopUpCloseBtn");

profileCloseBtn.onclick = () => {
	cprofile.classList.remove("active");
};

/* document.querySelector("#memberProfileBtn").onclick = () => {
	cprofile.classList.toggle("active");
};
 */
menu.onclick = () => {
	menu.classList.toggle("fa-times");
	navbar.classList.toggle("active");
};

window.onscroll = () => {
	menu.classList.remove("fa-times");
	navbar.classList.remove("active");
	header.classList.toggle("active", scrollY > 0);
	chatBox.classList.remove("active");
};

chatBoxPopUpButton.onclick = () => {
	chatBox.classList.toggle("active");
};
