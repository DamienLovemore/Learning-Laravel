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
    var eventBlockers = ["copy", "paste", "cut"];
    var hasConfField = (typeof passwordConfField !== "undefined" && passwordConfField !== null);

    if(defaultSHs === "hide")
    {
        //Add event listeners to block copy, paste and cut actions
        eventBlockers.forEach(function(eventType) {
            passwordField.addEventListener(eventType, (event) => { event.preventDefault(); });//Arrow functions = inline, one line functions
            if (hasConfField)
                passwordConfField.addEventListener(eventType, (event) => { event.preventDefault(); });
        });

        //Hide the input text contents
        passwordField.type = "password";

        //Some works with just ., and others need setAttribute to set and update the element right away
        pathEyePassword.setAttribute("d", EYE_CLOSED);

        if (hasConfField)
        {
            passwordConfField.type = "password";

            pathEyeConfPassword.setAttribute("d", EYE_CLOSED);
        }
    }
    else if (defaultSHs === "show")
    {
        eventBlockers.forEach(function(eventType) {
            passwordField.removeEventListener(eventType);
            if(hasConfField)
                passwordConfField.removeEventListener(eventType);
        });

        passwordField.type = "text";

        pathEyePassword.setAttribute("d", EYE_OPENED);

        if(hasConfField)
        {
            passwordConfField.type = "text";

            pathEyeConfPassword.setAttribute("d", EYE_OPENED);
        }
    }
}

function togglePasswordsSH(event)
{
    var eventBlockers = ["copy", "paste", "cut"];
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

            //Since we used arrow functions we do not have the reference to remove the function listener, so
            //we recreate the element passing the past value and attributes.
            let newElement = inputRelated.cloneNode(true);//true - also include its decendants, does not have, but just in case.
            newElement = inputRelated.parentNode.replaceChild(newElement, inputRelated);//new_element, old_element

            callerElement.setAttribute("d", EYE_OPENED);

            localStorage.passSH = "show";
        }
        else if (callerElement.getAttribute("d") === EYE_OPENED)
        {
            inputRelated.type = "password";

            eventBlockers.forEach(function(eventType) {
                inputRelated.addEventListener(eventType, (event) => { event.preventDefault(); });
            });

            callerElement.setAttribute("d", EYE_CLOSED);

            localStorage.passSH = "hide";
        }
    }
}
