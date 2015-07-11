<?php
/**
 * BarcodeGenerator.php File
 * @package  yii2-quaggaJS
 * @author   jareiter
 * @version
 */

namespace jakobreiter\quaggajs;


class BarcodeFactory
{

    public static function generate($code, $text, $height = 100, $print = true)
    {
        $code = '*' . preg_replace('/[^\x20-\x7E]/', '', trim($code)) . '*';
        $text = preg_replace('/[^\x20-\x7E]/', '', trim($text));
        /*
         * 3  ... 105
         * 10 ... 428
         *
         */
        $w_padding = 20;

        $code_font = __DIR__.'/assets/3of9x.ttf';
        $text_font = __DIR__."/assets/arial.ttf";

        $code_size = $height * 0.6;
        $text_size = $height * 0.1;


        $code_box = imagettfbbox($code_size, 0, $code_font, $code);
        $text_box = imagettfbbox($text_size, 0, $text_font, $text);

        // Get your Text Width and Height
        $code_width = $code_box[2] - $code_box[0];
        $text_width = $text_box[2] - $text_box[0];
        $text_height = $code_size + $text_size; //$text_box[3]-$text_box[1];

        $width = $code_width + ($w_padding * 2);

        $im = imagecreatetruecolor($width, $height);

        //imagealphablending( $im, false );
        //imagesavealpha( $im, true );

        //$transparent = imagecolorallocatealpha($im, 0, 0, 0, 127);
        $white = imagecolorallocate($im, 255, 255, 255);
        $black = imagecolorallocate($im, 0, 0, 0);

        //imagefilledrectangle($im, 0, 0, $width, $height, $transparent);
        imagefilledrectangle($im, 0, 0, $width, $height, $white);

        //imagefill($im, 0, 0, $transparent);

        // Calculate coordinates of the text
        $code_x = ($width / 2) - (($code_width) / 2);
        $code_y = ($height / 2) - ($text_height / 2);

        $text_x = ($width / 2) - (($text_width) / 2);
        $text_y = $code_y + $code_size * 1.7 - ($text_height / 2);

        imagettftext($im, $code_size, 0, $code_x, $code_y + $code_size, $black, $code_font, $code);
        imagettftext($im, $text_size, 0, $text_x, $text_y + $text_size, $black, $text_font, $text);

        if ($print) {
            imagepng($im);
            imagedestroy($im);
        } else {
            return $im;
        }
    }

    public static function generateIMG($code, $text, $height = 100, $class = "")
    {
        ob_start();
        self::generate($code, $text, $height);
        $buffer = ob_get_clean();

        return '<img class="'.$class.'" src="data:image/png;base64,'.base64_encode($buffer).'">';
    }
}
