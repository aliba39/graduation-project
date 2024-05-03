@extends('layout')

{{-- @section('')
<div class="headerhome-content">
    <div class="allthem">
        <div class="them">
            <h1 itemprop="headline" > عروض العمرة</h1>
        </div>
    </div>

</div>
@endsection  --}}

@section('title', 'عروض العمرة')
@section('content')

<section class="section">
    <div class="gap">
        <div class="container">
            <h1 class="page-title">عروض العمرة</h1>
            <div class="offers">
                @foreach ($offers as $offer)
                <div class="col-md-4 col-md-4 col-lg-4 ">
                    <div class="cause-box ">
                        <div class="cause-thmb">
                            <a  href="{{route('offers.show', ['offer' => $offer['id']])}}" title="" itemprop="url">
                                <img src="{{ $offer['image']}}" class="image-hajj">
                            </a>
                        </div>
                        <div class="cause-inf">
                            <h5 itemprop="headline">
                                <a href="{{route('offers.show', ['offer' => $offer['id']])}}" title="" itemprop="url">{{ $offer['title']}}</a>
                            </h5>
                            <ul class="pst-mta">
                                <li><i class="far fa-calendar-alt theme-clr"></i> السعر يشمل :</li>
                            </ul>
                            <p>{{ $offer['description']}}</p>
                            <div class="prg-wrp">
                                <div class="progress brd-rd5">
                                    <div class="progress-bar w100 theme-bg">
                                        <span class="brd-rd50 theme-bg"><a href="{{route('offers.show', ['offer' => $offer['id']])}}">المزيد</a></span>
                                    </div>
                                </div>
                                <span>
                                    ابتداء من                                        <i class="theme-clr">{{ $offer['prix_12']}}</i>
                                </span>
                            </div>
                        </div>
                    </div>
                    @if(Route::has('login'))
                        @auth
                            @if (Auth::user()->utype === 'ADM')
                                <div class="tools">
                                    <a class="btn btn-secondary" href="{{route('offers.edit', $offer->id)}}">تعديل</a>
                                    <form action="{{route('offers.destroy', $offer->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input class="btn btn-danger" type="submit" value="حذف">
                                    </form>
                                </div>
                            @endif
                        @endauth
                    @endif
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection

