@extends('layout.frontend')

@section('content')
<style>
    body {
        background-color: white;
    }
    .gallery-container {
        background-color: white;
        min-height: 100vh;
        padding: 40px 0;
    }
    .gallery-card {
        transition: transform 0.3s ease;
        border: none;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        margin-bottom: 30px;
    }
    .gallery-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
    }
    .gallery-img {
        height: 250px;
        object-fit: cover;
        width: 100%;
    }
    .gallery-title {
        color: #007bff;
        font-weight: bold;
        margin-bottom: 20px;
    }
    .no-images {
        text-align: center;
        color: #6c757d;
        font-style: italic;
        padding: 50px 0;
    }
</style>

<div class="container-fluid gallery-container">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="display-4 gallery-title text-center mb-4">🖼️ Gallery</h1>
                <p class="lead text-muted text-center mb-5">Browse photos from our events and activities.</p>
            </div>
        </div>

        @if($images->count())
            <div class="row">
                @foreach($images as $image)
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="card gallery-card">
                            <img src="{{ asset('storage/' . $image->image_path) }}" 
                                 alt="Gallery Image" 
                                 class="card-img-top gallery-img">
                            @if($image->caption)
                                <div class="card-body">
                                    <p class="card-text text-muted">{{ $image->caption }}</p>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="row">
                <div class="col-12">
                    <div class="no-images">
                        <h4>No images uploaded yet.</h4>
                        <p>Please check back later for updates.</p>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection