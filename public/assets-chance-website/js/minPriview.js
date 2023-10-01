document.addEventListener("DOMContentLoaded", function () {
    const viewButtons = document.querySelectorAll(".view-button");
    const filePopup = document.getElementById("file-popup");
    const fileViewer = document.getElementById("file-viewer");
    const closeButton = document.getElementById("close-button");

    // Loop through all "View" buttons
    viewButtons.forEach(function (viewButton) {
        viewButton.addEventListener("click", function () {
            const pdfFileLink = this.getAttribute("data-pdf-link");
            if (pdfFileLink) {
                filePopup.style.display = "block";
                fileViewer.setAttribute("src", pdfFileLink);
            }
        });
    });

    // When "Close" button is clicked
    closeButton.addEventListener("click", function () {
        filePopup.style.display = "none";
        fileViewer.removeAttribute("src");
    });
});
