@extends('layout')
@section('title', 'الصفحة الرئيسية') 

@section('container')
<div class="headerhome-content">
    <div class="allthem">
        <div class="them">
            <h1 itemprop="headline">برامج الحج و العمرة<br> لموسم : 1445 هـ 2024 م</h1>
        </div>
    </div>

    <div class="callactions">
        <a href="" class="ordernow">تفاصيل العرض</a>
        <a href="{{ route('offers.index') }}" class="ordernow">جميع العروض</a>
    </div>
</div>
@endsection 

@section('content')
<div style="background-color: #000000;">
<section class="offers-and-abouts">
    <div class="about-umrah-travel sectionp">
        <div class="container">
            <h4 class="heading-s2">
                <span>مرحبا بك في</span>
                وكالة عبد الحميد للسفر والسياحة  
            </h4>
            <div class="about-umrah-travel__text">
                <p>عمرة هو موقع تسويق خدمات العمرة لوكالة عبد الحميد ترافل للسفر والسياحة، والتي بدورها هي شركة رائدة مرخّصة لتقديم الخدمات السياحية مقرها في قمار ولاية الوادي بالجزائر  تديرها مجموعة محترفة تعتني بالتفاصيل الدقيقة وأولويتها راحة الزبون ورضاه. يأتي موقع عمرة لتقديم خدمة كاملة للمعتمرين تتميّز بالجودة والحرص على كلّ الأمور الدقيقة حتى يستطيع المعتمر التركيز على أداء مناسكه دون الاهتمام بالقضايا الثانوية.</p>
            </div>
        </div>
    </div>
</section>
<section class="why-umrah sectionp">

    <div class="container">

        <h4 class="heading-s2">
            <span>لماذا</span>
            العمرة معنا 
        </h4>

        <div class="why-umrah__section">

            <div class="why-umrah__section-item" style="background-image:url('../images/umbrella-muhammed-mosq.jpg')">
                <div class="why-umrah__section-txt">
                    <h3>الحرص على السنة</h3>
                    <p>العمرة على ضوء ما ثبت عن المصطفى صلى الله عليه وسلم</p>
                </div>
            </div>

            <div class="why-umrah__section-item" style="background-image:url('../images/hotels-uk.jpg')">
                <div class="why-umrah__section-txt">
                    <h3>العمرة بنفسية مرتاحة</h3>
                    <p>نتكلف بخدمتكم من الإنطلاق وحتى الرجوع للديار&nbsp;</p>
                </div>
            </div>

            <div class="why-umrah__section-item" style="background-image:url('../images/778.jpg')">
                <div class="why-umrah__section-txt">
                    <h3>العمرة برفقة مرشد مختص</h3>
                    <p>حتى تكون عمرتكم صحيحة ستكونون برفقة خيرة المرشدين</p>
                </div>
            </div>

            <div class="why-umrah__section-item" style="background-image:url('../images/bus2.jpg')">
                <div class="why-umrah__section-txt">
                    <h3>وسائل نقل مريحة</h3>
                    <p>وسائل نقل مريحة وبجودة عالية من وإلى المطار</p>
                </div>
            </div>
        </div>
    </div>
</section>
</div>
@endsection