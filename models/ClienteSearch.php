<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Cliente;

/**
 * ClienteSearch represents the model behind the search form of `app\models\Cliente`.
 */
class ClienteSearch extends Cliente
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cli_id'], 'integer'],
            [['cli_nombre', 'cli_apellido', 'cli_direccion', 'cli_ciudad', 'cli_telefono', 'cli_email', 'cli_fechaNacimiento'], 'safe'],
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
        $query = Cliente::find();

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
            'cli_id' => $this->cli_id,
            'cli_fechaNacimiento' => $this->cli_fechaNacimiento,
        ]);

        $query->andFilterWhere(['like', 'cli_nombre', $this->cli_nombre])
            ->andFilterWhere(['like', 'cli_apellido', $this->cli_apellido])
            ->andFilterWhere(['like', 'cli_direccion', $this->cli_direccion])
            ->andFilterWhere(['like', 'cli_ciudad', $this->cli_ciudad])
            ->andFilterWhere(['like', 'cli_telefono', $this->cli_telefono])
            ->andFilterWhere(['like', 'cli_email', $this->cli_email]);

        return $dataProvider;
    }
}
