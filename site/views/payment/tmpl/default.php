<?php
// Version 1.00
// Author: Paymill GmbH - M. Kimmel, 2013

// no direct access
defined('_JEXEC') or die('Restricted access');

if($this->settings["mode"] == 0) {
    $mode = 'public_test';
}
elseif($this->settings["mode"] == 1) {
    $mode = 'public_live';
}
else {
    $mode = 'public_test';
}
$key = $this->settings[$mode];
?>

<script type="text/javascript" src="components/com_paymill/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript">
	var PAYMILL_PUBLIC_KEY = '<?php echo $key ?>';
</script>
<script type="text/javascript" src="components/com_paymill/js/paymill.js"></script>
<script type="text/javascript" src="https://bridge.paymill.com"></script>

<link rel="stylesheet" href="components/com_paymill/css/paymill.css" type="text/css" />

<h2>Pay now</h2>

<div class="payment-errors"> </div>
<form id="payment-form">
	<div class="form-row">
		<div class="labeldiv"><label>Card number</label></div>
		<input class="card-number inputbox" type="text" size="20" placeholder="Creditcard number" />
	</div>
	<div class="form-row">
		<div class="labeldiv"><label>CVC</label></div>
		<input class="card-cvc inputbox" type="text" size="4" placeholder="CVC" />
	</div>
	<div class="form-row">
		<div class="labeldiv"><label>Name</label></div>
		<input class="card-holdername inputbox" name="name" type="text" size="20" placeholder="Name" />
	</div>
    <div class="form-row">
        <div class="labeldiv"><label>Description (optional)</label></div>
        <input class="card-holdername inputbox" name="description" type="text" size="20" placeholder="Description" />
    </div>
	<div class="form-row">
		<div class="labeldiv"><label>Expiry date (MM/YYYY)</label></div>
        <select class="card-expiry-month">
            <option value="01">01</option>
            <option value="02">02</option>
            <option value="03">03</option>
            <option value="04">04</option>
            <option value="05">05</option>
            <option value="06">06</option>
            <option value="07">07</option>
            <option value="08">08</option>
            <option value="09">09</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
        </select>
		<span> / </span>
        <select class="card-expiry-year">
            <option value="<?php echo date('Y') ?>"><?php echo date('Y') ?></option>
            <option value="<?php echo date('Y') +1 ?>"><?php echo date('Y') +1 ?></option>
            <option value="<?php echo date('Y') +2 ?>"><?php echo date('Y') +2 ?></option>
            <option value="<?php echo date('Y') +3 ?>"><?php echo date('Y') +3 ?></option>
            <option value="<?php echo date('Y') +4 ?>"><?php echo date('Y') +4 ?></option>
            <option value="<?php echo date('Y') +5 ?>"><?php echo date('Y') +5 ?></option>
            <option value="<?php echo date('Y') +6 ?>"><?php echo date('Y') +6 ?></option>
        </select>
	</div>
	<div class="form-row">
		<div class="labeldiv"><label>Amount</label></div>
		<input class="card-amount inputbox" name="amount" type="number" min="0" max="99999" step="0.01" placeholder="Amount" size="20" /> &euro;
	</div>
	<div class="form-row">
		<div class="labeldiv"><label>Currency</label></div>
		<select class="card-currency">
			<option value="EUR">EUR</option>
		</select>
	</div>
	<div class="form-row">
		<div class="labeldiv">&nbsp;</div>
		<button class="paymill-button submit-button" type="submit">Submit</button>
	</div>
</form>