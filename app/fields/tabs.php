<?php

namespace App;
use StoutLogic\AcfBuilder\FieldsBuilder;

$tabs = new FieldsBuilder('flats', ['title' => 'Blocks: Mieszkania', 'key' => 'mieszkania']);

$tabs
    ->setLocation('block', '==', 'acf/flats');

$tabs
    ->addText('flat-list-sub', ['label' => 'Podtytuł sekcji', 'required' => 1])
    ->addText('flat-list-title', ['label' => 'Tytuł sekcji', 'required' => 1])
    ->addText('flat-list-btn-1', ['label' => 'Treść przycisku 1', 'required' => 1])
    ->addText('flat-list-btn-2', ['label' => 'Treść przycisku 2', 'required' => 1])
    ->addText('flat-list-hash-1', ['label' => 'Hash Tab 1', 'instructions' => 'Tylko małe litery, bez polskich znaków i spacji. Pole wykorzystywane do odnośnika tabu, np. strona.pl/#tab', 'required' => 1])
    ->addText('flat-list-hash-2', ['label' => 'Hash Tab 2', 'instructions' => 'Tylko małe litery, bez polskich znaków i spacji. Pole wykorzystywane do odnośnika tabu, np. strona.pl/#tab', 'required' => 1]);
return $tabs;
