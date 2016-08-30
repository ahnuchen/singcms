<?php
namespace Home\Controller;
use Think\Controller;
class DetailController extends CommonController {

    public function index() {
        $id = intval($_GET['id']);
        if(!$id || $id<0) {
            return $this->error("ID不合法");
        }
        $news =  D("News")->find($id);

        if(!$news || $news['status'] != 1) {
            return $this->error("ID不存在或者资讯被关闭");
        }

        $count = intval($news['count']) + 1;
        D('News')->updateCount($id, $count);

        $content = D("NewsContent")->find($id);
        $news['content'] = htmlspecialchars_decode($content['content']);

        $advNews = D("PositionContent")->select(array('status'=>1,'position_id'=>5),2);
        $rankNews = $this->getRank();

        $comments = D("Comments")->getComments($id);
        $this->assign('result', array(
            'rankNews' => $rankNews,
            'advNews' => $advNews,
            'catId' => $news['catid'],
            'news' => $news,
            'comments'=>$comments
        ));
        $this->display("Detail/index");
    }

    /**
     *
     */
    public function comments()
    {
        $data = array();
        if(!isset($_POST['id'])||!$_POST['id']){
            return show(0,"文章id不存在");
        }else{
            $data['news_id']=$_POST['id'];
        }
        if(!$_POST['comment']){
            return show(0,"请输入评论内容");
        }
        if(!$_POST['username']){
            $data['username'] = "匿名用户";
        }
        else{
            $data['username'] = $_POST['username'];
        }
        $url = $_SERVER["HTTP_REFERER"];
        $data['comment']=$_POST['comment'];
        $data['addtime'] = time();
        $rest =  D("Comments")->addComment($data);
        if(!$rest){
            return show(0,"评论失败");
        }
        return show(1,"评论成功",array("url"=>$url));
    }

    public function  view() {
        if(!getLoginUsername()) {
            $this->error("您没有权限访问该页面");
        }
        $this->index();

    }
}