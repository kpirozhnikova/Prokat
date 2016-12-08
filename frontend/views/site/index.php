<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
 <style type="text/css">

   h2 {
    padding-bottom: 80px;
    margin-bottom: 80px;
    font-style: italic;
   }
   p {  
    font-family: serif; 
    text-align: left;

   }

   .kvadrat {
    height:300px
    weight:300px;
    background-color: #BDBDBD;
    opacity: 0.9;
    boder:1px;
    }

  .ramka{
      margin-left: 30%; /* Отступ слева */
      margin-right: 30%; /* Отступ справа */
      background: #FF9; /* Фоновый цвет блока */
      width: 350px; /* Ширина блока */
      height: 80px; /* Высота блока */
      border: 4px solid #777; /* Ширина вид и цвет рамки */
      border-radius:30px; /* Радиус скругления углов*/
      -webkit-border-radius:30px; /* Safari, Chrome */
      -moz-border-radius:30px; /* Firefox */
      box-shadow: 0 0 10px 2px #1A3457; /* Тень*/
      -webkit-box-shadow: 0 0 10px 2px #1A3457; /* Safari, Chrome */
      -moz-box-shadow: 0 0 10px 2px #1A3457; /* Firefox */
    }
 </style>
<div class="index">
<div class="kvadrat">

    <div class="jumbotron">
        <h2 class="ramka">Прокат видеокассет "Video factory"</h2>
        <br>
        <p align="left"> Наш адрес: г. Новосибирск, ул. Военная, 2 <br>
            Телефоны для связи: +7 (383) 212-01-31 <br>
            Время работы: пн, ср, птн с 12:00 <br> до 18:00, без перерывов. <br>
            Выдача видеокассет производится только при наличии паспорта!<br> 
            Стоимость проката определяется в момент оформления. 
        </p><br>
        <p><a class="btn btn-lg btn-warning" href="/?r=videocassette">Список видеокассет</a></p>
    </div>
</div>
</div>
