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
      <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Users</span> <span class="label label-important">3</span></a>
        <ul>
          <li><a href="user.php">Users</a></li>
          <li><a href="user_detail.php">User Detail</a></li>
        </ul>
      </li>
      <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Menu</span> <span class="label label-important">3</span></a>
        <ul>
          <li><a href="menu.php">Menu</a></li>
          <li><a href="add_menu.php">Add Menu</a></li>
          <li><a href="order.php">Edit Menu</a></li>
        </ul>
      </li>
     <li class="submenu active"> <a href="#"><i class="icon icon-fullscreen"></i> <span>Order</span> <span class="label label-important">2</span></a>
      <ul>
       <li><a href="order.php">Order</a></li>
       <li><a href="shipped.php">Shipped Order</a></li>
      </ul>
    </li>
      <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Forms</span> <span class="label label-important">3</span></a>
        <ul>
          <li><a href="form-common.html">Basic Form</a></li>
          <li><a href="form-validation.html">Form with Validation</a></li>
          <li><a href="form-wizard.html">Form with Wizard</a></li>
        </ul>
      </li>
     
    </ul>
  </div>
<!-- sidebar endhere -->

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="order.php">Order</a> <a href="#" class="current">Inventory</a> </div>
    <h1>Inventory</h1>
  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-briefcase"></i> </span>
            <h5 >Company Name</h5>
          </div>
          <div class="widget-content">
            <div class="row-fluid">
              <div class="span6">
                <table class="table table-bordered table-invoice">
                  <tbody>
                    <tr>
                    <tr>
                      <td class="width30">Company Name:</td>
                      <td class="width70"><strong>TD-6546</strong></td>
                    </tr>
                    <tr>
                      <td>Order Date:</td>
                      <td><strong>March 23, 2013</strong></td>
                    </tr>
                    <tr>
                      <td>Due Date:</td>
                      <td><strong>April 01, 2013</strong></td>
                    </tr>
                  <td class="width30">Company Address:</td>
                    <td class="width70"><strong>Cliente Company name.</strong> <br>
                      501 Mafia Street., washington, <br>
                      NYNC 3654 <br>
                      Contact No: 123 456-7890 <br>
                      Email: youremail@companyname.com </td>
                  </tr>
                    </tbody>
                  
                </table>
              </div>
              <div class="span6">
                <?php order_detail();?>
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
<script src="js/matrix.js"></script>
</body>
</html>
