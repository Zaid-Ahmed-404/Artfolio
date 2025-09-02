<x-filament::page class="artworks-page">

    {{-- Include CSS --}}
    <link rel="stylesheet" href="{{ asset('css/artworks.css') }}">

    <div>
        {{-- Search bar --}}
        <div class="artworks-search">
            <x-filament::input.wrapper class="artworks-search-wrapper">
                <x-filament::input
                    wire:model.debounce.500ms="search"
                    placeholder="Search Art Institute of Chicago artworks…"
                />
            </x-filament::input.wrapper>

            <x-filament::button wire:click="loadArtworks" icon="heroicon-o-magnifying-glass">
                Search
            </x-filament::button>
        </div>

        {{-- Grid --}}
        <div class="artworks-grid">
            @forelse($artworks as $art)
                <div class="artwork-card">
                    {{-- Image --}}
                    <div class="artwork-image">
                        @if($art['image_url'])
                            <img src="{{ $art['image_url'] }}" alt="{{ $art['title'] }}">
                        @else
                            <span>No image</span>
                        @endif
                    </div>

                    {{-- Content --}}
                    <div class="artwork-content">
                        <h3 class="artwork-title">{{ $art['title'] }}</h3>
                        @if($art['artist'])
                            <p class="artwork-artist">{!! nl2br(e($art['artist'])) !!}</p>
                        @endif
                        @if($art['date_display'])
                            <p class="artwork-date">{{ $art['date_display'] }}</p>
                        @endif
                    </div>
                </div>
            @empty
                <div class="artworks-empty">No artworks found.</div>
            @endforelse
        </div>

        {{-- Pagination --}}
        <div class="artworks-pagination">
            <x-filament::button
                wire:click="prevPage"
                :disabled="$pagination && ($pagination['current_page'] ?? $pageNumber) <= 1"
                icon="heroicon-o-chevron-left"
            >
                Prev
            </x-filament::button>

            <x-filament::button
                wire:click="nextPage"
                :disabled="$pagination && ($pagination['current_page'] ?? $pageNumber) >= ($pagination['total_pages'] ?? 1)"
                icon-position="after"
                icon="heroicon-o-chevron-right"
            >
                Next
            </x-filament::button>
        </div>
    </div>
</x-filament::page>
