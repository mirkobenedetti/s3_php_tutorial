<?php

    require './vendor/autoload.php';

    use Aws\S3\S3Client;
    use Aws\Credentials\CredentialProvider;
    use Aws\S3\Exception\S3Exception;

    $profile = 'default';
    $path = './credentials.ini';

    $provider = CredentialProvider::ini($profile, $path);
    $provider = CredentialProvider::memoize($provider);

    $s3Client = new S3Client([
        'region'      => 'eu-central-1',
        'version'     => 'latest',
        'credentials' => $provider
    ]);
