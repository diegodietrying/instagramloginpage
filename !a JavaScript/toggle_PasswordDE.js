document.addEventListener("DOMContentLoaded", function () {
    const passwordInput = document.getElementById("passwordInput");
    const toggleButton = document.getElementById("toggleButton");

    if (!passwordInput || !toggleButton) return;

    passwordInput.addEventListener("input", function () {
        if (passwordInput.value.length > 0) {
            toggleButton.style.display = "inline"; 
        } else {
            toggleButton.style.display = "none"; 
        }
    });

    toggleButton.addEventListener("click", function () {
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            toggleButton.textContent = "Verbergen";
        } else {
            passwordInput.type = "password";
            toggleButton.textContent = "Anzeigen";
        }
    });
});