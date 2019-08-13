<?php

class Company_Web_Block_Adminhtml_Web_Edit_Tab_Form1 extends Mage_Adminhtml_Block_Widget_Form
{
  protected function _prepareForm()
  {
      $form = new Varien_Data_Form();
      $this->setForm($form);
      $fieldset = $form->addFieldset('web_form', array('legend'=>Mage::helper('web')->__('Email Settings')));
		
	
		$fieldset->addField('to_address', 'text', array(
          'label'     => Mage::helper('web')->__('To Address'),
          'value'     => '<?php echo $this->escapeHtml($this->helper("web")->getUserEmail()) ?>',
		  'class'     => 'required-entry input-text required-entry validate-email',
          'required'  => true,
		  'name'      => 'to_address',
      ));

	  $afterElementHtml = '<p style="color: red;"><small>' . 'Send mail from this if your email field is optional ' . '</small></p>';
	  
       $fieldset->addField('from_address', 'text', array(
          'label'     => Mage::helper('web')->__('From Address'),
		  'value'     => '<?php echo $this->escapeHtml($this->helper("web")->getUserEmail()) ?>',
		  'class'     => 'required-entry input-text required-entry validate-email',
          'required'  => true,
          'name'      => 'from_address',
		  'after_element_html'  => $afterElementHtml,
      ));
	  
    		
	  
	   $fieldset->addField('bcc_address', 'text', array(
          'label'     => Mage::helper('web')->__('Bcc Address'),
          'value'     => '<?php echo $this->escapeHtml($this->helper("web")->getUserEmail()) ?>',
		  'class'     => 'required-entry input-text required-entry validate-email',
          'required'  => true,
          'name'      => 'bcc_address',
      ));
		
		
	 	  $fieldset->addField('email_sub', 'text', array(
          'label'     => Mage::helper('web')->__('Email Subject'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'email_sub',
      ));
	     	
	
	 
      if ( Mage::getSingleton('adminhtml/session')->getWebData() )
      {
          $form->setValues(Mage::getSingleton('adminhtml/session')->getWebData());
          Mage::getSingleton('adminhtml/session')->setWebData(null);
      } elseif ( Mage::registry('web_data') ) {
          $form->setValues(Mage::registry('web_data')->getData());
      }
	  
	  return parent::_prepareForm();
  }
  
  
}
