<?php

$min_max_bed_number = ["min" => 0, "max" => 0];
$min_max_bedroom_price = ["min" => 0, "max" => 0];

$query = new WP_Query([
    'post_type' => \LjdsBedroomManager\PostType::POST_TYPE,
    'posts_per_page' => -1,
]);

// Get default values for range

if ($query->have_posts()) {
    while ($query->have_posts()) {
        $query->the_post();
        $bed_number = get_field('bed_number');
        $bedroom_price = get_field('bedroom_price');

        if ($bed_number < $min_max_bed_number["min"] || $min_max_bed_number['min'] === 0) {
            $min_max_bed_number["min"] = $bed_number;
        }
        if ($bed_number > $min_max_bed_number["max"]) {
            $min_max_bed_number["max"] = $bed_number;
        }

        if ($bedroom_price < $min_max_bedroom_price["min"] || $min_max_bedroom_price['min'] === 0) {
            $min_max_bedroom_price["min"] = $bedroom_price;
        }
        if ($bedroom_price > $min_max_bedroom_price["max"]) {
            $min_max_bedroom_price["max"] = $bedroom_price;
        }
    }
    wp_reset_postdata();
}


global $wp;
$action = home_url($wp->request);

?>

<form method="post" action="<?= $action ?>">
    <label for="bed_number_range">Nombre de lits :</label>
    <input type="range" name="filter-bed_number[min]" id="bed_number_range_min"
           min="<?= $min_max_bed_number['min'] ?>"
           max="<?= $min_max_bed_number['max'] ?>" step="1"
           value="<?= $_POST['filter-bed_number']['min'] ?? $min_max_bed_number['min']  ?>" />
    <input type="range" name="filter-bed_number[max]" id="bed_number_range_max"
           min="<?= $min_max_bed_number['min'] ?>"
           max="<?= $min_max_bed_number['max'] ?>" step="1"
           value="<?= $_POST['filter-bed_number']['max'] ?? $min_max_bed_number['max']  ?>" />

    <label for="bedroom_price_range">Prix de la chambre :</label>
    <input type="range" name="filter-bedroom_price[min]" id="bedroom_price_range_min"
           min="<?= $min_max_bedroom_price['min'] ?>"
           max="<?= $min_max_bedroom_price['max'] ?>" step="10"
           value="<?= $_POST['filter-bedroom_price']['min'] ?? $min_max_bedroom_price['min']  ?>" />
    <input type="range" name="filter-bedroom_price[max]" id="bedroom_price_range_max"
           min="<?= $min_max_bedroom_price['min'] ?>"
           max="<?= $min_max_bedroom_price['max'] ?>" step="10"
           value="<?= $_POST['filter-bedroom_price']['max'] ?? $min_max_bedroom_price['max']  ?>" />

    <input type="submit" value="Filtrer" />
</form>