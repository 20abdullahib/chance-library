const currentUrl = window.location.href;

const links = document.querySelectorAll(".list-unstyled.components li a");

links.forEach((link) => {
    if (link.getAttribute("href") === currentUrl) {

        link.closest("li").classList.add("active");
    }
});
