<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
    <div class="table_history">
            <table cellspacing="0">
                    <tbody>
                            <tr class="title_table">
                                    <th width="50px">ลำดับ</th>
                                    <th >ชื่อ-นามสกุล</th>
                                    <th width="200px">สถาบัน</th>
                                    <th width="150px">ระดับชั้น</th>
                                    <th width="200px">อีเมล์</th>

                            </tr>
                            <?php 
                                $no =1;
                                foreach ($model as $value){
                            ?>
                            <tr>
                                    <td style="text-align:center;"><?php echo $no;?></td>
                                    <td style="text-align:left;padding-left: 10px;"><?php echo $value->title_th.' '.$value->name_th.' '.$value->surename_th;?></td>
                                    <td style="text-align:center;"><?php echo $value->school;?></td>
                                    <td style="text-align:center;"><?php echo $value->major;?></td>
                                    <td style="text-align:center;"><?php echo $value->email;?></td>
                            </tr>
                            <?php $no++; }?>
                            
                    </tbody>
            </table>
    </div>