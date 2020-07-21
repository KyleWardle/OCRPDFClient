<html lang="en">

<head>
    <title>PDF OCR</title>
    <script
            src="https://code.jquery.com/jquery-3.5.1.min.js"
            integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
            crossorigin="anonymous"></script>
    <script src="data/dropzone/dropzone.min.js"></script>
    <link href="data/dropzone/dropzone.min.css" rel="stylesheet">
</head>


<body>

<form action="/upload-file.php"
      class="dropzone"
      id="dropzoneForm"></form>

<script>
    $(document).ready(function () {
        var dropzone = $("#dropzoneForm").get(0).dropzone;

        dropzone.on("success", function (file, response) {
           data = JSON.parse(response);

	if (data.success) {
	  window.location.href = window.location.href + "view-file.php?" + $.param(data);
	}
        });

        dropzone.options.acceptedFiles = 'application/pdf';
    });
</script>
</body>

</html>
