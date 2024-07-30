<?php

class EnlSlider{
    function generateImageList($items, $columns) {
        $html = '<div class="image-list">';
        
        foreach ($items as $index => $item) {
            if ($index % $columns == 0) {
                if ($index != 0) {
                    $html .= '</div>'; 
                }
                $html .= '<div class="row">'; 
            }
            
            $html .= '<div class="column">';
            if (isset($item['href'])) {
                $html .= '<a href="' . esc_url($item['href']) . '">';
            }
            $html .= '<img src="' . esc_url($item['image']) . '" width="100" height="100" alt="' . esc_attr($item['text']) . '">';
            if (isset($item['href'])) {
                $html .= '</a>';
            }
            $html .= '<p>' . esc_html($item['text']) . '</p>';
            $html .= '</div>';
        }

        $html .= '</div>'; 
        $html .= '</div>'; 
        
        return $html;
    }

    function slider() {
        $upload_dir = wp_upload_dir();
        $base_url = $upload_dir['baseurl'] . '/enl/';

        $items = [
            ["image" => $base_url . "tryptaminy.png", "text" => "Psychodeliczne – tryptaminy", "href" => "/psychodeliki-tryptaminy"],
            ["image" => $base_url . "fenyloetyloaminy.png", "text" => "Fenyloetyloaminy – psychodeliczne, pobudzenie", "href" => "/fenyloetyloaminy-psychodeliczne-pobudzenie"],
            ["image" => $base_url . "dysocjacja.png", "text" => "Psychodeliki – dysocjanty", "href" => "/psychodeliki-dysocjanty"],
            ["image" => $base_url . "kanabinoidy.png", "text" => "Kanabinoidy", "href" => "/kanabinoidy"],
            ["image" => $base_url . "stymulanty.png", "text" => "Stymulanty – dopamina", "href" => "/stymulanty-dopamina-noradrenalina-adrenalina"],
            ["image" => $base_url . "opids.jpeg", "text" => "Opoidy – przeciwbólowe", "href" => "/opoioidy-przeciwbolowe"]
        ];        
        $numberOfColumns = 3;
        echo self::generateImageList($items, $numberOfColumns);
    }
}
?>