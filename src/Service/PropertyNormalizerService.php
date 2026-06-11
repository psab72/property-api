<?php

namespace App\Service;

class PropertyNormalizerService
{
    public function normalizeSource1(array $properties): array
    {
        return array_map(function ($property) {
            return [
                'id' => $property['id'],
                'address' => $property['address'],
                'price' => $property['price'],
                'source' => 'source1'
            ];
        }, $properties);
    }

    public function normalizeSource2(array $properties): array
    {
        return array_map(function ($property) {
            return [
                'id' => $property['property_id'],
                'address' => $property['location'],
                'price' => $property['amount'],
                'source' => 'source2'
            ];
        }, $properties);
    }
}