<?php


class View
{

    function generate($content_view, $data )
    {
        include APP.'/views/'.$content_view;
    }
}