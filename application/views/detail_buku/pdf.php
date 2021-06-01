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
        </div>
        <div class="row justify-content-center">
            <div id="canvas_container">
                <canvas id="pdf_renderer" tabindex="1"></canvas>
            </div>
        </div>

    </div>
</div>