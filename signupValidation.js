/****************************************************************************\
 Sign-up form script
 \****************************************************************************/
// for opening and closing the sign up form
let signupAnchor = document.querySelector(".sign-up");
let signupForm = document.querySelector(".signup-form");
let closeButton = document.querySelector(".form-close-button");
let signupSubmitButton = document.querySelector("#signup-submit");

signupAnchor.addEventListener("click", function(){
    signupForm.style.visibility = "visible";
    signupForm.style.opacity = "1";

});

closeButton.addEventListener("click", function()
{
    signupForm.style.visibility = "hidden";
    signupForm.style.opacity = "0";
});
signupSubmitButton.addEventListener("click", function(event)
{
    //stop regular behavior
    event.preventDefault();

    //get the user input
    let signupName = document.querySelector('#user-name').value;
    let signupEmail = document.querySelector('#user-email').value;
    let signupCohort = document.querySelector('#user-cohort-number').value;
    let signupInterest = document.querySelector("#interests").value;

    let errors = 0;

    errors += validateSignupName(signupName); //1 if error || 0 if none
    let signupEmailError = document.querySelector("#signup-email-error");
    errors += validateEmail(signupEmail, signupEmailError); //1 if error || 0 if none
    errors += validateCohort(signupCohort); //1 if error || 0 is none
    errors += validateInterest(signupInterest); //1 if error || 0 is none

    if(errors===0)
    {
        document.forms["signup-form"].submit();
    }
});
function validateSignupName(inputName)
{
    if(inputName === "")
    {
        document.querySelector("#signup-name-error").style.display = "inline";
        return 1;
    }
    document.querySelector("#signup-name-error").style.display = "none";
    return 0;
}

function validateInterest(inputString)
{
    //for now just checking to see if empty
    if(inputString === "")
    {
        document.querySelector("#signup-interest-error").style.display = "inline";
        return 1;
    }
    document.querySelector("#signup-interest-error").style.display = "none";
    return 0;
}

function validateCohort(inputNumber)
{
    if(inputNumber > 100 || inputNumber < 1)
    {
        document.querySelector("#signup-cohort-error").style.display = "inline";
        return 1;
    }
    document.querySelector("#signup-cohort-error").style.display = "none";
    return 0;
}
/*************************** end sign-up script *****************************/
