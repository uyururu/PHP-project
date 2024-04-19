const wrapper = document.querySelector('.wrapper');
const containerform = document.querySelector('.container-form');
const loginLink = document.querySelector('.login-link');
const registerLink = document.querySelector('.register-link');
const forgotlink = document.querySelector('.forgot-link');
const resetpass = document.querySelector('.reset');
const returnlogin = document.querySelector('.return-login-link');
const btnPopup = document.querySelector('.btnLogin-popup');
const iconClose = document.querySelector('.icon-close');
function disableScroll() {
    // Get the current page offset
    var yOffset = window.pageYOffset;
    // Set the body to fixed positioning to prevent scrolling
    document.body.style.position = 'fixed';
    document.body.style.top = `-${yOffset}px`;
}
function enableScroll() {
    // Get the current body top value
    var yOffset = parseInt(document.body.style.top, 10);
    // Reset the body positioning and scroll to the previous offset
    document.body.style.position = '';
    document.body.style.top = '';
    window.scrollTo(0, Math.abs(yOffset));
}
registerLink.addEventListener('click', () => {
    wrapper.classList.add('active');
});

loginLink.addEventListener('click', () => {
    wrapper.classList.remove('active');
})
forgotlink.addEventListener('click', () => {
    wrapper.classList.add('active1');
})
returnlogin.addEventListener('click', () => {
    wrapper.classList.remove('active1');
})
document.addEventListener('click', function handleClickOutsideBox(event) {
    if (containerform.contains(event.target)) {
        containerform.style.display = "none";
        wrapper.classList.remove('active-popup');
        enableScroll();
    }
});
btnPopup.addEventListener('click', () => {
    wrapper.classList.add('active-popup');
    containerform.style.display = "block";
    disableScroll();
});
iconClose.addEventListener('click', () => {
    wrapper.classList.remove('active-popup');
    containerform.style.display = "none";
    enableScroll();
});

// ================================
function resetPass() {
    wrapper.classList.add('active-popup');
    containerform.style.display = "block";
    disableScroll();
    iconClose.addEventListener('click', () => {
        wrapper.classList.remove('active2');
    });
    document.addEventListener('click', function handleClickOutsideBox(event) {
        if (containerform.contains(event.target)) {
            containerform.style.display = "none";
            wrapper.classList.remove('active-popup');
            wrapper.classList.remove('active2');
            enableScroll();
        }
    });
}
var previousURL = document.referrer;
if (previousURL.includes("index.php?action=forget&act=forget_action")) {
    wrapper.classList.add('active2');
    resetPass()
}