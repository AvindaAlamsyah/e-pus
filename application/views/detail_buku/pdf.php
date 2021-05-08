<div class="row justify-content-center">
    <div class="container">
        <div class="row justify-content-end ">
            <div id="zoom_controls">
                <button id="zoom_out">-</button>
                <button id="zoom_in">+</button>
            </div>
        </div>
        <div class="row">
            <div id="canvas_container">
                <canvas id="pdf_renderer" tabindex="1"></canvas>
            </div>
        </div>
        <div class="row">
            <div class="input-group ">
                <div class="input-group-prepend">
                    <button class="btn btn-outline-secondary btn-block btn-sm" id="go_previous">Previous</button>
                </div>
                <input class="form-control" id="current_page" value="1" min="1" type="number" />
                <div class="input-group-append">
                    <input readonly class="form-control-plaintext align-center" id="max_page" type="text" value=" / 0" />
                    <button class="btn btn-outline-secondary btn-block btn-sm" id="go_next">Next</button>
                </div>
            </div>
        </div>

    </div>
</div>