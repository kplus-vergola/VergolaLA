<?php
/**
* CHRONOFORMS version 4.0
* Copyright (c) 2006 - 2011 Chrono_Man, ChronoEngine.com. All rights reserved.
* Author: Chrono_Man (ChronoEngine.com)
* @license		GNU/GPL
* Visit http://www.ChronoEngine.com for regular updates and information.
**/
defined('_JEXEC') or die('Restricted access');
class CfactionAutoJavascriptValidationHelper{
	function loadAction($form, $actiondata){
		$params = new JParameter($actiondata->params);
		$output = '';
		$mainframe = JFactory::getApplication();
		$document = JFactory::getDocument();
		JHTML::_('behavior.mootools');
		$uri = JFactory::getURI();
		$document->addScript($uri->root().'administrator/components/com_chronoforms/form_actions/auto_javascript_validation/assets/auto_javascript_validation.js');
		$rules = array('required', 'alpha', 'alphanum', 'digit', 'nodigit', 'number', 'email', 'phone', 'phone_inter', 'url', 'image');
		$is_builder = 0;
		$request = parse_url($_SERVER['REQUEST_URI']);
		$page_name = substr($request["path"],1);
		if($page_name == "new-builder-enquiry-vic"){
			$is_builder = 1;
		}else if(isset($_REQUEST['client_type']) && $_REQUEST['client_type']=="b"){
			$is_builder = 1;
		}
		ob_start();
		?>
			window.addEvent('domready', function() {
				<?php
				$object_list = array();
				foreach($rules as $rule):
					$fields_list = array();
					if(trim($params->get($rule, ''))){
						$fields_list = explode(',', trim($params->get($rule, '')));
					}

					if($rule === 'required' && $is_builder){
						$fields_list = array_merge($fields_list, ['ssitename', 'sstreetno', 'sstreetname', 'site_suburb', 'site_state', 'site_postcode']);
					}

					foreach($fields_list as $k => $field){
						$fields_list[$k] = "'".$field."'";
					}
					$n_fields_list = implode(',', $fields_list);
					$object_list[] = "'".$rule."': [".$n_fields_list."]";
				endforeach;
				?>
				new AutoJavascriptValidation('<?php echo $form->form_name; ?>', <?php echo "{".implode(",", $object_list)."}"; ?>);
			});
		<?php
		$script = ob_get_clean();
		if((bool)$form->form_params->get('dynamic_files', 0) === false){
			$document->addScriptDeclaration("//<![CDATA["."\n".$script."\n"."//]]>");
		}else{
			//load the action class
			$form->loadActionHelper('load_js');
			$CfactionLoadJsHelper = new CfactionLoadJsHelper();
			$JSactiondata = new stdClass();
			$JSactiondata->content1 = $script;
			$JSParams = new JParameter('');
			$JSParams->set('dynamic_file', $form->form_params->get('dynamic_files', 0));
			$JSactiondata->params = $JSParams->toString();
			$CfactionLoadJsHelper->load($form, $JSactiondata);
		}		
		
		//load validation files
		$form->loadActionHelper('show_html');
		$CfactionShowHtmlHelper = new CfactionShowHtmlHelper();
		$CfactionShowHtmlHelper->_loadValidationScripts($form);
	}
	
}
?>