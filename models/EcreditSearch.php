<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Ecredit;

/**
 * EcreditSearch represents the model behind the search form about `app\models\Ecredit`.
 */
class EcreditSearch extends Ecredit
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date', 'alobs_no', 'dv_no', 'class', 'particular', 'fund', 'acicno', 'payee', 'remarks', 'cancelled', 'claimed', 'available', 'rescode', 'chargeto', 'daterel', 'orno', 'tclass', 'ctime', 'enctime', 'printime', 'alobsled', 'ordate', 'cellno', 'daterecd', 'nature', 'datetrans', 'created', 'accountno', 'email', 'debitdate', 'emailsent'], 'safe'],
            [['ecreditno', 'payledrecno', 'recno'], 'integer'],
            [['netamount', 'wtax', 'gross'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Ecredit::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'date' => $this->date,
            'ecreditno' => $this->ecreditno,
            'netamount' => $this->netamount,
            'wtax' => $this->wtax,
            'gross' => $this->gross,
            'daterel' => $this->daterel,
            'ordate' => $this->ordate,
            'daterecd' => $this->daterecd,
            'payledrecno' => $this->payledrecno,
            'datetrans' => $this->datetrans,
            'created' => $this->created,
            'debitdate' => $this->debitdate,
            'emailsent' => $this->emailsent,
            'recno' => $this->recno,
        ]);

        $query->andFilterWhere(['like', 'alobs_no', $this->alobs_no])
            ->andFilterWhere(['like', 'dv_no', $this->dv_no])
            ->andFilterWhere(['like', 'class', $this->class])
            ->andFilterWhere(['like', 'particular', $this->particular])
            ->andFilterWhere(['like', 'fund', $this->fund])
            ->andFilterWhere(['like', 'acicno', $this->acicno])
            ->andFilterWhere(['like', 'payee', $this->payee])
            ->andFilterWhere(['like', 'remarks', $this->remarks])
            ->andFilterWhere(['like', 'cancelled', $this->cancelled])
            ->andFilterWhere(['like', 'claimed', $this->claimed])
            ->andFilterWhere(['like', 'available', $this->available])
            ->andFilterWhere(['like', 'rescode', $this->rescode])
            ->andFilterWhere(['like', 'chargeto', $this->chargeto])
            ->andFilterWhere(['like', 'orno', $this->orno])
            ->andFilterWhere(['like', 'tclass', $this->tclass])
            ->andFilterWhere(['like', 'ctime', $this->ctime])
            ->andFilterWhere(['like', 'enctime', $this->enctime])
            ->andFilterWhere(['like', 'printime', $this->printime])
            ->andFilterWhere(['like', 'alobsled', $this->alobsled])
            ->andFilterWhere(['like', 'cellno', $this->cellno])
            ->andFilterWhere(['like', 'nature', $this->nature])
            ->andFilterWhere(['like', 'accountno', $this->accountno])
            ->andFilterWhere(['like', 'email', $this->email]);

        return $dataProvider;
    }
}
