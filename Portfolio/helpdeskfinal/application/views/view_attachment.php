<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Download Attachment</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <h1>Download Ticket Attachment</h1>

    <!-- Tombol untuk mendownload lampiran -->
    <button id="downloadAttachmentBtn">Download Attachment</button>

    <script>
        $(document).ready(function () {
            $('#downloadAttachmentBtn').on('click', function () {
                // Buat AJAX request ke server untuk mendapatkan file
                $.ajax({
                    url: '<?php echo base_url("index.php/UserController/download_attachment"); ?>',
                    type: 'POST',
                    data: {
                        ticket_id: 'T240001' // ID_TICKET yang Anda tentukan
                    },
                    xhrFields: {
                        responseType: 'blob' // Mengatur response sebagai blob
                    },
                    success: function (data, status, xhr) {
                        // Ambil nama file dari header Content-Disposition
                        let filename = xhr.getResponseHeader('Content-Disposition').split('filename=')[1].replace(/['"]/g, '');

                        // Buat link untuk download
                        let a = document.createElement('a');
                        let url = window.URL.createObjectURL(data);
                        a.href = url;
                        a.download = filename;
                        document.body.append(a);
                        a.click();

                        // Cleanup
                        window.URL.revokeObjectURL(url);
                        a.remove();
                    },
                    error: function () {
                        alert('Error while downloading the file.');
                    }
                });
            });
        });
    </script>
</body>

</html>