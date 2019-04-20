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
        echo "The server is processing your files, and will download res package automatically later" .  "<br>";
        
		
        
        if (file_exists("upload/" . $_FILES["file"]["name"]))
        {
            echo $_FILES["file"]["name"] . " file already exist. ";
        }
        else
        {
            move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $_FILES["file"]["name"]);
            echo "Files are stored in: " . "upload/" . $_FILES["file"]["name"];
			echo "<br>";
			echo "Please wait patiently for about 10 seconds<br>";
        }
    }
}
else
{
    echo "Illegal file format";
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