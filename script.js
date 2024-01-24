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
  if(page.attributes[1].value == 'light')
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



//contact form script
let contactAnchor = document.querySelector(".contact");
let contactForm = document.querySelector(".contact-form");
let closeContactButton = document.querySelector(".contact-close-button");

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
//end contact script

userEmailCheck = document.getElementById("user-email");

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
}


