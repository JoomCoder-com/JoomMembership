<?php
/**
 * JoomSubscription by JoomCoder
* a component for Joomla! 3.0 CMS (http://www.joomla.org)
* Author Website: https://www.joomcoder.com/
* @copyright Copyright (C) 2012 JoomCoder (https://www.joomcoder.com/). All rights reserved.
* @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
*/

defined('_JEXEC') or die();

class JoomsubscriptionModelEmPlan extends MModelAdmin
{

	public function getTable($type = 'EmPlan', $prefix = 'JoomsubscriptionTable', $config = array())
	{
		return JTable::getInstance($type, $prefix, $config);
	}

	public function getForm($data = array(), $loadData = true)
	{
		$app = JFactory::getApplication();

		$form = $this->loadForm('com_joomsubscription.plan', 'plan', array(
			'control' => 'jform',
			'load_data' => $loadData
		));
		if(empty($form))
		{
			return false;
		}
		return $form;
	}

	public function getItem($pk = null)
	{
		$item = parent::getItem($pk);

		if(!isset($item->params['gateways']))
		{
			$item->params['gateways'] = array();
		}

		return $item;
	}

	protected function loadFormData()
	{
		$data = JFactory::getApplication()->getUserState('com_joomsubscription.edit.emplan.data', array());

		if(empty($data))
		{
			$data = $this->getItem();
		}

		return $data;
	}

	protected function prepareTable($table)
	{
		if ($table->ctime == '' || $table->ctime == '0000-00-00 00:00:00')
		{
			$table->ctime = JDate::getInstance()->toSql();
		}

		$params = JFactory::getApplication()->input->get('params', array(), 'array');

		$registry = new JRegistry();
		$registry->loadArray($params);

		$rules = $registry->get('restrictions.rules', array());
		foreach ($rules as $key => $rule)
		{
			$rules[$key] = json_decode(urldecode($rule));
		}

		$registry->set('restrictions.rules', $rules);

		$table->invisible = $registry->get('properties.invisible', 0);
		$table->invisible_in_history = $registry->get('properties.invisible_in_history', 0);
		$table->grant_new = $registry->get('properties.grant_new', 0);
		$table->grant_reg = $registry->get('properties.grant_reg', 0);
		$table->params = (string)$registry;

		// Reorder the articles within the category so the new article is first
		if (empty($table->id))
		{
			$table->reorder('group_id = '.(int) $table->group_id);
		}
	}

	protected function canDelete($record)
	{
		return true;
	}

	protected function canEditState($record)
	{
		return true;
	}
}