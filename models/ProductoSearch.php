<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Producto;

/**
 * ProductoSearch represents the model behind the search form of `app\models\Producto`.
 */
class ProductoSearch extends Producto
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pro_id', 'cat_id'], 'integer'],
            [['pro_nombre', 'pro_descripcion', 'pro_imagen', 'pro_estado'], 'safe'],
            [['pro_costo', 'pro_precio'], 'number'],
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
        $query = Producto::find();

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
            'pro_id' => $this->pro_id,
            'pro_costo' => $this->pro_costo,
            'pro_precio' => $this->pro_precio,
            'cat_id' => $this->cat_id,
        ]);

        $query->andFilterWhere(['like', 'pro_nombre', $this->pro_nombre])
            ->andFilterWhere(['like', 'pro_descripcion', $this->pro_descripcion])
            ->andFilterWhere(['like', 'pro_imagen', $this->pro_imagen])
            ->andFilterWhere(['like', 'pro_estado', $this->pro_estado]);

        return $dataProvider;
    }
}
