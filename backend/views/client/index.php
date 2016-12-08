<?php Use \yii\helpers\Html; ?>
<h2>Клиенты</h2>
<table class="table">
	<tr>
		<th>№ </th> 
		<th>Фамилия </th> 
		<th>Имя </th> 
		<th>Отчество </th> 
		<th>Паспортные данные </th> 
		<th>Номер телефона </th> 
		<th>Действия </th> 
	</tr>
	<?php foreach($clients as $client){ ?>
	<tr>
		<td> <?= $client->id ?> </td>
		<td> <?= htmlspecialchars($client->last_name) ?> </td>
		<td> <?= htmlspecialchars($client->first_name) ?> </td>
		<td> <?= htmlspecialchars($client->patronymic_name) ?> </td>
		<td> <?= htmlspecialchars($client->passport) ?> </td>
		<td> <?= htmlspecialchars($client->phone_number) ?> </td>
		<td> <?= Html::a('<span class="glyphicon glyphicon-edit"></span>Редактировать', ['client/edit', 'id' => $client ->id],['class'=>'btn btn-primary']) ?>

			<?php
			if ($client->getHires()->count()==0) {

			 echo Html::a('<span class="glyphicon glyphicon-remove"></span>Удалить', ['client/delete', 'id' => $client ->id],['class'=>'btn btn-danger']);
			 }?>
		</td>
	</tr>
	 <?php } ?>
	 <tr>
	 <td colspan="6" ></td>
	 <td><?= Html::a('<span class="glyphicon glyphicon-plus"></span>Добавить нового', ['client/add']) ?>
	 </tr>
</table>