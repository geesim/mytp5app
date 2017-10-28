<?php
//配置文件
return [
        'cache'  => [
        // 驱动方式
                'type'    => 'complex',
                // default driver
                'default' => [
                        'type'   => 'File',
                        // 缓存保存目录
                        'path'   => CACHE_PATH,
                        // 缓存前缀
                        'prefix' => '',
                        // 缓存有效期 0表示永久缓存
                        'expire' => 0,
                ],
                'file'   =>[
                        'type' => 'File',
                        // 缓存保存目录
                        'path' => CACHE_PATH,
                        // 缓存前缀
                        'prefix' => '',
                        // 缓存有效期 0表示永久缓存
                        'expire' => 0,
                ],
                'writeRedis'  => [
                        'type'       => 'redis',                        
                        'host'       => '127.0.0.1',
                        'port'       => 6379,
                        'password'   => 'rds123456local',
                        'select'     => 0,
                        'timeout'    => 0,
                        'expire'     => 0,
                        'persistent' => false,
                        'prefix'     => 'mytp5app_',
                ],
                'readRedis'  => [
                        'type'       => 'redis',                        
                        'host'       => '127.0.0.1',
                        'port'       => 6379,
                        'password'   => 'rds123456local',
                        'select'     => 0,
                        'timeout'    => 0,
                        'expire'     => 0,
                        'persistent' => false,
                        'prefix'     => 'mytp5app_',
                ],

	],

        
        
];