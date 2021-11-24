<?php
	header("Content-type:text/html;charset=utf-8");//支持中文
	date_default_timezone_set("PRC");  //1.设置时区--系统使用北京时间
	require 'js/JWT.php'; //2.引入JWT库
	use \Firebase\JWT\JWT;  //3.使用\Firebase\JWT\JWT命名空间
	define('KEY','uhdajkndje623bjde987233nrew9');  //4.定义加密秘钥
	$res['result']='failed'; //定义result初始值
	$action=@$_GET['action'];
	if($action=='login'){  //判断如果是登录操作
		if($_SERVER['REQUEST_METHOD']=='POST'){  //5.通过post方法提交的请求
			$userName=$_POST['userName'];
			$password=md5($_POST['password']);
			include("conn.php");
			
		     //用户登录
				$rs=mysql_query("select * from userslz where userName='$userName' and pwd='$password'");
				$num=mysql_num_rows($rs);
				if($num>0){ //用户用户名和密码正确
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
								'userName'=>$userName  //存用户的用户名
							]
						];
						//6.3创建jwt
						$jwt=JWT::encode($token,KEY); //jwt编码
						
						$res['result']="success"; //用户名和密码正确的话，值改为success
						$res['jwt']=$jwt;
						// $res['info']=$token;
				}else{ //用户用户名或密码错误
					$res['msg']="用户名或密码错误";
				}
				mysql_free_result($rs);
			
			
			mysql_close($conn);
			
			// 上边用户名和密码验证完毕
			// 下边输出
			//7.php数组转换为json
			echo json_encode($res); //向客户端输出jwt  --这就是ajax得到的data
				//用户名密码正确
				// '{"result":"success","jwt":"...","info":"..."}'--这就是ajax得到的data
				//用户名或密码错误
				// '{"result":"failed","msg":"用户名或密码错误"}'--这就是ajax得到的data
				//没有选择登录类型
				// '{"result":"failed","msg":"请选择登录类型！"}'--这就是ajax得到的data
		}
	}else{  //如果不是登录操作
		//非登录操作
		//验证请求头，token为空报错，非法登录
		$jwt=@$_SERVER['HTTP_TOKEN'];
		if(empty($jwt)){
			$res['msg']="非法登录";
			echo json_encode($res);
			exit;
		}
		//如果请求头，token不为空，解码后返回json给ajax
		try{
			 JWT::$leeway = 60;
			$decoded = JWT::decode($jwt, KEY, ['HS256']);
			$arr = (array)$decoded;
			if ($arr['exp'] < time()) {
				$res['msg'] = '请重新登录';
			} else {
				$res['result'] = 'success';
				$res['info'] = $arr;
			}
		
		}catch(Exception $e){//解码失败
			$res['msg']="Token验证失败，请重新登录";
		}
		echo json_encode($res);
		
	}
?>