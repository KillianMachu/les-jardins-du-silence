<?php

$bed_number = [];
$min_max_bedroom_price = ["min" => 0, "max" => 0];

$query = new WP_Query([
    'post_type' => \LjdsBedroomManager\PostType::POST_TYPE,
    'posts_per_page' => -1,
]);

// Get default values for range

if ($query->have_posts()) {
    while ($query->have_posts()) {
        $query->the_post();
        $post_bed_number = get_field('bed_number');
        $post_bedroom_price = get_field('bedroom_price');

        $bed_number[] = $post_bed_number;

        if ($post_bedroom_price < $min_max_bedroom_price["min"] || $min_max_bedroom_price['min'] === 0) {
            $min_max_bedroom_price["min"] = $post_bedroom_price;
        }
        if ($post_bedroom_price > $min_max_bedroom_price["max"]) {
            $min_max_bedroom_price["max"] = $post_bedroom_price;
        }
    }
    wp_reset_postdata();

    $bed_number = array_unique($bed_number);
}


global $wp;
$action = home_url($wp->request);

?>

<form method="post" action="<?= $action ?>">
    <label for="bed_number_range">Nombre de lits :</label>
    <select name="filter-select-bed_number"">
        <option value="">Choisir le nombre de lits</option>
        <?php foreach ($bed_number as $choice) : ?>
            <option value="<?= $choice ?>" <?= $_POST && $_POST['filter-select-bed_number'] === $choice ? 'selected' : '' ?>><?= $choice ?></option>
        <?php endforeach; ?>
    </select>

    <label for="bedroom_price_range">Prix de la chambre :</label>
    <input type="range" name="filter-range-bedroom_price[min]" id="bedroom_price_range_min"
           min="<?= $min_max_bedroom_price['min'] ?>"
           max="<?= $min_max_bedroom_price['max'] ?>" step="10"
           value="<?= $_POST['filter-range-bedroom_price']['min'] ?? $min_max_bedroom_price['min']  ?>" />
    <input type="range" name="filter-range-bedroom_price[max]" id="bedroom_price_range_max"
           min="<?= $min_max_bedroom_price['min'] ?>"
           max="<?= $min_max_bedroom_price['max'] ?>" step="10"
           value="<?= $_POST['filter-range-bedroom_price']['max'] ?? $min_max_bedroom_price['max']  ?>" />

    <input type="submit" value="Filtrer" />
</form>