<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "client".
 *
 * @property integer $id
 * @property string $passport
 * @property string $last_name
 * @property string $first_name
 * @property string $patronymic_name
 * @property string $phone_number
 *
 * @property Hire[] $hires
 */
class Client extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'client';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['passport', 'last_name', 'first_name', 'patronymic_name', 'phone_number'], 'required', 'message' =>'Поле обязательно для заполнения!'],
            [['passport'], 'string', 'max' => 10],
            [['last_name', 'first_name', 'patronymic_name'], 'string', 'max' => 40],
            [['phone_number'], 'string', 'max' => 11],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'passport' => 'Паспортные данные',
            'last_name' => 'Фамилия',
            'first_name' => 'Имя',
            'patronymic_name' => 'Отчество',
            'phone_number' => 'Номер телефона',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHires()
    {
        return $this->hasMany(Hire::className(), ['client_id' => 'id']);
    }
}
