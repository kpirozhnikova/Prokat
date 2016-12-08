<?php

use yii\db\Migration;

class m161204_151148_structure extends Migration
{
    public function up()
    {	$hash= '$2y$13$34s6m5Qgvtt0qJRN4aql9uJe8gH.gDKjaeeXRrlMFsC2s61uZOsm2';
	    $this->execute("INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
		(1, 'admin', 'G-PanNGDg28LflvcXAZHhjyiKOrx2_zj', '$hash', NULL, 'a@a.a', 10, 1480948154, 1480948154);");
        $this -> execute("CREATE TABLE IF NOT EXISTS `client` (
  `id` int(11) NOT NULL,
  `passport` varchar(10) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `first_name` varchar(40) NOT NULL,
  `patronymic_name` varchar(40) NOT NULL,
  `phone_number` varchar(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `client`
--

INSERT INTO `client` (`id`, `passport`, `last_name`, `first_name`, `patronymic_name`, `phone_number`) VALUES
(1, '5548598713', 'Хорьков', 'Петр', 'Геннадьевич', '89137785481'),
(2, '5436987451', 'Иванов', 'Ефим', 'Петрович', '89345267629'),
(3, '6574890465', 'Колпаков', 'Андрей', 'Викторовия', '89456425368'),
(4, '4987451264', 'Аксаков', 'Федор', 'Борисович', '89742541879'),
(5, '4785124857', 'Костин', 'Евгений', 'Александрович', '79654128793');

-- --------------------------------------------------------

--
-- Структура таблицы `hire`
--

CREATE TABLE IF NOT EXISTS `hire` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `videocassette_id` int(11) NOT NULL,
  `taking_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `return_date` date NOT NULL,
  `hire_price` decimal(10,0) NOT NULL,
  `fact_date` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `hire`
--

INSERT INTO `hire` (`id`, `client_id`, `videocassette_id`, `taking_date`, `return_date`, `hire_price`, `fact_date`) VALUES
(1, 3, 3, '2016-12-06 12:27:45', '2016-12-06', '120', '2016-12-07'),
(2, 1, 2, '2016-12-06 12:38:40', '2016-12-03', '143', '2016-12-01'),
(4, 2, 3, '2016-12-07 13:29:34', '2016-12-15', '89', NULL),
(5, 1, 2, '2016-12-07 14:45:18', '2016-12-06', '1111', '2016-12-07'),
(6, 5, 5, '2016-12-08 14:05:35', '2016-12-20', '100', NULL),
(7, 4, 4, '2016-12-08 14:06:08', '2016-12-07', '75', NULL),
(8, 3, 6, '2016-12-08 14:25:37', '2016-12-06', '63', NULL);


--
-- Структура таблицы `videocassette`
--

CREATE TABLE IF NOT EXISTS `videocassette` (
  `id` int(11) NOT NULL,
  `name_videocassette` varchar(100) NOT NULL,
  `year` year(4) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `videocassette`
--

INSERT INTO `videocassette` (`id`, `name_videocassette`, `year`, `description`, `status`) VALUES
(1, 'Бойцовский Клуб (Триллер)', 1998, 'Терзаемый хронической бессонницей и отчаянно пытающийся вырваться из мучительно скучной жизни, клерк встречает некоего Тайлера Дардена, харизматического торговца мылом с извращенной философией. Тайлер уверен, что самосовершенствование - удел слабых, а саморазрушение - единственное, ради чего стоит жить. Пройдет немного времени...', 0),
(2, 'Зелёная миля (Детектив)', 1999, 'Обвиненный в страшном преступлении, Джон Коффи оказывается в блоке смертников тюрьмы «Холодная гора». Вновь прибывший обладал поразительным ростом и был пугающе спокоен, что, впрочем, никак не влияло...', 1),
(3, 'Иван Васильевич меняет профессию (Комедия)', 1973, 'Инженер-изобретатель Тимофеев сконструировал машину времени, которая соединила его квартиру с далеким шестнадцатым веком - точнее, с палатами государя Ивана Грозного. Туда-то и попадают тезка царя пенсионер-общественник Иван Васильевич Бунша и квартирный вор Жорж Милославский...', 1),
(4, 'Леон (Триллер)', 1994, 'Профессиональный убийца Леон, не знающий пощады и жалости, знакомится со своей очаровательной соседкой Матильдой, семью которой расстреливают полицейские, замешанные в торговле наркотиками...', 1),
(5, 'Шерлок Холмс', 2009, 'Величайший в истории сыщик Шерлок Холмс вместе со своим верным соратником Ватсоном вступают в схватку, требующую нешуточной физической и умственной подготовки, ведь их враг представляет угрозу для всего Лондона...', 1),
(6, 'Побег из Шоушенка', 1994, 'Успешный банкир Энди Дюфрейн обвинен в убийстве собственной жены и ее любовника. Оказавшись в тюрьме под названием Шоушенк, он сталкивается с жестокостью и беззаконием, царящими по обе стороны решетки...', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `hire`
--
ALTER TABLE `hire`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_id` (`client_id`),
  ADD KEY `videocassette_id` (`videocassette_id`);


--
-- Индексы таблицы `videocassette`
--
ALTER TABLE `videocassette`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `hire`
--
ALTER TABLE `hire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
--
-- AUTO_INCREMENT для таблицы `videocassette`
--
ALTER TABLE `videocassette`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `hire`
--
ALTER TABLE `hire`
  ADD CONSTRAINT `hire_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`),
  ADD CONSTRAINT `hire_ibfk_2` FOREIGN KEY (`videocassette_id`) REFERENCES `videocassette` (`id`);
");
    }

    public function down()
    {
        echo "m161204_151148_structure cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
