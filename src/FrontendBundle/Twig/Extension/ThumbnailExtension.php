<?php
/**
 * Created by PhpStorm.
 * User: Dmitry
 * Date: 23.09.2018
 * Time: 12:00
 */

namespace FrontendBundle\Twig\Extension;

class ThumbnailExtension extends \Twig_Extension
{
    public function getFunctions()
    {
        return array(
            'thumb' => new \Twig_SimpleFunction('thumb', [$this, 'resize'])
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'my_twig_thumb';
    }


    function filePath($filePath)
    {
        $fileParts = pathinfo($filePath);

        if (!isset($fileParts['filename'])) {
            $fileParts['filename'] = substr($fileParts['basename'], 0, strrpos($fileParts['basename'], '.'));
        }

        return $fileParts;
    }


    function resize($string, $id, $dir, $w_o = false, $h_o = false)
    {
        if (($w_o < 0) || ($h_o < 0)) {
            return 'Sorry, wrong image.';
        }

        list($w_i, $h_i, $type) = getimagesize($string);
        $types = ["jpg", "gif", "jpeg", "png"];
        $ext = $types[$type];

        if ($ext) {
            if ($ext == "jpg") {
                $func = 'imagecreatefrom' . 'jpeg';
            } else {
                $func = 'imagecreatefrom' . $ext;
            }
            $img_i = $func($string);
        } else {
            return 'Sorry, wrong image.';
        }

        if (!$h_o) $h_o = $w_o / ($w_i / $h_i);
        if (!$w_o) $w_o = $h_o / ($h_i / $w_i);

        $img_o = imagecreatetruecolor($w_o, $h_o);
        imagecopyresampled($img_o, $img_i, 0, 0, 0, 0, $w_o, $h_o, $w_i, $h_i);

        $func = null;
        $filename = $this->filePath($string)['filename'];

        if (!is_dir('../web/bundles/frontend/thumbnails/' . $dir . '/' . $id)) {
            mkdir('../web/bundles/frontend/thumbnails/' . $dir . '/' . $id);
            $uploaddir = '../web/bundles/frontend/thumbnails/' . $dir . '/' . $id . '/';
        } else {
            $uploaddir = '../web/bundles/frontend/thumbnails/' . $dir . '/' . $id . '/';
        }


        if (file_exists($uploaddir . $filename . '_' . $w_o . '.' . $ext)) {
            return str_replace('\\', '/', $filename . '_' . $w_o . '.' . $ext);
        }


        if ($ext == "jpg") {
            $func = 'image' . 'jpeg';
            $placeToSave = $uploaddir . $filename . '_' . $w_o . '.' . $ext;
        } else {
            $func = 'image' . $ext;
            $placeToSave = $uploaddir . $filename . '_' . $w_o . '.' . $ext;
        }

//        dump($func($img_o, $placeToSave));
//        dump($placeToSave);

        if ($func($img_o, $placeToSave, 95)) {
            return str_replace('\\', '/', $filename . '_' . $w_o . '.' . $ext);
        } else {
            return 'Sorry, wrong image.';
        }
    }
}