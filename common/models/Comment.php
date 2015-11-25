<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%Comment}}".
 *
 * @property integer $comment_id
 * @property integer $comment_autor_id
 *  @property string $comment_autor_name
 * @property integer $comment_news_id
 * @property integer $comment_date
 * @property string $comment_text
 */
class Comment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%Comment}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['comment_text'], 'required'],
            [['comment_autor_id', 'comment_news_id', 'comment_date'], 'integer'],
            [['comment_text', 'comment_autor_name'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'comment_id' => 'ID',
            'comment_autor_id' => 'Автор',
            'comment_news_id' => 'Новость',
            'comment_date' => 'Дата',
            'comment_text' => 'Текст комментария',
        ];
    }

}
