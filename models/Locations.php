<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Locations".
 *
 * @property integer $id
 * @property string $title
 * @property string $detail
 * @property string $cover
 * @property string $available
 * @property double $createdAt
 * @property integer $createdBy
 * @property double $updatedAt
 * @property integer $updatedBy
 * @property integer $inactive
 */
class Locations extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'locations';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // [['title', 'detail', 'available', 'createdAt', 'createdBy'], 'required'],
            [['detail', 'cover'], 'string'],
            [['createdAt', 'updatedAt'], 'number'],
            [['createdBy', 'updatedBy', 'inactive'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['available'], 'string', 'max' => 5],
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
            'detail' => 'Detail',
            'cover' => 'Cover',
            'available' => 'Available',
            'createdAt' => 'Created At',
            'createdBy' => 'Created By',
            'updatedAt' => 'Updated At',
            'updatedBy' => 'Updated By',
            'inactive' => 'Inactive',
        ];
    }
}
