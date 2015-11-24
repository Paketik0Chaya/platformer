<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%News}}".
 *
 * @property integer $news_id
 * @property string $news_title
 * @property string $news_text
 * @property string $news_img
 * @property integer $news_date
 * @property integer $news_author
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
            [['news_text'], 'string'],
            [['news_title'], 'string', 'max' => 255],
            [['news_date', 'news_author'], 'required'],
            [['news_date', 'news_author', 'news_game_id', 'news_status'], 'integer'],
            [['news_img'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'news_id' => 'News ID',
            'news_title' => 'News Title',
            'news_text' => 'News Text',
            'news_img' => 'News Img',
            'news_date' => 'News Date',
            'news_author' => 'News Author',
            'news_game_id' => 'News Game ID',
            'news_status' => 'News Status',
        ];
    }
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['comment_news_id' => 'news_id']); //достать все комментарии связанные с конкретной новостью
    }
}
