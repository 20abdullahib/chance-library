const selectElement = document.querySelector(".select-styled");

selectElement.addEventListener("change", function () {
    const selectedOption = this.options[this.selectedIndex];
    if (selectedOption.disabled) {
        this.selectedIndex = -1; // Reset the selection
    }
});

// function activateDeleteForm(subjectId) {
//     if (confirm("Are you sure you want to delete this subject?")) {
//         // Trigger the delete form submission
//         document.getElementById("deleteForm" + subjectId).submit();
//     }
// }

function activateShowForm(subjectId) {
    if (confirm("Are you sure you want to show this subject?")) {
        // Trigger the show form submission
        document.getElementById("showForm" + subjectId).submit();
    }
}


function activateDeleteForm(id) {
    if (confirm("Are you sure you want to delete this item?")) {
        // Trigger the delete form submission
        document.getElementById("deleteForm" + id).submit();
    }
}