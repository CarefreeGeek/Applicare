document.getElementById("bookNowForm").addEventListener("submit", function(event) {
    event.preventDefault();
    
    let isValid = true;

    // Full Name Validation
    const fullname = document.getElementById("fullname");
    const fullnameError = document.getElementById("fullnameError");
    if (fullname.value.trim() === "") {
        fullnameError.textContent = "Full Name is required.";
        fullnameError.style.display = "block";
        isValid = false;
    } else {
        fullnameError.style.display = "none";
    }

    // Email Validation
    const email = document.getElementById("email");
    const emailError = document.getElementById("emailError");
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(email.value)) {
        emailError.textContent = "Invalid email address.";
        emailError.style.display = "block";
        isValid = false;
    } else {
        emailError.style.display = "none";
    }

    // Phone Validation
    const phone = document.getElementById("phone");
    const phoneError = document.getElementById("phoneError");
    if (!phone.value.match(/^\d{10}$/)) {
        phoneError.textContent = "Phone number must be 10 digits.";
        phoneError.style.display = "block";
        isValid = false;
    } else {
        phoneError.style.display = "none";
    }

    // Address Validation
    const address = document.getElementById("address");
    const addressError = document.getElementById("addressError");
    if (address.value.trim() === "") {
        addressError.textContent = "Address is required.";
        addressError.style.display = "block";
        isValid = false;
    } else {
        addressError.style.display = "none";
    }

    // Appliance Validation
    const appliance = document.getElementById("appliance");
    const applianceError = document.getElementById("applianceError");
    if (appliance.value === "") {
        applianceError.textContent = "Please select an appliance.";
        applianceError.style.display = "block";
        isValid = false;
    } else {
        applianceError.style.display = "none"; // Corrected this line
    }

    // Service Validation
    const service = document.getElementById("service");
    const serviceError = document.getElementById("serviceError");
    if (service.value === "") {
        serviceError.textContent = "Please select a service.";
        serviceError.style.display = "block";
        isValid = false;
    } else {
        serviceError.style.display = "none"; // This is correct
    }
    
    
    

    document.getElementsByTagName("button").addEventListener("click", function(event) {
        event.preventDefault();
        // window.location.assign("submit_form.php");
        let isValid = true;
    
        // Validation code (same as before)
    
        if (isValid) {
            // Create a FormData object
            const formData = new FormData(this);
    
            // Send data to the PHP script using fetch
            fetch('submit_form.php', {
                method: 'POST',
                body: formData
            })
            // .then(response => response.text())
            .then(data => {
                alert(data); // Show success message or error
                alert("Form submitted successfully!");
                setTimeout(function() {
                    document.getElementById("form").reset();
                }, 3000);
            })
            .catch(error => {
                console.error('Error:', error);
            }); 
        }
    });    
});
