<?php

function storage($path)
{
    return asset('storage/' . $path);
}

function getExtension($url): bool|string
{
    $ext = explode('.', $url);
    return end($ext);
}

function formatPhone($phone)
{
    if (strlen($phone) > 10) {
        $phone = str_replace([' ', '(', ')', '+9'], '', $phone);
        $phone = ltrim($phone, '9');
        $newPhone = $phone[0];
        $newPhone .= '(';
        $newPhone .= $phone[1] . $phone[2] . $phone[3];
        $newPhone .= ') ';
        $newPhone .= $phone[4] . $phone[5] . $phone[6];
        $newPhone .= ' ';
        $newPhone .= $phone[7] . $phone[8] . $phone[9] . $phone[10];
        return $newPhone;
    }
    return $phone;
}

function clearPhone($phone)
{
    return ltrim(str_replace(['(', ')', ' '], '', $phone), '0,9,+');
}

function create_show_button($route, $additional_class = null)
{
    return html()->a($route, html()->i('')->class('fa fa-eye'))->class('btn btn-icon btn-primary btn-brand btn-sm me-1 ' . $additional_class);
}

function create_edit_button($route, $additional_class = null)
{
    return html()->a($route, html()->i('')->class('fa fa-pen'))->class('btn btn-icon btn-brand btn-sm me-1 ' . $additional_class);
}

function create_delete_button($route, $additional_class = null)
{
    return html()->a($route, html()->i('')->class('fa fa-trash'))->class('btn btn-icon btn-primary btn-sm me-1 delete-btn ' . $additional_class);
}

function createCookie($key, $value, $time)
{
    Cookie::queue($key, $value, $time);
    return true;
}

function getCookie($name)
{
    return request()->cookie($name);
}

function setting($key, $default = null, $isFile = false)
{
    if ($isFile) {
        return storage(config('setting.' . $key, $default));
    }
    return config('setting.' . $key, $default);
}

function formatPrice($price)
{
    return number_format($price, 2) . ' TL';
}

function agent(){
    return new \Jenssegers\Agent\Agent();
}
