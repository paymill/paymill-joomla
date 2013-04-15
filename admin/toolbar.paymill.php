<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
require_once( JApplicationHelper::getPath( 'toolbar_html' ) );
switch($task)
{
    case 'edit':
    case 'add':
        TOOLBAR_paymill::_NEW();
        break;
    default:
        TOOLBAR_paymill::_DEFAULT();
        break;
}
?>