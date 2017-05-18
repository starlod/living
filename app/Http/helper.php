<?php

/**
 * アセットにバージョン情報を付加
 *
 * @author starlod
 */
function asset_ver($path)
{
    if (file_exists(public_path() . '/' . $path)) {
        return asset($path) . '?ver=' . date('YmdHis', filemtime(public_path() . '/' . $path));
    }

    return asset($path) . '?ver=' . env('APP_VER', '0.0.1');
}
