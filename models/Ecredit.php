<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%ecredit}}".
 *
 * @property string $date
 * @property integer $ecreditno
 * @property string $alobs_no
 * @property string $dv_no
 * @property string $class
 * @property string $particular
 * @property string $fund
 * @property string $acicno
 * @property string $netamount
 * @property string $wtax
 * @property string $gross
 * @property string $payee
 * @property string $remarks
 * @property string $cancelled
 * @property string $claimed
 * @property string $available
 * @property string $rescode
 * @property string $chargeto
 * @property string $daterel
 * @property string $orno
 * @property string $tclass
 * @property string $ctime
 * @property string $enctime
 * @property string $printime
 * @property string $alobsled
 * @property string $ordate
 * @property string $cellno
 * @property string $daterecd
 * @property integer $payledrecno
 * @property string $nature
 * @property string $datetrans
 * @property string $created
 * @property string $accountno
 * @property string $email
 * @property string $debitdate
 * @property string $emailsent
 * @property integer $recno
 */
class Ecredit extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%ecredit}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date', 'daterel', 'ordate', 'daterecd', 'datetrans', 'created', 'debitdate', 'emailsent'], 'safe'],
            [['ecreditno', 'payledrecno'], 'integer'],
            [['netamount', 'wtax', 'gross'], 'number'],
            [['alobsled'], 'required'],
            [['alobsled'], 'string'],
            [['alobs_no', 'dv_no', 'acicno', 'chargeto', 'orno', 'cellno'], 'string', 'max' => 15],
            [['class', 'rescode'], 'string', 'max' => 10],
            [['particular', 'nature'], 'string', 'max' => 100],
            [['fund', 'ctime', 'enctime', 'printime'], 'string', 'max' => 20],
            [['payee'], 'string', 'max' => 60],
            [['remarks'], 'string', 'max' => 45],
            [['cancelled', 'claimed', 'available'], 'string', 'max' => 1],
            [['tclass'], 'string', 'max' => 2],
            [['accountno'], 'string', 'max' => 25],
            [['email'], 'string', 'max' => 80],
            [['ecreditno', 'fund'], 'unique', 'targetAttribute' => ['ecreditno', 'fund'], 'message' => 'The combination of Ecreditno and Fund has already been taken.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'date' => Yii::t('app', 'Date'),
            'ecreditno' => Yii::t('app', 'Ecreditno'),
            'alobs_no' => Yii::t('app', 'Alobs No'),
            'dv_no' => Yii::t('app', 'Dv No'),
            'class' => Yii::t('app', 'Class'),
            'particular' => Yii::t('app', 'Particular'),
            'fund' => Yii::t('app', 'Fund'),
            'acicno' => Yii::t('app', 'Acicno'),
            'netamount' => Yii::t('app', 'Netamount'),
            'wtax' => Yii::t('app', 'Wtax'),
            'gross' => Yii::t('app', 'Gross'),
            'payee' => Yii::t('app', 'Payee'),
            'remarks' => Yii::t('app', 'Remarks'),
            'cancelled' => Yii::t('app', 'Cancelled'),
            'claimed' => Yii::t('app', 'Claimed'),
            'available' => Yii::t('app', 'Available'),
            'rescode' => Yii::t('app', 'Rescode'),
            'chargeto' => Yii::t('app', 'Chargeto'),
            'daterel' => Yii::t('app', 'Daterel'),
            'orno' => Yii::t('app', 'Orno'),
            'tclass' => Yii::t('app', 'Tclass'),
            'ctime' => Yii::t('app', 'Ctime'),
            'enctime' => Yii::t('app', 'Enctime'),
            'printime' => Yii::t('app', 'Printime'),
            'alobsled' => Yii::t('app', 'Alobsled'),
            'ordate' => Yii::t('app', 'Ordate'),
            'cellno' => Yii::t('app', 'Cellno'),
            'daterecd' => Yii::t('app', 'Daterecd'),
            'payledrecno' => Yii::t('app', 'Payledrecno'),
            'nature' => Yii::t('app', 'Nature'),
            'datetrans' => Yii::t('app', 'Datetrans'),
            'created' => Yii::t('app', 'Created'),
            'accountno' => Yii::t('app', 'Accountno'),
            'email' => Yii::t('app', 'Email'),
            'debitdate' => Yii::t('app', 'Debitdate'),
            'emailsent' => Yii::t('app', 'Emailsent'),
            'recno' => Yii::t('app', 'Recno'),
        ];
    }
}
