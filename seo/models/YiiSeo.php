<?php

/**
 * This is the model class for table "YiiSeo".
 *
 * The followings are the available columns in table 'YiiSeo':
 * @property integer $id
 * @property string $type
 * @property string $url
 * @property string $content
 * @property string $language
 * @property integer $is_active
 * @property string $param
 */
class YiiSeo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return YiiSeo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'YiiSeo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('type, url, content, is_active', 'required'),
			array('is_active', 'numerical', 'integerOnly'=>true),
			array('type, language, param', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, type, url, content, language, is_active, param', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'type' => 'Type',
			'url' => 'Url',
			'content' => 'Content',
			'language' => 'Language',
			'is_active' => 'Is Active',
			'param' => 'Param',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('language',$this->language,true);
		$criteria->compare('is_active',$this->is_active);
		$criteria->compare('param',$this->param,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}