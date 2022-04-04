<?php 

include_once __DIR__ . "/config/connect-list.php";
include_once __DIR__ . "/config/connect.php";
info_server();
session_start();
$connect = mysqli_connect($host, $user, $pass, $data);
include_once __DIR__ . "/config/connect-redaksi.php";
check_url_index_php();
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        
        <base href="<?php echo $base; ?>">
        <noscript>
            <meta http-equiv="refresh" content="4;url=javascript-testing" />
        </noscript>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description"
              content="Yayasan Kesejahteraan Karyawan Bank Indonesia.">
        <meta name="author" content="yayasan kesejahteraan karyawan bank indonesia">
        <title>Website YKKBI</title>

        <!-- Favicons-->
        <link rel="shortcut icon" href="assets/img/LOGOYKKBI.png" type="image/x-icon">
        <!-- BASE CSS -->
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/font-awesome.min.css" />
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="assets/css/owl.carousel.min.css">
        <link rel="stylesheet" type="text/css" type="text/css" href="assets/css/owl.transitions.min.css">
        <link href="assets/css/vendors.css" rel="stylesheet">
        <link href="assets/css/animate.css" rel="stylesheet">
        <link href="assets/css/menu.css" rel="stylesheet">
        <link href="assets/css/style.css?v=1635742746" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/nicepage-core.css" media="screen">
        <link rel="stylesheet" href="assets/css/nicepage-extend.css" media="screen">

        <!-- YOUR CUSTOM CSS -->
        <link href="assets/css/custom.css" rel="stylesheet">
        <link href="assets/css/custom-ykkbi.css" rel="stylesheet">

    </head>
    <body style="visibility: hidden;">
        
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/owl.carousel.min.js"></script>
        <script src="assets/js/nicepage.js"></script>
        <div id="page">
            <!--Header  -->
            <?php 
            
            include_once "component/com-header.php";
            
            ?>
            <!-- /header --><!-- Content -->
            <!-- Banner -->
            <?php 
            
            $module = isset($_GET['module']) && $_GET['module'] != "" ? $_GET['module'] : "home";
            
            if(is_module_slider($module)){
                include_once "component/com-slider-new.php";
            }
            
            ?>
            <!-- /Banner -->
            
            <?php 
            
            $panelrightleft = isset($_GET['panelrightleft']) && $_GET['panelrightleft'] != "" ? $_GET['panelrightleft'] : "false";
            if(file_exists("module/mod-" . $module . ".php")){
                if($panelrightleft == "true"){
                    include_with_panel($module);
                } 
                else if($panelrightleft == "false"){
                    include_once "module/mod-" . $module . ".php";
                }
            }
            
            ?>
            
            <!-- footer -->
            <?php 
            
            include_once "component/com-footer.php";
            
            ?>
            <!-- /footer -->

            <div id="tombol_telepon" style="width: 85px; height: 74px; position: fixed; bottom: 0; right: 0; z-index: 9999; display: none;">
                <img src="assets/img/LOGOTELEPONKANANBAWAH.png" style="width: 78px; margin-left: -4px;margin-top: -4px;">
            </div>
            
            <button onclick="topFunction()" id="buttonToTop" title="Kembali ke atas">
                <span class="fa fa-arrow-left"></span>
            </button>

        </div>
        <!-- page -->

        <div id="toTop"></div>
        <!-- Back to top button -->

        <!-- COMMON SCRIPTS -->

        <script>
            const base_url = "<?php echo $base; ?>";
        </script>
        <script src="assets/js/common_scripts.min.js"></script>
        <script src="assets/js/wow.min.js" async></script>
        <script src="assets/js/functions.js"></script>

        <!-- js untuk halaman beranda -->
        <script src="assets/js/frontend_beranda.js" async></script>

        <!-- js untuk halaman fitnes -->

        <!-- js untuk halaman jadwal dokter -->

        <!-- js untuk halaman tpkk -->

        <script src="assets/js/mycustome.js" async></script>
        <script async>
            $(document).ready(function () {
                setTimeout(function(){
                    document.body.style.visibility = "";
                    window.onresize = function(){
                        if(document.body.clientWidth === 1016 || document.body.clientWidth === 1146){
                            var href_h2 = document.getElementById("href_h2");
                            href_h2.style.width = "40px";
                            href_h2.style.height = "40px";
                            var href_h1 = document.getElementById("href_h1");
                            href_h1.style.height = "40px";
                        } else {
                            var href_h2 = document.getElementById("href_h2");
                            href_h2.style.width = "";
                            href_h2.style.height = "";
                            var href_h1 = document.getElementById("href_h1");
                            href_h1.style.height = "56px";
                        }
                    };
                    if(document.body.clientWidth === 1016 || document.body.clientWidth === 1146){
                        var href_h2 = document.getElementById("href_h2");
                        href_h2.style.width = "40px";
                        href_h2.style.height = "40px";
                        var href_h1 = document.getElementById("href_h1");
                        href_h1.style.height = "40px";
                    }
                },500);
                $('body').on('submit', '#form-search', function (e) {
                    e.preventDefault();
                    let search = $(this).find('input').val();
                    window.open(
                        'https://www.google.com/search?q=' + search + '&oq=' + search + '',
                        '_blank' // <- This is what makes it open in a new window.
                    );
                    console.log($(this).find('input').val());
                });
            });
            function refresh_captcha(){
                var tempat_captcha = document.getElementById("tempat_captcha");
                var rand = Math.random();
                tempat_captcha.setAttribute("src","captcha?" + rand.toString());
                
            }
            window.onload = function(){
                
                var tombol_telepon = document.getElementById("tombol_telepon");
                var kiri = "show";
                var kanan = "hide";
                if(document.getElementById("td_slider_a")){
                    var td_slider_a = document.getElementById("td_slider_a");
                    var td_slider_c = document.getElementById("td_slider_c");
                }
                if(document.getElementById("td_slider_a_selain_home")){
                    var td_slider_a_selain_home = document.getElementById("td_slider_a_selain_home");
                    var td_slider_c_selain_home = document.getElementById("td_slider_c_selain_home");
                }
                tombol_telepon.onclick = function(){
                    if(kiri === "show"){
                        if(document.getElementById("td_slider_a")){
                            td_slider_a.style.display = "none";
                            td_slider_c.style.display = "contents";
                        }
                        if(document.getElementById("td_slider_a_selain_home")){
                            td_slider_a_selain_home.style.display = "none";
                            td_slider_c_selain_home.style.display = "contents";
                        }
                        kiri = "hide";
                        kanan = "show";
                    }
                    else if(kanan === "show"){
                        if(document.getElementById("td_slider_a")){
                            td_slider_a.style.display = "contents";
                            td_slider_c.style.display = "none";
                        }
                        if(document.getElementById("td_slider_a_selain_home")){
                            td_slider_a_selain_home.style.display = "contents";
                            td_slider_c_selain_home.style.display = "none";
                        }
                        kiri = "show";
                        kanan = "hide";
                    }
                };
                window.addEventListener('resize', function() {
                    if(document.getElementById("td_slider_a")){
                        td_slider_a.style.display = "";
                        td_slider_c.style.display = "";
                    }
                    if(document.getElementById("td_slider_a_selain_home")){
                        td_slider_a_selain_home.style.display = "";
                        td_slider_c_selain_home.style.display = "";
                    }
                    kiri = "show";
                    kanan = "hide";
                }, true);
                
                <?php if($module == "organisasi"){ ?>
                OrgChart.templates.ana.plus = '<circle cx="15" cy="15" r="15" fill="#ffffff" stroke="#aeaeae" stroke-width="1"></circle>'
                    + '<text text-anchor="middle" style="font-size: 18px;cursor:pointer;" fill="#757575" x="15" y="22">{collapsed-children-count}</text>';
                
                
                OrgChart.templates.itTemplate = Object.assign({}, OrgChart.templates.ana);
                OrgChart.templates.itTemplate.nodeMenuButton = "";
                OrgChart.templates.itTemplate.nodeCircleMenuButton = {
                            radius: 18,
                            x: 250,
                            y: 60,
                            color: '#fff',
                            stroke: '#aeaeae'
                        };

                OrgChart.templates.invisibleGroup.padding = [20, 0, 0, 0];

                var chart = new OrgChart(document.getElementById("tree"), {
                    template: "ana",
                    enableDragDrop: true,
                    assistantSeparation: 170,
                    nodeCircleMenu: {
                        details: {
                          icon: OrgChart.icon.details(24, 24, '#aeaeae'),
                          text: "Details",
                          color: "white"
                        }/*,
                        edit: {
                          icon: OrgChart.icon.edit(24, 24, '#aeaeae'),
                          text: "Edit node",
                          color: "white"
                        },
                        add: {
                          icon: OrgChart.icon.add(24, 24, '#aeaeae'),
                          text: "Add node",
                          color: "white"
                        },
                        remove: {
                          icon: OrgChart.icon.remove(24, 24, '#aeaeae'), 
                          text: "Remove node",
                          color: '#fff',
                        },
                        addLink: {
                          icon: OrgChart.icon.link(24, 24, '#aeaeae'), 
                          text: "Add C link(drag and drop)",
                          color: '#fff',
                          draggable: true
                        } */
                      },
                    menu: {
                        pdfPreview: {
                            text: "Export to PDF",
                            icon: OrgChart.icon.pdf(24, 24, '#7A7A7A'),
                            onClick: preview
                        },
                        csv: { text: "Save as CSV" }
                    },
                    nodeMenu: {
                        details: { text: "Details" }/*,
                        edit: { text: "Edit" },
                        add: { text: "Add" },
                        remove: { text: "Remove" } */
                    },
                    align: OrgChart.ORIENTATION,
                    toolbar: {
                        fullScreen: true,
                        zoom: true,
                        fit: true,
                        expandAll: true
                    },
                    nodeBinding: {
                        field_0: "name",
                        field_1: "title",
                        img_0: "img"
                    },
                    tags: {
                        "top-management": {
                            template: "invisibleGroup",
                            subTreeConfig: {
                                orientation: OrgChart.orientation.bottom,
                                collapse: {
                                    level: 1
                                }
                            }
                        },
                        "it-team": {
                            subTreeConfig: {
                                layout: OrgChart.mixed,
                                collapse: {
                                    level: 1
                                }
                            },
                        },
                        "hr-team": {
                            subTreeConfig: {
                                layout: OrgChart.treeRightOffset,
                                collapse: {
                                    level: 1
                                }
                            },
                        },
                        "sales-team": {
                            subTreeConfig: {
                                layout: OrgChart.treeLeftOffset,
                                collapse: {
                                    level: 1
                                }
                            },
                        },
                        "seo-menu": {
                            nodeMenu: {/*
                                addSharholder: { text: "Add new sharholder", icon: OrgChart.icon.add(24, 24, "#7A7A7A"), onClick: addSharholder },
                                addDepartment: { text: "Add new department", icon: OrgChart.icon.add(24, 24, "#7A7A7A"), onClick: addDepartment },
                                addAssistant: { text: "Add new assitsant", icon: OrgChart.icon.add(24, 24, "#7A7A7A"), onClick: addAssistant },
                                edit: { text: "Edit" }, */
                                details: { text: "Details" },
                            }
                        },
                        "menu-without-add": {
                            nodeMenu: {
                                details: { text: "Details" }/*,
                                edit: { text: "Edit" },
                                remove: { text: "Remove" } */
                            }
                        },
                        "department": {
                            template: "group",
                            nodeMenu: {
                                /*
                                addManager: { text: "Add new manager", icon: OrgChart.icon.add(24, 24, "#7A7A7A"), onClick: addManager },
                                remove: { text: "Remove department" },
                                edit: { text: "Edit department" }, */
                                nodePdfPreview: { text: "Export department to PDF", icon: OrgChart.icon.pdf(24, 24, "#7A7A7A"), onClick: nodePdfPreview }
                            }
                        },
                        "it-team-member": {
                          template: "itTemplate",
                        }
                    },
                    clinks: [
                        { from: 11, to: 18, label : 'TEST' },
                        { from: 1, to: 18 }
                    ]
                });

                chart.nodeCircleMenuUI.on('click', function (sender, args) {
                      switch (args.menuItem.text) {
                          case "Details": chart.editUI.show(args.nodeId, true);
                          break;
                          case "Add node": {
                              var id = chart.generateId();
                              chart.addNode({ id: id, pid: args.nodeId, tags: ["it-team-member"]});
                          }
                          break;
                          case "Edit node": chart.editUI.show(args.nodeId);
                          break;
                          case "Remove node": chart.removeNode(args.nodeId);
                          break;
                          default:
                      };
                  });

                chart.nodeCircleMenuUI.on('drop', function (sender, args) {
                        chart.addClink(args.from, args.to).draw(OrgChart.action.update);        
                });

                chart.on("added", function (sender, id) {
                    sender.editUI.show(id);
                });

                chart.on('drop', function (sender, draggedNodeId, droppedNodeId) {
                    var draggedNode = sender.getNode(draggedNodeId);
                    var droppedNode = sender.getNode(droppedNodeId);

                    if (droppedNode.tags.indexOf("department") != -1 && draggedNode.tags.indexOf("department") == -1) {
                        var draggedNodeData = sender.get(draggedNode.id);
                        draggedNodeData.pid = null;
                        draggedNodeData.stpid = droppedNode.id;
                        sender.updateNode(draggedNodeData);
                        return false;
                    }
                });

                chart.editUI.on('field', function (sender, args) {
                    var isDeprtment = sender.node.tags.indexOf("department") != -1;
                    var deprtmentFileds = ["name"];

                    if (isDeprtment && deprtmentFileds.indexOf(args.name) == -1) {
                        return false;
                    }
                });

                chart.on('exportstart', function (sender, args) {
                    args.styles = document.getElementById('myStyles').outerHTML;
                });

                chart.load([
                    { id: "top-management", tags: ["top-management"] },
                    { id: "hr-team", pid: "top-management", tags: ["hr-team", "department"], name: "HR department" },
                    { id: "it-team", pid: "top-management", tags: ["it-team", "department"], name: "IT department", img: "https://cdn.balkan.app/shared/anim/1.gif" },
                    { id: "sales-team", pid: "top-management", tags: ["sales-team", "department"], name: "Sales department" },

                    { id: 1, stpid: "top-management", name: "Nicky Phillips", title: "CEO", img: "https://cdn.balkan.app/shared/anim/1.gif", tags: ["seo-menu"] },
                    { id: 2, pid: 1, name: "Rowan Hall", title: "Shareholder (51%)", img: "https://cdn.balkan.app/shared/2.jpg", tags: ["menu-without-add"] },
                    { id: 3, pid: 1, name: "Danni Anderson", title: "Shareholder (49%)", img: "https://cdn.balkan.app/shared/3.jpg", tags: ["menu-without-add"] },

                    { id: 4, stpid: "hr-team", name: "Jordan Harris", title: "HR Manager", img: "https://cdn.balkan.app/shared/4.jpg" },
                    { id: 5, pid: 4, name: "Emerson Adams", title: "Senior HR", img: "https://cdn.balkan.app/shared/5.jpg" },
                    { id: 6, pid: 4, name: "Kai Morgan", title: "Junior HR", img: "https://cdn.balkan.app/shared/6.jpg" },

                    { id: 7, stpid: "it-team", name: "Cory Robbins", tags: ["it-team-member"], title: "Core Team Lead", img: "https://cdn.balkan.app/shared/7.jpg" },
                    { id: 8, pid: 7, name: "Billie Roach", tags: ["it-team-member"], title: "Backend Senior Developer", img: "https://cdn.balkan.app/shared/8.jpg" },
                    { id: 9, pid: 7, name: "Maddox Hood", tags: ["it-team-member"], title: "C# Developer", img: "https://cdn.balkan.app/shared/9.jpg" },
                    { id: 10, pid: 7, name: "Sam Tyson", tags: ["it-team-member"], title: "Backend Junior Developer", img: "https://cdn.balkan.app/shared/10.jpg" },

                    { id: 11, stpid: "it-team", name: "Lynn Fleming", tags: ["it-team-member"], title: "UI Team Lead", img: "https://cdn.balkan.app/shared/11.jpg" },
                    { id: 12, pid: 11, name: "Jo Baker", tags: ["it-team-member"], title: "JS Developer", img: "https://cdn.balkan.app/shared/12.jpg" },
                    { id: 13, pid: 11, name: "Emerson Lewis", tags: ["it-team-member"], title: "Graphic Designer", img: "https://cdn.balkan.app/shared/13.jpg" },
                    { id: 14, pid: 11, name: "Haiden Atkinson", tags: ["it-team-member"], title: "UX Expert", img: "https://cdn.balkan.app/shared/14.jpg" },

                    { id: 15, stpid: "sales-team", name: "Tyler Chavez", title: "Sales Manager", img: "https://cdn.balkan.app/shared/15.jpg" },
                    { id: 16, pid: 15, name: "Raylee Allen", title: "Sales", img: "https://cdn.balkan.app/shared/16.jpg" },
                    { id: 17, pid: 15, name: "Kris Horne", title: "Sales Guru", img: "https://cdn.balkan.app/shared/8.jpg" },
                    { id: 18, pid: "top-management", name: "Leslie Mcclain", title: "Personal assistant", img: "https://cdn.balkan.app/shared/9.jpg", tags: ["assistant", "menu-without-add"] }
                ]);

                function preview() {
                    OrgChart.pdfPrevUI.show(chart, {
                        format: 'A4'
                    });
                }

                function nodePdfPreview(nodeId) {
                    OrgChart.pdfPrevUI.show(chart, {
                        format: 'A4',
                        nodeId: nodeId
                    });
                }

                function addSharholder(nodeId) {
                    chart.addNode({ id: OrgChart.randomId(), pid: nodeId, tags: ["menu-without-add"] });
                }

                function addAssistant(nodeId) {
                    var node = chart.getNode(nodeId);
                    var data = { id: OrgChart.randomId(), pid: node.stParent.id, tags: ["assistant"] };
                    chart.addNode(data);
                }


                function addDepartment(nodeId) {
                    var node = chart.getNode(nodeId);
                    var data = { id: OrgChart.randomId(), pid: node.stParent.id, tags: ["department"] };
                    chart.addNode(data);
                }

                function addManager(nodeId) {
                    chart.addNode({ id: OrgChart.randomId(), stpid: nodeId });
                }        
                <?php } ?>
            };
        </script>
        <!-- /COMMON SCRIPTS -->
        <!-- FOOTER -->
        <script src="assets/js/frontend_footer.js"></script>
        <!-- /FOOTER -->
    </body>

</html>
<script>
            $(document).ready(function (e) {
                $(".mm-title").attr("href", "#");
            });
</script>