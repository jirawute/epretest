<style type="text/css">
    @media print {
        body * {
            visibility:hidden;
        }
        #printable, #printable * {
            visibility:visible;
        }
        #printable { /* aligning the printable area */
            position:absolute;
            left:40;
            top:40;
        }
    }

</STYLE>

<div class="grid_4 push_4 goback">
    <a href="index.php?r=order"><span></span>ย้อนกลับ</a>
</div>

<div class="clear"></div>
<div class="grid_10 push_1 editinfo">

    <div class="editinfo_box">
        <div  id="printable">
            <h2>ใบเสร็จรับเงิน/ใบกำกับภาษีอย่างย่อ</h2>

            <div align="center">บริษัท เอ็ดดูเคชั่น สตูดิโอ จำกัด
                ชั้น 29 อาคารดิออฟฟิศแอทเซ็นทรัลเวิล์ด
                999/9 ถนนพระราม 1 ปทุมวัน กรุงเทพฯ 10330</div>
            <?php
            $this->widget('zii.widgets.CDetailView', array(
                'data' => $model,
                'attributes' => array(
                    'order_id',
                    'inv_id',
                    'firstname',
                    'lastname',
                    'payment_method',
                    'total',
                    'credit',
                    'date_added',
                    'date_modified',
                ),
            ));
            ?>
        </div>
        <div class="go_signup">
            <a  href="#" onClick="window.print()">พิมพ์ใบเสร็จ</a>
        </div>
    </div>

</div>