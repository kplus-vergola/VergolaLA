        function assignDateTimeSelectionResultToField() {
            var selected_date_time = '';

            selected_date_time += document.getElementById('document_handler_form_date_time_selection_year').value;
            selected_date_time += '-';
            selected_date_time += document.getElementById('document_handler_form_date_time_selection_month').value;
            selected_date_time += '-';
            selected_date_time += document.getElementById('document_handler_form_date_time_selection_day').value;
            selected_date_time += ' ';
            selected_date_time += document.getElementById('document_handler_form_date_time_selection_hour').value;
            selected_date_time += ':';
            selected_date_time += document.getElementById('document_handler_form_date_time_selection_minute').value;
            selected_date_time += ':';
            selected_date_time += document.getElementById('document_handler_form_date_time_selection_second').value;

            switch (document_handler_form_current_date_time_selection_target) {
                case 'contact_date_received':
                    document.getElementById('document_handler_form_file_date_received').value = selected_date_time;
                    break;
                case 'contact_date_sent':
                    document.getElementById('document_handler_form_file_date_sent').value = selected_date_time;
                    break;
                case 'contact_content_date':
                    document.getElementById('document_handler_form_file_content_date').value = selected_date_time;
                    break;
            }
        }



        function closeDateTimeSelectionForm() {
            assignDateTimeSelectionResultToField();
            document.getElementById('document_handler_form_date_time_selection_area').style.display = 'none';
        }




        function initInputElementsFormDateTimeSelection(date_time_selection_target) {
            document_handler_form_current_date_time_selection_target = date_time_selection_target;
            document.getElementById('document_handler_form_date_time_selection_area').style.display = 'block';
        }
