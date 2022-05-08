<div id="login-signup-form" style="display: none">
    <div id="login-signup-close"></div>
    <div class="login-signup-form">
        <form class="login form" id="loginForm" onsubmit="loginSubmit(event);"><span class="login__icon">RestroBook</span>
            <h2 class="login__title">Log in to RestroBook</h2>
            <div class="login__row">
                <label class="login__label" for="lg-em">e-mail</label>
                <input class="login__input" id="lg-em" name="login_email" type="email" placeholder="example@email.com" />
            </div>
            <div class="login__row">
                <label class="login__label" for="lg-ps">password</label>
                <input class="login__input" id="lg-ps" name="login_password" type="password" placeholder="**********" />
            </div>
            <div class="login__row">
                <button class="login__button" type="submit">sign in</button>
            </div>
            <div class="login__row"><a class="login__link">forgot your password?</a></div>
        </form>
        <form class="signup is-form-open form" id="signupForm" onsubmit="signupSubmit(event);">
            <svg class="svg-icon signup__trigger signup__trigger--fixed" viewBox="0 0 20 20">
                <path d="M14.613,10c0,0.23-0.188,0.419-0.419,0.419H10.42v3.774c0,0.23-0.189,0.42-0.42,0.42s-0.419-0.189-0.419-0.42v-3.774H5.806c-0.23,0-0.419-0.189-0.419-0.419s0.189-0.419,0.419-0.419h3.775V5.806c0-0.23,0.189-0.419,0.419-0.419s0.42,0.189,0.42,0.419v3.775h3.774C14.425,9.581,14.613,9.77,14.613,10 M17.969,10c0,4.401-3.567,7.969-7.969,7.969c-4.402,0-7.969-3.567-7.969-7.969c0-4.402,3.567-7.969,7.969-7.969C14.401,2.031,17.969,5.598,17.969,10 M17.13,10c0-3.932-3.198-7.13-7.13-7.13S2.87,6.068,2.87,10c0,3.933,3.198,7.13,7.13,7.13S17.13,13.933,17.13,10">
                </path>
            </svg>
            <div class="signup__wrapper is-wrapper-open" id="signup-wrapper">
                <div class="signup__row signup__row--flex"><span class="signup__icon">RestroBook</span>
                    <svg class="svg-icon signup__trigger" viewbox="0 0 20 20">
                        <path d="M10.185,1.417c-4.741,0-8.583,3.842-8.583,8.583c0,4.74,3.842,8.582,8.583,8.582S18.768,14.74,18.768,10C18.768,5.259,14.926,1.417,10.185,1.417 M10.185,17.68c-4.235,0-7.679-3.445-7.679-7.68c0-4.235,3.444-7.679,7.679-7.679S17.864,5.765,17.864,10C17.864,14.234,14.42,17.68,10.185,17.68 M10.824,10l2.842-2.844c0.178-0.176,0.178-0.46,0-0.637c-0.177-0.178-0.461-0.178-0.637,0l-2.844,2.841L7.341,6.52c-0.176-0.178-0.46-0.178-0.637,0c-0.178,0.176-0.178,0.461,0,0.637L9.546,10l-2.841,2.844c-0.178,0.176-0.178,0.461,0,0.637c0.178,0.178,0.459,0.178,0.637,0l2.844-2.841l2.844,2.841c0.178,0.178,0.459,0.178,0.637,0c0.178-0.176,0.178-0.461,0-0.637L10.824,10z">
                        </path>
                    </svg>
                </div>
                <h2 class="signup__title">sign up for free, now.</h2>
                <div class="signup__row">
                    <label class="signup__label" for="su-us">username</label>
                    <input class="signup__input" id="su-us" name="signup_username" type="text" placeholder="username" required />
                </div>
                <div class="signup__row">
                    <label class="signup__label" for="su-em">E-Mail</label>
                    <input class="signup__input" id="su-em" name="signup_email" type="email" placeholder="example@email.com" required />
                </div>
                <div class="signup__row">
                    <label class="signup__label" for="su-ps">password</label>
                    <input class="signup__input" id="su-ps" name="signup_password" type="password" placeholder="**********" required />
                </div>
                <div class="signup__row">
                    <button class="signup__button" name="signupFormSubmit" type="submit">sign up</button>
                </div>
                <!-- <div class="signup__row"><a class="signup__link">forgot your password?</a></div> -->
            </div>
        </form>
    </div>
</div>