<?php

class Company_Web_Block_Adminhtml_Web_Edit_Tab_Form3 extends Mage_Adminhtml_Block_Widget_Form
{
  protected function _prepareForm()
  {
      $form = new Varien_Data_Form();
      $this->setForm($form);
      $fieldset = $form->addFieldset('web_form', array('legend'=>Mage::helper('web')->__('Google reCaptcha')));
		
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
		
		$fieldset->addField('en_recaptcha', 'radios', array(
        'label'     => Mage::helper('web')->__('Enable Google reCaptcha'),
		'required'  => false,
		'name'      => 'en_recaptcha',
		'values' => array( array('value'=>'1', 'label'=>'  Mendatery'),
						   array('value'=>'0', 'label'=>'  Optional'),),
		'disabled' => false,
		'tabindex' => 1
		));
	
		

	  //$form->getElement('en_recaptcha')->setIsChecked(!empty($formData['en_recaptcha']));
	  
       $fieldset->addField('pub_key', 'text', array(
          'label'     => Mage::helper('web')->__('Public Key'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'pub_key',
      ));
	  
    
		 $fieldset->addField('pr_key', 'text', array(
          'label'     => Mage::helper('web')->__('Private Key'),
          'class'     => 'required-entry',
          'required'  => true,
		  'name'      => 'pr_key',
      ));
	  
	   $fieldset->addField('recaptcha_theme', 'select', array(
          'label'     => Mage::helper('web')->__('reCaptcha Theme'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'recaptcha_theme',
		   'values'    => array(
          array(
              'value'     => 'red',
              'label'     => Mage::helper('web')->__('Red'),
          ),

          array(
              'value'     => 'white',
              'label'     => Mage::helper('web')->__('White'),
          ),
		  array(
              'value'     => 'clean',
              'label'     => Mage::helper('web')->__('Clean'),
          ),
		  array(
              'value'     => 'blackglass',
              'label'     => Mage::helper('web')->__('Blackglass'),
          ),
		),
      ));
		
		
	  
	    $fieldset->addField('incorrect_captcha', 'text', array(
          'label'     => Mage::helper('web')->__('Incorrect Captcha'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'incorrect_captcha',
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