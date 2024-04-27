function showPopup(event) {
    event.preventDefault();
    console.log("Form submitted"); // Add this line for debugging

    var formData = new FormData(document.getElementById('remittanceForm'));

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'submit.php', true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                alert("Remittance Form Submitted Successfully");
                window.location.href = "index.html";
            } else {
                alert("Error: " + xhr.responseText);
            }
        }
    };
    xhr.send(formData);}