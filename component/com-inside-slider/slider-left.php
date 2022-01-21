<style type="text/css">
    li > p {
        margin-bottom: 0px;
    }
</style>
<div style="height: 100vh; min-height: 513px; overflow: auto; background-color: #f1f1f1; position: fixed; width:inherit; top: 0px;  box-shadow: -4px 0 14px 2px grey, 4px 0 14px 2px grey;" class="panel-left-right">
    <div style="width: 100%; height: 10vh; background-color: #3b3c8c;">
        <div class="logo-footer" style="display: table-cell; vertical-align: middle; height: 10vh;" align="center">
            <table border='0' style="width: 100%; width: 80%; background-color: white; border-radius: 10.8px;">
                <tr>
                    <td style="width: 10%; padding: 5px;" id="footer_td">
                        <img width="100%" height="auto" src="assets/img/LOGOYKKBI.png" alt="logo-footer" style="width: 100%;">
                    </td>
                    <td style="width: 40%; padding: 5px;">
                        <img width="100%" height="auto" src="assets/img/LOGOWHITE.PNG" alt="logo-footer">
                    </td>
                </tr>
            </table>

        </div>
    </div>
    <div id="accordion2" class="myaccordion" style="height: 63vh;">
        <?php 
        $query_call_center = mysqli_query($connect, "SELECT * FROM `tbl_call_center`");
        if(mysqli_num_rows($query_call_center) > 0){
            $height_vh = 63 / mysqli_num_rows($query_call_center);
            $increment = 0;
            while($hasil_call_center = mysqli_fetch_array($query_call_center)){
                ?>
                <div class="card">
                    <div class="card-header" style="overflow: auto;">
                        <h5 class="mb-0">
                            <button style="white-space: nowrap; text-align: left; font-size: 14px; /* height: 77px; */ height: <?php echo $height_vh; ?>vh;" class="btn btn-link" data-toggle="collapse" data-target="#collapsediv<?php echo $increment; ?>" aria-expanded="true" aria-controls="collapseOne">
                                <img width="25px" height="auto" src="assets/img/PHONEICON.png" alt="icon-map" style="width: 24px !important;margin-bottom: 2.5px;">
                                &nbsp;<?php echo $hasil_call_center['judul_call_center']; ?>
                            </button>
                        </h5>
                    </div>
                    <!-- collapse show -->
                    <div id="collapsediv<?php echo $increment; ?>" class="collapse" aria-labelledby="headingOne" data-parent="#accordion2">
                        <div class="card-body" style="padding: 1rem !important;">
                            <ul style="margin: 0px; padding: 0px; white-space: nowrap; margin-left: 30px; list-style: circle;">
                                <li style="margin-bottom: 2px;"><?php echo $hasil_call_center['nomor_call_center']; ?></li>
                                <?php if($hasil_call_center['keterangan'] != ""){ ?>
                                <li style="margin-bottom: 2px;"><?php echo $hasil_call_center['keterangan']; ?></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <?php
                $increment++;
            }
        } else {
            ?>
            <div class="card">
                <div class="card-header" style="overflow: auto;">
                    <h5 class="mb-0">
                        <button style="white-space: nowrap; text-align: left; font-size: 14px; height: 77px;" class="btn btn-link" data-toggle="collapse" data-target="#collapsekanan01" aria-expanded="true" aria-controls="collapseOne">
                            <img width="25px" height="auto" src="assets/img/PHONEICON.png" alt="icon-map" style="width: 24px !important;margin-bottom: 2.5px;">
                            &nbsp;Emergency
                        </button>
                    </h5>
                </div>
                <!-- collapse show -->
                <div id="collapsekanan01" class="collapse" aria-labelledby="headingOne" data-parent="#accordion2">
                    <div class="card-body" style="padding: 1rem !important;">
                        <ul style="margin: 0px; padding: 0px; white-space: nowrap; margin-left: 30px; list-style: circle;">
                            <li style="margin-bottom: 2px;">081511509590</li>
                            <li style="margin-bottom: 2px;">Di Luar Jam Kerja</li>
                        </ul>
                    </div>
                </div>
            </div>
            <?php 
        }
        ?>
    </div>
    <div style="width: 100%;">
        <div class="logo-footer" style="vertical-align: middle; width:  100%;" align="center">
            <table border="0" style="width: 100%;width: 100%; border-radius: 10.8px;">
                <tbody><tr>
                    <td style="width: 10%;padding: 0px;text-align: center;background-color: white;" id="footer_td">
                        <img height="auto" src="assets/img/LOGOYKKBI.png" alt="logo-footer" style="height: 27vh;">
                    </td>
                </tr>
            </tbody></table>

        </div>
    </div>
</div>