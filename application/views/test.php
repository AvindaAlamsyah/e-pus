<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
</head>
<script src="<?php echo base_url('asset/plugins/pdf-js-express/lib/webviewer.min.js') ?>"></script>

<body>
    <div id='viewer' style='width: 1024px; height: 600px; margin: 0 auto;'></div>
    <script>
        WebViewer({
                path: '<?php echo base_url('asset/plugins/pdf-js-express/') ?>/lib', // path to the PDF.js Express'lib' folder on your server
                licenseKey: 'Insert commercial license key here after purchase',
                initialDoc: 'https://pdftron.s3.amazonaws.com/downloads/pl/webviewer-demo.pdf',
                // initialDoc: '<?php echo base_url('asset/admin/buku/ae1177a4d886a7519b5eb52893a5.pdf'); ?>', // You can also use documents on your server
            }, document.getElementById('viewer'))
            .then(instance => {
                const docViewer = instance.docViewer;
                const annotManager = instance.annotManager;
                // call methods from instance, docViewer and annotManager as needed

                // you can also access major namespaces from the instance as follows:
                // const Tools = instance.Tools;
                // const Annotations = instance.Annotations;

                docViewer.on('documentLoaded', () => {
                    // call methods relating to the loaded document
                });
            });
    </script>
</body>

</html>