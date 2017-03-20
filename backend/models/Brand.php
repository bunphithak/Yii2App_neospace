<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "brand".
 *
 * @property string $FBCODE
 * @property string $FBNAME
 * @property integer $FBID
 */
class Brand extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'brand';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['FBCODE', 'FBNAME'], 'required'],
            [['FBCODE'],'unique'],//ตรวจสอบค่าไม่ซ้ำ
            [['FBCODE'], 'string', 'max' => 25],
            [['FBNAME'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'FBCODE' => 'PART NUMBER',
            'FBNAME' => 'MANUFACTURER',
           // 'FBID' => 'Fbid',
        ];
    }
}
