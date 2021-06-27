<div class="row justify-content-center">

    <div class="container">
    <?php 
        if ($tipe_buku == 5) {
            $this->load->view('detail_buku/buku');
        }
    ?>
        <div class="row justify-content-center " id="zoom_controls">
            <button id="go_previous"><</button>
            <button id="go_next">></button>
            <input id="current_page" value="1" min="1" type="number" />
            <input readonly id="max_page" type="text" value=" / 0" />
            <button id="zoom_out">-</button>
            <button id="zoom_in">+</button>
            <button type="button" id="fullscreen" data-toggle="modal" data-target="#modal_fullscreen" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrows-fullscreen" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M5.828 10.172a.5.5 0 0 0-.707 0l-4.096 4.096V11.5a.5.5 0 0 0-1 0v3.975a.5.5 0 0 0 .5.5H4.5a.5.5 0 0 0 0-1H1.732l4.096-4.096a.5.5 0 0 0 0-.707zm4.344 0a.5.5 0 0 1 .707 0l4.096 4.096V11.5a.5.5 0 1 1 1 0v3.975a.5.5 0 0 1-.5.5H11.5a.5.5 0 0 1 0-1h2.768l-4.096-4.096a.5.5 0 0 1 0-.707zm0-4.344a.5.5 0 0 0 .707 0l4.096-4.096V4.5a.5.5 0 1 0 1 0V.525a.5.5 0 0 0-.5-.5H11.5a.5.5 0 0 0 0 1h2.768l-4.096 4.096a.5.5 0 0 0 0 .707zm-4.344 0a.5.5 0 0 1-.707 0L1.025 1.732V4.5a.5.5 0 0 1-1 0V.525a.5.5 0 0 1 .5-.5H4.5a.5.5 0 0 1 0 1H1.732l4.096 4.096a.5.5 0 0 1 0 .707z"/>
            </svg></button>
        </div>
        <div class="row justify-content-center">
            <div id="canvas_container">
                <canvas id="pdf_renderer" tabindex="1"></canvas>
            </div>
        </div>

    </div>
</div>

<!-- Modal List -->
<div id="modal_fullscreen" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <canvas style="width: 100%;" id="pdf_renderer2" tabindex="1"></canvas>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- END Modal List -->