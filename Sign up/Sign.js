function showSuccessMessage(event) {
    document.getElementById("notification").style.display = "block";
    event.preventDefault();  // This prevents the form from being submitted.
    return false; // You can safely return false after preventDefault
}

function isLeapYear(year) {
    return ((year % 4 == 0) && (year % 100 != 0)) || (year % 400 == 0);// decide a year is a leap year or not. 
}

 // Showing days of month in february (29 days, 28)
function getMonthAndDayFromDayOfYear(dayOfYear, year) {
    var month_days = isLeapYear(year) ? [31, 29, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31] : [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
   
    var month, day;//to decide month and day of year
    for(month = 0; month < 12; month++) {
        if(dayOfYear <= month_days[month]) {
            day = dayOfYear;
            break;
        } else {
            dayOfYear -= month_days[month];
        }
    }
    month++; // convert to 1-indexed
    return [month, day];
}

let btnGroup = document.querySelector('.btns-group');
btnGroup.style.marginLeft = '40px';
btnGroup.style.marginRight = '40px';




//whole calculation for gender, dob, age by nic
function calculateDetails() {
    var nic = document.getElementById('nic').value;
    var gender, dob, year, month_day, month, day, age;
    var now = new Date();//represents current date & time
    var current_year = now.getFullYear();
    var current_month = now.getMonth() + 1;
    var current_day = now.getDate();

    //calculation to 9 digits and letter v NIC
    if (nic.length == 10) {// check about id length
        year = '19' + nic.substr(0, 2);// check about birth year
        dayOfYear = parseInt(nic.substr(2, 3));//shows a day in year
        gender = dayOfYear < 500 ? 'Male' : 'Female';//check the gender
        if(gender == 'Female') dayOfYear -= 500; // Correct for female
        month_day = getMonthAndDayFromDayOfYear(dayOfYear, parseInt(year));// to decide birth date and month
        month = month_day[0];//calculation to identify month
        day = month_day[1];// calculation to identify date

        //calculation to 12 digits NIC
    } else if (nic.length == 12) {// check about id length
        year = nic.substr(0, 4);// check about birth year
        dayOfYear = parseInt(nic.substr(4, 3));
        gender = dayOfYear < 500 ? 'Male' : 'Female';
        if(gender == 'Female') dayOfYear -= 500; // Correct for female
        month_day = getMonthAndDayFromDayOfYear(dayOfYear, parseInt(year));
        month = month_day[0];
        day = month_day[1];
    }

    dob = year + '-' + month.toString().padStart(2, '0') + '-' + day.toString().padStart(2, '0');

    if (current_month < month || (current_month == month && current_day < day)) {
        age--;
    }

    document.getElementById('dob').value = dob;
    document.getElementById('gender').value = gender;
}
//validation for NIC
function validateNIC(inputField) {
    inputField.value = inputField.value.replace(/[^0-9vV]/g, '');
    if (inputField.value.length > 12) { 
        inputField.value = inputField.value.slice(0, 12); 
    }
}


function validateForm() {
    var firstName = document.forms["textForm"]["Fname"].value;
    var lastName = document.forms["textForm"]["Lname"].value;
    var contactNumber = document.forms["textForm"]["contactNumber"].value;
    var nicNumber = document.forms["textForm"]["nicNumber"].value;
    var age = document.forms["textForm"]["age"].value;

    if (!validateIndividualName(firstName) || 
        !validateIndividualName(lastName) || 
        !validateContactNumber(contactNumber) || 
        !validateNICNumber(nicNumber)){
            return false;  
    }
    return true;
}
 
function validateIndividualName(name) {
    var regex = /^[A-Za-z\s]+$/;
    return regex.test(name);
}
function validateContactNumber(inputField) {
    const cleanedNumber = inputField.value.replace(/\D/g, ''); // Remove non-numeric characters

    if (cleanedNumber.length > 10) {
        inputField.value = cleanedNumber.slice(0, 10); // Truncate to 10 digits
    }

    const isValidNumber = /^[0-9]{10}$/.test(cleanedNumber);

    return isValidNumber;
}



function validateNICNumber(nic) {
    return /^[0-9]{9}[vV]$|^[0-9]{12}$/.test(nic);
}


document.addEventListener("DOMContentLoaded", function() {
    const steps = document.querySelectorAll(".form-step");
    const progressSteps = document.querySelectorAll(".progress-step");
    const progress = document.getElementById("progress");
    let currentStep = 0;

    // Show the current step  
    function showStep(stepIndex) {
        steps[stepIndex].classList.add("active");
        progressSteps[stepIndex].classList.add("active");
        progress.style.width = ((stepIndex / (steps.length - 1)) * 100) + "%";
    }

    // Hide all steps
    function hideAllSteps() {
        steps.forEach(step => step.classList.remove("active"));
        progressSteps.forEach(step => step.classList.remove("active"));
    }

    // Next button handler
    document.querySelectorAll(".btn-next").forEach((btn, index) => {
        btn.addEventListener("click", function(e) {
            e.preventDefault();
            if (currentStep < steps.length - 1) {
                hideAllSteps();
                currentStep++;
                showStep(currentStep);
            }
        });
    });

    // Previous button handler
    document.querySelectorAll(".btn-pre").forEach((btn, index) => {
        btn.addEventListener("click", function(e) {
            e.preventDefault();
            if (currentStep > 0) {
                hideAllSteps();
                currentStep--;
                showStep(currentStep);
            }
        });
    });

    // Initialize the form with the first step
    showStep(0);
});