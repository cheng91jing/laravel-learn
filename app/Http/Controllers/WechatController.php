<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use Exception;

class WechatController extends Controller
{
    //首页数据
    public function home()
    {
        return Response::json([
            'error_code' => 0,
            'error_msg' => '',
            'data' => [
                'home_head_img' => [
                    'http://img.zcool.cn/community/0142135541fe180000019ae9b8cf86.jpg@1280w_1l_2o_100sh.webp',
                    'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1521113029096&di=f0ce2904f4e18450c3e62dbb19cfe72d&imgtype=0&src=http%3A%2F%2Fattach.bbs.miui.com%2Fforum%2F201408%2F14%2F131858nuzcna65nnjbzh9g.jpg',
                    'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1521113029093&di=19cb21472479f730c7d2f5b0f6ca7f06&imgtype=0&src=http%3A%2F%2Fa3.topitme.com%2F3%2F1d%2F09%2F11181668520b7091d3o.jpg'
                ],
                'reservation_list' => [
                    [
                        'reservation_id' => 1,
                        'head_img' => 'http://d.hiphotos.baidu.com/zhidao/pic/item/9f510fb30f2442a72aba3dd6d143ad4bd1130209.jpg',
                        'title' => '中秋活动',
                        'introduce'=> '中心仅打孔机埃里克我们的来玩么'
                    ],
                    [
                        'reservation_id' => 2,
                        'head_img' => 'http://pic.qiantucdn.com/58pic/26/27/26/20s58PICaq9_1024.jpg',
                        'title' => '国庆活动',
                        'introduce'=> '阿卡丽手机端来卡上第六课按键失灵可叠加 卡阿卡丽结算的垃圾克鲁赛德'
                    ],
                    [
                        'reservation_id' => 3,
                        'head_img' => 'http://img0.imgtn.bdimg.com/it/u=3562007865,867926767&fm=214&gp=0.jpg',
                        'title' => '元旦活动',
                        'introduce'=> '奥术大师大所大所多群翁自相残杀'
                    ],
					[
                        'reservation_id' => 4,
                        'head_img' => 'http://img0.imgtn.bdimg.com/it/u=3562007865,867926767&fm=214&gp=0.jpg',
                        'title' => '春节活动',
                        'introduce'=> '爱上递交时单价哦啊目的骄傲is京东个案件死哦大家啊iOS大家啊'
                    ]
                ]
            ]
        ]);
    }

    //详情页数据
    public function detail(Request $request)
    {
        $postData = $request->all();
        $result = [
            'error_code' => 0,
            'error_msg' => '',
            'data' => null,
            'request' => $postData
        ];
        try{
            if(empty($postData['reservation_id'])) throw new Exception('请求参数缺失，未获取到活动数据');

            $result['data'] = [
                'detail_id' => $postData['reservation_id'],
                'body_image' => [
                    'http://images.hngs.cn/shop/143/gallery/2018/01/23/15166809253976.jpg',
                    'http://images.hngs.cn/shop/143/gallery/2018/01/23/15166809255818.jpg',
                    'http://images.hngs.cn/shop/143/gallery/2018/01/23/15166809252186.jpg',
                    'http://images.hngs.cn/shop/143/gallery/2018/01/23/15166809250713.jpg',
                    'http://images.hngs.cn/shop/143/gallery/2018/01/23/15166809374534.jpg',
                    'http://images.hngs.cn/shop/143/gallery/2018/01/23/15166809371964.jpg',
                    'http://images.hngs.cn/shop/143/gallery/2018/01/23/15166809374954.jpg'
                ],
                'title' => '元宵节活动',
            ];
        }catch (Exception $e){
            $result['error_code'] = 1;
            $result['error_msg'] = $e->getMessage();
        }
        return Response::json($result);
    }

    //提交申请
    public function form(Request $request)
    {
        $postData = $request->all();
        $result = [
            'error_code' => 0,
            'error_msg' => '',
            'data' => null,
            'request' => $postData
        ];
        try{
            if(empty($postData['reservation_id'])) throw new Exception('请求参数缺失，未获取到活动数据');

        }catch (Exception $e){
            $result['error_code'] = 1;
            $result['error_msg'] = $e->getMessage();
        }
        return Response::json($result);
    }

    //验证手机号是否存在
    public function verification(Request $request)
    {
        $postData = $request->all();
        $result = [
            'error_code' => 0,
            'error_msg' => '',
            'data' => null,
            'request' => $postData
        ];
        try{
            if(empty($postData['phone'])) throw new Exception('缺少必要的请求参数');

        }catch (Exception $e){
            $result['error_code'] = 1;
            $result['error_msg'] = $e->getMessage();
        }
        return Response::json($result);
    }

    //发送验证码
    public function sendCode(Request $request)
    {
        $postData = $request->all();
        $result = [
            'error_code' => 0,
            'error_msg' => '',
            'data' => null,
            'request' => $postData
        ];
        try{
            if(empty($postData['phone'])) throw new Exception('缺少必要的请求参数');

        }catch (Exception $e){
            $result['error_code'] = 1;
            $result['error_msg'] = $e->getMessage();
        }
        return Response::json($result);
    }
}
