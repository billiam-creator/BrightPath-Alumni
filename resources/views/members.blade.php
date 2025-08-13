@extends('layout.frontend')

@section('content')
<style>
    body {
        background-color: white;
    }
    .members-container {
        background-color: white;
        min-height: 100vh;
        padding: 50px 0;
    }
    .member-card {
        transition: all 0.3s ease;
        border: none;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 15px;
        padding: 30px 20px;
        text-align: center;
        margin-bottom: 30px;
        background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
    }
    .member-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 12px 25px rgba(0, 0, 0, 0.15);
    }
    .member-photo {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        object-fit: cover;
        border: 4px solid #007bff;
        transition: all 0.3s ease;
        margin: 0 auto 20px;
        display: block;
    }
    .member-card:hover .member-photo {
        border-color: #0056b3;
        transform: scale(1.05);
    }
    .member-name {
        font-size: 1.4rem;
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 8px;
    }
    .member-role {
        color: #007bff;
        font-weight: 500;
        font-size: 1rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    .members-title {
        color: #007bff;
        font-weight: 700;
        margin-bottom: 20px;
        position: relative;
    }
    .members-title::after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 50%;
        transform: translateX(-50%);
        width: 60px;
        height: 3px;
        background: linear-gradient(to right, #007bff, #0056b3);
        border-radius: 2px;
    }
    .members-subtitle {
        color: #6c757d;
        font-size: 1.1rem;
        margin-bottom: 40px;
    }
    .no-members {
        text-align: center;
        padding: 80px 20px;
        background: #f8f9fa;
        border-radius: 15px;
        border: 2px dashed #dee2e6;
    }
    .no-members h4 {
        color: #6c757d;
        font-weight: 600;
        margin-bottom: 10px;
    }
    .no-members p {
        color: #adb5bd;
        font-style: italic;
    }
    @media (max-width: 768px) {
        .member-photo {
            width: 100px;
            height: 100px;
        }
        .member-name {
            font-size: 1.2rem;
        }
        .member-role {
            font-size: 0.9rem;
        }
    }
</style>

<div class="container-fluid members-container">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="display-4 members-title text-center">👥 Our Team</h1>
                <p class="lead members-subtitle text-center">Meet our amazing team and contributors who make everything possible.</p>
            </div>
        </div>

        @if($members->count())
            <div class="row justify-content-center">
                @foreach($members as $member)
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="member-card">
                            <img src="{{ asset('storage/' . $member->photo) }}" 
                                 alt="{{ $member->name }}" 
                                 class="member-photo">
                            <h3 class="member-name">{{ $member->name }}</h3>
                            <p class="member-role">{{ $member->role }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="row">
                <div class="col-12">
                    <div class="no-members">
                        <h4>🔍 No Team Members Listed Yet</h4>
                        <p>We're building our amazing team. Check back soon to meet our contributors!</p>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection