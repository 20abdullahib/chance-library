   function makeEditable(cell) {
        const span = cell.querySelector('span');
        const input = cell.querySelector('input');

        if (span.style.display === 'none') {
            // Input field is visible, switch to plain text
            span.style.display = 'inline';
            input.style.display = 'none';
        } else {
            // Plain text is visible, switch to input field
            span.style.display = 'none';
            input.style.display = 'inline';
            input.focus(); // Optionally, focus on the input field for editing
        }
    }



    //  {{-- <script>
    //     $(document).ready(function() {
    //         $('td[contenteditable="true"]').on('input', function() {
    //             $(this).addClass('editing');
    //         });
    //     });
    // </script> --}}


