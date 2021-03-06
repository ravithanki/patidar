<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'jaherat-wise-avak-table-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php //echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'receipt_no'); ?>
		<?php echo $form->textField($model,'receipt_no',array('size'=>6,'maxlength'=>5)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'receipt_no'); ?>
	</div>

	
	
	<div class="row">
		<?php echo $form->labelEx($model,'receipt_date'); ?>
		<?php
		$this->widget('zii.widgets.jui.CJuiDatePicker',
		    array(
			'model'=>$model,
			'attribute'=>'receipt_date',
			'language' => 'en',
			'options' => array(
			    'dateFormat'=>'yy-mm-dd',
			    'changeMonth' => 'true',
			    'changeYear' => 'true',
			    'duration'=>'fast',
			    'showAnim' =>'slide',
			    
			),
			'htmlOptions'=>array(
			'style'=>'height:18px;
			    padding-left: 4px;width:168px;'

			)
		    )
		);
	?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'receipt_date'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'bill_no_of_jaherat'); ?>
		<?php //echo $form->textField($model,'bill_no_of_jaherat',array('size'=>6,'maxlength'=>5)); ?>
		<?php
			echo  $form->textField($model,'bill_no_of_jaherat',
			array(
			'ajax' => array(
			'type'=>'POST', 
			'dataType' => 'json',
			'url'=>$this->createUrl('test'), 
			'success'=>'js:function(data){$("#amount_id1").val(data.unpaid_amt),$("#amount_id2").val(data.paid_amt),$("#amount_id").val(data.pname),$("#bdate").val(data.bdate); }',
		),'size'=>6 )); 
			
			?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'bill_no_of_jaherat'); ?>	
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'bill_date_of_jaherat'); ?>
		<?php echo $form->textField($model,'bill_date_of_jaherat',array('id'=>'bdate','size'=>5,'readonly'=>'true'));?>	
		<span class="status">&nbsp;</span>
		<?php echo $form->error($model,'bill_date_of_jaherat'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'party_no'); ?>
		 <?php //echo $form->dropDownList($model,'party_no',PartyMaster::items(), array('empty' => '----Select----')); ?>
		<?php //echo $form->dropDownList($model,'party_no',array());?>	
		<?php echo $form->textField($model,'party_no',array('id'=>'amount_id','size'=>5,'readonly'=>'true'));?>		
		<span class="status">&nbsp;</span>
		<?php echo $form->error($model,'party_no'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'unpaid_amount'); ?>
	<?php echo $form->textField($model,'unpaid_amount',array('id'=>'amount_id1','size'=>10,'disabled'=>'true'));?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'unpaid_amount'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'paid_amount'); ?>
	<?php echo $form->textField($model,'paid_amount',array('id'=>'amount_id2','size'=>10,'disabled'=>'true')); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'paid_amount'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'amount'); ?>
		<?php echo $form->textField($model,'amount',array('size'=>12,'maxlength'=>10)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'amount'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'submit')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
