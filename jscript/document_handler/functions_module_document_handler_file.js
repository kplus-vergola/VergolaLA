        function refreshEnquiryFilePropertiesToFields() {
            var previousSelectedValueFromEnquiryFolderList = document.getElementById('document_handler_form_enquiry_folder_list').value;
            var previousSelectedValueFromFolderFileList = document.getElementById('document_handler_form_folder_file_list').value;

            processEnquiryFolderSelectionChange();
            document.getElementById('document_handler_form_enquiry_folder_list').value = previousSelectedValueFromEnquiryFolderList;

            processEnquiryFileSelectionChange();
            document.getElementById('document_handler_form_folder_file_list').value = previousSelectedValueFromFolderFileList;
        }


        function assignEnquiryFilePropertiesToFields() {
            var data_list = document_handler_form_folder_file_list;
            var search_ref_names = ['file_id'];
            var search_values = [document.getElementById('document_handler_form_folder_file_list').value];
            var data_rows = getDataRowsFromDataList(data_list, search_ref_names, search_values);
            var c1 = 0;
            var c2 = 0;
            var file_folder_link_count = 0;

            if (data_rows.length > 0) {
                document.getElementById('document_handler_form_file_id').value = data_rows[0]['file_id'];
                document.getElementById('document_handler_form_file_name').value = data_rows[0]['file_name']; /* data_rows[0]['folder_name']; */
                document.getElementById('document_handler_form_file_description').value = data_rows[0]['file_description'];
                document.getElementById('document_handler_form_file_summary').value = data_rows[0]['file_summary'];
                document.getElementById('document_handler_form_file_from').value = data_rows[0]['file_from'];
                document.getElementById('document_handler_form_file_date_received').value = data_rows[0]['file_date_received'];
                document.getElementById('document_handler_form_file_to').value = data_rows[0]['file_to'];
                document.getElementById('document_handler_form_file_date_sent').value = data_rows[0]['file_date_sent'];
                document.getElementById('document_handler_form_file_original_name').value = data_rows[0]['file_original_name'];
                document.getElementById('document_handler_form_file_extension').value = data_rows[0]['file_extension'];
                document.getElementById('document_handler_form_file_type').value = data_rows[0]['file_type'];
                document.getElementById('document_handler_form_file_size').value = data_rows[0]['file_size'];
                document.getElementById('document_handler_form_file_external_ref_name').value = data_rows[0]['file_external_ref_name'];
                document.getElementById('document_handler_form_file_content_date').value = data_rows[0]['file_content_date'];
                document.getElementById('document_handler_form_file_content_category').value = data_rows[0]['file_content_category'];
                document.getElementById('document_handler_form_file_date_created').value = data_rows[0]['file_date_created'];
                // document.getElementById('document_handler_form_file_folder_link_count').value = data_rows[0]['file_folder_list'].length;

                if (! isNaN(document.getElementById('document_handler_form_file_folder_link_count').value)) {
                    file_folder_link_count = parseInt(document.getElementById('document_handler_form_file_folder_link_count').value);
                }
                for (c1 = 0; c1 < file_folder_link_count; c1++) {
                    document.getElementById('document_handler_form_file_folder_link_' + (c1 + 1)).checked = false;
                    for (c2 = 0; c2 < data_rows[0]['file_folder_list'].length; c2++) {
                        if (data_rows[0]['file_folder_list'][c2]['folder_id'] == document.getElementById('document_handler_form_file_folder_link_' + (c1 + 1)).value) {
                            document.getElementById('document_handler_form_file_folder_link_' + (c1 + 1)).checked = true;
                        } 
                    }
                }

                initHtmlSelectBox(
                    data_rows[0]['file_version_list'], 
                    'document_handler_form_selectbox_1', 
                    'document_handler_form_file_version_list', 
                    [], 
                    [], 
                    'file_version_external_ref_name', 
                    'file_version_date_created', 
                    '', 
                    false
                );
            }
        }


        function clearFolderFilePropertiesToFields() {
            var c1 = 0;
            var file_folder_link_count = 0;

            document.getElementById('document_handler_form_folder_file_list').value = 'null';
            document.getElementById('document_handler_form_file_id').value = '';
            document.getElementById('document_handler_form_file_info').value = '';
            document.getElementById('document_handler_form_file_name').value = '';
            document.getElementById('document_handler_form_file_description').value = '';
            document.getElementById('document_handler_form_file_summary').value = '';
            document.getElementById('document_handler_form_file_from').value = '';
            document.getElementById('document_handler_form_file_date_received').value = '';
            document.getElementById('document_handler_form_file_to').value = '';
            document.getElementById('document_handler_form_file_date_sent').value = '';
            document.getElementById('document_handler_form_file_original_name').value = '';
            document.getElementById('document_handler_form_file_extension').value = '';
            document.getElementById('document_handler_form_file_type').value = '';
            document.getElementById('document_handler_form_file_size').value = '';
            document.getElementById('document_handler_form_file_external_ref_name').value = '';
            document.getElementById('document_handler_form_file_content_date').value = '';
            document.getElementById('document_handler_form_file_content_category').value = '';
            document.getElementById('document_handler_form_file_date_created').value = '';

            if (! isNaN(document.getElementById('document_handler_form_file_folder_link_count').value)) {
                file_folder_link_count = parseInt(document.getElementById('document_handler_form_file_folder_link_count').value);
            }
            for (c1 = 0; c1 < file_folder_link_count; c1++) {
                document.getElementById('document_handler_form_file_folder_link_' + (c1 + 1)).checked = false;
            }

            document.getElementById('document_handler_form_file_version_list').value = ''

            document.getElementById('document_handler_form_file_name').focus();
        }


        function processEnquiryFileSelectionChange() {
            assignEnquiryFilePropertiesToFields();
        }


        function copyDocumentHandlerFormFileDataEntryFormValue() {
            var c1 = 0;
            var file_folder_link_count = 0;
            var current_file_folder_link_index = 0;
            var temp_text = '';

            document_handler_form_file_data_entry['document_handler_form_file_id'] = document.getElementById('document_handler_form_file_id').value;

            document_handler_form_file_data_entry['document_handler_form_file_name'] = document.getElementById('document_handler_form_file_name').value;
            if (document.getElementById('document_handler_form_file_name').value.length > 0 && 
                document.getElementById('document_handler_form_folder_file_list').value == 'null') {
                document_handler_form_file_data_entry['document_handler_form_file_id'] = '';
            }

            document_handler_form_file_data_entry['document_handler_form_file_description'] = document.getElementById('document_handler_form_file_description').value;
            document_handler_form_file_data_entry['document_handler_form_file_summary'] = document.getElementById('document_handler_form_file_summary').value;
            document_handler_form_file_data_entry['document_handler_form_file_from'] = document.getElementById('document_handler_form_file_from').value;
            document_handler_form_file_data_entry['document_handler_form_file_date_received'] = document.getElementById('document_handler_form_file_date_received').value;
            document_handler_form_file_data_entry['document_handler_form_file_to'] = document.getElementById('document_handler_form_file_to').value;
            document_handler_form_file_data_entry['document_handler_form_file_date_sent'] = document.getElementById('document_handler_form_file_date_sent').value;
            document_handler_form_file_data_entry['document_handler_form_file_content_date'] = document.getElementById('document_handler_form_file_content_date').value;
            document_handler_form_file_data_entry['document_handler_form_file_content_category'] = document.getElementById('document_handler_form_file_content_category').value;
            document_handler_form_file_data_entry['document_handler_form_file_original_name'] = document.getElementById('document_handler_form_file_original_name').value;
            document_handler_form_file_data_entry['document_handler_form_file_extension'] = document.getElementById('document_handler_form_file_extension').value;
            document_handler_form_file_data_entry['document_handler_form_file_type'] = document.getElementById('document_handler_form_file_type').value;
            document_handler_form_file_data_entry['document_handler_form_file_size'] = document.getElementById('document_handler_form_file_size').value;
            document_handler_form_file_data_entry['document_handler_form_file_external_ref_name'] = document.getElementById('document_handler_form_file_external_ref_name').value;
            document_handler_form_file_data_entry['document_handler_form_file_folder_links'] = [];

            if (! isNaN(document.getElementById('document_handler_form_file_folder_link_count').value)) {
                file_folder_link_count = parseInt(document.getElementById('document_handler_form_file_folder_link_count').value);
            }
            for (c1 = 0; c1 < file_folder_link_count; c1++) {
                if (document.getElementById('document_handler_form_file_folder_link_' + (c1 + 1)).checked) {
                    current_file_folder_link_index = document_handler_form_file_data_entry['document_handler_form_file_folder_links'].length;
                    document_handler_form_file_data_entry['document_handler_form_file_folder_links'][current_file_folder_link_index] = document.getElementById('document_handler_form_file_folder_link_' + (c1 + 1)).value;
                }
            }
        }


        // function initInputElementsFormEnquiryFolders() {
        //     initHtmlDivSelectBox(
        //         document_handler_form_entity_list, 
        //         'document_handler_form_divselect_1',
        //         'document_handler_form_checkbox_1',
        //         'document_handler_form_folder_entity_divselectbox', 
        //         'document_handler_form_folder_entity_link', 
        //         [], 
        //         [], 
        //         'id', 
        //         'entity_code', 
        //         '', 
        //         'document_handler_form_file_folder_link_count', 
        //         false
        //     );
        // }
