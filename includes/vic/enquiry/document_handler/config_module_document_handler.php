<script>
    var document_handler_form_entity_list = <?php echo $document_handler_form_entity_list; ?>;

    var document_handler_form_folder_data_entry = {
        "document_handler_form_folder_id":"",
        "document_handler_form_folder_name":"",
        "document_handler_form_folder_description":"",
        "document_handler_form_folder_summary":"",
        "document_handler_form_folder_entity_links":[]
    };

    var document_handler_form_file_data_entry = {
        "document_handler_form_file_id":"",
        "document_handler_form_file_name":"",
        "document_handler_form_file_description":"",
        "document_handler_form_file_summary":"",
        "document_handler_form_file_from":"",
        "document_handler_form_file_date_received":"",
        "document_handler_form_file_to":"",
        "document_handler_form_file_date_sent":"",
        "document_handler_form_file_content_date":"",
        "document_handler_form_file_content_category":"",
        "document_handler_form_file_original_name":"",
        "document_handler_form_file_extension":"",
        "document_handler_form_file_type":"",
        "document_handler_form_file_size":"",
        "document_handler_form_file_external_ref_name":"",
        "document_handler_form_file_folder_links":[]
    };

    var login_user_info = <?php echo $login_user_info_in_json; ?>;

    var document_handler_form_system_info = <?php echo $document_handler_form_system_info_in_json; ?>;

    var document_handler_form_selected_enquiry_user_info = {};

    var document_handler_form_enquiry_folder_list = [];

    var document_handler_form_folder_file_list = [];

    var default_entity_id = <?php echo $default_entity_id; ?>;

    var debug_mode_enabled = <?php echo $debug_mode_enabled; ?>;
</script>
