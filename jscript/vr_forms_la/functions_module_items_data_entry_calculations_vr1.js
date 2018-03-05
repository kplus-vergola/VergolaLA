        function assignVrDimensionsToVrFormItemsDataEntryVr1() {
            var c1 = 0;
            var c2 = 0;
            var vr_type_info = getVrTypeInfo();
            var number_of_bay = parseInt(vr_type_info['number_of_bay']);
            var current_vr_length_in_string = '';
            var current_vr_length_in_value_for_calculation = 0.0;
            var new_vr_length_in_string = '';
            var total_vr_length_in_value_for_calculation = 0.0;
            var total_vr_length_in_value_for_display = '';

            var total_vr_length_feet_in_value_for_display = '';
            var total_vr_length_inch_in_value_for_display = '';

            var vr_width_in_string = '';
            var vr_width_in_value_for_calculation = 0.0;
            var vr_width_in_value_for_display = '';

            var vr_width_feet_in_string = '';
            var vr_width_feet_in_value_for_calculation = 0.0;
            var vr_width_feet_in_value_for_display = '';

            var vr_width_inch_in_string = '';
            var vr_width_inch_in_value_for_calculation = 0.0;
            var vr_width_inch_in_value_for_display = '';

            var temp_results = {};
            var temp_total = 0.0;
            var item_length_in_string = '';
            var item_length_in_value_for_calculation = 0.0;
            var gutter_lining_in_value_for_calculation = 0.0;
            var gutter_lining_in_value_for_calculation = 0.0;
            var gutter_lining_in_value_for_display = '';

            var gutter_lining_feet_in_value_for_display = '';
            var gutter_lining_inch_in_value_for_display = '';

            var minimum_inch_per_louvre = 7.87402;
            var total_louvre = 0;
            var total_endcap = 0;
            var total_pivot_strip = 0;
            var total_link_bar = 0;
            var row_values = [];
            var vr_item_config_internal_ref_name = '';

            var temp_array = [];

            for (c1 = 0; c1 < number_of_bay; c1++) {
                current_vr_length_in_string = document.getElementById('vr_length_feet_form_query_' + c1).value + '\'' + document.getElementById('vr_length_inch_form_query_' + c1).value;
                current_vr_length_in_value_for_calculation = convertValueForCalculation(current_vr_length_in_string);
                total_vr_length_in_value_for_calculation += current_vr_length_in_value_for_calculation;
            }
            total_vr_length_in_value_for_display = revertValueForCalculation(total_vr_length_in_value_for_calculation);
            temp_array = total_vr_length_in_value_for_display.split('\'');
            total_vr_length_feet_in_value_for_display = temp_array[0];
            total_vr_length_inch_in_value_for_display = temp_array[1];

            vr_width_feet_in_string = document.getElementById('vr_width_feet_form_query').value;
            vr_width_inch_in_string = document.getElementById('vr_width_inch_form_query').value;
            vr_width_in_string = vr_width_feet_in_string + '\'' + vr_width_inch_in_string;
            vr_width_in_value_for_calculation = convertValueForCalculation(vr_width_in_string);
            vr_width_in_value_for_display = revertValueForCalculation(vr_width_in_value_for_calculation);

            temp_array = vr_width_in_value_for_display.split('\'');
            vr_width_feet_in_value_for_display = temp_array[0];
            vr_width_inch_in_value_for_display = temp_array[1];

            for (c1 = 0; c1 < vr_form_items_data_entry.length; c1++) {
                switch (vr_form_items_data_entry[c1]['vr_item_config_internal_ref_name']) {
                    /* --- beams ---*/
                    case 'beam_front_and_rear':
                        document.getElementById('vr_item_data_entry_length_feet_' + c1).value = total_vr_length_feet_in_value_for_display;
                        document.getElementById('vr_item_data_entry_length_inch_' + c1).value = total_vr_length_inch_in_value_for_display;
                        vr_form_items_data_entry[c1]['vr_item_length_feet'] = total_vr_length_feet_in_value_for_display;
                        vr_form_items_data_entry[c1]['vr_item_length_inch'] = total_vr_length_inch_in_value_for_display;
                        break;
                    case 'beam_left_and_right':
                        document.getElementById('vr_item_data_entry_length_feet_' + c1).value = vr_width_feet_in_value_for_display;
                        document.getElementById('vr_item_data_entry_length_inch_' + c1).value = vr_width_inch_in_value_for_display;
                        vr_form_items_data_entry[c1]['vr_item_length_feet'] = vr_width_feet_in_value_for_display;
                        vr_form_items_data_entry[c1]['vr_item_length_inch'] = vr_width_inch_in_value_for_display;
                        break;
                    /* --- gutters ---*/
                    case 'gutter_narrow':
                        document.getElementById('vr_item_data_entry_length_feet_' + c1).value = total_vr_length_feet_in_value_for_display;
                        document.getElementById('vr_item_data_entry_length_inch_' + c1).value = total_vr_length_inch_in_value_for_display;
                        vr_form_items_data_entry[c1]['vr_item_length_feet'] = total_vr_length_feet_in_value_for_display;
                        vr_form_items_data_entry[c1]['vr_item_length_inch'] = total_vr_length_inch_in_value_for_display;
                        break;
                    case 'gutter_wide':
                        document.getElementById('vr_item_data_entry_length_feet_' + c1).value = total_vr_length_feet_in_value_for_display;
                        document.getElementById('vr_item_data_entry_length_inch_' + c1).value = total_vr_length_inch_in_value_for_display;
                        vr_form_items_data_entry[c1]['vr_item_length_feet'] = total_vr_length_feet_in_value_for_display;
                        vr_form_items_data_entry[c1]['vr_item_length_inch'] = total_vr_length_inch_in_value_for_display;
                        break;
                    case 'gutter_tapered_narrow_to_wide':
                        document.getElementById('vr_item_data_entry_length_feet_' + c1).value = vr_width_feet_in_value_for_display;
                        document.getElementById('vr_item_data_entry_length_inch_' + c1).value = vr_width_inch_in_value_for_display;
                        vr_form_items_data_entry[c1]['vr_item_length_feet'] = vr_width_feet_in_value_for_display;
                        vr_form_items_data_entry[c1]['vr_item_length_inch'] = vr_width_inch_in_value_for_display;
                        break;
                    case 'gutter_tapered_wide_to_narrow':
                        document.getElementById('vr_item_data_entry_length_feet_' + c1).value = vr_width_feet_in_value_for_display;
                        document.getElementById('vr_item_data_entry_length_inch_' + c1).value = vr_width_inch_in_value_for_display;
                        vr_form_items_data_entry[c1]['vr_item_length_feet'] = vr_width_feet_in_value_for_display;
                        vr_form_items_data_entry[c1]['vr_item_length_inch'] = vr_width_inch_in_value_for_display;
                        break;
                    case 'gutter_lining':
                        gutter_lining_related_items = [
                            'gutter_narrow', 'gutter_wide', 
                            'gutter_tapered_narrow_to_wide', 'gutter_tapered_wide_to_narrow'
                        ];
                        for (c2 = 0; c2 < gutter_lining_related_items.length; c2++) {
                            temp_results = getVrFormItemDataEntryRowValues(gutter_lining_related_items[c2]);
                            item_length_in_string = temp_results['item_length_feet'] + '\'' + temp_results['item_length_inch'];
                            item_length_in_value_for_calculation = convertValueForCalculation(item_length_in_string);
                            gutter_lining_in_value_for_calculation += (item_length_in_value_for_calculation * parseInt(temp_results['item_qty']));
                        }
                        gutter_lining_in_value_for_display = revertValueForCalculation(gutter_lining_in_value_for_calculation);
                        temp_array = gutter_lining_in_value_for_display.split('\'');
                        gutter_lining_feet_in_value_for_display = temp_array[0];
                        gutter_lining_inch_in_value_for_display = temp_array[1];

                        document.getElementById('vr_item_data_entry_length_feet_' + c1).value = gutter_lining_feet_in_value_for_display;
                        document.getElementById('vr_item_data_entry_length_inch_' + c1).value = gutter_lining_inch_in_value_for_display;
                        vr_form_items_data_entry[c1]['vr_item_length_feet'] = gutter_lining_feet_in_value_for_display;
                        vr_form_items_data_entry[c1]['vr_item_length_inch'] = gutter_lining_inch_in_value_for_display;
                        break;
                    /* --- flashings ---*/
                    case 'flashing_beam_face_front':
                        document.getElementById('vr_item_data_entry_length_feet_' + c1).value = total_vr_length_feet_in_value_for_display;
                        document.getElementById('vr_item_data_entry_length_inch_' + c1).value = total_vr_length_inch_in_value_for_display;
                        vr_form_items_data_entry[c1]['vr_item_length_feet'] = total_vr_length_feet_in_value_for_display;
                        vr_form_items_data_entry[c1]['vr_item_length_inch'] = total_vr_length_inch_in_value_for_display;
                        break;
                    case 'flashing_beam_face_left_and_right':
                        document.getElementById('vr_item_data_entry_length_feet_' + c1).value = vr_width_feet_in_value_for_display;
                        document.getElementById('vr_item_data_entry_length_inch_' + c1).value = vr_width_inch_in_value_for_display;
                        vr_form_items_data_entry[c1]['vr_item_length_feet'] = vr_width_feet_in_value_for_display;
                        vr_form_items_data_entry[c1]['vr_item_length_inch'] = vr_width_inch_in_value_for_display;
                        break;
                    case 'flashing_adaptor_male':
                        document.getElementById('vr_item_data_entry_length_feet_' + c1).value = vr_width_feet_in_value_for_display;
                        document.getElementById('vr_item_data_entry_length_inch_' + c1).value = vr_width_inch_in_value_for_display;
                        vr_form_items_data_entry[c1]['vr_item_length_feet'] = vr_width_feet_in_value_for_display;
                        vr_form_items_data_entry[c1]['vr_item_length_inch'] = vr_width_inch_in_value_for_display;
                        break;
                    case 'flashing_adaptor_female':
                        document.getElementById('vr_item_data_entry_length_feet_' + c1).value = vr_width_feet_in_value_for_display;
                        document.getElementById('vr_item_data_entry_length_inch_' + c1).value = vr_width_inch_in_value_for_display;
                        vr_form_items_data_entry[c1]['vr_item_length_feet'] = vr_width_feet_in_value_for_display;
                        vr_form_items_data_entry[c1]['vr_item_length_inch'] = vr_width_inch_in_value_for_display;
                        break;
                    case 'flashing_fascia':
                        document.getElementById('vr_item_data_entry_length_feet_' + c1).value = total_vr_length_feet_in_value_for_display;
                        document.getElementById('vr_item_data_entry_length_inch_' + c1).value = total_vr_length_inch_in_value_for_display;
                        vr_form_items_data_entry[c1]['vr_item_length_feet'] = total_vr_length_feet_in_value_for_display;
                        vr_form_items_data_entry[c1]['vr_item_length_inch'] = total_vr_length_inch_in_value_for_display;
                        break;
                    case 'flashing_perimeter_front':
                        document.getElementById('vr_item_data_entry_length_feet_' + c1).value = total_vr_length_feet_in_value_for_display;
                        document.getElementById('vr_item_data_entry_length_inch_' + c1).value = total_vr_length_inch_in_value_for_display;
                        vr_form_items_data_entry[c1]['vr_item_length_feet'] = total_vr_length_feet_in_value_for_display;
                        vr_form_items_data_entry[c1]['vr_item_length_inch'] = total_vr_length_inch_in_value_for_display;
                        break;
                    case 'flashing_perimeter_left_and_right':
                        document.getElementById('vr_item_data_entry_length_feet_' + c1).value = vr_width_feet_in_value_for_display;
                        document.getElementById('vr_item_data_entry_length_inch_' + c1).value = vr_width_inch_in_value_for_display;
                        vr_form_items_data_entry[c1]['vr_item_length_feet'] = vr_width_feet_in_value_for_display;
                        vr_form_items_data_entry[c1]['vr_item_length_inch'] = vr_width_inch_in_value_for_display;
                        break;
                    /* --- vergola ---*/
                    case 'vergola_system_louvre':
                        total_louvre = Math.round(total_vr_length_in_value_for_calculation / minimum_inch_per_louvre);
                        total_endcap = total_louvre * 2;
                        total_pivot_strip = Math.round(total_endcap / 12);
                        total_link_bar = Math.round(total_louvre / 12);

                        document.getElementById('vr_item_data_entry_length_feet_' + c1).value = vr_width_feet_in_value_for_display;
                        document.getElementById('vr_item_data_entry_length_inch_' + c1).value = vr_width_inch_in_value_for_display;
                        vr_form_items_data_entry[c1]['vr_item_length_feet'] = vr_width_feet_in_value_for_display;
                        vr_form_items_data_entry[c1]['vr_item_length_inch'] = vr_width_inch_in_value_for_display;

                        document.getElementById('vr_item_data_entry_qty_' + c1).value = total_louvre;
                        vr_form_items_data_entry[c1]['vr_item_qty'] = total_louvre;

                        setVrFormItemDataEntryRowValues(
                            'vergola_system_endcap', 
                            [{"form_item_name":"vr_item_data_entry_qty", "variable_name":"vr_item_qty", "col_value":total_endcap}]
                        );

                        setVrFormItemDataEntryRowValues(
                            'vergola_system_pivot_strip', 
                            [{"form_item_name":"vr_item_data_entry_qty", "variable_name":"vr_item_qty", "col_value":total_pivot_strip}]
                        );

                        setVrFormItemDataEntryRowValues(
                            'vergola_system_link_bar', 
                            [{"form_item_name":"vr_item_data_entry_qty", "variable_name":"vr_item_qty", "col_value":total_link_bar}]
                        );
                        break;
                }
            }
        }
