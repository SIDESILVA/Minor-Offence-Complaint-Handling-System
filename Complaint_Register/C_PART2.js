
function handleFormSubmit(event) {
    event.preventDefault();  // prevent the default form submission action
    if (validateForm()) {
        alert('Submit successful!');
        window.location.href = 'part2.html';
    }
}