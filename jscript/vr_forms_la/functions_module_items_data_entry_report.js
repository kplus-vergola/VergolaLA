        function getReportFromVrFormIntroInfo() {
            var c1 = 0;
            var c2 = 0;
            var temp_text = '';
            var items_list_text = '';
            var template_vr_form_intro_info = '' + 
                '<table width="100%" border="0">' + 
                '    <tr>' + 
                '        <td colspan="4" align="center"><h3>Vergola System Costing Summary</h3></td>' + 
                '    </tr>' + 
                '    <tr>' + 
                '        <td colspan="4">[BLANK_SPACE]</td>' + 
                '    </tr>' + 
                '    <tr>' + 
                '        <td><b>Client Name</b></td>' + 
                '        <td><b>Client No</b></td>' + 
                '        <td><b>Consultant</b></td>' + 
                '        <td><b>Date Quoted</b></td>' + 
                '    </tr>' + 
                '    <tr>' + 
                '        <td>[VR_FORM_INTRO_CLIENT_NAME_AREA]</td>' + 
                '        <td>[VR_FORM_INTRO_CLIENT_NUMBER_AREA]</td>' + 
                '        <td>[VR_FORM_INTRO_CONSULTANT_AREA]</td>' + 
                '        <td>[VR_FORM_INTRO_DATE_QUOTED_AREA]</td>' + 
                '    </tr>' + 
                '</table>' + 
                '<br />';

            temp_text = replaceSubstringInText(
                [
                    '[VR_FORM_INTRO_CLIENT_NAME_AREA]', '[VR_FORM_INTRO_CLIENT_NUMBER_AREA]', 
                    '[VR_FORM_INTRO_CONSULTANT_AREA]', '[VR_FORM_INTRO_DATE_QUOTED_AREA]'
                ], 
                [
                    vr_form_system_info['client_name'], vr_form_system_info['quote_id'], 
                    vr_form_system_info['sales_rep_name'], vr_form_system_info['lodged_date']
                ], 
                template_vr_form_intro_info
            );
            items_list_text += temp_text;

            return items_list_text;
        }


        function getReportFromVrFormQueriesInfo() {
            var c1 = 0;
            var c2 = 0;
            var temp_text = '';
            var items_list_text = '';
            var template_vr_form_queries_info = '' + 
                '<table width="100%" border="0">' + 
                '    <tr>' + 
                '        <td><b>Framework Type</b></td>' + 
                '        <td><b>VR Type</b></td>' + 
                '        <td><b>Project Name</b></td>' + 
                '        <td><b>Default Colour</b></td>' + 
                '        [VR_RUN_FORM_QUERY_HEADER_AREA]' + 
                '        [VR_RISE_FORM_QUERY_HEADER_AREA]' + 
                '        [VR_LENGTH_FORM_QUERY_HEADER_AREA]' + 
                '        [VR_WIDTH_FORM_QUERY_HEADER_AREA]' + 
                '    </tr>' + 
                '    <tr>' + 
                '        <td>[VR_FRAMEWORK_TYPE_FORM_QUERY_AREA]</td>' + 
                '        <td>[VR_TYPE_FORM_QUERY_AREA]</td>' + 
                '        <td>[VR_PROJECT_NAME_FORM_QUERY_AREA]</td>' + 
                '        <td>[VR_DEFAULT_COLOUR_FORM_QUERY_AREA]</td>' + 
                '        [VR_RUN_FORM_QUERY_BODY_AREA]' + 
                '        [VR_RISE_FORM_QUERY_BODY_AREA]' + 
                '        [VR_LENGTH_FORM_QUERY_BODY_AREA]' + 
                '        [VR_WIDTH_FORM_QUERY_BODY_AREA]' + 
                '    </tr>' + 
                '</table>' + 
                '<br />';
            var template_vr_length_form_query_header = '<td><b>Length [INDEX_NUMBER]</b></td>';
            var template_vr_width_form_query_header = '<td><b>Width</b></td>';
            var template_vr_run_form_query_header = '<td><b>Run</b></td>';
            var template_vr_rise_form_query_header = '<td><b>Rise</b></td>';
            var template_vr_length_form_query_body = '<td>[LENGTH_VALUE]</td>';
            var template_vr_width_form_query_body = '<td>[WIDTH_VALUE]</td>';
            var template_vr_run_form_query_body = '<td>[RUN_VALUE]</td>';
            var template_vr_rise_form_query_body = '<td>[RISE_VALUE]</td>';

            var vr_type_info = getVrTypeInfo();
            var vr_run_form_query_header_area = '';
            var vr_rise_form_query_header_area = '';
            var vr_length_form_query_header_area = '';
            var vr_width_form_query_header_area = '';
            var vr_framework_type_form_query_area = '';
            var vr_type_form_query_area = '';
            var vr_project_name_form_query_area = '';
            var vr_default_colour_form_query_area = '';
            var vr_run_form_query_body_area = '';
            var vr_rise_form_query_body_area = '';
            var vr_length_form_query_body_area = '';
            var vr_width_form_query_body_area = '';

            if (vr_type_info['bay_roof_shape'] == 'gable') {
                vr_run_form_query_header_area = template_vr_run_form_query_header;
                vr_rise_form_query_header_area = template_vr_rise_form_query_header;
            }
            for (c1 = 0; c1 < parseInt(vr_type_info['number_of_bay']); c1++) {
                temp_text = replaceSubstringInText(
                    ['[INDEX_NUMBER]'], 
                    [c1 + 1], 
                    template_vr_length_form_query_header
                );
                vr_length_form_query_header_area += temp_text;
            }
            vr_width_form_query_header_area = template_vr_width_form_query_header;
            if (document.getElementById('vr_type_form_query').value == 'null') {
                vr_width_form_query_header_area = '';
            }

            vr_framework_type_form_query_area = document.getElementById('vr_framework_type_form_query').options[document.getElementById('vr_framework_type_form_query').selectedIndex].text;
            vr_type_form_query_area = document.getElementById('vr_type_form_query').options[document.getElementById('vr_type_form_query').selectedIndex].text;
            vr_project_name_form_query_area = document.getElementById('vr_project_name_form_query').value;
            vr_default_colour_form_query_area = document.getElementById('vr_default_colour_form_query').options[document.getElementById('vr_default_colour_form_query').selectedIndex].text;

            if (vr_type_info['bay_roof_shape'] == 'gable') {
                temp_text = replaceSubstringInText(
                    ['[RUN_VALUE]'], 
                    [document.getElementById('vr_run_feet_form_query').value + '\' ' + document.getElementById('vr_run_inch_form_query').value + '"'], 
                    template_vr_run_form_query_body
                );
                vr_run_form_query_body_area = temp_text;
                if (document.getElementById('vr_type_form_query').value == 'null') {
                    vr_run_form_query_body_area = '';
                }

                temp_text = replaceSubstringInText(
                    ['[RISE_VALUE]'], 
                    [document.getElementById('vr_rise_feet_form_query').value + '\' ' + document.getElementById('vr_rise_inch_form_query').value + '"'], 
                    template_vr_rise_form_query_body
                );
                vr_rise_form_query_body_area = temp_text;
                if (document.getElementById('vr_type_form_query').value == 'null') {
                    vr_rise_form_query_body_area = '';
                }
            }
            for (c1 = 0; c1 < parseInt(vr_type_info['number_of_bay']); c1++) {
                temp_text = replaceSubstringInText(
                    ['[LENGTH_VALUE]'], 
                    [document.getElementById('vr_length_feet_form_query_' + c1).value + '\' ' + document.getElementById('vr_length_inch_form_query_' + c1).value + '"'], 
                    template_vr_length_form_query_body
                );
                vr_length_form_query_body_area += temp_text;
            }
            if (document.getElementById('vr_type_form_query').value == 'null') {
                vr_length_form_query_body_area = '';
            }

            if (document.getElementById('vr_width_feet_form_query') && 
                document.getElementById('vr_width_inch_form_query')) {
                temp_text = replaceSubstringInText(
                    ['[WIDTH_VALUE]'], 
                    [document.getElementById('vr_width_feet_form_query').value + '\' ' + document.getElementById('vr_width_inch_form_query').value + '"'], 
                    template_vr_width_form_query_body
                );
                vr_width_form_query_body_area = temp_text;
            }
            if (document.getElementById('vr_type_form_query').value == 'null') {
                vr_width_form_query_body_area = '';
            }

            temp_text = replaceSubstringInText(
                [
                    '[VR_RUN_FORM_QUERY_HEADER_AREA]', '[VR_RISE_FORM_QUERY_HEADER_AREA]', 
                    '[VR_LENGTH_FORM_QUERY_HEADER_AREA]', '[VR_WIDTH_FORM_QUERY_HEADER_AREA]', 
                    '[VR_FRAMEWORK_TYPE_FORM_QUERY_AREA]', '[VR_TYPE_FORM_QUERY_AREA]', 
                    '[VR_PROJECT_NAME_FORM_QUERY_AREA]', '[VR_DEFAULT_COLOUR_FORM_QUERY_AREA]', 
                    '[VR_RUN_FORM_QUERY_BODY_AREA]', '[VR_RISE_FORM_QUERY_BODY_AREA]', 
                    '[VR_LENGTH_FORM_QUERY_BODY_AREA]', '[VR_WIDTH_FORM_QUERY_BODY_AREA]'
                ], 
                [
                    vr_run_form_query_header_area, vr_rise_form_query_header_area, 
                    vr_length_form_query_header_area, vr_width_form_query_header_area, 
                    vr_framework_type_form_query_area, vr_type_form_query_area, 
                    vr_project_name_form_query_area, vr_default_colour_form_query_area, 
                    vr_run_form_query_body_area, vr_rise_form_query_body_area, 
                    vr_length_form_query_body_area, vr_width_form_query_body_area 
                ], 
                template_vr_form_queries_info
            );
            items_list_text += temp_text;

            return items_list_text;
        }


        function getReportFromVrFormBillingInfo() {
            var c1 = 0;
            var c2 = 0;
            var temp_text = '';
            var items_list_text = '';
            var template_vr_form_billing_info = '' + 
                '<table width="100%" border="0">' + 
                '    <tr>' + 
                '        <td align="left" valign="top">' + 
                '            <table class="vr_table_1" id="vr_form_commission_table">' + 
                '                <tr>' + 
                '                    <td colspan="3"><b>Commission</b></td>' + 
                '                </tr>' + 
                '                <tr>' + 
                '                    <td><u>Sales Commission</u></td>' + 
                '                    <td>$</td>' + 
                '                    <td><b>[VR_COMMISSION_SALES_COMMISSION_FORM_BILLING_AREA]</b></td>' + 
                '                </tr>' + 
                '                <tr>' + 
                '                    <td colspan="3">[BLANK_SPACE]</td>' + 
                '                </tr>' + 
                '                <tr>' + 
                '                    <td colspan="3"><b>Sales Commission Payment Schedule</b></td>' + 
                '                </tr>' + 
                '                <tr>' + 
                '                    <td>Pay 1</td>' + 
                '                    <td>$</td>' + 
                '                    <td>[VR_COMMISSION_PAY1_FORM_BILLING_AREA]</td>' + 
                '                </tr>' + 
                '                <tr>' + 
                '                    <td>Pay 2</td>' + 
                '                    <td>$</td>' + 
                '                    <td>[VR_COMMISSION_PAY2_FORM_BILLING_AREA]</td>' + 
                '                </tr>' + 
                '                <tr>' + 
                '                    <td>Final</td>' + 
                '                    <td>$</td>' + 
                '                    <td>[VR_COMMISSION_FINAL_FORM_BILLING_AREA]</td>' + 
                '                </tr>' + 
                '                <tr>' + 
                '                    <td><u>Installer Payment</u></td>' + 
                '                    <td>$</td>' + 
                '                    <td><b>[VR_COMMISSION_INSTALLER_PAYMENT_FORM_BILLING_AREA]</b></td>' + 
                '                </tr>' + 
                '            </table>' + 
                '        </td>' + 
                '        <td align="left" valign="top">' + 
                '            <table class="vr_table_1" id="vr_form_payment_table">' + 
                '                <tr>' + 
                '                    <td colspan="3"><b>Payment</b></td>' + 
                '                </tr>' + 
                '                <tr>' + 
                '                    <td>Deposit</td>' + 
                '                    <td>$</td>' + 
                '                    <td>[VR_PAYMENT_DEPOSIT_FORM_BILLING_AREA]</td>' + 
                '                </tr>' + 
                '                <tr>' + 
                '                    <td>Progress Payment</td>' + 
                '                    <td>$</td>' + 
                '                    <td>[VR_PAYMENT_PROGRESS_PAYMENT_FORM_BILLING_AREA]</td>' + 
                '                </tr>' + 
                '                <tr>' + 
                '                    <td>Final Payment</td>' + 
                '                    <td>$</td>' + 
                '                    <td>[VR_PAYMENT_FINAL_PAYMENT_FORM_BILLING_AREA]</td>' + 
                '                </tr>' + 
                '            </table>' + 
                '        </td>' + 
                '        <td align="left" valign="top">' + 
                '            <table class="vr_table_1" id="vr_form_payment_table">' + 
                '                <tr>' + 
                '                    <td colspan="3"><b>Total</b></td>' + 
                '                </tr>' + 
                '                <tr>' + 
                '                    <td>Vergola</td>' + 
                '                    <td>$</td>' + 
                '                    <td>[VR_PAYMENT_VERGOLA_FORM_BILLING_AREA]</td>' + 
                '                </tr>' + 
                '                <tr>' + 
                '                    <td>Disbursement Sub Total</td>' + 
                '                    <td>$</td>' + 
                '                    <td><u>[VR_PAYMENT_DISBURSEMENT_SUB_TOTAL_FORM_BILLING_AREA]</u></td>' + 
                '                </tr>' + 
                '                <tr>' + 
                '                    <td>Sub Total</td>' + 
                '                    <td>$</td>' + 
                '                    <td>[VR_PAYMENT_SUB_TOTAL_FORM_BILLING_AREA]</td>' + 
                '                </tr>' + 
                '                <tr>' + 
                '                    <td></td>' + 
                '                    <td>$</td>' + 
                '                    <td><u>[VR_PAYMENT_TAX_FORM_BILLING_AREA]</u></td>' + 
                '                </tr>' + 
                '                <tr>' + 
                '                    <td><u>Total</u></td>' + 
                '                    <td>$</td>' + 
                '                    <td><u>[VR_PAYMENT_TOTAL_FORM_BILLING_AREA]</u></td>' + 
                '                </tr>' + 
                '            </table>' + 
                '        </td>' + 
                '    </tr>' + 
                '</table>' + 
                '<br />';

            temp_text = replaceSubstringInText(
                [
                    '[VR_COMMISSION_SALES_COMMISSION_FORM_BILLING_AREA]', '[VR_COMMISSION_PAY1_FORM_BILLING_AREA]', 
                    '[VR_COMMISSION_PAY2_FORM_BILLING_AREA]', '[VR_COMMISSION_FINAL_FORM_BILLING_AREA]', 
                    '[VR_COMMISSION_INSTALLER_PAYMENT_FORM_BILLING_AREA]', 
                    '[VR_PAYMENT_DEPOSIT_FORM_BILLING_AREA]', '[VR_PAYMENT_PROGRESS_PAYMENT_FORM_BILLING_AREA]', 
                    '[VR_PAYMENT_FINAL_PAYMENT_FORM_BILLING_AREA]', 
                    '[VR_PAYMENT_VERGOLA_FORM_BILLING_AREA]', '[VR_PAYMENT_DISBURSEMENT_SUB_TOTAL_FORM_BILLING_AREA]', 
                    '[VR_PAYMENT_SUB_TOTAL_FORM_BILLING_AREA]', '[VR_PAYMENT_TAX_FORM_BILLING_AREA]', 
                    '[VR_PAYMENT_TOTAL_FORM_BILLING_AREA]'
                ], 
                [
                    vr_form_billing_info['vr_commission_sales_commission'], vr_form_billing_info['vr_commission_pay1'], 
                    vr_form_billing_info['vr_commission_pay2'], vr_form_billing_info['vr_commission_final'], 
                    vr_form_billing_info['vr_commission_installer_payment'], 
                    vr_form_billing_info['vr_payment_deposit'], vr_form_billing_info['vr_payment_progress_payment'], 
                    vr_form_billing_info['vr_payment_final_payment'], 
                    vr_form_billing_info['vr_payment_vergola'], vr_form_billing_info['vr_payment_disbursement_sub_total'], 
                    vr_form_billing_info['vr_payment_sub_total'], vr_form_billing_info['vr_payment_tax'], 
                    vr_form_billing_info['vr_payment_total']
                ], 
                template_vr_form_billing_info
            );
            items_list_text += temp_text;

            return items_list_text;
        }


        function getReportFromVrFormAllInfo() {
            var template_vr_form_all_info = '';

            template_vr_form_all_info += '<div style="font-family:Arial, Helvetica, sans-serif; width:700px;  font-size: 10pt;">';
            template_vr_form_all_info += getReportFromVrFormIntroInfo();
            template_vr_form_all_info += getReportFromVrFormQueriesInfo();
            template_vr_form_all_info += generateVrFormItemsDataEntry('report');
            template_vr_form_all_info += getReportFromVrFormBillingInfo();
            template_vr_form_all_info += '</div>';

            // document.getElementById('vr_form_log_area').style.display = 'block';
            document.getElementById('vr_form_log_area').innerHTML = template_vr_form_all_info;

            return template_vr_form_all_info;
        }
