@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8 max-w-4xl">
    {{-- Back Button --}}
        <div class="mb-6">
            <a href="{{ route('internships.index') }}" class="inline-flex items-center text-blue-600 hover:text-blue-800 transition-colors">
                <i class="fas fa-arrow-left mr-2"></i>
                Back to Internships
            </a>
        </div>
    </div>
@endsection
