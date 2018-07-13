<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cliente".
 *
 * @property int $cli_id id de Cliente
 * @property string $cli_nombre Nombre de Cliente
 * @property string $cli_apellido Apellido de Cliente
 * @property string $cli_direccion Direccion de de Cliente
 * @property string $cli_ciudad Ciudad de Cliente
 * @property string $cli_telefono Telefono de Cliente
 * @property string $cli_email Email de Cliente
 * @property string $cli_fechaNacimiento Nacimiento de Cliente
 *
 * @property Factura[] $facturas
 */
class Cliente extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cliente';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cli_nombre', 'cli_apellido', 'cli_direccion', 'cli_ciudad', 'cli_telefono', 'cli_email', 'cli_fechaNacimiento'], 'required'],
            [['cli_fechaNacimiento'], 'safe'],
            [['cli_nombre', 'cli_apellido', 'cli_direccion', 'cli_ciudad', 'cli_telefono', 'cli_email'], 'string', 'max' => 60],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cli_id' => 'id de Cliente',
            'cli_nombre' => 'Nombre de Cliente',
            'cli_apellido' => 'Apellido de Cliente',
            'cli_direccion' => 'Direccion de de Cliente',
            'cli_ciudad' => 'Ciudad de Cliente',
            'cli_telefono' => 'Telefono de Cliente',
            'cli_email' => 'Email de Cliente',
            'cli_fechaNacimiento' => 'Nacimiento de Cliente',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFacturas()
    {
        return $this->hasMany(Factura::className(), ['cli_id' => 'cli_id']);
    }
}
