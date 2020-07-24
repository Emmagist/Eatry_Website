<?php require "includes/user_header.php";?>

<!--Header-part-->
<div id="header">
  <h1><a href="dashboard.html">Matrix Admin</a></h1>
</div>
<!--close-Header-part--> 

<!--top-Header-menu-->
<?php require_once "includes/top_head.php";?>
<!-- to header endhere -->

<!--start-top-serch-->
<?php require_once "includes/search.php";?>
<!--close-top-serch--> 

<!--sidebar-menu-->
<?php require_once "includes/user_sidebar.php";?>
<!--close-left-menu-stats-sidebar-->


<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="tip-bottom">Menu</a> <a href="#" class="current">Edit Admin</a> </div>
    <h1>Admin Detail</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5>Your Detail</h5>
          </div>
          <div class="widget-content nopadding">
            <form action="#" method="post" class="form-horizontal" enctype="multipart/data">
            	<?php update_admin();?>
             
            </form>
          </div>
        </div>
      </div>
    </div>
   
  </div>
</div>


<!--Footer-part-->
<?php require_once "includes/footer.php";?>
<!--end-Footer-part-->  
<script src="js/jquery.min.js"></script> 
<script src="js/jquery.ui.custom.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/jquery.uniform.js"></script> 
<script src="js/select2.min.js"></script> 
<script src="js/jquery.dataTables.min.js"></script> 
<script src="js/matrix.js"></script> 
<script src="js/matrix.tables.js"></script>
<script>
	$('.textarea_editor').wysihtml5();
</script>
</body>
</html>