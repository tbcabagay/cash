<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\base\NotSupportedException;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%user}}".
 *
 * @property integer $id
 * @property string $email
 * @property string $firstname
 * @property string $lastname
 * @property string $rescode
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Auth[] $auths
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    const STATUS_ACTIVE = 5;
    
    const STATUS_DELETE = 10;

    public $role;

    public $office;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email'], 'required'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['email', 'firstname', 'lastname'], 'string', 'max' => 255],
            [['rescode'], 'string', 'max' => 100],
            [['email'], 'unique'],
            ['email', 'email'],
            ['email', 'validateDomain'],
            ['office', 'each', 'rule' => ['string', 'max' => 10]],
            ['status', 'default', 'value' => self::STATUS_ACTIVE],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'email' => Yii::t('app', 'Email'),
            'firstname' => Yii::t('app', 'Firstname'),
            'lastname' => Yii::t('app', 'Lastname'),
            'rescode' => Yii::t('app', 'Rescode'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'role' => Yii::t('app', 'Role'),
            'office' => Yii::t('app', 'Office'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuths()
    {
        return $this->hasMany(Auth::className(), ['user_id' => 'id']);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('Method "' . __CLASS__ . '::' . __METHOD__ . '" is not implemented.');
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->auth_key === $authKey;
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => 'updated_at',
                ],
            ],
        ];
    }

    /**
     *
     */
    public static function findByEmail($email)
    {
        return self::findOne(['email' => $email]);
    }

    /*
     *
     */
    public function validateDomain($attribute, $params)
    {
        $email = explode('@', $this->$attribute);
        $domain = $email[1];

        if ($domain !== 'upou.edu.ph') {
            $this->addError($attribute, 'The email domain is invalid.');
        }
    }

    /*
     *
     */
    public function getRoleDropdownList()
    {
        $auth = Yii::$app->authManager;
        $roles = $auth->getRoles();
        return ArrayHelper::map($roles, 'name', 'name');
    }

    /*
     *
     */
    public function getRescodeDropdownList()
    {
        return [
            'FICS' => 'FICS',
            'FED' => 'FED',
            'FICS' => 'FICS',
            'OC' => 'OC',
            'EIDR' => 'EIDR',
            'MMC' => 'MMC',
            'OVCFA' => 'OVCFA',
            'OVCAA' => 'OVCAA',
            'LC' => 'LC',
            'OASIS' => 'OASIS',
            'OUR' => 'OUR',

        ];
    }
}
