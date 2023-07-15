<?php


$zip = new ZipArchive;

// Zip File Name
if ($zip->open('api-work.zip') === TRUE) {

	// Unzip Path
	$zip->extractTo('dir/');
	$zip->close();
	echo 'Unzipped Process Successful!';
} else {
	echo 'Unzipped Process failed';
}


?>
