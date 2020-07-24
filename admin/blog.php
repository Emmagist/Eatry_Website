<?php require "includes/blog_header.php";?>
<body>

<!--Header-part-->
<div id="header">
  <h1><a href="dashboard.html">Matrix Admin</a></h1>
</div>
<!--close-Header-part--> 

<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">Welcome User</span><b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a href="#"><i class="icon-user"></i> My Profile</a></li>
        <li class="divider"></li>
        <li><a href="#"><i class="icon-check"></i> My Tasks</a></li>
        <li class="divider"></li>
        <li><a href="login.html"><i class="icon-key"></i> Log Out</a></li>
      </ul>
    </li>
    <li class="dropdown" id="menu-messages"><a href="#" data-toggle="dropdown" data-target="#menu-messages" class="dropdown-toggle"><i class="icon icon-envelope"></i> <span class="text">Messages</span> <span class="label label-important">5</span> <b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a class="sAdd" title="" href="#"><i class="icon-plus"></i> new message</a></li>
        <li class="divider"></li>
        <li><a class="sInbox" title="" href="#"><i class="icon-envelope"></i> inbox</a></li>
        <li class="divider"></li>
        <li><a class="sOutbox" title="" href="#"><i class="icon-arrow-up"></i> outbox</a></li>
        <li class="divider"></li>
        <li><a class="sTrash" title="" href="#"><i class="icon-trash"></i> trash</a></li>
      </ul>
    </li>
    <li class=""><a title="" href="#"><i class="icon icon-cog"></i> <span class="text">Settings</span></a></li>
    <li class=""><a title="" href="login.html"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a></li>
  </ul>
</div>

<!--start-top-serch-->
<div id="search">
  <input type="text" placeholder="Search here..."/>
  <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
</div>
<!--close-top-serch--> 

<!--sidebar-menu-->

<div id="sidebar"> <a href="#" class="visible-phone"><i class="icon icon-list"></i>User</a>
 <ul>
    <li><a href="index.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Users</span> <span class="label label-important">2</span></a>
      <ul>
        <li><a href="user.php">Users</a></li>
        <li><a href="user_detail.php">User Detail</a></li>
      </ul>
    </li>
    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Menu</span> <span class="label label-important">4</span></a>
       <ul>
        <li><a href="admin.php">Admin</a></li>
        <li><a href="admin_detail.php">Admin Detail</a></li>
        <li><a href="user.php">Customer</a></li>
        <li><a href="user_detail.php">Customer Detail</a></li>
      </ul>
    </li>
    <li><a href="order.php"><i class="icon icon-fullscreen"></i> <span>Order</span></a></li>
    <li class="submenu active"> <a href="#"><i class="icon icon-th-list"></i> <span>Blog</span> <span class="label label-important">2</span></a>
      <ul>
        <li><a href="blog.php">Blog</a></li>
        <li><a href="edit_blog.php">Edit Blog</a></li>
      </ul>
    </li>
  </ul>
</div>

<!--close-left-menu-stats-sidebar-->

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Blog</a> </div>
    <h1>Blogs</h1>
  </div>
  <div class="container-fluid table-responsive">
    <hr>
    <div class="row-fluid table-responsive">
      <div class="span12 table-responsive">
        <div class="widget-box table-responsive">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>User table</h5>
          </div>
          <div class="widget-content nopadding table-responsive">
            <table class="table table-bordered data-table table-responsive">
              <thead class="table-responsive">
                <tr>
                  <th>Rendering engine</th>
                  <th>Browser</th>
                  <th>Platform(s)</th>
                  <th>Engine version</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              
                <tr class="gradeX">
                  <td>Misc</td>
                  <td>Lynx</td>
                  <td>Text only</td>
                  <td class="center">-</td>
                  <td class="center">
                    <a href="user_detail.php?edit" class="btn btn-xm btn-primary">View</a>
                    <a href="delete_user.php?delete" class="btn btn-xm btn-danger">Delete</a>
                  </td>
                </tr>
                <tr class="gradeC">
                  <td>Misc</td>
                  <td>IE Mobile</td>
                  <td>Windows Mobile 6</td>
                  <td class="center">-</td>
                  <td class="center">
                    <button class="btn btn-xm btn-primary">View</button>
                    <button class="btn btn-xm btn-danger">Delete</button>
                  </td>
                </tr>
                <tr class="gradeC">
                  <td>Misc</td>
                  <td>PSP browser</td>
                  <td>PSP</td>
                  <td class="center">-</td>
                  <td class="center">
                    <button class="btn btn-xm btn-primary">View</button>
                    <button class="btn btn-xm btn-danger">Delete</button>
                  </td>
                </tr>
                <tr class="gradeU">
                  <td>Other browsers</td>
                  <td>All others</td>
                  <td>-</td>
                  <td class="center">-</td>
                  <td class="center">
                    <button class="btn btn-xm btn-primary">View</button>
                    <button class="btn btn-xm btn-danger">Delete</button> 
                  </td>
                </tr>
                 <tr class="gradeU">
                  <td>Other browsers</td>
                  <td>All others</td>
                  <td>-</td>
                  <td class="center">-</td>
                  <td class="center">
                    <button class="btn btn-xm btn-primary">Edit</button>
                    <button class="btn btn-xm btn-danger">Delete</button> 
                  </td>
                </tr>
                 <tr class="gradeU">
                  <td>Other browsers</td>
                  <td>All others</td>
                  <td>-</td>
                  <td class="center">-</td>
                  <td class="center">
                    <button class="btn btn-xm btn-primary">Edit</button>
                    <button class="btn btn-xm btn-danger">Delete</button> 
                  </td>
                </tr>
                 <tr class="gradeU">
                  <td>Other browsers</td>
                  <td>All others</td>
                  <td>-</td>
                  <td class="center">-</td>
                  <td class="center">
                    <button class="btn btn-xm btn-primary">Edit</button>
                    <button class="btn btn-xm btn-danger">Delete</button> 
                  </td>
                </tr>
                 <tr class="gradeU">
                  <td>Other browsers</td>
                  <td>All others</td>
                  <td>-</td>
                  <td class="center">-</td>
                  <td class="center">
                    <button class="btn btn-xm btn-primary">Edit</button>
                    <button class="btn btn-xm btn-danger">Delete</button> 
                  </td>
                </tr>
                 <tr class="gradeU">
                  <td>Other browsers</td>
                  <td>All others</td>
                  <td>-</td>
                  <td class="center">-</td>
                  <td class="center">
                    <button class="btn btn-xm btn-primary">Edit</button>
                    <button class="btn btn-xm btn-danger">Delete</button> 
                  </td>
                </tr>
                 <tr class="gradeU">
                  <td>Other browsers</td>
                  <td>All others</td>
                  <td>-</td>
                  <td class="center">-</td>
                  <td class="center">
                    <button class="btn btn-xm btn-primary">Edit</button>
                    <button class="btn btn-xm btn-danger">Delete</button> 
                  </td>
                </tr>
                 <tr class="gradeU">
                  <td>Other browsers</td>
                  <td>All others</td>
                  <td>-</td>
                  <td class="center">-</td>
                  <td class="center">
                    <button class="btn btn-xm btn-primary">Edit</button>
                    <button class="btn btn-xm btn-danger">Delete</button> 
                  </td>
                </tr>
                 <tr class="gradeU">
                  <td>Other browsers</td>
                  <td>All others</td>
                  <td>-</td>
                  <td class="center">-</td>
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
<script>
	$('.textarea_editor').wysihtml5();
</script>
</body>
</html>
