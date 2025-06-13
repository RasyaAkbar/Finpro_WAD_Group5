@extends('layouts.app')

@section('title', 'Culinary Experiences at Telkom University')

@section('content')
<style>
 
    body {
        background-color: #ffffff;
    }
    
   
    .culinary-container {
        background-color: #ffffff;
        min-height: 100vh;
        padding: 3rem 0;
    }
    
    .main-heading {
        color: #2c3e50;
        font-weight: 700;
        font-size: 2.5rem;
        margin-bottom: 3rem;
        text-align: center;
        position: relative;
    }
    
    .main-heading::after {
        content: '';
        display: block;
        width: 80px;
        height: 4px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        margin: 1rem auto;
        border-radius: 2px;
    }
    
 
    .card-container {
        display: flex;
        flex-wrap: wrap;
        gap: 2rem;
        justify-content: center;
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 1rem;
    }
    
   
    .experience-card {
        background: #ffffff;
        border: none;
        border-radius: 16px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
        overflow: hidden;
        width: 100%;
        max-width: 350px;
        min-height: 400px;
        display: flex;
        flex-direction: column;
    }
    
    
    .image-container {
        position: relative;
        height: 200px;
        overflow: hidden;
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
    }
    
    .experience-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }
    
    .experience-card:hover .experience-image {
        transform: scale(1.05);
    }
    
    .card-content {
        padding: 1.5rem;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }
    
    .card-title {
        color: #2c3e50;
        font-weight: 600;
        font-size: 1.3rem;
        margin-bottom: 0.8rem;
        line-height: 1.3;
    }
    
    .card-description {
        color: #5a6c7d;
        font-size: 0.95rem;
        line-height: 1.5;
        margin-bottom: 1rem;
        flex-grow: 1;
    }
    
    .card-location {
        color: #8e9aaf;
        font-size: 0.9rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        margin-top: auto;
        padding-top: 1rem;
        border-top: 1px solid #f0f2f5;
    }
    
    .location-icon {
        color: #667eea;
        font-size: 1rem;
    }
    
    /* Responsive design */
    @media (max-width: 768px) {
        .main-heading {
            font-size: 2rem;
        }
        
        .card-container {
            gap: 1.5rem;
        }
        
        .experience-card {
            max-width: 100%;
        }
        
        .culinary-container {
            padding: 2rem 0;
        }
    }
    
    @media (max-width: 576px) {
        .main-heading {
            font-size: 1.8rem;
            margin-bottom: 2rem;
        }
        
        .card-container {
            gap: 1rem;
        }
        
        .card-content {
            padding: 1.25rem;
        }
    }
</style>

<div class="culinary-container">
    <div class="container">
        <h1 class="main-heading">Experience Telkom University's Culinary</h1>

        <div class="card-container">
            {{-- Experience 1 --}}
            <div class="experience-card">
                <div class="image-container">
                    {{-- <img src="{{ asset('storage/' . $culinaries->image) }}" --}}<img src="{{ asset('images\alumni-kopi.jpg') }}"
                         class="experience-image" 
                         alt="Kopi Alumni">
                </div>
                <div class="card-content">
                    <div>
                        <h5 class="card-title">{{$culinaries->title}}</h5>
                        <p class="card-description">Reunion with a cup of coffee</p>
                    </div>
                    <p class="card-location">
                        <i class="bi bi-geo-alt-fill location-icon"></i> 
                        In front of FIT Parking
                    </p>
                </div>
            </div>

            {{-- Experience 2 --}}
            <div class="experience-card">
                <div class="image-container">
                    <img src="{{ asset('images/telu-coffee.jpg') }}" 
                         class="experience-image" 
                         alt="Tel-U Coffee">
                </div>
                <div class="card-content">
                    <div>
                        <h5 class="card-title">Tel-U Coffee</h5>
                        <p class="card-description">A Cup of Endowment for Telkom University</p>
                    </div>
                    <p class="card-location">
                        <i class="bi bi-geo-alt-fill location-icon"></i> 
                        Building GKU 1st Floor
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection