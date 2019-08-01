<!DOCTYPE html>
<html lang="zh-CN">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=no" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta name="renderer" content="webkit">
		<meta name="theme-color" content="#3F51B5" />
		<title>米环交流会 - RES反编译工具</title>
		<link href="https://cdn.bootcss.com/mdui/0.4.2/css/mdui.min.css" rel="stylesheet">
		<link rel="icon" type="image/png" href="/favicon.png" sizes="32x32" />
	</head>

	<body class="mdui-drawer-body-left mdui-appbar-with-toolbar mdui-theme-primary-indigo mdui-theme-accent-pink">
		<header class="mdui-appbar mdui-appbar-fixed">
			<div class="mdui-toolbar mdui-color-theme">
				<span class="mdui-btn mdui-btn-icon mdui-ripple mdui-ripple-white" mdui-drawer="{target: '#main-drawer', swipe: true}"><i class="mdui-icon material-icons">menu</i></span>
				<a href="/" target="_blank" class="mdui-typo-headline mdui-hidden-xs">米环交流会 - RES反编译工具</a>
			</div>
		</header>

		<button class="mdui-fab mdui-fab-fixed" id="like"><i class="mdui-icon material-icons">thumb_up</i></button>	
		
		<div class="mdui-drawer" id="main-drawer">
			<div class="mdui-list" mdui-collapse="{accordion: true}" style="margin-bottom: 76px;">
				<li class="mdui-list-item mdui-ripple">
					<i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-light-blue">home</i>
					<div class="mdui-list-item-content">
						<a href="/" class="mdui-ripple">回到首页</a>
					</div>
					</div>			
				</li>
			</div>

			<div class="mdui-panel" mdui-panel>
				<div class="mdui-panel-item mdui-panel-item-open">
					<div class="mdui-panel-item-body">
						<p></p>
						<div class="mdui-typo">
                        <?php
						error_reporting(0);
						header("Refresh:10;url=cache/" . getSubstr($_FILES["file"]["name"],'','.zip') . "_packed.res");
						// 自适应布局 echo "<meta name="\"viewport"\" content="\"width=device-width,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=no"\">"
						$allowedExts = array("zip");
						$temp = explode(".", $_FILES["file"]["name"]);
						echo $_FILES["file"]["size"];
						$extension = end($temp);     // 获取文件后缀名
						if ((($_FILES["file"]["type"] == "application/zip")
						|| ($_FILES["file"]["type"] == "application/zip")
						|| ($_FILES["file"]["type"] == "application/x-zip-compressed")
						|| ($_FILES["file"]["type"] == "image/jpg")
						|| ($_FILES["file"]["type"] == "image/pjpeg")
						|| ($_FILES["file"]["type"] == "image/x-png")
						|| ($_FILES["file"]["type"] == "image/png"))
						&& ($_FILES["file"]["size"] < 2*1024*1024)   // 小于 2MB
						&& in_array($extension, $allowedExts))
						{
    						if ($_FILES["file"]["error"] > 0)
    						{
        						echo "错误：: " . $_FILES["file"]["error"] . "<br>";
    						}
    						else
    						{
        						echo "上传文件名: " . $_FILES["file"]["name"] . "<br>";
        						echo "服务器正在处理你的文件，稍后会自动下载zip压缩包！" . "<br>";
        
        						// 判断当期目录下的 upload 目录是否存在该文件
        						// 如果没有 upload 目录，你需要创建它，upload 目录权限为 777
        						if (file_exists("upload/" . $_FILES["file"]["name"]))
        						{
            						echo $_FILES["file"]["name"] . " 文件已经存在。 ";
        						}
        						else
        						{
            						// 如果 upload 目录不存在该文件则将文件上传到 upload 目录下
            						move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $_FILES["file"]["name"]);
            						echo "文件存储在: " . "upload/" . $_FILES["file"]["name"];
									echo "<br>";
									echo "请耐心等待约10秒<br>";
        						}
    						}
						}
						else
						{
    						echo "非法的文件格式";
							echo $_FILES["file"]["type"];
						}
						getSubstr($_FILES["file"]["name"],'','.res');
 
						function getSubstr($str, $leftStr, $rightStr)
						{
    						$left = strpos($str, $leftStr);
    						//echo '左边:'.$left;
    						$right = strpos($str, $rightStr,$left);
    						//echo '<br>右边:'.$right;
    						if($left < 0 or $right < $left) return '';
    						return substr($str, $left + strlen($leftStr), $right-$left-strlen($leftStr));
						}
						?>
						</div>
					</div>
				</div>
			</div>
            <div class="mdui-progress">
            <div class="mdui-progress-indeterminate"></div>
            </div>
        </div>
	</body>
	<script src="https://cdn.bootcss.com/mdui/0.4.2/js/mdui.min.js"></script>
	<script src="/js/like.js"></script>
</html>