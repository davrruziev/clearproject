<x-layouts.main>

    <x-slot:title>
        Post create
    </x-slot:title>

    <x-layouts.page-header>
        Post Created
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
                    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class=" control-group">
                            <input type="text" class="form-control mb-2" name="title" placeholder="Sarlavha"
                                value="{{ old('title') }}" />
                            @error('title')
                                <p class="help-block text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="control-group">
                             <select name="category_id" class="form-control mb-2">
                                <option value="">Select category</option>
                                @foreach ( $categories as $category )
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                             </select>
                        </div>
                        <div class="form-group">
                            <label>Tags</label>
                             <select name="tags[]" id="" class="form-control select2" multiple>
                                @foreach ( $tags as $tag )
                                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                @endforeach
                             </select>
                        </div>
                        <div class=" control-group">
                            <input type="text" class="form-control mb-2 p-4" name="short_content"
                                value="{{ old('short_content') }}" placeholder="Qisqacha mazmuni" />
                            @error('short_content')
                                <p class="help-block text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="control-group">
                            <textarea class="form-control mb-2 p-4" name="content" placeholder="Maqola">{{ old('content') }}</textarea>
                            @error('content')
                                <p class="help-block text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="control-group">
                            <input type="file" class="form-control p-4 mb-3" name="photo" />
                        </div>
                        <div>
                            <button class="btn btn-primary btn-block py-3 px-5" type="submit">Saqlash</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layouts.main>
