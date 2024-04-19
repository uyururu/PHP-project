const wrapper = document.querySelector('.wrapper');
const loginLink = document.querySelector('.login-link');
const registerLink = document.querySelector('.register-link');
const btnPopup = document.querySelector('.btnLogin-popup');
const iconClose = document.querySelector('.icon-close');
const fill = document.querySelectorAll('.trans');
console.log(fill.length);
console.log(1);
// fill.forEach(fill => {
//     console.log(fill.textContent);
// });

registerLink.addEventListener('click', () => {
    wrapper.classList.add('active');
    console.log(1);
});
loginLink.addEventListener('click', () => {
    wrapper.classList.remove('active');
})

btnPopup.addEventListener('click', () => {
    wrapper.classList.add('active-popup');
});
iconClose.addEventListener('click', () => {
    wrapper.classList.remove('active-popup');
});
