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
        document.querySelector("body").style.backgroundColor = "#333";
        document.querySelectorAll(".nav-link").forEach((element)=> element.style.color = "#222");
        document.querySelector(".apps").style.backgroundColor = "#555";
        document.querySelectorAll(".student-name").forEach((element)=> element.style.color = "#fff");
        document.querySelectorAll(".student-email").forEach((element)=> element.style.color = "#fff");
        document.querySelectorAll(".view-info").forEach((element)=>
        {
            element.style.backgroundColor= "#333";
            element.style.color = "#fff";
        });
        document.querySelectorAll(".delete-account").forEach((element)=>
        {
            element.style.backgroundColor= "#333";
            element.style.color = "#fff";
        });
        document.querySelector(".user-details").style.backgroundColor = "#555";
        document.querySelectorAll(".category").forEach((element) =>
        {
            element.style.backgroundColor= "#555";
            element.style.color = "#fff";
        });
        document.querySelectorAll(".pop-up").forEach((element) =>
        {
            element.style.backgroundColor= "#555";
            element.style.color = "#fff";
        });
    }
    else
    {
        page.attributes[1].value = 'light';
        document.querySelector("body").style.backgroundColor = "white";
        document.querySelectorAll(".nav-link").forEach((element)=> element.style.color = "#fff");
        document.querySelector(".apps").style.backgroundColor = "#fff";
        document.querySelectorAll(".student-name").forEach((element)=> element.style.color = "#000");
        document.querySelectorAll(".student-email").forEach((element)=> element.style.color = "#000");
        document.querySelectorAll(".view-info").forEach((element)=>
        {
            element.style.backgroundColor= "#fff";
            element.style.color = "#000";
        });
        document.querySelectorAll(".delete-account").forEach((element)=>
        {
            element.style.backgroundColor= "#fff";
            element.style.color = "#000";
        });
        document.querySelector(".user-details").style.backgroundColor = "#fff";
        document.querySelectorAll(".category").forEach((element) =>
        {
            element.style.backgroundColor= "#fff";
            element.style.color = "#000";
        });
        document.querySelectorAll(".pop-up").forEach((element) =>
        {
            element.style.backgroundColor= "#fff";
            element.style.color = "#000";
        });
    }
});
/************************ end light-mode script *****************************/



/****************************************************************************\
 Application form script
\****************************************************************************/

let addAppAnchor = document.querySelector(".add-application");
let appForm = document.querySelector(".add-app-form");
let closeAppButton = document.querySelector(".app-close-button");
let appSubmitButton = document.querySelector("#app-announce-button");

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

appSubmitButton.addEventListener("click", function (event)
{
   //stop the defaults from happening until validation is complete
   event.preventDefault();

   //set error counter
   let error = 0;

   //declare variables
   let positionName = document.querySelector("#app-position").value; //string
   let employerTitle = document.querySelector("#app-employer").value; //string
   let announceStatus = document.getElementsByName("app-status"); //buttons
   let appLink = document.querySelector("#app-link").value; //string
   let recipientEmail = document.querySelector("#app-recipient").value;

   error += positionNameValidation(positionName);
   error += employerTitleValidation(employerTitle);
   error += announcementStatusValidation(announceStatus);
   error += appLinkValidation(appLink);
   error += recipientEmailValidation(recipientEmail);

   //resume if okay
    if (error === 0)
    {
        document.forms["app-announcement-form"].submit();
    }

});
//validate position name
function positionNameValidation(positionName)
{
    if (positionName === "")
    {
        document.querySelector('#app-position-error').style.display = "inline";
        return 1;
    }
    else
    {
        document.querySelector('#app-position-error').style.display = "none";
        return 0;
    }
}
//validation employer title
function employerTitleValidation(employerTitle)
{
    if (employerTitle === "")
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
//validate announcement status
function announcementStatusValidation(announceStatus)
{
    for (var i = 0; i < announceStatus.length; i++)
    {
        if (announceStatus[i].checked)
        {
            document.querySelector('#app-status-error').style.display = "none";
            return 0;
        }
    }
    document.querySelector('#app-status-error').style.display = "inline";
    return 1;
}
//app link validation
function appLinkValidation(appLink)
{
    var urlR = /^(https?|ftp):\/\/(([a-z\d]([a-z\d-]*[a-z\d])?\.)+[a-z]{2,}|localhost)(\/[-a-z\d%_.~+]*)*(\?[;&a-z\d%_.~+=-]*)?(\#[-a-z\d_]*)?$/i;
   if ( appLink === "")// && appLink.length > 2)
   {
       document.querySelector('#app-link-error').style.display = "inline";
       return 1;
   }
    if (urlR.test(appLink))
    {
        document.querySelector('#app-link-error').style.display = "none";
        return 0;
    }
    return 1;
}
function recipientEmailValidation(recipientEmail)
{
    var email = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
    if (recipientEmail === "")
    {
        document.querySelector('#app-recipient-error').style.display = "inline";
        return 1;
    }
    if (email.test(recipientEmail))
    {
        document.querySelector('#app-recipient-error').style.display = "none";
        return 0;
    }
    return 1;
}

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
 delete button script
 \****************************************************************************/

let deleteAccountElements = document.querySelectorAll(".delete-account");
let deleteAccountOverlay = document.querySelector(".delete-account-overlay");
let userInfoContainerDelete = document.querySelector(".info-button-delete");
let cancelButton = document.querySelector(".cancel-button");
let deleteButton = document.querySelector(".delete-button");

let buttonContainer = document.querySelector(".delete-buttons");

deleteButton.addEventListener("click", function() {
    let confirmation = document.querySelector(".delete-confirmation");
    deleteButton.textContent = "CONFIRM";
    deleteButton.classList.add('delete-confirmation');
    confirmation.addEventListener('click', function() {
      document.location.href = 'softdelete.php';
    });

    cancelButton.addEventListener("click", function() {
        deleteButton.textContent = "DELETE";
        deleteButton.classList.remove('delete-confirmation');
    })

})

userInfoContainerDelete.style.cursor = "pointer";


for (let i = 0; i < deleteAccountElements.length; i++) {
    deleteAccountElements[i].addEventListener("click", function()
    {
        deleteAccountOverlay.style.visibility = "visible";
        deleteAccountOverlay.style.opacity = "1";
    });
}

userInfoContainerDelete.addEventListener("click", function()
{
    deleteAccountOverlay.style.visibility = "visible";
    deleteAccountOverlay.style.opacity = "1";
});

cancelButton.addEventListener("click", function() {
    deleteAccountOverlay.style.visibility = "hidden";
    deleteAccountOverlay.style.opacity = "0";
})


let user_rows = document.querySelectorAll('.table-user-info');

user_rows.forEach(function(row) {
    let deleteButton = row.querySelector('.delete-account');
    let studentID = row.querySelector('.student-email');
    deleteButton.addEventListener('click', function() {
        let inputText = studentID.textContent;
        console.log(inputText);
    });
});
/****************************************************************************\
 end delete button script
 \****************************************************************************/
