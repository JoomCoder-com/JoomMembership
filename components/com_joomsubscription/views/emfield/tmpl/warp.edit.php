<?php
/**
 * JoomSubscription by JoomCoder
 * a component for Joomla! 3.0 CMS (http://www.joomla.org)
 * Author Website: https://www.joomcoder.com/
 *
 * @copyright Copyright (C) 2012 JoomCoder (https://www.joomcoder.com/). All rights reserved.
 * @license   GNU/GPL http://www.gnu.org/copyleft/gpl.html
 */

defined('_JEXEC') or die('Restricted access');

JHtml::_('behavior.formvalidation');
JHtml::_('behavior.keepalive');
JHtml::_('dropdown.init');
JHtml::_('formbehavior.chosen', 'select');
?>

<script type="text/javascript">
	Joomsubscription.submitbutton = function(task) {
		if(task == 'emfield.cancel' || document.formvalidator.isValid(document.id('item-form'))) {
			Joomsubscription.submitform(task, document.getElementById('item-form'));
		} else {
			alert('<?php echo $this->escape(JText::_('JGLOBAL_VALIDATION_FORM_FAILED'));?>');
		}
	}
</script>
<form method="post" name="adminForm" id="item-form" class="uk-form uk-form-horizontal">
<div class="page-header">
    <div class="uk-float-right">
        <?php $layout = Mint::loadLayout('buttons', $basePath = JPATH_COMPONENT .'/layouts'); echo $layout->render(null); ?>
    </div>
	<h1>
		<?php if($this->item->id): ?>
            <img src="<?php echo JUri::root(TRUE); ?>/components/com_joomsubscription/images/cpanel/fields.png" />
			<?php echo JText::sprintf('EEDITFIELD', $this->item->name); ?>
		<?php else: ?>
            <img src="<?php echo JUri::root(TRUE); ?>/components/com_joomsubscription/images/cpanel/fields.png" />
			<?php echo JText::_('ENEWFIELD'); ?>
		<?php endif; ?>
	</h1>
</div>
<hr />
	<fieldset class="adminform">
		<div class="uk-form-row">
			<label class="uk-form-label"><?php echo $this->form->getLabel('id'); ?></label>
			<div class="uk-form-controls"><?php echo $this->form->getInput('id'); ?></div>
		</div>
		<div class="uk-form-row">
			<label class="uk-form-label"><?php echo $this->form->getLabel('name'); ?></label>
			<div class="uk-form-controls"><?php echo $this->form->getInput('name'); ?></div>
		</div>
		<div class="uk-form-row">
			<label class="uk-form-label"><?php echo $this->form->getLabel('type'); ?></label>
			<div class="uk-form-controls"><?php echo $this->form->getInput('type'); ?></div>
		</div>
		<div class="uk-form-row">
			<label class="uk-form-label"><?php echo $this->form->getLabel('published'); ?></label>
			<div class="uk-form-controls"><?php echo $this->form->getInput('published'); ?></div>
		</div>
		<div class="uk-form-row">
			<label class="uk-form-label"><?php echo $this->form->getLabel('access'); ?></label>
			<div class="uk-form-controls"><?php echo $this->form->getInput('access'); ?></div>
		</div>
		<div class="uk-form-row">
			<label class="uk-form-label"><?php echo $this->form->getLabel('required'); ?></label>
			<div class="uk-form-controls"><?php echo $this->form->getInput('required'); ?></div>
		</div>
		<div class="uk-form-row">
			<label class="uk-form-label"><?php echo $this->form->getLabel('description'); ?></label>
			<div class="uk-form-controls"><?php echo $this->form->getInput('description'); ?></div>
		</div>
	</fieldset>

	<div id="field-params"></div>

	<input type="hidden" name="task" value=""/>
	<input type="hidden" name="id" value="<?php echo $this->item->id; ?>"/>
	<input type="hidden" name="return" value="<?php echo $this->state->get('group.return'); ?>"/>
	<?php echo JHtml::_('form.token'); ?>
	<script>
		(function($){
			function loadParms(val) {
				$.ajax({
					url:      '<?php echo JRoute::_('index.php?option=com_joomsubscription&task=emajax.fieldparams&field=', FALSE) ?>',
					dataType: 'html',
					type:     'POST',
					data: {
						field_type : val,
						field_id: <?php echo (int)$this->item->id; ?>
					}
				}).done(function(json) {
					$('#field-params').html(json);
					Joomsubscription.redrawBS();
				});
			}

			loadParms('<?php echo $this->item->type ?>');

			$('#jform_type').on('change', function(){
				loadParms(this.value);
			});
		}(jQuery))
	</script>
</form>