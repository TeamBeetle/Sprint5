/****************************************************************************\
 Light-mode toggle script
\****************************************************************************/

const lightButtons = document.querySelectorAll('.toggle');
const toggleContainer = document.querySelector('#toggleContainer');
const page = document.querySelector('HTML');
window.onload = () =>
{
    document.querySelectorAll(".nav-link").forEach((element)=> element.style.color = "#fff");
}

toggleContainer.addEventListener('click', function(e)
{
    const clicked = e.target.closest('.toggle');
    console.log("clicked");
    if(!clicked || clicked.classList.contains('active-mode'))
    {
        return 0;
    }
    //change active toggle
    lightButtons.forEach( b => b.classList.remove('active-mode'));
    clicked.classList.add('active-mode');
    console.log("button was clicked");
    //preform actions.
    //Note: page.attributes[1].value refers to data-bs-theme in <html>
    if(page.attributes[1].value === 'light')
    {
        page.attributes[1].value = 'dark';
        document.querySelectorAll(".reminder-row > p").forEach(element => element.style.color = "white");
        document.querySelectorAll(".appinfo").forEach(element => element.style.color = "white");
        document.querySelector("body").style.backgroundColor = "#333";
        document.querySelectorAll(".nav-link").forEach((element)=> element.style.color = "#222");
        document.querySelector(".apps").style.backgroundColor = "#555";
        document.querySelector("#remindercontainer").style.backgroundColor = "#555";
        document.querySelectorAll(".pop-up").forEach((element) =>
        {
            element.style.backgroundColor= "#555";
            element.style.color = "#fff";
        });
    }
    else
    {
        page.attributes[1].value = 'light';
        document.querySelectorAll(".reminder-row > p").forEach(element => element.style.color = "black");
        document.querySelectorAll(".appinfo ").forEach(element => element.style.color = "black");
        document.querySelector("body").style.backgroundColor = "white";
        document.querySelectorAll(".nav-link").forEach((element)=> element.style.color = "#fff");
        document.querySelector(".apps").style.backgroundColor = "#fff";
        document.querySelector("#remindercontainer").style.backgroundColor = "#fff";
        document.querySelectorAll(".pop-up").forEach((element) =>
        {
            element.style.backgroundColor= "#fff";
            element.style.color = "#000";
        });

    }
});
/************************ end light-mode script *****************************/

/****************************************************************************\
 Sign-up form script
\****************************************************************************/
// for opening and closing the sign up form
let signupAnchor = document.querySelector(".sign-up");
let signupForm = document.querySelector(".signup-form");
let closeButton = document.querySelector(".form-close-button");

signupAnchor.addEventListener("click", function(){
    signupForm.style.visibility = "visible";
    signupForm.style.opacity = "1";

});

closeButton.addEventListener("click", function()
{
    signupForm.style.visibility = "hidden";
    signupForm.style.opacity = "0";
});
/*************************** end sign-up script *****************************/

/****************************************************************************\
 Application form script
\****************************************************************************/

let addAppAnchor = document.querySelector(".add-application");
let appForm = document.querySelector(".add-app-form");
let closeAppButton = document.querySelector(".app-close-button");

closeAppButton.addEventListener("click", function()
{
    appForm.style.visibility = "hidden";
    appForm.style.opacity = "0";
});

addAppAnchor.addEventListener("click", function()
{
    appForm.style.visibility = "visible";
    appForm.style.opacity = "1";
});

/*********************** end application script *****************************/

/****************************************************************************\
 contact form script
\****************************************************************************/

let contactAnchor = document.querySelector(".contact");
let contactForm = document.querySelector(".contact-form");
let closeContactButton = document.querySelector(".contact-close-button");
let contactSubmitButton = document.querySelector("#contact-submit");
contactAnchor.addEventListener("click", function()
{
    contactForm.style.visibility = "visible";
    contactForm.style.opacity = "1";

});

closeContactButton.addEventListener("click", function()
{
    contactForm.style.visibility = "hidden";
    contactForm.style.opacity = "0";
});

