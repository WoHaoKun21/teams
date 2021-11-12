<?php
	header("Content-type:text/html;charset=utf-8");//支持中文
	date_default_timezone_set("PRC");  //1.设置时区--系统使用北京时间
	require 'JWT.php'; //2.引入JWT库
	use \Firebase\JWT\JWT;  //3.使用\Firebase\JWT\JWT命名空间
	define('KEY','uhdajkndje623bjde987233nrew9');  //4.定义加密秘钥
	$res['result']='failed'; //定义result初始值
	$action=@$_GET['action'];
	if($action=='login'){  //判断如果是登录操作
		if($_SERVER['REQUEST_METHOD']=='POST'){  //5.通过post方法提交的请求
			$userName=$_POST['userName'];
			$password=$_POST['password'];
			if($userName=="tom" and $password=="123"){ //用户名和密码正确
			//6.php创建token
				//6.1获取当前时间戳
				$nowtime=time();
				//6.2创建token
				$token=[
					'iss'=>'http://localhost', //签发者
					'aud'=>'http://localhost', //jwt所面向的用户
					'iat'=>$nowtime, //签发时间
					'nbf'=>$nowtime+10, //在什么时间之后该jwt才可用--10s后
					'exp'=>$nowtime+600, //过期时间--10min
					'data'=>[
						'userId'=>1,
						'userName'=>$userName
					]
				];
				//6.3创建jwt
				$jwt=JWT::encode($token,KEY); //jwt编码
				
				$res['result']="success";//用户名密码正确的话，值改为success
				$res['jwt']=$jwt; //在关联数组里新增下标为jwt的元素，值为$jwt
				$res['info']=$token;
				//{"result"=>"success","jwt"=>"...","info"=>"..."}
			}else{ //用户名或密码不正确
				$res['msg']='用户名或密码错误';
				//此时$res['result']="failed";
				//在关联数组里新增下标为msg的元素，值为用户名或密码错误
			}
		}
		//7.php数组转换为json
		echo json_encode($res); //向客户端输出jwt
			//POST:用户名密码正确
			// '{"result":"success","jwt":"..."}'--这就是ajax得到的data
			//POST:用户名或密码错误
			// '{"result":"failed","msg":"用户名或密码错误"}'--这就是ajax得到的data
			//GET:action=login
			// '{"result":"failed"}'--刚进来的时候
	}else{  //如果不是登录操作
		//8.php获取request headers中的jwt
		$jwt=@$_SERVER['HTTP_X_TOKEN'];
		if(empty($jwt)){  //验证请求头，token为空报错，非法登录
			$res['msg']="非法登录";
			echo json_encode($res); //php数组转为json
			// '{"result":"failed","msg":"非法登录"}'--这就是ajax得到的data
			exit;
		}
		//如果请求头，token不为空，解码后返回json给ajax
		try{
			//9.php设置jwt时间偏差
			JWT::$leeway=60;
			//10.php jwt解码为数组
			$decoded=JWT::decode($jwt,KEY,['HS256']);
			$arr=(array)$decoded;
			if($arr['exp']<time()){ //jwt设置的过期时间小于现在时间--已经过期
				$res['msg']='请重新登录';
			}else{  //没过期的话
				$res['result']='success';
				//验证成功，值改为success
				$res['info']=$arr;
				//转化为json后输出为:
				// '{"result":"success","info":"..."}'--这就是ajax得到的data
			}
		}catch(Exception $e){ //解码失败
			$res['msg']="Token验证失败，请重新登录";
			//在关联数组里新增下标为msg的元素，值为Token验证失败，请重新登录
			//转化为json后输出为:
			// '{"result":"failed","msg":"Token验证失败，请重新登录"}'--这就是ajax得到的data
		}
		echo json_encode($res);//--转化为json
	}
?>