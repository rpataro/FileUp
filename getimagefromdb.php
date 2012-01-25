<?php
include 'config.php';
        
mysql_connect($dbhost,$dbuser,$dbpass); 

mysql_select_db($dbname); 

$RecID = $_GET['RecID'];
$sql = "select pics, ext from pictures where id=" . $RecID;
$result = mysql_query($sql) or die('ERR Bad query loading image!'.mysql_error());

while($row = mysql_fetch_array($result,MYSQL_ASSOC)){
    $db_img = $row['pics'];
    $type = $row['ext'];
}
$db_img = base64_decode($db_img);
if ($db_img != false)
{
    $db_img = imagecreatefromstring($db_img);
}
else {
    echo '<h1>ERR After deCode RecId= ' . $RecID . '</h1>';
    imagedestroy($db_img);
    exit;
}

// Set HTML header and generate image

if ($db_img !== false)
{
    switch ($type)
    {
        case "jpg":
            header("Content-Type: image/jpeg");
            imagejpeg($db_img);
            break;
        case "gif":
            header("Content-Type: image/gif");
            imagegif($db_img);
            break;
        case "png":
            header("Content-Type: image/png");
            imagepng($db_img);
            break;
    }
}
else {
    echo '<h1>ERR After CreateFromString RecId=' . $RecID . '</h1>';
}

imagedestroy($db_img);

?>