        function processVrFormItemAdhocDataEntryProperties(vr_form_item_data_entry_index) {
            var c1 = 0;
            var c2 = 0;
            var c3 = 0;
            var webbing_info_found = false;
            var colour_info_found = false;
            var finish_info_found = false;
            var item_customisation_options = {};
            var template_vr_form_hiddenbox = '<input type="hidden" id="[FIELD_NAME]" name="[FIELD_NAME]" value="[FIELD_VALUE]" />';
            var template_vr_form_inputbox = '<input type="text" class="vr_form_field_textbox_2" id="[FIELD_NAME]" name="[FIELD_NAME]" value="[FIELD_VALUE]" onchange="" />';
            var template_vr_form_inputbox_autofill = '<input type="text" class="vr_form_field_textbox_2" id="[FIELD_NAME]" name="[FIELD_NAME]" value="[FIELD_VALUE]" onchange="" onmouseover="" onmouseout="" />';
            var template_vr_form_inputbox_caution = '<input type="text" class="vr_form_field_textbox_3" id="[FIELD_NAME]" name="[FIELD_NAME]" value="[FIELD_VALUE]" onchange="" />';

            var template_vr_form_inputbox_length_feet = '<input type="text" class="vr_form_field_textbox_feet_2" id="[FIELD_NAME]" name="[FIELD_NAME]" placeholder="Feet" value="[FIELD_VALUE]" onchange="" onmouseover="" onmouseout="" />';
            var template_vr_form_inputbox_length_inch = '<input type="text" class="vr_form_field_textbox_inch_2" id="[FIELD_NAME]" name="[FIELD_NAME]" placeholder="Inch" value="[FIELD_VALUE]" onchange="" onmouseover="" onmouseout="" />';
            var template_vr_form_inputbox_autofill_length_feet = '<input type="text" class="vr_form_field_textbox_feet_2" id="[FIELD_NAME]" name="[FIELD_NAME]" placeholder="Feet" value="[FIELD_VALUE]" onchange="" onmouseover="" onmouseout="" />';
            var template_vr_form_inputbox_autofill_length_inch = '<input type="text" class="vr_form_field_textbox_inch_2" id="[FIELD_NAME]" name="[FIELD_NAME]" placeholder="Inch" value="[FIELD_VALUE]" onchange="" onmouseover="" onmouseout="" />';

            var vr_item_data_entry_input_type_area = {};
            vr_item_data_entry_input_type_area['item_display_name'] = '';
            vr_item_data_entry_input_type_area['webbing'] = '';
            vr_item_data_entry_input_type_area['colour'] = '';
            vr_item_data_entry_input_type_area['finish'] = '';
            vr_item_data_entry_input_type_area['uom'] = '';
            vr_item_data_entry_input_type_area['qty'] = '';
            vr_item_data_entry_input_type_area['length'] = '';
            vr_item_data_entry_input_type_area['rrp'] = '';
            vr_item_data_entry_input_type_area['image'] = '';
            vr_item_data_entry_input_type_area['action'] = '';

            var vr_form_item_table_column_hidden_input_type_area_extra = '';
            var temp_text = '';
            var length_unit_types = ['mtrs', 'inches'];

            for (c1 = 0; c1 < vr_items_list.length; c1++) {
                webbing_info_found = false;
                colour_info_found = false;
                finish_info_found = false;
                vr_form_item_table_column_hidden_input_type_area_extra = '';
                if (vr_items_list[c1]['item_ref_name'] == document.getElementById('vr_item_data_entry_ref_name_' + vr_form_item_data_entry_index).value) {
                    /* ----- properties: customisation options ----- */
                    if (vr_items_list[c1]['item_customisation_options'] != '') {
                        item_customisation_options = eval("(" + vr_items_list[c1]['item_customisation_options'] + ")");
                        for (c2 = 0; c2 < item_customisation_options['exterior_add_on'].length; c2++) {
                            switch (item_customisation_options['exterior_add_on'][c2]) {
                                case 'webbing':
                                    for (c3 = 0; c3 < vr_items_list.length; c3++) {
                                        if (vr_items_list[c3]['section_ref_name'] == document.getElementById('vr_section_data_entry_ref_name_' + vr_form_item_data_entry_index).value && 
                                            vr_items_list[c3]['subsection_ref_name'] == 'Beam Fixings' && 
                                            vr_items_list[c3]['item_display_name'] == 'C beam open webbing') {
                                            webbing_info_found = true;
                                        }
                                    }
                                    break;
                                case 'colour':
                                    colour_info_found = true;
                                    break;
                                case 'finish':
                                    finish_info_found = true;
                                    break;
                            }
                        }
                    }

                    /* ----- properties: vr_section ----- */
                    document.getElementById('vr_section_data_entry_ref_name_' + vr_form_item_data_entry_index).value = vr_items_list[c1]['section_ref_name'];
                    document.getElementById('vr_section_data_entry_display_name_' + vr_form_item_data_entry_index).value = vr_items_list[c1]['section_display_name'];

                    /* ----- properties: vr_subsection ----- */
                    document.getElementById('vr_subsection_data_entry_ref_name_' + vr_form_item_data_entry_index).value = vr_items_list[c1]['subsection_ref_name'];
                    document.getElementById('vr_subsection_data_entry_display_name_' + vr_form_item_data_entry_index).value = vr_items_list[c1]['subsection_display_name'];

                    /* ----- properties: webbing ----- */
                    temp_text = '';
                    if (webbing_info_found == true) {
                        temp_text = initHtmlSelectBox(
                            vr_confirmation_types_list, 
                            'vr_item_data_entry_webbing_' + vr_form_item_data_entry_index, 
                            [], 
                            [], 
                            'ref_name', 
                            'display_name', 
                            '', 
                            true
                        );
                        temp_text = replaceSubstringInText(
                            ['class="vr_form_field_selectbox_2"'], 
                            ['class="vr_form_field_selectbox_4"'], 
                            temp_text
                        );
                        temp_text = replaceSubstringInText(
                            ['onchange=""'], 
                            ['onchange="calculateVrFormItemsDataEntryValues(2)"'], 
                            temp_text
                        );
                        document.getElementById('vr_item_data_entry_webbing_input_type_' + vr_form_item_data_entry_index).value = 'Select Box';
                    } else {
                        temp_text = replaceSubstringInText(
                            ['[FIELD_NAME]', '[FIELD_VALUE]'], 
                            ['vr_item_data_entry_webbing_' + vr_form_item_data_entry_index, 'null'], 
                            template_vr_form_hiddenbox
                        );
                        document.getElementById('vr_item_data_entry_webbing_input_type_' + vr_form_item_data_entry_index).value = 'Blank';
                    }
                    if (isVrFormItemTableColumnHidden('webbing') == true) {
                        vr_form_item_table_column_hidden_input_type_area_extra += replaceSubstringInText(
                            ['[FIELD_NAME]', '[FIELD_VALUE]'], 
                            ['vr_item_data_entry_webbing_' + vr_form_item_data_entry_index, 'null'], 
                            template_vr_form_hiddenbox
                        );
                    } else {
                        document.getElementById('vr_form_item_data_entry_table_column_webbing_' + vr_form_item_data_entry_index).innerHTML = temp_text;
                    }

                    /* ----- properties: colour ----- */
                    temp_text = '';
                    current_default_colour = 'null';
                    if (document.getElementById('vr_default_colour_form_query').value != 'null') {
                        current_default_colour = document.getElementById('vr_default_colour_form_query').value;
                    }
                    if (colour_info_found == true) {
                        temp_text = initHtmlSelectBox(
                            vr_colours_list, 
                            'vr_item_data_entry_colour_' + vr_form_item_data_entry_index, 
                            [], 
                            [], 
                            'ref_name', 
                            'display_name', 
                            current_default_colour, 
                            true
                        );
                        temp_text = replaceSubstringInText(
                            ['class="vr_form_field_selectbox_2"'], 
                            ['class="vr_form_field_selectbox_4"'], 
                            temp_text
                        );
                        document.getElementById('vr_item_data_entry_colour_input_type_' + vr_form_item_data_entry_index).value = 'Select Box';
                    } else {
                        temp_text = replaceSubstringInText(
                            ['[FIELD_NAME]', '[FIELD_VALUE]'], 
                            ['vr_item_data_entry_colour_' + vr_form_item_data_entry_index, current_default_colour], 
                            template_vr_form_hiddenbox
                        );
                        document.getElementById('vr_item_data_entry_colour_input_type_' + vr_form_item_data_entry_index).value = 'Blank';
                    }
                    if (isVrFormItemTableColumnHidden('colour') == true) {
                        vr_form_item_table_column_hidden_input_type_area_extra += replaceSubstringInText(
                            ['[FIELD_NAME]', '[FIELD_VALUE]'], 
                            ['vr_item_data_entry_colour_' + vr_form_item_data_entry_index, current_default_colour], 
                            template_vr_form_hiddenbox
                        );
                    } else {
                        document.getElementById('vr_form_item_data_entry_table_column_colour_' + vr_form_item_data_entry_index).innerHTML = temp_text;
                    }

                    /* ----- properties: finish ----- */
                    temp_text = '';
                    if (finish_info_found == true) {
                        temp_text = initHtmlSelectBox(
                            vr_items_list, 
                            'vr_item_data_entry_finish_' + vr_form_item_data_entry_index, 
                            ['section_ref_name', 'subsection_ref_name'], 
                            [document.getElementById('vr_section_data_entry_ref_name_' + vr_form_item_data_entry_index).value, 'Finish'], 
                            'item_display_name', 
                            'item_display_name', 
                            '', 
                            true
                        );
                        temp_text = replaceSubstringInText(
                            ['class="vr_form_field_selectbox_2"'], 
                            ['class="vr_form_field_selectbox_4"'], 
                            temp_text
                        );
                        temp_text = replaceSubstringInText(
                            ['onchange=""'], 
                            ['onchange="calculateVrFormItemsDataEntryValues(2)"'], 
                            temp_text
                        );
                        document.getElementById('vr_item_data_entry_finish_input_type_' + vr_form_item_data_entry_index).value = 'Select Box';
                    } else {
                        temp_text = replaceSubstringInText(
                            ['[FIELD_NAME]', '[FIELD_VALUE]'], 
                            ['vr_item_data_entry_finish_' + vr_form_item_data_entry_index, 'null'], 
                            template_vr_form_hiddenbox
                        );
                        document.getElementById('vr_item_data_entry_finish_input_type_' + vr_form_item_data_entry_index).value = 'Blank';
                    }
                    if (isVrFormItemTableColumnHidden('finish') == true) {
                        vr_form_item_table_column_hidden_input_type_area_extra += replaceSubstringInText(
                            ['[FIELD_NAME]', '[FIELD_VALUE]'], 
                            ['vr_item_data_entry_finish_' + vr_form_item_data_entry_index, 'null'], 
                            template_vr_form_hiddenbox
                        );
                    } else {
                        document.getElementById('vr_form_item_data_entry_table_column_finish_' + vr_form_item_data_entry_index).innerHTML = temp_text;
                    }

                    /* ----- properties: uom / unit_price ----- */
                    temp_text = '';
                    temp_text = vr_items_list[c1]['item_uom'];
                    temp_text += replaceSubstringInText(
                        ['[FIELD_NAME]', '[FIELD_VALUE]'], 
                        ['vr_item_data_entry_uom_' + vr_form_item_data_entry_index, vr_items_list[c1]['item_uom']], 
                        template_vr_form_hiddenbox
                    );
                    document.getElementById('vr_item_data_entry_unit_price_' + vr_form_item_data_entry_index).value = vr_items_list[c1]['item_unit_price'];
                    if (isVrFormItemTableColumnHidden('uom') == true) {
                        vr_form_item_table_column_hidden_input_type_area_extra += replaceSubstringInText(
                            ['[FIELD_NAME]', '[FIELD_VALUE]'], 
                            ['vr_item_data_entry_uom_' + vr_form_item_data_entry_index, vr_items_list[c1]['item_uom']], 
                            template_vr_form_hiddenbox
                        );
                    } else {
                        document.getElementById('vr_form_item_data_entry_table_column_uom_' + vr_form_item_data_entry_index).innerHTML = temp_text;
                    }

                    /* ----- properties: qty ----- */
                    temp_text = '';
                    temp_text = replaceSubstringInText(
                        ['[FIELD_NAME]', '[FIELD_VALUE]'], 
                        ['vr_item_data_entry_qty_' + vr_form_item_data_entry_index, ''], 
                        template_vr_form_inputbox
                    );
                    temp_text = replaceSubstringInText(
                        ['onchange=""'], 
                        ['onchange="calculateVrFormItemsDataEntryValues(2)"'], 
                        temp_text
                    );
                    if (isVrFormItemTableColumnHidden('qty') == true) {
                        vr_form_item_table_column_hidden_input_type_area_extra += replaceSubstringInText(
                            ['[FIELD_NAME]', '[FIELD_VALUE]'], 
                            ['vr_item_data_entry_qty_' + vr_form_item_data_entry_index, ''], 
                            template_vr_form_hiddenbox
                        );
                    } else {
                        document.getElementById('vr_form_item_data_entry_table_column_qty_' + vr_form_item_data_entry_index).innerHTML = temp_text;
                    }

                    /* ----- properties: length ----- */
                    temp_text = '';
                    if (length_unit_types.indexOf(vr_items_list[c1]['item_uom'].toLowerCase()) == -1) {
                        temp_text = replaceSubstringInText(
                            ['[FIELD_NAME]', '[FIELD_VALUE]'], 
                            ['vr_item_data_entry_length_feet_' + vr_form_item_data_entry_index, ''], 
                            template_vr_form_hiddenbox
                        );
                        temp_text += replaceSubstringInText(
                            ['[FIELD_NAME]', '[FIELD_VALUE]'], 
                            ['vr_item_data_entry_length_inch_' + vr_form_item_data_entry_index, ''], 
                            template_vr_form_hiddenbox
                        );
                        temp_text += replaceSubstringInText(
                            ['[FIELD_NAME]', '[FIELD_VALUE]'], 
                            ['vr_item_data_entry_length_fraction_' + vr_form_item_data_entry_index, 'null'], 
                            template_vr_form_hiddenbox
                        );
                        document.getElementById('vr_item_data_entry_length_feet_input_type_' + vr_form_item_data_entry_index).value = 'Blank';
                        document.getElementById('vr_item_data_entry_length_inch_input_type_' + vr_form_item_data_entry_index).value = 'Blank';
                        document.getElementById('vr_item_data_entry_length_fraction_input_type_' + vr_form_item_data_entry_index).value = 'Blank';
                    } else {
                        temp_text = replaceSubstringInText(
                            ['[FIELD_NAME]', '[FIELD_VALUE]'], 
                            ['vr_item_data_entry_length_feet_' + vr_form_item_data_entry_index, ''], 
                            template_vr_form_inputbox_autofill_length_feet
                        );
                        temp_text += replaceSubstringInText(
                            ['[FIELD_NAME]', '[FIELD_VALUE]'], 
                            ['vr_item_data_entry_length_inch_' + vr_form_item_data_entry_index, ''], 
                            template_vr_form_inputbox_autofill_length_inch
                        );
                        temp_text = replaceSubstringInText(
                            ['onchange=""'], 
                            ['onchange="calculateVrFormItemsDataEntryValues(2)"'], 
                            temp_text
                        );
                        if (vr_form_system_info['access_mode'] == 'contract_bom_edit') {
                            // visible fraction input //
                            temp_text += initHtmlSelectBox(
                                vr_fractions_list, 
                                'vr_item_data_entry_length_fraction_' + vr_form_item_data_entry_index, 
                                [], 
                                [], 
                                'ref_name', 
                                'display_name', 
                                '', 
                                true
                            );
                            temp_text = replaceSubstringInText(
                                ['class="vr_form_field_selectbox_2"'], 
                                ['class="vr_form_field_selectbox_fraction_2"'], 
                                temp_text
                            );
                            temp_text = replaceSubstringInText(
                                ['onchange=""'], 
                                ['onchange="calculateVrFormItemsDataEntryValues(2)"'], 
                                temp_text
                            );
                            temp_text = replaceSubstringInText(
                                ['-- select --'], 
                                ['Fracs'], 
                                temp_text
                            );
                        } else {
                            // hidden fraction input //
                            temp_text += replaceSubstringInText(
                                ['[FIELD_NAME]', '[FIELD_VALUE]'], 
                                ['vr_item_data_entry_length_fraction_' + vr_form_item_data_entry_index, 'null'], 
                                template_vr_form_hiddenbox
                            );
                        }
                        document.getElementById('vr_item_data_entry_length_feet_input_type_' + vr_form_item_data_entry_index).value = 'Input Box Autofill';
                        document.getElementById('vr_item_data_entry_length_inch_input_type_' + vr_form_item_data_entry_index).value = 'Input Box Autofill';
                        document.getElementById('vr_item_data_entry_length_fraction_input_type_' + vr_form_item_data_entry_index).value = 'Select Box';
                    }
                    if (isVrFormItemTableColumnHidden('length') == true) {
                        vr_form_item_table_column_hidden_input_type_area_extra += replaceSubstringInText(
                            ['[FIELD_NAME]', '[FIELD_VALUE]'], 
                            ['vr_item_data_entry_length_feet_' + vr_form_item_data_entry_index, ''], 
                            template_vr_form_hiddenbox
                        );
                        vr_form_item_table_column_hidden_input_type_area_extra += replaceSubstringInText(
                            ['[FIELD_NAME]', '[FIELD_VALUE]'], 
                            ['vr_item_data_entry_length_inch_' + vr_form_item_data_entry_index, ''], 
                            template_vr_form_hiddenbox
                        );
                        vr_form_item_table_column_hidden_input_type_area_extra += replaceSubstringInText(
                            ['[FIELD_NAME]', '[FIELD_VALUE]'], 
                            ['vr_item_data_entry_length_fraction_' + vr_form_item_data_entry_index, 'null'], 
                            template_vr_form_hiddenbox
                        );
                    } else {
                        document.getElementById('vr_form_item_data_entry_table_column_length_' + vr_form_item_data_entry_index).innerHTML = temp_text;
                    }

                    /* ----- properties: rrp ----- */
                    temp_text = '';
                    temp_text = replaceSubstringInText(
                        ['[FIELD_NAME]', '[FIELD_VALUE]'], 
                        ['vr_item_data_entry_rrp_' + vr_form_item_data_entry_index, ''], 
                        template_vr_form_inputbox_autofill
                    );
                    if (isVrFormItemTableColumnHidden('rrp') == true) {
                        vr_form_item_table_column_hidden_input_type_area_extra += replaceSubstringInText(
                            ['[FIELD_NAME]', '[FIELD_VALUE]'], 
                            ['vr_item_data_entry_rrp_' + vr_form_item_data_entry_index, ''], 
                            template_vr_form_hiddenbox
                        );
                    } else {
                        temp_text += '<div class="vr_table_body_1 vr_form_field_log_1" id="vr_item_data_entry_rrp_log_[INDEX_NUMBER]"></div>';
                        temp_text = replaceSubstringInText(
                            ['[INDEX_NUMBER]'], 
                            [vr_form_item_data_entry_index], 
                            temp_text
                        );
                        document.getElementById('vr_form_item_data_entry_table_column_rrp_' + vr_form_item_data_entry_index).innerHTML = temp_text;
                    }

                    /* ----- properties: image ----- */
                    if (isVrFormItemTableColumnHidden('image') == true) {
                    } else {
                        if (vr_items_list[c1]['item_image'] == '') {
                            document.getElementById('vr_form_item_data_entry_table_column_image_' + vr_form_item_data_entry_index).innerHTML = '';
                        }
                    }

                    /* ----- properties: column hidden input type area extra ----- */
                    document.getElementById('vr_form_item_table_column_hidden_input_type_area_extra_' + vr_form_item_data_entry_index).innerHTML = vr_form_item_table_column_hidden_input_type_area_extra;
                }
            }
        }


        function copyVrFormItemsDataEntryFormValue() {
            var c1 = 0;

            for (c1 = 0; c1 < vr_form_items_data_entry.length; c1++) {
                vr_form_items_data_entry[c1]['vr_type_ref_name'] = document.getElementById('vr_type_data_entry_ref_name_' + c1).value;
                vr_form_items_data_entry[c1]['vr_type_display_name'] = document.getElementById('vr_type_data_entry_display_name_' + c1).value;
                vr_form_items_data_entry[c1]['vr_section_ref_name'] = document.getElementById('vr_section_data_entry_ref_name_' + c1).value;
                vr_form_items_data_entry[c1]['vr_section_display_name'] = document.getElementById('vr_section_data_entry_display_name_' + c1).value;
                vr_form_items_data_entry[c1]['vr_subsection_ref_name'] = document.getElementById('vr_subsection_data_entry_ref_name_' + c1).value;
                vr_form_items_data_entry[c1]['vr_subsection_display_name'] = document.getElementById('vr_subsection_data_entry_display_name_' + c1).value;
                vr_form_items_data_entry[c1]['vr_item_ref_name'] = document.getElementById('vr_item_data_entry_ref_name_' + c1).value;

                if (vr_form_items_data_entry[c1]['vr_item_display_name_input_type'] == 'Select Box' || 
                    document.getElementById('vr_item_data_entry_display_name_input_type_' + c1).value == 'Select Box') {
                    vr_form_items_data_entry[c1]['vr_item_display_name'] = document.getElementById('vr_item_data_entry_ref_name_' + c1).options[document.getElementById('vr_item_data_entry_ref_name_' + c1).selectedIndex].text;
                } else {
                    vr_form_items_data_entry[c1]['vr_item_display_name'] = document.getElementById('vr_item_data_entry_display_name_' + c1).value;
                }

                if (vr_form_items_data_entry[c1]['vr_item_adhoc'] == 'yes') {
                    vr_form_items_data_entry[c1]['vr_item_display_name_input_type'] = 'Select Box';
                } else {
                    vr_form_items_data_entry[c1]['vr_item_display_name_input_type'] = document.getElementById('vr_item_data_entry_display_name_input_type_' + c1).value;
                }

                vr_form_items_data_entry[c1]['vr_item_webbing'] = document.getElementById('vr_item_data_entry_webbing_' + c1).value;
                vr_form_items_data_entry[c1]['vr_item_webbing_input_type'] = document.getElementById('vr_item_data_entry_webbing_input_type_' + c1).value;
                vr_form_items_data_entry[c1]['vr_item_colour'] = document.getElementById('vr_item_data_entry_colour_' + c1).value;
                vr_form_items_data_entry[c1]['vr_item_colour_input_type'] = document.getElementById('vr_item_data_entry_colour_input_type_' + c1).value;
                vr_form_items_data_entry[c1]['vr_item_finish'] = document.getElementById('vr_item_data_entry_finish_' + c1).value;
                vr_form_items_data_entry[c1]['vr_item_finish_input_type'] = document.getElementById('vr_item_data_entry_finish_input_type_' + c1).value;
                vr_form_items_data_entry[c1]['vr_item_uom'] = document.getElementById('vr_item_data_entry_uom_' + c1).value;
                vr_form_items_data_entry[c1]['vr_item_uom_input_type'] = document.getElementById('vr_item_data_entry_uom_input_type_' + c1).value;
                vr_form_items_data_entry[c1]['vr_item_unit_price'] = document.getElementById('vr_item_data_entry_unit_price_' + c1).value;
                vr_form_items_data_entry[c1]['vr_item_qty'] = document.getElementById('vr_item_data_entry_qty_' + c1).value;
                vr_form_items_data_entry[c1]['vr_item_qty_input_type'] = document.getElementById('vr_item_data_entry_qty_input_type_' + c1).value;

                vr_form_items_data_entry[c1]['vr_item_length_feet'] = document.getElementById('vr_item_data_entry_length_feet_' + c1).value;
                vr_form_items_data_entry[c1]['vr_item_length_feet_input_type'] = document.getElementById('vr_item_data_entry_length_feet_input_type_' + c1).value;

                vr_form_items_data_entry[c1]['vr_item_length_inch'] = document.getElementById('vr_item_data_entry_length_inch_' + c1).value;
                vr_form_items_data_entry[c1]['vr_item_length_inch_input_type'] = document.getElementById('vr_item_data_entry_length_inch_input_type_' + c1).value;

                vr_form_items_data_entry[c1]['vr_item_length_fraction'] = document.getElementById('vr_item_data_entry_length_fraction_' + c1).value;
                vr_form_items_data_entry[c1]['vr_item_length_fraction_input_type'] = document.getElementById('vr_item_data_entry_length_fraction_input_type_' + c1).value;

                vr_form_items_data_entry[c1]['vr_item_rrp'] = document.getElementById('vr_item_data_entry_rrp_' + c1).value;
                vr_form_items_data_entry[c1]['vr_item_rrp_input_type'] = document.getElementById('vr_item_data_entry_rrp_input_type_' + c1).value;
            }
        }


        function extractVrFormItemDataEntryPropertiesName() {
            var i1;

            if (vr_form_item_data_entry_property_names.length == 0) {
                for (i1 in vr_form_items_data_entry[0]) {
                    vr_form_item_data_entry_property_names[vr_form_item_data_entry_property_names.length] = i1;
                }
            }
        }


        function getVrSectionFirstVrFormItemConfig(vr_section_display_name) {
            var c1 = 0;
            var i1;
            var vr_section_first_vr_form_item_config = {};

            for (c1 = 0; c1 < vr_form_items_data_entry.length; c1++) {
                if (vr_form_items_data_entry[c1]['vr_section_display_name'] == vr_section_display_name) {
                    for (i1 in vr_form_items_data_entry[c1]) {
                        vr_section_first_vr_form_item_config[i1] = vr_form_items_data_entry[c1][i1];
                    }
                    vr_section_first_vr_form_item_config['vr_item_config_internal_ref_name'] = 'null';
                    vr_section_first_vr_form_item_config['vr_item_display_name_input_type'] = 'Select Box';
                    vr_section_first_vr_form_item_config['vr_item_adhoc'] = 'yes';
                    break;
                }
            }

            return vr_section_first_vr_form_item_config;
        }


        function getVrFormItemConfig(vr_section_display_name) {
            var c1 = 0;
            var i1;
            var vr_form_item_config = {};

            for (c1 = 0; c1 < vr_item_config_list[vr_form_queries_info['vr_type']].length; c1++) {
                if (vr_item_config_list[vr_form_queries_info['vr_type']][c1]['vr_section_display_name'] == vr_section_display_name) {
                    for (i1 in vr_item_config_list[vr_form_queries_info['vr_type']][c1]) {
                        vr_form_item_config[i1] = vr_item_config_list[vr_form_queries_info['vr_type']][c1][i1];
                    }
                    vr_form_item_config['vr_item_config_internal_ref_name'] = 'null';
                    vr_form_item_config['vr_item_display_name_input_type'] = 'Select Box';
                    vr_form_item_config['vr_item_adhoc'] = 'yes';
                    break;
                }
            }

            return vr_form_item_config;
        }


        function getVrSectionLastVrFormItemIndex(vr_section_display_name) {
            var c1 = 0;
            var vr_section_last_vr_form_item_index = null;
            var current_vr_section_display_name = '';

            for (c1 = 0; c1 < vr_form_items_data_entry.length; c1++) {
                if (vr_form_items_data_entry[c1]['vr_section_display_name'] == vr_section_display_name) {
                    if (current_vr_section_display_name == '') {
                        current_vr_section_display_name = vr_section_display_name;
                    }
                }
                if (current_vr_section_display_name != '' && 
                    current_vr_section_display_name != vr_form_items_data_entry[c1]['vr_section_display_name']) {
                    vr_section_last_vr_form_item_index = (c1 - 1);
                    break;
                }
            }
            if (current_vr_section_display_name != '') {
                vr_section_last_vr_form_item_index = (c1 - 1);
            }

            if (vr_section_last_vr_form_item_index == null) {
                vr_section_last_vr_form_item_index = (c1 - 1);
            }

            return vr_section_last_vr_form_item_index;
        }


        function insertVrSectionFirstVrFormItemConfig(vr_form_item_data_entry_index, vr_section_first_vr_form_item_config) {
            var c1 = 0;
            var new_vr_form_items_config = [];

            for (c1 = 0; c1 < vr_form_items_data_entry.length; c1++) {
                if (c1 == vr_form_item_data_entry_index) {
                    new_vr_form_items_config[new_vr_form_items_config.length] = vr_section_first_vr_form_item_config;
                    new_vr_form_items_config[new_vr_form_items_config.length] = vr_form_items_data_entry[c1];
                } else {
                    new_vr_form_items_config[new_vr_form_items_config.length] = vr_form_items_data_entry[c1];
                }
            }
            if (c1 == vr_form_item_data_entry_index) {
                new_vr_form_items_config[new_vr_form_items_config.length] = vr_section_first_vr_form_item_config;
            }

            vr_form_items_data_entry = new_vr_form_items_config;
        }


        function addVrFormItemAdhocDataEntry(vr_section_display_name, vr_form_item_data_entry_index) {
            var vr_section_first_vr_form_item_config = {};

            copyVrFormItemsDataEntryFormValue();
            vr_section_first_vr_form_item_config = getVrSectionFirstVrFormItemConfig(vr_section_display_name);
            insertVrSectionFirstVrFormItemConfig(vr_form_item_data_entry_index, vr_section_first_vr_form_item_config);
            generateVrFormItemsDataEntry('form');
        }


        function removeVrFormItemAdhocDataEntry(vr_form_item_data_entry_index) {
            var c1 = 0;
            var c2 = 0;
            var temp_array = [];

            for (c1 = 0; c1 < vr_form_items_data_entry.length; c1++) {
                if (c1 != vr_form_item_data_entry_index) {
                    temp_array[temp_array.length] = vr_form_items_data_entry[c1];
                }
            }

            vr_form_items_data_entry = temp_array;

            generateVrFormItemsDataEntry('form');
        }


        function generateVrFormItemsDataEntry(output_format) {
            var c1 = 0;
            var c2 = 0;
            var c11 = 0;
            var c12 = 0;
            var c13 = 0;
            var adhoc_criteria = {};
            var total_adhoc_criteria_matched = 0;
            var current_search_field_name = '';
            var current_search_field_value = '';
            var ignored_vr_form_item_data_entry_indexes = [];
            var temp_text = '';
            var temp_array = [];
            var items_list_text = '';
            var current_vr_section_data_entry_name = '';
            var template_vr_form_section_header = '' + 
                '<td colspan="[COLUMN_SPAN]" class="vr_table_head_2">' + 
                    '[VR_SECTION_DATA_ENTRY_DISPLAY_NAME]' + 
                '</td>';
            var template_vr_form_item_data_entry_table_column_header = '' + 
                '<td class="vr_table_head_1">' + 
                    '[FIELD_NAME]' + 
                '</td>';

            var template_vr_form_item_data_entry_table_column_body = {};
            template_vr_form_item_data_entry_table_column_body['item_display_name'] = '<td class="vr_table_body_1 vr_form_field_description_1" id="vr_form_item_data_entry_table_column_item_display_name_[INDEX_NUMBER]">[VR_ITEM_DATA_ENTRY_ITEM_DISPLAY_NAME_INPUT_TYPE_AREA]</td>';
            template_vr_form_item_data_entry_table_column_body['webbing'] = '<td class="vr_table_body_1 vr_form_field_webbing_1" id="vr_form_item_data_entry_table_column_webbing_[INDEX_NUMBER]">[VR_ITEM_DATA_ENTRY_WEBBING_INPUT_TYPE_AREA]</td>';
            template_vr_form_item_data_entry_table_column_body['colour'] = '<td class="vr_table_body_1 vr_form_field_colour_1" id="vr_form_item_data_entry_table_column_colour_[INDEX_NUMBER]">[VR_ITEM_DATA_ENTRY_COLOUR_INPUT_TYPE_AREA]</td>';
            template_vr_form_item_data_entry_table_column_body['finish'] = '<td class="vr_table_body_1 vr_form_field_finish_1" id="vr_form_item_data_entry_table_column_finish_[INDEX_NUMBER]">[VR_ITEM_DATA_ENTRY_FINISH_INPUT_TYPE_AREA]</td>';
            template_vr_form_item_data_entry_table_column_body['uom'] = '<td class="vr_table_body_1 vr_form_field_uom_1" id="vr_form_item_data_entry_table_column_uom_[INDEX_NUMBER]">[VR_ITEM_DATA_ENTRY_UOM_INPUT_TYPE_AREA]</td>';
            template_vr_form_item_data_entry_table_column_body['qty'] = '<td class="vr_table_body_1 vr_form_field_qty_1" id="vr_form_item_data_entry_table_column_qty_[INDEX_NUMBER]">[VR_ITEM_DATA_ENTRY_QTY_INPUT_TYPE_AREA]</td>';
            template_vr_form_item_data_entry_table_column_body['length'] = '<td class="vr_table_body_1 vr_form_field_length_1" id="vr_form_item_data_entry_table_column_length_[INDEX_NUMBER]">[VR_ITEM_DATA_ENTRY_LENGTH_INPUT_TYPE_AREA]</td>';
            template_vr_form_item_data_entry_table_column_body['rrp'] = '<td class="vr_table_body_1 vr_form_field_rrp_1" id="vr_form_item_data_entry_table_column_rrp_[INDEX_NUMBER]">[VR_ITEM_DATA_ENTRY_RRP_INPUT_TYPE_AREA]<div class="vr_table_body_1 vr_form_field_log_1" id="vr_item_data_entry_rrp_log_[INDEX_NUMBER]"></div></td>';
            template_vr_form_item_data_entry_table_column_body['image'] = '' + 
                '<td class="vr_table_body_1 vr_form_field_image_1" id="vr_form_item_data_entry_table_column_image_[INDEX_NUMBER]">' + 
                    '[VR_ITEM_DATA_ENTRY_IMAGE_INPUT_TYPE_AREA]' + 
                    '<div id="vr_item_data_entry_image_full_size_container_[INDEX_NUMBER]" class="vr_item_data_entry_image_full_size_container_1">' + 
                        '<div id="vr_item_data_entry_image_full_size_area_[INDEX_NUMBER]" class="vr_item_data_entry_image_full_size_area_1">' + 
                        '</div>' + 
                    '</div>' + 
                '</td>';
            template_vr_form_item_data_entry_table_column_body['action'] = '' + 
                '<td class="vr_table_body_1 vr_form_field_action_1" id="vr_form_item_data_entry_table_column_action_[INDEX_NUMBER]">' + 
                    '<input type="hidden" id="vr_type_data_entry_ref_name_[INDEX_NUMBER]" name="vr_type_data_entry_ref_name_[INDEX_NUMBER]" value="[VR_TYPE_DATA_ENTRY_REF_NAME]" />' + 
                    '<input type="hidden" id="vr_type_data_entry_display_name_[INDEX_NUMBER]" name="vr_type_data_entry_display_name_[INDEX_NUMBER]" value="[VR_TYPE_DATA_ENTRY_DISPLAY_NAME]" />' + 
                    '<input type="hidden" id="vr_section_data_entry_ref_name_[INDEX_NUMBER]" name="vr_section_data_entry_ref_name_[INDEX_NUMBER]" value="[VR_SECTION_DATA_ENTRY_REF_NAME]" />' + 
                    '<input type="hidden" id="vr_section_data_entry_display_name_[INDEX_NUMBER]" name="vr_section_data_entry_display_name_[INDEX_NUMBER]" value="[VR_SECTION_DATA_ENTRY_DISPLAY_NAME]" />' + 
                    '<input type="hidden" id="vr_subsection_data_entry_ref_name_[INDEX_NUMBER]" name="vr_subsection_data_entry_ref_name_[INDEX_NUMBER]" value="[VR_SUBSECTION_DATA_ENTRY_REF_NAME]" />' + 
                    '<input type="hidden" id="vr_subsection_data_entry_display_name_[INDEX_NUMBER]" name="vr_subsection_data_entry_display_name_[INDEX_NUMBER]" value="[VR_SUBSECTION_DATA_ENTRY_DISPLAY_NAME]" />' + 
                    '<input type="hidden" id="vr_item_data_entry_display_name_[INDEX_NUMBER]" name="vr_item_data_entry_display_name_[INDEX_NUMBER]" value="[VR_ITEM_DATA_ENTRY_DISPLAY_NAME]" />' + 
                    '<input type="hidden" id="vr_item_data_entry_unit_price_[INDEX_NUMBER]" name="vr_item_data_entry_unit_price_[INDEX_NUMBER]" value="[VR_ITEM_DATA_ENTRY_UNIT_PRICE]" />' + 
                    '<input type="hidden" id="vr_item_data_entry_display_name_input_type_[INDEX_NUMBER]" name="vr_item_data_entry_display_name_input_type_[INDEX_NUMBER]" value="[VR_ITEM_DATA_ENTRY_DISPLAY_NAME_INPUT_TYPE]" />' + 
                    '<input type="hidden" id="vr_item_data_entry_webbing_input_type_[INDEX_NUMBER]" name="vr_item_data_entry_webbing_input_type_[INDEX_NUMBER]" value="[VR_ITEM_DATA_ENTRY_WEBBING_INPUT_TYPE]" />' + 
                    '<input type="hidden" id="vr_item_data_entry_colour_input_type_[INDEX_NUMBER]" name="vr_item_data_entry_colour_input_type_[INDEX_NUMBER]" value="[VR_ITEM_DATA_ENTRY_COLOUR_INPUT_TYPE]" />' + 
                    '<input type="hidden" id="vr_item_data_entry_finish_input_type_[INDEX_NUMBER]" name="vr_item_data_entry_finish_input_type_[INDEX_NUMBER]" value="[VR_ITEM_DATA_ENTRY_FINISH_INPUT_TYPE]" />' + 
                    '<input type="hidden" id="vr_item_data_entry_uom_input_type_[INDEX_NUMBER]" name="vr_item_data_entry_uom_input_type_[INDEX_NUMBER]" value="[VR_ITEM_DATA_ENTRY_UOM_INPUT_TYPE]" />' + 
                    '<input type="hidden" id="vr_item_data_entry_unit_price_input_type_[INDEX_NUMBER]" name="vr_item_data_entry_unit_price_input_type_[INDEX_NUMBER]" value="[VR_ITEM_DATA_ENTRY_UNIT_PRICE_INPUT_TYPE]" />' + 
                    '<input type="hidden" id="vr_item_data_entry_qty_input_type_[INDEX_NUMBER]" name="vr_item_data_entry_qty_input_type_[INDEX_NUMBER]" value="[VR_ITEM_DATA_ENTRY_QTY_INPUT_TYPE]" />' + 
                    '<input type="hidden" id="vr_item_data_entry_length_feet_input_type_[INDEX_NUMBER]" name="vr_item_data_entry_length_feet_input_type_[INDEX_NUMBER]" value="[VR_ITEM_DATA_ENTRY_LENGTH_FEET_INPUT_TYPE]" />' + 
                    '<input type="hidden" id="vr_item_data_entry_length_inch_input_type_[INDEX_NUMBER]" name="vr_item_data_entry_length_inch_input_type_[INDEX_NUMBER]" value="[VR_ITEM_DATA_ENTRY_LENGTH_INCH_INPUT_TYPE]" />' + 
                    '<input type="hidden" id="vr_item_data_entry_length_fraction_input_type_[INDEX_NUMBER]" name="vr_item_data_entry_length_fraction_input_type_[INDEX_NUMBER]" value="[VR_ITEM_DATA_ENTRY_LENGTH_FRACTION_INPUT_TYPE]" />' + 
                    '<input type="hidden" id="vr_item_data_entry_rrp_input_type_[INDEX_NUMBER]" name="vr_item_data_entry_rrp_input_type_[INDEX_NUMBER]" value="[VR_ITEM_DATA_ENTRY_RRP_INPUT_TYPE]" />' + 
                    '<div id="vr_form_item_table_column_hidden_input_type_area_extra_[INDEX_NUMBER]" style="display: none;">[VR_FORM_ITEM_TABLE_COLUMN_HIDDEN_INPUT_TYPE_AREA_EXTRA]</div>' + 
                    '[VR_ITEM_DATA_ENTRY_ACTION_INPUT_TYPE_AREA]' + 
                '</td>';
            var vr_form_item_table_column_hidden_input_type_area_extra = '';

            var template_vr_form_hiddenbox = '<input type="hidden" id="[FIELD_NAME]" name="[FIELD_NAME]" value="[FIELD_VALUE]" />';
            var template_vr_form_inputbox = '<input type="text" class="vr_form_field_textbox_2" id="[FIELD_NAME]" name="[FIELD_NAME]" value="[FIELD_VALUE]" onchange="" />';
            var template_vr_form_inputbox_autofill = '<input type="text" class="vr_form_field_textbox_2" id="[FIELD_NAME]" name="[FIELD_NAME]" value="[FIELD_VALUE]" onchange="" onmouseover="" onmouseout="" />';
            var template_vr_form_inputbox_caution = '<input type="text" class="vr_form_field_textbox_3" id="[FIELD_NAME]" name="[FIELD_NAME]" value="[FIELD_VALUE]" onchange="" />';

            var template_vr_form_inputbox_length_feet = '<input type="text" class="vr_form_field_textbox_feet_2" id="[FIELD_NAME]" name="[FIELD_NAME]" placeholder="Feet" value="[FIELD_VALUE]" onchange="" onmouseover="" onmouseout="" />';
            var template_vr_form_inputbox_length_inch = '<input type="text" class="vr_form_field_textbox_inch_2" id="[FIELD_NAME]" name="[FIELD_NAME]" placeholder="Inch" value="[FIELD_VALUE]" onchange="" onmouseover="" onmouseout="" />';
            var template_vr_form_inputbox_autofill_length_feet = '<input type="text" class="vr_form_field_textbox_feet_2" id="[FIELD_NAME]" name="[FIELD_NAME]" placeholder="Feet" value="[FIELD_VALUE]" onchange="" onmouseover="" onmouseout="" />';
            var template_vr_form_inputbox_autofill_length_inch = '<input type="text" class="vr_form_field_textbox_inch_2" id="[FIELD_NAME]" name="[FIELD_NAME]" placeholder="Inch" value="[FIELD_VALUE]" onchange="" onmouseover="" onmouseout="" />';

            // var template_vr_form_add_item_button = '' +
            //     '<td colspan="[COLUMN_SPAN]" class="vr_table_body_1">' + 
            //         '<input type="button" class="vr_form_field_button_1" id="button_add_vr_form_item_data_entry_[VR_SECTION_DISPLAY_NAME_AS_VARIABLE_NAME]" name="button_add_vr_form_item_data_entry_[VR_SECTION_DISPLAY_NAME_AS_VARIABLE_NAME]" value="Add [VR_SECTION_DISPLAY_NAME] Item" onclick="addBomFormItemAdhocDataEntry(\'[VR_SECTION_DISPLAY_NAME]\')" />' + 
            //     '</td>';
            var template_vr_form_add_item_bar = '' + 
                '<td colspan="[COLUMN_SPAN]" class="vr_table_body_1">' + 
                    '[BUTTON_AREA]' + 
                '</td>';
            var template_vr_form_add_item_button = '' +
                '<input type="button" class="vr_form_field_button_1" id="button_add_vr_form_item_data_entry_[VR_SECTION_DISPLAY_NAME_AS_VARIABLE_NAME]" name="button_add_vr_form_item_data_entry_[VR_SECTION_DISPLAY_NAME_AS_VARIABLE_NAME]" value="Add [VR_SECTION_DISPLAY_NAME] Item" onclick="addBomFormItemAdhocDataEntry(\'[VR_SECTION_DISPLAY_NAME]\')" />';
            var template_vr_form_process_order_button = '' +
                '<input type="button" class="bom_form_field_button_1" id="button_process_order_form_bom_[VR_SECTION_DISPLAY_NAME_AS_VARIABLE_NAME]" name="button_process_order_form_bom_[VR_SECTION_DISPLAY_NAME_AS_VARIABLE_NAME]" value="Process Order" onclick="saveBomFormData(\'[VR_SECTION_DISPLAY_NAME]\')" />'
            var template_vr_form_cancel_order_button = '' +
                '<input type="button" class="bom_form_field_button_1" id="button_cancel_order_form_bom_[VR_SECTION_DISPLAY_NAME_AS_VARIABLE_NAME]" name="button_cancel_order_form_bom_[VR_SECTION_DISPLAY_NAME_AS_VARIABLE_NAME]" value="Cancel Order" onclick="deleteBomFormData(\'[VR_SECTION_DISPLAY_NAME]\')" />'

            var template_vr_form_image_with_popup_show = '<img class="bom_form_field_image_1" id="[FIELD_NAME]" name="[FIELD_NAME]" src="[IMAGE_URL]" onmouseover="" onmouseout="" onclick="showBomFormItemDimensionPopup([INDEX_NUMBER], \'edit\')" />';
            var template_vr_form_image_with_popup_edit = '<img class="bom_form_field_image_1" id="[FIELD_NAME]" name="[FIELD_NAME]" src="[IMAGE_URL]" onmouseover="" onmouseout="" onclick="showBomFormItemDimensionPopup([INDEX_NUMBER], \'edit\')" />';
            var template_vr_form_image = '<img class="bom_form_field_image_1" id="[FIELD_NAME]" name="[FIELD_NAME]" src="[IMAGE_URL]" onmouseover="" onmouseout="" onclick="" />';

            var template_vr_form_item_remove_button = '<input type="button" class="vr_form_field_button_1" id="button_remove_vr_form_item_data_entry_[INDEX_NUMBER]" name="button_remove_vr_form_item_data_entry_[INDEX_NUMBER]" value="Remove" onclick="removeVrFormItemAdhocDataEntry([INDEX_NUMBER])" />';

            var vr_item_data_entry_input_type_area = {};
            vr_item_data_entry_input_type_area['item_display_name'] = '';
            vr_item_data_entry_input_type_area['webbing'] = '';
            vr_item_data_entry_input_type_area['colour'] = '';
            vr_item_data_entry_input_type_area['finish'] = '';
            vr_item_data_entry_input_type_area['uom'] = '';
            vr_item_data_entry_input_type_area['qty'] = '';
            vr_item_data_entry_input_type_area['length'] = '';
            vr_item_data_entry_input_type_area['rrp'] = '';
            vr_item_data_entry_input_type_area['image'] = '';
            vr_item_data_entry_input_type_area['action'] = '';
            var items_list_text_data_entry = '';

            var vr_item_report_output_value_area = {};
            vr_item_report_output_value_area['item_display_name'] = '';
            vr_item_report_output_value_area['webbing'] = '';
            vr_item_report_output_value_area['colour'] = '';
            vr_item_report_output_value_area['finish'] = '';
            vr_item_report_output_value_area['uom'] = '';
            vr_item_report_output_value_area['qty'] = '';
            vr_item_report_output_value_area['length'] = '';
            vr_item_report_output_value_area['rrp'] = '';
            vr_item_report_output_value_area['image'] = '';
            vr_item_report_output_value_area['action'] = '';
            var items_list_text_report_output = '';

            var vr_section_display_name_as_variable_name = '';
            var current_default_colour = '';
            var current_ref_name = '';

            var vr_form_item_table_mode = 'quote';
            if (vr_form_system_info['access_mode'] == 'contract_bom_edit') {
                vr_form_item_table_mode = 'bom';
            }
            var total_column_vr_form_item_table = vr_form_item_table_column_config[vr_form_item_table_mode].length;

            /* --- begin store ignored indexes of vr form item data entry --- */
            if (document.getElementById('vr_framework_type_form_query').value == 'Drop-In') {
                var adhoc_criteria = {
                    "ignore_fields":[
                        {"field_name":"vr_section_ref_name", "field_value":"Frame"}, 
                        {"field_name":"vr_section_ref_name", "field_value":"Fixings"} 
                    ]
                };

                for (c1 = 0; c1 < vr_form_items_data_entry.length; c1++) {
                    total_adhoc_criteria_matched = 0;
                    for (c2 = 0; c2 < adhoc_criteria['ignore_fields'].length; c2++) {
                        current_search_field_name = adhoc_criteria['ignore_fields'][c2]['field_name'];
                        current_search_field_value = adhoc_criteria['ignore_fields'][c2]['field_value'];
                        if (vr_form_items_data_entry[c1][current_search_field_name] &&
                            vr_form_items_data_entry[c1][current_search_field_name] == current_search_field_value) {
                            total_adhoc_criteria_matched++;
                        }
                    }
                    if (total_adhoc_criteria_matched > 0) {
                        ignored_vr_form_item_data_entry_indexes[ignored_vr_form_item_data_entry_indexes.length] = c1;
                    }
                }
            }
            /* --- end store ignored indexes of vr form item data entry --- */

            /* --- begin generate vr form item data entry table column header --- */
            items_list_text_data_entry += '<tr>';
            items_list_text_report_output += '<tr>';
            for (c1 = 0; c1 < total_column_vr_form_item_table; c1++) {
                if (vr_form_item_table_column_config[vr_form_item_table_mode][c1]['visible'] == 'y') {
                    temp_text = replaceSubstringInText(
                        ['[FIELD_NAME]'], 
                        [vr_form_item_table_column_config[vr_form_item_table_mode][c1]['display_name']], 
                        template_vr_form_item_data_entry_table_column_header
                    );
                    items_list_text_data_entry += temp_text;
                    items_list_text_report_output += temp_text;
                }
            }
            items_list_text_data_entry += '</tr>';
            items_list_text_report_output += '</tr>';
            /* --- end generate vr form item data entry table column header --- */

            /* --- begin generate vr section list --- */
            for (c11 = 0; c11 < vr_sections_list.length; c11++) {
                items_list_text_data_entry += '<tr>';
                items_list_text_report_output += '<tr>';
                temp_text = replaceSubstringInText(
                    [
                        '[VR_SECTION_DATA_ENTRY_DISPLAY_NAME]', 
                        '[COLUMN_SPAN]'
                    ], 
                    [
                        vr_sections_list[c11]['display_name'], 
                        total_column_vr_form_item_table
                    ], 
                    template_vr_form_section_header
                );
                items_list_text_data_entry += temp_text;
                items_list_text_report_output += temp_text;
                items_list_text_data_entry += '</tr>';
                items_list_text_report_output += '</tr>';

                /* --- begin generate vr form item data entry table row body --- */
                for (c12 = 0; c12 < vr_form_items_data_entry.length; c12++) {
                    if (vr_form_items_data_entry[c12]['vr_section_display_name'] == vr_sections_list[c11]['display_name']) {
                        if (ignored_vr_form_item_data_entry_indexes.indexOf(c12) == -1) {
                            vr_section_display_name_as_variable_name = '';
                            vr_form_item_table_column_hidden_input_type_area_extra = '';
                            vr_item_data_entry_input_type_area['item_display_name'] = '';
                            vr_item_data_entry_input_type_area['webbing'] = '';
                            vr_item_data_entry_input_type_area['colour'] = '';
                            vr_item_data_entry_input_type_area['finish'] = '';
                            vr_item_data_entry_input_type_area['uom'] = '';
                            vr_item_data_entry_input_type_area['qty'] = '';
                            vr_item_data_entry_input_type_area['length'] = '';
                            vr_item_data_entry_input_type_area['rrp'] = '';
                            vr_item_data_entry_input_type_area['image'] = '';
                            vr_item_data_entry_input_type_area['action'] = '';

                            vr_item_report_output_value_area['item_display_name'] = '';
                            vr_item_report_output_value_area['webbing'] = '';
                            vr_item_report_output_value_area['colour'] = '';
                            vr_item_report_output_value_area['finish'] = '';
                            vr_item_report_output_value_area['uom'] = '';
                            vr_item_report_output_value_area['qty'] = '';
                            vr_item_report_output_value_area['length'] = '';
                            vr_item_report_output_value_area['rrp'] = '';
                            vr_item_report_output_value_area['image'] = '';
                            vr_item_report_output_value_area['action'] = '';

                            /* --- begin column description --- */
                            temp_text = '';
                            if (vr_form_items_data_entry[c12]['vr_item_display_name_input_type'] == 'Select Box') {
                                if (vr_form_items_data_entry[c12]['vr_item_adhoc'] == 'yes') {
                                    temp_text = initHtmlSelectBox(
                                        vr_items_list, 
                                        'vr_item_data_entry_ref_name_' + c12, 
                                        ['section_ref_name'], 
                                        [vr_form_items_data_entry[c12]['vr_section_ref_name']], 
                                        'item_ref_name', 
                                        'item_display_name', 
                                        vr_form_items_data_entry[c12]['vr_item_ref_name'], 
                                        true
                                    );
                                    temp_text = replaceSubstringInText(
                                        ['class="vr_form_field_selectbox_2"'], 
                                        ['class="vr_form_field_selectbox_3"'], 
                                        temp_text
                                    );
                                    temp_text = replaceSubstringInText(
                                        ['onchange=""'], 
                                        ['onchange="processVrFormItemAdhocDataEntryProperties(' + c12 + '); calculateVrFormItemsDataEntryValues(2)"'], 
                                        temp_text
                                    );
                                } else {
                                    temp_text = initHtmlSelectBox(
                                        vr_items_list, 
                                        'vr_item_data_entry_ref_name_' + c12, 
                                        ['section_ref_name', 'subsection_ref_name'], 
                                        [vr_form_items_data_entry[c12]['vr_section_ref_name'], vr_form_items_data_entry[c12]['vr_subsection_ref_name']], 
                                        'item_ref_name', 
                                        'item_display_name', 
                                        vr_form_items_data_entry[c12]['vr_item_ref_name'], 
                                        true
                                    );
                                    temp_text = replaceSubstringInText(
                                        ['class="vr_form_field_selectbox_2"'], 
                                        ['class="vr_form_field_selectbox_3"'], 
                                        temp_text
                                    );
                                    temp_text = replaceSubstringInText(
                                        ['onchange=""'], 
                                        ['onchange="calculateVrFormItemsDataEntryValues(2)"'], 
                                        temp_text
                                    );
                                }
                                vr_item_report_output_value_area['item_display_name'] = vr_form_items_data_entry[c12]['vr_item_display_name'];
                            } else if (vr_form_items_data_entry[c12]['vr_item_display_name_input_type'] == 'Data Value') {
                                temp_text = vr_form_items_data_entry[c12]['vr_item_display_name'];
                                temp_text += replaceSubstringInText(
                                    ['[FIELD_NAME]', '[FIELD_VALUE]'], 
                                    ['vr_item_data_entry_ref_name_' + c12, vr_form_items_data_entry[c12]['vr_item_ref_name']], 
                                    template_vr_form_hiddenbox
                                );
                                vr_item_report_output_value_area['item_display_name'] = vr_form_items_data_entry[c12]['vr_item_display_name'];
                            }
                            vr_item_data_entry_input_type_area['item_display_name'] = temp_text;
                            if (isVrFormItemTableColumnHidden('item_display_name') == true) {
                                vr_form_item_table_column_hidden_input_type_area_extra += replaceSubstringInText(
                                    ['[FIELD_NAME]', '[FIELD_VALUE]'], 
                                    ['vr_item_data_entry_ref_name_' + c12, vr_form_items_data_entry[c12]['vr_item_ref_name']], 
                                    template_vr_form_hiddenbox
                                );
                            }
                            /* --- end column description --- */

                            /* --- begin column webbing --- */
                            temp_text = '';
                            if (vr_form_items_data_entry[c12]['vr_item_webbing_input_type'] == 'Select Box') {
                                temp_text = initHtmlSelectBox(
                                    vr_confirmation_types_list, 
                                    'vr_item_data_entry_webbing_' + c12, 
                                    [], 
                                    [], 
                                    'ref_name', 
                                    'display_name', 
                                    vr_form_items_data_entry[c12]['vr_item_webbing'], 
                                    true
                                );
                                temp_text = replaceSubstringInText(
                                    ['class="vr_form_field_selectbox_2"'], 
                                    ['class="vr_form_field_selectbox_4"'], 
                                    temp_text
                                );
                                temp_text = replaceSubstringInText(
                                    ['onchange=""'], 
                                    ['onchange="calculateVrFormItemsDataEntryValues(2)"'], 
                                    temp_text
                                );
                                vr_item_report_output_value_area['webbing'] = vr_form_items_data_entry[c12]['vr_item_webbing'];
                            } else if (vr_form_items_data_entry[c12]['vr_item_webbing_input_type'] == 'Blank') {
                                temp_text = replaceSubstringInText(
                                    ['[FIELD_NAME]', '[FIELD_VALUE]'], 
                                    ['vr_item_data_entry_webbing_' + c12, vr_form_items_data_entry[c12]['vr_item_webbing']], 
                                    template_vr_form_hiddenbox
                                );
                                vr_item_report_output_value_area['webbing'] = '';
                            }
                            vr_item_data_entry_input_type_area['webbing'] = temp_text;
                            if (isVrFormItemTableColumnHidden('webbing') == true) {
                                vr_form_item_table_column_hidden_input_type_area_extra += replaceSubstringInText(
                                    ['[FIELD_NAME]', '[FIELD_VALUE]'], 
                                    ['vr_item_data_entry_webbing_' + c12, vr_form_items_data_entry[c12]['vr_item_webbing']], 
                                    template_vr_form_hiddenbox
                                );
                            }
                            /* --- end column webbing --- */

                            /* --- begin column colour --- */
                            temp_text = '';
                            current_default_colour = vr_form_items_data_entry[c12]['vr_item_colour'];
                            if (document.getElementById('vr_default_colour_form_query').value != 'null') {
                                current_default_colour = document.getElementById('vr_default_colour_form_query').value;
                            }
                            if (vr_form_items_data_entry[c12]['vr_item_colour_input_type'] == 'Select Box') {
                                temp_text = initHtmlSelectBox(
                                    vr_colours_list, 
                                    'vr_item_data_entry_colour_' + c12, 
                                    [], 
                                    [], 
                                    'ref_name', 
                                    'display_name', 
                                    current_default_colour, 
                                    true
                                );
                                temp_text = replaceSubstringInText(
                                    ['class="vr_form_field_selectbox_2"'], 
                                    ['class="vr_form_field_selectbox_4"'], 
                                    temp_text
                                );
                                vr_item_report_output_value_area['colour'] = current_default_colour;
                            } else if (vr_form_items_data_entry[c12]['vr_item_colour_input_type'] == 'Blank') {
                                temp_text = replaceSubstringInText(
                                    ['[FIELD_NAME]', '[FIELD_VALUE]'], 
                                    ['vr_item_data_entry_colour_' + c12, current_default_colour], 
                                    template_vr_form_hiddenbox
                                );
                                vr_item_report_output_value_area['colour'] = '';
                            }
                            vr_item_data_entry_input_type_area['colour'] = temp_text;
                            if (isVrFormItemTableColumnHidden('colour') == true) {
                                vr_form_item_table_column_hidden_input_type_area_extra += replaceSubstringInText(
                                    ['[FIELD_NAME]', '[FIELD_VALUE]'], 
                                    ['vr_item_data_entry_colour_' + c12, current_default_colour], 
                                    template_vr_form_hiddenbox
                                );
                            }
                            /* --- end column colour --- */

                            /* --- begin column finish --- */
                            temp_text = '';
                            if (vr_form_items_data_entry[c12]['vr_item_finish_input_type'] == 'Select Box') {
                                temp_text = initHtmlSelectBox(
                                    vr_items_list, 
                                    'vr_item_data_entry_finish_' + c12, 
                                    ['section_ref_name', 'subsection_ref_name'], 
                                    [vr_form_items_data_entry[c12]['vr_section_ref_name'], 'Finish'], 
                                    'item_display_name', 
                                    'item_display_name', 
                                    vr_form_items_data_entry[c12]['vr_item_finish'], 
                                    true
                                );
                                temp_text = replaceSubstringInText(
                                    ['class="vr_form_field_selectbox_2"'], 
                                    ['class="vr_form_field_selectbox_4"'], 
                                    temp_text
                                );
                                temp_text = replaceSubstringInText(
                                    ['onchange=""'], 
                                    ['onchange="calculateVrFormItemsDataEntryValues(2)"'], 
                                    temp_text
                                );
                                // vr_item_report_output_value_area['finish'] = vr_form_items_data_entry[c12]['vr_item_finish'];
                                temp_array = getDataRowsFromDataList(
                                    vr_items_list, 
                                    ['section_ref_name', 'subsection_ref_name', 'item_display_name'], 
                                    [vr_form_items_data_entry[c12]['vr_section_ref_name'], 'Finish', vr_form_items_data_entry[c12]['vr_item_finish']]
                                );
                                vr_item_report_output_value_area['finish'] = '';
                                if (temp_array[0]) {
                                    vr_item_report_output_value_area['finish'] = temp_array[0]['item_display_name'];
                                }
                            } else if (vr_form_items_data_entry[c12]['vr_item_finish_input_type'] == 'Blank') {
                                temp_text = replaceSubstringInText(
                                    ['[FIELD_NAME]', '[FIELD_VALUE]'], 
                                    ['vr_item_data_entry_finish_' + c12, vr_form_items_data_entry[c12]['vr_item_finish']], 
                                    template_vr_form_hiddenbox
                                );
                                vr_item_report_output_value_area['finish'] = '';
                            }
                            vr_item_data_entry_input_type_area['finish'] = temp_text;
                            if (isVrFormItemTableColumnHidden('finish') == true) {
                                vr_form_item_table_column_hidden_input_type_area_extra += replaceSubstringInText(
                                    ['[FIELD_NAME]', '[FIELD_VALUE]'], 
                                    ['vr_item_data_entry_finish_' + c12, vr_form_items_data_entry[c12]['vr_item_finish']], 
                                    template_vr_form_hiddenbox
                                );
                            }
                            /* --- end column finish --- */

                            /* --- begin column uom --- */
                            temp_text = '';
                            if (vr_form_items_data_entry[c12]['vr_item_uom_input_type'] == 'Data Value') {
                                temp_text = vr_form_items_data_entry[c12]['vr_item_uom'];
                                temp_text += replaceSubstringInText(
                                    ['[FIELD_NAME]', '[FIELD_VALUE]'], 
                                    ['vr_item_data_entry_uom_' + c12, vr_form_items_data_entry[c12]['vr_item_uom']], 
                                    template_vr_form_hiddenbox
                                );
                                vr_item_report_output_value_area['uom'] = vr_form_items_data_entry[c12]['vr_item_uom'];
                            }
                            vr_item_data_entry_input_type_area['uom'] = temp_text;
                            if (isVrFormItemTableColumnHidden('uom') == true) {
                                vr_form_item_table_column_hidden_input_type_area_extra += replaceSubstringInText(
                                    ['[FIELD_NAME]', '[FIELD_VALUE]'], 
                                    ['vr_item_data_entry_uom_' + c12, vr_form_items_data_entry[c12]['vr_item_uom']], 
                                    template_vr_form_hiddenbox
                                );
                            }
                            /* --- end column uom --- */

                            /* --- begin column qty --- */
                            temp_text = '';
                            if (vr_form_items_data_entry[c12]['vr_item_qty_input_type'] == 'Input Box') {
                                temp_text = replaceSubstringInText(
                                    ['[FIELD_NAME]', '[FIELD_VALUE]'], 
                                    ['vr_item_data_entry_qty_' + c12, vr_form_items_data_entry[c12]['vr_item_qty']], 
                                    template_vr_form_inputbox
                                );
                                vr_item_report_output_value_area['qty'] = vr_form_items_data_entry[c12]['vr_item_qty'];
                            } else if (vr_form_items_data_entry[c12]['vr_item_qty_input_type'] == 'Input Box Caution') {
                                temp_text = replaceSubstringInText(
                                    ['[FIELD_NAME]', '[FIELD_VALUE]'], 
                                    ['vr_item_data_entry_qty_' + c12, vr_form_items_data_entry[c12]['vr_item_qty']], 
                                    template_vr_form_inputbox_caution
                                );
                                vr_item_report_output_value_area['qty'] = vr_form_items_data_entry[c12]['vr_item_qty'];
                            }
                            temp_text = replaceSubstringInText(
                                ['onchange=""'], 
                                ['onchange="calculateVrFormItemsDataEntryValues(2)"'], 
                                temp_text
                            );
                            vr_item_data_entry_input_type_area['qty'] = temp_text;
                            if (isVrFormItemTableColumnHidden('qty') == true) {
                                vr_form_item_table_column_hidden_input_type_area_extra += replaceSubstringInText(
                                    ['[FIELD_NAME]', '[FIELD_VALUE]'], 
                                    ['vr_item_data_entry_qty_' + c12, vr_form_items_data_entry[c12]['vr_item_qty']], 
                                    template_vr_form_hiddenbox
                                );
                            }
                            /* --- end column qty --- */

                            /* --- begin column length --- */
                            temp_text = '';
                            if (vr_form_items_data_entry[c12]['vr_item_length_feet_input_type'] == 'Input Box Autofill' || 
                                vr_form_items_data_entry[c12]['vr_item_length_inch_input_type'] == 'Input Box Autofill' ||
                                vr_form_items_data_entry[c12]['vr_item_length_fraction_input_type'] == 'Select Box') {
                                temp_text = replaceSubstringInText(
                                    ['[FIELD_NAME]', '[FIELD_VALUE]'], 
                                    ['vr_item_data_entry_length_feet_' + c12, vr_form_items_data_entry[c12]['vr_item_length_feet']], 
                                    template_vr_form_inputbox_autofill_length_feet
                                );
                                temp_text += replaceSubstringInText(
                                    ['[FIELD_NAME]', '[FIELD_VALUE]'], 
                                    ['vr_item_data_entry_length_inch_' + c12, vr_form_items_data_entry[c12]['vr_item_length_inch']], 
                                    template_vr_form_inputbox_autofill_length_inch
                                );
                                temp_text = replaceSubstringInText(
                                    ['onchange=""'], 
                                    ['onchange="calculateVrFormItemsDataEntryValues(2)"'], 
                                    temp_text
                                );
                                vr_item_report_output_value_area['length'] = vr_form_items_data_entry[c12]['vr_item_length_feet'] + '\' ';
                                vr_item_report_output_value_area['length'] += vr_form_items_data_entry[c12]['vr_item_length_inch'];
                                if (vr_form_system_info['access_mode'] == 'contract_bom_edit') {
                                    // visible fraction input //
                                    temp_text += initHtmlSelectBox(
                                        vr_fractions_list, 
                                        'vr_item_data_entry_length_fraction_' + c12, 
                                        [], 
                                        [], 
                                        'ref_name', 
                                        'display_name', 
                                        vr_form_items_data_entry[c12]['vr_item_length_fraction'], 
                                        true
                                    );
                                    temp_text = replaceSubstringInText(
                                        ['class="vr_form_field_selectbox_2"'], 
                                        ['class="vr_form_field_selectbox_fraction_2"'], 
                                        temp_text
                                    );
                                    temp_text = replaceSubstringInText(
                                        ['onchange=""'], 
                                        ['onchange="calculateVrFormItemsDataEntryValues(2)"'], 
                                        temp_text
                                    );
                                    temp_text = replaceSubstringInText(
                                        ['-- select --'], 
                                        ['Fracs'], 
                                        temp_text
                                    );
                                    vr_item_report_output_value_area['length'] += ' ' + vr_form_items_data_entry[c12]['vr_item_length_fraction'];
                                } else {
                                    // hidden fraction input //
                                    temp_text += replaceSubstringInText(
                                        ['[FIELD_NAME]', '[FIELD_VALUE]'], 
                                        ['vr_item_data_entry_length_fraction_' + c12, vr_form_items_data_entry[c12]['vr_item_length_fraction']], 
                                        template_vr_form_hiddenbox
                                    );
                                }
                                vr_item_report_output_value_area['length'] += '"';
                            } else if (vr_form_items_data_entry[c12]['vr_item_length_feet_input_type'] == 'Input Box' || 
                                       vr_form_items_data_entry[c12]['vr_item_length_inch_input_type'] == 'Input Box' || 
                                       vr_form_items_data_entry[c12]['vr_item_length_fraction_input_type'] == 'Select Box') {
                                temp_text = replaceSubstringInText(
                                    ['[FIELD_NAME]', '[FIELD_VALUE]'], 
                                    ['vr_item_data_entry_length_feet_' + c12, vr_form_items_data_entry[c12]['vr_item_length_feet']], 
                                    template_vr_form_inputbox_length_feet
                                );
                                temp_text += replaceSubstringInText(
                                    ['[FIELD_NAME]', '[FIELD_VALUE]'], 
                                    ['vr_item_data_entry_length_inch_' + c12, vr_form_items_data_entry[c12]['vr_item_length_inch']], 
                                    template_vr_form_inputbox_length_inch
                                );
                                temp_text = replaceSubstringInText(
                                    ['onchange=""'], 
                                    ['onchange="calculateVrFormItemsDataEntryValues(2)"'], 
                                    temp_text
                                );
                                vr_item_report_output_value_area['length'] = vr_form_items_data_entry[c12]['vr_item_length_feet'] + '\' ';
                                vr_item_report_output_value_area['length'] += vr_form_items_data_entry[c12]['vr_item_length_inch'];
                                if (vr_form_system_info['access_mode'] == 'contract_bom_edit') {
                                    // visible fraction input //
                                    temp_text += initHtmlSelectBox(
                                        vr_fractions_list, 
                                        'vr_item_data_entry_length_fraction_' + c12, 
                                        [], 
                                        [], 
                                        'ref_name', 
                                        'display_name', 
                                        vr_form_items_data_entry[c12]['vr_item_length_fraction'], 
                                        true
                                    );
                                    temp_text = replaceSubstringInText(
                                        ['class="vr_form_field_selectbox_2"'], 
                                        ['class="vr_form_field_selectbox_fraction_2"'], 
                                        temp_text
                                    );
                                    temp_text = replaceSubstringInText(
                                        ['onchange=""'], 
                                        ['onchange="calculateVrFormItemsDataEntryValues(2)"'], 
                                        temp_text
                                    );
                                    temp_text = replaceSubstringInText(
                                        ['-- select --'], 
                                        ['Fracs'], 
                                        temp_text
                                    );
                                    vr_item_report_output_value_area['length'] += ' ' + vr_form_items_data_entry[c12]['vr_item_length_fraction'];
                                } else {
                                    // hidden fraction input //
                                    temp_text += replaceSubstringInText(
                                        ['[FIELD_NAME]', '[FIELD_VALUE]'], 
                                        ['vr_item_data_entry_length_fraction_' + c12, vr_form_items_data_entry[c12]['vr_item_length_fraction']], 
                                        template_vr_form_hiddenbox
                                    );
                                }
                                vr_item_report_output_value_area['length'] += '"';
                            } else if (vr_form_items_data_entry[c12]['vr_item_length_feet_input_type'] == 'Blank' || 
                                       vr_form_items_data_entry[c12]['vr_item_length_inch_input_type'] == 'Blank' || 
                                       vr_form_items_data_entry[c12]['vr_item_length_fraction_input_type'] == 'Blank') {
                                temp_text = replaceSubstringInText(
                                    ['[FIELD_NAME]', '[FIELD_VALUE]'], 
                                    ['vr_item_data_entry_length_feet_' + c12, vr_form_items_data_entry[c12]['vr_item_length_feet']], 
                                    template_vr_form_hiddenbox
                                );
                                temp_text += replaceSubstringInText(
                                    ['[FIELD_NAME]', '[FIELD_VALUE]'], 
                                    ['vr_item_data_entry_length_inch_' + c12, vr_form_items_data_entry[c12]['vr_item_length_inch']], 
                                    template_vr_form_hiddenbox
                                );
                                temp_text += replaceSubstringInText(
                                    ['[FIELD_NAME]', '[FIELD_VALUE]'], 
                                    ['vr_item_data_entry_length_fraction_' + c12, vr_form_items_data_entry[c12]['vr_item_length_fraction']], 
                                    template_vr_form_hiddenbox
                                );
                                vr_item_report_output_value_area['length'] = '';
                            }
                            vr_item_data_entry_input_type_area['length'] = temp_text;
                            if (isVrFormItemTableColumnHidden('length') == true) {
                                vr_form_item_table_column_hidden_input_type_area_extra += replaceSubstringInText(
                                    ['[FIELD_NAME]', '[FIELD_VALUE]'], 
                                    ['vr_item_data_entry_length_feet_' + c12, vr_form_items_data_entry[c12]['vr_item_length_feet']], 
                                    template_vr_form_hiddenbox
                                );
                                vr_form_item_table_column_hidden_input_type_area_extra += replaceSubstringInText(
                                    ['[FIELD_NAME]', '[FIELD_VALUE]'], 
                                    ['vr_item_data_entry_length_inch_' + c12, vr_form_items_data_entry[c12]['vr_item_length_inch']], 
                                    template_vr_form_hiddenbox
                                );
                                vr_form_item_table_column_hidden_input_type_area_extra += replaceSubstringInText(
                                    ['[FIELD_NAME]', '[FIELD_VALUE]'], 
                                    ['vr_item_data_entry_length_fraction_' + c12, vr_form_items_data_entry[c12]['vr_item_length_fraction']], 
                                    template_vr_form_hiddenbox
                                );
                            }
                            /* --- end column length --- */

                            /* --- begin column rrp --- */
                            temp_text = '';
                            if (vr_form_items_data_entry[c12]['vr_item_rrp_input_type'] == 'Input Box Autofill') {
                                temp_text = replaceSubstringInText(
                                    ['[FIELD_NAME]', '[FIELD_VALUE]'], 
                                    ['vr_item_data_entry_rrp_' + c12, vr_form_items_data_entry[c12]['vr_item_rrp']], 
                                    template_vr_form_inputbox_autofill
                                );
                                temp_text = replaceSubstringInText(
                                    [
                                        'onmouseover=""', 
                                        'onmouseout=""'
                                    ], 
                                    [
                                        'onmouseover="showVrFormItemDataEntryLog(\'vr_item_data_entry_rrp_log_' + c12 + '\')"', 
                                        'onmouseout="hideVrFormItemDataEntryLog(\'vr_item_data_entry_rrp_log_' + c12 + '\')"'
                                    ], 
                                    temp_text
                                );
                                vr_item_report_output_value_area['rrp'] = vr_form_items_data_entry[c12]['vr_item_rrp'];
                            }
                            vr_item_data_entry_input_type_area['rrp'] = temp_text;
                            if (isVrFormItemTableColumnHidden('rrp') == true) {
                                vr_form_item_table_column_hidden_input_type_area_extra += replaceSubstringInText(
                                    ['[FIELD_NAME]', '[FIELD_VALUE]'], 
                                    ['vr_item_data_entry_rrp_' + c12, ''], 
                                    template_vr_form_hiddenbox
                                );
                            }
                            /* --- end column rrp --- */

                            /* --- begin column image --- */
                            temp_text = '';
                            if (vr_form_items_data_entry[c12]['vr_item_image'] != '') {
                                if (vr_form_items_data_entry[c12]['vr_item_image_input_type'] == 'Image With Popup Show') {
                                    temp_text = replaceSubstringInText(
                                        [
                                            '[FIELD_NAME]', 
                                            '[IMAGE_URL]', 
                                            '[INDEX_NUMBER]'
                                        ], 
                                        [
                                            'vr_item_data_entry_image_' + c12, 
                                            vr_form_url_info['base'] + 'images/inventory/' + vr_form_items_data_entry[c12]['vr_item_image'], 
                                            c12
                                        ], 
                                        template_vr_form_image_with_popup_show
                                    );
                                } else if (vr_form_items_data_entry[c12]['vr_item_image_input_type'] == 'Image With Popup Edit') {
                                    temp_text = replaceSubstringInText(
                                        [
                                            '[FIELD_NAME]', 
                                            '[IMAGE_URL]', 
                                            '[INDEX_NUMBER]'
                                        ], 
                                        [
                                            'vr_item_data_entry_image_' + c12, 
                                            vr_form_url_info['base'] + 'images/inventory/' + vr_form_items_data_entry[c12]['vr_item_image'], 
                                            c12
                                        ], 
                                        template_vr_form_image_with_popup_edit
                                    );
                                }
                                vr_item_report_output_value_area['image'] = replaceSubstringInText(
                                    [
                                        '[FIELD_NAME]', 
                                        '[IMAGE_URL]', 
                                        '[INDEX_NUMBER]'
                                    ], 
                                    [
                                        'vr_item_data_entry_image_' + c12, 
                                        vr_form_url_info['base'] + 'images/inventory/' + vr_form_items_data_entry[c12]['vr_item_image'], 
                                        c12
                                    ], 
                                    template_vr_form_image
                                );
                            }
                            vr_item_data_entry_input_type_area['image'] = temp_text;
                            /* --- end column image --- */

                            /* --- begin column action --- */
                            temp_text = '';
                            if (vr_form_items_data_entry[c12]['vr_item_adhoc'] == 'yes' || 
                                vr_form_system_info['access_mode'] == 'contract_bom_edit') {
                                temp_text = replaceSubstringInText(
                                    ['[INDEX_NUMBER]'], 
                                    [c12], 
                                    template_vr_form_item_remove_button
                                );
                            } else {
                                temp_text = '&nbsp';
                            }
                            vr_item_data_entry_input_type_area['action'] = temp_text;
                            /* --- end column action --- */

                            /* --- begin apply column data to table row --- */
                            items_list_text_data_entry += '<tr>';
                            items_list_text_report_output += '<tr>';
                            for (c13 = 0; c13 < (total_column_vr_form_item_table - 1); c13++) {
                                if (vr_form_item_table_column_config[vr_form_item_table_mode][c13]['visible'] == 'y') {
                                    current_ref_name = vr_form_item_table_column_config[vr_form_item_table_mode][c13]['ref_name'];
                                    temp_text = replaceSubstringInText(
                                        ['[INDEX_NUMBER]', '[VR_ITEM_DATA_ENTRY_' + current_ref_name.toUpperCase() + '_INPUT_TYPE_AREA]'], 
                                        [c12, vr_item_data_entry_input_type_area[current_ref_name]], 
                                        template_vr_form_item_data_entry_table_column_body[current_ref_name]
                                    );
                                    items_list_text_data_entry += temp_text;

                                    temp_text = replaceSubstringInText(
                                        ['[INDEX_NUMBER]', '[VR_ITEM_DATA_ENTRY_' + current_ref_name.toUpperCase() + '_INPUT_TYPE_AREA]'], 
                                        [c12, vr_item_report_output_value_area[current_ref_name]], 
                                        template_vr_form_item_data_entry_table_column_body[current_ref_name]
                                    );
                                    items_list_text_report_output += temp_text;
                                }
                            }

                            temp_text = replaceSubstringInText(
                                [
                                    '[INDEX_NUMBER]', 
                                    '[VR_TYPE_DATA_ENTRY_REF_NAME]', 
                                    '[VR_TYPE_DATA_ENTRY_DISPLAY_NAME]', 
                                    '[VR_SECTION_DATA_ENTRY_REF_NAME]', 
                                    '[VR_SECTION_DATA_ENTRY_DISPLAY_NAME]', 
                                    '[VR_SUBSECTION_DATA_ENTRY_REF_NAME]', 
                                    '[VR_SUBSECTION_DATA_ENTRY_DISPLAY_NAME]', 
                                    '[VR_ITEM_DATA_ENTRY_UNIT_PRICE]', 
                                    '[VR_ITEM_DATA_ENTRY_DISPLAY_NAME]', 
                                    '[VR_ITEM_DATA_ENTRY_DISPLAY_NAME_INPUT_TYPE]', 
                                    '[VR_ITEM_DATA_ENTRY_WEBBING_INPUT_TYPE]', 
                                    '[VR_ITEM_DATA_ENTRY_COLOUR_INPUT_TYPE]', 
                                    '[VR_ITEM_DATA_ENTRY_FINISH_INPUT_TYPE]', 
                                    '[VR_ITEM_DATA_ENTRY_UOM_INPUT_TYPE]', 
                                    '[VR_ITEM_DATA_ENTRY_UNIT_PRICE_INPUT_TYPE]', 
                                    '[VR_ITEM_DATA_ENTRY_QTY_INPUT_TYPE]', 
                                    '[VR_ITEM_DATA_ENTRY_LENGTH_FEET_INPUT_TYPE]', 
                                    '[VR_ITEM_DATA_ENTRY_LENGTH_INCH_INPUT_TYPE]', 
                                    '[VR_ITEM_DATA_ENTRY_LENGTH_FRACTION_INPUT_TYPE]', 
                                    '[VR_ITEM_DATA_ENTRY_RRP_INPUT_TYPE]', 
                                    '[VR_FORM_ITEM_TABLE_COLUMN_HIDDEN_INPUT_TYPE_AREA_EXTRA]', 
                                    '[VR_ITEM_DATA_ENTRY_ACTION_INPUT_TYPE_AREA]'
                                ], 
                                [
                                    c12, 
                                    vr_form_items_data_entry[c12]['vr_type_ref_name'], 
                                    vr_form_items_data_entry[c12]['vr_type_display_name'], 
                                    vr_form_items_data_entry[c12]['vr_section_ref_name'], 
                                    vr_form_items_data_entry[c12]['vr_section_display_name'], 
                                    vr_form_items_data_entry[c12]['vr_subsection_ref_name'], 
                                    vr_form_items_data_entry[c12]['vr_subsection_display_name'], 
                                    vr_form_items_data_entry[c12]['vr_item_unit_price'], 
                                    vr_form_items_data_entry[c12]['vr_item_display_name'], 
                                    vr_form_items_data_entry[c12]['vr_item_display_name_input_type'], 
                                    vr_form_items_data_entry[c12]['vr_item_webbing_input_type'], 
                                    vr_form_items_data_entry[c12]['vr_item_colour_input_type'], 
                                    vr_form_items_data_entry[c12]['vr_item_finish_input_type'], 
                                    vr_form_items_data_entry[c12]['vr_item_uom_input_type'], 
                                    vr_form_items_data_entry[c12]['vr_item_unit_price_input_type'], 
                                    vr_form_items_data_entry[c12]['vr_item_qty_input_type'], 
                                    vr_form_items_data_entry[c12]['vr_item_length_feet_input_type'], 
                                    vr_form_items_data_entry[c12]['vr_item_length_inch_input_type'], 
                                    vr_form_items_data_entry[c12]['vr_item_length_fraction_input_type'], 
                                    vr_form_items_data_entry[c12]['vr_item_rrp_input_type'], 
                                    vr_form_item_table_column_hidden_input_type_area_extra, 
                                    vr_item_data_entry_input_type_area['action']
                                ], 
                                template_vr_form_item_data_entry_table_column_body['action']
                            );
                            items_list_text_data_entry += temp_text;
                            items_list_text_data_entry += '</tr>';
                            items_list_text_report_output += '</tr>';
                            /* --- end apply column data to table row --- */
                        }
                    }
                }
                /* --- end generate vr form item data entry table row body --- */

                // if (vr_form_system_info['access_mode'] != 'quote_view') {
                //     vr_section_display_name_as_variable_name = replaceSubstringInText(
                //         [' '], 
                //         ['_'], 
                //         vr_sections_list[c11]['display_name'].toLowerCase()
                //     );
                //     items_list_text_data_entry += '<tr>';
                //     temp_text = replaceSubstringInText(
                //         [
                //             '[VR_SECTION_DISPLAY_NAME_AS_VARIABLE_NAME]', 
                //             '[VR_SECTION_DISPLAY_NAME]', 
                //             '[COLUMN_SPAN]'
                //         ], 
                //         [
                //             vr_section_display_name_as_variable_name, 
                //             vr_sections_list[c11]['display_name'], 
                //             total_column_vr_form_item_table
                //         ], 
                //         template_vr_form_add_item_button
                //     );
                //     items_list_text_data_entry += temp_text;
                //     items_list_text_data_entry += '</tr>';
                // }

                /* --- begin generate add item button row > available buttons: add item button, process order button or cancel order button --- */
                if (vr_form_system_info['access_mode'] != 'quote_view') {
                    vr_section_display_name_as_variable_name = replaceSubstringInText(
                        [' '], 
                        ['_'], 
                        vr_sections_list[c11]['display_name'].toLowerCase()
                    );
                    items_list_text_data_entry += '<tr>';
                    temp_text1 = replaceSubstringInText(
                        [
                            '[VR_SECTION_DISPLAY_NAME_AS_VARIABLE_NAME]', 
                            '[VR_SECTION_DISPLAY_NAME]' 
                        ], 
                        [
                            vr_section_display_name_as_variable_name, 
                            vr_sections_list[c11]['display_name'] 
                        ], 
                        template_vr_form_add_item_button
                    );
                    temp_text2 = '';
                    if (vr_form_system_info['access_mode'] == 'contract_bom_edit') {
                        temp_text2 = replaceSubstringInText(
                            [
                                '[VR_SECTION_DISPLAY_NAME_AS_VARIABLE_NAME]', 
                                '[VR_SECTION_DISPLAY_NAME]' 
                            ], 
                            [
                                vr_section_display_name_as_variable_name, 
                                vr_sections_list[c11]['display_name'] 
                            ], 
                            template_vr_form_process_order_button
                        );
                    }
                    temp_text3 = '';
                    if (vr_form_system_info['access_mode'] == 'contract_bom_edit') {
                        temp_text3 = replaceSubstringInText(
                            [
                                '[VR_SECTION_DISPLAY_NAME_AS_VARIABLE_NAME]', 
                                '[VR_SECTION_DISPLAY_NAME]' 
                            ], 
                            [
                                vr_section_display_name_as_variable_name, 
                                vr_sections_list[c11]['display_name'] 
                            ], 
                            template_vr_form_cancel_order_button
                        );
                    }
                    temp_text = replaceSubstringInText(
                        ['[COLUMN_SPAN]'], [total_column_vr_form_item_table], template_vr_form_add_item_bar
                    );

                    temp_array = getDataRowsFromDataList(
                        vr_total_process_order_items_by_section_list, 
                        ['display_name'], 
                        [vr_sections_list[c11]['display_name']]
                    );
                    total_process_order_items = 0;
                    if (temp_array[0]) {
                        total_process_order_items = temp_array[0]['total_process_order_items'];
                    }
                    button_list = temp_text1 + '&nbsp;' + temp_text2;
                    if (total_process_order_items > 0) {
                        button_list = temp_text1 + '&nbsp;' + temp_text3;
                    }

                    temp_text = replaceSubstringInText(
                        ['[BUTTON_AREA]'], [button_list], temp_text
                    );
                    items_list_text_data_entry += temp_text;
                    items_list_text_data_entry += '</tr>';
                }
                /* --- end generate add item button row > available buttons: add item button, process order button or cancel order button --- */
            }
            /* --- end generate vr section list --- */
    
            document.getElementById('vr_form_items_data_entry_table').innerHTML = items_list_text_data_entry;

            switch (output_format) {
                case 'form':
                    return items_list_text_data_entry;
                    break;
                case 'report':
                    items_list_text_report_output = '' + 
                        '<table width="100%" border="0">' + 
                            items_list_text_report_output + 
                        '</table>' + 
                        '<br />';
                    return items_list_text_report_output;
                    break;
            }
        }


        function isVrFormItemTableColumnHidden(column_ref_name) {
            var result = false;

            var vr_form_item_table_mode = 'quote';
            if (vr_form_system_info['access_mode'] == 'contract_bom_edit') {
                vr_form_item_table_mode = 'bom';
            }
            var total_column_vr_form_item_table = vr_form_item_table_column_config[vr_form_item_table_mode].length;
            var c1 = 0;

            for (c1 = 0; c1 < total_column_vr_form_item_table; c1++) {
                if (vr_form_item_table_column_config[vr_form_item_table_mode][c1]['ref_name'] == column_ref_name) {
                    if (vr_form_item_table_column_config[vr_form_item_table_mode][c1]['visible'] == 'n') {
                        result = true;
                        break;
                    }
                }
            }

            return result;
        }


        function disableVrFormItemsDataEntryMode() {
            var c1 = 0;
            var data_entry_input_types = ['Select Box', 'Input Box', 'Input Box Caution', 'Input Box Autofill'];

            for (c1 = 0; c1 < vr_form_items_data_entry.length; c1++) {
                if (data_entry_input_types.indexOf(vr_form_items_data_entry[c1]['vr_item_display_name_input_type']) != -1) {
                    document.getElementById('vr_item_data_entry_ref_name_' + c1).disabled = true;
                }

                if (data_entry_input_types.indexOf(vr_form_items_data_entry[c1]['vr_item_webbing_input_type']) != -1) {
                    document.getElementById('vr_item_data_entry_webbing_' + c1).disabled = true;
                }

                if (data_entry_input_types.indexOf(vr_form_items_data_entry[c1]['vr_item_colour_input_type']) != -1) {
                    document.getElementById('vr_item_data_entry_colour_' + c1).disabled = true;
                }

                if (data_entry_input_types.indexOf(vr_form_items_data_entry[c1]['vr_item_finish_input_type']) != -1) {
                    document.getElementById('vr_item_data_entry_finish_' + c1).disabled = true;
                }

                if (data_entry_input_types.indexOf(vr_form_items_data_entry[c1]['vr_item_qty_input_type']) != -1) {
                    document.getElementById('vr_item_data_entry_qty_' + c1).disabled = true;
                }

                if (data_entry_input_types.indexOf(vr_form_items_data_entry[c1]['vr_item_length_feet_input_type']) != -1) {
                    document.getElementById('vr_item_data_entry_length_feet_' + c1).disabled = true;
                }

                if (data_entry_input_types.indexOf(vr_form_items_data_entry[c1]['vr_item_length_inch_input_type']) != -1) {
                    document.getElementById('vr_item_data_entry_length_inch_' + c1).disabled = true;
                }

                if (data_entry_input_types.indexOf(vr_form_items_data_entry[c1]['vr_item_length_fraction_input_type']) != -1) {
                    document.getElementById('vr_item_data_entry_length_fraction_' + c1).disabled = true;
                }

                if (data_entry_input_types.indexOf(vr_form_items_data_entry[c1]['vr_item_rrp_input_type']) != -1) {
                    document.getElementById('vr_item_data_entry_rrp_' + c1).disabled = true;
                }
            }


            document.getElementById('vr_framework_type_form_query').disabled = true;
            document.getElementById('vr_type_form_query').disabled = true;
            document.getElementById('vr_project_name_form_query').disabled = true;
            document.getElementById('vr_default_colour_form_query').disabled = true;

            if (document.getElementById('vr_type_form_query').value == 'VR8' || 
                document.getElementById('vr_type_form_query').value == 'VR9') {
                document.getElementById('vr_run_feet_form_query').disabled = true;
                document.getElementById('vr_run_inch_form_query').disabled = true;
                document.getElementById('vr_rise_feet_form_query').disabled = true;
                document.getElementById('vr_rise_inch_form_query').disabled = true;
            }

            var c1 = 0;
            var vr_type_info = getVrTypeInfo();
            for (c1 = 0; c1 < parseInt(vr_type_info['number_of_bay']); c1++) {
                document.getElementById('vr_length_feet_form_query_' + c1).disabled = true;
                document.getElementById('vr_length_inch_form_query_' + c1).disabled = true;
            }
            document.getElementById('vr_width_feet_form_query').disabled = true;
            document.getElementById('vr_width_inch_form_query').disabled = true;


            var billing_info_fields = [
                'vr_payment_vergola', 
                'vr_payment_vr_items_rrp', 
                'vr_payment_disbursement_sub_total', 
                'vr_payment_sub_total', 
                'vr_payment_tax', 
                'vr_payment_total', 
                'vr_payment_deposit', 
                'vr_payment_progress_payment', 
                'vr_payment_final_payment', 
                'vr_commission_sales_commission', 
                'vr_commission_pay1', 
                'vr_commission_pay2', 
                'vr_commission_final', 
                'vr_commission_installer_payment'
            ];
            for (c1 = 0; c1 < billing_info_fields.length; c1++) {
                document.getElementById(billing_info_fields[c1] + '_form_billing').disabled = true;
            }
        }


        function showVrFormItemDataEntryLog(form_item_id) {
            if (enable_vr_form_item_calculation_log == true) {
                if (document.getElementById(form_item_id)) {
                    document.getElementById(form_item_id).style.display = 'block';
                }
            }
        }


        function hideVrFormItemDataEntryLog(form_item_id) {
            if (enable_vr_form_item_calculation_log == true) {
                if (document.getElementById(form_item_id)) {
                    document.getElementById(form_item_id).style.display = 'none';
                }
            }
        }


        function showFormArea(form_area_id) {
            if (document.getElementById(form_area_id)) {
                document.getElementById(form_area_id).style.display = 'block';
            }
        }


        function hideFormArea(form_area_id) {
            if (document.getElementById(form_area_id)) {
                document.getElementById(form_area_id).style.display = 'none';
            }
        }


        function setVrFormItemsDataEntryColourByDefaultValue() {
            var current_default_colour = document.getElementById('vr_default_colour_form_query').value;
            var c1 = 0;

            if (current_default_colour != 'null') {
                for (c1 = 0; c1 < vr_form_items_data_entry.length; c1++) {
                    if (document.getElementById('vr_item_data_entry_colour_' + c1)) {
                        document.getElementById('vr_item_data_entry_colour_' + c1).value = current_default_colour;
                        vr_form_items_data_entry[c1]['vr_item_colour'] = current_default_colour;
                    }
                }
            }
        }


        function setFormAreaVisibility() {
            switch (vr_form_system_info['access_mode']) {
                case 'quote_add':
                    hideFormArea('bom_form_buttons_area_1');
                    hideFormArea('bom_form_queries_table_area');
                    showFormArea('vr_form_queries_table_area');
                    showFormArea('vr_form_queries_button_area_1');
                    hideFormArea('vr_form_queries_button_area_21');
                    hideFormArea('vr_form_queries_button_area_31');
                    hideFormArea('vr_form_billing_table_area');
                    hideFormArea('vr_form_queries_button_area_22');
                    hideFormArea('vr_form_queries_button_area_32');
                    hideFormArea('bom_form_buttons_area_2');
                    break;
                case 'quote_edit':
                    hideFormArea('bom_form_buttons_area_1');
                    hideFormArea('bom_form_queries_table_area');
                    showFormArea('vr_form_queries_table_area');
                    showFormArea('vr_form_queries_button_area_1');
                    hideFormArea('vr_form_queries_button_area_21');
                    hideFormArea('vr_form_queries_button_area_31');
                    showFormArea('vr_form_billing_table_area');
                    hideFormArea('vr_form_queries_button_area_22');
                    hideFormArea('vr_form_queries_button_area_32');
                    hideFormArea('bom_form_buttons_area_2');
                    retrieveVrFormData();
                    break;
                case 'quote_view':
                    showFormArea('bom_form_buttons_area_1');
                    hideFormArea('bom_form_queries_table_area');
                    showFormArea('vr_form_queries_table_area');
                    hideFormArea('vr_form_queries_button_area_1');
                    hideFormArea('vr_form_queries_button_area_21');
                    hideFormArea('vr_form_queries_button_area_31');
                    showFormArea('vr_form_billing_table_area');
                    hideFormArea('vr_form_queries_button_area_22');
                    hideFormArea('vr_form_queries_button_area_32');
                    showFormArea('bom_form_buttons_area_2');
                    retrieveVrFormData();
                    break;
                case 'contract_bom_edit':
                    showFormArea('bom_form_buttons_area_1');
                    showFormArea('bom_form_queries_table_area');
                    hideFormArea('vr_form_queries_table_area');
                    hideFormArea('vr_form_queries_button_area_1');
                    hideFormArea('vr_form_queries_button_area_21');
                    hideFormArea('vr_form_queries_button_area_31');
                    hideFormArea('vr_form_billing_table_area');
                    hideFormArea('vr_form_queries_button_area_22');
                    hideFormArea('vr_form_queries_button_area_32');
                    showFormArea('bom_form_buttons_area_2');
                    retrieveVrFormData();
                    break;
            }
        }


        function initProgram() {
            initInputElementsFormQueries();
            initInputElementsFormBom();

            setFormAreaVisibility();
        }
