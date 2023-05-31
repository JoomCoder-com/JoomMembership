<?php
/**
 * Cobalt by JoomCoder
 * a component for Joomla! 1.7 - 2.5 CMS (http://www.joomla.org)
 * Author Website: https://www.joomcoder.com/
 * @copyright Copyright (C) 2012 JoomCoder (https://www.joomcoder.com/). All rights reserved.
 * @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
 */

defined('_JEXEC') or die();
$app = JFactory::getApplication();
$controller = $app->input->getCmd('view', 'emplan');
?>
<div class="pull-right">
	<?php //if(!$this->isCheckedOut()):?>
		<?php //if(in_array($this->tmpl_params->get('tmpl_core.form_show_apply_button'), $this->user->getAuthorisedViewLevels())):?>
			<button type="button" class="btn-submit btn btn-primary" onclick="Joomsubscription.submitbutton('<?php echo $controller;?>.apply');">
			<?php echo JText::_('EAPPLY'); ?>
			</button>
		<?php //endif; ?>

		<div class="btn-group">
			<button type="button" class="btn btn-success" onclick="Joomsubscription.submitbutton('<?php echo $controller;?>.save');">
				<?php echo JText::_('ESAVE'); ?>
			</button>
			<button class="btn btn-success dropdown-toggle" data-toggle="dropdown">
				<span class="caret"></span>
			</button>
			<ul class="dropdown-menu">
				<li>
					<a href="javascript:void(0);" onclick="Joomsubscription.submitbutton('<?php echo $controller;?>.save2new');">
						<?php echo JText::_('ESAVE2NEW'); ?>
					</a>
				</li>
				<?php if(JFactory::getApplication()->input->getInt('id')): ?>
					<li>
						<a href="javascript:void(0);" onclick="Joomsubscription.submitbutton('<?php echo $controller;?>.save2copy');">
							<?php echo JText::_('ESAVE2COPY'); ?>
						</a>
					</li>
				<?php endif; ?>
			</ul>
		</div>

	<?php //if(in_array($this->tmpl_params->get('tmpl_core.form_show_save_button'), $this->user->getAuthorisedViewLevels())):?>
	<?php //endif; ?>

		<?php //if(in_array($this->tmpl_params->get('tmpl_core.form_show_savenew_button'), $this->user->getAuthorisedViewLevels())):?>
		<?php //endif; ?>

		<?php //if(in_array($this->tmpl_params->get('tmpl_core.form_show_savecopy_button'), $this->user->getAuthorisedViewLevels()) && $this->item->id):?>
		<?php //endif; ?>
	<?php //endif; ?>

	<?php //if(in_array($this->tmpl_params->get('tmpl_core.form_show_close_button'), $this->user->getAuthorisedViewLevels())):?>
		<button type="button" class="btn-submit btn btn-danger" onclick="Joomsubscription.submitbutton('<?php echo $controller;?>.cancel');">
		<?php echo JText::_('ECANCEL'); ?>
		</button>
	<?php //endif; ?>
</div>