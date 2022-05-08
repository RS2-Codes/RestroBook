const locChanger = document.getElementsByClassName('loc_changer');

for (let i = 0; i < locChanger.length; i++) {
    locChanger[i].onclick = function(e) {
        //console.log(e.target.getAttribute('data_loc_id'));
        $.ajax({
            type: "POST",
            url: 'assets/locSetter.php',
            data: {
                sessionSetterInit: 1,
                sessionLocSetter: e.target.getAttribute('data_loc_id')
            },
            success: function(data) {
                if (parseInt(data) == 1) {
                    /* window.location.reload(); */
                    location.replace('index.php');
                } else {
                    alert('Something went wrong');
                }
            }
        });
        //sessionStorage.setItem("user_location", e.target.getAttribute('data_loc_id'));
    }
}


const loginSignupForm = document.getElementById('login-signup-form');
const loginSignupClose = document.getElementById('login-signup-close');

const loginTrigger = document.getElementById('login-trigger');

loginTrigger.onclick = function() {
    loginSignupForm.style.display = 'flex';
}

loginSignupClose.onclick = () => {
    loginSignupForm.style.display = 'none';
};

const signupTrigger = document.querySelectorAll(".signup__trigger");
const signupElement = document.querySelector("#signupForm");
const signupWrapperElement = document.querySelector("#signup-wrapper");
const forms = document.querySelectorAll(".form");

const openFormFunc = () => {
    signupTrigger[0].classList.toggle("is-trigger-hidden");
    signupElement.classList.toggle("is-form-open");
    signupWrapperElement.classList.toggle("is-wrapper-open");
};

signupTrigger.forEach((s) => s.addEventListener("click", openFormFunc));
forms.forEach((f) => f.addEventListener("submit", (e) => e.preventDefault()));



/* Signup Form */

let signupForm = $('#signupForm')
let loginForm = $('#loginForm')

function signupSubmit(e) {
    e.preventDefault()
    $.ajax({
        type: 'POST',
        url: 'backend/assets/check.php',
        data: signupForm.serialize(),
        success: function(data) {
            if (data == 1) {
                alert("Failed to register");
            } else if (data == 2) {
                window.location.reload();
            } else {
                alert("Account created but failed to login");
            }
        }
    });
}

function loginSubmit(e) {
    e.preventDefault()
    $.ajax({
        type: 'POST',
        url: 'backend/assets/check.php',
        data: loginForm.serialize(),
        success: function(data) {
            if (data == 1) {
                window.location.reload();
            } else {
                alert('Failed to login')
            }
        }
    });
}