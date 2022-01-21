<style type="text/css">
    td > p {
        margin-bottom: 0px;
    }
</style>
<div class="container" style="padding-right: 0px; padding-left: 0px; min-height: 80vh;">
    <div class="row" style="margin-right: 0px; margin-left: 0px;">
        <div class="col-md-12 col-sm-12 col-xs-12" style="padding-right: 0px; padding-left: 0px;">
            <div style=" width: 100%; height: 100%; background-color: #f1f1f1; padding: 0.01em 16px; border-radius: 4px; margin-left: auto; margin-right: auto; padding-top: 15px; padding-bottom: 15px; box-shadow: 0 4px 14.48px rgb(0 0 0 / 25%);">
                <div class="header_article" style="background-color: #3b3c8c; width: 100%; padding: 8px 16px; border-radius: 4px;">
                    <h3 style='color: white; margin-bottom: 2px; text-align: center;'>Call Center</h3>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <p style="text-align: justify; margin-top: 15px;">Berikut adalah list Call Center dari YKKBI</p>
                        <div style="width: 100%; overflow: auto;" align="center">
                            <table border="0" style="width: 95%;">
                                <?php 
                                $query_call_center_ = mysqli_query($connect, "SELECT * FROM `tbl_call_center`");
                                if(mysqli_num_rows($query_call_center_)){
                                    $count = 1;
                                    $jumlah = mysqli_num_rows($query_call_center_);
                                    while($hasil_call_center_ = mysqli_fetch_array($query_call_center_)){
                                        ?>
                                        <tr>
                                            <td>
                                               <table border="0" style="width: 100%; min-width: 450px; height: 100px; border-collapse: separate; border-radius: 20px; box-shadow: 0 4.82586px 4.82586px rgba(0,0,0,.05);">
                                                    <tr>
                                                        <td style=" background-color: rgba(0,0,0,.03); width: 18%;text-align: center;padding-top: 10px;padding-bottom: 10px; border-top-left-radius: 20px;border-bottom-left-radius: 20px;">
                                                            <div align="center" id="service" style="padding: 0px;">                             
                                                                <div class="icon-service-wrapper" style="margin: 0px;">
                                                                    <h3 style="color: #3b3c8c;margin: 0px;"><b><?php echo samakan($count, $jumlah + 10); ?></b></h3>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td style="width: 82%; background-color: #e0e0e0; border-top-right-radius: 20px;border-bottom-right-radius: 20px; text-align: center;">
                                                            <p style="margin-bottom: 0px; white-space: nowrap;"><?php echo $hasil_call_center_['nomor_call_center']; ?><br /><?php echo $hasil_call_center_['keterangan']; ?><a href="tel:<?php echo str_replace(array(" ","_"), "", $hasil_call_center_['nomor_call_center']); ?>">Hubungi</a></p>
                                                        </td>
                                                    </tr>
                                                </table> 
                                                <br />
                                            </td>
                                        </tr>
                                        <?php
                                        $count++;
                                    }
                                }
                                ?>
                            </table>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>