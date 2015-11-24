<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\News;

/**
 * NewsSearch represents the model behind the search form about `common\models\News`.
 */
class NewsSearch extends News
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['news_id', 'news_date', 'news_author', 'news_game_id', 'news_status'], 'integer'],
            [['news_text', 'news_img'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = News::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'news_id' => $this->news_id,
            'news_date' => $this->news_date,
            'news_author' => $this->news_author,
            'news_game_id' => $this->news_game_id,
            'news_status' => $this->news_status,
        ]);

        $query->andFilterWhere(['like', 'news_text', $this->news_text])
            ->andFilterWhere(['like', 'news_img', $this->news_img]);

        return $dataProvider;
    }
}
