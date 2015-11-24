<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%Comment}}".
 *
 * @property integer $comment_id
 * @property integer $comment_autor_id
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
            [['comment_autor_id', 'comment_news_id', 'comment_date', 'comment_text'], 'required'],
            [['comment_autor_id', 'comment_news_id', 'comment_date'], 'integer'],
            [['comment_text'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'comment_id' => 'comment ID',
            'comment_autor_id' => 'comment Autor ID',
            'comment_news_id' => 'comment News ID',
            'comment_date' => 'comment Date',
            'comment_text' => 'comment Text',
        ];
    }
}
