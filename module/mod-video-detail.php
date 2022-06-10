<div class="container" style="padding-right: 0px; padding-left: 0px; z-index: 0; position: relative; min-height: 80vh;">
    <div class="row" style="margin-right: 0px; margin-left: 0px;">
        <div class="col-md-12 col-sm-12 col-xs-12" style="padding-right: 0px; padding-left: 0px;">
            <div style=" width: 100%; height: 100%; background-color: #f1f1f1; padding: 0.01em 16px; border-radius: 0px; margin-left: auto; margin-right: auto; padding-top: 15px; padding-bottom: 15px; box-shadow: 0 4px 14.48px rgb(0 0 0 / 25%); z-index: 99; position: relative;">
                <div class="header_article" style="background-color: #3b3c8c; width: 100%; padding: 8px 16px; border-radius: 4px;">
                    <h3 style='color: white; margin-bottom: 2px; text-align: center;'>Video YKKBI</h3>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div style="width: 100%; margin-top: 15px;">
                            <h5><?php echo $judul_video; ?></h5>
                        </div>
                        <?php if($photo_video != ""){ ?>
                        <div style="width: 100%; height: 250px; margin-top: 15px; margin-bottom: 15px; background: url('<?php echo $photo_video; ?>'); background-size: cover; background-position: center;">
                            <!-- Photo Article -->
                        </div>
                        <?php } ?>
                        <?php if($id_link_youtube != "" && validIdYoutube($id_link_youtube)){ ?>
                        <iframe style="width: 100%; height: 500px; margin-bottom: 15px;" src="https://www.youtube.com/embed/<?php echo $id_link_youtube; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        <?php } ?>
                        <?php echo $deskripsi_singkat; ?>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>