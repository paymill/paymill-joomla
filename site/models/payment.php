<?php
// Version 1.00
// Author: Paymill Gmbh - M. Kimmel, 2013

// no direct access
defined('_JEXEC') or die();

jimport('joomla.application.component.model');

class PaymillModelPayment extends JModel{

// --------------- OWN PROFILE ----------------------
    function getSettings() {
        $db =& JFactory::getDBO();

        $q = 'SELECT * FROM #__paymill_settings WHERE id = 1';
        $db->setQuery( $q );
        $settings = $db->loadAssoc();
        return $settings;
    }
}
?>