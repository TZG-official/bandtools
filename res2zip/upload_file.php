<?php
error_reporting(0);
header("Refresh:15;url=cache/" . getSubstr($_FILES["file"]["name"],'','.res') . ".zip");
// 自适应布局 echo "<meta name="\"viewport"\" content="\"width=device-width,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=no"\">"
$allowedExts = array("res");
$temp = explode(".", $_FILES["file"]["name"]);
echo $_FILES["file"]["size"];
$extension = end($temp);     // 获取文件后缀名
if ((($_FILES["file"]["type"] == "text/plain")
|| ($_FILES["file"]["type"] == "application/octet-stream")
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
			echo "请耐心等待约15秒<br>";
        }
    }
}
else
{
    echo "非法的文件格式";
	echo $_FILES["file"]["type"];
}
getSubstr($_FILES["file"]["name"],'','.res');
 
/*以下是取中间文本的函数 
  getSubstr=调用名称
  $str=预取全文本 
  $leftStr=左边文本
  $rightStr=右边文本
*/
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