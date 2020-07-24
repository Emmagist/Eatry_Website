required<?php require "includes/menu_header.php";?>
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
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="tip-bottom">Menu</a> <a href="#" class="current">Add Menu</a> </div>
    <h1>Menu Upload</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5>Menu-info</h5>
          </div>
          <div class="widget-content nopadding">
            <form  method="post" class="form-horizontal" enctype="multipart/form-data">
              <?php add_menu();?>
              <div class="control-group">
                <label class="control-label">Menu Name :</label>
                <div class="controls">
                  <input type="text" class="span11" name="menu_title" placeholder="Enter title" />
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Menu Price :</label>
                <div class="controls">
                  <input type="text" class="span11" name="menu_price" placeholder="Enter Price" />
                </div>
              </div>
               <div class="control-group">
                <label class="control-label">Menu Quantity :</label>
                <div class="controls">
                  <input type="text" class="span11" name="menu_quantity" placeholder="Enter Quantity" />
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Menu Category :</label>
                <div class="controls">
                  <select name="menu_cat" >
                    <option>Choose Category</option>
                    <option>Second option</option>
                    <option>Third option</option>
                    <option>Fourth option</option>
                    <option>Fifth option</option>
                    <option>Sixth option</option>
                    <option>Seventh option</option>
                    <option>Eighth option</option>
                  </select>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">File upload input :</label>
                <div class="controls">
                  <input type="file" name="file"/>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Menu Description :</label>
                <div class="controls">
                  <textarea class="textarea_editor span11" cols="15" name="menu_description" ></textarea>
                </div>
              </div>
              <div class="form-actions">
                <button type="submit" class="btn btn-success" name="add_menu">Save</button>
                 <a href="menu.php" type="submit" class="btn btn-default">Cancle</a>
              </div>
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
<script src="js/bootstrap-colorpicker.js"></script> 
<script src="js/bootstrap-datepicker.js"></script> 
<script src="js/jquery.toggle.buttons.js"></script> 
<script src="js/masked.js"></script> 
<script src="js/jquery.uniform.js"></script> 
<script src="js/select2.min.js"></script> 
<script src="js/matrix.js"></script> 
<script src="js/matrix.form_common.js"></script> 
<script src="js/wysihtml5-0.3.0.js"></script> 
<script src="js/jquery.peity.min.js"></script> 
<script src="js/bootstrap-wysihtml5.js"></script> 
<script>
  $('.textarea_editor').wysihtml5();
</script>
</body>
</html>
