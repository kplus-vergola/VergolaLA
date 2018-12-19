        function getFirstLinkedEnquiryId() {
            var first_linked_id = null;
            var c1 = 0;
            var folder_entity_link_count = 0;

            if (! isNaN(document.getElementById('document_handler_form_folder_entity_link_count').value)) {
                folder_entity_link_count = parseInt(document.getElementById('document_handler_form_folder_entity_link_count').value);
            }
            for (c1 = 0; c1 < folder_entity_link_count; c1++) {
                if (document.getElementById('document_handler_form_folder_entity_link_' + (c1 + 1)).checked) {
                    first_linked_id = document.getElementById('document_handler_form_folder_entity_link_' + (c1 + 1)).value;
                }
            }

            return first_linked_id;
        }


        function assignEnquiryPropertiesToFields() {
            var data_list = document_handler_form_entity_list;
            var search_ref_names = ['id'];
            var search_values = [document.getElementById('document_handler_form_entity_list').value];
            var data_rows = getDataRowsFromDataList(data_list, search_ref_names, search_values);

            if (data_rows.length > 0) {
                document.getElementById('document_handler_form_entity_name').value = data_rows[0]['entity_code'];
                document.getElementById('document_handler_form_entity_details').value = data_rows[0]['details'];
                document.getElementById('document_handler_form_entity_date_lodged').value = data_rows[0]['date_lodged'];
            }
        }


        function initInputElementsFormEntities() {
            initHtmlSelectBox(
                document_handler_form_entity_list, 
                'document_handler_form_selectbox_1', 
                'document_handler_form_entity_list', 
                [], 
                [], 
                'id', 
                'entity_code', 
                '', 
                false
            );

            initInputElementsFormEnquiryFolders();

            document.getElementById('document_handler_form_entity_list').value = default_entity_id;
            refreshEnquiryFolderPropertiesToFields();
        }


        function processEnquirySelectionChange() {
            assignEnquiryPropertiesToFields();
            retrieveDocumentHandlerFormEnquiryUserInfo();
            retrieveDocumentHandlerFormFoldersData();
            clearEnquiryFolderPropertiesToFields();
            clearFolderFilePropertiesToFields();
            refreshEnquiryFilePropertiesToFields();
        }
