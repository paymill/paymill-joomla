<?php
    defined( '_JEXEC' ) or die( 'Restricted access' );

    $db =& JFactory::getDBO();

    $q = "SELECT * FROM #__paymill_settings WHERE id = 1";
    $db->setQuery( $q );
    $settings = $db->loadAssoc();

    if($_GET["task"] == "saveKeys") {
        $q  = "UPDATE #__paymill_settings SET ";
        $q .= "mode = '" .$_GET["mode"]. "', ";
        $q .= "public_test = '" .$_GET["public_test"]. "', ";
        $q .= "private_test = '" .$_GET["private_test"]. "', ";
        $q .= "public_live = '" .$_GET["public_live"]. "', ";
        $q .= "private_live = '" .$_GET["private_live"]. "' ";
        $q .= "WHERE id = 1";

        $db->setQuery( $q );
        $db->query();
    }

    $document = &JFactory::getDocument();
    $document->addScript('components/com_paymill/js/jquery-1.9.1.min.js');
    $document->addScript('components/com_paymill/js/paymill.js');
?>

<script type="text/javascript">
    ROOT = '<?php echo JURI::root() ?>administrator/';
</script>

<h4>Create your payment on your website with PAYMILL</h4>
<p>Short manual:</p>
<ul>
    <li>Enter your PAYMILL Keys</li>
    <li>Create your menu item and choose "paymill"</li>
    <li>navigate to your payment method</li>
</ul>
<hr />
<form id="paymill-settings">
    <h2>Settings</h2>
    <h4>Mode</h4>
    <div style="width: 300px; float: left; padding: 3px">
        Activated Mode
    </div>
    <div style="width: 300px; float: left; padding: 3px">
        <select style="width: 300px" name="mode">
            <option value="0" <?php if($settings['mode'] == 0) {echo 'selected';} ?>>Test-Mode</option>
            <option value="1" <?php if($settings['mode'] == 1) {echo 'selected';} ?>>Live-Mode</option>
        </select>
    </div>
    <div style="clear: both"></div>
    <h4>PAYMILL Test-Keys</h4>
    <div style="width: 300px; float: left; padding: 3px">
        Public Testkey
    </div>
    <div style="width: 300px; float: left; padding: 3px">
        <input style="width: 300px" type="text" name="public_test" value ="<?php echo $settings['public_test'] ?>" />
    </div>
    <div style="clear: both"></div>
    <div style="width: 300px; float: left; padding: 3px">
        Private Testkey
    </div>
    <div style="width: 300px; float: left; padding: 3px">
        <input style="width: 300px" type="text" name="private_test" value ="<?php echo $settings['private_test'] ?>" />
    </div>
    <div style="clear: both"></div>
    <h4>PAYMILL Live-Keys</h4>
    <div style="width: 300px; float: left; padding: 3px">
        Public Livekey
    </div>
    <div style="width: 300px; float: left; padding: 3px">
        <input style="width: 300px" type="text" name="public_live" value ="<?php echo $settings['public_live'] ?>" />
    </div>
    <div style="clear: both"></div>
    <div style="width: 300px; float: left; padding: 3px">
        Private Livekey
    </div>
    <div style="width: 300px; float: left; padding: 3px">
        <input style="width: 300px" type="text" name="private_live" value ="<?php echo $settings['private_live'] ?>" />
    </div>
    <div style="clear: both"></div>
    <div style="width: 300px; float: left; padding: 3px">
        &nbsp;
    </div>
    <div style="width: 300px; float: left; padding: 3px; text-align: right">
        <button class="submit-button" type="submit">Save</button>
    </div>
    <div style="clear: both"></div>
    <input type="hidden" name="option" value="com_paymill" />
    <input type="hidden" name="task" value="saveKeys" />
</form>