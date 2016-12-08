<?php Use \yii\helpers\Html; ?>
<h2>Должники</h2>
<table class="table">
	<tr>
		<th>№ </th> 
		<th>Название фильма </th> 
		<th>Имя </th> 
		<th>Фамилия </th>
		<th>Номер </th>
		<th>Стоимость проката (ед.)</th>
		<th>Дата возврата </th>
		<th>Факт. дата</th>
		<th>Действия </th>
	</tr>

	<?php foreach($hires as $hire){	
		if (isset($hire->fact_date)) {?>
		<?php } else {?>

	<tr>
		<td> <?= $hire->id ?> </td>
		<td> <?php echo htmlspecialchars($hire->getVideocassette()->one()->name_videocassette) ?> </td>
		<td> <?php echo htmlspecialchars($hire->getClient()->one()->first_name) ?> </td>
		<td> <?php echo htmlspecialchars($hire->getClient()->one()->last_name) ?> </td>
		<td> <?php echo htmlspecialchars($hire->getClient()->one()->phone_number) ?> </td>
		<td> <?= htmlspecialchars($hire->hire_price); echo " руб." ?> </td>
		<td> <?= htmlspecialchars($hire->return_date) ?> </td>
		<td> <?= htmlspecialchars($hire->fact_date) ?> </td>
		
		<td> 
			<?= Html::a('<span class="glyphicon glyphicon-edit"></span>Установить дату возврата', ['hire/editdebtor', 'id' => $hire ->id],['class'=>'btn btn-primary']) ?>
			 <?= Html::a('<span class="glyphicon glyphicon-remove"></span>Удалить', ['hire/delete', 'id' => $hire ->id],['class'=>'btn btn-danger'])
			 ?>
		</td>
	</tr>
	<?  }} ?>

	</table>
