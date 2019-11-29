window.onload = function () {
    var submitButton = document.getElementById("submit");

    submitButton.onclick = formSubmit;

    function formSubmit() {
        var firstname = document.getElementById("firstname").value;
        var lastname = document.getElementById("lastname").value;
        var constituency = document.getElementById("constituency").value;
        var email = document.getElementById("email").value;
        var emailRegex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        var regex = /^[a-zA-Z-. ]+$/; 
        var years = document.getElementById("years").value;
        var password = document.getElementById("password").value;
        var confirmpassword = document.getElementById("confirmpassword").value;

        var hidden = document.getElementById("hidden").value;
        var messageDiv = document.getElementById("message");

        messageDiv.innerHTML="";
        messageDiv.classList.remove("error");
        messageDiv.classList.remove("success");
        document.getElementById("years").classList.remove("errorFound");
        document.getElementById("email").classList.remove("errorFound");
        document.getElementById("password").classList.remove("errorFound");
        document.getElementById("confirmpassword").classList.remove("errorFound");

        if((firstname !== "") && (lastname !== "") && (constituency !== "") && (email !== "") && (years !== "") && (password !== "") && (confirmpassword !== "") && (hidden === "6eb6ac241942dc7226aeb")) {            

            if(regex.test(firstname))  {
                if(regex.test(lastname)) {
                    if(regex.test(constituency)) {
                        if(password === confirmpassword) {
                            if(emailRegex.test(email)) {
                                if(!(years<0) && !(years>50)) {
                                    alert("Successfully added to the database!");
                                    return true;
                                } else {
                                    messageDiv.innerHTML = "Years of service cannot be outside the range 0-50!";
                                    document.getElementById("years").classList.add("errorFound");
                                    messageDiv.classList.add("error");
                                    return false;
                                }
                            } else {
                                messageDiv.innerHTML = "Invalid email address entered!";
                                document.getElementById("email").classList.add("errorFound");
                                messageDiv.classList.add("error");
                                return false;
                            }
                        } else {
                            messageDiv.innerHTML = "Passwords do not match!";
                            document.getElementById("password").classList.add("errorFound");
                            document.getElementById("confirmpassword").classList.add("errorFound");
                            messageDiv.classList.add("error");
                            return false;
                        }
                    } else {
                        messageDiv.innerHTML = "Invalid string entered for the constituency!";
                        document.getElementById("constituency").classList.add("errorFound");
                        messageDiv.classList.add("error");
                        return false;
                    }
                } else {
                    messageDiv.innerHTML = "Invalid string entered for the last name!";
                    document.getElementById("lastname").classList.add("errorFound");
                    messageDiv.classList.add("error");
                    return false;
                }
            } else {
                messageDiv.innerHTML = "Invalid string entered for the first name!";
                document.getElementById("firstname").classList.add("errorFound");
                messageDiv.classList.add("error");
                return false;
            }
        } else {
            messageDiv.innerHTML = "Please ensure that all fields are filled.";
            messageDiv.classList.add("error");
            return false;
        }


    }

}