<?php

$uploaded_file = $_FILES['file'];
$file_name = $uploaded_file['name'];

$file_id = $bytes = bin2hex(random_bytes(5));
$file_path =sprintf('./uploads/%s.%s',
    $file_id,
    'pdf'
);

if (!move_uploaded_file(
    $uploaded_file['tmp_name'],
    $file_path
)) {
    throw new RuntimeException('Failed to move uploaded file.');
}

putenv("LC_ALL=C.UTF-8");
putenv("LANG=C.UTF-8");


$command = escapeshellcmd("python3 extract-and-ocr.py $file_id");
$output = shell_exec($command);

echo json_encode(['success' => true, 'file_id' => $file_id, 'file_name' => $file_name]);
