<?php
$root_url = "/DuAn1";
$content_url = "$root_url/content";
$admin_url = "$root_url/admin";
$site_url  = "$root_url/site";
$upload_url = "../../uploads/";

function exist_param($fieldname)
{
    return array_key_exists($fieldname, $_REQUEST);
}

function save_file($fieldname, $target_dir)
{
    $file_uploaded = $_FILES[$fieldname];
    $file_name = basename($file_uploaded["name"]);
    $target_path = $target_dir . $file_name;
    move_uploaded_file($file_uploaded["tmp_name"], $target_path);
    return $file_name;
}

// Tạo cookie
function add_cookie($name, $value, $day)
{
    setcookie($name, $value, time() + (86400 * $day), "/");
}
// Xoa Cookie

function delete_cookie($name)
{
    add_cookie($name, "", -1);
}