<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Faq Form</title>
        <style type="text/css">
            html, body {
                font-family: consolas, monospace;
                cursor: default;
                width: 100%;
                height: 100%;
                margin: 0px;
                padding: 0px;
            }
            pre {
                font-family: consolas, monospace;
            }
        </style>
	<script type="text/javascript">
            /* Put JS Here */ 
            function move_url(link){
                document.location = "../../../index.php/" + link;
            }
            
	</script>
</head>
<body>
    <form class="form-horizontal" method="POST" enctype="multipart/form-data">
        <div class="box-body">
                                                                                                                        
            <div class="form-group">
                <label for="pertanyaan" class="col-lg-2 control-label">Pertanyaan</label>
                <div class="col-lg-10">
                    <input type="text" id="pertanyaan" class="form-control" name="pertanyaan" placeholder="Pertanyaan" value="<?php echo isset($pertanyaan) ? $pertanyaan : ""; ?>">
                </div>
            </div>
                                                                                                                         
            
            <div class="form-group">
                <label for="article_build" class="col-lg-2 control-label">Jawaban</label>
                <div class="col-lg-10">
                    <textarea id="article_build" class="form-control" name="jawaban" placeholder="Jawaban"><?php echo isset($jawaban) ? $jawaban : ""; ?></textarea>
                </div>
            </div>
                                                                                                            
            <div class="box-footer"></div>
            
            <div class="form-group">
                <div class="col-lg-6 col-md-6" style="margin-bottom: 40px;">
                    <button style="width: 100%;" type="submit" class="btn btn-info pull-right bg-light-blue-gradient" name="input_faq" value="Input Faq">Input Faq</button>
                </div>
                <div class="col-lg-6 col-md-6">
                    <button style="width: 100%;" type="button" class="btn btn-default bg-aqua-gradient" onclick="move_url('faq');">Lihat Data</button>
                </div>
            </div>
        </div>
    </form>
</body>
</html>