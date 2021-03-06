<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "applications".
 *
 * @property integer $id
 * @property string $firstname
 * @property string $lastname
 * @property string $nationality
 * @property string $passport
 * @property string $date_of_birth
 * @property integer $gender
 * @property string $email
 * @property string $line
 * @property string $facebook
 * @property string $skype
 * @property string $phone
 * @property string $street
 * @property string $city
 * @property string $state
 * @property string $zipcode
 * @property string $country
 * @property integer $location_id
 * @property integer $project_id
 * @property integer $fee_id
 * @property string $start_date
 * @property string $education
 * @property string $experience
 * @property string $language
 * @property string $skill
 * @property string $emergency
 * @property string $violation
 * @property string $violation_detail
 * @property string $criminal
 * @property string $criminal_detail
 * @property string $agreement
 * @property string $note
 * @property string $paid
 * @property double $receivedAt
 * @property integer $receivedBy
 * @property string $approval
 * @property double $approvedAt
 * @property integer $approvedBy
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
            // [['firstname', 'lastname', 'nationality', 'passport', 'date_of_birth', 'gender', 'email', 'phone', 'street', 'city', 'state', 'zipcode', 'country', 'location_id', 'project_id', 'fee_id', 'start_date', 'education', 'experience', 'language', 'skill', 'emergency', 'violation', 'criminal', 'agreement', 'approvedBy', 'createdAt', 'createdBy'], 'required'],
            [['date_of_birth', 'start_date'], 'safe'],
            [['gender', 'location_id', 'project_id', 'fee_id', 'receivedBy', 'approvedBy', 'createdBy', 'updatedBy', 'inactive'], 'integer'],
            [['education', 'experience', 'language', 'skill', 'emergency', 'violation_detail', 'criminal_detail', 'note'], 'string'],
            [['receivedAt', 'approvedAt', 'createdAt', 'updatedAt'], 'number'],
            [['firstname', 'lastname', 'nationality', 'email', 'phone', 'street', 'city', 'state', 'zipcode', 'country'], 'string', 'max' => 80],
            [['passport', 'line', 'facebook', 'skype'], 'string', 'max' => 30],
            [['violation', 'criminal', 'agreement', 'paid', 'approval'], 'string', 'max' => 5],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'firstname' => 'Firstname',
            'lastname' => 'Lastname',
            'nationality' => 'Nationality',
            'passport' => 'Passport',
            'date_of_birth' => 'Date Of Birth',
            'gender' => 'Gender',
            'email' => 'Email',
            'line' => 'Line',
            'facebook' => 'Facebook',
            'skype' => 'Skype',
            'phone' => 'Phone',
            'street' => 'Street',
            'city' => 'City',
            'state' => 'State',
            'zipcode' => 'Zipcode',
            'country' => 'Country',
            'location_id' => 'Location ID',
            'project_id' => 'Project ID',
            'fee_id' => 'Fee ID',
            'start_date' => 'Start Date',
            'education' => 'Education',
            'experience' => 'Experience',
            'language' => 'Language',
            'skill' => 'Skill',
            'emergency' => 'Emergency',
            'violation' => 'Violation',
            'violation_detail' => 'Violation Detail',
            'criminal' => 'Criminal',
            'criminal_detail' => 'Criminal Detail',
            'agreement' => 'Agreement',
            'note' => 'Note',
            'paid' => 'Paid',
            'receivedAt' => 'Received At',
            'receivedBy' => 'Received By',
            'approval' => 'Approval',
            'approvedAt' => 'Approved At',
            'approvedBy' => 'Approved By',
            'createdAt' => 'Created At',
            'createdBy' => 'Created By',
            'updatedAt' => 'Updated At',
            'updatedBy' => 'Updated By',
            'inactive' => 'Inactive',
        ];
    }
    public function getLocation()
    {
        return $this->hasOne(Locations::className(), ['id' => 'location_id']);
    }
    public function getProject()
    {
        return $this->hasOne(Projects::className(), ['id' => 'project_id']);
    }
    public function getFee()
    {
        return $this->hasOne(Fees::className(), ['id' => 'fee_id']);
    }
}
