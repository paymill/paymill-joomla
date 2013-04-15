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
        $q .= "mode = '" .$_POST["mode"]. "', ";
        $q .= "public_test = '" .$_POST["public_test"]. "', ";
        $q .= "private_test = '" .$_POST["private_test"]. "', ";
        $q .= "public_live = '" .$_POST["public_live"]. "', ";
        $q .= "private_live = '" .$_POST["private_live"]. "' ";
        $q .= "WHERE id = 1";

        $db->setQuery( $q );
        $db->query();
    }
?>