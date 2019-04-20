<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=no" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta name="renderer" content="webkit">
		<meta name="theme-color" content="#3F51B5" />
		<title>MIBBS - RES Decompiler Tool</title>
		<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/mdui/0.4.2/css/mdui.min.css">
	</head>

	<body class="mdui-drawer-body-left mdui-appbar-with-toolbar mdui-theme-primary-indigo mdui-theme-accent-pink">
		<header class="mdui-appbar mdui-appbar-fixed">
			<div class="mdui-toolbar mdui-color-theme">
				<span class="mdui-btn mdui-btn-icon mdui-ripple mdui-ripple-white" mdui-drawer="{target: '#main-drawer', swipe: true}"><i class="mdui-icon material-icons">menu</i></span>
				<a href="https://en.rmpai.com" target="_blank" class="mdui-typo-headline mdui-hidden-xs">MIBBS - RES Decompiler Tool</a>
			</div>
		</header>

		<button class="mdui-fab mdui-fab-fixed" id="like"><i class="mdui-icon material-icons">thumb_up</i></button>	
		
		<div class="mdui-drawer" id="main-drawer">
			<div class="mdui-list" mdui-collapse="{accordion: true}" style="margin-bottom: 76px;">
				<li class="mdui-list-item mdui-ripple">
					<i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-light-blue">home</i>
					<div class="mdui-list-item-content">
						<a href="https://en.rmpai.com" class="mdui-ripple">Back to Home</a>
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
						$allowedExts = array("zip");
						$temp = explode(".", $_FILES["file"]["name"]);
						echo $_FILES["file"]["size"];
						$extension = end($temp);
						if ((($_FILES["file"]["type"] == "application/zip")
						|| ($_FILES["file"]["type"] == "application/zip")
						|| ($_FILES["file"]["type"] == "application/x-zip-compressed")
						|| ($_FILES["file"]["type"] == "image/jpg")
						|| ($_FILES["file"]["type"] == "image/pjpeg")
						|| ($_FILES["file"]["type"] == "image/x-png")
						|| ($_FILES["file"]["type"] == "image/png"))
						&& ($_FILES["file"]["size"] < 2*1024*1024)
						&& in_array($extension, $allowedExts))
						{
    						if ($_FILES["file"]["error"] > 0)
    						{
        						echo "error: " . $_FILES["file"]["error"] . "<br>";
    						}
    						else
    						{
        						echo "Upload file name: " . $_FILES["file"]["name"] . "<br>";
        						echo "The server is working on your files and will automatically download res packages later!" . "<br>";
        
        						if (file_exists("upload/" . $_FILES["file"]["name"]))
        						{
            						echo $_FILES["file"]["name"] . " file already exist. ";
        						}
        						else
        						{
            						move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $_FILES["file"]["name"]);
            						echo "Files are stored in: " . "upload/" . $_FILES["file"]["name"];
									echo "<br>";
									echo "Please wait patiently for about 10 seconds.<br>";
        						}
    						}
						}
						else
						{
    						echo "Illegal file format.";
							echo $_FILES["file"]["type"];
						}
						getSubstr($_FILES["file"]["name"],'','.res');
 
						function getSubstr($str, $leftStr, $rightStr)
						{
    						$left = strpos($str, $leftStr);
    						$right = strpos($str, $rightStr,$left);
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
	<script src="//cdnjs.cloudflare.com/ajax/libs/mdui/0.4.2/js/mdui.min.js"></script>
	<script src="./js/like.js"></script>
</html>