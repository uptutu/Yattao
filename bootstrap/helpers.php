<?php
/**
 * 将当前路径路由的名字转换成一个能适用于CSS的类名
 *
 * @example
 *      Route::currentRouteName() === 'example.show'
 *      >>> 'example-show'
 *
 * @return string
 */
function route_class()
{
    return str_replace('.','-', Route::currentRouteName());
}


/**
 * 将传入的值转化成一串无换行的字符串
 *
 * @param string $value
 * @param int $length
 * @return string
 */
function make_excerpt(string $value, $length = 200)
{
    $excerpt = trim(preg_replace('/\r\n|\r|\n+/', " ", strip_tags($value)));
    return str_limit($excerpt, $length);
}