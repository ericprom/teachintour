<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "applications".
 *
 * @property integer $id
 * @property integer $approval
 * @property double $approvedAt
 * @property double $createdAt
 * @property integer $createdBy
 * @property double $updatedAt
 * @property integer $updatedBy
 * @property integer $inactive
 */
class Applications extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'applications';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['approval', 'createdBy', 'updatedBy', 'inactive'], 'integer'],
            [['approvedAt', 'createdAt', 'updatedAt'], 'number'],
            // [['createdAt', 'createdBy'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'approval' => 'Approval',
            'approvedAt' => 'Approved At',
            'createdAt' => 'Created At',
            'createdBy' => 'Created By',
            'updatedAt' => 'Updated At',
            'updatedBy' => 'Updated By',
            'inactive' => 'Inactive',
        ];
    }
}
