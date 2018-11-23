<?php
/**
 * Created by PhpStorm.
 * User: vova
 * Date: 11/23/18
 * Time: 12:49 PM
 */

namespace App\Services;


class File
{
    public function getFulleName($request)
    {
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(storage_path() . '/img/', $fileName);
        }
        return $fileName;

    }
}