# singcms
新闻发布网站，ThinkPHP构建

数据库文件为根目录下的singcms.sql,请先导入数据库

数据库配置文件位于/Application/Common/Conf/db.php
<pre>

    'DB_TYPE' => 'mysql',
    'DB_HOST' => '数据库ip地址',
    'DB_USER' => '数据库用户名',
    'DB_PWD' => '数据库密码',
    'DB_PORT' => 3306,
    'DB_NAME' => '数据库名',
    'DB_CHARSET' => 'utf8',
    'DB_PREFIX' =>'cms_',
</pre>

请将项目置于网站根目录下面，或者在本地环境配置虚拟域名访问此网站，否则可能无法正常运行

$HOST = '你的项目地址';

后台管理入口为$HOST/admin.php

默认登录名为admin、密码admin

<i>本项目仅供学习参考使用，存在不足的地方，欢迎指正</i>
