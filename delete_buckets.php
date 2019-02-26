<?php

    if(isset($_GET['bucket_name'])) {

        require 'get_client.php';

        $objects = $s3Client->listObjects([
            'Bucket' => $_GET['bucket_name']
        ]);

        if(isset($objects['Contents'])) {

            $delete = array('objects'=>array());

            foreach ($objects['Contents'] as $object) {
                $delete['Objects'][]['Key']
                        = (string)$object['Key'];
            }

            $s3Client->deleteObjects([
                'Bucket' => $_GET['bucket_name'],
                'Delete' => $delete
            ]);

        }

        $s3Client->deleteBucket([
            'Bucket' => $_GET['bucket_name'],
        ]);

    }

    header("Location: show_buckets.php");
    die();
