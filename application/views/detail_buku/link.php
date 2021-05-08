<div class="row justify-content-center">
    <div class="col-12 mb-4">
        <h3>Silakan lanjutkan dengan mengunjungi sumber berikut </h3>
        <a href="<?php foreach ($resource as $key => $v) {
                    if ($v->resource_id_tipe == 2) {
                        echo $v->source;
                      }
                } ?>" class="btn btn-lg btn-primary">Kunjungi sumber</a>
    </div>
</div>