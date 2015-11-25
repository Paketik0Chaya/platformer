<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%Games}}".
 *
 * @property integer $game_id
 * @property string $game_text
 * @property string $image
 * @property integer $game_status
 */
class Games extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%Games}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['game_title'], 'string', 'max' => 255],
            [['game_text'], 'string'],
            [['game_status'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'game_id' => 'Game ID',
            'game_title'=> "Название игры",
            'game_text' => 'Описание игры',
            'image' => 'Изображение',
            'game_status' => 'Опубликовать?',
        ];
    }
    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }
}
