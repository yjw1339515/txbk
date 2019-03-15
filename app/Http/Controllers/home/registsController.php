<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Redis;
use App\Admin\users;
use Illuminate\Support\Facades\Hash;
use Mail;
use DB;

class registsController extends Controller
{


   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home.login.regist');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $data = ($request->input('email'));

        $title = '修改密码';
        //发送邮件代码
        $flag = Mail::send('home.login.test',['title'=>$title],function($m) use($data){
       
        $m->to($data)->subject('txbk官方提醒!');
        });
        if(true){
        echo 'ok';
        }else{
        echo 'no';
        }
    }   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       //连接redis
        $redis = new Redis;
         $redis->connect('localhost',6379);
         //将验证码从缓存中取出
           $res=$redis->get('code_phone'); 
           
        $data = $request->all();
        if($res==$data['code']){
            //将用户名字密码电话存入数据表
             $value = new users;
            $value->uname=$data['uname'];
            $value->upwd= Hash::make($data['upwd']);
            $value->tel=$data['phone'];
            $value->token=$data['_token'];
            $value->save();
            return back()->with('success','注册成功请返回登录');
        }else{
            return back()->with('error','注册失败');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('home.login.updateupwd');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {   
        //接受手机号
       $data1 = $request->input('phone');
       $data = Hash::make($request->input('upwd'));
        //获取用户的密码重新修改
        $users=users::where('tel',$data1)->first();
        if($users){
            $res = DB::table('users')
            ->where('tel',$data1)
            ->update(['upwd' =>$data]);

         if($res){
            return back()->with('success','修改成功');
         }else{
            return back()->with('error','修改失败');
         }
        }else{
            return back()->with('error','信息有误');
        }
     
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //获取用户的名字
        $data = $request->input('uname');
        $res = users::where('uname',$data)->first();
          if($res){
            echo 'ok';
          }else{
            echo 'no';
          }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function phone($id)
    {
        //连接redis
         $redis = new Redis;
         $redis->connect('localhost',6379);


        $phone = $id;//手机号
    
        $phone_code = rand(1000,9999);  //验证码
        
        $this->code=$phone_code;
        
          
        $sendUrl = 'http://v.juhe.cn/sms/send'; //短信接口的URL
          
        $smsConf = array(
            'key'   => '8b2f573bc284a029365d13ee0a725efe', //您申请的APPKEY
            'mobile'    => $phone, //接受短信的用户手机号码
            'tpl_id'    => '140156', //您申请的短信模板ID，根据实际情况修改
            'tpl_value' =>'#code#='.$phone_code //您设置的模板变量，根据实际情况修改
        );
         //调用封装好的API接口
        $content = self::juhecurl($sendUrl,$smsConf,1); //请求发送短信
         
        if($content){
            $result = json_decode($content,true);
            $error_code = $result['error_code'];
            if($error_code == 0){
                //状态为0，说明短信发送成功
                 // 将值存在redis中
                $redis->setex('code_phone',120,$phone_code);  // 第二个参数为声明周期 (单位为秒)
                 $arr = [
                        'code'=>0,
                      'msg'=>"短信发送成功,短信ID：".$result['result']['sid'],
                 ] ;
                 echo json_encode($arr);
            }else{
                //状态非0，说明失败
                $msg = $result['reason'];
                $arr = [
                    'code'=>$error_code,
                    'msg'=>"短信发送失败(".$error_code.")：".$msg,
                ];
                 echo json_encode($arr);
            }
        }else{
            //返回内容异常，以下可根据业务逻辑自行修改
            $arr = [
            'code'=>'',
            'msg'=>'请求发送短信失败',
            ];
            echo json_encode($arr);
        }
    
     }

   
         /**
         * 请求接口返回内容
         * @param  string $url [请求的URL地址]
         * @param  string $params [请求的参数]
         * @param  int $ipost [是否采用POST形式]
         * @return  string
         */
    public static function juhecurl($url,$params=false,$ispost=0)
       {
            $httpInfo = array();
            $ch = curl_init();
            curl_setopt( $ch, CURLOPT_HTTP_VERSION , CURL_HTTP_VERSION_1_1 );
            curl_setopt( $ch, CURLOPT_USERAGENT , 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22' );
            curl_setopt( $ch, CURLOPT_CONNECTTIMEOUT , 30 );
            curl_setopt( $ch, CURLOPT_TIMEOUT , 30);
            curl_setopt( $ch, CURLOPT_RETURNTRANSFER , true );
            if( $ispost )
            {
                curl_setopt( $ch , CURLOPT_POST , true );
                curl_setopt( $ch , CURLOPT_POSTFIELDS , $params );
                curl_setopt( $ch , CURLOPT_URL , $url );
            }
            else
            {
                if($params){
                    curl_setopt( $ch , CURLOPT_URL , $url.'?'.$params );
                }else{
                    curl_setopt( $ch , CURLOPT_URL , $url);
                }
            }
            $response = curl_exec( $ch );
            if ($response === FALSE) {
                //echo "cURL Error: " . curl_error($ch);
                return false;
            }
            $httpCode = curl_getinfo( $ch , CURLINFO_HTTP_CODE );
            $httpInfo = array_merge( $httpInfo , curl_getinfo( $ch ) );
            curl_close( $ch );
            return $response;
        }

    
}
