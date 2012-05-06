<?php
$this->breadcrumbs = array(
    'Seo' => array('index'),
    'Manage',
);

?>
<div class="box grid_12">
    <div class="box-head"><h2>Все записи</h2></div>
    <div class="box-content no-pad">
        <?php $this->widget('zii.widgets.grid.CGridView', array(
        'id' => 'food-seo-grid',
        'dataProvider' => $model->search(),
        'filter' => $model,
        'summaryText' => '',
        'itemsCssClass' => 'dataTable',
        'cssFile' => false,
        'htmlOptions' => array(
            'style' => 'width:100%',
        ),
        'columns' => array(
            'id',
            'type',
            'url',
            'content',
            'language',
            array(
                'class'=>'CButtonColumn',
                'template'=>'{check} {uncheck}',
                'buttons'=>array(
                    'check' => array(
                        'imageUrl' => $this->module->assetsUrl."/img/check.png",
                        'url'   => 'Yii::app()->createUrl("seo/default/check", array("id" => $data->id))',
                        'visible' => '$data->is_active == 1',
                    ),
                    'uncheck' => array(
                        'imageUrl' => $this->module->assetsUrl."/img/uncheck.png",
                        'url'   => 'Yii::app()->createUrl("seo/default/check", array("id" => $data->id))',
                        'visible' => '$data->is_active == 0',
                    ),
                ),
            ),
            array(
                'class' => 'CButtonColumn',
                'updateButtonImageUrl'=>$this->module->assetsUrl.'/img/pencil.png',
                'template'=>'{update}'
            ),
            array(
                'class' => 'CButtonColumn',
                'deleteButtonImageUrl'=>$this->module->assetsUrl.'/img/close.png',
                'template'=>'{delete}'
            ),
        ),
    )); ?>
    </div>
</div>

<div class="box grid_12">
    <a class="button big black" href="<?php echo Yii::app()->createUrl("seo/default/create")?>">Добавить</a>
</div>