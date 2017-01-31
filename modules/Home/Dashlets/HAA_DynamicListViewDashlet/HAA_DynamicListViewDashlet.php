<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/Dashlets/Dashlet.php');


class HAA_DynamicListViewDashlet extends Dashlet {
    var $savedText; // users's saved text
    var $height = '200'; // height of the pad

    /**
     * Constructor
     *
     * @global string current language
     * @param guid $id id for the current dashlet (assigned from Home module)
     * @param array $def options saved for this dashlet
     */
    function __construct($id, $def) {
        $this->loadLanguage('HAA_DynamicListViewDashlet'); // load the language strings here

        if(!empty($def['savedText']))  // load default text is none is defined
            $this->savedText = $def['savedText'];
        else
            $this->savedText = $this->dashletStrings['LBL_DEFAULT_TEXT'];

        if(!empty($def['height'])) // set a default height if none is set
            $this->height = $def['height'];

        parent::__construct($id); // call parent constructor

        $this->isConfigurable = true; // dashlet is configurable
        $this->hasScript = true;  // dashlet has javascript attached to it

        // if no custom title, use default
        if(empty($def['title'])) $this->title = $this->dashletStrings['LBL_TITLE'];
        else $this->title = $def['title'];

        $this->seedBean = new HAA_ListViews();
//        $this->seedBean->module_name = "Home";  
    }

    /**
     * Displays the dashlet
     *
     * @return string html to display dashlet
     */
    function display() {

        global $current_user;

        $ss = new Sugar_Smarty();
        $ss->assign('savedText', SugarCleaner::cleanHtml($this->savedText));
        $ss->assign('saving', $this->dashletStrings['LBL_SAVING']);
        $ss->assign('saved', $this->dashletStrings['LBL_SAVED']);
        $ss->assign('id', $this->id);
        $ss->assign('height', $this->height);
  

echo "<script type='text/javascript' src='modules/HAA_ListViews/js/HAA_ListViews_popupview.js'></script>";
echo "<script>getDynamicListHtml('listview_".$this->id."','ACCTDASHLET','dashlet');</script>";

        $str = $ss->fetch('modules/Home/Dashlets/HAA_DynamicListViewDashlet/HAA_DynamicListViewDashlet.tpl');

        return parent::display($this->dashletStrings['LBL_DBLCLICK_HELP']) . $str . '<br />'; // return parent::display for title and such

    }

    /**
     * Displays the javascript for the dashlet
     *
     * @return string javascript to use with this dashlet
     */
    function displayScript() {
        $ss = new Sugar_Smarty();
        $ss->assign('saving', $this->dashletStrings['LBL_SAVING']);
        $ss->assign('saved', $this->dashletStrings['LBL_SAVED']);
        $ss->assign('id', $this->id);

        $str = $ss->fetch('modules/Home/Dashlets/HAA_DynamicListViewDashlet/HAA_DynamicListViewDashletScript.tpl');
        return $str; // return parent::display for title and such
    }

    /**
     * Displays the configuration form for the dashlet
     *
     * @return string html to display form
     */
    function displayOptions() {
        global $app_strings;

        $ss = new Sugar_Smarty();
        $ss->assign('titleLbl', $this->dashletStrings['LBL_CONFIGURE_TITLE']);
        $ss->assign('heightLbl', $this->dashletStrings['LBL_CONFIGURE_HEIGHT']);
        $ss->assign('saveLbl', $app_strings['LBL_SAVE_BUTTON_LABEL']);
        $ss->assign('clearLbl', $app_strings['LBL_CLEAR_BUTTON_LABEL']);
        $ss->assign('title', $this->title);
        $ss->assign('height', $this->height);
        $ss->assign('id', $this->id);

        return parent::displayOptions() . $ss->fetch('modules/Home/Dashlets/HAA_DynamicListViewDashlet/HAA_DynamicListViewDashletOptions.tpl');
    }

    /**
     * called to filter out $_REQUEST object when the user submits the configure dropdown
     *
     * @param array $req $_REQUEST
     * @return array filtered options to save
     */
    function saveOptions($req) {
        global $sugar_config, $timedate, $current_user, $theme;
        $options = array();
        $options['title'] = $_REQUEST['title'];
        if(is_numeric($_REQUEST['height'])) {
            if($_REQUEST['height'] > 0 && $_REQUEST['height'] <= 300) $options['height'] = $_REQUEST['height'];
            elseif($_REQUEST['height'] > 300) $options['height'] = '300';
            else $options['height'] = '100';
        }

        $options['savedText'] = $this->savedText;
        return $options;
    }

    /**
     * Used to save text on textarea blur. Accessed via Home/CallMethodDashlet.php
     * This is an example of how to to call a custom method via ajax
     */
    function saveText() {
        $json = getJSONobj();
    	if(isset($_REQUEST['savedText'])) {
            $optionsArray = $this->loadOptions();
            $optionsArray['savedText']=$json->decode(html_entity_decode($_REQUEST['savedText']));
            $optionsArray['savedText']=SugarCleaner::cleanHtml(nl2br($optionsArray['savedText']));
            $this->storeOptions($optionsArray);

        }
        else {
            $optionsArray['savedText'] = '';
        }
        echo 'result = ' . $json->encode(array('id' => $_REQUEST['id'],
                                       'savedText' => $optionsArray['savedText']));
    }


}
?>
