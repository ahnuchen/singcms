<?php

namespace Admin\Controller;
use Think\Controller;
use Think\Upload;

/**
 * 后台计划任务 业务脚本
 */
class CronController {


    public function dumpmysql() {
        $result = D("Basic")->select();
        if(!$result['dumpmysql']) {
            die("系统没有设置开启自动备份数据库的内容");
        }
        $shell = "mysqldump -u".C("DB_USER").C("DB_PWD") .C("DB_NAME")." > /tmp/cms".date("Ymd").".sql";
        print_r($shell);
        if ($shell){
            exec($shell);
            return show(1,'数据库备份成功');
        }else{
            return show(0,"数据库备份失败");
        }
    }
}