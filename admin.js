/****************************************************************************\
 Light-mode toggle script
 \****************************************************************************/

const lightButtons = document.querySelectorAll('.toggle');
const toggleContainer = document.querySelector('#toggleContainer');
const page = document.querySelector('HTML');
window.onload = () =>
{
    document.querySelectorAll(".nav-link").forEach((element)=> element.style.color = "#fff");
    document.getElementById("cohort-specific").style.visibility = "hidden";
    document.getElementById("cohort-specific").style.display = "none";
};

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
        document.querySelectorAll("tr").forEach((element)=> element.style.color = "#000");
        document.querySelectorAll(".announcement-row").forEach((element)=> element.style.color = "#fff");
        document.querySelectorAll(".announcement-row").forEach((element)=> element.style.backgroundColor = "#555");
        document.querySelectorAll("td").forEach((element)=> element.style.color = "#fff");
        document.querySelectorAll(".table-user-info").forEach((element)=> element.style.backgroundColor = "#555");
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
        document.querySelectorAll("tr").forEach((element)=> element.style.color = "#fff");
        document.querySelectorAll(".announcement-row").forEach((element)=> element.style.color = "#000");
        document.querySelectorAll(".announcement-row").forEach((element)=> element.style.backgroundColor = "#fff");
        document.querySelectorAll("td").forEach((element)=> element.style.color = "#000");
        document.querySelectorAll(".table-user-info").forEach((element)=> element.style.backgroundColor = "#fff");
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
 Application Review script
 \****************************************************************************/
const applicationTable = document.querySelector("#apps-table");
let appReviewForm = document.querySelector(".review-app-form");
let closeReviewButton = document.querySelector(".review-app-close-button");
applicationTable.addEventListener('click', function(e)
{
    if(e.target.classList.contains('button'))
    {
        let tableIndex = e.target.id;
        document.getElementById("app-review-user").textContent = recentApplications[tableIndex]['user'];
        document.getElementById("app-review-employer").textContent = recentApplications[tableIndex]['employer'];
        document.getElementById("app-review-job-desc").textContent = recentApplications[tableIndex]['job'];
        document.getElementById("app-review-role").textContent = recentApplications[tableIndex]['role'];
        document.getElementById("app-review-status").textContent = recentApplications[tableIndex]['status'];
        document.getElementById("app-review-date-applied").textContent = recentApplications[tableIndex]['appDate'];
        document.getElementById("app-review-date-follow").textContent = recentApplications[tableIndex]['followDate'];
        appReviewForm.style.visibility = "visible";
        appReviewForm.style.opacity = "1";
    }
});

closeReviewButton.addEventListener("click", function()
{
    appReviewForm.style.visibility = "hidden";
    appReviewForm.style.opacity = "0";
});

/************************ end app review script *****************************/


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
    let target = document.getElementById("app-target").value;

    error += positionNameValidation(positionName);
    error += employerTitleValidation(employerTitle);
    error += announcementStatusValidation(announceStatus);
    error += appLinkValidation(appLink);
    error += recipientEmailValidation(recipientEmail);
    if (target == "cohort")
    {
        error += cohortsubmission()
    }

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
    else
    {
        document.querySelector('#app-link-error').style.display = "inline";
        return 1;
    }
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
    else
    {
        document.querySelector('#app-recipient-error').style.display = "inline";
        return 1;
    }
}
function cohortsubmission(cohortSub)
{

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

let userID = '';

function deleteUser(userId) {
    userID = userId;
    deleteInput.value = userID;
}

let deleteButton = document.querySelectorAll('.delete-account');
let deleteConfirmationOverlay = document.querySelector('.delete-account-overlay');
let deleteInput = document.querySelector('#delete-input');
let cancelButton = document.querySelector('.cancel-button');


for (let i = 0; i < deleteButton.length; i++) {
    deleteButton[i].addEventListener('click', function() {
        deleteConfirmationOverlay.style.visibility = 'visible';
        deleteConfirmationOverlay.style.opacity = '1';
    });


}





cancelButton.addEventListener('click', function() {
    deleteConfirmationOverlay.style.visibility = 'hidden';
    deleteConfirmationOverlay.style.opacity = '0';
});




/****************************************************************************\
 end delete button script
 \****************************************************************************/



/****************************************************************************\
 view user info button script
 \****************************************************************************/
let userTableRows = document.querySelectorAll('.table-user-info');

userTableRows.forEach(function(row) {
    let viewInfoButton = row.querySelector('.view-info');

    let userId = row.querySelector('.student-id').innerText;
    let userName = row.querySelector('.student-name').innerText;
    let userEmail = row.querySelector('.student-email').innerText;
    let userCohort = row.querySelector('.student-cohort').innerHTML;
    let permissionLevel = row.querySelector('.admin-status').innerText;

    let userIdInfo = document.querySelector('.category-user-id');
    let userNameInfo = document.querySelector('.category-user-name');
    let userEmailInfo = document.querySelector('.category-user-email');
    let userCohortInfo = document.querySelector('.category-user-cohort');
    let userPermissionLevelInfo = document.querySelector('.category-permission-level');


    viewInfoButton.addEventListener('click', function() {
        userIdInfo.innerText = userId;
        userNameInfo.innerText = userName;
        userEmailInfo.innerText = userEmail;
        userCohortInfo.innerText = userCohort;
        userPermissionLevelInfo.innerText = permissionLevel;
    });
});

/****************************************************************************\
 END view user info button script
 \****************************************************************************/

/****************************************************************************\
 change user permissions script
 \****************************************************************************/
let changeAdminStatusButton = document.querySelector('.change-permission-button');

changeAdminStatusButton.addEventListener('click', function() {
    let userInfoIDValue = document.querySelector('.category-user-id').innerText;

    let changeUserIDValue = document.querySelector('.change-permission-level');
    changeUserIDValue.value = userInfoIDValue;
});
/****************************************************************************\
 END change user permissions script
 \****************************************************************************/


/****************************************************************************
 Beginning of target audience for announcements
 **************************************************************************/

document.getElementById("app-target").addEventListener("focusout", function (){
    if (document.getElementById("app-target").value == "cohort")
    {
        document.getElementById("cohort-specific").style.visibility = "visible";
        document.getElementById("cohort-specific").style.display = "inline";
    }
    else
    {
        document.getElementById("cohort-specific").style.visibility = "hidden";
        document.getElementById("cohort-specific").style.display = "none";
    }
});