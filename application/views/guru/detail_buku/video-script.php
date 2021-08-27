<script src="https://cdn.plyr.io/3.6.7/plyr.polyfilled.js"></script>
<script>
	const player = new Plyr('#player', {
		title: '<?php echo $judul_buku; ?>',
	});
</script>
<script>
	var url = '<?= base_url('guru/embed') ?>'
	function copy(id) {
		text = `<iframe width="100%" height="100%" src="${url}/${id}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>`

		if (typeof(navigator.clipboard) == 'undefined') {
			
			var textArea = document.createElement("textarea");
			textArea.value = text;
			textArea.style.position = "fixed"; //avoid scrolling to bottom
			document.body.appendChild(textArea);
			textArea.focus();
			textArea.select();

			try {
				var successful = document.execCommand('copy');
				$.toast({
					heading: "Sukses",
					text: 'berhasil disalin',
					position: 'top-right',
					loader: true,
					loaderBg: '#ff6849',
					icon: 'success',
					hideAfter: 3500,
					stack: 6
				});

			} catch (err) {
				$.toast({
					heading: "Gagal",
					text: 'gagal disalin',
					position: 'top-right',
					loader: true,
					loaderBg: '#ff6849',
					icon: 'danger',
					hideAfter: 3500,
					stack: 6
				});
			}

			document.body.removeChild(textArea)
			return;
		}
		navigator.clipboard.writeText(text).then(function() {
			$.toast({
				heading: "Sukses",
				text: 'berhasil disalin',
				position: 'top-right',
				loader: true,
				loaderBg: '#ff6849',
				icon: 'success',
				hideAfter: 3500,
				stack: 6
			});
		}, function(err) {
			$.toast({
				heading: "Gagal",
				text: 'gagal disalin',
				position: 'top-right',
				loader: true,
				loaderBg: '#ff6849',
				icon: 'danger',
				hideAfter: 3500,
				stack: 6
			});

		});
	}
</script>
