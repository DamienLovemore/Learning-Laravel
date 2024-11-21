var passwordField = document.getElementById("password");
var passwordConfField = document.getElementById("password_confirmation");
var eyePassword = document.getElementById("containerPassSH");
var eyeConfPassword = document.getElementById("containerPassConfSH");
var pathEyePassword = document.getElementById("pass_sh");
var pathEyeConfPassword = document.getElementById("pass_conf_sh");

document.addEventListener("DOMContentLoaded", loadDefaults2);

function loadDefaults2()
{
    loadPasswordsSH();//Passwords show and hide

    eyePassword.addEventListener("click", togglePasswordsSH);
    //Only exits in register, not login page
    if (typeof passwordConfField !== "undefined" && passwordConfField !== null)
    {
        eyeConfPassword.addEventListener("click", togglePasswordsSH);
    }
}

function loadPasswordsSH()
{
    if(defaultSHs === "hide")
    {
        //Hide the input text contents
        passwordField.type = "password";

        //Some works with just ., and others need setAttribute to set and update the element right away
        pathEyePassword.setAttribute("d", EYE_CLOSED);

        if (typeof passwordConfField !== "undefined" && passwordConfField !== null)
        {
            passwordConfField.type = "password";

            pathEyeConfPassword.setAttribute("d", EYE_CLOSED);
        }
    }
    else if (defaultSHs === "show")
    {
        passwordField.type = "text";

        pathEyePassword.setAttribute("d", EYE_OPENED);

        if(typeof passwordConfField !== "undefined" && passwordConfField !== null)
        {
            passwordConfField.type = "text";

            pathEyeConfPassword.setAttribute("d", EYE_OPENED);
        }
    }
}

function togglePasswordsSH(event)
{
    var callerElement = event.target.getAttribute("identifier");//Who called this event
    //Gets the input password related to this eye show/hide.
    var inputRelated = null;
    if (callerElement === "passSH")
    {
        callerElement = pathEyePassword;
        inputRelated = document.getElementById("password");
    }
    else if (callerElement === "passSHConf")
    {
        callerElement = pathEyeConfPassword;
        inputRelated = document.getElementById("password_confirmation");
    }

    if (inputRelated !== null)
    {
        if(callerElement.getAttribute("d") === EYE_CLOSED)
        {
            inputRelated.type = "text";

            callerElement.setAttribute("d", EYE_OPENED);

            localStorage.passSH = "show";
        }
        else if (callerElement.getAttribute("d") === EYE_OPENED)
        {
            inputRelated.type = "password";

            callerElement.setAttribute("d", EYE_CLOSED);

            localStorage.passSH = "hide";
        }
    }
}
