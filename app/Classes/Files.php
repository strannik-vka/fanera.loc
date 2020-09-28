<?php

namespace App\Classes;

use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class Files
{
    public static function formatValidate($files, $formats)
    {
        foreach ($files as $file) {
            if(is_object($file)){
                $MimeType = $file->getClientMimeType();
                $MimeType = explode('/', $MimeType);
            } else {
                $MimeType = explode('.', $file);
                $MimeType[1] = end($MimeType);
            }

            if (
                !isset($MimeType[1]) ||
                !in_array(
                    strtolower($MimeType[1]),
                    $formats
                )
            ) {
                return false;
            }
        }

        return true;
    }

    public static function copy($files_input, $path, $thumbs = [])
    {
        if ($files_input) {
            $result = [];

            $files = is_array($files_input)
                ? $files_input
                : [$files_input];

            if ($thumbs) {
                $formatValidate = self::formatValidate($files, ['jpg', 'jpeg', 'webp', 'png', 'gif']);
                if (!$formatValidate) {
                    return false;
                }
            }

            foreach ($files as $file) {
                $file_path = Storage::disk('public')
                    ->put($path, new File($file), 'public');

                $file_url = Storage::url($file_path);

                if ($thumbs) {
                    $filename = self::filename($file_url);
                    $filename_arr = explode('.', $filename);

                    Image::make($_SERVER['DOCUMENT_ROOT'] . $file_url)
                        ->save(
                            $_SERVER['DOCUMENT_ROOT'] . str_replace(
                                '.' . $filename_arr[1],
                                '.webp',
                                $file_url
                            ),
                            100
                        )->destroy();

                    if (strtolower($filename_arr[1]) != 'webp') {
                        self::delete($file_url);
                    }

                    $file_url = str_replace('.' . $filename_arr[1], '.webp', $file_url);

                    foreach ($thumbs as $thumb) {
                        $img = Image::make($_SERVER['DOCUMENT_ROOT'] . $file_url);

                        if ($img) {
                            $img->fit($thumb[0], (isset($thumb[1]) ? $thumb[1] : null), function ($img) {
                                $img->upsize();
                            }, 'top');
                            $img->sharpen(10);
                            $img->save(
                                $_SERVER['DOCUMENT_ROOT'] . str_replace(
                                    $filename_arr[0],
                                    $thumb[0] . '_' . $filename_arr[0],
                                    $file_url
                                ),
                                100
                            );
                            $img->destroy();
                        }
                    }
                }

                $result[] = $file_url;
            }

            return is_array($files_input) ? $result : $result[0];
        }

        return false;
    }

    public static function upload($request, $input_name, $path, $thumbs = [])
    {
        if ($request->hasFile($input_name)) {
            $result = [];

            $files = is_array($request->$input_name)
                ? $request->$input_name
                : [$request->$input_name];

            if ($thumbs) {
                $formatValidate = self::formatValidate($files, ['jpg', 'jpeg', 'webp', 'png', 'gif']);
                if (!$formatValidate) {
                    return false;
                }
            }

            foreach ($files as $file) {
                $file_path = Storage::disk('public')
                    ->put($path, $file, 'public');

                $file_url = Storage::url($file_path);

                if ($thumbs) {
                    $filename = self::filename($file_url);
                    $filename_arr = explode('.', $filename);

                    Image::make($_SERVER['DOCUMENT_ROOT'] . $file_url)
                        ->save(
                            $_SERVER['DOCUMENT_ROOT'] . str_replace(
                                '.' . $filename_arr[1],
                                '.webp',
                                $file_url
                            ),
                            100
                        )->destroy();

                    if (strtolower($filename_arr[1]) != 'webp') {
                        self::delete($file_url);
                    }

                    $file_url = str_replace('.' . $filename_arr[1], '.webp', $file_url);

                    foreach ($thumbs as $thumb) {
                        $img = Image::make($_SERVER['DOCUMENT_ROOT'] . $file_url);

                        if ($img) {
                            $img->fit($thumb[0], (isset($thumb[1]) ? $thumb[1] : null), function ($img) {
                                $img->upsize();
                            }, 'top');
                            $img->sharpen(10);
                            $img->save(
                                $_SERVER['DOCUMENT_ROOT'] . str_replace(
                                    $filename_arr[0],
                                    $thumb[0] . '_' . $filename_arr[0],
                                    $file_url
                                ),
                                100
                            );
                            $img->destroy();
                        }
                    }
                }

                $result[] = $file_url;
            }

            return is_array($request->$input_name) ? $result : $result[0];
        }

        return false;
    }

    public static function filename($file_url)
    {
        $filename = explode('/', $file_url);
        return end($filename);
    }

    public static function delete($path, $thumbs = [])
    {
        if ($path) {
            $paths = is_array($path) ? $path : [$path];

            foreach ($paths as $path) {
                $path = str_replace('/storage/', '', $path);

                if ($thumbs) {
                    foreach ($thumbs as $thumb) {
                        $filename = self::filename($path);

                        Storage::disk('public')
                            ->delete(str_replace(
                                $filename,
                                $thumb[0] . '_' . $filename,
                                $path
                            ));
                    }
                }

                Storage::disk('public')
                    ->delete($path);
            }

            return true;
        }

        return false;
    }
}
