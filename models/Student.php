<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "student".
 *
 * @property int $id
 * @property string $name
 * @property int $group
 * @property string $email
 */
class Student extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'student';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'group'], 'required'],
            [['group'], 'integer'],
            [['name', 'email'], 'string', 'max' => 255],
        ];
    }

    public function getGroupName()
    {
        return $this -> hasOne (Group::className(), ['id' => 'group']);
    }

    public function getLinks ()
    {
        return $this -> hasMany(Group::className(), ['id' => 'id']);
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'group' => 'Group',
            'email' => 'email',
        ];
    }
}
