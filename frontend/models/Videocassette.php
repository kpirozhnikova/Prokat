<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "videocassette".
 *
 * @property integer $id
 * @property string $name_videocassette
 * @property string $year
 * @property string $description
 * @property integer $status
 *
 * @property Hire[] $hires
 */
class Videocassette extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'videocassette';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name_videocassette', 'year', 'description', 'status'], 'required' , 'message' =>'Поле обязательно для заполнения!'],
            [['year'], 'safe'],
            [['description'], 'string'],
            [['status'], 'integer'],
            [['name_videocassette'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name_videocassette' => 'Название',
            'year' => 'Год выпуска',
            'description' => 'Описание',
            'status' => 'Наличие',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHires()
    {
        return $this->hasMany(Hire::className(), ['videocassette_id' => 'id']);
    }
}
