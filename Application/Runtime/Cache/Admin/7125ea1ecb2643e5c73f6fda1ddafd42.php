<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>sing后台管理平台</title>
    <!-- Bootstrap Core CSS -->
    <link href="/Public/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/Public/css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="/Public/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/Public/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="/Public/css/sing/common.css" />
    <link rel="stylesheet" href="/Public/css/party/bootstrap-switch.css" />
    <link rel="stylesheet" type="text/css" href="/Public/css/party/uploadify.css">

    <!-- jQuery -->
    <script src="/Public/js/jquery.js"></script>
    <script src="/Public/js/bootstrap.min.js"></script>
    <script src="/Public/js/dialog/layer.js"></script>
    <script src="/Public/js/dialog.js"></script>
    <script type="text/javascript" src="/Public/js/party/jquery.uploadify.js"></script>

</head>

    



<body>
<div id="wrapper">

  <?php
 $navs = D("Menu")->getAdminMenus(); $index = 'index'; ?>
<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" >singcms内容管理平台</a>
  </div>
  <!-- Top Menu Items -->
  <ul class="nav navbar-right top-nav">
    <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
      <ul class="dropdown-menu message-dropdown">
        <li class="message-preview">
          <a href="#">
            <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
              <div class="media-body">
                <h5 class="media-heading"><strong>John Smith</strong>
                </h5>
                <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                <p>Lorem ipsum dolor sit amet, consectetur...</p>
              </div>
            </div>
          </a>
        </li>
        <li class="message-preview">
          <a href="#">
            <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
              <div class="media-body">
                <h5 class="media-heading"><strong>John Smith</strong>
                </h5>
                <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                <p>Lorem ipsum dolor sit amet, consectetur...</p>
              </div>
            </div>
          </a>
        </li>
        <li class="message-preview">
          <a href="#">
            <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
              <div class="media-body">
                <h5 class="media-heading"><strong>John Smith</strong>
                </h5>
                <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                <p>Lorem ipsum dolor sit amet, consectetur...</p>
              </div>
            </div>
          </a>
        </li>
        <li class="message-footer">
          <a href="#">Read All New Messages</a>
        </li>
      </ul>
    </li>
    <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
      <ul class="dropdown-menu alert-dropdown">
        <li>
          <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
        </li>
        <li>
          <a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a>
        </li>
        <li>
          <a href="#">Alert Name <span class="label label-success">Alert Badge</span></a>
        </li>
        <li>
          <a href="#">Alert Name <span class="label label-info">Alert Badge</span></a>
        </li>
        <li>
          <a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a>
        </li>
        <li>
          <a href="#">Alert Name <span class="label label-danger">Alert Badge</span></a>
        </li>
        <li class="divider"></li>
        <li>
          <a href="#">View All</a>
        </li>
      </ul>
    </li>
    <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> John Smith <b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li>
          <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
        </li>
        <li>
          <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
        </li>
        <li>
          <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
        </li>
        <li class="divider"></li>
        <li>
          <a href="/admin.php?c=login&a=loginout"><i class="fa fa-fw fa-power-off"></i> 退出</a>
        </li>
      </ul>
    </li>
  </ul>
  <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav nav_list">
      <li <?php echo (getActive($index)); ?>>
        <a href="/admin.php"><i class="fa fa-fw fa-dashboard"></i> 首页</a>
      </li>
      <?php if(is_array($navs)): $i = 0; $__LIST__ = $navs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$navo): $mod = ($i % 2 );++$i;?><li <?php echo (getActive($navo["c"])); ?>>
        <a href="<?php echo (getAdminMenuUrl($navo)); ?>"><i class="fa fa-fw fa-bar-chart-o"></i> <?php echo ($navo["name"]); ?></a>
      </li><?php endforeach; endif; else: echo "" ;endif; ?>

    </ul>
  </div>
  <!-- /.navbar-collapse -->
