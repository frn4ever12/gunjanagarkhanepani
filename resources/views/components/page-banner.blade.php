@props(['title' => '', 'breadcrumb' => []])

<section class="page-banner">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('home') }}">
                                <i class="fas fa-home me-1"></i>गृहपृष्ठ
                            </a>
                        </li>
                        @foreach($breadcrumb as $key => $item)
                        @if($key === count($breadcrumb) - 1)
                        <li class="breadcrumb-item active" aria-current="page">{{ $item }}</li>
                        @else
                        <li class="breadcrumb-item">{{ $item }}</li>
                        @endif
                        @endforeach
                    </ol>
                </nav>
                <h1 class="page-title">{{ $title }}</h1>
            </div>
        </div>
    </div>
</section>
