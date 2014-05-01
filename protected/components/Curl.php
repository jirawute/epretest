<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Curl
{
        public $curlurl;
	public $user_agent;
	public $params;

        public function __construct($aCurlurl, $aParams)
        {
            $this->curlurl = $aCurlurl;
            $this->params = $aParams;
        }

        public function send_curl()
        {
            $this->user_agent = "Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)";


            $ch = curl_init();
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_POST,1); // method ที่เราจะส่ง เป็น get หรือ post
            curl_setopt($ch, CURLOPT_POSTFIELDS,$this->params); // paremeter สำหรับส่งไปยังไฟล์ ที่กำหนด
            curl_setopt($ch, CURLOPT_URL,$this->curlurl);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
            curl_setopt($ch, CURLOPT_USERAGENT, $this->user_agent);


            $result = curl_exec($ch); // ผลการ execute กลับมาเป็น ข้อมูลใน url ที่เรา ส่งคำร้องขอไป

            curl_close ($ch);

            return $result;



        }

}

?>
