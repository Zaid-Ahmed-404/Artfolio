<?php

namespace App\Filament\Pages;



use Filament\Pages\Page;

use Illuminate\Support\Facades\Http;

class ArtGallery extends Page
{

    protected string $view = 'filament.pages.art-gallery';


    public string $search = '';
    public int $pageNumber = 1;
    public int $perPage = 24;
    public array $artworks = [];
    public ?string $iiifBase = null;
    public ?array $pagination = null;

    public function mount()
    {
        $this->loadArtworks();
    }

    public function updatedSearch()
    {
        $this->pageNumber = 1;
        $this->loadArtworks();
    }

    public function nextPage()
    {
        if ($this->pagination && $this->pageNumber < ($this->pagination['total_pages'] ?? 1)) {
            $this->pageNumber++;
            $this->loadArtworks();
        }
    }

    public function prevPage()
    {
        if ($this->pageNumber > 1) {
            $this->pageNumber--;
            $this->loadArtworks();
        }
    }

    public function loadArtworks()
    {
        $endpoint = $this->search !== ''
            ? 'https://api.artic.edu/api/v1/artworks/search'
            : 'https://api.artic.edu/api/v1/artworks';


        $params = [
            'page'   => $this->pageNumber,
            'limit'  => $this->perPage,
            'fields' => 'id,title,artist_display,image_id,date_display',
        ];

        if ($this->search !== '') {
            $params['q'] = $this->search;
        }

        $response = Http::timeout(12)->get($endpoint, $params);

        if ($response->failed()) {
            $this->artworks = [];
            $this->iiifBase = 'https://www.artic.edu/iiif/2';
            $this->pagination = ['current_page' => 1, 'total_pages' => 1];
            return;
        }

        $json = $response->json();
        $this->iiifBase = $json['config']['iiif_url'] ?? 'https://www.artic.edu/iiif/2';

        $data = $json['data'] ?? [];
        $this->artworks = collect($data)->map(function ($item) {
            $imageId = $item['image_id'] ?? null;

            $imageUrl = null;
            if ($imageId && $this->iiifBase) {
                $imageUrl = rtrim($this->iiifBase, '/') . '/' . $imageId . '/full/400,/0/default.jpg';
            }

            return [
                'id'            => $item['id'] ?? null,
                'title'         => $item['title'] ?? 'Untitled',
                'artist'        => $item['artist_display'] ?? null,
                'date_display'  => $item['date_display'] ?? null,
                'image_url'     => $imageUrl,
            ];
        })->toArray();

        $this->pagination = $json['pagination'] ?? [
            'current_page' => $this->pageNumber,
            'total_pages'  => $this->pageNumber,
        ];
    }
}
