@extends('layout')
@section('title', 'عرض تفاصيل العرض')

@section('content')
<div style="background-color: #ffffff">
<section>
	<div class="gap-1">
		<div class="container-1">
			<div class="sec-tl text-center">
				<h2 bolde>{{ $offer['title'] }}</h2>
			</div>
		</div>
	</div>
</section>
<section>
	<div class="gap-1 white-layer opc75">
		<div class="fixed-bg" style="background-image: url(../images/parallax3.jpg);"></div>
		<div class="container-1">
			<div class="prayer-timing-wrp">
				<div class="row-1">
					<div class="col-md-12 col-sm-12 col-lg-12">
						<div class="timing-data">
							<div class="prayer-timings text-center">
								<table class="responsive-card-table unstriped">
									<thead>
										<tr>
											<th><span>السكـن بمـكة <br> 07 ليالي</span></th>
											<th><span>السكـن بالمـدينة <br> 04 ليالي</span></th>
											<th><span>السكـن بمـكة <br> 05 ليالي</span></th>
											<th><span>الثنائي</span></th>
											<th><span>الثلاثي</span></th>
											<th><span>الرباعي</span></th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td data-label="السـكن بمـكة">
												<span class="black">{{ $offer['hotel_1']}}
												</span>
											</td>
											<td data-label="السكن بالـمدينة">
												<span class="black">{{ $offer['hotel_2']}}
												</span>
											</td>
											<td data-label="السـكن بمـكة">
												<span class="black">{{ $offer['hotel_1']}}
												
												</span>
											</td>
											<td data-label="الثنائي">
												<span class="black">{{ $offer['prix_12']}}دينار</span>
											</td>
											<td data-label="الثلاثي">
												<span class="black">{{ $offer['prix_13']}}دينار</span>
											</td>
											<td data-label="الرباعي">
												<span class="black">{{ $offer['prix_14']}}دينار</span>
											</td>
										</tr>

										{{-- <tr>
											<td data-label="السـكن بمـكة">
												<span class="black"> {{ $offer['hotel_2']}}
												</span>
											</td>
											<td data-label="السكن بالـمدينة">
												<span class="black">مجموعة وان
													أو ما يعادله<br>
													( بدون وجبات )
												</span>
											</td>
											<td data-label="السـكن بمـكة">
												<span class="black">فندق ضيافة الرجاء
													( بدون وجبات )
												</span>
											</td>
											<td data-label="الثنائي">
												<span class="black">{{ $offer['prix_22']}}دينار</span>
												<a href="{{ route('reservations.create') }}" class="btn btn-primary bt">احجز</a>
											</td>
											<td data-label="الثلاثي">
												<span class="black">{{ $offer['prix_23']}}دينار</span>
												<a href="{{ route('reservations.create') }}" class="btn btn-primary bt">احجز</a>
											</td>
											<td data-label="الرباعي">
												<span class="black">{{ $offer['prix_24']}}دينار</span>
												<a href="{{ route('reservations.create') }}" class="btn btn-primary bt">احجز</a>
											</td>
										</tr>

										<tr>
											<td data-label="السـكن بمـكة">
												<span class="black">{{ $offer['hotel_3']}}
												</span>
											</td>
											<td data-label="السكن بالـمدينة">
												<span class="black">مجموعة وان
													أو ما يعادله<br>
													( بدون وجبات )
												</span>
											</td>
											<td data-label="السـكن بمـكة">
												<span class="black">فندق رمادا دار الفائزين
													( بدون وجبات )
												</span>
											</td>
											<td data-label="الثنائي">
												<span class="black">{{ $offer['prix_32']}}دينار</span>
												<a href="{{ route('reservations.create') }}" class="btn btn-primary bt">احجز</a>
											</td>
											<td data-label="الثلاثي">
												<span class="black">{{ $offer['prix_33']}}دينار</span>
												<a href="{{ route('reservations.create') }}" class="btn btn-primary bt">احجز</a>
											</td>
											<td data-label="الرباعي">
												<span class="black">{{ $offer['prix_34']}}دينار</span>
												<a href="{{ route('reservations.create') }}" class="btn btn-primary bt">احجز</a>
											</td>
										</tr> --}}
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section>
	<div class="gap-1">
		<div class="container-1">
			<div class="sec-tl text-center">
				<h2>تـــواريــــخ الـــســــفـــــر :</h2>
			</div>
		</div>
	</div>
