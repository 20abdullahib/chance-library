// ====================================================================
// =============     Material_Subject_Details     =====================
// ====================================================================

function addNewRow(tableBody) {
    var newRow = document.createElement("tr");

    // Create a new input cell for PDF file name
    var newInputCellName = document.createElement("td");
    var inputElementName = document.createElement("input");
    inputElementName.type = "text";
    inputElementName.style.width = "-webkit-fill-available";
    inputElementName.name = "pdf_file_name";
    inputElementName.placeholder = "PDF File Name"; // Optional: Add a placeholder

    // Create a new input cell for PDF file link
    var newInputCellLink = document.createElement("td");
    var inputElementLink = document.createElement("input");
    inputElementLink.type = "text";
    inputElementLink.style.width = "-webkit-fill-available";
    inputElementLink.name = "pdf_file_link";
    inputElementLink.placeholder = "PDF File Link"; // Optional: Add a placeholder

    var buttonsCell = document.createElement("td");
    buttonsCell.className = "d-flex justify-content-center";

    var saveButton = document.createElement("button");
    saveButton.id = "addNew";
    saveButton.className = "btn btn-primary save-button";
    saveButton.style.borderBottom = "1px solid black";
    saveButton.innerHTML = "Save";

    saveButton.addEventListener("click", function () {
        var inputValueName = inputElementName.value;
        var inputValueLink = inputElementLink.value;

        // Check if both input values are not empty
        if (inputValueName.trim() !== "" && inputValueLink.trim() !== "") {
            // Create a new form element
            var newForm = document.createElement("form");
            newForm.action = "{{ route('material.store') }}"; // Replace with your route
            newForm.method = "POST";
            newForm.target = "_blank"; // Optional: Open in a new tab/window if needed
            newForm.style.display = "none"; // Hide the form

            var csrfInput = document.createElement("input");
            csrfInput.type = "hidden";
            csrfInput.name = "_token";
            csrfInput.value = "{{ csrf_token() }}"; // Replace with your CSRF token

            var subjectIdInput = document.createElement("input");
            subjectIdInput.type = "hidden";
            subjectIdInput.name = "subject_id";
            subjectIdInput.value = "{{ $subject->id }}"; // Replace with your subject ID

            var fileNameInput = document.createElement("input");
            fileNameInput.type = "hidden";
            fileNameInput.name = "FileName";
            fileNameInput.value = inputValueName;

            var fileLinkInput = document.createElement("input");
            fileLinkInput.type = "hidden";
            fileLinkInput.name = "FileLink";
            fileLinkInput.value = inputValueLink;

            var submitBtn = document.createElement("button");
            submitBtn.type = "submit";
            submitBtn.id = "submitBtn";
            submitBtn.style.display = "none"; // Hide the submit button

            newForm.appendChild(csrfInput);
            newForm.appendChild(subjectIdInput);
            newForm.appendChild(fileNameInput);
            newForm.appendChild(fileLinkInput);
            newForm.appendChild(submitBtn);

            // Append the form to the document
            document.body.appendChild(newForm);

            // Submit the form
            newForm.submit();
        } else {
            // If any of the input values is empty, display an alert or handle it as needed
            alert("Input values cannot be empty.");
        }
    });

    newInputCellName.appendChild(inputElementName);
    newInputCellLink.appendChild(inputElementLink);
    buttonsCell.appendChild(saveButton);

    newRow.appendChild(newInputCellName);
    newRow.appendChild(newInputCellLink);
    newRow.appendChild(buttonsCell);

    tableBody.appendChild(newRow);
}

// Add an event listener to the "Add New Input Cell" button
document
    .querySelector("#addNewInputCellButton")
    .addEventListener("click", function () {
        var tableBody = document.querySelector("table tbody");
        addNewRow(tableBody);
    });







 // ====================================================================
// =============     End_Material_Subject_Details     =====================
// ====================================================================
