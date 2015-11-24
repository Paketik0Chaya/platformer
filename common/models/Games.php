<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%Games}}".
 *
 * @property integer $game_id
 * @property string $game_text
 * @property string $game_img
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
            [['game_img'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'game_id' => 'Game ID',
            'game_title'=> "Game Title",
            'game_text' => 'Game Text',
            'game_img' => 'Game Img',
            'game_status' => 'Game Status',
        ];
    }
}
