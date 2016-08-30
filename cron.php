<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2014 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用入口文件

// 检测PHP环境
if(version_compare(PHP_VERSION,'5.3.0','<'))  die('require PHP > 5.3.0 !');

// 开启调试模式 建议开发阶段开启 部署阶段注释或者设为false
define('APP_DEBUG',True);
//定义常亮标记是否为计划任务脚本

define('APP_CRONTAB', 1);
if(!$argv || count($argv) < 4) {
	die("parmas_is_error");
}

$dir = dirname(__FILE__);
define('HTML_PATH', $dir.'/');
$_GET['m'] = !isset($_GET['m']) ? $argv[1] : 'admin';
$_GET['c'] = !isset($_GET['c'])  ? $argv[2] : 'index';
$_GET['a'] = !isset($_GET['a']) ? $argv[3] : 'index';

//print_r($_GET);exit;

// 定义应用目录
define('APP_PATH',$dir.'/Application/');

// 引入ThinkPHP入口文件
require $dir.'/ThinkPHP/ThinkPHP.php';

// 亲^_^ 后面不需要任何代码了 就是如此简单