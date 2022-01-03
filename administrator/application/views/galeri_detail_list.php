<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Galeri Detail List</title>
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
            function move_url(link){
                document.location = "../../../index.php/" + link;
            }
            function confirm_delete(param){
                var split_ = param.split("index.php/");
                var button_confirm = document.getElementById("button-confirm");
                button_confirm.setAttribute("onclick", "move_url('"+split_[1]+"')");
            }
            
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
                    <div class="panel-heading bg-light-blue-gradient" style="padding-bottom: 10px; color: white;">
                        List Galeri Detail                        
                        <a id="addData" href="../../../index.php/galeri_detail/add" class="btn btn-primary btn-xs pull-right hidden-xs bg-green-gradient"><span class="glyphicon glyphicon-plus"></span>&nbsp;New Galeri Detail</a>
                    </div>
                    <table id="table-data" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                                                                                
                                <th>Id</th>                                                                                                
                                <th>Galeri Header</th>                                                                                                
                                <th>Photo Galeri Detail</th>                                                                                                
                                <th>Deskripsi Singkat</th>                                                                                                                                
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