<?php
defined('_JEXEC') or die('Restrict access');

jimport('joomla.application.component.controller');

class PaymillController extends JController {
    function __construct () {
        parent::__construct();
    }

    function saveKeys() {
        $db =& JFactory::getDBO();

        $q  = "UPDATE #__paymill_settings SET ";
        $q .= "mode = '" .JRequest::getVar("mode"). "', ";
        $q .= "public_test = '" .JRequest::getVar("public_test"). "', ";
        $q .= "private_test = '" .JRequest::getVar("private_test"). "', ";
        $q .= "public_live = '" .JRequest::getVar("public_live"). "', ";
        $q .= "private_live = '" .JRequest::getVar("private_live"). "' ";
        $q .= "WHERE id = 1";

        $db->setQuery( $q );
        $db->query();
    }
}
?>