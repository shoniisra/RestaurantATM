<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Cobro;

/**
 * CobroSearch represents the model behind the search form of `app\models\Cobro`.
 */
class CobroSearch extends Cobro
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cob_id'], 'integer'],
            [['cob_total'], 'number'],
            [['cob_cuenta_A', 'cob_cuenta_B', 'cob_estado'], 'safe'],
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
        $query = Cobro::find();

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
            'cob_id' => $this->cob_id,
            'cob_total' => $this->cob_total,
        ]);

        $query->andFilterWhere(['like', 'cob_cuenta_A', $this->cob_cuenta_A])
            ->andFilterWhere(['like', 'cob_cuenta_B', $this->cob_cuenta_B])
            ->andFilterWhere(['like', 'cob_estado', $this->cob_estado]);

        return $dataProvider;
    }
}
