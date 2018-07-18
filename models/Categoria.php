<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "categoria".
 *
 * @property int $cat_id Id de Categoria
 * @property string $cat_nombre Nombre de Categoria
 * @property string $cat_imagen Imagen de Categoria
 * @property string $cat_descripcion Descripcion de Categoria
 *
 * @property Producto[] $productos
 */
class Categoria extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'categoria';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cat_nombre', 'cat_descripcion'], 'required'],
            [['cat_nombre'], 'string', 'max' => 60],
            [['cat_descripcion'], 'string', 'max' => 200],
			[['cat_imagen'], 'default', 'value' => 'no image'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cat_id' => 'Id de Categoria',
            'cat_nombre' => 'Nombre de Categoria',
            'cat_imagen' => 'Imagen de Categoria',
            'cat_descripcion' => 'Descripcion de Categoria',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductos()
    {
        return $this->hasMany(Producto::className(), ['cat_id' => 'cat_id']);
    }
}