contactSubmitButton.addEventListener("click", function(event)
{
    //stop regular behavior
    event.preventDefault();

    //get the user input
    let senderName = document.querySelector('#contact-name').value;
    let senderEmail = document.querySelector('#contact-email').value;
    let senderMessage = document.querySelector('#contact-message').value;

    let errors = 0;

    errors += validateName(senderName); //1 if error || 0 if none
    errors += validateEmail(senderEmail); //1 if error || 0 if none
    errors += validateMessage(senderMessage); //1 if error || 0 is none

    if(errors===0)
    {
        document.forms["contact-form"].submit();
    }
});
function validateName(inputName)
{
    if(inputName === "")
    {
        document.querySelector('#name-error').style.display = "inline";
        return 1;
    }
    document.querySelector('#name-error').style.display = "none";
    return 0;
}
function validateEmail(inputEmail)
{
    if(inputEmail.match(/(?:[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)])/i))
    {
        document.querySelector('#email-error').style.display = "none";
        return 0;
    }
    document.querySelector('#email-error').style.display = "inline";
    return 1;
}
function validateMessage(inputMessage)
{
    inputMessage = inputMessage.replace(/\s+/g,'');
    console.log(inputMessage);
    if(inputMessage === "" || inputMessage.length > 250)
    {
        document.querySelector('#message-error').style.display = "inline";
        return 1;
    }
    else if(inputMessage.match(/[;<>]/i))
    {
        document.querySelector('#message-error').style.display = "inline";
        return 1;
    }
    console.log('this ran');
    document.querySelector('#message-error').style.display = "none";
    return 0;
}
/*************************** end contact script *****************************/

/****************************************************************************\
 Admin login button redirect to admin page minor patch
 \****************************************************************************/
let adminButton = document.querySelector(".admin-login");
adminButton.addEventListener("click", function ()
{
    location.href="admin-page.html";
});
/*************************** end admin redirect script *****************************/

/****************************************************************************\
 Add Application Script
 \****************************************************************************/
let addAppSubmission = document.querySelector("#add-app-submit");
addAppSubmission.addEventListener("click", function (event)
{
    //prevents default of submit button until told otherwise
    event.preventDefault();

    //set up variables for add application that we check
    let employerName = document.querySelector("#app-employer").value; //should be string
    let jobDescription = document.querySelector("#app-job-desc").value; //should be string
    let jobRole = document.querySelector("#app-role").value; //should be string
    let applicationStatus = document.getElementsByName("status");//radio button
    let dateApplied = document.querySelector("#app-date").value;
    let dateFollow = document.querySelector("#app-date-follow").value;

    //Run Validation
    let error = 0;
    error += employerNameValid(employerName);
    error += jobDescriptionValid(jobDescription);
    error += jobRoleValid(jobRole);
    error += applicationStatusValidation(applicationStatus);
    error += dateAppliedValidation(dateApplied);
    error += dateFollowedValidation(dateFollow);

    if (error === 0)
    {
        document.forms["add-app-form"].submit();
    }
});
//validation check for employee name
function employerNameValid(employerName)
{
    if (employerName === "")
    {
        document.querySelector('#app-employer-error').style.display = "inline";
        return 1;
    }

    else
    {
        document.querySelector('#app-employer-error').style.display = "none";
        return 0;
    }
}
//validation check for description
function jobDescriptionValid(jobDescription)
{
    if (jobDescription === "")
    {
        document.querySelector('#app-job-error').style.display = "inline";
        return 1;
    }
    else
    {
        document.querySelector('#app-job-error').style.display = "none";
        return 0;
    }
}
//validation check for job role
function jobRoleValid(jobRole)
{
    if (jobRole === "")
    {
        document.querySelector('#app-role-error').style.display = "inline";
        return 1;
    }
    else
    {
        document.querySelector('#app-role-error').style.display = "none";
        return 0;
    }
}
//validation for radio buttons
function applicationStatusValidation(applicationStatus)
{
    for (var i = 0; i < applicationStatus.length; i++)
    {
        if (applicationStatus[i].checked)
        {
            document.querySelector('#app-radio-error').style.display = "none";
            return 0;
        }
    }
    document.querySelector('#app-radio-error').style.display = "inline";
    return 1;
}
function dateAppliedValidation(dateApplied)
{
    if (dateApplied === "")
    {
        document.querySelector('#app-date-error').style.display = "inline";
        return 1;
    }
    else
    {
        document.querySelector('#app-date-error').style.display = "none";
        return 0;
    }
}
function dateFollowedValidation(dateFollowed)
{
    if (dateFollowed === "")
    {
        document.querySelector('#app-date-follow-error').style.display = "inline";
        return 1;
    }
    else
    {
        document.querySelector('#app-date-follow-error').style.display = "none";
        return 0;
    }
}
