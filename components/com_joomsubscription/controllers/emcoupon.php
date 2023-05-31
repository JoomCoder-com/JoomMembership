<?php
/**
 * JoomSubscription by JoomCoder
 * a component for Joomla (http://www.joomla.org)
 * Author Website: https://www.joomcoder.com/
 * @copyright Copyright (C) 2012 JoomCoder (https://www.joomcoder.com/). All rights reserved.
 * @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
*/
defined('_JEXEC') or die();

jimport('mint.mvc.controller.form');

class JoomsubscriptionControllerEmCoupon extends MControllerForm
{
	public function allowEdit($data = array(), $key = 'id')
	{
		return true;
	}

	public function allowAdd($data = array())
	{
		return true;
	}
}
