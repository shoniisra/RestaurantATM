<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pedido".
 *
 * @property int $ped_id id de Pedido
 * @property string $ped_estado Estado de Pedido
 * @property string $ped_fecha Fecha Pedido
 *
 * @property Factura[] $facturas
 * @property Itempedido[] $itempedidos
 */
class Pedido extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pedido';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ped_estado', 'ped_fecha'], 'required'],
            [['ped_fecha'], 'safe'],
            [['ped_estado'], 'string', 'max' => 60],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ped_id' => 'Ped ID',
            'ped_estado' => 'Ped Estado',
            'ped_fecha' => 'Ped Fecha',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFacturas()
    {
        return $this->hasMany(Factura::className(), ['ped_id' => 'ped_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItempedidos()
    {
        return $this->hasMany(Itempedido::className(), ['ped_id' => 'ped_id']);
    }
}
