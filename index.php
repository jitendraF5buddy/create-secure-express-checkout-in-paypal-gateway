<?php 
if(isset($_POST['paynow']) && $_POST['paynow']=="paynow"){

			$paypal_business_email = "jitupatel7687@gmail.com";
			$custom_id = "5"; 
			
			//below details is item name,item amount and quantity. you can manage from database 
			$itemname = "Mobile";	
			$item_qty = 5;	
			$item_amount = 5000;

			$querystring = '';
			$querystring .= "?business=".urlencode($paypal_business_email)."&";

			$querystring .= "custom=".urlencode($custom_id).'&';
			$querystring .= "currency_code=".urlencode('GBP')."&";
			$querystring .= "item_name_1=".urlencode($itemname)."&";
			$querystring .= "item_number_1=".urlencode($item_qty)."&";
			$querystring .= "amount_1=".urlencode($item_amount)."&";
			foreach($_POST as $key => $value){
				$value = urlencode(stripslashes($value));
				$querystring .= "$key=$value&";
			}
			header('location:https://www.sandbox.paypal.com/cgi-bin/webscr'.$querystring);
			exit();
	
}
?>

			<form action="" method="POST" id="paynow">
              <input type="hidden" name="cmd" value="_cart">
              <input type="hidden" name="upload" value="1">
             <!--name="rm"  This is use for retrun data from payapal when payment has completed -->
              <input type="hidden" name="rm" value="2">

              <input type="hidden" name="return" value="<?php echo base_url();?>recruiter_dashboard/adverdpayment/success">
              <input type="hidden" name="cancel_return" value="<?php echo base_url();?>recruiter_dashboard/adverdpayment/cancel">
              <input type="hidden" name="notify_url" value="<?php echo base_url();?>recruiter_dashboard/adverdpayment/cancel"/>
              <input type="hidden" name="paynow" value="paynow">
            </form>
            <script type="text/javascript">
            $(document).ready(function(){
              $("#paynow").submit();
            });
            </script>	