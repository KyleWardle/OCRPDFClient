<?php

$uploaded_file = $_FILES['file'];

var_dump($uploaded_file);

$file_name = $uploaded_file['name'];

$file_id = $bytes = bin2hex(random_bytes(5));
$file_path =sprintf('./uploads/%s.%s',
    $file_id,
    'pdf'
);

echo 'File ID : '. $file_id.' ';

if (!move_uploaded_file(
    $uploaded_file['tmp_name'],
    $file_path
)) {
    throw new RuntimeException('Failed to move uploaded file.');
}

$command = escapeshellcmd("extract-and-ocr.py $file_id");
$output = shell_exec($command);
echo $output;