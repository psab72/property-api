<?php

namespace App\Service;

use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Contracts\Cache\ItemInterface;
use Symfony\Contracts\Cache\CacheInterface;

class PropertyAggregatorService
{
    public function __construct(
        private CacheInterface $cache,
        private JsonPropertyProvider $provider,
        private PropertyNormalizerService $normalizer,
        #[Autowire('%kernel.project_dir%')]
        private string $projectDir,
    ) {}

    public function getProperties(): array
    {
        try {

            return $this->cache->get(
                'properties_cache',
                function (ItemInterface $item) {
    
                    $item->expiresAfter(300);
    
                    $source1 = $this->provider->load(
                        $this->projectDir . '/public/data/source1.json'
                    );
    
                    $source2 = $this->provider->load(
                        $this->projectDir . '/public/data/source2.json'
                    );
    
                    return array_merge(
                        $this->normalizer->normalizeSource1($source1),
                        $this->normalizer->normalizeSource2($source2)
                    );
                }
            );
    
        } catch (\Throwable $e) {
            throw new \RuntimeException(
                'Property data unavailable',
                0,
                $e
            );
        }
    }
}