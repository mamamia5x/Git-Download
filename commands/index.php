<?php
$runningVersion = file_get_contents('../version.txt');
$currentVersion = file_get_contents('https://raw.githubusercontent.com/mamamia5x/Git-Download/update/version.txt');
if ($runningVersion !== $currentVersion){
    echo ("You are running on $runningVersion\nThe current version is $currentVersion.");
    echo ("You can update using the command 'php index.php update'");
} else {
    echo ("Running on " . $runningVersion);
}
$runType = $argv[1]; 
if ($runType == 'update'){
    echo("Running this command will delete everything in here and reinstall it, make sure you have no other files in here.\n");
    echo("Do you wish to continue?");
    $response = readline(" > ");
    if(substr($response,0,1) == 'y'){
        update();
    } else {
        echo "Update Cancelled\n";
    }
}
else if ($runType == "zip"){
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
    echo "\nSuccesfully Downloaded!";
    } else {
    echo "\nAn error occured";
    }
}
else {
    echo "\nError: Command not found.";
}

function update(){
    exec('git -c http.sslVerify=false clone https://github.com/mamamia5x/Git-Download.git ../../Git-Download');
}
?>