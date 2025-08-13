@extends('layout.frontend')

@section('content')
<!-- Font Awesome CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<div class="container-fluid" style="background-color: white; min-height: 100vh; padding: 60px 0;">
    <div class="container">
        <!-- Header Section -->
        <div class="row mb-5">
            <div class="col-12 text-center">
                <div class="mb-4" style="display: inline-block; padding: 20px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border-radius: 50%; box-shadow: 0 10px 30px rgba(102, 126, 234, 0.3);">
                    <i class="fas fa-calendar-alt" style="font-size: 3rem; color: white;"></i>
                </div>
                <h1 class="display-4 font-weight-bold mb-3" style="color: #2c3e50; text-shadow: 2px 2px 4px rgba(0,0,0,0.1);">
                    <i class="fas fa-calendar-alt mr-3" style="color: #007bff;"></i>Events
                </h1>
                <p class="lead" style="color: #6c757d; font-size: 1.2rem; max-width: 600px; margin: 0 auto;">
                    Stay updated with upcoming events and programs that bring our community together.
                </p>
                <div style="height: 4px; width: 100px; background: linear-gradient(90deg, #007bff, #6f42c1); margin: 20px auto; border-radius: 2px;"></div>
            </div>
        </div>

        @if($events->count())
            <div class="row">
                @foreach($events as $index => $event)
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card h-100 border-0" style="
                            background: white;
                            border-radius: 20px;
                            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
                            transition: all 0.3s ease;
                            overflow: hidden;
                            position: relative;
                            animation: fadeInUp 0.6s ease forwards;
                            animation-delay: {{ $index * 0.1 }}s;
                            opacity: 0;
                            transform: translateY(30px);
                        " 
                        onmouseover="this.style.transform='translateY(-10px)'; this.style.boxShadow='0 15px 40px rgba(0,0,0,0.15)'"
                        onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 8px 25px rgba(0,0,0,0.1)'">
                            
                            <!-- Card Top Border -->
                            <div style="height: 5px; background: linear-gradient(90deg, #007bff, #6f42c1, #e83e8c); position: absolute; top: 0; left: 0; right: 0;"></div>
                            
                            <div class="card-body p-4" style="padding-top: 2rem !important;">
                                <!-- Event Title -->
                                <h2 class="card-title h4 font-weight-bold mb-3" style="
                                    color: #2c3e50;
                                    line-height: 1.3;
                                    transition: color 0.3s ease;
                                ">
                                    {{ $event->title }}
                                </h2>
                                
                                <!-- Event Description -->
                                <p class="card-text mb-4" style="
                                    color: #6c757d;
                                    font-size: 0.95rem;
                                    line-height: 1.6;
                                    height: 60px;
                                    overflow: hidden;
                                ">
                                    {{ Str::limit($event->description, 100) }}
                                </p>
                                
                                <!-- Event Details -->
                                <div class="mt-auto">
                                    <!-- Location -->
                                    <div class="d-flex align-items-center mb-3" style="
                                        padding: 12px 16px;
                                        background: linear-gradient(135deg, #f8f9fa, #e9ecef);
                                        border-radius: 12px;
                                        border-left: 4px solid #28a745;
                                    ">
                                        <div class="mr-3" style="
                                            background: white;
                                            padding: 10px;
                                            border-radius: 50%;
                                            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
                                            width: 40px;
                                            height: 40px;
                                            display: flex;
                                            align-items: center;
                                            justify-content: center;
                                        ">
                                            <i class="fas fa-map-marker-alt" style="color: #28a745; font-size: 1.1rem;"></i>
                                        </div>
                                        <span style="color: #495057; font-weight: 600; font-size: 0.95rem;">
                                            {{ $event->location }}
                                        </span>
                                    </div>
                                    
                                    <!-- Date -->
                                    <div class="d-flex align-items-center mb-3" style="
                                        padding: 12px 16px;
                                        background: linear-gradient(135deg, #f8f9fa, #e9ecef);
                                        border-radius: 12px;
                                        border-left: 4px solid #dc3545;
                                    ">
                                        <div class="mr-3" style="
                                            background: white;
                                            padding: 10px;
                                            border-radius: 50%;
                                            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
                                            width: 40px;
                                            height: 40px;
                                            display: flex;
                                            align-items: center;
                                            justify-content: center;
                                        ">
                                            <i class="fas fa-calendar-day" style="color: #dc3545; font-size: 1.1rem;"></i>
                                        </div>
                                        <div style="color: #495057; font-weight: 600; font-size: 0.95rem;">
                                            <div style="font-weight: 700; color: #2c3e50;">
                                                {{ \Carbon\Carbon::parse($event->date)->format('F j, Y') }}
                                            </div>
                                            <div style="font-size: 0.8rem; color: #6c757d; margin-top: 2px;">
                                                {{ \Carbon\Carbon::parse($event->date)->format('l') }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Hover Button -->
                                <div class="text-center mt-4" style="opacity: 0; transition: opacity 0.3s ease;" onmouseover="this.parentElement.querySelector('.hover-btn').style.opacity='1'" onmouseout="this.parentElement.querySelector('.hover-btn').style.opacity='0'">
                                    <button class="btn btn-primary hover-btn" style="
                                        background: linear-gradient(135deg, #007bff, #6f42c1);
                                        border: none;
                                        border-radius: 25px;
                                        padding: 10px 25px;
                                        font-weight: 600;
                                        box-shadow: 0 4px 15px rgba(0, 123, 255, 0.3);
                                        transition: all 0.3s ease;
                                    ">
                                        <i class="fas fa-info-circle mr-2"></i>Learn More
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            

        @else
            <!-- Empty State -->
            <div class="row">
                <div class="col-12">
                    <div class="text-center py-5" style="min-height: 400px; display: flex; flex-direction: column; justify-content: center;">
                        <!-- Empty State Icon -->
                        <div class="mb-4" style="
                            width: 150px;
                            height: 150px;
                            margin: 0 auto;
                            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
                            border-radius: 50%;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
                        ">
                            <i class="fas fa-calendar-times" style="font-size: 4rem; color: #6c757d; opacity: 0.6;"></i>
                        </div>
                        
                        <h3 class="h2 font-weight-bold mb-4" style="color: #2c3e50;">No Events Yet</h3>
                        <p class="lead mb-5" style="color: #6c757d; max-width: 500px; margin: 0 auto;">
                            We're working hard to bring you amazing events! Check back soon for exciting updates and new opportunities.
                        </p>
                        
                        <div>
                            <button class="btn btn-primary btn-lg mb-3" style="
                                background: linear-gradient(135deg, #007bff, #6f42c1);
                                border: none;
                                border-radius: 30px;
                                padding: 15px 35px;
                                font-weight: 600;
                                box-shadow: 0 8px 25px rgba(0, 123, 255, 0.3);
                                transition: all 0.3s ease;
                            " onmouseover="this.style.transform='translateY(-2px)'" onmouseout="this.style.transform='translateY(0)'">
                                <i class="fas fa-bell mr-2"></i>Notify Me When Events are Added
                            </button>
                            <p class="small text-muted">We'll send you an email when new events are available</p>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>

<style>
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Card hover effects */
.card:hover .card-title {
    color: #007bff !important;
}

.card:hover .hover-btn {
    opacity: 1 !important;
}

/* Button hover effects */
.btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(0,0,0,0.15) !important;
}

/* Smooth transitions */
* {
    transition: all 0.3s ease;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .display-4 {
        font-size: 2.5rem !important;
    }
    
    .card-body {
        padding: 1.5rem !important;
    }
}
</style>
@endsection