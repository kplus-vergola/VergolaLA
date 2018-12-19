        /*
        ----- ----- ----- ----- ----- ----- ----- ----- ----- -----
        ----- helper -----
        ----- ----- ----- ----- ----- ----- ----- ----- ----- -----
        */
        function filterVrFormJsonArray(json_array_ref_name) {
            var c1;
            var c2;
            var special_chars_encoding_list = [
                {"search_text":"&", "replace_text":"[AMPERSAND]"}
            ];
            var json_text = '';

            switch (json_array_ref_name) {
                case 'document_handler_form_folder_data_entry':
                    for (c1 in document_handler_form_folder_data_entry) {
                        if ((typeof document_handler_form_folder_data_entry[c1] === 'object') && (document_handler_form_folder_data_entry[c1] !== null)) {
                            /* no processing for object or array */
                        } else {
                            json_text = document_handler_form_folder_data_entry[c1];
                            if (isNaN(json_text)) {
                                document_handler_form_folder_data_entry[c1] = encodeSpecialCharsInJsonText(json_text, special_chars_encoding_list);
                            }
                        }
                    }
                    break;
                case 'document_handler_form_file_data_entry':
                    for (c1 in document_handler_form_file_data_entry) {
                        if ((typeof document_handler_form_file_data_entry[c1] === 'object') && (document_handler_form_file_data_entry[c1] !== null)) {
                            /* no processing for object or array */
                        } else {
                            json_text = document_handler_form_file_data_entry[c1];
                            if (isNaN(json_text)) {
                                document_handler_form_file_data_entry[c1] = encodeSpecialCharsInJsonText(json_text, special_chars_encoding_list);
                            }
                        }
                    }
                    break;
            }
        }










        /*
        ----- ----- ----- ----- ----- ----- ----- ----- ----- -----
        ----- retrieve enquiry user info -----
        ----- ----- ----- ----- ----- ----- ----- ----- ----- -----
        */
        function processRetrieveResultDocumentHandlerFormEnquiryUserInfo(results) {
            if (results['error'] == 'null') {
                if (debug_mode_enabled == 'y') {
                    console.log('processRetrieveResultDocumentHandlerFormEnquiryUserInfo > results:');
                    console.log(results);
                }

                document_handler_form_selected_enquiry_user_info = results['data']['document_handler_form_selected_enquiry_user_info'];
            } else {
                console.log('processRetrieveResultDocumentHandlerFormEnquiryUserInfo > results:');
                console.log(results);
            }
        }


        function retrieveDocumentHandlerFormEnquiryUserInfo() {
            if (document.getElementById('document_handler_form_entity_list').value !== 'null') {
                var url = document_handler_form_system_info['script_url'] + '&api_mode=1';
                var request_data = {
                    "document_handler_form_operation":"retrieve", 
                    "access_mode":"enquiry_user_info", 
                    "username":login_user_info['username'], 
                    "entity_id":document.getElementById('document_handler_form_entity_list').value 
                };

                requestAjaxCall(url, request_data, 'processRetrieveResultDocumentHandlerFormEnquiryUserInfo');
                if (debug_mode_enabled == 'y') {
                    console.log('url:');
                    console.log(url);
                    console.log('request_data:');
                    console.log(request_data);
                }
            }
        }




        /*
        ----- ----- ----- ----- ----- ----- ----- ----- ----- -----
        ----- retrieve folder data -----
        ----- ----- ----- ----- ----- ----- ----- ----- ----- -----
        */
        function processRetrieveResultDocumentHandlerFormFoldersData(results) {
            if (results['error'] == 'null') {
                if (debug_mode_enabled == 'y') {
                    console.log('processRetrieveResultDocumentHandlerFormFoldersData > results:');
                    console.log(results);
                }
                document_handler_form_enquiry_folder_list = results['data']['document_handler_form_enquiry_folder_list'];

                initHtmlSelectBox(
                    document_handler_form_enquiry_folder_list, 
                    'document_handler_form_selectbox_1', 
                    'document_handler_form_enquiry_folder_list', 
                    [], 
                    [], 
                    'folder_id', 
                    'folder_name', 
                    '', 
                    false
                );

                initHtmlDivSelectBox(
                    document_handler_form_enquiry_folder_list, 
                    'document_handler_form_divselect_1',
                    'document_handler_form_checkbox_1',
                    'document_handler_form_file_folder_divselectbox', 
                    'document_handler_form_file_folder_link', 
                    [], 
                    [], 
                    'folder_id', 
                    'folder_name', 
                    '', 
                    'document_handler_form_file_folder_link_count', 
                    false
                );
            } else {
                console.log('processRetrieveResultDocumentHandlerFormFoldersData > results:');
                console.log(results);
            }
        }


        function retrieveDocumentHandlerFormFoldersData() {
            var url = document_handler_form_system_info['script_url'] + '&api_mode=1';
            var request_data = {
                "document_handler_form_operation":"retrieve", 
                "access_mode":'enquiry_folder_list', 
                "username":login_user_info['username'], 
                "enquiry_id":document.getElementById('document_handler_form_entity_list').value 
            };

            requestAjaxCall(url, request_data, 'processRetrieveResultDocumentHandlerFormFoldersData');
            if (debug_mode_enabled == 'y') {
                console.log('request_data:');
                console.log(request_data);
            }
        }




        /*
        ----- ----- ----- ----- ----- ----- ----- ----- ----- -----
        ----- retrieve file data -----
        ----- ----- ----- ----- ----- ----- ----- ----- ----- -----
        */
        function processRetrieveResultDocumentHandlerFormFilesData(results) {
            if (results['error'] == 'null') {
                if (debug_mode_enabled == 'y') {
                    console.log('processRetrieveResultDocumentHandlerFormFilesData > results:');
                    console.log(results);
                }
                document_handler_form_folder_file_list = results['data']['document_handler_form_folder_file_list'];

                initHtmlSelectBox(
                    document_handler_form_folder_file_list, 
                    'document_handler_form_selectbox_1', 
                    'document_handler_form_folder_file_list', 
                    [], 
                    [], 
                    'file_id', 
                    'file_name', 
                    '', 
                    false
                );

                // initHtmlDivSelectBox(
                //     document_handler_form_enquiry_folder_list, 
                //     'document_handler_form_divselect_1',
                //     'document_handler_form_checkbox_1',
                //     'document_handler_form_file_folder_divselectbox', 
                //     'document_handler_form_file_folder_link', 
                //     [], 
                //     [], 
                //     'folder_id', 
                //     'folder_name', 
                //     '', 
                //     'document_handler_form_file_folder_link_count', 
                //     false
                // );
            } else {
                console.log('processRetrieveResultDocumentHandlerFormFilesData > results:');
                console.log(results);
            }
        }


        function retrieveDocumentHandlerFormFilesData() {
            var url = document_handler_form_system_info['script_url'] + '&api_mode=1';
            var request_data = {
                "document_handler_form_operation":"retrieve", 
                "access_mode":'folder_file_list', 
                "username":login_user_info['username'], 
                "folder_id":document.getElementById('document_handler_form_enquiry_folder_list').value 
            };

            requestAjaxCall(url, request_data, 'processRetrieveResultDocumentHandlerFormFilesData');
            if (debug_mode_enabled == 'y') {
                console.log('request_data:');
                console.log(request_data);
            }
        }










        /*
        ----- ----- ----- ----- ----- ----- ----- ----- ----- -----
        ----- save folder data -----
        ----- ----- ----- ----- ----- ----- ----- ----- ----- -----
        */
        function processSaveResultDocumentHandlerFormFolderDataEntry(results) {
            if (results['error'] == 'null') {
                if (debug_mode_enabled == 'y') {
                    console.log('processSaveResultDocumentHandlerFormFolderDataEntry > results:');
                    console.log(results);
                }

                document.getElementById('document_handler_form_folder_id').value = results['message']['new_folder_id'];

                refreshEnquiryFolderPropertiesToFields();
            } else {
                console.log('processSaveResultDocumentHandlerFormFolderDataEntry > results:');
                console.log(results);
            }
        }


        function saveDocumentHandlerFormFolderDataEntry() {
            copyDocumentHandlerFormFolderDataEntryFormValue();
            filterVrFormJsonArray('document_handler_form_folder_data_entry');

            var document_handler_form_operation = 'save';
            if (document.getElementById('document_handler_form_folder_id').value.length > 0) {
                document_handler_form_operation = 'update';
            }

            var url = document_handler_form_system_info['script_url'] + '&api_mode=1';
            var request_data = {
                "document_handler_form_operation":document_handler_form_operation, 
                "access_mode":"folder_save", 
                "username":login_user_info['username'], 
                "document_handler_form_folder_data_entry":document_handler_form_folder_data_entry
            };

            requestAjaxCall(url, request_data, 'processSaveResultDocumentHandlerFormFolderDataEntry');
            if (debug_mode_enabled == 'y') {
                console.log('url:');
                console.log(url);
                console.log('request_data:');
                console.log(request_data);
            }
        }




        /*
        ----- ----- ----- ----- ----- ----- ----- ----- ----- -----
        ----- save file data -----
        ----- ----- ----- ----- ----- ----- ----- ----- ----- -----
        */
        function processSaveResultDocumentHandlerFormFileDataEntry(results) {
            if (results['error'] == 'null') {
                if (debug_mode_enabled == 'y') {
                    console.log('processSaveResultDocumentHandlerFormFileDataEntry > results:');
                    console.log(results);
                }

                document.getElementById('document_handler_form_file_id').value = results['message']['new_file_id'];

                refreshEnquiryFilePropertiesToFields();
            } else {
                console.log('processSaveResultDocumentHandlerFormFileDataEntry > results:');
                console.log(results);
            }
        }


        function saveDocumentHandlerFormFileDataEntry() {
            copyDocumentHandlerFormFileDataEntryFormValue();
            filterVrFormJsonArray('document_handler_form_file_data_entry');

            var document_handler_form_operation = 'save';
            if (document.getElementById('document_handler_form_file_id').value.length > 0) {
                document_handler_form_operation = 'update';
            }

            var url = document_handler_form_system_info['script_url'] + '&api_mode=1';
            var request_data = {
                "document_handler_form_operation":document_handler_form_operation, 
                "access_mode":"file_save", 
                "username":login_user_info['username'], 
                "document_handler_form_file_data_entry":document_handler_form_file_data_entry
            };

            requestAjaxCall(url, request_data, 'processSaveResultDocumentHandlerFormFileDataEntry');
            if (debug_mode_enabled == 'y') {
                console.log('url:');
                console.log(url);
                console.log('request_data:');
                console.log(request_data);
            }
        }










        /*
        ----- ----- ----- ----- ----- ----- ----- ----- ----- -----
        ----- upload file -----
        ----- ----- ----- ----- ----- ----- ----- ----- ----- -----
        */
        function processUploadResultDocumentHandlerFormFileDataEntry(results) {
            if (results['error'] == 'null') {
                if (debug_mode_enabled == 'y') {
                    console.log('processUploadResultDocumentHandlerFormFileDataEntry > results:');
                    console.log(results);
                }

                var temp_text = document.getElementById('document_handler_form_file_info').value;
                temp_text = replaceSubstringInText(
                    ['C:\\fakepath\\'], 
                    [''], 
                    temp_text
                );
                document.getElementById('document_handler_form_file_original_name').value = temp_text;
                if (document.getElementById('document_handler_form_file_name').value.length == 0) {
                    document.getElementById('document_handler_form_file_name').value = temp_text;
                }

                document.getElementById('document_handler_form_file_extension').value = results['message']['file_extension'];
                document.getElementById('document_handler_form_file_type').value = results['message']['file_type'];
                document.getElementById('document_handler_form_file_size').value = results['message']['file_size'];
                document.getElementById('document_handler_form_file_external_ref_name').value = results['message']['file_external_ref_name'];
            } else {
                console.log('processUploadResultDocumentHandlerFormFileDataEntry > results:');
                console.log(results);
            }
        }

        function uploadDocumentHandlerFormFileDataEntry() {
            var entity_name = document.getElementById('document_handler_form_entity_list').options[document.getElementById('document_handler_form_entity_list').selectedIndex].text;
            var folder_name = document.getElementById('document_handler_form_enquiry_folder_list').options[document.getElementById('document_handler_form_enquiry_folder_list').selectedIndex].text;
            var file_name = document.getElementById('document_handler_form_file_info').value;
            var file_object = document.getElementById('document_handler_form_file_info').files[0];
            var form_data = new FormData();
            form_data.append('document_handler_form_file_info', file_object);

            var url = document_handler_form_system_info['script_url'] + '&api_mode=1';
            url += '&api_data={"document_handler_form_operation":"save", "access_mode":"file_upload", "username":"' + login_user_info['username'] + '", "entity_name":"' + entity_name + '", "folder_name":"' + folder_name + '"}';
            var request_data = {
                "document_handler_form_operation":"save", 
                "access_mode":"file_upload", 
                "username":login_user_info['username'], 
                "form_data":form_data
            };

            requestAjaxCall(url, request_data, 'processUploadResultDocumentHandlerFormFileDataEntry');
            if (debug_mode_enabled == 'y') {
                console.log('request_data:');
                console.log(request_data);
            }
        }










        /*
        ----- ----- ----- ----- ----- ----- ----- ----- ----- -----
        ----- download file -----
        ----- ----- ----- ----- ----- ----- ----- ----- ----- -----
        */
        function downloadDocumentHandlerFormFile() {
            var entity_name = document.getElementById('document_handler_form_entity_name').value;
            var folder_name = document.getElementById('document_handler_form_folder_name').value;
            var file_name = document.getElementById('document_handler_form_file_name').value;
            var file_external_ref_name = document.getElementById('document_handler_form_file_external_ref_name').value;

            if (document.getElementById('document_handler_form_file_version_list').length > 0 && 
                document.getElementById('document_handler_form_file_version_list').value != 'null') {
                file_external_ref_name = document.getElementById('document_handler_form_file_version_list').value;
            }

            var url = document_handler_form_system_info['script_url'] + '&api_mode=1';
            url += '&api_data={"document_handler_form_operation":"retrieve", "access_mode":"file_download", "username":"' + login_user_info['username'] + '", "file_external_ref_name":"' + file_external_ref_name + '", "entity_name":"' + entity_name + '", "folder_name":"' + folder_name + '", "file_name":"' + file_name + '"}';
            window.location = url;
        }


        /*
        ----- ----- ----- ----- ----- ----- ----- ----- ----- -----
        ----- download msword plugin -----
        ----- ----- ----- ----- ----- ----- ----- ----- ----- -----
        */
        function downloadDocumentHandlerFormMsWordPlugin() {
            var url = document_handler_form_system_info['script_url'] + '&api_mode=1';
            url += '&api_data={"document_handler_form_operation":"retrieve", "access_mode":"msword_plugin_download", "username":"' + login_user_info['username'] + '"}';
            window.location = url;
        }


















        /*
        ----- ----- ----- ----- ----- ----- ----- ----- ----- -----
        ----- delete folder data -----
        ----- ----- ----- ----- ----- ----- ----- ----- ----- -----
        */
        function processDeleteResultDocumentHandlerFormFolderDataEntry(results) {
            if (results['error'] == 'null') {
                if (debug_mode_enabled == 'y') {
                    console.log('processDeleteResultDocumentHandlerFormFolderDataEntry > results:');
                    console.log(results);
                }

                refreshEnquiryFolderPropertiesToFields();
            } else {
                console.log('processDeleteResultDocumentHandlerFormFolderDataEntry > results:');
                console.log(results);
            }
        }


        function deleteDocumentHandlerFormFolderDataEntry() {
            copyDocumentHandlerFormFolderDataEntryFormValue();
            filterVrFormJsonArray('document_handler_form_folder_data_entry');

            var document_handler_form_operation = 'delete';
            var url = document_handler_form_system_info['script_url'] + '&api_mode=1';
            var request_data = {
                "document_handler_form_operation":document_handler_form_operation, 
                "access_mode":"folder_delete", 
                "username":login_user_info['username'], 
                "document_handler_form_folder_data_entry":document_handler_form_folder_data_entry
            };

            requestAjaxCall(url, request_data, 'processDeleteResultDocumentHandlerFormFolderDataEntry');
            if (debug_mode_enabled == 'y') {
                console.log('url:');
                console.log(url);
                console.log('request_data:');
                console.log(request_data);
            }
        }




        /*
        ----- ----- ----- ----- ----- ----- ----- ----- ----- -----
        ----- delete file data -----
        ----- ----- ----- ----- ----- ----- ----- ----- ----- -----
        */
        function processDeleteResultDocumentHandlerFormFileDataEntry(results) {
            if (results['error'] == 'null') {
                if (debug_mode_enabled == 'y') {
                    console.log('processDeleteResultDocumentHandlerFormFileDataEntry > results:');
                    console.log(results);
                }

                refreshEnquiryFilePropertiesToFields();
            } else {
                console.log('processDeleteResultDocumentHandlerFormFileDataEntry > results:');
                console.log(results);
            }
        }


        function deleteDocumentHandlerFormFileDataEntry() {
            copyDocumentHandlerFormFileDataEntryFormValue();
            filterVrFormJsonArray('document_handler_form_file_data_entry');

            var document_handler_form_operation = 'delete';
            var url = document_handler_form_system_info['script_url'] + '&api_mode=1';
            var request_data = {
                "document_handler_form_operation":document_handler_form_operation, 
                "access_mode":"file_delete", 
                "username":login_user_info['username'], 
                "document_handler_form_file_data_entry":document_handler_form_file_data_entry
            };

            requestAjaxCall(url, request_data, 'processDeleteResultDocumentHandlerFormFileDataEntry');
            if (debug_mode_enabled == 'y') {
                console.log('url:');
                console.log(url);
                console.log('request_data:');
                console.log(request_data);
            }
        }
