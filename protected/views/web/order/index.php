
<div class="grid_12 title_bar">
        <span class="before"></span>
        <h2>ประวัติการสั่งซื้อ</h2>
        <span class="after"></span>
</div>

<div class="clear"></div>

<!-- Start Exam History -->
<div class="grid_12">
    <div class="table_history">
            <table cellspacing="0">
                    <tbody>
                            <tr class="title_table">
                                    <th>เลขที่อ้างอิง</th>
                                    <th width="20%">ชื่อ-สกุล</th>
                                    <th width="20%">ทำรายการเมื่อ</th>
                                    <th width="14%">ประเภท</th>
                                    <th>เงิน(สะสม <?php echo $total_paid?>)</th>
                                    <th>เครดิต(สะสม <?php echo $total_credit;?>)</th>
                                    <th style="padding-right:10px;">สถานะ</th>
                            </tr>
                            <?php
                            if($orders){
                                 foreach($orders  as $order) { ?>
                            <tr>
                                    <td><?php echo $order['inv_id'];?></td>
                                    <td><?php echo $order['firstname']. " ".$order['lastname'];?></td>
                                    
                                    <td><?php echo $order['date_added'];?></td>
                                    <td><?php echo $order['payment_method'];?></td>
                                    <td><?php echo number_format($order['total']);?></td>
                                    <td><?php echo $order['credit'];?></td>
                                    <td style="padding-right:10px;">
                                        
                                        <?php switch($order['order_status_id']){
                                          case 1:echo "<div style='color:red'>ยกเลิกโดยผู้ใช้</div>";break;
                                          case 6:echo "ยกเลิกโดยระบบ";break;
                                          case 2:echo "<a style='color:green' href=".Yii::app()->createUrl('order/view', array('id'=>$order['order_id'])).">เสร็จสิ้น </a><img border='0' src='images/web/mark_true.png'/>";break;
                                          default:echo "อยู่ระหว่างดำเนินการ";
                                        }?>
                                    </td>
                                  
                            </tr>
                            <?php }}?>
                            
                    </tbody>
            </table>
    </div>
</div>

<div class="clear"></div>

<div class="box_shadow_full"></div>
