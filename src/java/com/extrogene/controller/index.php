
    
<!DOCTYPE html">

<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>VisClone</title>
    
    <!-- please-wait CSS -->
	
	<link href="../bower_components/please-wait/build/please-wait.css" rel="stylesheet">
	<link href="../bower_components/please-wait/build/loadings_screen_default.css" rel="stylesheet">
	<link href="../dist/css/please_wait_custom.css" rel="stylesheet">
	
	<!-- highcharts Treemap JavaScript & JQuery -->
	
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<script src="http://code.highcharts.com/highcharts.js"></script>
	<script src="http://code.highcharts.com/modules/heatmap.js"></script>
	<script src="http://code.highcharts.com/modules/treemap.js"></script>
	



   
	
	<!-- highcharts Treemap & pieChart CSS -->
	<link href="../dist/css/highcharts_custom.css" rel="stylesheet">
	
	<!-- bxSlider CSS file -->
	<link href="../dist/css/jquery.bxslider.css" rel="stylesheet" />
		
    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="../dist/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../bower_components/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <!--custom styles for directory  stucture -->
    <link href="../dist/css/custom.css" rel="stylesheet">
	
    <!-- For clone list  -->
    <script src="../dist/js/clone_list.js"></script>
<?php
    if(isset($_GET['analyzisid'])&& isset($_GET['sourceid'])){
        echo $_GET['analyzisid'];
        echo $_GET['sourceid'];

        $aid =$_GET['analyzisid'];
        $sid=$_GET['sourceid'];

    }
?>

<script type="text/javascript">
	
	var clonelist;
   var value='...';
  var ANALIZER_ID=  '<?php echo $aid ; ?>';
  var SOURCE_ID= '<?php echo $sid ; ?>';
  console.log(ANALIZER_ID);


  /* var data;
   $.get("http://localhost:83/Visclone/getClonedList.php?limit=all", function(response) {
        data = JSON.parse(response);
        console.log(data);
       fillCloneClassStructure(data);
       


   }).error(function(){
  alert("Sorry could not proceed");
});*/

var getClonedList= CallService("../../getClonedList.php?limit="+ANALIZER_ID);
console.log(getClonedList);
var clonelist=getClonedList['clonelist'];

//fillCloneClassStructure(clonelist);
  
var fileListObject = CallService('../../getAllFiles.php?filelist='+ANALIZER_ID);
//console.log(fileListObject.filelist);
var jsArr=fileListObject.filelist;
//console.log(jsArr);

var timeLineObj=CallService('../../timeline.php?timeline='+ANALIZER_ID);
console.log(timeLineObj);

function CallService(url){
  var xmlHttp = new XMLHttpRequest();
    xmlHttp.open( "GET", url, false ); // false for synchronous request
    xmlHttp.send( null );
   // console.log(xmlHttp.responseText);
    //console.log(typeof(xmlHttp.responseText));

    return JSON.parse(xmlHttp.responseText);
   //  call  web service  and return  result
}


  //console.log(clonelist);
</script>
<script >
/*	var jsArr = new Array();  
	<%  
	for (int i=0; i < folderlist.length; i++) { 
	%>
	
	 jsArr[<%= i %>] = '<%=folderlist[i]%>';   //converting jsp array to Javascript.
	
	<%}%>
		//folderStructure(jsArr);
		//alert(jsArr);
*/	
</script>

</head>

