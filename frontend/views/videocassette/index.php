<?php Use \yii\helpers\Html; ?>
<h2>Видеокассеты</h2>
<table class="table">
	<tr>
		<th>№ </th> 
		<th>Название </th> 
		<th>Год выпуска </th> 
		<th>Описание </th>
		<th>Наличие </th>
		<th>Действия </th> 
	</tr>
	<?php foreach($videocassettes as $videocassette){ ?>
	<tr>
		<td> <?= $videocassette->id ?> </td>
		<td> <?= htmlspecialchars($videocassette->name_videocassette) ?> </td>
		<td> <?= htmlspecialchars($videocassette->year) ?> </td>
		<td> <?= htmlspecialchars($videocassette->description) ?> </td>
		<td> <?php if ($videocassette->status=="1") {
						echo 'Есть в наличии';
						}else{
						echo 'Нет в наличии';	
						}
				?>
		<td> 
			<?php
			if ($videocassette->getHires()->count()>0) {
		echo Html::a('<span class="glyphicon glyphicon-info-sign"></span> Подробнее', ['videocassette/view', 'id' => $videocassette ->id],['class'=>'btn btn-primary']); 
		}?> <br><br>
		</td>
	</tr>
	 <?php } ?>
</table>