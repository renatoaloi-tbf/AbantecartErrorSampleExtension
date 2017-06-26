<?php
/*------------------------------------------------------------------------------
  $Id$

  AbanteCart, Ideal OpenSource Ecommerce Solution
  http://www.AbanteCart.com

  Sample Extension for AbanteCart integration
	http://www.tbfconsultoria.com.br
  Copyright © 2011-2017 TBF Consultoria
------------------------------------------------------------------------------*/
if ( !defined ( 'DIR_CORE' )) {
	header ( 'Location: static_pages/' );
}

class ExtensionSampleTemplateExtension extends Extension {

	protected $registry;

	public function __construct() {
		$this->registry = Registry::getInstance();
	}

	// Hook validation of new fields to customer registration form
	public function onModelAccountCustomer_ValidateData()
	{

		//echo "Base Method: " . $this->baseObject_method;
		//die;

		$that = $this->baseObject;
		$request_data = $that->request->post;

		if (isset($request_data['password'])) {
			$that->error['firstname'] = 'Error at firstname field from account CREATE page!';
		}
		else {
			$that->error['firstname'] = 'Error at firstname field from account EDIT page!';
		}
  }


}
