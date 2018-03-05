        function extractSubstringFromText(textX, string_search_begin_tag, string_search_end_tag) {
            var results = {
                "string_search_begin_pos":"",
                "string_extract_begin_pos":"",
                "string_extract_end_pos":"",
                "extracted_substring":"" 
            };

            results['string_search_begin_pos'] = textX.search(string_search_begin_tag);
            results['string_extract_begin_pos'] = results['string_search_begin_pos'] + string_search_begin_tag.length;
            results['string_extract_end_pos'] = textX.search(string_search_end_tag);
            results['extracted_substring'] = textX.substring(results['string_extract_begin_pos'], results['string_extract_end_pos']);

            return results;
        }


        function removeSubstringFromText(textX, string_search_begin_tag, string_search_end_tag) {
            var results = {
                "string_search_begin_pos":"",
                "string_search_end_pos":"",
                "string_extract_end_pos":"",
                "new_text":"" 
            };

            results['string_search_begin_pos'] = textX.search(string_search_begin_tag);
            results['new_text'] += textX.substring(0, results['string_search_begin_pos']);
            results['string_search_end_pos'] = textX.search(string_search_end_tag);
            results['string_extract_end_pos'] = results['string_search_end_pos'] + string_search_end_tag.length;
            results['new_text'] += textX.substring(results['string_extract_end_pos'], textX.length - 1);
            
            return results;
        }


        function replaceSubstringInText(search_substrings, replace_substrings, textX) {
            var temp_textX = textX;
            var c1 = 0;

            if (search_substrings.length == replace_substrings.length) {
                for (c1 = 0; c1 < search_substrings.length; c1++) {
                    while (temp_textX.indexOf(search_substrings[c1]) >= 0) {
                        temp_textX = temp_textX.replace(search_substrings[c1], replace_substrings[c1]);
                    }
                }
            }

            return temp_textX;
        }


        function initHtmlSelectBox(data_list, selectbox_id, search_ref_names, search_values, option_value_ref_name, option_text_ref_name, default_value, is_return_selectbox) {
            var template_selectbox_tag = '<select class="vr_form_field_selectbox_2" id="[SELECTBOX_ID]" name="[SELECTBOX_ID]" onchange="">[SELECTBOX_OPTION]</select>';
            var template_selectbox_option = '<option [SELECTED_TAG] value="[OPTION_VALUE]">[OPTION_TEXT]</option>';
            var temp_text = '';
            var options_list_text = '<option value="null">-- select --</option>';
            var c1 = 0;
            var c2 = 0;
            var total_search_found = 0;

            for (c1 = 0; c1 < data_list.length; c1++) {
                if (search_ref_names.length > 0 && 
                    search_values.length > 0 && 
                    search_ref_names.length == search_values.length) {
                    total_search_found = 0;
                    for (c2 = 0; c2 < search_ref_names.length; c2++) {
                        if (data_list[c1][search_ref_names[c2]] == search_values[c2]) {
                            total_search_found++;
                        }
                    }
                    if (total_search_found == search_ref_names.length) {
                        temp_text = template_selectbox_option;
                        temp_text = replaceSubstringInText(
                            ['[OPTION_VALUE]', '[OPTION_TEXT]'], 
                            [data_list[c1][option_value_ref_name], data_list[c1][option_text_ref_name]], 
                            temp_text
                        );
                        if (data_list[c1][option_value_ref_name] == default_value) {
                            temp_text = replaceSubstringInText(
                                ['[SELECTED_TAG]'], 
                                ['selected'], 
                                temp_text
                            );
                        } else {
                            temp_text = replaceSubstringInText(
                                ['[SELECTED_TAG]'], 
                                [''], 
                                temp_text
                            );
                        }
                        options_list_text += temp_text;
                    }
                } else {
                    temp_text = template_selectbox_option;
                    temp_text = replaceSubstringInText(
                        ['[OPTION_VALUE]', '[OPTION_TEXT]'], 
                        [data_list[c1][option_value_ref_name], data_list[c1][option_text_ref_name]], 
                        temp_text
                    );
                    if (data_list[c1][option_value_ref_name] == default_value) {
                        temp_text = replaceSubstringInText(
                            ['[SELECTED_TAG]'], 
                            ['selected'], 
                            temp_text
                        );
                    } else {
                        temp_text = replaceSubstringInText(
                            ['[SELECTED_TAG]'], 
                            [''], 
                            temp_text
                        );
                    }
                    options_list_text += temp_text;
                }
            }

            if (is_return_selectbox == true) {
                temp_text = template_selectbox_tag;
                temp_text = replaceSubstringInText(
                    ['[SELECTBOX_ID]', '[SELECTBOX_OPTION]'], 
                    [selectbox_id, options_list_text], 
                    temp_text
                );
                return temp_text;
            } else {
                document.getElementById(selectbox_id).innerHTML = options_list_text;
            }
        }


        function getMousePositions() {
            var results = {"x_pos":"0", "y_pos":"0"};
            results['x_pos'] = event.clientX;
            results['y_pos'] = event.clientY;
            return results;
        }


        function getDataRowsFromDataList(data_list, search_ref_names, search_values) {
            var data_rows = [];
            var c1 = 0;
            var c2 = 0;
            var total_search_found = 0;

            for (c1 = 0; c1 < data_list.length; c1++) {
                if (search_ref_names.length > 0 && 
                    search_values.length > 0 && 
                    search_ref_names.length == search_values.length) {
                    total_search_found = 0;
                    for (c2 = 0; c2 < search_ref_names.length; c2++) {
                        if (data_list[c1][search_ref_names[c2]] == search_values[c2]) {
                            total_search_found++;
                        }
                    }
                    if (total_search_found == search_ref_names.length) {
                        data_rows[data_rows.length] = data_list[c1];
                    }
                }
            }

            return data_rows;
        }
