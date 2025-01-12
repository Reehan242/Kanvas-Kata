@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Category</h1>
    </div>
    <div class="col-lg-9">
        <form method="post" action="/dashboard/categories/{{ $category->slug }}" class="mb-5" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                    name="name" required autofocus value="{{ old('name', $category->name) }}">
            </div>
            @error('name')
                <div class="text-danger mb-2">
                    <small>{{ $message }}</small>
                </div>
            @enderror
            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug"
                    value="{{ old('slug', $category->slug) }}">
            </div>
            @error('slug')
                <div class="text-danger mb-2">
                    <small>{{ $message }}</small>
                </div>
            @enderror

            <div class="mb-3">
                <label for="image" class="form-label">Category Image</label>
                @if ($category->image)
                    <img src="{{ asset('storage/' . $category->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                @else
                    <img class="img-preview img-fluid mb-3 col-sm-5">
                @endif

                <input class="form-control @error('image') is-invalid @enderror" type="file" id="image"
                    name="image" onchange="previewImage()">
                @error('image')
                    <div class="text-danger mb-2">
                        <small>{{ $message }}</small>
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update Category</button>
        </form>
    </div>


    <script>
        const name = document.querySelector("#name");
        const slug = document.querySelector("#slug");

        name.addEventListener("keyup", function() {
            let preslug = name.value;
            preslug = preslug.replace(/ /g, "-");
            slug.value = preslug.toLowerCase();
        });

        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREevent) {
                imgPreview.src = oFREevent.target.result;
            }
        }
    </script>
@endsection


{{-- <script>
        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');

        title.addEventListener('keyup',function(){
            fetch('/dashboard/posts/checkSlug?title=' +title.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });
    </script> --}}
