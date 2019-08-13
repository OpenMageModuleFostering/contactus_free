<?php
$smtp='';		$port='';		$user='';
$pass='';		$smsg='';		$emsg='';
$pubkey='';		$prkey='';		$bcc='';
$autorply='';	$to_address='';	$captheme='';
$wrongcap='';	$subject='';
$from_address='';

class Company_Web_Block_Web extends Mage_Core_Block_Template
{
	public function _prepareLayout()
    {
		return parent::_prepareLayout();
    }
    public function getWeb()     
     { 
        if (!$this->hasData('web')) {
            $this->setData('web', Mage::registry('web'));
        }
        return $this->getData('web');     
    }
	
	public function getContent()
    {
	    $model = Mage::getModel('web/web')->load('web_id');
        $data = $model->getData();
        $collection = Mage::getModel('web/web')->getCollection();
		$keys = array_keys($collection->getFirstItem()->getData());
		
		foreach ($keys as $key)
		{ 														// loop through all the keys (fname, lname, email... 
			foreach ($collection as $obj)
			{													//loop throught each object 
				//print_r($obj->getData($key));					//get the value for a speficic key. 
				//echo "<br>";
				
			}
					
		}
			
		$smtp = $obj->getData('smtp_server');
		$port = $obj->getData('smtp_port');
		$user = $obj->getData('smtp_user');
		$pass = $obj->getData('smtp_pass');
		$smsg = $obj->getData('success_msg');
		$emsg = $obj->getData('err_msg');
		$pubkey = $obj->getData('pub_key');  
		$prkey = $obj->getData('pr_key');
		$bcc = $obj->getData('bcc_address');
		$subject = $obj->getData('email_sub');
		$autorply = $obj->getData('rply_address');
		$to_address = $obj->getData('to_address');
		$from_address = $obj->getData('from_address');
		$sur_val = $obj->getData('sur_val');
		$captheme = $obj->getData('recaptcha_theme');
		$wrongcap = $obj->getData('incorrect_captcha');
		//print_R($obj->getData('sur_val'));
		?>
		
		<link rel="stylesheet" type="text/css" href="js/pack/web.css">
		<div id="contact_form">
		<div id="response" ></div>
		
		<form action="<?php echo $this->getFormAction(); ?>" id="contactForm" method="post">
		<div class="field">
		<table id="front">
		<?php
		if($obj->getdata('name_val')==1)
		{?>
			
				<tr><td width="20%"><label for="fname" class="required"><em>*</em><?php echo Mage::helper('contacts')->__('First name') ?></label></td>
					<div class="input-box">
						<td><input name="fname" id="fname" maxlength="50" placeholder="Enter Your First Name" title="<?php echo Mage::helper('contacts')->__('First name')?>" value="<?php echo $this->escapeHtml($this->helper('contacts')->getUserName()) ?>" class="input-text required-entry" type="text" /></td></tr>	
					</div>
			</div>
			<tr><td></td><td><span id="err_name" style="display:none;color:red;"><?php echo $obj->getdata('name_err'); ?></span></td></tr>
				               
	<?php
		}
		else{?>
			<div class="field">
				<tr><td><label for="fname"><?php echo Mage::helper('contacts')->__('First Name') ?></label></td>
					<div class="input-box">
						<td><input name="fname" id="fname" maxlength="50" placeholder="Enter Your First Name" title="<?php echo Mage::helper('contacts')->__('First Name') ?>" value="<?php echo $this->escapeHtml($this->helper('contacts')->getUserName()) ?>" class="input-text" type="text" /></td></tr>	
					</div>
			</div>
		<tr><td></td><td><span id="err_name" style="display:none;color:red;"><?php echo $obj->getdata('name_err'); ?></span></td></tr>
	<?php   }
	
		if($obj->getdata('sur_val')==1)
		{?>
			<div class="field">
				<tr><td><label for="lname" class="required"><em>*</em><?php echo Mage::helper('contacts')->__('Last name') ?></label></td>
					<div class="input-box">
						<td><input name="lname" id="lname" maxlength="50" placeholder="Enter Your Last Name" title="<?php echo Mage::helper('contacts')->__('Last name') ?>" value="<?php echo $this->escapeHtml($this->helper('contacts')->getUserName()) ?>" class="input-text required-entry" type="text" /></td></tr>
					</div>
			</div>
			<tr><td></td><td><span id="err_sur" style="display:none;color:red;"><?php echo $obj->getdata('sur_err'); ?></span></td></tr>
						
	<?php	}
			else 
			{?>
				<div class="field">
					<tr><td><label for="lname"><?php echo Mage::helper('contacts')->__('Last name') ?></label></td>
						<div class="input-box">
							<td><input name="lname" id="lname" maxlength="50" placeholder="Enter Your Last Name" title="<?php echo Mage::helper('contacts')->__('Last name') ?>" value="<?php echo $this->escapeHtml($this->helper('contacts')->getUserName()) ?>" class="input-text" type="text" /></td></tr>
						</div>
				</div>
				<tr><td></td><td><span id="err_sur" style="display:none;color:red;"><?php echo $obj->getdata('sur_err'); ?></span></td></tr>
	<?php	}
			if($obj->getdata('email_val')==1)
				{?>
					<div class="field">
						<tr><td><label for="email_val" class="required"><em>*</em><?php echo Mage::helper('contacts')->__('Email') ?></label></td>
							<div class="input-box">
								<td><input name="email_val" id="email_val" placeholder="Enter Your Email Address" title="<?php echo Mage::helper('contacts')->__('Email') ?>" value="<?php echo $this->escapeHtml($this->helper('contacts')->getUserName()) ?>" class="input-text required-entry" type="text" /></td></tr>
							</div>
					</div>
					<tr><td></td><td><span id="err_email" style="display:none;color:red;"><?php echo $obj->getdata('email_err_val'); ?></span></td></tr>
	<?php		}
			else 
				{?>
					<div class="field">
						<tr><td><label for="email_val"><?php echo Mage::helper('contacts')->__('Email') ?></label></td>
							<div class="input-box">
								<td><input name="email_val" id="email_val" placeholder="Enter Your Email Address" title="<?php echo Mage::helper('contacts')->__('Email') ?>" value="<?php echo $this->escapeHtml($this->helper('contacts')->getUserName()) ?>" class="input-text" type="text" /></td></tr>
							</div>
					</div>
				<tr><td></td><td><span id="err_email" style="display:none;color:red;"><?php echo $obj->getdata('email_err_val'); ?></span></td></tr>			
			
	<?php		}
		
			if($obj->getdata('cont_val')==1)
			{?>
				<div class="field">
					<tr><td><label for="mob" class="required"><em>*</em><?php echo Mage::helper('contacts')->__('Mobile') ?></label></td>
						<div class="input-box">
							<td><input name="mob" id="mob" maxlength="10" placeholder=" Mobile Number" title="<?php echo Mage::helper('contacts')->__('Mobile') ?>" value="<?php echo $this->escapeHtml($this->helper('contacts')->getUserName()) ?>" class="input-text required-entry" type="tele" /></td></tr>
						</div>
				</div>
				<tr><td></td><td><span id="err_mob" style="display:none;color:red;"><?php echo $obj->getdata('err_cont'); ?></span></td></tr>
						
	<?php	}	
			else 
			{?>
				<div class="field">
					<tr><td><label for="mob"><?php echo Mage::helper('contacts')->__('Mobile') ?></label></td>
						<div class="input-box">
							<td><input name="mob" id="mob" maxlength="10" placeholder="Enter Your Mobile Number" title="<?php echo Mage::helper('contacts')->__('Mobile') ?>" value="<?php echo $this->escapeHtml($this->helper('contacts')->getUserName()) ?>" class="input-text" type="tele" /></td></tr>	
						</div>
				</div>
				<tr><td></td><td><span id="err_mob" style="display:none;color:red;"><?php echo $obj->getdata('err_cont'); ?></span></td></tr>
			
	<?php	}
			if($obj->getdata('msg_val')==1)
			{?>
				<div class="field">
					<tr><td><label for="msg_val" class="required"><em>*</em><?php echo Mage::helper('contacts')->__('Message') ?></label></td>
						<div class="input-box">
							<td><textarea name="msg_val" id="msg_val" placeholder="Give Us Your Feedback" title="<?php echo Mage::helper('contacts')->__('Message') ?>" value="<?php echo $this->escapeHtml($this->helper('contacts')->getUserName()) ?>" class="input-text required-entry" /></textarea></td></tr>
						</div>
				</div>
				<tr><td></td><td><span id="err_msg" style="display:none;color:red;"><?php echo $obj->getdata('msg_err'); ?></span></td></tr>
						
	<?php	}
			else 
			{?>
				<div class="field">
					<tr><td><label for="msg_val"><?php echo Mage::helper('contacts')->__('Message') ?></label></td>
						<div class="input-box">
							<td><textarea name="msg_val" id="msg_val" placeholder="Give Us Your Feedback" title="<?php echo Mage::helper('contacts')->__('Message') ?>" value="<?php echo $this->escapeHtml($this->helper('contacts')->getUserName()) ?>" class="input-text"  /></textarea></td></tr>
						</div>
				</div>
				<tr><td></td><td><span id="err_msg" style="display:none;color:red;"><?php echo $obj->getdata('msg_err'); ?></span></td></tr>										
	<?php	}
			if($obj->getdata('en_recaptcha')==1)
			{?>
				<div class="field">
					<tr><td><label for="captcha" class="required"><em>*</em><?php echo Mage::helper('contacts')->__('Captcha') ?></label></td>
						<div class="input-box">
							<td><script>
									var RecaptchaOptions = {
									   theme : '<?php echo $captheme; ?>',
									   tabindex : 2
									};
								</script>
								
								<?php
									require_once('js/pack/recaptchalib.php');
									$publickey = $pubkey; // you got this from the signup page
									echo recaptcha_get_html($publickey);
								?>
							</td></tr>	
						</div>
				</div>
								
	<?php	}?>
			
			<tr><td></td><td>
			<div class="buttons-set">
				<input type="text" name="hideit" id="hideit" value="" style="display:none !important;"/>
					<button type="button" id="sub" onclick="return validation();" style="left:0;margin-right:310px" title="<?php echo Mage::helper('contacts')->__('Submit') ?>" class="button"><span><span><?php echo Mage::helper('contacts')->__('Submit') ?></span></span></button>
			</div>
			</td></tr>
		</table>
	</form>	
	</div>
	
<script type="text/javascript">
	//<![CDATA[
	// var contactForm = new VarienForm('contactForm', true);
	//]]>
	
	function validation()
	{
		var fname = document.getElementById("fname").value;
		var lname = document.getElementById("lname").value;
		var mob = document.getElementById("mob").value;
		var email = document.getElementById("email_val").value;
		var msg = document.getElementById("msg_val").value;
		
		if("<?php echo $obj->getdata('name_val')==1; ?>" && fname=="")
		{
			document.getElementById("err_name").style.display="inline";
			contactForm.fname.focus();
			return false;
			
		}
		
		document.getElementById("err_name").style.display="none";
		if("<?php echo $obj->getdata('sur_val')==1; ?>" && lname=="")
		{	
			document.getElementById("err_sur").style.display="inline";
			contactForm.lname.focus();
			return false;
		}
		
		document.getElementById("err_sur").style.display="none";
		if("<?php echo $obj->getdata('email_val')==1; ?>" && email=="")
		{
				document.getElementById("err_email").style.display="inline";
				contactForm.email_val.focus();
				return false;
			
		}
		
		else if("<?php echo $obj->getdata('email_val')==1; ?>")
		{
			var str=email;
			var filter=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i
					
			if (filter.test(str)==false) 
			{  
				<!-- alert("Invalid email."); -->
				document.getElementById("err_email").style.display = "inline";
				document.getElementById("email_val").value = "";
				document.getElementById("email_val").focus();
				return false;
			}	
			else
			{
			document.getElementById("err_email").style.display = "none";
			}
	
		}
		
		document.getElementById("err_email").style.display="none";
		if("<?php echo $obj->getdata('cont_val')==1; ?>" && mob=="")
		{
			document.getElementById("err_mob").style.display="inline";
			contactForm.mob.focus();
			return false;
		}
		else if("<?php echo $obj->getdata('cont_val')==1; ?>")
		{
			
			if(isNaN(mob))
			{
				
				alert("Enter the valid Mobile Number(Like : 9566137117)");
				contactForm.mob.focus();
				return false;
			}
			else if(mob.length !=10)
			{
				alert(" Your Mobile Number must be 10 Digits");
				contactForm.mob.select();
				return false;
			}
			
		}
		document.getElementById("err_mob").style.display="none";
		if("<?php echo $obj->getdata('msg_val')==1; ?>" && msg=="")
		{
			document.getElementById("err_msg").style.display="inline";
			contactForm.msg.focus();
			return false;
			
		}
		document.getElementById("err_msg").style.display="none";
		
		ajax();
				
	}
</script>

<script src="js/pack/jquery-1.10.2.js"></script>

<script type="text/javascript">
	
	function ajax()
	{
		var fname = $("#fname").val();
		var lname = $("#lname").val();
		var email = $("#email_val").val();
		var mob = $("#mob").val();
		var msg = $("#msg_val").val();
		var smtp = "<?php echo $smtp; ?>";
		var port = "<?php echo $port; ?>";
		var user = "<?php echo $user; ?>";
		var pass = "<?php echo $pass; ?>";
		var smsg = "<?php echo $smsg; ?>";
		var emsg = "<?php echo $emsg; ?>";
		var ch = $("#recaptcha_challenge_field").val();
		var rp = $("#recaptcha_response_field").val();
		var prkey = "<?php echo $prkey; ?>";
		var bcc = "<?php echo $bcc; ?>";
		var subject = "<?php echo $subject; ?>";
		var autorply = "<?php echo $autorply; ?>";
		var to_address = "<?php echo $to_address; ?>";
		var from_address = "<?php echo $from_address; ?>";
		var wrongcap =  "<?php echo $wrongcap; ?>";
		
		var data= 'fname='+ fname + '&lname='+ lname + '&email='+ email + '&mob='+ mob + '&msg='+ msg + '&smtp='+ smtp + '&port='+ port + '&user='+ user + '&pass='+ pass + '&smsg='+ smsg + '&emsg='+ emsg + '&prkey='+ prkey + '&ch='+ ch + '&rp='+ rp + '&bcc='+ bcc +'&subject='+ subject +'&autorply='+ autorply + '&to_address='+ to_address + '&from_address='+ from_address + '&wrongcap='+ wrongcap;
		
		$("#response").html('<div style="padding: 15px;color: #000;"><b>Sending...</b></div>');
		 $.ajax({
			url:"web/ajax/index/",
			cache:false,
			type: "post",
			data: data, 
			
			success:function(result){
			document.getElementById("response").innerHTML = result;
			}
		});
	}


</script>
	<?php
		
	}
}