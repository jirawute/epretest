<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Tts
 *
 * @author Administrator
 */
class TtsController extends Controller {
    public $mp3data;
    public function actionTts(){
        $file_name = "voice";
        $pText = "";
        if(!empty($_POST['text'])){
            $pText = $_POST['text'];
            $pText = trim($pText);
            $pText = urldecode($pText);
            $pText = urlencode($pText);
            $this->mp3data = file_get_contents("http://translate.google.com/translate_tts?tl=en&q={$pText}");
            $put_file = "uploads/mp3/".$file_name.".mp3";
            file_put_contents($put_file, $this->mp3data);
            chmod($put_file, 0777); 
            //$your_domain = "http://localhost/project1/protected/views/t2s/files/";
            $mp3 = "uploads/mp3/".$file_name.".mp3";
            $this->render('tts',array(
                'mp3' => $mp3,
                'vText' => $pText
            ));
        }  else {
            $this->render('tts',array(
                'vText' => $pText
            ));
        }
    }
}
?>