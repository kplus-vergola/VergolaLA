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


        function initHtmlSelectBox(data_list, selectbox_class_name, selectbox_id, search_ref_names, search_values, option_value_ref_name, option_text_ref_name, default_value, is_return_selectbox) {
            var template_selectbox_tag = '<select class="[SELECTBOX_CLASS_NAME]" id="[SELECTBOX_ID]" name="[SELECTBOX_ID]" onchange="">[SELECTBOX_OPTION]</select>';
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
                    ['[SELECTBOX_CLASS_NAME]', '[SELECTBOX_ID]', '[SELECTBOX_OPTION]'], 
                    [selectbox_class_name, selectbox_id, options_list_text], 
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


        function encodeSpecialCharsInJsonText(json_text, special_chars_encoding_list) {
            var result = json_text;
            var input_text = json_text + '';
            var new_text = '';
            var c1 = 0;
            var c2 = 0;
            var temp_array = [];
            var total_split = 0;

            for (c1 = 0; c1 < special_chars_encoding_list.length; c1++) {
                temp_array = input_text.split(special_chars_encoding_list[c1]['search_text']);
                total_split = temp_array.length;

                new_text = '';
                if (temp_array.length >= 2) {
                    for (c2 = 0; c2 < temp_array.length; c2++) {
                        new_text += temp_array[c2];
                        if (c2 < (temp_array.length - 1)) {
                            new_text += special_chars_encoding_list[c1]['replace_text'];
                        }
                    }
                    input_text = new_text + '';
                }
            }

            result = input_text;

            return result;
        }


        function initHtmlDivSelectBox(data_list, div_class_name, checkbox_class_name, div_selectbox_id, checkbox_id, search_ref_names, search_values, option_value_ref_name, option_text_ref_name, default_value, div_selectbox_count_id, is_return_selectbox) {
            var template_div_selectbox_tag = '<div class="[DIV_CLASS_NAME]" id="[DIV_SELECTBOX_ID]">[CHECKBOX_OPTION_LIST]</div>';
            var template_div_selectbox_count_tag = '<input type="hidden" id="[DIV_SELECTBOX_COUNT_ID]" name="[DIV_SELECTBOX_COUNT_ID]" value="[DIV_SELECTBOX_COUNT_VALUE]" />';
            var template_checkbox_option = '<input type="checkbox" class="[CHECKBOX_CLASS_NAME]" id="[CHECKBOX_ID]" name="[CHECKBOX_ID]" value="[OPTION_VALUE]" />&nbsp;[OPTION_TEXT]<br />';
            var temp_text = '';
            var options_list_text = '';
            var c1 = 0;
            var c2 = 0;
            var total_search_found = 0;
            var current_checkbox_index = 0;

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
                        temp_text = template_checkbox_option;

                        current_checkbox_index++;
                        temp_text = replaceSubstringInText(
                            [
                                '[CHECKBOX_CLASS_NAME]', 
                                '[CHECKBOX_ID]'
                            ], 
                            [
                                checkbox_class_name, 
                                checkbox_id + '_' + current_checkbox_index
                            ], 
                            temp_text
                        );

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
                    temp_text = template_checkbox_option;

                    current_checkbox_index++;
                    temp_text = replaceSubstringInText(
                        [
                            '[CHECKBOX_CLASS_NAME]', 
                            '[CHECKBOX_ID]'
                        ], 
                        [
                            checkbox_class_name, 
                            checkbox_id + '_' + current_checkbox_index
                        ], 
                        temp_text
                    );

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
                temp_text = template_div_selectbox_tag;
                temp_text = replaceSubstringInText(
                    ['[DIV_CLASS_NAME]', '[DIV_SELECTBOX_ID]', '[CHECKBOX_OPTION_LIST]'], 
                    [div_class_name, div_selectbox_id, options_list_text], 
                    temp_text
                );
                temp_text += template_div_selectbox_count_tag;
                temp_text = replaceSubstringInText(
                    ['[DIV_SELECTBOX_COUNT_ID]', '[DIV_SELECTBOX_COUNT_VALUE]'], 
                    [div_selectbox_count_id, data_list.length], 
                    temp_text
                );
                return temp_text;
            } else {
                document.getElementById(div_selectbox_id).innerHTML = options_list_text;
                document.getElementById(div_selectbox_count_id).value = data_list.length;
            }
        }
