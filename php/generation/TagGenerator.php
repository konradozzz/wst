<?php declare(strict_types=1);


class TagGenerator
{
    public static function generateDiv(string $content, string ... $classes) : string {
        $html = "<div class=\"";
        foreach ($classes as $class) {
            $html = $html . $class . " ";
        }
        $html = $html . "\">";
        $html = $html . $content;
        $html = $html . "</div>";
        return $html;
    }

    public static function generateImage(string $image, string $descriptive, string ... $classes) : string {
        $html = "<img class=\"";
        foreach ($classes as $class) {
            $html = $html . $class . " ";
        }
        $html = $html . " draggable=\"false\" src=\"";
        $html = $html . $image;
        $html = $html . "\" alt=\"";
        $html = $html . $descriptive;
        $html = $html . "\" />";
        return $html;
    }

    public static function generateHead(string $title, string ... $cssPaths) : string {
        $html = "<head>";
        foreach ($cssPaths as $cssPath) {
            $html = $html . "<link rel=\"stylesheet\" href=\"";
            $html = $html . $cssPath;
            $html = $html . "\" />";
        }
        $html = $html . "<title>";
        $html = $html . $title;
        $html = $html . "</title></head>";
        return $html;
    }

    public static function generateBody(string $content) : string {
        $html = "<body>";
        $html = $html . $content;
        $html = $html . "</body>";
        return $html;
    }

    public static function generateHtml(string $head, string $body) : string {
        $html = "<!DOCTYPE html><html xmlns=\"http://www.w3.org/1999/xhtml\">";
        $html = $html . $head;
        $html = $html . $body;
        $html = $html . "</html>";
        return $html;
    }
}