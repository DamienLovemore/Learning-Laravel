document.addEventListener("DOMContentLoaded", loadDefaults);

function loadDefaults()
{
    if (localStorage.theme == null)
        localStorage.theme = "dark";

    loadThemeImage();
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

function loadThemeImage()
{
    var imageThemeToggle = document.getElementById("toggle-DarkMode");

    if (localStorage.theme === "dark")
    {
        imageThemeToggle.src = assetFolder + "images/dark-mode-toggle-icon.png";
        document.documentElement.classList.add("dark");
    }
    else
    {
        imageThemeToggle.src = assetFolder + "images/light-mode-toggle-icon.png";
        document.documentElement.classList.remove("dark");
    }
}

function togglePageTheme()
{
    var imageThemeToggle = document.getElementById("toggle-DarkMode");

    if (localStorage.theme === "dark")
    {
        imageThemeToggle.src = assetFolder + "images/light-mode-toggle-icon.png";
        localStorage.theme = "light";
        document.documentElement.classList.remove("dark");
    }
    else
    {
        imageThemeToggle.src = assetFolder + "images/dark-mode-toggle-icon.png";
        localStorage.theme = "dark";
        document.documentElement.classList.add("dark");
    }
}
