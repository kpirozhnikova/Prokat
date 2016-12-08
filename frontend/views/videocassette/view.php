<div class="jumbotron">
  <h2><?= htmlspecialchars($videocassette->name_videocassette); ?> 
  </h2>
  <?php foreach($videocassette->getHires() ->all() 
  as $hire) { ?>
  <hr>
  Фамилия: <?php echo $hire->getClient()->one()->last_name; ?>
  <br>
  Имя: <?php echo $hire->getClient()->one()->first_name; ?>
  <br>
	Дата выдачи: <?php echo $hire->taking_date; ?>
  <br>
  Дата возврата: <?php echo $hire->return_date; ?>
  <br>
  <hr>
  <?php } ?>
</div>