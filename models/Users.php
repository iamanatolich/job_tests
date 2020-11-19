<?php

namespace app\models;

use Yii;
use yii\web\ForbiddenHttpException;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $surname
 * @property string|null $login
 * @property string|null $pass
 * @property int|null $id_position
 *
 * @property Holidays[] $holidays
 */
class Users extends \yii\db\ActiveRecord implements IdentityInterface
{
    public $password;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_position'], 'integer'],
            [['name', 'surname'], 'string', 'max' => 150],
            [['login'], 'string', 'max' => 15],
            [['pass'], 'string', 'max' => 255],
            [['password'], 'string', 'max' => 255],
            [['login'], 'successLogin']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'surname' => 'Фамилия',
            'login' => 'Логин',
            'password' => 'Пароль',
            'pass' => 'Пароль',
            'id_position' => 'Роль',
        ];
    }

    /**
     * @inheritDoc
     */
    public static function findIdentity($id)
    {
        return Users::findOne($id);
    }

    /**
     * @inheritDoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        // TODO: Implement findIdentityByAccessToken() method.
    }

    /**
     * @inheritDoc
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @inheritDoc
     */
    public function getAuthKey()
    {
        // TODO: Implement getAuthKey() method.
    }

    /**
     * @inheritDoc
     */
    public function validateAuthKey($authKey)
    {
        // TODO: Implement validateAuthKey() method.
    }

    /**
     * @param $username
     * @return array|\yii\db\ActiveRecord|null
     */
    public static function findByUsername($username)
    {
        return Users::find()->where(['login' => $username])->one();
    }

    /**
     * @param $password
     * @return bool
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->pass);
    }

    public function create()
    {
        return $this->save(false);
    }

    public function getImage()
    {
        return $this->photo;
    }

    /**
     * Gets query for [[holidays]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHolidays()
    {
        return $this->hasMany(Holidays::className(), ['id_user' => 'id']);
    }

    public function getFullName()
    {
        return $this->name . ' ' . $this->surname;
    }

    public function updateUsers()
    {
        if(Yii::$app->user->identity->id_position !== 1)
        {
            $this->id_position = '0';
        }
        return $this->save();
    }

    public function setPassword($password)
    {
        $this->pass = Yii::$app->security->generatePasswordHash($password);
        return $this->save();
    }

    public function successLogin()
    {
        $login = $this->login;
        if($login != Yii::$app->user->identity->login)
           if ($login = Users::findByUsername($login)) {
                   $this->addError('login', 'Пользователь с таким логином уже существует');
           }
    }
}
