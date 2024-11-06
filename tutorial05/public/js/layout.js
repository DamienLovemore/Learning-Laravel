function togglePageTheme()
{
    const imageThemeToggle = document.getElementById("toggle-DarkMode");
    var actualTheme = localStorage.theme ?? "dark";

    if (actualTheme === "dark")
    {
        localStorage.theme = "light";
        imageThemeToggle.src = assetFolder + "images/light-mode-toggle-icon.png";
    }
    else
    {
        localStorage.theme = "dark";
        imageThemeToggle.src = assetFolder + "images/dark-mode-toggle-icon.png";
    }

    //Adds or removes the dark class from the body
    document.documentElement.classList.toggle("dark");
}
