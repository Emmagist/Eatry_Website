
<?php require "includes/user_header.php";?>
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

<div id="sidebar"> <a href="#" class="visible-phone"><i class="icon icon-th"></i>Order Tables</a>
 <ul>
    <li><a href="index.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Users</span> <span class="label label-important">2</span></a>
      <ul>
        <li><a href="admin.php">Admin</a></li>
        <li><a href="user.php">Customer</a></li>
      </ul>
    </li>
    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Menu</span> <span class="label label-important">2</span></a>
      <ul>
        <li><a href="menu.php">Menu</a></li>
        <li><a href="add_menu.php">Add Menu</a></li>
      </ul>
    </li>
   <li class="submenu active"> <a href="#"><i class="icon icon-fullscreen"></i> <span>Order</span> <span class="label label-important">2</span></a>
      <ul>
       <li><a href="order.php">Order</a></li>
       <li><a href="shipped.php">Shipped Order</a></li>
      </ul>
    </li>
   <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Blog</span> <span class="label label-important">2</span></a>
      <ul>
        <li><a href="blog.php">Blog</a></li>
        <li><a href="add_blog.php">Add Blog</a></li>
      </ul>
    </li>
   
  </ul>
</div>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="shipped.php" class="current">Shipped Order</a> </div>
    <h1>Shipped Tables</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Shipped table</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table table-responsive">
              <thead>
                <tr>
                  <th>Customer Name</th>
                  <th>Order Reference</th>
                  <th>Date shipped</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody> 

                <?php shipped();?>
                
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--Footer-part-->
<div class="row-fluid">
  <div id="footer" class="span12"> 2013 &copy; Matrix Admin. Brought to you by <a href="http://themedesigner.in">Themedesigner.in</a> </div>
</div>
<!--end-Footer-part-->
<script src="js/jquery.min.js"></script> 
<script src="js/jquery.ui.custom.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/jquery.uniform.js"></script> 
<script src="js/select2.min.js"></script> 
<script src="js/jquery.dataTables.min.js"></script> 
<script src="js/matrix.js"></script> 
<script src="js/matrix.tables.js"></script>
</body>
</html>
