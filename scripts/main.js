const toggleBar = document.getElementById("toggleBar");
const liToggle = document.querySelector("nav > ul > li:last-child");

liToggle.addEventListener("click", () => {
    toggleBar.classList.toggle("active");
} );
