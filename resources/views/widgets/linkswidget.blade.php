@php
    use Statamic\Statamic;
@endphp

<ui-widget title="{{ $title }}">
    <div class="p-2">
        @if ($description)
            <p class="px-2 pb-3 text-sm text-gray-500 dark:text-gray-400">
                {{ $description }}
            </p>
        @endif

        <div class="grid grid-cols-2 gap-2 @sm/widget:grid-cols-3">
            @forelse ($links as $link)
                <a href="{{ $link['url'] }}" @if ($link['new_tab']) target="_blank" rel="noopener noreferrer" @endif
                    title="{{ $link['title'] }}"
                    class="group flex items-center gap-3 rounded-lg border border-gray-200 bg-white px-3 py-2.5 no-underline transition
                        hover:border-gray-300 hover:bg-gray-50
                        focus:outline-hidden focus-visible:ring-2 focus-visible:ring-blue-500 focus-visible:ring-offset-2
                        dark:border-gray-700 dark:bg-gray-900 dark:hover:border-gray-600 dark:hover:bg-gray-800
                        dark:focus-visible:ring-offset-gray-950">
                    <span
                        class="flex size-8 shrink-0 items-center justify-center rounded-md bg-gray-100 text-gray-600 transition
                            group-hover:bg-gray-200 group-hover:text-gray-900
                            dark:bg-gray-800 dark:text-gray-300 dark:group-hover:bg-gray-700 dark:group-hover:text-white"
                        aria-hidden="true">
                        {!! Statamic::svg($link['icon'], 'size-4', 'icons/link') !!}
                    </span>

                    <span
                        class="min-w-0 flex-1 truncate text-sm font-medium text-gray-700 transition
                            group-hover:text-gray-900 dark:text-gray-200 dark:group-hover:text-white">
                        {{ $link['title'] }}
                    </span>
                </a>
            @empty
                <p class="col-span-full px-2 py-1 text-sm text-gray-500 dark:text-gray-400">
                    {{ __('linkswidget::messages.no_links') }}
                </p>
            @endforelse
        </div>
    </div>
</ui-widget>
