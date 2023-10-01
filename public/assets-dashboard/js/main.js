$(document).ready(function () {
    $("#sidebarCollapse").on("click", function () {
        $("#sidebar").toggleClass("active");
        $("#content").toggleClass("active");
    });

    $(".more-button,.body-overlay").on("click", function () {
        $("#sidebar,.body-overlay").toggleClass("show-nav");
    });
});

// document
//     .getElementById("addMaterialLink")
//     .addEventListener("click", function () {
//         var newField = document.createElement("input");
//         newField.type = "text";
//         newField.name = "pdf_file_link[]";
//         newField.placeholder = "Material";
//         newField.classList.add("md-input");

//         // Append the new field to the `#materialContainer` element.
//         document.getElementById("materialContainer").appendChild(newField);
//     });
