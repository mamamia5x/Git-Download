<?php
$runningVersion = file_get_contents('../version.txt');
$currentVersion = file_get_contents('https://github.com/mamamia5x/Git-Download/version.txt');
if ($runningVersion !== $currentVersion){
    echo("Different Versions Found"); # I'm just testing this version
 }
$runType = $argv[1]; 
if ($runType == "zip"){
    $zipFile = file_get_contents($argv[2]);
    $location = $argv[3];
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
}
else {
    echo "Error: Command not found.";
}
?>