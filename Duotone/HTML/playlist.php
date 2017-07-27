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
	$parts = preg_split("/\\s*\\-\\s*/", $mp3);
	$entry['title'] = preg_replace("/\\.mp3$/", "", array_pop($parts));
	$entry['artist'] = array_shift($parts);
	$entry['mp3'] = "/playlist/" . $mp3;
	array_push($playlist, $entry);
	}
echo json_encode($playlist);
?>
