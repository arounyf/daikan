<?php
//企业微信应用通知
function sct_send($desp,$key='key'){
    $postdata = http_build_query( array( 'content' => $desp, 'key' => $key ));
    $opts = array('http' =>
    array(
        'method'  => 'POST',
        'header'  => 'Content-type: application/x-www-form-urlencoded',
        'content' => $postdata));
    $context  = stream_context_create($opts);
    $result = file_get_contents('https://api.liang23.cn/wx.php', true, $context);
    return $result;
}