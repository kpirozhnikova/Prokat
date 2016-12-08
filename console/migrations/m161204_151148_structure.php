<?php

use yii\db\Migration;

class m161204_151148_structure extends Migration
{
    public function up()
    {
        $this -> execute("
        CREATE TABLE IF NOT EXISTS `client` (
  `id` int(11) NOT NULL,
  `passport` varchar(10) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `first_name` varchar(40) NOT NULL,
  `patronymic_name` varchar(40) NOT NULL,
  `phone_number` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `videocassette`
--

CREATE TABLE IF NOT EXISTS `videocassette` (
  `id` int(11) NOT NULL,
  `name_videocassette` varchar(100) NOT NULL,
  `year` year(4) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `hire`
--
ALTER TABLE `hire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `videocassette`
--
ALTER TABLE `videocassette`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `hire`
--
ALTER TABLE `hire`
  ADD CONSTRAINT `hire_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`),
  ADD CONSTRAINT `hire_ibfk_2` FOREIGN KEY (`videocassette_id`) REFERENCES `videocassette` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */; 
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