</nav>
  <div id="page-wrapper">

	<div class="container-fluid">

	  <!-- Page Heading -->
	  <div class="row">
		<div class="col-lg-12">

		  <ol class="breadcrumb">
			<li>
			  <i class="fa fa-dashboard"></i>  <a href="/admin.php?c=positioncontent">推荐位内容管理</a>
			</li>
			<li class="active">
			  <i class="fa fa-edit"></i> 添加推荐位内容
			</li>
		  </ol>
		</div>
	  </div>
	  <!-- /.row -->

	  <div class="row">
		<div class="col-lg-6">

		  <form class="form-horizontal" id="singcms-form">
			<div class="form-group">
			  <label for="inputname" class="col-sm-2 control-label">标题:</label>
			  <div class="col-sm-5">
				<input type="text" name="title" class="form-control" id="inputname" placeholder="请填写标题" value="<?php echo ($vo["title"]); ?>">
			  </div>
			</div>
			<div class="form-group">
			  <label for="inputname" class="col-sm-2 control-label">选择推荐位:</label>
			  <div class="col-sm-5">
				<select class="form-control" name="position_id">

				  <?php if(is_array($positions)): foreach($positions as $key=>$position): ?><option value="<?php echo ($position["id"]); ?>" <?php if($position['id'] == $vo['position_id']): ?>selected="selected"<?php endif; ?>><?php echo ($position["name"]); ?></option><?php endforeach; endif; ?>
				</select>
			  </div>
			</div>

			<div class="form-group">
			  <label for="inputname" class="col-sm-2 control-label">缩图:</label>
			  <div class="col-sm-5">
				<input id="file_upload"  type="file" multiple="true" >
				<img style="display: none" id="upload_org_code_img" src="<?php echo ($vo["thumb"]); ?>" width="150" height="150">
				<input id="file_upload_image" name="thumb" type="hidden" multiple="true" value="<?php echo ($vo["thumb"]); ?>">
			  </div>
			</div>

			<div class="form-group">
			  <label for="inputPassword3" class="col-sm-2 control-label">url:</label>
			  <div class="col-sm-5">
				<input type="text" class="form-control" value="<?php echo ($vo["url"]); ?>" name="url" id="inputPassword3" placeholder="请url地址">
			  </div>
			</div>
			<div class="form-group">
			  <label for="inputname" class="col-sm-2 control-label">文章id:</label>
			  <div class="col-sm-5">
				<input type="text" name="news_id" value="<?php echo ($vo["news_id"]); ?>" class="form-control" id="inputname" placeholder="如果和文章无关联的可以不添加文章id">
			  </div>
			</div>
			<div class="form-group">
			  <label for="inputPassword3" class="col-sm-2 control-label">状态:</label>
			  <div class="col-sm-5">
				<input type="radio" name="status" id="optionsRadiosInline1" value="1" <?php if($vo['status'] == 1): ?>checked<?php endif; ?>> 开启
				<input type="radio" name="status" id="optionsRadiosInline2" value="0" <?php if($vo['status'] == 0): ?>checked<?php endif; ?>> 关闭
			  </div>
			  <input type="hidden" name="id"  value="<?php echo ($vo["id"]); ?>"/>
			</div>

			<div class="form-group">
			  <div class="col-sm-offset-2 col-sm-10">
				<button type="button" class="btn btn-default" id="singcms-button-submit">提交</button>
			  </div>
			</div>
		  </form>


		</div>

	  </div>
	  <!-- /.row -->

	</div>
	<!-- /.container-fluid -->

  </div>
  <!-- /#page-wrapper -->
</div>
<script>
  var SCOPE = {
	'save_url' : '/admin.php?c=positioncontent&a=add',
	'jump_url' : '/admin.php?c=positioncontent&a=index',
	'ajax_upload_image_url' : '/admin.php?c=image&a=ajaxuploadimage',
	'ajax_upload_swf' : '/Public/js/party/uploadify.swf'
  };
  var thumb = "<?php echo ($vo["thumb"]); ?>";
  if(thumb) {
	$("#upload_org_code_img").show();
  }
</script>
<!-- /#wrapper -->
<script type="text/javascript" src="/Public/js/admin/form.js"></script>
<script src="/Public/js/admin/image.js"></script>
<script src="/Public/js/admin/common.js"></script>



</body>

</html>