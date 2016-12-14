<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
?>
<h2>Параметры видеокассеты</h2>
<?php $form= ActiveForm::begin();?>
<?=$form->field($videocassette, 'name_videocassette')?>
<?=$form->field($videocassette, 'year')?>
<?=$form->field($videocassette, 'description')->textArea(['rows' => '6'])?>
<?=$form->field($videocassette, 'status')->checkBox()?>
<button class="btn btn-primary" type="submit">
Сохранить</button>
<?php ActiveForm::end();?>
