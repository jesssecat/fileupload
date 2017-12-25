<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>文件上传</title>
</head>
<body>
	<p>需要建立文件夹uploads</p>
	<form action="doupload.php" method="post" enctype="multipart/form-data">
		<input type="file" name="myFile"/>
		<input type="hidden" name="MAX_FILE_SIZE" value="1024">
		<!-- <input type="hidden" name="MAX_FILE_SIZE" value="1024">通过建立隐藏域来控制文件上传的大小
		在页面上进行判断，value是1024kb，这是客户端上设置的限制，最好是服务器做限制 -->
		<input type="submit" value="上传"/>
	</form>
</body>
</html>
