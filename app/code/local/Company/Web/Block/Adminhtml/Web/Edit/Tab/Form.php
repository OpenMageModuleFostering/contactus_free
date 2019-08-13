<?php
require("js/pack/support.php");
class Company_Web_Block_Adminhtml_Web_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
  protected function _prepareForm()
  {
      $form = new Varien_Data_Form();
      $this->setForm($form);
      $fieldset = $form->addFieldset('web_form', array('legend'=>Mage::helper('web')->__('SMTP Settings')));
     
      $fieldset->addField('smtp_server', 'text', array(
          'label'     => Mage::helper('web')->__('SMTP Server'),
          'class'     => 'required-entry',
          'required'  => true,
		  'name'      => 'smtp_server',
      ));

       $fieldset->addField('smtp_port', 'text', array(
          'label'     => Mage::helper('web')->__('SMTP Port'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'smtp_port',
      ));
	  

	  
     /* $fieldset->addField('content', 'editor', array(
          'name'      => 'content',
          'label'     => Mage::helper('web')->__('Content'),
          'title'     => Mage::helper('web')->__('Content'),
          'style'     => 'width:700px; height:500px;',
          'wysiwyg'   => false,
          'required'  => true,
      ));*/
     
		 $fieldset->addField('smtp_user', 'text', array(
          'label'     => Mage::helper('web')->__('SMTP Username'),
          'value'     => '<?php echo $this->escapeHtml($this->helper("web")->getUserEmail()) ?>',
		  'class'     => 'required-entry input-text required-entry validate-email',
          'required'  => true,
		  'name'      => 'smtp_user',
      ));
	  
	   $fieldset->addField('smtp_pass', 'password', array(
          'label'     => Mage::helper('web')->__('SMTP Password'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'smtp_pass',
      ));
		
		
	 	  $fieldset->addField('success_msg', 'text', array(
          'label'     => Mage::helper('web')->__('Email sent successfully message'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'success_msg',
      ));
	  
	    $fieldset->addField('err_msg', 'text', array(
          'label'     => Mage::helper('web')->__('Error sending email message'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'err_msg',
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

?>

 