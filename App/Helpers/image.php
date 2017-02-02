<?php

class Image
{


    private static $destination_path = 'images/posts_image/';


    public static function validate_image($image, $max_size_in_mb = 2)
    {
        if (self::validate_images_type($image)) {

            if (self::validate_images_size($image, $max_size_in_mb)) {

                return true;

            } else {

                echo 'Image size is too big it should be less than ' . $max_size_in_mb . 'MB';
            }

        } else {
            return 'Image type in not valid.';
        }
    }


    public static function move_uploaded_images_custom($images)
    {

        $paths = [];

        foreach ($images as $image) {

           $path  = self::$destination_path . time() .$image['name'];


            if (move_uploaded_file($image['tmp_name'], $path)) {

                $paths[] = $path;
            }

        }


        return (count($paths)  == count($images))? $paths : false ;
    }


    private static function validate_images_size($images, $max_size_in_mb)
    {
        $max_size_in_kb = $max_size_in_mb * 1024 * 1024;


        foreach ($images as $image) {

            if ($image['size'] < 0 && $image['size'] > $max_size_in_kb) {
                return false;
            }
        }

        return true;
    }

    private static function validate_images_type($images)
    {
        foreach ($images as $image) {


            if (!($image['type'] == 'image/png' || $image['type'] == 'image/jpg'
                || $image['type'] == 'image/bmp' || $image['type'] == 'image/gif')
            ) {
                return false;
            }
        }

        return true;
    }


}


?>