</section>
<section>
	<div class="gap white-layer opc75">
		<div class="fixed-bg" style="background-image: url(../images/parallax3.jpg);"></div>
		<div class="container">
			<div class="prayer-timing-wrp">
				<div class="row-1">
					<div class="col-md-12 col-sm-12 col-lg-12">
						<div class="timing-data">
							<div class="prayer-timings text-center">
								<table class="responsive-card-table unstriped">
									<thead>
										<tr>
											<th><span>الخطوط</span></th>
											<th><span>تاريخ الذهاب</span></th>
											<th><span>مطار الوصول</span></th>
											<th><span>تاريخ العودة</span></th>
											<th><span>السكن بمكة
													08 ليالي
                                                </span></th>
											<th><span>السكن بالمدينة
													04 ليالي
												</span></th>
										</tr>
									</thead>
									<tbody>

										<tr>
											<td data-label="الخطوط"><span class="black">{{ $offer['airport_1']}}</span></td>
											<td data-label="الذهاب"><span class="black">{{ $offer['date_in']}}</span></td>
											<td data-label="مطار الوصول"><span class="black">{{ $offer['airport_2']}}</span></td>
											<td data-label="العودة"><span class="black">{{ $offer['date_out']}}</span></td>
											<td data-label="السكن بمكة"><span class="black">مــــن {{ $offer['date_in']}} إلــــى
												{{ $offer['stay-makh']}}</span></td>
											<td data-label="السكن بالمدينة"><span class="black">مــــن {{ $offer['stay_makh']}} إلــــى
												{{ $offer['stay_madina']}}

												</span></td>
											<td data-label="السكن بمكة"><span class="black">مــــن {{ $offer['stay_madina']}} إلــــى
												{{ $offer['date_out']}}</span></td> 
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<div class="gap-2">
	<div class="container-1">
		<div class="team-detail-wrp">
			<div class="team-detail-inr">
				<div class="row-1">
					<div class="col-md-8 col-sm-8 col-lg-8">
						<div class="team-member-name">
							<h3 itemprop="headline">البرنامج يشمل :</h3>
						</div>
						<div class="team-detail-inf">
							<div class="member-cnt">
								<ul class="member-expr-lst">
									<li>تـــــذكرة الطـــائرة ذهــابا وإيــابـا  على مثن الخطوط الجزائرية الى مطار جدة</li>
									<li>الإقامة بالفنادق المذكورة مع التنقلات مع مزارات المدينة.</li>
									<li>التأشيرة.</li>
									<li>التنقلات داخل المملكة العربية السعودية بواسطة باصات.</li>
									<li>التأطير و المساعدة من طرف أطر الوكالة طيلة مدة البرنامج.</li>
								</ul>
							</div>
						</div>
						<div class="team-member-name">
							<h3 itemprop="headline">وثائق التسجيل:</h3>
						</div>
						<div class="team-detail-inf">
							<div class="member-cnt">
								<ul class="member-expr-lst">
									<li>جواز سفر لا تقل صلاحيته عن 8 أشهر.</li>
									<li>للمزيد من المعلومات المرجو الإتصال بالسيدة ...... : 0661.18.93.73</li>
									<li>للمزيد من المعلومات المرجو الإتصال بالسيدة ...... : 0661.22.10.72</li>
								</ul>
							</div>
						</div>
					</div>
					
				</div>
				@if(auth::check())
				<a href="{{ route('reservations.create', ['offer_id' => $offer->id]) }}" class="btn btn-primary">احجز الآن</a>
				@else
					<a href="{{ route('register') }}" class="btn btn_reservation"> للحجز عليك التسجيل !! </a>
				@endif
			</div>
		</div>
	</div>
</div>
</div>
</div> 

@endsection