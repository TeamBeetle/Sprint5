const lightButtons = document.querySelectorAll('.toggle');
const toggleContainer = document.querySelector('#toggleContainer');
const page = document.querySelector('HTML');

toggleContainer.addEventListener('click', function(e)
{ 
  const clicked = e.target.closest('.toggle');                        
  if(!clicked || clicked.classList.contains('active-mode')) return;
  //change active toggle
  lightButtons.forEach( b => b.classList.remove('active-mode'));
  clicked.classList.add('active-mode');    

  //preform actions.
  //Note: page.attributes[1].value refers to data-bs-theme in <html>
  if(page.attributes[1].value === 'light')
  {
    page.attributes[1].value = 'dark';
    document.getElementById("main-logo").src="images/TeamBeetleLogoDarkMode.png";
  }
  else
  {
    page.attributes[1].value = 'light';
    document.getElementById("main-logo").src="images/TeamBeetleLogo.jpg";
  }
});

// Sign up form script
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
// End sign up form script

// Add an application form script
let addAppAnchor = document.querySelector(".add-application");
let appForm = document.querySelector(".addapp-form");
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
/*************************** end contact script ******************************/

/*userEmailCheck = document.getElementById("user-email");

userEmailCheck.addEventListener("click", emailNotification);

function emailNotification() {
    alert("Your Green River Email is preferred.")
}

function validate() {
    validateName();
    validateEmail();
    validateCohort();
}

function validateName() {
  userName = document.getElementById("user-name").value;

  if (userName === "") {
    alert("Please provide a name");
    return false;
  } else {
    return true;
  }
}

function validateEmail() {
  userEmail = document.getElementById("user-email").value;
  if (userEmail === "") {
    alert("Please enter a valid email address");
    return false;
  } else {
    return false;
  }

}

function validateCohort() {
  userCohort = document.getElementById("user-cohort-number").value;

  if (userCohort > 100 || userCohort < 1 || userCohort === null) {
    alert("Please enter a valid cohort number");
    return false;
  } else {
    return true;
  }
}*/

let adminLogin = document.querySelector(".admin-login");

adminLogin.addEventListener("click", function(){
  window.location = "admin-page.html";

});


 /********************************************************************\
 *                         Add Announcement JS
 \*******************************************************************/
let announcementForm = document.querySelector("#announcement-submit");
announcementForm.addEventListener("click", function (event)
{
    event.preventDefault();

    if (  validatePositionAndEmployer() && validateAppStatus() && validateLocation() && validateDate() && validateLink())
    {
      document.forms["announce-application"].submit();
    }

});

function validatePositionAndEmployer()
{
  let appPosition = document.getElementById("app-position");
  let appEmployer = document.getElementById("app-employer");
  if (appPosition.value === "" || appEmployer.value === "")
  {
    alert("Invalid position or employer! Please ensure you have an employer title (usually a company name) and the job position inserted.")
    return false;
  }
  else
  {
    return true;
  }
}
function validateAppStatus()
{
  let statusIntern = document.getElementById("app-intern-status");
  let statusJob = document.getElementById("app-job-status");
  if (statusIntern.checked || statusJob.checked)
  {
    alert("Please clarify if this is a job or an internship");
    return true;
  }
  else
  {
    return false;
  }
}
function validateLocation()
{
  let appLocation = document.getElementById("app-location");
  if (appLocation.value === "")
  {
    alert("Please ensure there is a location on this application. ex. Seattle Washing, Bellevue Washington, Remote");
    return false;
  }
  else
  {
    return true;
  }
}
function validateDate()
{
  let appDate = document.getElementById("app-date");
  if (appDate === null)
  {
    alert("Please ensure there is a date of this application");
    return false;
  }
  else
  {
    return true;
  }
}
function validateLink()
{
  let appLink = document.getElementById("app-link");
  if (appLink.value === "")
  {
    alert("Please add an application link");
    return false;
  }
  else
  {
    return true;
  }
}




