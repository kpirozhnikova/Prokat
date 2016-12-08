<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
?>
<h2>Добавление видеокассеты</h2>
<?php $form= ActiveForm::begin();?>
<?=$form->field($videocassette, 'name_videocassette')?>
<?=$form->field($videocassette, 'year')?>
<?=$form->field($videocassette, 'description')?>
<?=$form->field($videocassette, 'status')->checkBox()?>
<button class="btn btn-primary" type="submit">
Сохранить</button>
<?php ActiveForm::end();?>
