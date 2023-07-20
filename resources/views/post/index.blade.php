<x-layouts.main>

    <x-slot:title>
        {{ __('Blog') }}
    </x-slot:title>

    <x-layouts.page-header>
        {{ __('Blog') }}
    </x-layouts.page-header>

    <!-- Blog Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row align-items-end mb-4">
                <div class="col-lg-6">
                    <h6 class="text-secondary font-weight-semi-bold text-uppercase mb-3">Latest Blog</h6>
                    <h1 class="section-title mb-3">Latest Articles From Our Blog Post</h1>
                </div>
            </div>
            <div class="row">
                @foreach ($posts as $post)
                    <div class="col-lg-4 col-md-6 mb-5">
                        <div class="position-relative mb-4">
                            <img class="img-fluid rounded w-100" src="{{ asset('storage/'.$post->photo) }}" alt="">
                            <div class="blog-date">
                                <h4 class="font-weight-bold mb-n1">{{ $post->created_at->format('d') }}</h4>
                                <small class="text-white text-uppercase">{{ $post->created_at->format('M') }}</small>
                            </div>
                        </div>
                        <div class="d-flex mb-2">
                            <a class="text-secondary text-uppercase font-weight-medium" href="">Admin</a>
                            <span class="text-primary px-2">|</span>
                            <a class="text-secondary text-uppercase font-weight-medium" href="">Cleaning</a>
                        </div>
                        <h5 class="font-weight-medium mb-2">{{ $post->title }}</h5>
                        <p class="mb-4">{{ \Str::limit($post->short_content, '80') }}</p>
                        @if (auth()->user()->hasRole('admin'))   
                        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-sm btn-primary py-2">
                            Read More
                        </a>
                        @endif
                    </div>
                @endforeach
                <div class="col-12">
                    <nav aria-label="Page navigation">
                        <ul class="pagination pagination-lg justify-content-center mb-0">
                            {{ $posts->links() }}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog End -->
</x-layouts.main>
