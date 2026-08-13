@php
    use Statamic\Statamic;
@endphp

<ui-widget title="{{ $title }}">
    <div class="lw-widget px-4 py-3">
        <div class="flex flex-wrap gap-3">
            @forelse ($links as $link)
                <a href="{{ $link['url'] }}" @if ($link['new_tab']) target="_blank" rel="noopener noreferrer" @endif
                    class="lw-link group inline-flex flex-col items-center justify-center w-20 h-20 shrink-0 rounded-md bg-zinc-800/60 hover:bg-zinc-700/70 border border-transparent hover:border-zinc-700 no-underline transition-colors">
                    <span class="lw-icon mb-1 text-zinc-100 opacity-90 group-hover:opacity-100" aria-hidden="true">
                        {!! Statamic::svg($link['icon'], 'h-6 w-6 sm:h-7 sm:w-7') !!}
                    </span>

                    <span class="lw-title text-xs leading-none text-blue-400 group-hover:text-blue-300">
                        {{ $link['title'] }}
                    </span>
                </a>
            @empty
                <p class="lw-empty">No links configured yet.</p>
            @endforelse
        </div>
    </div>
</ui-widget>