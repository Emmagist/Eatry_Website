

<div id="sidebar"> <a href="#" class="visible-phone"><i class="icon icon-list"></i>User</a>
 <ul>
    <li><a href="index.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li class="submenu active"> <a href=""><i class="icon icon-th-list"></i> <span>User</span> <span class="label label-important">2</span></a>
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
   <li class="submenu"> <a href="#"><i class="icon icon-fullscreen"></i> <span>Order</span> <span class="label label-important">2</span></a>
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
    
    <img src="<?=$admin['admin_image']?>" width="220" height="10" class="rounded-circle">
    <li><?=$admin['admin_name']?></li>
   
  </ul>
</div>