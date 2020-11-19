<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "holidays".
 *
 * @property int $id
 * @property string|null $date_in
 * @property string|null $date_out
 * @property int|null $id_user
 * @property int|null $approved
 *
 * @property Users $user
 */
class Holidays extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'holidays';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date_in', 'date_out'], 'safe'],
            [['id_user', 'approved'], 'integer'],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['id_user' => 'id']],
            [['date_in', 'date_out'], 'validateDate'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'id',
            'date_in' => 'Дата начала',
            'date_out' => 'Дата окончания',
            'id_user' => 'Пользователь',
            'approved' => 'Согласование',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'id_user']);
    }

    public function saveHolidays()
    {
        $this->id_user = Yii::$app->user->id;
        return $this->save();
    }

    public function validateDate()
    {

        $currentDate = date('Y-m-d');

        if ($this->date_in > $this->date_out){
            $this->addError('date_in', '"Проверьте дату окончания"');
            $this->addError('date_out', '"Дата окончания", не может быть раньше "даты начала"');
        }

        if ($this->isNewRecord){
            if ($currentDate > $this->date_in) {
                $this->addError('date_in', '"Дата начала", не может быть раньше текущей даты');
            }

            if ($currentDate > $this->date_out){
                $this->addError('date_out', '"Дата окончания", не может быть раньше текущей даты');
            }
        }

    }
}
