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

if(!class_exists('ExtensionSampleTemplateExtension')){
	require_once('core/sample_template_extension.php');
}

$controllers = array(
	'admin' => array(),
  'storefront' => array()
);

$models = array(
	'admin' => array(),
  'storefront' => array()
);

$languages = array(
	'admin' => array('sample_template_extension/sample_template_extension'),
  'storefront' => array()
);

$templates = array(
	'admin' => array(),
  'storefront' => array()
);
