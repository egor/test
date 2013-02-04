<?php

/**
 * This is the model class for table "news".
 *
 * The followings are the available columns in table 'news':
 * @property integer $news_id
 * @property string $url
 * @property string $menu_name
 * @property string $h1
 * @property string $short_text
 * @property string $text
 * @property string $img
 * @property string $meta_keywords
 * @property string $meta_description
 * @property string $meta_title
 * @property integer $date
 * @property integer $visibility
 * @property integer $in_main
 */
class News extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return News the static model class
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
		return 'news';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('url, menu_name, h1, short_text, text, img, meta_keywords, meta_description, meta_title, date, visibility, in_main, img_alt, img_title', 'safe'),
                        array('url, date', 'required', 'on'=>'edit'),
			array('date, visibility, in_main', 'numerical', 'integerOnly'=>true),
			array('url, menu_name, h1, img, img_alt, img_title', 'length', 'max'=>255),
                        /*array('img', 'file', 
                            'types'=>'png, jpg, gif', // Допустимые типы файлов
                            'minSize'=>0, // Минимальный размер файла
                            'maxSize'=>1000000, // Максимальный размер файла
                            
                        ),*/
                    //array('img', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('news_id, url, menu_name, h1, short_text, text, img, meta_keywords, meta_description, meta_title, date, visibility, in_main', 'safe', 'on'=>'search'),
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
			'news_id' => 'News',
			'url' => 'Url',
			'menu_name' => 'Краткое название',
			'h1' => 'Полное название (h1)',
			'short_text' => 'Краткое описание',
			'text' => 'Описание',
			'img' => 'Картинка',
			'meta_keywords' => 'Meta Keywords',
			'meta_description' => 'Meta Description',
			'meta_title' => 'Meta Title',
			'date' => 'Дата',
			'visibility' => 'Выводить',
			'in_main' => 'In Main',
                        'img_alt' => 'alt (альтернативный текст)',
                        'img_title' => 'title (заголовок)',
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

		$criteria->compare('news_id',$this->news_id);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('menu_name',$this->menu_name,true);
		$criteria->compare('h1',$this->h1,true);
		$criteria->compare('short_text',$this->short_text,true);
		$criteria->compare('text',$this->text,true);
		$criteria->compare('img',$this->img,true);
		$criteria->compare('meta_keywords',$this->meta_keywords,true);
		$criteria->compare('meta_description',$this->meta_description,true);
		$criteria->compare('meta_title',$this->meta_title,true);
		$criteria->compare('date',$this->date);
		$criteria->compare('visibility',$this->visibility);
		$criteria->compare('in_main',$this->in_main);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}