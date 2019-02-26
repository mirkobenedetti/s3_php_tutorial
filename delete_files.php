<?php

    if(isset($_GET['file_name'])) {

        require 'get_client.php';

        $s3Client->deleteObject([
            'Bucket' => $_GET['bucket_name'],
            'Key'    => $_GET['file_name'],
        ]);

    }

    header("Location: show_buckets.php");
    die();
