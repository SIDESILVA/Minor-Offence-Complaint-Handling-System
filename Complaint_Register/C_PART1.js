function generateComplaintNumber() {
    // Get the current date
    const currentDate = new Date();

    // Format the date as 'YYYY/MM/DD'
    const formattedDate = currentDate.getFullYear() + 
                          String(currentDate.getMonth() + 1).padStart(2, '0')  + 
                          String(currentDate.getDate()).padStart(2, '0');

    // Format the time as 'HH:MM:SS'
    const formattedTime = String(currentDate.getHours()).padStart(2, '0') +
                          String(currentDate.getMinutes()).padStart(2, '0')  + 
                          String(currentDate.getSeconds()).padStart(2, '0');

    // Combine "CN" with the formatted date, space, hyphen, and the formatted time
    const complaintNumber = 'CN' + formattedDate +  formattedTime;

    // Update the "Complaint No:" input field with the generated number
    document.querySelector('[name="complaintNumber"]').value = complaintNumber;
}
function generateReferenceNumber() {
    // Get the current date
    const currentDate = new Date();

    // Extract the last two digits of the year
    const lastTwoDigits = String(currentDate.getFullYear()).slice(-2);

    // Format the date as 'DD/MM/YY'
    const formattedDate = String(currentDate.getDate()).padStart(2, '0') + 
                          String(currentDate.getMonth() + 1).padStart(2, '0')+ 
                          lastTwoDigits;

    // Format the time as 'HH/MM/SS'
    const formattedTime = String(currentDate.getHours()).padStart(2, '0') + 
                          String(currentDate.getMinutes()).padStart(2, '0') + 
                          String(currentDate.getSeconds()).padStart(2, '0');

    // Combine "REF" with space, hyphen, formatted time, "(", "P", slash, formatted date, and ")"
    const referenceNumber = 'REF' + formattedTime  + formattedDate ;

    // Update the "Reference No:" input field with the generated number
    document.querySelector('[name="refNumber"]').value = referenceNumber;
}


window.onload = function() {
    generateComplaintNumber();
    generateReferenceNumber();
    // You can add other functions that should run on page load here.
};


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
    age = current_year - parseInt(year);

    if (current_month < month || (current_month == month && current_day < day)) {
        age--;
    }

    document.getElementById('dob').value = dob;
    document.getElementById('gender').value = gender;
    document.getElementById('age').value = age;
}

//validation for first name and last name
function validateName(inputField) {
    var regex = /^[A-Za-z\s]+$/;
    if (!regex.test(inputField.value)) {
        alert("Please enter a valid name. Only letters and spaces allowed.");
    }
}

//validation for contact number
function validateNumber(inputField) {
    inputField.value = inputField.value.replace(/\D/g, '');  
    if (inputField.value.length > 10) {
        inputField.value = inputField.value.slice(0, 10);  
    }
}

//validation for NIC
function validateNIC(inputField) {
    inputField.value = inputField.value.replace(/[^0-9vV]/g, '');
    if (inputField.value.length > 12) { 
        inputField.value = inputField.value.slice(0, 12); 
    }
}

//validation age
function validateAge(inputField) {
    inputField.value = inputField.value.replace(/\D/g, ''); 
    if (inputField.value.length > 2) {
        inputField.value = inputField.value.slice(0, 2);
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
        !validateNICNumber(nicNumber) ||
        !validateAgeValue(age)) {
            return false;  
    }
    return true;
}
 
function validateIndividualName(name) {
    var regex = /^[A-Za-z\s]+$/;
    return regex.test(name);
}

function validateContactNumber(number) {
    return number.length === 10 && /^\d{10}$/.test(number);
}

function validateNICNumber(nic) {
    return /^[0-9]{9}[vV]$|^[0-9]{12}$/.test(nic);
}

function validateAgeValue(age) {
    return age.length <= 2 && /^\d{1,2}$/.test(age);
}
