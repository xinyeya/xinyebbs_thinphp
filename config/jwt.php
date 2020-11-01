<?php

return[
    'key' => 'xinyeweb.com', //自定义key的值
    'lat' => time(),   // 签发时间
    'nbf' => time(),   // 生效时间  +n，表示n秒后生效
    'exp' => time()+24 * 3600 , // 过期时间
];