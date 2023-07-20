<x-layouts.main>

    <x-slot:title>
        Biz haqimizda
    </x-slot:title>

    <x-layouts.page-header>
        Biz haqimizda
    </x-layouts.page-header>

    <!-- Blog Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row align-items-end mb-4">
                <div class="col-lg-6">
                    <h1 class="section-title mb-3">Xabarnomalar</h1>
                </div>
            </div>

                @foreach ($notifications as $notification)
                    <div class=" mb-5 border mb-3 p-4 rounded">
                        <div class="position-relative mb-4">
                            @if($notification->read_at==null)
                                <div class="blog-date">
                                <h4 class="font-weight-bold mb-n1">NEW</h4>
                            </div>
                            @endif

                        </div>
                        <h5 class="font-weight-medium mb-2">{{ $notification->data['id'] }}</h5>
                        <p class="mb-4">{{ $notification->data['title'] }}</p>
                        <p class="mb-4">{{ $notification->data['created_at'] }}</p>
                        @if($notification->read_at==null)
                            <a href="{{route('notifications.read',$notification->id)}}" class="btn btn-sm btn-primary py-2">Reading</a>
                        @endif

                    </div>
                @endforeach
                <div class="col-12">
                    <nav aria-label="Page navigation">
                        <ul class="pagination pagination-lg justify-content-center mb-0">
                            {{ $notifications->links() }}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog End -->
</x-layouts.main>
