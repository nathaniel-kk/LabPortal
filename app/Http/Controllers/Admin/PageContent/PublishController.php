<?php
namespace App\Http\Controllers\Admin\PageContent;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PageContent\Demo4Request;
use App\Models\Article;
use App\Models\Comment;
use App\Models\Content;
use App\Models\NewsBulletinManage;
use Symfony\Component\Console\Input\Input;

class PublishController extends Controller
{
    /**
     * @author DuJingWen <github.com/DJWKK>
     * @param Demo4Request $request
     * @return \Illuminate\Http\JsonResponse
     * 文章内容发布
     */
    public function Publish(Demo4Request $request){
        $p_url = 0;
        if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
            $path = md5(time() . rand(1000, 9999)) .
                '.' . $request->file('avatar')->getClientOriginalExtension();
            $request->file('avatar')->move('./public', $path);
            $p_url = './public' . $path;
        }
        $title = $request->get('title');
        $neirong = $request->get('neirong');
        $priority = $request->get('priority');
        $class_id = $request->get('class_id');
        $data = Content::add($title,$neirong,$priority,$p_url);
        $date = NewsBulletinManage::add($class_id);
        return $data&&$date?
            json_success('发布信息成功!',null,200) :
            json_fail('发布信息成功!',null,100);
    }
}
