<x-layouts.main>

    <x-slot:title>
        Post id-{{ $post->id }}
    </x-slot:title>

    <x-layouts.page-header>
        Edit Post id-{{ $post->id }}
    </x-layouts.page-header>

    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                {{-- @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif --}}
                <div class="contact-form">
                    <form action="{{ route('posts.update',$post->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class=" control-group">
                            <input type="text" class="form-control mb-2" name="title" placeholder="Sarlavha"
                                value="{{ $post->title }}" />
                            @error('title')
                                <p class="help-block text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class=" control-group">
                            <input type="text" class="form-control mb-2 p-4" name="short_content"
                                value="{{ $post->short_content }}" placeholder="Qisqacha mazmuni" />
                            @error('short_content')
                                <p class="help-block text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="control-group">
                            <textarea class="form-control mb-2 p-4" name="content" placeholder="Maqola">{{ $post->content }}</textarea>
                            @error('content')
                                <p class="help-block text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="control-group">
                            <input type="file" class="form-control p-4 mb-3" name="photo" />
                        </div>
                        <div class="flex">
                            <button class="btn btn-primary  py-3 px-5" type="submit">Saqlash</button>
                            <a href="{{ route('posts.show',$post->id) }}" class="btn btn-danger  py-3 px-5"  >Bekor qilish</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layouts.main>
