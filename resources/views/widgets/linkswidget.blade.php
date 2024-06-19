<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<div class="card p-0 content">
    <div class="py-4 px-8 ">
        <h1>QuickLinks</h1>
        <p>Just a simple links navigation.</p>
    </div>
    <div class="flex flex-wrap p-4">
        @foreach ($links as $link)
        <a href="{{ $link['url'] }}" target="_blank" class="mx-1 px-4 py-2 flex flex-col items-center justify-center lw-box rounded-md group">
            <div class="lw-icon"><i class="{{ $link['icon'] }} text-4xl"></i></div>
            <div class="flex-1 text-center">
                <h3 class="mb-2 text-blue">{{ $link['title'] }}</h3>
            </div>
        </a>
        @endforeach
    </div>
</div>