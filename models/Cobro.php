<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cobro".
 *
 * @property int $cob_id id de Cobro
 * @property double $cob_total Total de Cobro
 * @property string $cob_cuenta_A Cuenta A de Cobro
 * @property string $cob_cuenta_B Cuenta B de Cobro
 * @property string $cob_estado Estado de Cobro
 *
 * @property Factura[] $facturas
 */
class Cobro extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cobro';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cob_total', 'cob_cuenta_A', 'cob_cuenta_B', 'cob_estado'], 'required'],
            [['cob_total'], 'number'],
            [['cob_cuenta_A', 'cob_cuenta_B', 'cob_estado'], 'string', 'max' => 60],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cob_id' => 'id de Cobro',
            'cob_total' => 'Total de Cobro',
            'cob_cuenta_A' => 'Cuenta A de Cobro',
            'cob_cuenta_B' => 'Cuenta B de Cobro',
            'cob_estado' => 'Estado de Cobro',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFacturas()
    {
        return $this->hasMany(Factura::className(), ['cob_id' => 'cob_id']);
    }
}
