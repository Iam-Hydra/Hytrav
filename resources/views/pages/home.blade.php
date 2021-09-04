@extends('layouts.app')

@section('title')
    Hytrav
@endsection

@section('content')
<!-- Header -->
<header class="text-center">
    <h1>Explore The Beautiful World
        <br>
        As Easy One Click
    </h1>
    <p class="mt-3">
        You will see beautiful
        <br>
        moment you never see before
    </p>
    <a href="#popular" class="btn btn-mulai px-4 mt-4">
        Get Started
    </a>
</header>

<main>
    <div class="container">
        <section class="section-stats row justify-content-center" id="stats">
            <div class="col-3 col-md-2 stats-detail">
                <h2>20K</h2>
                <p>Members</p>
            </div>
            <div class="col-3 col-md-2 stats-detail">
                <h2>12</h2>
                <p>Countries</p>
            </div>
            <div class="col-3 col-md-2 stats-detail">
                <h2>3K</h2>
                <p>Hotels</p>
            </div>
            <div class="col-3 col-md-2 stats-detail">
                <h2>72</h2>
                <p>Partners</p>
            </div>
        </section>
    </div>

    <!-- Popular -->
    <section class="section-popular" id="popular">
        <div class="container">
            <div class="row">
                <div class="col text-center section-popular-heading">
                    <h2>Popular Tours</h2>
                    <p>Something that you never try
                        <br>
                        before in this world</p>
                </div>
            </div>
        </div>
    </section>

    <!-- popular content -->
    <section class="popular-content" id="popularcont">
        <div class="container">
            <div class="popular-travel row justify-content-center">
                @foreach ($items as $item)
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card-travel text-center d-flex flex-column"
                        style="background-image: url('{{$item->galleries->count() ? Storage::url($item->galleries->first()->image) : '' }} ');">
                        <div class="travel-country">{{$item->location}}</div>
                        <div class="travel-location">{{$item->title}}</div>
                        <div class="travel-btn mt-auto">
                            <a href="{{route('detail', $item->slug)}}" class="btn btn-travel-detail px-4">
                                View Details
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Network -->
    <section class="network" id="network">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h2>Our Networks</h2>
                    <p>Companies are trusted us
                        <br>
                        more than just a trip</p>
                </div>
                <div class="col-md-8 text-center">
                    <img src="frontend/images/partner.png" alt="Logo partner" class="img-partner">
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonial -->
    <section class="testimonial-heading" id="teatihead">
        <div class="container">
            <row>
                <div class="col text-center">
                    <h2>They Are Loving Us</h2>
                    <p>
                        Moments were giving them
                        <br>
                        the best experience
                    </p>
                </div>
            </row>
        </div>
    </section>

    <!-- Testimonial Content -->
    <section class="section-testimonial-content" id="testicount">
        <div class="container">
            <div class="popular-travel row justify-content-center">
                <div class="col-sm-6 col-md-6 col-lg-4">
                    <div class="card card-testi text-center">
                        <div class="testimonial-content">
                            <img src="frontend/images/ponjok.png" alt="user" class="mb-4 rounded-circle">
                            <h3 class="mb-4">Ponjok</h3>
                            <p class="testimonial">
                                “ It was glorious and I could
                                not stop to say wohooo for
                                every single moment
                                Dankeeeeee “
                            </p>
                        </div>
                        <hr>
                        <p class="trip-to mt-2">Trip to Ubud</p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4">
                    <div class="card card-testi text-center">
                        <div class="testimonial-content">
                            <img src="frontend/images/bertok.png" alt="user" class="mb-4 rounded-circle">
                            <h3 class="mb-4">Bertolemius</h3>
                            <p class="testimonial">
                                “ The trip was amazing and
                                I saw something beautiful in
                                that Island that makes me
                                want to learn more “
                            </p>
                        </div>
                        <hr>
                        <p class="trip-to mt-2">Trip to Nusa Penida</p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4">
                    <div class="card card-testi text-center">
                        <div class="testimonial-content">
                            <img src="frontend/images/fateha.png" alt="user" class="mb-4 rounded-circle">
                            <h3 class="mb-4">Fateha</h3>
                            <p class="testimonial">
                                “ I loved it when the waves
                                was shaking harder — I was
                                scared too “
                            </p>
                        </div>
                        <hr>
                        <p class="trip-to mt-2">Trip to Karimun, Jawa</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <a href="#" class="btn btn-help px-4">I Need Help</a>
                    <a href="{{route('register')}}" class="btn btn-started px-4">Get Started</a>
                </div>
            </div>
    </section>
</main>
@endsection
