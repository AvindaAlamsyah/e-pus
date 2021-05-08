<div class="row justify-content-center">
        <div class="col player-1 player-accessible">
            <audio>
                <source src="http://localhost/e-pus/asset/admin/buku/<?php foreach ($resource as $key => $v) {
                    if ($v->resource_id_tipe == 3 || $v->resource_id_tipe == 6) {
                        echo $v->source;
                      }
                } ?>" type="audio/mpeg">
            </audio>
    </div>
</div>