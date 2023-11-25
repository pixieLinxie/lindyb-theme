//////////////////////////
//     Menu Toggle     //
////////////////////////

const menuBtn = document.querySelector('.menu-btn');
const hamburger = document.querySelector('.menu-btn__burger');
const nav = document.querySelector('.nav');
const menuNav = document.querySelector('.menu');
const navItems = document.querySelectorAll('.menu-item');
let showMenu = false;

menuBtn.addEventListener('click', toggleMenu);

function toggleMenu() {
	if (!showMenu) {
		hamburger.classList.add('open');
		nav.classList.add('open');
		menuNav.classList.add('open');
		navItems.forEach((item) => item.classList.add('open'));
		menuBtn.classList.add('open');

		showMenu = true;
	} else {
		hamburger.classList.remove('open');
		nav.classList.remove('open');
		menuNav.classList.remove('open');
		navItems.forEach((item) => item.classList.remove('open'));
		menuBtn.classList.remove('open');

		showMenu = false;
	}
}

// Add Active Class To Current Page Blog Link
const currentLocation = location.href;
const menuLink = document.querySelectorAll('a');
const menuLength = menuLink.length;
for (let i = 0; i < menuLength; i++) {
	if (menuLink[i].href == currentLocation) {
		menuLink[i].classList.add('active');
	} else {
		menuLink[i].classList.remove('active');
	}
}

//////////////////////////
//   Accordion Toggle  //
////////////////////////

const accordion = document.querySelectorAll('.accordion');

accordion.forEach((item) => {
	item.addEventListener('click', () => {
		item.classList.toggle('accordion-open');
	});
});
