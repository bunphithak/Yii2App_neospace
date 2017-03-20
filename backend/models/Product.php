<?php

namespace backend\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "product".
 *
 * @property integer $FPDCODE
 * @property string $FPDNAME
 * @property string $FPDBRAND
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product';
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

    public function upload($model,$attribute)
    {
      
        $photo  = UploadedFile::getInstance($model, $attribute);
          $path = $this->getUploadPath();
        if ($this->validate() && $photo !== null) {

            $fileName = md5($photo->baseName.time()) . '.' . $photo->extension;
            //$fileName = $photo->baseName . '.' . $photo->extension;
            if($photo->saveAs($path.$fileName)){
              return $fileName;
            }
        }
        return $model->isNewRecord ? false : $model->getOldAttribute($attribute);
    }
    public function uploadpdf($model,$attribute)
    {

        $pdf  = UploadedFile::getInstance($model, $attribute);
        if($pdf != '') {
            $model->FPDPDFNAME = $pdf->name;
            $model->save();
        }
          $path = $this->getUploadPathpdf();
        if ($this->validate() && $pdf !== null) {
            $filePdfName = md5($pdf->baseName.time()) . '.' . $pdf->extension;
            //$fileName = $photo->baseName . '.' . $photo->extension;
            if($pdf->saveAs($path.$filePdfName)){
              return $filePdfName;
            }
        }
        return $model->isNewRecord ? false : $model->getOldAttribute($attribute);
    }


    public function getUploadPath(){
      return Yii::getAlias('@webroot').'/'.$this->upload_foler.'/';
    }

    public function getUploadUrl(){
      return Yii::getAlias('@web').'/'.$this->upload_foler.'/';
    }

    public function getPhotoViewer(){
      return empty($this->photo) ? Yii::getAlias('@web').'/images/none.png' : $this->getUploadUrl().$this->photo;
    }
    public function isImage($imageName) {
        if (empty($imageName)) {
            return 'No Image';
        }
        return '<img src="'.$this->getUploadUrl().$imageName.'" width="350px" height="300px" >';
    }

    public function isUpdate($image){
        if(empty($image)){
            return $this->getPhotoViewer().$image;
        }
            return $this->getUploadUrl().$image;
    }

    public function isfilepdf($pdfName) {
        if (empty($pdfName)) {
            return 'No File';
        }
        return '<a href="'.$this->getUploadUrlpdf().$pdfName.'" target="_blank">'.'<img src="'.Yii::getAlias('@web').'/images/icon_pdf.png'.'" alt="Smiley face" height="32" width="32">'.$this->FPDPDFNAME.'</a>';
    }
    public  function getUploadPathpdf(){
        return Yii::getAlias('@webroot').'/'.$this->upload_folerpdf.'/';
    }
    public  function getUploadUrlpdf(){
        return Yii::getAlias('@web').'/'.$this->upload_folerpdf.'/';
    }
    public function getFilepdfViewer() {
        return empty($this->pdf) ? Yii::getAlias('@web').'' : $this->getUploadUrl().$this->pdf;
    }
    public function isUpdatePdf($pdf) {
        if(empty($pdf)) {
            return $this->getFilepdfViewer().$pdf;
        }
            return $this->getUploadUrlpdf().$pdf;
    }
  
}
