<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. The "local" disk, as well as a variety of cloud
    | based disks are available to your application. Just store away!
    |
     */

    'default' => env('FILESYSTEM_DRIVER', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Default Cloud Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Many applications store files both locally and in the cloud. For this
    | reason, you may specify a default "cloud" driver here. This driver
    | will be bound as the Cloud disk implementation in the container.
    |
     */

    'cloud' => env('FILESYSTEM_CLOUD', 's3'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many filesystem "disks" as you wish, and you
    | may even configure multiple disks of the same driver. Defaults have
    | been setup for each driver as an example of the required options.
    |
    | Supported Drivers: "local", "ftp", "sftp", "s3", "rackspace"
    |
     */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL') . '/storage',
            'visibility' => 'public',
        ],

        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
        ],

        'qiniu' => [
            'driver' => 'qiniu',
            'domains' => [
                'default' => 'dfile.jxdz0791.com', //??????????????????
                'https' => '', //??????HTTPS??????
                'custom' => '', //Useless ???????????????????????????????????? default ???
            ],
            'access_key' => '844lzD3by4U2W1sZddzFQ7vNqQkzzwl-dhehVzAE', //AccessKey
            'secret_key' => 'tdO5sS_ouC6UDa4XpyBLhfA4Oiwb8WU47ri4GWI3', //SecretKey
            'bucket' => 'jxdz0791', //Bucket??????
            'notify_url' => '', //???????????????????????????
            'access' => 'public', //?????????????????? public ??? private
            //'hotlink_prevention_key' => 'afc89ff8bd2axxxxxxxxxxxxxxbb', // CDN ????????????????????? key??? ????????? null ????????????????????????
            //'hotlink_prevention_key' => 'cbab68a279xxxxxxxxxxab509a', // ???????????????
        ],

    ],

];
