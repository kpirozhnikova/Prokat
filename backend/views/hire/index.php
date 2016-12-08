<?php Use \yii\helpers\Html; ?>
<h2>Выданные видеокассеты</h2>
<table class="table">
	<tr>
		<th>№ </th> 
		<th>Название фильма </th> 
		<th>Имя </th> 
		<th>Фамилия </th>
		<th>Номер </th>
		<th>Дата возврата </th>
		<th>Стоимость проката </th> 
		<th>Действия </th>
	</tr>

	<?php foreach($hires as $hire){ ?>
	<tr>
		<td> <?= $hire->id ?> </td>
		<td> <?php echo htmlspecialchars($hire->getVideocassette()->one()->name_videocassette) ?> </td>
		<td> <?php echo htmlspecialchars($hire->getClient()->one()->first_name) ?> </td>
		<td> <?php echo htmlspecialchars($hire->getClient()->one()->last_name) ?> </td>
		<td> <?php echo htmlspecialchars($hire->getClient()->one()->phone_number) ?> </td>
		<td> <?= htmlspecialchars($hire->return_date) ?> </td>
		<td> <?= htmlspecialchars($hire->hire_price); echo " руб." ?> </td>
		
		<td> 
			 <?= Html::a('<span class="glyphicon glyphicon-edit"></span>Редактировать', ['hire/edit', 'id' => $hire ->id],['class'=>'btn btn-primary']) ?>
			 <?= Html::a('<span class="glyphicon glyphicon-remove"></span>Удалить', ['hire/delete', 'id' => $hire ->id],['class'=>'btn btn-small btn-danger'],['type'=>'button'])?>
		</td>
	</tr>
	 <?php } ?>
	 <tr>
	 <td colspan="7"></td>
	 <td><?= Html::a('<span class="glyphicon glyphicon-plus"></span>Добавить', ['hire/add','id' => $hire ->id]) ?>
	 </tr>
</table>

