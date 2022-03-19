function validateform() 
{
    var name = document.signupform.name.value;
    var email = document.signupform.email.value;
    var pass = document.signupform.password.value;
    var cpass = document.signupform.cpassword.value;
    var mobile = document.signupform.phonenumber.value;
    var address = document.signupform.Address.value;
    var i;

    if (name == 0 || name == " ") {
        alert("Fill your Name please!");
        return false;
    }
    else if (email == 0 || email == " ") {
        alert("Please Add Email address.");
        return false;
    }
    else if (pass == 0 || pass == " ") {
        alert("Password can't be Blank");
        return false;
    }
    else if (cpass == 0 || cpass == " ") {
        alert("Confirm Password by Re-entering !");
        return false;
    }
    else if ( pass != cpass) {
        alert("Enter Matching Password !");
        return false;
    }
    else if (pass.length < 6 || pass.length > 10) {
        alert("Password must be between 6 to 10 characters long.");
        return false;
    }
    else if (mobile == 0 || mobile == " ") {
        alert("Please Fill Contact Number");
        return false;
    }
    else if (mobile.length < 10 || mobile.length > 10) {
        alert("Check Length of Contact Number.");
        return false;
    }
    else if (address == 0 || address == " ") {
        alert("Please Fill the Address.");
        return false;
    }

}