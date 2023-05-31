<?php
/**
 * JoomSubscription by JoomCoder
 * a component for Joomla! 3.0 CMS (http://www.joomla.org)
 * Author Website: https://www.joomcoder.com/
 * @copyright Copyright (C) 2012 JoomCoder (https://www.joomcoder.com/). All rights reserved.
 * @license   GNU/GPL http://www.gnu.org/copyleft/gpl.html
 */

defined('_JEXEC') or die;

class JoomsubscriptionControllerEmStates extends MControllerAdmin
{
	public function &getModel($name = 'EmState', $prefix = 'JoomsubscriptionModel', $config = array())
	{
		$model = parent::getModel($name, $prefix, array('ignore_request' => TRUE));

		return $model;
	}
}
