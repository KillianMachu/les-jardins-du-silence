<?php

namespace LjdsBedroomManager;

use Geniem\ACF\Field\Number;
use Geniem\ACF\Field\Select;
use Geniem\ACF\Group;
use Geniem\ACF\RuleGroup;

class CustomFields
{
    public function register(): void
    {
        $field_group = new Group( 'Bedroom Fields' );
        $field_group->set_key( 'bedroom_fields' )
            ->set_position('side')
            ->register();

        $rule_group = new RuleGroup();
        $rule_group->add_rule( 'post_type' , "==", PostType::POST_TYPE);

        $field_group->add_rule_group( $rule_group );

        $nb_bed = new Number(__('Number of beds', 'ljds-bedroom-manager'));
        $nb_bed->set_key("bed_number")
            ->set_name(__('bed_number', 'ljds-bedroom-manager'))
            ->set_placeholder(__('For example : 4', 'ljds-bedroom-manager'));
        $field_group->add_field( $nb_bed );

        $price = new Number(__('Price per night (in €)', 'ljds-bedroom-manager'));
        $price
            ->set_key("bedroom_price")
            ->set_name(__('bedroom_price', 'ljds-bedroom-manager'))
            ->set_placeholder(__('For example : 90', 'ljds-bedroom-manager'));
        $field_group->add_field( $price );

    }
}