<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
class TOOLBAR_paymill {
    function _NEW() {
        JToolBarHelper::save();
        JToolBarHelper::apply();
        JToolBarHelper::cancel();
    }
    function _DEFAULT() {
        JToolBarHelper::title( JText::_( 'PAYMILL Payment Administration' ),
                            'generic.png' );
        //JToolBarHelper::publishList();
        //JToolBarHelper::unpublishList();
        //JToolBarHelper::editList();
        //JToolBarHelper::deleteList();
        //JToolBarHelper::addNew();
    }
}
?>