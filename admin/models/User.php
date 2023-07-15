<?php

namespace app\models;

use Yii;
use yii\data\ActiveDataProvider;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\base\InvalidParamException;
use app\models\Authassignment;

class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public $role;
    // public $username;
    public $errorCode;
    public $errorMessage;
    public $search_username;

    public function rules()
    {
        return [
            [['username','name', 'email'], 'required'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['username', 'auth_key'], 'string', 'max' => 32],
            [[ 'username','name','role', 'email', 'password_hash', 'auth_key', 'created_at', 'updated_at', 'registration_ip'], 'safe'],
            [['password_hash', 'password_reset_token', 'email'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'name'=>'Name',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'registration_ip' => Yii::t('app', 'Registration Ip'),
            'email' => 'Email',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
    public static function getClientIP(){
        if (array_key_exists('HTTP_CLIENT_IP', $_SERVER)) {
            return $_SERVER["HTTP_CLIENT_IP"]; 
        }elseif (array_key_exists('HTTP_X_FORWARDED_FOR', $_SERVER)){
            return  $_SERVER["HTTP_X_FORWARDED_FOR"];  
        }elseif (array_key_exists('REMOTE_ADDR', $_SERVER)) { 
            return $_SERVER["REMOTE_ADDR"]; 
        }
        return '';
    }

    public function assignDefaultRole()
    { 
        $role = 'global';        
        $this->assignRole($role);
    }

    public function assignRole($role)
    {
        
        // if(Yii::$app->session->get('havedb')==0){
           
        //     $username = Yii::$app->session->get('username');

        // }else{
        //     $username = $this->username;
        // }
        $username = $this->username;         
        $auth = Yii::$app->authManager;
        $auth->revokeAll($username); // Rovoke all user role

        $roleObject = $auth->getRole($role);
        if (!$roleObject) throw new InvalidParamException("There is no role \"$role\".");
              
        $auth->assign($roleObject, $username);
    }

    public function getUserRole()
    {
        $username = $this->username;
        $model_assign = Authassignment::find()->where(['user_id' => $username])->one();  
        // echo $username;
        // exit;
        return  $model_assign->item_name;
    }

    public function getAuthAssignments()
    {
        return $this->hasMany(Authassignment::className(), ['user_id' => 'username']);
    }

    public function hasRole($roleName, $userId) {
        $authManager = \Yii::$app->getAuthManager();
        return $authManager->getAssignment($roleName, $userId) ? true : false;
    }
}
