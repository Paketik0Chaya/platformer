<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%News}}".
 *
 * @property integer $id
 * @property string $news_title
 * @property string $news_text
 * @property string $image
 * @property integer $news_date
 * @property integer $news_author
 * @property integer $news_game_name
 * @property integer $news_game_id
 * @property integer $news_status
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%News}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['news_text', 'news_author', 'news_game_name',], 'string'],
            [['news_title'], 'string', 'max' => 255],
            [['news_date', 'news_status'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'News ID',
            'news_title' => 'Загаловок',
            'news_text' => 'Текст новости',
            'image' => 'Изображение',
            'news_date' => 'Дата',
            'news_author' => 'Автор',
            'news_game_name' => 'Игра',
            'news_status' => 'Опубликовать?',
        ];
    }
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['comment_news_id' => 'id']); //достать все комментарии связанные с конкретной новостью
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
