<div class="container">
	<div class="row justify-content-center" style="margin-bottom: 2px;;">
		<button type="button" class="btn btn-outline-success" >Salin Embedcode</button>
	</div>
	<div class="row justify-content-center">
		<div class="col" id="video_container">
			<video controls crossorigin playsinline id="player">
				<source src="<?php echo base_url('asset/'); ?>admin/buku/<?php foreach ($resource as $key => $v) {
						if ($v->resource_id_tipe == 4) {
							echo $v->source;
						}
					} ?>" type="video/mp4" size="720" />
			</video>
		</div>
	</div>
</div>
