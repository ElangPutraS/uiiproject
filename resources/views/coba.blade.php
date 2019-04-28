@extends('layouts.coba')

@push('css')
<link rel="stylesheet" href="{{ asset('css/jquery.easyautocomplete.min.css') }}">
<script src="{{ asset('js/jquery.easyautocomplete.min.js') }}" defer></script>
<style>
.bg-particle {
    position:absolute;
    top: 0px;
    left: 0px;
    z-index: 0;
}
</style>
@endpush

@section('content')
<div class="container">
    {{-- Jumbotron --}}
    <div class="jumbotron box-primary box-elevation text-light" style="position: relative;">
        <canvas class="bg-particle"></canvas>
        <div class="row">
            <div class="col-sm-6">
                <h1 class="display-4">UII Project</h1>
                <p class="lead">Presented by HMTF</p>
                <button class="btn btn-lg btn-outline-light">Get Started !</button>
            </div>
            <div class="col-sm-6 mt-3 mt-sm-0">
                <blockquote class="blockquote">
                    <p class="mb-0">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Pariatur doloremque excepturi alias. Nemo ducimus dignissimos nobis deserunt voluptate! Veniam, nobis sapiente doloribus magnam voluptates quos eveniet temporibus ut voluptate iure.
                    </p>
                    <footer class="blockquote-footer">HMTF FTI UII</footer>
                </blockquote>
            </div>
        </div>
    </div>

    {{-- Search Section --}}
    <div class="px-3 py-1">
        <div class="custom-control custom-radio custom-control-inline">
            <input class="custom-control-input" type="radio" id="search-type-all" name="searchtype" value="all" checked>
            <label class="custom-control-label" for="search-type-all">All</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input class="custom-control-input" type="radio" id="search-type-project" name="searchtype" value="project">
            <label class="custom-control-label" for="search-type-project">Projects</label>
        </div>
    </div>
    <div class="card card-body box-elevation p-0 input-search-box">
        <div class="form-group mb-0">
            <div class="input-search-prepend text-center">
                <i class="fas fa-search"></i>
            </div>
            <input type="text" class="form-control form-control-lg pl-5 input-search" style="border: none;" placeholder="Search Everything ...">
        </div>
    </div>

    {{-- Content --}}
    <div class="row mt-5 flex-row-reverse flex-md-row flex-wrap-reverse flex-sm-wrap">
        <div class="col-md-8">
            <div><h1 class="h6">Showing 10 Projects</h1></div>
            <div class="row">
                @foreach(range(1,5) as $i)
                <div class="col-12 my-2">
                    <div class="card card-body box-elevation content-card">
                        <h2 class="card-title h5">Project 1</h2>
                        <p class="card-text">
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Fugit repellat odit sint ducimus impedit maxime illum, est consequuntur animi obcaecati et tempora cumque, ea ipsum provident nobis dolor? Beatae, nihil!
                        </p>
                        <div class="d-flex">
                            <div class="mr-auto">
                                <span class="badge badge-primary">PHP</span>
                                <span class="badge badge-primary">Javascript</span>
                            </div>
                            <div class="ml-auto">
                                <span class="btn text-muted">{{ rand(1,100) }} Views</span>
                                <button class="btn btn-primary">View Detail</button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="col-md-4 sidebar-content flex-1 mb-3 mb-sm-0">
            <h3>Tags</h3>
            <div class="content-tags">
                <a href="#" class="btn btn-link">PHP <span class="badge badge-primary"><small>{{ rand(1,100) }}</small></span></a>
                <a href="#" class="btn btn-link">Java <span class="badge badge-primary"><small>{{ rand(1,100) }}</small></span></a>
                <a href="#" class="btn btn-link">Go <span class="badge badge-primary"><small>{{ rand(1,100) }}</small></span></a>
                <a href="#" class="btn btn-link">Python <span class="badge badge-primary"><small>{{ rand(1,100) }}</small></span></a>
                <a href="#" class="btn btn-link">Javascript <span class="badge badge-primary"><small>{{ rand(1,100) }}</small></span></a>
                <a href="#" class="btn btn-link">Laravel <span class="badge badge-primary"><small>{{ rand(1,100) }}</small></span></a>
                <a href="#" class="btn btn-link">Research <span class="badge badge-primary"><small>{{ rand(1,100) }}</small></span></a>
                <a href="#" class="btn btn-link">Website <span class="badge badge-primary"><small>{{ rand(1,100) }}</small></span></a>
                <a href="#" class="btn btn-link">Machine Learning <span class="badge badge-primary"><small>{{ rand(1,100) }}</small></span></a>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/particlesjs/2.2.2/particles.min.js"></script>
<script>
window.onload = function () {
    Particles.init({
        selector: '.bg-particle',
        connectParticles: true,
        color: ['#f6ffaa', '#ecfffd'],
        maxParticles: 40,
        responsive: [
            {
                breakpoint: 425, 
                options: {
                    maxParticles: 20
                }
            },
            {
                breakpoint: 320, 
                options: {
                    maxParticles: 0
                }
            }
        ]
    });

    $('.input-search').easyAutocomplete({
        data: [
            {name: "PHP"},
            {name: "Javascript"},
            {name: "Golang"},
            {name: "Python"},
            {name: "Java"},
            {name: "Machine Learning"},
            {name: "Research"},
        ],
        getValue: "name",
        list: {
            match: {
                enabled: true
            }
        }
    });

    $('.input-search').on('focus', function () {
        $(this).closest('.input-search-box')
            .addClass('active');
    });
    $('.input-search').on('blur', function () {
        $(this).closest('.input-search-box')
            .removeClass('active');
    });
}
</script>
@endpush
