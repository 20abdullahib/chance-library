@extends('Dashboard.layout.Dashboard_Layout')

@section('content')
    <div class="container mx-2 my-3">
        <div class="card-body">
            <div>
                @include('Dashboard.include.success')
                <div class="d-flex align-items-baseline justify-content-between">
                    <h2>Subject Name: <span>{{ $subject->subject_name }}</span></h2>
                    <a href="{{ route('subject.index') }}" class="btn btn-primary ml-5">All Subject</a>
                </div>
                <h5>Material PDF Links ({{ count($materials) }})</h5>
            </div>

            <div>
                <table id="material_pdf" class="table table-hover text-center table-bordered" style="width: fit-content;">
                    <thead class="text-primary">
                        <tr>
                            <th>PDF Name</th>
                            <th>PDF Links</th>
                            <th>MPDF Links Donwload</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($materials as $material)
                            <tr>


                                <form id="deleteForm{{ $material->id }}"
                                    action="{{ route('material.destroy', $material->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                <form action="{{ route('material.update', $material->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <td class="editable" onclick="makeEditable(this)">
                                        <span>{{ $material->pdf_file_name }}</span>
                                        <input type="text" style="width: -webkit-fill-available;"
                                            value="{{ $material->pdf_file_name }}" name="pdf_file_name">
                                    </td>
                                    <td class="editable" onclick="makeEditable(this)">
                                        <span>{{ $material->pdf_file_link }}</span>
                                        <input type="text" style="width: -webkit-fill-available;"
                                            value="{{ $material->pdf_file_link }}" name="pdf_file_link">
                                    </td>
                                    <td class="editable" onclick="makeEditable(this)">
                                        <span>{{ $material->pdf_file_download }}</span>
                                        <input type="text" style="width: -webkit-fill-available;"
                                            value="{{ $material->pdf_file_download }}" name="pdf_file_download">
                                    </td>
                                    <td class="d-flex justify-content-center" style="border-bottom: 1px;">
                                        <button class="btn btn-warning"
                                            data-subject-id="{{ $material->id }}">Update</button>
                                        <button type="button" class="btn btn-danger"
                                            onclick="activateDeleteForm({{ $material->id }})">Delete</button>
                                    </td>
                                </form>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <button type="button" id="addNewInputCellButton" class="btn btn-primary">Add New Link</button>
            </div>
        </div>
    </div>

 <script>
//      function addNewRow(tableBody) {
//     var newRow = document.createElement("tr");

//     // Create a new input cell for PDF file name
//     var newInputCellName = document.createElement("td");
//     var inputElementName = document.createElement("input");
//     inputElementName.type = "text";
//     inputElementName.style.width = "-webkit-fill-available";
//     inputElementName.name = "pdf_file_name";
//     inputElementName.placeholder = "PDF File Name"; // Optional: Add a placeholder

//     // Create a new input cell for PDF file link
//     var newInputCellLink = document.createElement("td");
//     var inputElementLink = document.createElement("input");
//     inputElementLink.type = "text";
//     inputElementLink.style.width = "-webkit-fill-available";
//     inputElementLink.name = "pdf_file_link";
//     inputElementLink.placeholder = "PDF File Link"; // Optional: Add a placeholder

//     var buttonsCell = document.createElement("td");
//     buttonsCell.className = "d-flex justify-content-center";

//     var saveButton = document.createElement("button");
//     saveButton.id = "addNew";
//     saveButton.className = "btn btn-primary save-button";
//     saveButton.style.borderBottom = "1px solid black";
//     saveButton.innerHTML = "Save";

//     saveButton.addEventListener("click", function () {
//         var inputValueName = inputElementName.value;
//         var inputValueLink = inputElementLink.value;

//         // Check if both input values are not empty
//         if (inputValueName.trim() !== "" && inputValueLink.trim() !== "") {
//             // Create a new form element
//             var newForm = document.createElement("form");
//             newForm.action = "{{ route('material.store') }}"; // Replace with your route
//             newForm.method = "POST";
//             // newForm.target = "_blank"; // Optional: Open in a new tab/window if needed
//             newForm.style.display = "none"; // Hide the form

//             var csrfInput = document.createElement("input");
//             csrfInput.type = "hidden";
//             csrfInput.name = "_token";
//             csrfInput.value = "{{ csrf_token() }}"; // Replace with your CSRF token

//             var subjectIdInput = document.createElement("input");
//             subjectIdInput.type = "hidden";
//             subjectIdInput.name = "subject_id";
//             subjectIdInput.value = "{{ $subject->id }}"; // Replace with your subject ID

//             var fileNameInput = document.createElement("input");
//             fileNameInput.type = "hidden";
//             fileNameInput.name = "FileName";
//             fileNameInput.value = inputValueName;

//             var fileLinkInput = document.createElement("input");
//             fileLinkInput.type = "hidden";
//             fileLinkInput.name = "FileLink";
//             fileLinkInput.value = inputValueLink;

//             var submitBtn = document.createElement("button");
//             submitBtn.type = "submit";
//             submitBtn.id = "submitBtn";
//             submitBtn.style.display = "none"; // Hide the submit button

//             newForm.appendChild(csrfInput);
//             newForm.appendChild(subjectIdInput);
//             newForm.appendChild(fileNameInput);
//             newForm.appendChild(fileLinkInput);
//             newForm.appendChild(submitBtn);

//             // Append the form to the document
//             document.body.appendChild(newForm);

//             // Submit the form
//             newForm.submit();
//         } else {
//             // If any of the input values is empty, display an alert or handle it as needed
//             alert("Input values cannot be empty.");
//         }
//     });

//     newInputCellName.appendChild(inputElementName);
//     newInputCellLink.appendChild(inputElementLink);
//     buttonsCell.appendChild(saveButton);

//     newRow.appendChild(newInputCellName);
//     newRow.appendChild(newInputCellLink);
//     newRow.appendChild(buttonsCell);

//     tableBody.appendChild(newRow);
// }

// // Add an event listener to the "Add New Input Cell" button
// document
//     .querySelector("#addNewInputCellButton")
//     .addEventListener("click", function () {
//         var tableBody = document.querySelector("table tbody");
//         addNewRow(tableBody);
//     });


// function addNewRow(tableBody) {
//     var newRow = document.createElement("tr");

//     // Create a new input cell for PDF file name
//     var newInputCellName = document.createElement("td");
//     var inputElementName = document.createElement("input");
//     inputElementName.type = "text";
//     inputElementName.style.width = "-webkit-fill-available";
//     inputElementName.name = "pdf_file_name";
//     inputElementName.placeholder = "PDF File Name"; // Optional: Add a placeholder

//     // Create a new input cell for PDF file link
//     var newInputCellLink = document.createElement("td");
//     var inputElementLink = document.createElement("input");
//     inputElementLink.type = "text";
//     inputElementLink.style.width = "fit-content";
//     inputElementLink.name = "pdf_file_link";
//     inputElementLink.placeholder = "PDF File Link"; // Optional: Add a placeholder

//     var buttonsCell = document.createElement("td");
//     buttonsCell.className = "d-flex justify-content-center";

//     var saveButton = document.createElement("button");
//     saveButton.id = "addNew";
//     saveButton.className = "btn btn-primary save-button";
//     saveButton.style.borderBottom = "1px solid black";
//     saveButton.innerHTML = "Save";

//     saveButton.addEventListener("click", function () {
//         var inputValueName = inputElementName.value;
//         var inputValueLink = inputElementLink.value;

//         // Check if both input values are not empty
//         if (inputValueName.trim() !== "" && inputValueLink.trim() !== "") {
//             // Create a new form element
//             var newForm = document.createElement("form");
//             newForm.action = "{{ route('material.store') }}"; // Replace with your route
//             newForm.method = "POST";
//             newForm.style.display = "none"; // Hide the form

//             // Collect data from other input fields
//             var otherInput1 = document.getElementById("otherInput1");
//             var otherInput2 = document.getElementById("otherInput2");

//             // Create hidden input fields for other data
//             if (otherInput1) {
//                 var hiddenInput1 = document.createElement("input");
//                 hiddenInput1.type = "hidden";
//                 hiddenInput1.name = "otherInput1";
//                 hiddenInput1.value = otherInput1.value;
//                 newForm.appendChild(hiddenInput1);
//             }

//             if (otherInput2) {
//                 var hiddenInput2 = document.createElement("input");
//                 hiddenInput2.type = "hidden";
//                 hiddenInput2.name = "otherInput2";
//                 hiddenInput2.value = otherInput2.value;
//                 newForm.appendChild(hiddenInput2);
//             }

//             // Add CSRF token
//             var csrfInput = document.createElement("input");
//             csrfInput.type = "hidden";
//             csrfInput.name = "_token";
//             csrfInput.value = "{{ csrf_token() }}"; // Replace with your CSRF token
//             newForm.appendChild(csrfInput);

//             // Add subject ID
//             var subjectIdInput = document.createElement("input");
//             subjectIdInput.type = "hidden";
//             subjectIdInput.name = "subject_id";
//             subjectIdInput.value = "{{ $subject->id }}"; // Replace with your subject ID
//             newForm.appendChild(subjectIdInput);

//             // Add PDF file name and link
//             var fileNameInput = document.createElement("input");
//             fileNameInput.type = "hidden";
//             fileNameInput.name = "FileName";
//             fileNameInput.value = inputValueName;
//             newForm.appendChild(fileNameInput);

//             var fileLinkInput = document.createElement("input");
//             fileLinkInput.type = "hidden";
//             fileLinkInput.name = "FileLink";
//             fileLinkInput.value = inputValueLink;
//             newForm.appendChild(fileLinkInput);

//             // Append the form to the document
//             document.body.appendChild(newForm);

//             // Submit the form
//             newForm.submit();
//         } else {
//             // If any of the input values is empty, display an alert or handle it as needed
//             alert("Input values cannot be empty.");
//         }
//     });

//     newInputCellName.appendChild(inputElementName);
//     newInputCellLink.appendChild(inputElementLink);
//     buttonsCell.appendChild(saveButton);

//     newRow.appendChild(newInputCellName);
//     newRow.appendChild(newInputCellLink);
//     newRow.appendChild(buttonsCell);

//     tableBody.appendChild(newRow);
// }

// // Add an event listener to the "Add New Input Cell" button
// document
//     .querySelector("#addNewInputCellButton")
//     .addEventListener("click", function () {
//         var tableBody = document.querySelector("table tbody");
//         addNewRow(tableBody);
//     });




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
    inputElementLink.style.width = "fit-content";
    inputElementLink.name = "pdf_file_link";
    inputElementLink.placeholder = "PDF File Link"; // Optional: Add a placeholder

    // Create a new input cell for PDF file download link
    var newInputCellDownload = document.createElement("td");
    var inputElementDownload = document.createElement("input");
    inputElementDownload.type = "text";
    inputElementDownload.style.width = "fit-content";
    inputElementDownload.name = "pdf_file_download";
    inputElementDownload.placeholder = "PDF File Download Link"; // Optional: Add a placeholder

    // Create a new cell for the Save button
    var buttonsCell = document.createElement("td");
    buttonsCell.className = "d-flex justify-content-center";

    var saveButton = document.createElement("button");
    saveButton.id = "addNew";
    saveButton.className = "btn btn-primary save-button";
    saveButton.style.borderBottom = "1px solid black";
    saveButton.innerHTML = "Save";

    // Add an event listener to the save button
    saveButton.addEventListener("click", function () {
        var inputValueName = inputElementName.value;
        var inputValueLink = inputElementLink.value;
        var inputValueDownload = inputElementDownload.value; // Get the value of the download link

        // Check if all input values are not empty
        if (inputValueName.trim() !== "" && inputValueLink.trim() !== "" && inputValueDownload.trim() !== "") {
            // Create a new form element
            var newForm = document.createElement("form");
            newForm.action = "{{ route('material.store') }}"; // Replace with your route
            newForm.method = "POST";
            newForm.style.display = "none"; // Hide the form

            // Create hidden input fields for other data
            var otherInput1 = document.getElementById("otherInput1");
            var otherInput2 = document.getElementById("otherInput2");

            if (otherInput1) {
                var hiddenInput1 = document.createElement("input");
                hiddenInput1.type = "hidden";
                hiddenInput1.name = "otherInput1";
                hiddenInput1.value = otherInput1.value;
                newForm.appendChild(hiddenInput1);
            }

            if (otherInput2) {
                var hiddenInput2 = document.createElement("input");
                hiddenInput2.type = "hidden";
                hiddenInput2.name = "otherInput2";
                hiddenInput2.value = otherInput2.value;
                newForm.appendChild(hiddenInput2);
            }

            // Add CSRF token
            var csrfInput = document.createElement("input");
            csrfInput.type = "hidden";
            csrfInput.name = "_token";
            csrfInput.value = "{{ csrf_token() }}"; // Replace with your CSRF token
            newForm.appendChild(csrfInput);

            // Add subject ID
            var subjectIdInput = document.createElement("input");
            subjectIdInput.type = "hidden";
            subjectIdInput.name = "subject_id";
            subjectIdInput.value = "{{ $subject->id }}"; // Replace with your subject ID
            newForm.appendChild(subjectIdInput);

            // Add PDF file name, link, and download link
            var fileNameInput = document.createElement("input");
            fileNameInput.type = "hidden";
            fileNameInput.name = "FileName";
            fileNameInput.value = inputValueName;
            newForm.appendChild(fileNameInput);

            var fileLinkInput = document.createElement("input");
            fileLinkInput.type = "hidden";
            fileLinkInput.name = "FileLink";
            fileLinkInput.value = inputValueLink;
            newForm.appendChild(fileLinkInput);

            var fileDownloadInput = document.createElement("input");
            fileDownloadInput.type = "hidden";
            fileDownloadInput.name = "FileDownloadLink";
            fileDownloadInput.value = inputValueDownload;
            newForm.appendChild(fileDownloadInput);

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
    newInputCellDownload.appendChild(inputElementDownload);
    buttonsCell.appendChild(saveButton);

    newRow.appendChild(newInputCellName);
    newRow.appendChild(newInputCellLink);
    newRow.appendChild(newInputCellDownload);
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




 </script>

@endsection
