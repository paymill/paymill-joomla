<?php
// Version 1.00
// Author: Paymill Gmbh - M. Kimmel, 2013

// no direct access
defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.view');

class PaymillViewPayment extends JView
{
    function display($tpl = null) {
        $db =& JFactory::getDBO();

        $q = 'SELECT * FROM #__paymill_settings WHERE id = 1';
        $db->setQuery( $q );
        $settings = $db->loadAssoc();

        //$model = &$this->getModel();
        //$settings = $model->getSettings();

        $this->assignRef('settings', $settings);
        parent::display($tpl);
    }
}
?>
