<?php

namespace App;
use StoutLogic\AcfBuilder\FieldsBuilder;

$tax = new FieldsBuilder('taxonomy-attachments', ['title' => 'Plan budynku/kondygnacji']);

$tax
    ->setLocation('taxonomy', '==', 'floor');

$tax
    ->addFile('tax-pdf', ['label' => 'Plan', 'required' => 1]);
return $tax;
