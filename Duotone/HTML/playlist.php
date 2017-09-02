<?php
$playlist = array();
$mp3s = array_filter(
			scandir("/mnt/documents/Freefall Music"),
			function($file) {
				return (preg_match("/\\.mp3$/", $file) == 1);
				}
			);
foreach ($mp3s as $mp3) {
	$entry = array();
	$parts = explode("::", $mp3, 2);
	$entry['title'] = preg_replace("/\\.mp3$/", "", $parts[1]);
	$entry['artist'] = $parts[0];
	$entry['mp3'] = "/playlist/" . $mp3;
	array_push($playlist, $entry);
	}
echo json_encode($playlist);
?>
