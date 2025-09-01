<x-filament::page>
    <div class="space-y-6">

        {{-- Search bar --}}
        <div class="flex items-center gap-3">
            <x-filament::input.wrapper class="w-full">
                <x-filament::input
                    wire:model.debounce.500ms="search"
                    placeholder="Search Art Institute of Chicago artworks (e.g., Monet, portrait, landscape)…"
                />
            </x-filament::input.wrapper>

            <x-filament::button wire:click="loadArtworks" icon="heroicon-o-magnifying-glass">
                Search
            </x-filament::button>
        </div>

        {{-- Results meta --}}
        <div class="text-sm text-gray-500">
            @if($pagination)
                Page {{ $pagination['current_page'] ?? $pageNumber }} of {{ $pagination['total_pages'] ?? $pageNumber }}
            @endif
            @if($iiifBase)
                <span class="ml-2">• IIIF: {{ $iiifBase }}</span>
            @endif
        </div>

        {{-- Grid of artworks --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @forelse($artworks as $art)
                <div class="bg-white rounded-2xl shadow-sm overflow-hidden border border-gray-100">
                    <div class="aspect-[4/3] bg-gray-100 flex items-center justify-center">
                        @if($art['image_url'])
                            <img
                                src="{{ $art['image_url'] }}"
                                alt="{{ $art['title'] }}"
                                class="w-full h-full object-cover"
                                loading="lazy"
                            >
                        @else
                            <div class="text-gray-400 text-sm">No image</div>
                        @endif
                    </div>

                    <div class="p-4 space-y-1">
                        <div class="font-semibold leading-snug">
                            {{ $art['title'] }}
                        </div>
                        @if($art['artist'])
                            <div class="text-sm text-gray-600">
                                {!! nl2br(e($art['artist'])) !!}
                            </div>
                        @endif
                        @if($art['date_display'])
                            <div class="text-xs text-gray-500">
                                {{ $art['date_display'] }}
                            </div>
                        @endif
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center text-gray-500 py-16">
                    No artworks found.
                </div>
            @endforelse
        </div>

        {{-- Pagination controls --}}
        <div class="flex items-center justify-center gap-3">
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
