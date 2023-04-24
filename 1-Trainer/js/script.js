let DietPlanDesccloseBtn = document.querySelector("#dietPlanDescCloseBtn");
let dietPlanPopUp = document.querySelector(".dietPlanDescPopUp");

let profileCloseBtn = document.querySelector("#TrainerProfilePopUpCloseBtn");
let profile = document.querySelector(".trainerProfile");

let menuBtn = document.querySelector("#menu-btn");
let navbar = document.querySelector(".navbar");

/* ----------------------x----------- Customer Table -----------x------------------------------------- */
function tblSearchFunc() {
	let input, filter, table;
	input = document.getElementById("tblSearch");
	filter = input.value.toUpperCase();
	table = document.getElementById("customerTable");
	tr = table.getElementsByTagName("tr");

	for (let i = 0; i < tr.length; i++) {
		let td = tr[i].getElementsByTagName("td")[1];
		if (td) {
			let text = td.textContent || td.innerText;
			if (text.toUpperCase().indexOf(filter) > -1) {
				tr[i].style.display = "";
			} else {
				tr[i].style.display = "none";
			}
		}
	}
}

/* ----------------------x----------- Customer Table -----------x------------------------------------- */
/* ---------------------------------- Menu Button ------------------------------------------------- */

menuBtn.onclick = () => {
	menuBtn.classList.toggle("fa-times");
	navbar.classList.toggle("active");
};

/* -------------------------x-------- Menu Button ------------x------------------------------------ */
/* ---------------------------------- Profile Button ------------------------------------------------- */
profileCloseBtn.onclick = () => {
	profile.classList.remove("active");
};

/* ----------------------x----------- Profile Button -----------x------------------------------------- */
/* --------------------------------- Diet Plan Close Button ------------------------------------------------ */

DietPlanDesccloseBtn.addEventListener("click", () => {
	dietPlanPopUp.classList.remove("active");
});

/* --------------------x------------ Diet Plan Close Button ---------x-------------------------------------- */
window.onscroll = () => {
	menuBtn.classList.remove("fa-times");
	navbar.classList.remove("active");
	dietPlanPopUp.classList.remove("active");
};

/* document.querySelector('#trainerProfileBtn').onclick = ()=>{
    profile.classList.toggle('active');
} */

/* document.querySelectorAll('.viewDietPlanDescBtn').forEach(elem => elem.addEventListener("click",
() => {
    dietPlanPopUp.classList.toggle('active');
    
})); */
