<?php 
header("Content-type: text/html; charset=utf-8"); 
	//预定义变量
	//print_r($_FILES);//可以显示错误号，根据错误号来定位错误信息
	$filename=$_FILES['myFile']['name'];
	$type=$_FILES['myFile']['type'];
	$tmp_name=$_FILES['myFile']['tmp_name'];//存储地址
	$error=$_FILES['myFile']['error'];//错误类型
	$size=$_FILES['myFile']['size'];//文件大小
	$filenamemd5=getUniName($filename);
	// $types="jpg";//只能上传图片
	$limitsize="18500000";//控制图片大小
	$a=getExt($filename);
	$types=gettypes($a);
	//$getext=getExt($filename);
		//得到文件的扩展名
	function getExt($filename){
	 	$first=explode(".",$filename); //文件名开始以.分割
		$ext=strtolower(end($first));  //取出数组中的最后一个数组进行返回
		return $ext;
	}
	//文件名以时间戳微秒md5加密的形式出现，确保文件的唯一
	function getUniName(){
		return md5(microtime(true));
	}
	//echo getUniName();  返回md5加密的数值

	 function gettypes($a){
	 	$array=array('jpg','png','txt');
		$b=in_array($a,$array);
		return $b;
	 }

		 if($limitsize>=$size){
			 if($types){
				if($error==0){
					if (is_uploaded_file($tmp_name)) {
							//将服务器上的临时文件移动到指定目录
							$filename=$filenamemd5.".".getExt($filename);
							$destination="uploads/".$filename;
							if(move_uploaded_file($tmp_name, $destination)){
								//检测这个临时文件是否为post方式
								//返回镇或者假
							echo $filename."---"."文件上传成功";
					}else{
						echo "你不是post上传的，非法操作";
					}
				}else{
					echo "{$filename}文件移动失败";
				}
				}else{
					switch ($error) {
						case 1:
							echo "超过php配置文件upload_max_filesize的值";
							break;
						
						case 2:
							echo "超过表单max_file_size的值";
							break;
						case 3:
							echo "部分文件被上传";
							break;
						case 4:
							echo "没有文件被上传";
							break;
						case 6:
						case 7:
							echo "未知错误";
					}
				}
			}else{
				echo "只能上传图片";
			}
		}else{
			echo "超出上传文件大小限制";
		}
	 
 ?>
