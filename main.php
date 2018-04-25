<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Shelf Life</title>

	  <meta charset="utf-8" />
    <link href="css/bootstrap.min.css" rel="stylesheet" />

    <link href="css/style.css" rel="stylesheet" />
    <link href="css/styledropdown.css" rel="stylesheet" />
    <script src="js/jquery-1.10.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    	<link rel="stylesheet" media="all" type="text/css" href="jquerydatepicker/jquery-ui.css" />
		<link rel="stylesheet" media="all" type="text/css" href="jquerydatepicker/jquery-ui-timepicker-addon.css" />
	   <script type="text/javascript" src="jquerydatepicker/jquery-ui.min.js"></script>
		<script type="text/javascript" src="jquerydatepicker/jquery-ui-timepicker-addon.js"></script>
		<script type="text/javascript" src="jquerydatepicker/jquery-ui-sliderAccess.js"></script>

    <script src="js/select2.js"></script>
    <script>
      $(function(){

        // display logs
        function log(text) {
          $('#logs').append(text + '<br>');
        }

        $('select').select2()
        .on("change", function(e) {
          // mostly used event, fired to the original element when the value changes
          log("change val=" + e.val);
        })
        .on("select2-opening", function() {
          log("opening");
        })
        .on("select2-open", function() {
          // fired to the original element when the dropdown opens
          log("open");
        })
        .on("select2-close", function() {
          // fired to the original element when the dropdown closes
          log("close");
        })
        .on("select2-highlight", function(e) {
          log("highlighted val=" + e.val + " choice=" + e.choice.text);
        })
        .on("select2-selecting", function(e) {
          log("selecting val=" + e.val + " choice=" + e.object.text);
        })
        .on("select2-removed", function(e) {
          log("removed val=" + e.val + " choice=" + e.choice.text);
        })
        .on("select2-loaded", function(e) {
          log("loaded (data property omitted for brevitiy)");
        })
        .on("select2-focus", function(e) {
          log("focus");
        });

      });
    </script>
    <link rel="stylesheet" href="js/select2.css">
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar1" aria-expanded="false">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
              </button>
      <a class="navbar-brand" href="<?php echo "main.php?p=checknow&txtstart=".date("d-m-Y")."&txtend=".date("d-m-Y")."" ?>">Shelf Life</a>
    </div>
    <div class="collapse navbar-collapse" id="navbar1">
    <ul class="nav navbar-nav">

              <li>
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">ข้อมูลพื้นฐาน<b class="caret"></b></a>
                  <ul class="dropdown-menu multi-level">
                      <li><a href="<?php echo "main.php?p=insertsize" ?>">เพิ่มข้อมูลขนาดสินค้า</a></li>
                      <li><a href="<?php echo "main.php?p=insertflavor" ?>">เพิ่มข้อมูลรสชาติ</a></li>
                      <li><a href="<?php echo "main.php?p=insertplace" ?>">เพิ่มข้อมูลสถานที่</a></li>
                      <li><a href="<?php echo "main.php?p=insertitemgroup" ?>">เพิ่มข้อมูลกลุ่มสินค้า</a></li>
                      <li><a href="<?php echo "main.php?p=insertitem" ?>">เพิ่มข้อมูลสินค้า</a></li>
                      <li class="dropdown-submenu">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown</a>
                          <ul class="dropdown-menu">
                              <li><a href="#">Action</a></li>
                              <li class="dropdown-submenu">
                                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown</a>
                                  <ul class="dropdown-menu">
                                      <li class="dropdown-submenu">
                                          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown</a>
                                          <ul class="dropdown-menu">
                                              <li><a href="#">Action</a></li>
                                              <li><a href="#">Another action</a></li>
                                              <li><a href="#">Something else here</a></li>
                                              <li class="divider"></li>
                                              <li><a href="#">Separated link</a></li>
                                              <li class="divider"></li>
                                              <li><a href="#">One more separated link</a></li>
                                          </ul>
                                      </li>
                                  </ul>
                              </li>
                          </ul>
                      </li>
                  </ul>
              </li>

              <li>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">สร้างมาตรฐาน<b class="caret"></b></a>
                  <ul class="dropdown-menu">
                      <li><a href="<?php echo "main.php?p=insertcharacter" ?>">เพิ่มข้อมูลลักษณะการตรวจสอบ</a></li>
                      <li class="dropdown-submenu">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown</a>
                          <ul class="dropdown-menu">
                              <li><a href="#">Action</a></li>
                              <li><a href="#">Another action</a></li>
                              <li><a href="#">Something else here</a></li>
                              <li><a href="#">Separated link</a></li>
                              <li class="divider"></li>
                              <li class="dropdown-submenu">
                                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown</a>
                                  <ul class="dropdown-menu">
                                      <li class="dropdown-submenu">
                                          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown</a>
                                          <ul class="dropdown-menu">
                                              <li><a href="#">Action</a></li>
                                              <li><a href="#">Another action</a></li>
                                              <li><a href="#">Something else here</a></li>
                                              <li class="divider"></li>
                                              <li><a href="#">Separated link</a></li>
                                              <li class="divider"></li>
                                              <li><a href="#">One more separated link</a></li>
                                          </ul>
                                      </li>
                                  </ul>
                              </li>
                          </ul>
                      </li>
                  </ul>
              </li>

              <li>
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">เพิ่ม Job<b class="caret"></b></a>
                  <ul class="dropdown-menu multi-level">
                       <li><a href="<?php echo "main.php?p=insertqrcode" ?>">เพิ่มข้อมูลคิวอาโค้ด</a></li>

                  </ul>
              </li>

              <li>
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">ตรวจสอบสินค้า<b class="caret"></b></a>
                  <ul class="dropdown-menu multi-level">

                         <li><a href="main.php?p=checkproduct">เช็ครอบการตรวจสอบ</a></li>
                        <li><a href="<?php echo "main.php?p=addjobqrcode" ?>">ตารางการตรวจสินค้า</a></li>
                  </ul>
              </li>


          </ul>


      <ul class="nav navbar-nav navbar-right">


      <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>Log out</a></li>
      </ul>
    </div>
  </div>
</nav>
  <?php include"connect/dbconnect.php";
  include "".$_GET[p].".php";

  ?>
</body>
</html>
