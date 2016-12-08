<div class="jumbotron">
  <h1><?= htmlspecialchars($student->last_name); ?>
  <?= htmlspecialchars($student->first_name); ?> 
  </h1>
  <p> Данные посещаемости </p>
  <ul>
  <?php foreach($student->getAttendances() ->all() 
  as $attendance) { ?>
  <ul> 
  <?php 
	echo $attendance->getLessons()->one()->date;
	?>:<?php
	if ($attendance->status == "1") {
		echo 'Был';
	}else{
		echo 'Не был';
	} 
	?> </ul>
  <?php } ?>
  </ul>
</div>