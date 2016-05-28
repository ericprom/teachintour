<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Fees".
 *
 * @property integer $id
 * @property string $title
 * @property double $price
 * @property string $detail
 * @property string $popular
 * @property string $shelf
 * @property string $available
 * @property double $createdAt
 * @property integer $createdBy
 * @property double $updatedAt
 * @property integer $updatedBy
 * @property integer $inactive
 */
class Fees extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Fees';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // [['id', 'title', 'price', 'detail', 'popular', 'shelf', 'available', 'createdAt', 'createdBy'], 'required'],
            [['id', 'createdBy', 'updatedBy', 'inactive'], 'integer'],
            [['price', 'createdAt', 'updatedAt'], 'number'],
            [['detail'], 'string'],
            [['title'], 'string', 'max' => 10],
            [['popular', 'shelf', 'available'], 'string', 'max' => 5],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'price' => 'Price',
            'detail' => 'Detail',
            'popular' => 'Popular',
            'shelf' => 'Shelf',
            'available' => 'Available',
            'createdAt' => 'Created At',
            'createdBy' => 'Created By',
            'updatedAt' => 'Updated At',
            'updatedBy' => 'Updated By',
            'inactive' => 'Inactive',
        ];
    }
}