<body ng-controller="MainCtrl" >
<!--  <%-- <jsp:include page="./folder_structure.jsp" />
  --%> -->   <div id="wrapper">
	
	<div class="inner" ng-view> 
		</div>

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">                   
            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <img src="../images/upload.png" alt="Upload" style="width:35px; height:35px;">
                    </a>
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <img src="../images/modules.png" alt="View Modules" style="width:25px; height:25px;">
                    </a>                
                </li>
                
                <li class="dropdown">
                <div class="toggleButton">
                	<a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <img src="../images/hind.png" alt="Hind Modules" style="width:25px; height:25px;">
                    </a> 
                </div>
                                  
                </li>
            </ul>

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group-custom-search-form">
                                <img src="../images/logo.png" alt="Mountain View" style="width:140px; height:180px;">
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li class="dashboard-search">
                            <a href="index.html"><i class="fa fa-circle-o-notch fa-leftSideBar"></i> Project Name</a>
                        </li>
                        <li  id='list-11'>
                            <!-- <a href="#"><i class="fa fa-folder-open fa-fw"></i> Folder<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="flot.html">Flot Charts</a>
                                </li>
                                <li>
                                    <a href="morris.html">Morris.js Charts</a>
                                </li>
								<li>
                                    <a href="treemap.html">TreeMap</a>
                                </li>
                            </ul> -->
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="tables.html"><i class="fa fa-file-text fa-leftSideBar"></i> File</a>
                        </li>
                        <li>
                            <a href="forms.html"><i class="fa fa-edit fa-leftSideBar"></i> Forms</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-wrench fa-leftSideBar"></i> UI Elements<span class="fa arrow fa-leftSideBar"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="panels-wells.html">Panels and Wells</a>
                                </li>
                                <li>
                                    <a href="buttons.html">Buttons</a>
                                </li>
                                <li>
                                    <a href="notifications.html">Notifications</a>
                                </li>
                                <li>
                                    <a href="typography.html">Typography</a>
                                </li>
                                <li>
                                    <a href="icons.html"> Icons</a>
                                </li>
                                <li>
                                    <a href="grid.html">Grid</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-sitemap fa-leftSideBar"></i> Multi-Level Dropdown<span class="fa arrow fa-leftSideBar"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#">Second Level Item</a>
                                </li>
                                <li>
                                    <a href="#">Second Level Item</a>
                                </li>
                                <li>
                                    <a href="#">Third Level <span class="fa arrow fa-leftSideBar"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-files-o fa-leftSideBar"></i> Sample Pages<span class="fa arrow fa-leftSideBar"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="blank.html">Blank Page</a>
                                </li>
                                <li>
                                    <a href="login.html">Login Page</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->


            
                        </li>
                    </ul>

                   
                </div>
                
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->

             <div  id="cloneLeftdiv">         

            </div>

        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div id="row" class="row">
            	<ul class="bxslider">
				
				<!-- Change Tracker Module-->
            	<li>
                <div class="col-lg-3 col-md-6">
                    <div class="panel-panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-houzz fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">Change Tracker</div>
                                    
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-fire"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                </li>
				<!-- /.Change Tracker Module-->
				
				<!-- Contributors Module-->
            	<li>
                <div class="col-lg-3 col-md-6">
                    <div class="panel-panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-users fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">Contributors</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-fire"> </i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                </li>
				<!-- /.Contributors Module -->
				
				<!-- Version Viewer Module -->
            	<li>
                <div class="col-lg-3 col-md-6">
                    <div class="panel-panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-hand-pointer-o fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">Version Viewer</div>
                                   
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-fire"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                </li>
				<!-- /.Version Viewer Module -->
				
				<!-- Recommender Module -->
            	<li>
                <div class="col-lg-3 col-md-6">
                    <div class="panel-panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-check-square-o fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">Recommender</div>
                                </div>
                            </div>
                        </div>
                        <a href="#" onClick="displayPieChart ()">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-fire"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                </li>
				<!-- /.Recommender Module -->
				
				<!-- Tree map Module -->
            	<li>
                <div class="col-lg-3 col-md-6">
                    <div class="panel-panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-sitemap fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">TreeMap</div>
                                    
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-fire"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                </li>
				<!-- /.Tree map Module -->
				
				<!-- Pie Chart Module-->
                <li>
                <div class="col-lg-3 col-md-6">
                    <div class="panel-panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-pie-chart fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">Pie Chart</div>
                                </div>
                            </div>
                        </div>
                        <a href="#" onClick="displayPieChart ()">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-fire"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                </li>
				<!-- /.Pie Chart Module -->
				
				<!-- Differencer Module -->
                <li>
                <div class="col-lg-3 col-md-6">
                    <div class="panel-panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-map fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">Differencer</div>
                                   
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-fire"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                </li>
				<!-- /.Differencer Module -->
				
				<!-- Time Filter Module -->
                <li>
                <div class="col-lg-3 col-md-6">
                    <div class="panel-panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-hourglass-end fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">Time Filter</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-fire"> </i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                </li>
				<!-- /.Time Filter Module -->
				
                </ul>
            </div>
            <!-- /.row  bx slider -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="raw">
                       
                        <div class="col-lg-8">
                           <div class="panel panel-default">
                              <div class="panel-heading">
                                 <i class="fa fa-sitemap fa-fw"></i> TreeMap
                     
                                    <div class="pull-right">
                                       <div class="btn-group">
                                          <button type="button" class="fa fa-chevron-down" data-toggle="dropdown">
                                        
                                          </button>
                                          <ul class=" pull-right" role="menu">
                                              <li><a onclick="ShowTreeMap('All')">Show All  Files</a>
                                              </li>
                                              <li><a onclick="ShowTreeMap('clone')">Show Clones files</a>
                                              </li>
                                              <li><a onclick="HideTreeMap()">Hide</a>
                                              </li>
                                            
                                          </ul>
                                       </div>
                                    </div>
                              </div>
                               <!-- /.panel-heading -->
                              <div class="panel-body">
                                  <div id="container_treemap"> </div>
                              </div>
                              <!-- /.panel-body -->
                           </div>
                           <!-- /.panel -->  
                        </div>
                        <!-- tree map col-lg-8  -->
					
                        <div class="col-lg-4">
                            <div class="panel panel-default">
                              <div class="panel-heading">
                                 <i class="fa fa-clone fa-fw"></i> Clone Class Tree
                              </div>
                               <!-- /.panel-heading -->
                              <div class="panel-body">
                                 <div class="list-group" id='clonelistdiv'>
                            
                                 clone  classes
                            
                                 </div>
                            <!-- /.list-group -->
                              </div>
                              <!-- /.panel-body -->
                           </div>
                           <!-- /.panel -->
                        </div>
                         <!-- /.col-lg-4 -->
                    </div><!-- end  of custom contents -->
                    
                    <div class="col-lg-12">
                       <div class="panel panel-default">
                           <div class="panel-heading">
                               <i class="fa fa-map fa-fw"></i> Diferencer    
                               <div class="pull-right">
                                       <div class="btn-group">
                                          <button type="button" class="fa fa-chevron-down" data-toggle="dropdown">
                                        
                                          </button>
                                          <div  id='clonelistdiv-in-dif' class="dropdown-menu pull-right" role="menu">
                                              
                                          </div>
                                       </div>
                                    </div>
                           </div>
                           <!-- /.panel-heading -->
                           <div class="panel-body">
                               <div class="row">
                                   <div class="col-lg-12">
                                    <div class="raw" id="diferencer">
                           
                                    </div>
                                    <!-- /.table-responsive -->
                                
                                <!-- /.col-lg-4 (nested) -->
                                <div class="col-lg-8">
                                    <div id="morris-bar-chart"></div>
                                </div>
                                <!-- /.col-lg-8 (nested) -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel --> 
                    </div>
                    
                    <div class="col-lg-8">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Pie Chart Example
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="flot-chart">
                                    <div class="flot-chart-content" id="container_pieChart"></div>
                                </div>
                            </div>
                            <!-- /.panel-body -->
                        </div>
                    <!-- /.panel -->
                    </div>
                    <div class="col-lg-4">
                         <div class="chat-panel panel panel-default">
                                <div class="panel-heading">
                                    <i class="fa fa-comments fa-fw"></i>
                                    Recomendation
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div id="diagram"></div>
                                    <div class="get">
                                        <div class="arc">
                                            <span class="text">Type  1</span>
                                            <input type="hidden" id="cl-1-val" class="percent"  />
                                            <input type="hidden" class="color" value="#FF1111" />
                                        </div>
                                        <div class="arc">

                                            <span class="text">Type 2 & 3</span>
                                            <input type="hidden" id="cl-2-val" class="percent" />
                                            <input type="hidden" class="color" value="#EEFF99" />
                                        </div>

                                        <div class="arc">
                                            <span class="text">overall</span>
                                            <input type="hidden" class="percent" value="90" />
                                            <input type="hidden" class="color" value="#11BBBB" />
                                        </div>

                                    </div>



                                    <ul class="chat">
                                        <li class="left clearfix">
                                            <span class="chat-img pull-left">
                                                <img src="http://placehold.it/50/55C1E7/fff" alt="User Avatar" class="img-circle" />
                                            </span>
                                            <div class="chat-body clearfix">
                                                <div class="header">
                                                    <strong class="primary-font">Type 1</strong>
                                                </div>
                                                <p>
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.
                                                </p>
                                            </div>
                                        </li>
                                        <li class="right clearfix">
                                            <span class="chat-img pull-right">
                                                <img src="http://placehold.it/50/FA6F57/fff" alt="User Avatar" class="img-circle" />
                                            </span>
                                            <div class="chat-body clearfix">
                                                <div class="header">
                                                    <strong class="pull-right primary-font">Type 2</strong>
                                                </div>
                                                <p>
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.
                                                </p>
                                            </div>
                                        </li>
                                        <li class="left clearfix">
                                            <span class="chat-img pull-left">
                                                <img src="http://placehold.it/50/55C1E7/fff" alt="User Avatar" class="img-circle" />
                                            </span>
                                            <div class="chat-body clearfix">
                                                <div class="header">
                                                    <strong class="primary-font">Type 2</strong>
                                                </div>
                                                <p>
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.
                                                </p>
                                            </div>
                                        </li>
                                        <li class="right clearfix">
                                            <span class="chat-img pull-right">
                                                <img src="http://placehold.it/50/FA6F57/fff" alt="User Avatar" class="img-circle" />
                                            </span>
                                            <div class="chat-body clearfix">
                                                <div class="header">
                                                    <small class=" text-muted">
                                                        <i class="fa fa-clock-o fa-fw"></i> 15 mins ago</small>
                                                    <strong class="pull-right primary-font">Type 3</strong>
                                                </div>
                                                <p>
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.
                                                </p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <!-- /.panel-body -->
                                <div class="panel-footer">
                                    <div class="text-center">
                                            <button class="btn btn-warning btn-sm" id="btn-chat">
                                                View Recomendations
                                            </button>
                                        
                                    </div>
                                </div>
                                <!-- /.panel-footer -->
                         </div>
                            <!-- /.panel .chat-panel -->

                    </div>  
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="flot-chart">
                                    <div class="virsion-viwer" id="container_virsion-viwer"></div>
                                </div>
                            </div>
                            <!-- /.panel-body -->
                        </div>
                    <!-- /.panel -->
                    </div> 
                    <div class="col-lg-12">
                         <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-clock-o fa-fw"></i> Responsive Timeline
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <ul class="timeline" id='timeline-id'>
                                <!-- <li>
                                    <div class="timeline-badge">
                                    </div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title"><i class="fa fa-user"></i> Nuwan</h4>
                                            <p><small class="text-muted"><i class="fa fa-clock-o"></i> 11 hours ago </small>
                                            </p>
                                        </div>
                                        <div class="timeline-body">
                                            <p> http://localhost:83/Visclone/v2/Visclone/timeline.php?timeline=1</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="timeline-inverted">
                                    <div class="timeline-badge">
                                    </div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title"><i class="fa fa-user"></i> Nuwan</h4>
                                            <p><small class="text-muted"><i class="fa fa-clock-o"></i> 11 hours ago </small>
                                            </p>
                                        </div>
                                        <div class="timeline-body">
                                            <p> http://localhost:83/Visclone/v2/Visclone/timeline.php?timeline=1</p>
                                        </div>
                                    </div>
                                </li> -->
                                
                            </ul>
                        </div>
                       
                    </div>

                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

	<!-- Please wait JavaScript & Angular.js -->
	
	<script type="text/javascript" src="../bower_components/please-wait/build/please-wait.js"></script>
	<script type="text/javascript" src="../dist/js/please_wait_custom.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.5/angular.min.js"></script>
	
    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- edited Timeline -->
     <script src="../dist/js/timeline.js"></script>
    
    <!-- bxSlider Javascript -->
	<script src="../dist/js/jquery.bxslider.js"></script>
	<script src="../dist/js/jquery_bxslider_custom.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <!-- <script src="../bower_components/raphael/raphael-min.js"></script>
    <script src="../bower_components/morrisjs/morris.min.js"></script>
    

    <script src="../js/morris-data.js"></script> -->
    <script src="../js/morris-data.js"></script>
    
     <!-- For Folder Tree Javascript   -->
     <script src="../dist/js/folder-structure1.js"></script>
     
     
     <!-- For Folder Structure - Treemap Javascript  -->
     <!--<script src="../dist/js/treemap_folder_structure.js"></script> -->

     <!--for  virsion viewer-->
     <script src="../dist/js/highcharts-virsion-viwer.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
    
     <!-- Jquery custom JavaScript -->
     <script src="../dist/js/jquery_custom.js"></script>
     <script src="../dist/js/raphael/init.js"></script>
     <script src="../dist/js/raphael/raphael.js"></script>
     <script src="../dist/js/recomender.js"></script>
  <script src="../dist/js/highcharts_piechart_custom.js"></script>
    <script src="../dist/js/highcharts_treeMap.js"></script>

</body>

</html>
