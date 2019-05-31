<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 5/2/2019
 * Time: 12:03 PM
 */
class Plan extends TinyHomesBase
{
    public function getFeatureImage()
    {
        return $this->getPostMeta('feature-image');
    }
    public function getLength()
    {
        return $this->getPostMeta('length');
    }
    public function getWidth()
    {
        return $this->getPostMeta('width');
    }
    public function getHeight()
    {
        return $this->getPostMeta('height');
    }
    public function getPrice()
    {
        return $this->getPostMeta('price');
    }
    public function getGalleryImages()
    {
        $gallery = Array();
        $field = get_post_meta($this->id());
        foreach($field['wpcf-gallery-images'] as $image) {
            $gallery[] = $image;
        }
        return $gallery;
    }
    public function getLayoutImages()
    {
        $gallery = Array();
        $field = get_post_meta($this->id());
        foreach($field['wpcf-layout-images'] as $image) {
            $gallery[] = $image;
        }
        return $gallery;
    }
    public function displayGallery()
    {
        $html = '';
        foreach ($this->getGalleryImages() as $images)
        {
            $imageid = getImageID($images);
            $img = wp_get_attachment_image_src($imageid, 'gallery');
            $html .= '<div><img src="' . $img[0] . '" alt="" /></div>';
        }
        return $html;
    }
    public function displayThumbnails()
    {
        $html = '';
        foreach ($this->getGalleryImages() as $images)
        {
            $imageid = getImageID($images);
            $img = wp_get_attachment_image_src($imageid, 'gallery_thumb');
            $html .= '<div><img src="' . $img[0] . '" alt="" /></div>';
        }
        return $html;
    }
    public function displayLayoutPlans()
    {
        $html = '';
        foreach ($this->getLayoutImages() as $images)
        {
            $imageid = getImageID($images);
            $img = wp_get_attachment_image_src($imageid, 'plans');
            $html .= '<div><img src="' . $img[0] . '" alt="" /></div>';
        }
        return $html;
    }
}