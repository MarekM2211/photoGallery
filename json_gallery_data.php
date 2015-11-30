<?php
header("Content-type: application/json");
$folder = $_POST['folder'];
$jsonData = '{ ';
$dir = $folder . "/";
$i = 0;
$dirHandle = opendir($dir);
while ($file = readdir($dirHandle)) {
    if (!is_dir($file) && strpos(strtolower($file), '.jpg')) {
        $i++;
        $src = "$dir$file";
        $jsonData .= '"img' . $i . '":{ "num":"' . $i . '", "src":"' . $src . '","name":"' . $file . '" },';
    }
}
closedir($dirHandle);
$jsonData = chop($jsonData, ",");
$jsonData .= '}';
echo $jsonData;
?>