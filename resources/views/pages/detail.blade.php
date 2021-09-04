@extends('layouts.app')
@section('title', 'Detail Travel')

@section('content')
<main>

    <section class="detail-header"></section>
    <section class="detail-content">
        <div class="container">
            <div class="row">
                <div class="col p-0">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"> Paket Travel</li>
                            <li class="breadcrumb-item active"> Details</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 pl-0">
                    <div class="card card-detail">
                        <h1>{{$item->title}}</h1>

                        <p>{{$item->location}}</p>

                        @if ($item->galleries->count())
                        <div class="galery">
                            <div class="xzoom-container">
                                <img class="xzoom"
                                        id="xzoom-default"
                                        src="{{Storage::url($item->galleries->first()->image)}}"
                                    xoriginal="{{Storage::url($item->galleries->first()->image)}}" />
                                <div class="xzoom-thumbs">
                                    @foreach ($item->galleries as $gallery)
                                    <a href="{{Storage::url($gallery->image)}}">
                                        <img class="xzoom-gallery" width="128"
                                        src="{{Storage::url($gallery->image)}}"
                                        xpreview="{{Storage::url($gallery->image)}}" /></a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @endif

                        <h2>About Destination</h2>
                        <p>{!! $item->about !!}</p>

                        <div class="feat row">
                            <div class="col-md-4">
                                <img src="{{url('frontend/images/f1.png')}}" alt="" class="feat-img ">
                                <div class="deskripsi">
                                    <h3>Featured Event</h3>
                                    <p>{{$item->featured_event}}</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <img src="{{url('frontend/images/f2.png')}}" alt="" class="feat-img ">
                                <div class="deskripsi">
                                    <h3>Language</h3>
                                    <p>{{$item->language}}</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <img src="{{url('frontend/images/f3.png')}}" alt="" class="feat-img ">
                                <div class="deskripsi">
                                    <h3>Traditional Foods</h3>
                                    <p>{{$item->foods}}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-4">
                    <div class="card card-detail card-right">
                        <h2>Members are Going</h2>
                        <div class="members my-2">
                            <img src="{{url('frontend/images/m1.png')}}" class="member-img" />
                            <img src="{{url('frontend/images/m2.png')}}" class="member-img" />
                            <img src="{{url('frontend/images/m3.png')}}" class="member-img" />
                            <img src="{{url('frontend/images/m4.png')}}" class="member-img" />
                            <img src="{{url('frontend/images/m5.png')}}" class="member-img" />

                        </div>
                        <hr>
                        <h2>Trip Informations</h2>
                        <table class="trip-informations">
                            <tr>
                                <th width="50%">Date of Departure</th>
                                <td width="50%" class="text-right">
                                    {{ \Carbon\Carbon::create($item->date_of_departure)->format('F n, Y') }}
                                </td>
                            </tr>
                            <tr>
                                <th widht="50%">Duration</th>
                                <td widht="50%" class="text-right">{{$item->duration}}</td>
                            </tr>
                            <tr>
                                <th widht="50%">Type</th>
                                <td widht="50%" class="text-right">{{$item->type}}</td>
                            </tr>
                            <tr>
                                <th widht="50%">Price</th>
                                <td widht="50%" class="text-right">${{$item->price}},00 / person</td>
                            </tr>
                        </table>
                    </div>


                    <div class="join-container">
                        @auth
                        <form action="{{ route('checkout-process', $item->id) }}" method="post">
                            @csrf
                            <button class="btn btn-block btn-join mt-3 py-2" type="submit">
                                Join Now
                            </button>
                        </form>
                        @endauth
                        @guest
                            <a href="{{ route('login') }}" class="btn btn-block btn-join mt-3 py-2">
                                Login or Register to Join
                            </a>
                        @endguest
                    </div>


                </div>
            </div>
    </section>
</main>
@endsection

@push('prepend-style')
<link rel="stylesheet" href="{{url('frontend/libraries/xzoom/dist/xzoom.css')}}">
@endpush

@push('addon-script')
<script src="{{url('frontend/libraries/xzoom/dist/xzoom.min.js')}}"></script>
<script>
    $(document).ready(function () {
        $('.xzoom, .xzoom-gallery').xzoom({
            zoomWidth: 500,
            title: false,
            tint: '#333',
            Xoffset: 15
        });
    });

</script>
@endpush
