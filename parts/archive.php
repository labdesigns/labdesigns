<?php

/**
 * Template part for displaying archives
 *
 *
 * @package LabDesigns
 */

$category = get_the_category()[0]->name;

?>

<?php if ($category === 'Expertise') {
    get_template_part('parts/archive', 'expertise');
} else {

    get_template_part('parts/archive', 'none');
}

?>