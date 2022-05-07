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
                    window.location.reload();
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
const signupElement = document.querySelector("#signup");
const signupWrapperElement = document.querySelector("#signup-wrapper");
const forms = document.querySelectorAll(".form");

const openFormFunc = () => {
    signupTrigger[0].classList.toggle("is-trigger-hidden");
    signupElement.classList.toggle("is-form-open");
    signupWrapperElement.classList.toggle("is-wrapper-open");
};

signupTrigger.forEach((s) => s.addEventListener("click", openFormFunc));
forms.forEach((f) => f.addEventListener("submit", (e) => e.preventDefault()));