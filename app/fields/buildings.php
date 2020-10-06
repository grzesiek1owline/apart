<?php

namespace App;
use StoutLogic\AcfBuilder\FieldsBuilder;

$building = new FieldsBuilder('buildings', ['title' => 'Budynek']);

$building
    -> setLocation('post_type', '==', 'buildings');


$building
    ->addRepeater('bulding-flats', ['label' => 'Kondygnacje', 'button_label' => 'Dodaj kondygnacje', 'layout' => 'row'])
        ->addText('name', ['label' => 'Nazwa kondygnacji'])
        ->addImage('plan', ['label' => 'Plan kondygnacji', 'required' => 1 ])
        ->addPostObject('flats', ['label' => 'Mieszkania', 'return_format' => 'id', 'multiple' => 1, 'post_type' => 'mieszkanie']);
return $building;
