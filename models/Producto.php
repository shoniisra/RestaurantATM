<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "producto".
 *
 * @property int $pro_id id de Producto
 * @property string $pro_nombre Nombre de Producto
 * @property string $pro_descripcion Descripcion de Producto
 * @property double $pro_costo Costo de Producto
 * @property double $pro_precio Precio de Producto
 * @property string $pro_imagen Imagen de Producto
 * @property string $pro_estado Estado de Producto
 * @property int $cat_id id Categoria
 *
 * @property Itempedido[] $itempedidos
 * @property Categoria $cat
 */
class Producto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'producto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pro_nombre', 'pro_descripcion', 'pro_costo', 'pro_precio', 'pro_estado', 'cat_id'], 'required'],
            [['pro_costo', 'pro_precio'], 'number'],
            [['cat_id'], 'integer'],
            [['pro_nombre', 'pro_estado'], 'string', 'max' => 60],
            [['pro_descripcion', 'pro_imagen'], 'string', 'max' => 200],
			[['pro_imagen'], 'default', 'value' => 'no image'],

			
            [['cat_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categoria::className(), 'targetAttribute' => ['cat_id' => 'cat_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pro_id' => 'id de Producto',
            'pro_nombre' => 'Nombre de Producto',
            'pro_descripcion' => 'Descripcion de Producto',
            'pro_costo' => 'Costo de Producto',
            'pro_precio' => 'Precio de Producto',
            'pro_imagen' => 'Imagen de Producto',
            'pro_estado' => 'Estado de Producto',
            'cat_id' => 'id Categoria',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItempedidos()
    {
        return $this->hasMany(Itempedido::className(), ['pro_id' => 'pro_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCat()
    {
        return $this->hasOne(Categoria::className(), ['cat_id' => 'cat_id']);
    }
}
