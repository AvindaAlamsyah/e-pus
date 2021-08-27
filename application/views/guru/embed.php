<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="robots" content="noindex">
	<title>Digial Library</title>
	<style>
		.video_container {
			margin: 0;
			padding: 0;
			height: 100%;
			width: 100%;
		}

		.videojs {
			height: auto;
			width: 100%;
		}
		
	</style>
</head>

<body class="video_container">
	<video controls crossorigin playsinline id="player" class="videojs video-js vjs-default-skin vjs-fill vjs-16-9" controlsList="nodownload">
		<source src="<?= base_url("asset/admin/buku/$source") ?>" type="video/mp4" size="720" />
	</video>
	<script src="https://cdn.plyr.io/3.6.7/plyr.polyfilled.js"></script>
</body>

</html>
