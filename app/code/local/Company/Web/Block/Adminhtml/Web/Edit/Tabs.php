<?php

class Company_Web_Block_Adminhtml_Web_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

  public function __construct()
  {
      parent::__construct();
      $this->setId('web_tabs');
      $this->setDestElementId('edit_form');
      $this->setTitle(Mage::helper('web')->__('Contact Information'));
  }

  protected function _beforeToHtml()
  {
      $this->addTab('form_section', array(
          'label'     => Mage::helper('web')->__('SMTP Settings'),
          'title'     => Mage::helper('web')->__('SMTP Settings'),
          'content'   => $this->getLayout()->createBlock('web/adminhtml_web_edit_tab_form')->toHtml(),
      ));
     
	 $this->addTab('form_section2', array(
          'label'     => Mage::helper('web')->__('Email Settings'),
          'title'     => Mage::helper('web')->__('Email Settings'),
          'content'   => $this->getLayout()->createBlock('web/adminhtml_web_edit_tab_form1')->toHtml(),
      ));
	  
	  
	   $this->addTab('form_section3', array(
          'label'     => Mage::helper('web')->__('Validation'),
          'title'     => Mage::helper('web')->__('Validation'),
          'content'   => $this->getLayout()->createBlock('web/adminhtml_web_edit_tab_form2')->toHtml(),
      ));
	 
	 
	  $this->addTab('form_section4', array(
          'label'     => Mage::helper('web')->__('Google reCaptcha'),
          'title'     => Mage::helper('web')->__('Google reCaptcha'),
          'content'   => $this->getLayout()->createBlock('web/adminhtml_web_edit_tab_form3')->toHtml(),
      ));
	  
	
      return parent::_beforeToHtml();
  }
}