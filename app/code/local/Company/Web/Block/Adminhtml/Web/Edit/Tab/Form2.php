<?php

class Company_Web_Block_Adminhtml_Web_Edit_Tab_Form2 extends Mage_Adminhtml_Block_Widget_Form
{
  protected function _prepareForm()
  {
      $form = new Varien_Data_Form();
      $this->setForm($form);
      $fieldset = $form->addFieldset('web_form', array('legend'=>Mage::helper('web')->__('Validation')));
		$model = Mage::registry('web_data');
		
		$model = Mage::getModel('web/web')->load('web_id');
        $data = $model->getData();
        $collection = Mage::getModel('web/web')->getCollection();
		$keys = array_keys($collection->getFirstItem()->getData());
		foreach ($keys as $key)
		{ 														// loop through all the keys
			foreach ($collection as $obj)
			{													//loop throught each object 
				//print_r($obj->getData($key));					//get the value for a speficic key. 
				//echo "<br>";
			}
		}
		
			
		$fieldset->addField('name_val', 'radios', array(
        'label'     => Mage::helper('web')->__('Name field Required'),
		'required'  => false,
		'name'      => 'name_val',
		'values' => array( array('value'=>'1', 'label'=>'  Mendatery'),
						   array('value'=>'0', 'label'=>'  Optional'),),
		'disabled' => false,
		'tabindex' => 1
		));
	  
	  		
	   $fieldset->addField('name_err', 'text', array(
          'label'     => Mage::helper('web')->__('Error Message'),
		  'required'  => false,
          'name'      => 'name_err',
		));
	  
    
		 $fieldset->addField('sur_val', 'radios', array(
          'label'     => Mage::helper('web')->__('Surname Required'),
		  'values' => array( array('value'=>'1', 'label'=>'  Mendatery'),
						     array('value'=>'0', 'label'=>'  Optional'),),
          'required'  => false,
		  'name'      => 'sur_val',
		 
		));
	    
	   $fieldset->addField('sur_err', 'text', array(
          'label'     => Mage::helper('web')->__('Error Message'),
		  'required'  => false,
          'name'      => 'sur_err',
		));
		
		
	 	  $fieldset->addField('cont_val', 'radios', array(
          'label'     => Mage::helper('web')->__('Contact Number Required'),
		  'required'  => false,
          'name'      => 'cont_val',
		 'values' => array( array('value'=>'1', 'label'=>'  Mendatery'),
						    array('value'=>'0', 'label'=>'  Optional'),),
		));
	  
	   //$form->getElement('cont_val')->setIsChecked(!empty($formData['cont_val']));
	   
	    $fieldset->addField('err_cont', 'text', array(
          'label'     => Mage::helper('web')->__('Error Message'),
          'required'  => false,
          'name'      => 'err_cont',
		));
	  
		$fieldset->addField('msg_val', 'radios', array(
          'label'     => Mage::helper('web')->__('Message Field Required'),
		  'values' => array( array('value'=>'1', 'label'=>'  Mendatery'),
						     array('value'=>'0', 'label'=>'  Optional'),),
          'required'  => false,
          'name'      => 'msg_val',
		
		));
	  
	
	  
		$fieldset->addField('msg_err', 'text', array(
          'label'     => Mage::helper('web')->__('Error Message'),
          'required'  => false,
          'name'      => 'msg_err',
		));
	  
	  	 
		$fieldset->addField('email_val', 'radios', array(
          'label'     => Mage::helper('web')->__('Email Address'),
		  'onclick'   => 'this.value = this.checked ? 1 : 0;',
          'required'  => false,
          'name'      => 'email_val',
		  'values' => array( array('value'=>'1', 'label'=>'  Mendatery'),
						     array('value'=>'0', 'label'=>'  Optional'),),
		));
	 
		$fieldset->addField('email_err_val', 'text', array(
          'label'     => Mage::helper('web')->__('Error Message'),
          'required'  => false,
          'name'      => 'email_err_val',
		  'checked'    => $ch6==1 ? 'checked' : '',
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