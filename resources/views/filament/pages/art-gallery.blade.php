<x-filament::page class="artworks-page">

    {{-- Include CSS --}}
    <link rel="stylesheet" href="{{ asset('css/artworks.css') }}">

    <div>
        {{-- Search Bar --}}
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

        {{-- Artworks Grid --}}
        <div class="artworks-grid">
            @forelse($artworks as $art)
                <div class="artwork-card">
                    {{-- Image --}}
                    <div class="artwork-image-wrapper">
                        @if($art['image_url'])
                            <img src="{{ $art['image_url'] }}" alt="{{ $art['title'] }}">

                            {{-- Icons Container --}}
                            <div class="artwork-icons">
                                {{-- Download Icon --}}
                                <button wire:click="downloadArtwork({{ $art['id'] }})" class="artwork-icon" title="Download">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 3v12m0 0l-4-4m4 4l4-4M5 17h14a2 2 0 002-2v-1a2 2 0 00-2-2h-3v-4H10v4H7a2 2 0 00-2 2v1a2 2 0 002 2z"/>
                                    </svg>
                                </button>
                               {{-- Favorite Icon --}}
                                <button wire:click="toggleFavorite({{ $art['id'] }})" class="artwork-icon">
                                    @if(in_array($art['id'], $favorites ?? []))
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-red-500" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5
                                                    2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09
                                                    C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5
                                                    c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                                        </svg>
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                            <path d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5
                                                    4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5
                                                    4.5 0 00-6.364 0z"/>
                                        </svg>
                                    @endif
                                </button>
                            </div>
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
