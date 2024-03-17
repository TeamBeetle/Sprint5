/****************************************************************************\
 Sign-up form script
 \****************************************************************************/
// for opening and closing the sign up form
let signupForm = document.querySelector(".signup-form");
let signupSubmitButton = document.querySelector("#signup-submit");


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

function validateEmail(inputEmail, errorMessage)
{
    if(inputEmail.match(/(?:[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)])/i))
    {
        errorMessage.style.display = "none";
        return 0;
    }
    errorMessage.style.display = "inline";
    return 1;
}
/*************************** end sign-up script *****************************/
