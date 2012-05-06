<div class="box grid_12">
    <?php $form=$this->beginWidget('CActiveForm', array(
    	'id'=>'food-seo-form',
    	'enableAjaxValidation'=>false,
    )); ?>
    <div class="box-head"><h2>Simple Inputs</h2></div>
    <div class="box-content">
        <div class="form-row">
            <p class="form-label"><?php echo $form->labelEx($model,'type'); ?></p>

            <div class="form-item"><?php echo $form->dropDownList($model, "type", array('title'=>'title','keywords'=>'keywords','description'=>'description'), array('empty'=>'не выбран'));?>
            <span><?php echo $form->error($model,'type'); ?></span>
            </div>
        </div>
        <div class="form-row">
            <p class="form-label"><?php echo $form->labelEx($model,'url'); ?></p>

            <div class="form-item"><?php echo $form->textField($model,'url'); ?>
            <span><?php echo $form->error($model,'url'); ?></span>
            </div>
        </div>
        <div class="form-row">
            <p class="form-label"><?php echo $form->labelEx($model,'content'); ?></p>

            <div class="form-item"><?php echo $form->textField($model,'content'); ?>
            <span><?php echo $form->error($model,'content'); ?></span>
            </div>
        </div>
        <div class="form-row">
            <p class="form-label"><?php echo $form->labelEx($model,'language'); ?></p>

            <div class="form-item"><?php echo $form->textField($model,'language'); ?></div>
        </div>
        <div class="form-row">
            <p class="form-label"><?php echo $form->labelEx($model,'param'); ?></p>

            <div class="form-item"><?php echo $form->dropDownList($model, "param", CHtml::listData($this->getParams(), 'value', 'name','group'), array('empty'=>'не выбран'));?></div>
        </div>
        <div class="form-row">
            <p class="form-label"><?php echo $form->labelEx($model,'is_active'); ?></p>
            <?php echo $form->checkBox($model,'is_active',array('id'=>'iphone-check')); ?>
        </div>

            <div class="form-row">
                <p class="form-label"></p>
        		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'button big black')); ?>
        	</div>
        <div class="clear"></div>
    </div>
    <?php $this->endWidget(); ?>
</div>
