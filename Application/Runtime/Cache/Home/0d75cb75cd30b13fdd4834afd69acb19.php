<?php if (!defined('THINK_PATH')) exit(); $config = D("Basic")->select(); $navs = D("Menu")->getBarMenus(); ?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?php echo ($config["title"]); ?></title>
  <meta name="keywords" content="<?php echo ($config["keywords"]); ?>" />
  <meta name="description" content="<?php echo ($config["description"]); ?>" />
  <script src="/Public/js/jquery.js"></script>
  <link rel="stylesheet" href="/Public/css/bootstrap.min.css" type="text/css" />
  <link rel="stylesheet" href="/Public/css/home/main.css" type="text/css" />
  <script src="/Public/js/dialog/layer.js"></script>
  <script src="/Public/js/dialog.js"></script>
</head>
<body>
<header id="header">
  <div class="navbar-inverse">
    <div class="container">
      <div class="navbar-header">
        <a href="/">
          <img src="/Public/images/logo.png" alt="">
        </a>
      </div>
      <ul class="nav navbar-nav navbar-left">
        <li><a href="/" <?php if($result['catId'] == 0): ?>class="curr"<?php endif; ?>>首页</a></li>
        <?php if(is_array($navs)): foreach($navs as $key=>$vo): ?><li><a href="/index.php?c=cat&id=<?php echo ($vo["menu_id"]); ?>" <?php if($vo['menu_id'] == $result['catId']): ?>class="curr"<?php endif; ?>><?php echo ($vo["name"]); ?></a></li><?php endforeach; endif; ?>
      </ul>
    </div>
  </div>
</header>
<?php $vo = $result['news']; $comments = $result['comments']; ?>
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-9 col-md-9">

					<div class="news-detail">
						<h1><?php echo ($vo["title"]); ?></h1>

						<?php echo ($vo["content"]); ?>
					</div>
					<input type="hidden" id="news-id" value="<?php echo ($vo["news_id"]); ?>">
					<hr />
					<div><p>网友热评：</p></div>
					<div class="news-comments">
						<?php if(is_array($comments)): $i = 0; $__LIST__ = $comments;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$comment): $mod = ($i % 2 );++$i;?><div class="panel panel-info">
								<div class="panel-heading">
									<?php echo ($comment["username"]); ?><p class="pull-right"><?php echo (date("y/m/d h:i",$comment["addtime"])); ?></p>
								</div>
								<div class="panel-body">
									<p><?php echo ($comment["comment"]); ?></p>
								</div>
							</div><?php endforeach; endif; else: echo "" ;endif; ?>
						<div class="panel panel-default">
							<div class="panel-heading"><p>请输入你的评论</p></div>
							<div class="panel-body">
								<form>
									<div class="form-group">
										<label for="user-name">姓名：</label>
										<input type="text" class="form-control" id="user-name" placeholder="您的姓名">
									</div>
									<div class="form-group">
										<label for="comment-detail">评论：</label>
										<textarea type="text" id="comment-detail" class="form-control" rows="3" maxlength="200" required></textarea>
										<p class="help-block">请输入你的评论，请注意言辞和谐，不输入用户名默认显示为匿名用户.</p>
									</div>
									<button type="button" id="submit-comment" class="btn btn-info pull-right">提交</button>
								</form>

							</div>

						</div>
					</div>
					
				</div>

				<div class="col-sm-3 col-md-3">
  <div class="right-title">
    <h3>文章排行</h3>
    <span>TOP ARTICLES</span>
  </div>

  <div class="right-content">
    <ul>
      <?php if(is_array($result['rankNews'])): $k = 0; $__LIST__ = $result['rankNews'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><li class="num<?php echo ($k); ?> curr">
        <a target="_blank" href="/index.php?c=detail&id=<?php echo ($vo["news_id"]); ?>"><?php echo ($vo["small_title"]); ?></a>
        <?php if($k == 1): ?><div class="intro">
          <?php echo ($vo["description"]); ?>
        </div><?php endif; ?>
      </li><?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
  </div>
  <?php if(is_array($result['advNews'])): $k = 0; $__LIST__ = $result['advNews'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><div class="right-hot">
    <a target="_blank" href="<?php echo ($vo["url"]); ?>"><img src="<?php echo ($vo["thumb"]); ?>" alt="<?php echo ($vo["name"]); ?>"></a>
  </div><?php endforeach; endif; else: echo "" ;endif; ?>
</div>
				<!-- end right-->
			</div>
		</div>
	</section>
</body>
<script>
	$("#submit-comment").click(function () {
		var data = {};
		data["username"] = $("#user-name").val();
		data["comment"] = $("#comment-detail").val();
		data["id"] = $("#news-id").val();
		var url = "/index.php?c=detail&a=comments";
		$.post(url,data,function (res) {
			if(res.status==1){
				return dialog.success(res.message,res['data']['url']);
			}
			if(res.status==0){
				return dialog.error(res.message);
			}
		},"JSON");
	})
</script>
</html>