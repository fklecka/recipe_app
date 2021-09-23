const mobile_menu_open = document.querySelector(".mobile_menu_open");
const mobile_menu = document.querySelector(".mobile_menu");

mobile_menu_open.addEventListener("click", () => {
    mobile_menu.classList.toggle("hidden");
});
