
const popupLinks = document.querySelectorAll('.popup-link');
const body = document.querySelectorAll('body');
const lockPadding = document.querySelectorAll(".lock-padding");

let unlock = true;

const timeout = 800;

if (popupLinks.length > 0) {
    for (let index = 0; index < popupLinks.length; index++) {
        const popupLink = popupLinks[index];
        popupLink.addEventListener("click", function (e) {
            const popupName = popupLink.getAttribute('href').replace('#', '');
            const curentPopup = document.getElementById(popupName);
            popupOpen(curentPopup);

            e.preventDefault();

        })
    }
}
const popupCloseIcon = document.querySelectorAll('.close-popup');
if (popupCloseIcon.length > 0) {
    for (let index = 0; index < popupCloseIcon.length; index++) {
        const el = popupCloseIcon[index];
        el.addEventListener('click', function (e) {
            popupClose(el.closest('.popup'));
            e.preventDefault();
        })
    }
}

function popupOpen(curentPopup) {
    if (curentPopup && unlock) {


        curentPopup.classList.add('open');

        curentPopup.addEventListener("click", function (e) {
            if (!e.target.closest('.popup__content')) {
                popupClose(e.target.closest('.popup'));
            }
        })
    }
}
function popupClose(popupActive, doUnlock = true) {
    if (unlock) {
        popupActive.classList.remove('open');
        if (doUnlock) {
            bodyUnlock();
        }
    }
}
const basketButtontClose = document.querySelector('.close-popup')
basketButtontClose.addEventListener('click', function (e) {
    document.querySelector('body').classList.remove('body__hidden');

    if (!e.target.closest('.popup__content')) {
        e.target.closest('.popup').classList.remove('body__hidden');;
    }
    
})


const bascketButton = document.querySelector('.basket')
bascketButton.addEventListener('click', function () {
    document.querySelector('body').classList.add('body__hidden');
})


function bodyLock() {

    unlock = false
    setTimeout(function () {
        unlock = true;
    }, timeout);
}

function bodyUnlock() {
    setTimeout(function () {
        if (lockPadding.length > 0) {
            for (let index = 0; index < lockPadding.length; index++) {
                const el = lockPadding[index];
                el.style.paddingRigth = '0px';
            }
        }
        body.style.paddingRight = '0px';
        body.classList.remove('lock');
    }, timeout);
}