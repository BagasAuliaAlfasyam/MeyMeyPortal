<div>
    <!-- Simplicity is the ultimate sophistication. - Leonardo da Vinci -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('home') }}">Home</a></li>

            @foreach ($paths as $path)
            <li class="breadcrumb-item pl-0 text-capitalize 
            {{ $loop->last ? 'active' : '' }}">
                <a href="{{ url($path) }}">
                    {{ str_replace('-', ' ', $path) }}
                </a>
            </li>
            @endforeach
        </ol>
    </nav>
</div>