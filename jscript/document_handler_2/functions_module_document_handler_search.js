        function removeCurrentEntitySearchAttachItems() {
            var new_data_list = [];
            for (c1 = 0; c1 < document_handler_form_current_entity_search_attach_list.length; c1++) {
                if(document.getElementById('document_handler_form_entity_attach_link_' + (c1 + 1)).checked == false) {
                    new_data_list[new_data_list.length] = document_handler_form_current_entity_search_attach_list[c1];
                }
            }
            document_handler_form_current_entity_search_attach_list = new_data_list;

            initHtmlDivSelectBox2(
                document_handler_form_current_entity_search_attach_list, 
                'document_handler_form_divselect_1',
                'document_handler_form_checkbox_1',
                'document_handler_form_entity_attach_divselectbox', 
                'document_handler_form_entity_attach_link', 
                [], 
                [], 
                'entity_id', 
                'entity_info', 
                '', 
                'document_handler_form_entity_attach_link_count', 
                false
            );
        }


        function assignEntitySearchResultToField() {
            var data_list = document_handler_form_entity_search_list;
            var search_ref_names = ['folder_id'];
            var search_values = [document.getElementById('document_handler_form_entity_folder_list').value];
            var data_rows = getDataRowsFromDataList(data_list, search_ref_names, search_values);
            var c1 = 0;
            var c2 = 0;
            var entity_search_link_count = 0;

            if (! isNaN(document.getElementById('document_handler_form_entity_search_link_count').value)) {
                entity_search_link_count = parseInt(document.getElementById('document_handler_form_entity_search_link_count').value);
            }

            document_handler_form_current_entity_search_attach_list = [];
            for (c1 = 0; c1 < data_list.length; c1++) {
                if(document.getElementById('document_handler_form_entity_search_link_' + (c1 + 1)).checked == true) {
                    document_handler_form_current_entity_search_attach_list[document_handler_form_current_entity_search_attach_list.length] = {"entity_id":data_list[c1]['entity_id'], "entity_info":data_list[c1]['entity_info']};
                }
            }

            switch (document_handler_form_current_search_target) {
                case 'entity_search':
                    initHtmlDivSelectBox2(
                        document_handler_form_current_entity_search_attach_list, 
                        'document_handler_form_divselect_1',
                        'document_handler_form_checkbox_1',
                        'document_handler_form_entity_attach_divselectbox', 
                        'document_handler_form_entity_attach_link', 
                        [], 
                        [], 
                        'entity_id', 
                        'entity_info', 
                        '', 
                        'document_handler_form_entity_attach_link_count', 
                        false
                    );
                    break;
                case 'contact_from_search':
                    if (document_handler_form_current_entity_search_attach_list.length > 0) {
                        document.getElementById('document_handler_form_file_from').value = document_handler_form_current_entity_search_attach_list[0]['entity_id'];
                    }
                    break;
                case 'contact_to_search':
                    if (document_handler_form_current_entity_search_attach_list.length > 0) {
                        document.getElementById('document_handler_form_file_to').value = document_handler_form_current_entity_search_attach_list[0]['entity_id'];
                    }
                    break;
            }
        }


        function processEntitySearch() {
            // assignEntityPropertiesToFields();
            retrieveEntitySearchData();
            // clearEntityFolderPropertiesToFields();
            // clearFolderFilePropertiesToFields();
            // refreshEntityFilePropertiesToFields();
        }


        function closeEntitySearchForm() {
            assignEntitySearchResultToField();
            document.getElementById('document_handler_form_entity_search_area').style.display = 'none';
        }




        function initInputElementsFormEntitySearch(search_target) {
            document_handler_form_current_search_target = search_target;
            document.getElementById('document_handler_form_entity_search_area').style.display = 'block';
        }
