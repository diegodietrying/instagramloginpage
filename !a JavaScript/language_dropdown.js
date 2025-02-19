document.addEventListener("DOMContentLoaded", function() {
    const langBtn = document.querySelector(".language-btn");
    const langList = document.querySelector(".language-list");

    langBtn.addEventListener("click", function(event) {
        event.stopPropagation();
        langList.style.display = (langList.style.display === "block") ? "none" : "block";
    });

    document.addEventListener("click", function(event) {
        if (!langBtn.contains(event.target) && !langList.contains(event.target)) {
            langList.style.display = "none";
        }
    });
});
