<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
?>
<h2>Дата возврата</h2>
<?php $form= ActiveForm::begin();?>
<?=$form->field($hire, 'fact_date')?>
<button class="btn btn-primary" type="submit">
Сохранить</button>
<?php ActiveForm::end();?>
