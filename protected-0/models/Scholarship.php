<?php

/**
 * This is the model class for table "esto_scholarship".
 *
 * The followings are the available columns in table 'esto_scholarship':
 * @property integer $scholar_enroll_id
 * @property string $name_th
 * @property string $name_en
 * @property string $nickname_th
 * @property string $nickname_en
 * @property string $id_card
 * @property string $birthday
 * @property integer $age
 * @property string $school
 * @property string $major
 * @property string $address
 * @property string $phone
 * @property string $email
 * @property string $parent_name
 * @property string $parent_phone
 * @property string $disease
 * @property string $talent
 * @property integer $language
 * @property string $language_other
 * @property integer $travel_abroad_status
 * @property string $travel_abroad_detail
 * @property string $image
 * @property string $portfolio
 * @property integer $how_to_know
 * @property string $how_to_know_other
 * @property string $profile
 * @property string $reason
 * @property string $message
 * @property integer $scholarship_type
 * @property integer $payment_status
 * @property integer $payment_method
 * @property integer $payment_amount
 * @property string $date_created
 * @property string $date_modified
 * @property integer $status
 */
class Scholarship extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Scholarship the static model class
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
		return 'esto_scholarship_enroll';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('scholar_id, title_th, title_en, name_th, surename_th, name_en, surename_en, nickname_th, nickname_en, id_card, 
                            birthday, age, school, major, address, phone, email, parent_name, parent_phone, language, travel_abroad_status, 
                            how_to_know,portfolio ,image,profile,reason,message,scholarship_type', 'required','message'=>'กรุณากรอก {attribute}'),
			array('scholar_id, age, travel_abroad_status, how_to_know, scholarship_type, payment_status, payment_amount, status', 'numerical', 'integerOnly'=>true),
			array('school, major, email, parent_name, disease, language, language_other, travel_abroad_detail, image, portfolio, how_to_know_other', 'length', 'max'=>300),
			array('title_th, title_en, nickname_th, nickname_en', 'length', 'max'=>50),
			array('inv_id', 'length', 'max'=>10),
                        array('id_card', 'length', 'max'=>13),
                        array('email', 'email','message'=>'รูปแบบอีเมล์ไม่ถูกต้อง'),
			array('name_th, name_en, surename_th, surename_en, phone, parent_phone', 'length', 'max'=>100),
                        array('payment_method', 'length', 'max'=>128),
                        array('image', 'file', 'types'=>'jpg, jpeg, gif, png', 'maxSize'=>1024 * 1024 * 1, 'tooLarge'=>'ไฟล์ต้องมีขนาดไม่เกิน 1 MB', 'allowEmpty'=>true),
                        array('portfolio', 'file', 'types'=>'jpg, jpeg, gif, png, pdf, txt, doc, docx, ppt, pptx, xls, xlsx', 'maxSize'=>1024 * 1024 * 5, 'tooLarge'=>'ไฟล์ต้องมีขนาดไม่เกิน 5 MB','allowEmpty'=>true) ,
                        array('inv_id', 'unique','message'=>'{attribute} นี้มีผู้ใช้งานแล้ว'),
                        array('birthday,talent,date_created,date_modified','safe'),
    
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('scholar_enroll_id, scholar_id, title_th, title_en, name_th, name_en, surename_th, surename_en, nickname_th, nickname_en, id_card, birthday, age, school, major, address, phone, email, parent_name, parent_phone, disease, talent, language, language_other, travel_abroad_status, travel_abroad_detail, image, portfolio, how_to_know, how_to_know_other, profile, reason, message, scholarship_type, payment_status, payment_method, payment_amount,inv_id, date_created, date_modified, status', 'safe', 'on'=>'search'),
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
                      'paymentStatus' => array(self::BELONGS_TO, 'OrderStatus', 'payment_status', 'joinType'=>'INNER JOIN'),
                      'scholarDetail' => array(self::BELONGS_TO, 'ScholarshipDetail', 'scholar_id', 'joinType'=>'INNER JOIN'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'scholar_enroll_id' => 'รหัสผู้สมัคร',
                        'scholar_id' => 'ทุนที่สมัคร',
                        'title_th' => 'คำนำหน้าชื่อ(ภาษาไทย)',
			'title_en' => 'คำนำหน้าชื่อ(ภาษาอังกฤษ)',
			'name_th' => 'ชื่อ(ภาษาไทย)',
                        'surename_th' => 'นามสกุล(ภาษาไทย)',
			'name_en' => 'ชื่อ(ภาษาอังกฤษ)',
                        'surename_en' => 'นามสกุล(ภาษาอังกฤษ)',
			'nickname_th' => 'ชื่อเล่น(ภาษาไทย)',
			'nickname_en' => 'ชื่อเล่น(ภาษาอังกฤษ)',
			'id_card' => 'เลขที่บัตรประจำตัวประชาชน',
			'birthday' => 'วัน/เดือน/ปีเกิด (พ.ศ.)',
			'age' => 'อายุ',
			'school' => 'สถาบันการศึกษา',
			'major' => 'ระดับชั้น',
			'address' => 'ที่อยู่ที่สามารถติดต่อได้',
			'phone' => 'เบอร์โทรศัพท์มือถือ',
			'email' => 'E-mail',
			'parent_name' => 'ชื่อ–นามสกุลผู้ปกครอง(ภาษาไทย)',
			'parent_phone' => 'เบอร์โทรศัพท์ผู้ปกครอง',
			'disease' => 'อาหาร/ยาที่แพ้/โรคประจำตัว',
			'talent' => 'ความสามารถพิเศษ',
			'language' => 'ความสามารถทางภาษา',
			'language_other' => 'Language Other',
			'travel_abroad_status' => 'การเดินทางไปต่างประเทศ',
			'travel_abroad_detail' => 'Travel Abroad Detail',
			'image' => 'รูปถ่ายปัจจุบัน',
			'portfolio' => 'ประวัติการทำกิจกรรม',
			'how_to_know' => 'ทราบข่าวทุนการศึกษาจากสื่อใด',
			'how_to_know_other' => 'How To Know Other',
			'profile' => '1.เหตุใดท่านจึงตัดสินใจสมัครโครงการนี้',
			'reason' => '2.ท่านคิดว่าหลังจากเข้าร่วมโครงการนี้แล้วจะนำความรู้และประสบการณ์มาประยุกต์ใช้ได้อย่างไรบ้าง',
			'message' => '3.หากท่านมีโอกาสจัดโครงการแลกเปลี่ยนภาษาและวัฒนธรรมอย่าง ES-ILC ท่านอยากให้มีกิจกรรมในรูปแบบใด',
			'scholarship_type' => 'ประเภททุนการศึกษา',
			'payment_status' => 'สถานะการชำระเงิน',
			'payment_method' => 'ช่องทางการชำระเงิน',
			'payment_amount' => 'จำนวนเงินที่ต้องชำระ',
                        'inv_id' => 'Invoice No.',
			'date_created' => 'Date Created',
			'date_modified' => 'Date Modified',
			'status' => 'สถานะการสมัคร',
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

		$criteria->compare('scholar_enroll_id',$this->scholar_enroll_id);
                $criteria->compare('scholar_id',$this->scholar_id);
                $criteria->compare('title_th',$this->title_th,true);
		$criteria->compare('title_en',$this->title_en,true);
		$criteria->compare('name_th',$this->name_th,true);
                $criteria->compare('surename_th',$this->surename_th,true);
		$criteria->compare('name_en',$this->name_en,true);
                $criteria->compare('name_th',$this->name_th,true);
		$criteria->compare('nickname_th',$this->nickname_th,true);
		$criteria->compare('nickname_en',$this->nickname_en,true);
		$criteria->compare('id_card',$this->id_card,true);
		$criteria->compare('birthday',$this->birthday,true);
		$criteria->compare('age',$this->age);
		$criteria->compare('school',$this->school,true);
		$criteria->compare('major',$this->major,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('parent_name',$this->parent_name,true);
		$criteria->compare('parent_phone',$this->parent_phone,true);
		$criteria->compare('disease',$this->disease,true);
		$criteria->compare('talent',$this->talent,true);
		$criteria->compare('language',$this->language);
		$criteria->compare('language_other',$this->language_other,true);
		$criteria->compare('travel_abroad_status',$this->travel_abroad_status);
		$criteria->compare('travel_abroad_detail',$this->travel_abroad_detail,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('portfolio',$this->portfolio,true);
		$criteria->compare('how_to_know',$this->how_to_know);
		$criteria->compare('how_to_know_other',$this->how_to_know_other,true);
		$criteria->compare('profile',$this->profile,true);
		$criteria->compare('reason',$this->reason,true);
		$criteria->compare('message',$this->message,true);
		$criteria->compare('scholarship_type',$this->scholarship_type);
		$criteria->compare('payment_status',$this->payment_status);
		$criteria->compare('payment_method',$this->payment_method,true);
		$criteria->compare('payment_amount',$this->payment_amount);
                $criteria->compare('inv_id',$this->inv_id,true);
		$criteria->compare('date_created',$this->date_created,true);
		$criteria->compare('date_modified',$this->date_modified,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                        'pagination'=>array('pageSize'=> 20,)
		));
	}

        public function getStatusText($status){
            if($status==1){
                echo "ได้รับสิทธิ์สอบสัมภาษณ์";
            }else if($status==2){
                echo "ผ่าน";
            }else{
                echo "ไม่ผ่าน";
            }
        }
}