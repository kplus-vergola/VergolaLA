<?php
$config_custom = array(
    'user_groups' => array(
        '10' => 'System Admin', /* Victoria Admin */
        '29' => 'Accounts', /* Victoria Account User */
        '26' => 'Operation Manager', /* Victoria Operation Manager */
        '30' => 'Site Manager', /* Victoria Site Manager */
        '28' => 'Reception', /* Victoria Reception User */
        '27' => 'Sales Manager', /* Victoria Sales Manager */
        '9' => 'Sales Consultant', /* Victoria Users */
    ), 
    'user_access_profiles' => array(
        /* ===== ===== ===== ===== ===== */
        /* begin Victoria Admin */
        /* ===== ===== ===== ===== ===== */
        '10' => array(
            'client-folder-vic' => array(
                'tab client details' => array('edit' => true), 
                'tab costing info' => array('add new costing' => true, 'view costing' => true, 'view contract' => true), 
                'tab follow up' => array(
                    'not interested' => true, 'costed' => true, 'quoted' => true, 'under consideration' => true, 
                    'future project' => true, 'won' => true, 'lost' => true, 
                    'create contract' => true
                ), 
                'tab sales' => array('save' => true, 'delete' => true), 
                'tab correspondence' => array('save' => true, 'delete' => true), 
                'tab statutory' => array('save' => true, 'delete' => true), 
                'tab photos' => array('save' => true, 'delete' => true), 
                'tab drawings' => array('save' => true, 'delete' => true), 
                'tab general' => array('save' => true, 'delete' => true), 
                'record action' => array('save' => true, 'delete' => true)
            ), 
            'builder-folder-vic' => array(
                'tab client details' => array('edit' => true), 
                'tab costing info' => array('add new costing' => true, 'view costing' => true, 'view contract' => true), 
                'tab follow up' => array(
                    'not interested' => true, 'costed' => true, 'quoted' => true, 'under consideration' => true, 
                    'future project' => true, 'won' => true, 'lost' => true, 
                    'create contract' => true
                ), 
                'tab sales' => array('save' => true, 'delete' => true), 
                'tab correspondence' => array('save' => true, 'delete' => true), 
                'tab statutory' => array('save' => true, 'delete' => true), 
                'tab photos' => array('save' => true, 'delete' => true), 
                'tab drawings' => array('save' => true, 'delete' => true), 
                'tab general' => array('save' => true, 'delete' => true), 
                'record action' => array('save' => true, 'delete' => true)
            ), 
            'tender-folder-vic' => array(
                'tab costing info' => array('add new costing' => true, 'view costing' => true, 'view contract' => true), 
                'tab enquiry tracker' => array('send mail' => true), 
                'tab follow up' => array(
                    'not interested' => true, 'costed' => true, 'quoted' => true, 'under consideration' => true, 
                    'future project' => true, 'won' => true, 'lost' => true, 
                    'create contract' => true
                ), 
                'tab sales' => array('save' => true, 'delete' => true), 
                'tab correspondence' => array('save' => true, 'delete' => true), 
                'tab statutory' => array('save' => true, 'delete' => true), 
                'tab photos' => array('save' => true, 'delete' => true), 
                'tab drawings' => array('save' => true, 'delete' => true), 
                'tab general' => array('save' => true, 'delete' => true), 
                'record action' => array('save' => true, 'delete' => true)
            ), 
            'add-quote-vic' => array(
                'record action' => array('save' => true, 'delete' => true)
            ), 
            'add-quote-vic > quote_edit' => array(
                'record action' => array('save' => true, 'delete' => true)
            ), 
            'contract-folder-vic' => array(
                'tab client details' => array('edit' => true), 
                'tab bill of materials' => array('show' => true), 
                'tab purchase order' => array('show' => true), 
                'tab po summary' => array('show' => true), 
                'tab check list' => array('show' => true), 
                'tab sales' => array('save' => true, 'delete' => true), 
                'tab correspondence' => array('save' => true, 'delete' => true), 
                'tab statutory' => array('save' => true, 'delete' => true), 
                'tab photos' => array('save' => true, 'delete' => true), 
                'tab drawings' => array('save' => true, 'delete' => true), 
                'tab general' => array('save' => true, 'delete' => true), 
                'record action' => array('update' => true, 'cancel contract' => true)
            ), 
            'add-quote-vic > contract_bom' => array(
                'record action' => array('remove' => true, 'save' => true, 'process order' => true)
            ), 
            'contract-po-vic' => array(
                'record action' => array('cancel po' => true, 'save and process po' => true)
            )
        ), 
        /* end Victoria Admin */


        /* ===== ===== ===== ===== ===== */
        /* begin Victoria Account User */
        /* ===== ===== ===== ===== ===== */
        '29' => array(
            'client-folder-vic' => array(
                'tab client details' => array('edit' => false), 
                'tab costing info' => array('add new costing' => false, 'view costing' => true, 'view contract' => true), 
                'tab follow up' => array(
                    'not interested' => false, 'costed' => false, 'quoted' => false, 'under consideration' => false, 
                    'future project' => false, 'won' => false, 'lost' => false, 
                    'create contract' => true
                ), 
                'tab sales' => array('save' => false, 'delete' => false), 
                'tab correspondence' => array('save' => false, 'delete' => false), 
                'tab statutory' => array('save' => false, 'delete' => false), 
                'tab photos' => array('save' => false, 'delete' => false), 
                'tab drawings' => array('save' => false, 'delete' => false), 
                'tab general' => array('save' => false, 'delete' => false), 
                'record action' => array('save' => false, 'delete' => false)
            ), 
            'builder-folder-vic' => array(
                'tab client details' => array('edit' => false), 
                'tab costing info' => array('add new costing' => false, 'view costing' => true, 'view contract' => true), 
                'tab follow up' => array(
                    'not interested' => false, 'costed' => false, 'quoted' => false, 'under consideration' => false, 
                    'future project' => false, 'won' => false, 'lost' => false, 
                    'create contract' => true
                ), 
                'tab sales' => array('save' => false, 'delete' => false), 
                'tab correspondence' => array('save' => false, 'delete' => false), 
                'tab statutory' => array('save' => false, 'delete' => false), 
                'tab photos' => array('save' => false, 'delete' => false), 
                'tab drawings' => array('save' => false, 'delete' => false), 
                'tab general' => array('save' => false, 'delete' => false), 
                'record action' => array('save' => false, 'delete' => false)
            ), 
            'tender-folder-vic' => array(
                'tab costing info' => array('add new costing' => false, 'view costing' => true, 'view contract' => true), 
                'tab enquiry tracker' => array('send mail' => false), 
                'tab follow up' => array(
                    'not interested' => false, 'costed' => false, 'quoted' => false, 'under consideration' => false, 
                    'future project' => false, 'won' => false, 'lost' => false, 
                    'create contract' => true
                ), 
                'tab sales' => array('save' => false, 'delete' => false), 
                'tab correspondence' => array('save' => false, 'delete' => false), 
                'tab statutory' => array('save' => false, 'delete' => false), 
                'tab photos' => array('save' => false, 'delete' => false), 
                'tab drawings' => array('save' => false, 'delete' => false), 
                'tab general' => array('save' => false, 'delete' => false), 
                'record action' => array('save' => false, 'delete' => false)
            ), 
            'add-quote-vic' => array(
                'record action' => array('save' => false, 'delete' => false)
            ), 
            'add-quote-vic > quote_edit' => array(
                'record action' => array('save' => false, 'delete' => false)
            ), 
            'contract-folder-vic' => array(
                'tab client details' => array('edit' => true), 
                'tab bill of materials' => array('show' => true), 
                'tab purchase order' => array('show' => true), 
                'tab po summary' => array('show' => true), 
                'tab check list' => array('show' => true), 
                'tab sales' => array('save' => true, 'delete' => true), 
                'tab correspondence' => array('save' => true, 'delete' => true), 
                'tab statutory' => array('save' => true, 'delete' => true), 
                'tab photos' => array('save' => true, 'delete' => true), 
                'tab drawings' => array('save' => true, 'delete' => true), 
                'tab general' => array('save' => true, 'delete' => true), 
                'record action' => array('update' => true, 'cancel contract' => true)
            ), 
            'add-quote-vic > contract_bom' => array(
                'record action' => array('remove' => true, 'save' => true, 'process order' => true)
            ), 
            'contract-po-vic' => array(
                'record action' => array('cancel po' => true, 'save and process po' => true)
            )
        ), 
        /* end Victoria Account User */


        /* ===== ===== ===== ===== ===== */
        /* begin Victoria Operation Manager */
        /* ===== ===== ===== ===== ===== */
        '26' => array(
            'client-folder-vic' => array(
                'tab client details' => array('edit' => false), 
                'tab costing info' => array('add new costing' => false, 'view costing' => true, 'view contract' => true), 
                'tab follow up' => array(
                    'not interested' => false, 'costed' => false, 'quoted' => false, 'under consideration' => false, 
                    'future project' => false, 'won' => false, 'lost' => false, 
                    'create contract' => true
                ), 
                'tab sales' => array('save' => false, 'delete' => false), 
                'tab correspondence' => array('save' => false, 'delete' => false), 
                'tab statutory' => array('save' => false, 'delete' => false), 
                'tab photos' => array('save' => false, 'delete' => false), 
                'tab drawings' => array('save' => false, 'delete' => false), 
                'tab general' => array('save' => false, 'delete' => false), 
                'record action' => array('save' => false, 'delete' => false)
            ), 
            'builder-folder-vic' => array(
                'tab client details' => array('edit' => false), 
                'tab costing info' => array('add new costing' => false, 'view costing' => true, 'view contract' => true), 
                'tab follow up' => array(
                    'not interested' => false, 'costed' => false, 'quoted' => false, 'under consideration' => false, 
                    'future project' => false, 'won' => false, 'lost' => false, 
                    'create contract' => true
                ), 
                'tab sales' => array('save' => false, 'delete' => false), 
                'tab correspondence' => array('save' => false, 'delete' => false), 
                'tab statutory' => array('save' => false, 'delete' => false), 
                'tab photos' => array('save' => false, 'delete' => false), 
                'tab drawings' => array('save' => false, 'delete' => false), 
                'tab general' => array('save' => false, 'delete' => false), 
                'record action' => array('save' => false, 'delete' => false)
            ), 
            'tender-folder-vic' => array(
                'tab costing info' => array('add new costing' => false, 'view costing' => true, 'view contract' => true), 
                'tab enquiry tracker' => array('send mail' => false), 
                'tab follow up' => array(
                    'not interested' => false, 'costed' => false, 'quoted' => false, 'under consideration' => false, 
                    'future project' => false, 'won' => false, 'lost' => false, 
                    'create contract' => true
                ), 
                'tab sales' => array('save' => false, 'delete' => false), 
                'tab correspondence' => array('save' => false, 'delete' => false), 
                'tab statutory' => array('save' => false, 'delete' => false), 
                'tab photos' => array('save' => false, 'delete' => false), 
                'tab drawings' => array('save' => false, 'delete' => false), 
                'tab general' => array('save' => false, 'delete' => false), 
                'record action' => array('save' => false, 'delete' => false)
            ), 
            'add-quote-vic' => array(
                'record action' => array('save' => false, 'delete' => false)
            ), 
            'add-quote-vic > quote_edit' => array(
                'record action' => array('save' => false, 'delete' => false)
            ), 
            'contract-folder-vic' => array(
                'tab client details' => array('edit' => true), 
                'tab bill of materials' => array('show' => true), 
                'tab purchase order' => array('show' => true), 
                'tab po summary' => array('show' => true), 
                'tab check list' => array('show' => true), 
                'tab sales' => array('save' => true, 'delete' => true), 
                'tab correspondence' => array('save' => true, 'delete' => true), 
                'tab statutory' => array('save' => true, 'delete' => true), 
                'tab photos' => array('save' => true, 'delete' => true), 
                'tab drawings' => array('save' => true, 'delete' => true), 
                'tab general' => array('save' => true, 'delete' => true), 
                'record action' => array('update' => true, 'cancel contract' => true)
            ), 
            'add-quote-vic > contract_bom' => array(
                'record action' => array('remove' => true, 'save' => true, 'process order' => true)
            ), 
            'contract-po-vic' => array(
                'record action' => array('cancel po' => true, 'save and process po' => true)
            )
        ), 
        /* end Victoria Operation Manager */


        /* ===== ===== ===== ===== ===== */
        /* begin Victoria Site Manager */
        /* ===== ===== ===== ===== ===== */
        '30' => array(
            'client-folder-vic' => array(
                'tab client details' => array('edit' => false), 
                'tab costing info' => array('add new costing' => false, 'view costing' => false, 'view contract' => false), 
                'tab follow up' => array(
                    'not interested' => false, 'costed' => false, 'quoted' => false, 'under consideration' => false, 
                    'future project' => false, 'won' => false, 'lost' => false, 
                    'create contract' => false
                ), 
                'tab sales' => array('save' => false, 'delete' => false), 
                'tab correspondence' => array('save' => false, 'delete' => false), 
                'tab statutory' => array('save' => false, 'delete' => false), 
                'tab photos' => array('save' => false, 'delete' => false), 
                'tab drawings' => array('save' => false, 'delete' => false), 
                'tab general' => array('save' => false, 'delete' => false), 
                'record action' => array('save' => false, 'delete' => false)
            ), 
            'builder-folder-vic' => array(
                'tab client details' => array('edit' => false), 
                'tab costing info' => array('add new costing' => false, 'view costing' => false, 'view contract' => false), 
                'tab follow up' => array(
                    'not interested' => false, 'costed' => false, 'quoted' => false, 'under consideration' => false, 
                    'future project' => false, 'won' => false, 'lost' => false, 
                    'create contract' => false
                ), 
                'tab sales' => array('save' => false, 'delete' => false), 
                'tab correspondence' => array('save' => false, 'delete' => false), 
                'tab statutory' => array('save' => false, 'delete' => false), 
                'tab photos' => array('save' => false, 'delete' => false), 
                'tab drawings' => array('save' => false, 'delete' => false), 
                'tab general' => array('save' => false, 'delete' => false), 
                'record action' => array('save' => false, 'delete' => false)
            ), 
            'tender-folder-vic' => array(
                'tab costing info' => array('add new costing' => false, 'view costing' => false, 'view contract' => false), 
                'tab enquiry tracker' => array('send mail' => false), 
                'tab follow up' => array(
                    'not interested' => false, 'costed' => false, 'quoted' => false, 'under consideration' => false, 
                    'future project' => false, 'won' => false, 'lost' => false, 
                    'create contract' => false
                ), 
                'tab sales' => array('save' => false, 'delete' => false), 
                'tab correspondence' => array('save' => false, 'delete' => false), 
                'tab statutory' => array('save' => false, 'delete' => false), 
                'tab photos' => array('save' => false, 'delete' => false), 
                'tab drawings' => array('save' => false, 'delete' => false), 
                'tab general' => array('save' => false, 'delete' => false), 
                'record action' => array('save' => false, 'delete' => false)
            ), 
            'add-quote-vic' => array(
                'record action' => array('save' => false, 'delete' => false)
            ), 
            'add-quote-vic > quote_edit' => array(
                'record action' => array('save' => false, 'delete' => false)
            ), 
            'contract-folder-vic' => array(
                'tab client details' => array('edit' => false), 
                'tab bill of materials' => array('show' => true), 
                'tab purchase order' => array('show' => true), 
                'tab po summary' => array('show' => true), 
                'tab check list' => array('show' => true), 
                'tab sales' => array('save' => false, 'delete' => false), 
                'tab correspondence' => array('save' => false, 'delete' => false), 
                'tab statutory' => array('save' => false, 'delete' => false), 
                'tab photos' => array('save' => false, 'delete' => false), 
                'tab drawings' => array('save' => false, 'delete' => false), 
                'tab general' => array('save' => false, 'delete' => false), 
                'record action' => array('update' => false, 'cancel contract' => false)
            ), 
            'add-quote-vic > contract_bom' => array(
                'record action' => array('remove' => false, 'save' => false, 'process order' => false)
            ), 
            'contract-po-vic' => array(
                'record action' => array('cancel po' => false, 'save and process po' => false)
            )
        ), 
        /* end Victoria Site Manager */


        /* ===== ===== ===== ===== ===== */
        /* begin Victoria Reception User */
        /* ===== ===== ===== ===== ===== */
        '28' => array(
            'client-folder-vic' => array(
                'tab client details' => array('edit' => true), 
                'tab costing info' => array('add new costing' => true, 'view costing' => true, 'view contract' => true), 
                'tab follow up' => array(
                    'not interested' => true, 'costed' => true, 'quoted' => true, 'under consideration' => true, 
                    'future project' => true, 'won' => true, 'lost' => true, 
                    'create contract' => true
                ), 
                'tab sales' => array('save' => true, 'delete' => true), 
                'tab correspondence' => array('save' => true, 'delete' => true), 
                'tab statutory' => array('save' => true, 'delete' => true), 
                'tab photos' => array('save' => true, 'delete' => true), 
                'tab drawings' => array('save' => true, 'delete' => true), 
                'tab general' => array('save' => true, 'delete' => true), 
                'record action' => array('save' => true, 'delete' => true)
            ), 
            'builder-folder-vic' => array(
                'tab client details' => array('edit' => true), 
                'tab costing info' => array('add new costing' => true, 'view costing' => true, 'view contract' => true), 
                'tab follow up' => array(
                    'not interested' => true, 'costed' => true, 'quoted' => true, 'under consideration' => true, 
                    'future project' => true, 'won' => true, 'lost' => true, 
                    'create contract' => true
                ), 
                'tab sales' => array('save' => true, 'delete' => true), 
                'tab correspondence' => array('save' => true, 'delete' => true), 
                'tab statutory' => array('save' => true, 'delete' => true), 
                'tab photos' => array('save' => true, 'delete' => true), 
                'tab drawings' => array('save' => true, 'delete' => true), 
                'tab general' => array('save' => true, 'delete' => true), 
                'record action' => array('save' => true, 'delete' => true)
            ), 
            'tender-folder-vic' => array(
                'tab costing info' => array('add new costing' => true, 'view costing' => true, 'view contract' => true), 
                'tab enquiry tracker' => array('send mail' => true), 
                'tab follow up' => array(
                    'not interested' => true, 'costed' => true, 'quoted' => true, 'under consideration' => true, 
                    'future project' => true, 'won' => true, 'lost' => true, 
                    'create contract' => true
                ), 
                'tab sales' => array('save' => true, 'delete' => true), 
                'tab correspondence' => array('save' => true, 'delete' => true), 
                'tab statutory' => array('save' => true, 'delete' => true), 
                'tab photos' => array('save' => true, 'delete' => true), 
                'tab drawings' => array('save' => true, 'delete' => true), 
                'tab general' => array('save' => true, 'delete' => true), 
                'record action' => array('save' => true, 'delete' => true)
            ), 
            'add-quote-vic' => array(
                'record action' => array('save' => true, 'delete' => true)
            ), 
            'add-quote-vic > quote_edit' => array(
                'record action' => array('save' => true, 'delete' => true)
            ), 
            'contract-folder-vic' => array(
                'tab client details' => array('edit' => false), 
                'tab bill of materials' => array('show' => true), 
                'tab purchase order' => array('show' => true), 
                'tab po summary' => array('show' => true), 
                'tab check list' => array('show' => true), 
                'tab sales' => array('save' => true, 'delete' => true), 
                'tab correspondence' => array('save' => true, 'delete' => true), 
                'tab statutory' => array('save' => true, 'delete' => true), 
                'tab photos' => array('save' => true, 'delete' => true), 
                'tab drawings' => array('save' => true, 'delete' => true), 
                'tab general' => array('save' => true, 'delete' => true), 
                'record action' => array('update' => false, 'cancel contract' => false)
            ), 
            'add-quote-vic > contract_bom' => array(
                'record action' => array('remove' => false, 'save' => false, 'process order' => false)
            ), 
            'contract-po-vic' => array(
                'record action' => array('cancel po' => false, 'save and process po' => false)
            )
        ), 
        /* end Victoria Reception User */


        /* ===== ===== ===== ===== ===== */
        /* begin Victoria Sales Manager */
        /* ===== ===== ===== ===== ===== */
        '27' => array(
            'client-folder-vic' => array(
                'tab client details' => array('edit' => true), 
                'tab costing info' => array('add new costing' => true, 'view costing' => true, 'view contract' => true), 
                'tab follow up' => array(
                    'not interested' => true, 'costed' => true, 'quoted' => true, 'under consideration' => true, 
                    'future project' => true, 'won' => true, 'lost' => true, 
                    'create contract' => true
                ), 
                'tab sales' => array('save' => true, 'delete' => true), 
                'tab correspondence' => array('save' => true, 'delete' => true), 
                'tab statutory' => array('save' => true, 'delete' => true), 
                'tab photos' => array('save' => true, 'delete' => true), 
                'tab drawings' => array('save' => true, 'delete' => true), 
                'tab general' => array('save' => true, 'delete' => true), 
                'record action' => array('save' => true, 'delete' => true)
            ), 
            'builder-folder-vic' => array(
                'tab client details' => array('edit' => true), 
                'tab costing info' => array('add new costing' => true, 'view costing' => true, 'view contract' => true), 
                'tab follow up' => array(
                    'not interested' => true, 'costed' => true, 'quoted' => true, 'under consideration' => true, 
                    'future project' => true, 'won' => true, 'lost' => true, 
                    'create contract' => true
                ), 
                'tab sales' => array('save' => true, 'delete' => true), 
                'tab correspondence' => array('save' => true, 'delete' => true), 
                'tab statutory' => array('save' => true, 'delete' => true), 
                'tab photos' => array('save' => true, 'delete' => true), 
                'tab drawings' => array('save' => true, 'delete' => true), 
                'tab general' => array('save' => true, 'delete' => true), 
                'record action' => array('save' => true, 'delete' => true)
            ), 
            'tender-folder-vic' => array(
                'tab costing info' => array('add new costing' => true, 'view costing' => true, 'view contract' => true), 
                'tab enquiry tracker' => array('send mail' => true), 
                'tab follow up' => array(
                    'not interested' => true, 'costed' => true, 'quoted' => true, 'under consideration' => true, 
                    'future project' => true, 'won' => true, 'lost' => true, 
                    'create contract' => true
                ), 
                'tab sales' => array('save' => true, 'delete' => true), 
                'tab correspondence' => array('save' => true, 'delete' => true), 
                'tab statutory' => array('save' => true, 'delete' => true), 
                'tab photos' => array('save' => true, 'delete' => true), 
                'tab drawings' => array('save' => true, 'delete' => true), 
                'tab general' => array('save' => true, 'delete' => true), 
                'record action' => array('save' => true, 'delete' => true)
            ), 
            'add-quote-vic' => array(
                'record action' => array('save' => true, 'delete' => true)
            ), 
            'add-quote-vic > quote_edit' => array(
                'record action' => array('save' => true, 'delete' => true)
            ), 
            'contract-folder-vic' => array(
                'tab client details' => array('edit' => false), 
                'tab bill of materials' => array('show' => true), 
                'tab purchase order' => array('show' => true), 
                'tab po summary' => array('show' => true), 
                'tab check list' => array('show' => true), 
                'tab sales' => array('save' => false, 'delete' => false), 
                'tab correspondence' => array('save' => false, 'delete' => false), 
                'tab statutory' => array('save' => false, 'delete' => false), 
                'tab photos' => array('save' => false, 'delete' => false), 
                'tab drawings' => array('save' => false, 'delete' => false), 
                'tab general' => array('save' => false, 'delete' => false), 
                'record action' => array('update' => false, 'cancel contract' => false)
            ), 
            'add-quote-vic > contract_bom' => array(
                'record action' => array('remove' => false, 'save' => false, 'process order' => false)
            ), 
            'contract-po-vic' => array(
                'record action' => array('cancel po' => false, 'save and process po' => false)
            )
        ), 
        /* end Victoria Sales Manager */


        /* ===== ===== ===== ===== ===== */
        /* begin Victoria Users */
        /* ===== ===== ===== ===== ===== */
        '9' => array(
            'client-folder-vic' => array(
                'tab client details' => array('edit' => true), 
                'tab costing info' => array('add new costing' => true, 'view costing' => true, 'view contract' => true), 
                'tab follow up' => array(
                    'not interested' => true, 'costed' => true, 'quoted' => true, 'under consideration' => true, 
                    'future project' => true, 'won' => true, 'lost' => true, 
                    'create contract' => true
                ), 
                'tab sales' => array('save' => true, 'delete' => true), 
                'tab correspondence' => array('save' => true, 'delete' => true), 
                'tab statutory' => array('save' => true, 'delete' => true), 
                'tab photos' => array('save' => true, 'delete' => true), 
                'tab drawings' => array('save' => true, 'delete' => true), 
                'tab general' => array('save' => true, 'delete' => true), 
                'record action' => array('save' => true, 'delete' => true)
            ), 
            'builder-folder-vic' => array(
                'tab client details' => array('edit' => true), 
                'tab costing info' => array('add new costing' => true, 'view costing' => true, 'view contract' => true), 
                'tab follow up' => array(
                    'not interested' => true, 'costed' => true, 'quoted' => true, 'under consideration' => true, 
                    'future project' => true, 'won' => true, 'lost' => true, 
                    'create contract' => true
                ), 
                'tab sales' => array('save' => true, 'delete' => true), 
                'tab correspondence' => array('save' => true, 'delete' => true), 
                'tab statutory' => array('save' => true, 'delete' => true), 
                'tab photos' => array('save' => true, 'delete' => true), 
                'tab drawings' => array('save' => true, 'delete' => true), 
                'tab general' => array('save' => true, 'delete' => true), 
                'record action' => array('save' => true, 'delete' => true)
            ), 
            'tender-folder-vic' => array(
                'tab costing info' => array('add new costing' => true, 'view costing' => true, 'view contract' => true), 
                'tab enquiry tracker' => array('send mail' => true), 
                'tab follow up' => array(
                    'not interested' => true, 'costed' => true, 'quoted' => true, 'under consideration' => true, 
                    'future project' => true, 'won' => true, 'lost' => true, 
                    'create contract' => true
                ), 
                'tab sales' => array('save' => true, 'delete' => true), 
                'tab correspondence' => array('save' => true, 'delete' => true), 
                'tab statutory' => array('save' => true, 'delete' => true), 
                'tab photos' => array('save' => true, 'delete' => true), 
                'tab drawings' => array('save' => true, 'delete' => true), 
                'tab general' => array('save' => true, 'delete' => true), 
                'record action' => array('save' => true, 'delete' => true)
            ), 
            'add-quote-vic' => array(
                'record action' => array('save' => true, 'delete' => true)
            ), 
            'add-quote-vic > quote_edit' => array(
                'record action' => array('save' => true, 'delete' => true)
            ), 
            'contract-folder-vic' => array(
                'tab client details' => array('edit' => false), 
                'tab bill of materials' => array('show' => false), 
                'tab purchase order' => array('show' => false), 
                'tab po summary' => array('show' => false), 
                'tab check list' => array('show' => false), 
                'tab sales' => array('save' => false, 'delete' => false), 
                'tab correspondence' => array('save' => false, 'delete' => false), 
                'tab statutory' => array('save' => false, 'delete' => false), 
                'tab photos' => array('save' => false, 'delete' => false), 
                'tab drawings' => array('save' => false, 'delete' => false), 
                'tab general' => array('save' => false, 'delete' => false), 
                'record action' => array('update' => false, 'cancel contract' => false)
            ), 
            'add-quote-vic > contract_bom' => array(
                'record action' => array('remove' => false, 'save' => false, 'process order' => false)
            ), 
            'contract-po-vic' => array(
                'record action' => array('cancel po' => false, 'save and process po' => false)
            )
        )
        /* end Victoria Users */
    )
);
?>