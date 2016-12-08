<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
?>
<h2>Добавление клиента</h2>
<?php $form= ActiveForm::begin();?>
<?=$form->field($client, 'last_name')?>
<?=$form->field($client, 'first_name')?>
<?=$form->field($client, 'patronymic_name')?>
<?=$form->field($client, 'passport')?>
<?=$form->field($client, 'phone_number')?>
<button class="btn btn-primary" type="submit">
Сохранить</button>
<?php ActiveForm::end();?>
