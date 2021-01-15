<?php
$zipFile = file_get_contents($argv[1]);
$location = $argv[2];
if (strpos($location,'/') !== strlen($location)){
    $location = $location . '/';
}
$zipLocation = $location . 'temp.zip';
if (!file_exists($location)) {
    mkdir($location, 0777, true);
}
file_put_contents($zipLocation,$zipFile);
$path = pathinfo(realpath($zipLocation), PATHINFO_DIRNAME);
$zip = new ZipArchive;
$res = $zip->open($zipLocation);
if ($res === TRUE) {
  // extract it to the path we determined above
  $zip->extractTo($path);
  $zip->close();
  echo "Succesfully Downloaded!";
} else {
  echo "An error occured";
}
?>