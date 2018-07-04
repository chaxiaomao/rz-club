<?php

namespace common\models\search;

use common\models\entity\ActivityLabelRs;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\entity\Activity;

/**
 * ActivitySearch represents the model behind the search form about `common\models\entity\Activity`.
 */
class ActivitySearch extends Activity
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'limit_count', 'favor', 'forward', 'status'], 'integer'],
            [['title', 'hold_date', 'cover', 'content', 'created_at', 'updated_at'], 'safe'],
            [['cost_price'], 'number'],
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
        $query = Activity::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'limit_count' => $this->limit_count,
            'cost_price' => $this->cost_price,
            'hold_date' => $this->hold_date,
            'favor' => $this->favor,
            'forward' => $this->forward,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'cover', $this->cover])
            ->andFilterWhere(['like', 'content', $this->content]);

        return $dataProvider;
    }

}
