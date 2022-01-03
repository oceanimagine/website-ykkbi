<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Module Kategori</title>
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
            window.onload = function(){
	        var tempat_script = document.getElementById("tempat_script");
	        var script = document.createElement("script");
	        script.setAttribute("type","text/javascript");
	        script.innerHTML = tempat_script.innerHTML;
	        document.body.appendChild(script);
                tempat_script.parentNode.removeChild(tempat_script);
	    }; 
            
	</script>
</head>
<body>
    <script type="text/javascript" id="tempat_script">
    if(typeof $ !== "undefined"){
        <?php echo $script; ?>
    }
    </script>
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-12 col-lg-12a">
                <div class="panel panel-success">
                    <!-- Default panel contents -->
                    <div class="panel-heading" style="padding-bottom: 10px;">
                        List Kategori
                        <a id="addData" href="../../new/atur_bayar/atur_bayar_add.php" class="btn btn-primary btn-xs pull-right hidden-xs"><span class="glyphicon glyphicon-plus"></span>&nbsp;New Kategori</a>
                    </div>
                    <table id="table-data" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>id</th>
                                <th>Nama Kategori</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>  
                </div> <!-- end panel  -->
            </div>
        </div>
        <!-- /.row -->
    </div>
</body>
</html>