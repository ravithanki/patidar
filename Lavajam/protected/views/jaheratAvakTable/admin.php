<?php
$this->breadcrumbs=array(
	'Jaherat Avak Details'=>array('admin'),
	'Manage',
);

$this->menu=array(
	//array('label'=>'List JaheratAvakTable', 'url'=>array('index')),
	array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('jaherat-avak-table-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Jaherat Avak Details</h1>
<!--
<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>
-->
<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'jaherat-avak-table-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
		'header'=>'SN.',
		'class'=>'IndexColumn',
		),
		//'id',
		'receipt_no',
		'receipt_date',
		'bill_no_of_jaharat',
		'bill_date_of_jaharat',
		array(
		 'name'=>'party_name',
//                'type'=>'raw',		
                'value'=> '$data->Rel_jaharatavak_party->party_name',
	          ),
		'payment_type',
		array(
		 'name'=>'bank_name',
//                'type'=>'raw',		
                'value'=> '($data->bank_master_id == null) ? "NA" : $data->Rel_jaharatavak_bank->bank_name',
	          ),
		array(
		 'name'=>'cheque_dd_no',
//                'type'=>'raw',		
                'value'=> '($data->cheque_dd_no == null) ? "NA" : $data->cheque_dd_no',
	          ),
		//'cheque_dd_no',
		'amount',
		
		array(
			'class'=>'CButtonColumn',
			'template' => '{view}&nbsp;{update}&nbsp;{delete}',
			'buttons'=>array(
					'view' => array(
				                'label'=>'View', // text label of the button
						'url'=>'Yii::app()->createUrl("jaheratAvakTable/view", array("id"=>$data->id))',
						 'imageUrl'=> Yii::app()->baseUrl.'/images/view.png',  // image URL of the button. If not set or false, a text link is used
				        ),
					'update' => array(
						        'label'=>'Update', // text label of the button
							'url'=>'Yii::app()->createUrl("jaheratAvakTable/update", array("id"=>$data->id))',
						  'imageUrl'=> Yii::app()->baseUrl.'/images/update.png',  // image URL of the button. If not set or false, a text link is used
						),
					'delete' => array(
						        'label'=>'delete', // text label of the button
						  'imageUrl'=> Yii::app()->baseUrl.'/images/delete.png',  // image URL of the button. If not set or false, a text link is used
						),
				 ),
		),
	),
)); ?>
