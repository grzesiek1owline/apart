<?php

namespace App;
use StoutLogic\AcfBuilder\FieldsBuilder;

$flats = new FieldsBuilder('flats', ['title' => 'Mieszkanie']);

$flats
    -> setLocation('post_type', '==', 'mieszkanie');


$flats
    ->addNumber('flat-size', ['label' => 'Powierzchnia mieszkania', 'required' => 1 , 'append' => 'm2'])
    ->addNumber('flat-others-size', ['label' => 'Taras/Ogródek', 'instructions' => 'Pozostaw puste jeśli mieszkanie nie posiada ogródka ani tarasu.', 'required' => 0, 'append' => 'm2'])
    ->addNumber('flat-rooms', ['label' => 'Liczba pokoi'])
    ->addFile('flat-pdf', ['label' => 'Plan mieszkania', 'required' => 1])
    ->addText('flat-floor', ['label' => 'Piętro'])
    ->addNumber('flat-price', ['label' => 'Cena mieszkania' ])
    ->addTrueFalse('flat-status', ['label' => 'Sprzedane?', 'instructions' => 'Oznacz mieszkanie jeśli zostanie sprzedane', 'ui' => 1, 'default_value' => false ]);
return $flats;
