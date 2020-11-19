<?php

namespace app\models;

use yii\base\Model;

class SignupForm extends Model
{
    public $name;
    public $login;
    public $password;

    public function rules()
    {
        return [
        [['name', 'surname', 'login', 'password'], 'required'],
        [['name'], 'string'],
        [['surname'], 'string'],
        [['login'], 'string'],
            ];
    }

    public function signup()
    {
        if($this->validate())
        {
            $user = new Users();
            $user->attributes = $this->attributes;
            return $user->create();
        }
    }
}