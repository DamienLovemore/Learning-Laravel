document.addEventListener("DOMContentLoaded", loadDefaults);

function loadDefaults()
{
    loadLanguageImage();
}

function loadLanguageImage()
{
    var imageLanguageToggle = document.getElementById("toggle-Language");
    var actualLanguage = localStorage.language ?? defaultLanguage;

    if (actualLanguage === "pt-BR")
    {
        imageLanguageToggle.src = assetFolder + "images/pt-BR-language-icon.png";
    }
    else
    {
        imageLanguageToggle.src = assetFolder + "images/eng-language-icon.png";
    }
}

function togglePageLanguage()
{
    var actualLanguage = localStorage.language ?? defaultLanguage;

    if (actualLanguage === "pt-BR")
    {
        localStorage.language = "eng";
    }
    else
    {
        localStorage.language = "pt-BR";
    }

    location.href = assetFolder + `set-language/${localStorage.language}`;
}

function togglePageTheme()
{
    const imageThemeToggle = document.getElementById("toggle-DarkMode");
    var actualTheme = localStorage.theme ?? "dark";

    if (actualTheme === "dark")
    {
        imageThemeToggle.src = assetFolder + "images/light-mode-toggle-icon.png";
        localStorage.theme = "light";
    }
    else
    {
        imageThemeToggle.src = assetFolder + "images/dark-mode-toggle-icon.png";
        localStorage.theme = "dark";
    }

    //Adds or removes the dark class from the body
    document.documentElement.classList.toggle("dark");
}
