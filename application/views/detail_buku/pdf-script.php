<!-- hammer.js -->
<script src="<?php echo base_url('asset/') ?>plugins/hammer/hammer.min.js"></script>
<script>
  var canvas = document.getElementById("pdf_renderer");
  var canvas2 = document.getElementById("pdf_renderer2");

  var mc = new Hammer(canvas);
  var mc2 = new Hammer(canvas2);

  var pdfReaderState = {
    pdf: null,
    currentPage: 1,
    zoom: 2
  }
  var url = '<?php echo base_url('asset/'); ?>admin/buku/<?php foreach ($resource as $key => $v) {
    if ($v->resource_id_tipe == 1 || $v->resource_id_tipe == 5) {
      echo $v->source;
    }
  } ?>';
  pdfjsLib.getDocument(url).then((pdf) => {

    pdfReaderState.pdf = pdf;
    render();
    document.getElementById("max_page").value = " / " + pdfReaderState.pdf._pdfInfo.numPages + " Halaman";
  });

  function render() {
    pdfReaderState.pdf.getPage(pdfReaderState.currentPage).then((page) => {

      var ctx = canvas.getContext('2d');
      var ctx2 = canvas2.getContext('2d');

      var viewport = page.getViewport(pdfReaderState.zoom);
      var viewport2 = page.getViewport(4);

      canvas.width = viewport.width;
      canvas.height = viewport.height;
      canvas2.width = viewport2.width;
      canvas2.height = viewport2.height;

      page.render({
        canvasContext: ctx,
        viewport: viewport
      });
      page.render({
        canvasContext: ctx2,
        viewport: viewport2
      });
    });
  }

  document.getElementById('go_previous').addEventListener('click', (e) => {
    if (pdfReaderState.pdf == null || pdfReaderState.currentPage == 1)
      return;
    pdfReaderState.currentPage -= 1;
    document.getElementById("current_page").value = pdfReaderState.currentPage;
    render();
  });

  document.getElementById('go_next').addEventListener('click', (e) => {
    if (pdfReaderState.pdf == null || pdfReaderState.currentPage >= pdfReaderState.pdf._pdfInfo.numPages)
      return;
    pdfReaderState.currentPage += 1;
    document.getElementById("current_page").value = pdfReaderState.currentPage;
    render();
  });

  document.getElementById('current_page').addEventListener('keypress', (e) => {
    if (pdfReaderState.pdf == null) return;

    // Get key code
    var code = (e.keyCode ? e.keyCode : e.which);

    // If key code matches that of the Enter key
    if (code == 13) {
      var desiredPage =
        document.getElementById('current_page').valueAsNumber;

      if (desiredPage >= 1 && desiredPage <= pdfReaderState.pdf._pdfInfo.numPages) {
        pdfReaderState.currentPage = desiredPage;
        document.getElementById("current_page").value = desiredPage;
        render();
      }
    }
  });

  document.getElementById('zoom_in').addEventListener('click', (e) => {
    if (pdfReaderState.pdf == null) return;
    if (pdfReaderState.zoom >= 2.5) return;
    pdfReaderState.zoom += 0.25;
    render();
  });

  document.getElementById('zoom_out').addEventListener('click', (e) => {
    if (pdfReaderState.pdf == null) return;
    if (pdfReaderState.zoom <= 0.5) return;
    pdfReaderState.zoom -= 0.25;
    render();
  });

  canvas.addEventListener('keyup', (e) => {
    let code = e.keyCode;
    switch (code) {
      case 37:
        if (pdfReaderState.pdf == null || pdfReaderState.currentPage == 1)
          return;
        pdfReaderState.currentPage -= 1;
        document.getElementById("current_page").value = pdfReaderState.currentPage;
        render();
        break;
      case 39:
        if (pdfReaderState.pdf == null || pdfReaderState.currentPage >= pdfReaderState.pdf._pdfInfo.numPages)
          return;
        pdfReaderState.currentPage += 1;
        document.getElementById("current_page").value = pdfReaderState.currentPage;
        render();
        break;
      default:
        break;
    }
  });
  canvas2.addEventListener('keyup', (e) => {
    let code = e.keyCode;
    switch (code) {
      case 37:
        if (pdfReaderState.pdf == null || pdfReaderState.currentPage == 1)
          return;
        pdfReaderState.currentPage -= 1;
        document.getElementById("current_page").value = pdfReaderState.currentPage;
        render();
        break;
      case 39:
        if (pdfReaderState.pdf == null || pdfReaderState.currentPage >= pdfReaderState.pdf._pdfInfo.numPages)
          return;
        pdfReaderState.currentPage += 1;
        document.getElementById("current_page").value = pdfReaderState.currentPage;
        render();
        break;
      default:
        break;
    }
  });

  // swipe...
  mc.on("swiperight", (e) =>{
    if (pdfReaderState.pdf == null || pdfReaderState.currentPage == 1)
      return;
    pdfReaderState.currentPage -= 1;
    document.getElementById("current_page").value = pdfReaderState.currentPage;
    render();
  });
  mc.on("swipeleft", (e) =>{
    if (pdfReaderState.pdf == null || pdfReaderState.currentPage >= pdfReaderState.pdf._pdfInfo.numPages)
      return;
    pdfReaderState.currentPage += 1;
    document.getElementById("current_page").value = pdfReaderState.currentPage;
    render();
  });
  mc2.on("swiperight", (e) =>{
    if (pdfReaderState.pdf == null || pdfReaderState.currentPage == 1)
      return;
    pdfReaderState.currentPage -= 1;
    document.getElementById("current_page").value = pdfReaderState.currentPage;
    render();
  });
  mc2.on("swipeleft", (e) =>{
    if (pdfReaderState.pdf == null || pdfReaderState.currentPage >= pdfReaderState.pdf._pdfInfo.numPages)
      return;
    pdfReaderState.currentPage += 1;
    document.getElementById("current_page").value = pdfReaderState.currentPage;
    render();
  });

  
</script>