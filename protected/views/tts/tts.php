<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<!DOCTYPE HTML>
<html>
<body>
    Text is : <?php echo $vText;?><br />
    location is : <?php echo $mp3;?>
    <br />
<!--    <audio controls="controls" autoplay="autoplay">
        <source src="uploads/mp3/voice.mp3" type="audio/mp3" />
        Your browser does not support the audio tag.
    </audio>
    <br />-->
    <audio controls="controls" autoplay="autoplay">
        <source src="<?=$mp3?>" type="audio/mp3" />
        Your browser does not support the audio tag.
    </audio>
    <?php echo CHtml::form();?>
    Text To Speech :<?php echo CHtml::textField('text');?>
    <?php echo Chtml::submitButton('T2S');?>
    <?php echo Chtml::endForm();?>
</body>
</html>