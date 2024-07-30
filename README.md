Web element carousel for wordpress

functions.php - add to themes file

```php
function include_slider_code() {
    ob_start();

    $file_path = get_template_directory() . '/enl/sliderBar/EnlSliderCarousel.php';

    if (!class_exists('EnlSliderCarousel')) {
        if (file_exists($file_path)) {
            include_once($file_path); 
        } else {
            echo '<p>Plik EnlSliderCarousel.php nie został znaleziony.</p>';
            return ob_get_clean(); 
        }
    }

    $enlSliderCarousel = new EnlSliderCarousel();
    echo $enlSliderCarousel->slider();

    return ob_get_clean(); 
}

add_shortcode('slider_code', 'include_slider_code');