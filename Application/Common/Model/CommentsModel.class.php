<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/29 0029
 * Time: 23:37
 */

namespace Common\Model;
use Think\Model;

class CommentsModel extends Model
{
    private $_db = '';

    public function __construct()
    {
        $this->_db = M("comments");
    }

    public function addComment($data)
    {
        if(!$data || !is_array($data)){
            throw_exception("评论数据不合法");
        }
        return $this->_db->add($data);
    }

    public function getComments($id)
    {
        if(!$id || !is_numeric($id)){
            throw_exception("id不合法");
        }
        $res = $this->_db->where("news_id=".$id)->select();
        return $res;
    }
}