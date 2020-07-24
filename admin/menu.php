<?php require "includes/menu_header.php";?>
<body>

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
<?php require_once "includes/menu_sidebar.php";?>
<!--close-left-menu-stats-sidebar-->

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Menu</a> </div>
    <h1>Menu</h1>
  </div>
  <div class="container-fluid table-responsive">
    <hr>
    <div class="row-fluid table-responsive">
      <div class="span12 table-responsive">
        <div class="widget-box table-responsive">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Menu table</h5>
          </div>
          <div class="widget-content nopadding table-responsive">
            <table class="table table-bordered data-table table-responsive">
              <thead class="table-responsive">
                <tr>
                  <th>Menu Name</th>
                  <th>Menu Price</th>
                  <th>Menu Qty</th>
                  <th>Menu Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              
                <tr class="gradeX">
                  <td>Misc</td>
                  <td>Lynx</td>
                  <td>Text only</td>
                  <td class="center">
                    <a href="menu.php?status" class="btn btn-xm btn-warning">Pending</a>
                  </td>
                  <td class="center">
                    <a href="edit_menu.php?edit" class="btn btn-xm btn-primary">Edit</a>
                    <a href="delete_menu.php?delete" class="btn btn-xm btn-danger">Delete</a>
                  </td>
                </tr>
                <tr class="gradeC">
                  <td>Misc</td>
                  <td>IE Mobile</td>
                  <td>Windows Mobile 6</td>
                  <td class="center">
                    <a href="menu.php?status" class="btn btn-xm btn-success">Active</a>
                  </td>
                  <td class="center">
                    <button class="btn btn-xm btn-primary">Edit</button>
                    <button class="btn btn-xm btn-danger">Delete</button>
                  </td>
                </tr>
                 
                 <tr class="gradeU">
                  <td>Other browsers</td>
                  <td>All others</td>
                  <td>-</td>
                  <td class="center">
                   <a href="menu.php?status" class="btn btn-xm btn-warning">Pending</a>
                  </td>
                  <td class="center">
                    <button class="btn btn-xm btn-primary">Edit</button>
                    <button class="btn btn-xm btn-danger">Delete</button> 
                  </td>
                </tr>
                 <tr class="gradeU">
                  <td>Other browsers</td>
                  <td>All others</td>
                  <td>-</td>
                  <td class="center">
                     <a href="menu.php?status" class="btn btn-xm btn-success">Active</a>
                  </td>
                  <td class="center">
                    <button class="btn btn-xm btn-primary">Edit</button>
                    <button class="btn btn-xm btn-danger">Delete</button> 
                  </td>
                </tr>
                 </tr>
                 <tr class="gradeU">
                  <td>Other browsers</td>
                  <td>All others</td>
                  <td>-</td>
                  <td class="center">
                    <a href="menu.php?status" class="btn btn-xm btn-warning">Pending</a>
                  </td>
                  <td class="center">
                    <button class="btn btn-xm btn-primary">Edit</button>
                    <button class="btn btn-xm btn-danger">Delete</button> 
                  </td>
                </tr>
              </tbody>
            </table>
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
