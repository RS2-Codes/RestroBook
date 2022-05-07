const timeSlots = ['<option disabled selected hidden>Select your time</option>', '<option value="1">10AM-11AM</option>', '<option value="2">11AM-12PM</option>', '<option value="3">12PM-1PM</option>', '<option value="4">1PM-2PM</option>', '<option value="5">2PM-3PM</option>', '<option value="6">3PM-4PM</option>', '<option value="7">4PM-5PM</option>', '<option value="8">5PM-6PM</option>', '<option value="9">6PM-7PM</option>', '<option value="10">7PM-8PM</option>', '<option value="11">8PM-9PM</option>', '<option value="12">9PM-10PM</option>'];
let bookingDate = document.getElementById("booking_date")
let bookingTime = document.getElementById("booking_time")
let submitBtn = document.getElementById("submit-btn")

bookingTime.disabled = true
submitBtn.disabled = true
bookingDate.style.border = '2px solid red'

bookingDate.onchange = function() {
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
                    for (let i = 2; i < timeSlots.length; i++) {
                        bookingTime.innerHTML += timeSlots[i];
                    }
                    submitBtn.disabled = false
                    break;
                case '11AM':
                    for (let i = 3; i < timeSlots.length; i++) {
                        bookingTime.innerHTML += timeSlots[i];
                    }
                    submitBtn.disabled = false
                    break;
                case '12PM':
                    for (let i = 4; i < timeSlots.length; i++) {
                        bookingTime.innerHTML += timeSlots[i];
                    }
                    submitBtn.disabled = false
                    break;
                case '1PM':
                    for (let i = 5; i < timeSlots.length; i++) {
                        bookingTime.innerHTML += timeSlots[i];
                    }
                    submitBtn.disabled = false
                    break;
                case '2PM':
                    for (let i = 6; i < timeSlots.length; i++) {
                        bookingTime.innerHTML += timeSlots[i];
                    }
                    submitBtn.disabled = false
                    break;
                case '3PM':
                    for (let i = 7; i < timeSlots.length; i++) {
                        bookingTime.innerHTML += timeSlots[i];
                    }
                    submitBtn.disabled = false
                    break;
                case '4PM':
                    for (let i = 8; i < timeSlots.length; i++) {
                        bookingTime.innerHTML += timeSlots[i];
                    }
                    submitBtn.disabled = false
                    break;
                case '5PM':
                    for (let i = 9; i < timeSlots.length; i++) {
                        bookingTime.innerHTML += timeSlots[i];
                    }
                    submitBtn.disabled = false
                    break;
                case '6PM':
                    for (let i = 10; i < timeSlots.length; i++) {
                        bookingTime.innerHTML += timeSlots[i];
                    }
                    submitBtn.disabled = false
                    break;
                case '7PM':
                    for (let i = 11; i < timeSlots.length; i++) {
                        bookingTime.innerHTML += timeSlots[i];
                    }
                    submitBtn.disabled = false
                    break;
                case '8PM':
                    for (let i = 12; i < timeSlots.length; i++) {
                        bookingTime.innerHTML += timeSlots[i];
                    }
                    submitBtn.disabled = false
                    break;
                case '9PM':
                    ;
                    break;
                case '10PM':
                case '11PM':
                case '12PM':
                    bookingTime.innerHTML = `<option disabled selected hidden>No slots available</option>`;
                    bookingTime.disabled = true
                    submitBtn.disabled = true
                    break;
                default:
                    for (let i = 0; i < timeSlots.length; i++) {
                        bookingTime.innerHTML += timeSlots[i];
                    }
                    submitBtn.disabled = false
                    break;
            }
        } else {
            bookingTime.innerHTML = ``
            for (let i = 0; i < timeSlots.length; i++) {
                bookingTime.innerHTML += timeSlots[i];
            }
            submitBtn.disabled = false
        }
    }
}