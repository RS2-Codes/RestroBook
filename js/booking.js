let bookingDate = document.getElementById("booking_date")
let bookingTime = document.getElementById("booking_time")
let submitBtn = document.getElementById("submit-btn")
import { times } from './data.js';
bookingTime.disabled = true
submitBtn.disabled = true
bookingDate.style.border = '2px solid red'

bookingDate.onchange = () => {
    if (!bookingDate.value == '') {
        bookingTime.disabled = false
        bookingDate.style.border = '0'

        let today = new Date();
        let dd = String(today.getDate()).padStart(2, '0');
        let mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
        let yyyy = today.getFullYear();

        today = yyyy + '-' + mm + '-' + dd;
        if (bookingDate.value == today) {
            function formatHoursTo12(date) {
                return date % 12 || 12;
            }
            let currentdate = new Date();
            let datetime = "Last Sync: " +
                currentdate.getHours() + ":" +
                currentdate.getMinutes();
            let ampm = currentdate.getHours() >= 12 ? 'PM' : 'AM';
            let timeChecker = formatHoursTo12(currentdate.getHours()) + ampm;
            /* console.log(timeChecker); */
            bookingTime.innerHTML = ``
            switch (timeChecker) {
                case '10AM':
                    bookingTime.innerHTML += times.time[timeChecker];

                    submitBtn.disabled = false
                    break;
                case '11AM':
                    bookingTime.innerHTML += times.time[timeChecker];

                    submitBtn.disabled = false
                    break;
                case '12PM':
                    bookingTime.innerHTML += times.time[timeChecker];

                    submitBtn.disabled = false
                    break;
                case '1PM':
                    bookingTime.innerHTML += times.time[timeChecker];

                    submitBtn.disabled = false
                    break;
                case '2PM':
                    bookingTime.innerHTML += times.time[timeChecker];

                    submitBtn.disabled = false
                    break;
                case '3PM':
                    bookingTime.innerHTML += times.time[timeChecker];

                    submitBtn.disabled = false
                    break;
                case '4PM':
                    ookingTime.innerHTML += times.time[timeChecker];

                    submitBtn.disabled = false
                    break;
                case '5PM':
                    bookingTime.innerHTML += times.time[timeChecker];

                    submitBtn.disabled = false
                    break;
                case '6PM':
                    bookingTime.innerHTML += times.time[timeChecker];

                    submitBtn.disabled = false
                    break;
                case '7PM':
                    bookingTime.innerHTML += times.time[timeChecker];

                    submitBtn.disabled = false
                    break;
                case '8PM':
                    bookingTime.innerHTML += times.time[timeChecker];

                    submitBtn.disabled = false
                    break;
                case '9PM':
                    bookingTime.innerHTML = times.time[timeChecker];
                    bookingTime.disabled = true
                    submitBtn.disabled = true
                    break;
                case '10PM':
                    bookingTime.innerHTML = times.time[timeChecker];
                    bookingTime.disabled = true
                    submitBtn.disabled = true
                    break;
                case '11PM':
                    bookingTime.innerHTML = times.time[timeChecker];
                    bookingTime.disabled = true
                    submitBtn.disabled = true
                    break;
                case '12AM':
                    bookingTime.innerHTML = times.time[timeChecker];
                    bookingTime.disabled = true
                    submitBtn.disabled = true
                    break;
                default:
                    bookingTime.innerHTML += times.time.all;
                    submitBtn.disabled = false
                    break;
            }
        } else {
            bookingTime.innerHTML = ``
            bookingTime.innerHTML += times.time.all;
            submitBtn.disabled = false
        }
    }
}

bookingTime.onchange = () => {
    if (bookingTime.style.borderWidth == '2px') {
        bookingTime.style.borderWidth = '0px'
    }
}

let bookingForm = $('#booking_form')

function bookingSubmit(e) {
    e.preventDefault()
    $.ajax({
        type: 'POST',
        url: 'backend/assets/check.php',
        data: bookingForm.serialize(),
        success: function (data) {
            if (data == 1) {
                loginTrigger.click();
            } else if (data == 2) {
                window.location.replace('booked.php');
            } else if (data == 3) {
                bookingTime.style.border = '2px solid red'
            } else {
                alert(data)
                alert('Unable to book');
            }
            /* console.log(data) */
        }
    });
}