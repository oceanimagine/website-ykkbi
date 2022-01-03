<div style="overflow: auto; margin-top: 8px; margin-bottom: 8px;">
    <table border="0" style="width: 0px;">
        <tr>
            <?php $module = isset($_GET['module']) && $_GET['module'] != "" ? $_GET['module'] : "home"; ?>
            <?php if($module == "profile"){ ?>
            <td><img src="assets/img/ICONPROFILE.PNG" style="height: 28px;" /></td>
            <td style="white-space: nowrap;">&nbsp;<a href="profile">Profile YKKBI</a>&nbsp;</td>
            <?php } ?>
            <?php if($module == "profile-kegiatan"){ ?>
            <td><img src="assets/img/ICONGEAR.PNG" style="height: 28px;" /></td>
            <td style="white-space: nowrap;">&nbsp;<a href="kegiatan">Kegiatan</a>&nbsp;</td>
            <?php } ?>
            <?php if($module == "profile-usaha-penunjang"){ ?>
            <td><img src="assets/img/ICONCHART.PNG" style="height: 28px;" /></td>
            <td style="white-space: nowrap;">&nbsp;<a href="usaha-penunjang">Usaha Penunjang</a>&nbsp;</td>
            <?php } ?>
            <?php if($module == "profile-pengertian-umum-yayasan"){ ?>
            <td><img src="assets/img/ICONCHAT.PNG" style="height: 28px;" /></td>
            <td style="white-space: nowrap;">&nbsp;<a href="pengertian-umum-yayasan">Pengertian Umum Yayasan</a>&nbsp;</td>
            <?php } ?>
        </tr>
    </table>
</div>