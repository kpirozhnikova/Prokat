<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
?>
<h2>Выдача</h2>
<?php $form= ActiveForm::begin();?>
<?=$form->field($hire, 'videocassette_id')->listBox(ArrayHelper::map($videocassettes,'id','name_videocassette'))?>
<?=$form->field($hire, 'client_id')->listBox(ArrayHelper::map($clients,'id','first_name', 'last_name'))?>
<?=$form->field($hire, 'hire_price')?>
<?=$form->field($hire, 'return_date')?>
<?=$form->field($hire, 'taking_date')?>
<button class="btn btn-primary" type="submit">
Сохранить</button>
<?php ActiveForm::end();?>
