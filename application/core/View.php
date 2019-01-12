<?php


class View
{

   public static function generate($content_view, $data )
    {
        require_once  APP.'/views/'.$content_view;
    }
}