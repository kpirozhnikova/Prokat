<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "hire".
 *
 * @property integer $id
 * @property integer $client_id
 * @property integer $videocassette_id
 * @property string $taking_date
 * @property string $return_date
 * @property string $hire_price
 * @property string $fact_date
 *
 * @property Client $client
 * @property Videocassette $videocassette
 */
class Hire extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hire';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['client_id', 'videocassette_id', 'return_date', 'hire_price'], 'required', 'message'=>'Поле обязательно для заполнения!'],
            [['client_id', 'videocassette_id'], 'integer'],
            [['taking_date'], 'date', 'format'=>'y-m-d H:i:s', 'message'=>'Неверный формат даты'],
            [['return_date'], 'date', 'format'=>'y-m-d', 'message'=>'Неверный формат даты'],
            [['fact_date'], 'date', 'format'=>'y-m-d', 'message'=>'Неверный формат даты'],
            [['taking_date', 'return_date', 'fact_date'], 'safe'],
            [['hire_price'], 'number', 'message'=>'Неверный формат стоимости'],
            [['client_id'], 'exist', 'skipOnError' => true, 'targetClass' => Client::className(), 'targetAttribute' => ['client_id' => 'id']],
            [['videocassette_id'], 'exist', 'skipOnError' => true, 'targetClass' => Videocassette::className(), 'targetAttribute' => ['videocassette_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'client_id' => 'Клиент',
            'videocassette_id' => 'Видеокассета',
            'taking_date' => 'Дата выдачи',
            'return_date' => 'Дата возврата (ГГГГ-ММ-ДД)',
            'hire_price' => 'Цена проката (ед.)',
            'fact_date' => 'Дата фактического возврата (ГГГГ-ММ-ДД)',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClient()
    {
        return $this->hasOne(Client::className(), ['id' => 'client_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVideocassette()
    {
        return $this->hasOne(Videocassette::className(), ['id' => 'videocassette_id']);
    }
}
