<?php

class EnlSliderCarousel {
    function generateImageList($items, $columns) {
        $html = '<div class="image-list">';
        $html .= '<button class="carousel-button prev" onclick="moveCarousel(-1)">&#10094;</button>';
        $html .= '<div class="carousel-wrapper">';
        
        $html .= '<div class="carousel-inner">';

        foreach ($items as $index => $item) {
            $html .= '<div class="carousel-item">';
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
        $html .= '<button class="carousel-button next" onclick="moveCarousel(1)">&#10095;</button>';
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
        echo $this->generateImageList($items, $numberOfColumns);
    }
}

?>
