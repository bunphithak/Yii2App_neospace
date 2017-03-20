<?php

namespace frontend\models;
use backend\models\Brand;

use Yii;

/**
 * This is the model class for table "{{%product}}".
 *
 * @property string $FPDNAME
 * @property string $FPDBRAND
 * @property string $FPDCODE
 * @property integer $FPDID
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%product}}';
    }
    public $upload_foler ='../../upload/img';
    public $upload_folerpdf ='../../upload/pdf';
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['FPDNAME', 'FPDBRAND','FPDCODE'], 'required'],
            [['FPDACTIVE'], 'integer'],
            [['FPDCODE'],'unique'],
            [['FPDIMAGES'],'safe'],
            [['FPDIMAGES'],  'file', 
                    'skipOnEmpty' => true, 
                        'extensions' => 'png, jpg'
                    ],
            [['FPDPDF'],  'file', 
                'skipOnEmpty' => true, 
                     'extensions' => 'pdf'
                    ],
            [['FPDNAME', 'FPDPDFNAME'], 'string', 'max' => 255],
            [['FPDBRAND'], 'string', 'max' => 50],
            [['FPDCODE'],'string', 'max' => 25],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'FPDCODE' => 'PART NUMBER',
            'FPDNAME' => 'MANUFACTURING',
            'FPDBRAND' => 'DESCRIPTION',
            'FPDIMAGES' => 'PICTURE',
            'FPDPDF' => 'DATA SHEET',
            'FPDACTIVE' => 'Inactive',
            'FPDPDFNAME' => 'FILENAME'
        ];
    }
    public function getName()
    {
        return $this->hasOne(Brand::className(), ['FBCODE'=>'FPDBRAND' ]);
    }
     public function getUploadPath(){
    return Yii::getAlias('@webroot').'/'.$this->upload_foler.'/';
    }

    public function getUploadUrl(){
      return Yii::getAlias('@web').'/'.$this->upload_foler.'/';
    }
    public  function getUploadPathpdf(){
        return Yii::getAlias('@webroot').'/'.$this->upload_folerpdf.'/';
    }
    public  function getUploadUrlpdf(){
        return Yii::getAlias('@web').'/'.$this->upload_folerpdf.'/';
    }
}
