@extends('layouts.layout')
@section('content')
@section('title', 'حجز العرض')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">حجز تذكرة</div>

                <div class="card-body">
                    <form action="{{route('reservations.store')}}" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
                        @csrf
                        @method('POST')

                        <div class="form-group row">
                            <label for="first_name" class="col-md-4 col-form-label text-md-right">الاسم الشخصي</label>
                            <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autofocus>
                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="family_name" class="col-md-4 col-form-label text-md-right">الاسم العائلي</label>
                            <div class="col-md-6">
                                <input id="family_name" type="text" class="form-control @error('family_name') is-invalid @enderror" name="family_name" value="{{ old('family_name') }}" required>
                                @error('family_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone_number" class="col-md-4 col-form-label text-md-right">رقم الهاتف</label>
                            <div class="col-md-6">
                                <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" required>
                                @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">العنوان</label>
                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required>
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="city" class="col-md-4 col-form-label text-md-right">المدينة</label>
                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" required>
                                @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="country" class="col-md-4 col-form-label text-md-right">البلد</label>
                            <div class="col-md-6">
                                <input id="country" type="text" class="form-control @error('country') is-invalid @enderror" name="country" value="{{ old('country') }}" required>
                                @error('country')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="country" class="col-md-4 col-form-label text-md-right">اختار نوع العرض</label>
                            <div class="col-md-6">
                                <select name="offer_type" id="offer_type" class="form-control @error('offer_type') is-invalid @enderror" required>
                                    <option value="" required>الرجاء الاختيار</option>
                                    <option value="{{ $offer->prix_12 }}">ثنائي</option>
                                    <option value="{{ $offer->prix_13 }}">ثلاثي</option>
                                    <option value="{{ $offer->prix_14 }}">رباعي</option>
                                </select>
                                @error('offer_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="number_people" class="col-md-4 col-form-label text-md-right">عدد الأشخاص</label>
                            <div class="col-md-6">
                                <input id="number_people" type="text" class="form-control @error('number_people') is-invalid @enderror" name="number_people" value="{{ old('number_people') }}" required>
                                @error('number_people')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="passport" class="col-md-4 col-form-label text-md-right">Upload passport:</label>
                            <div class="col-md-6">
                                <input type="file" name="passport" >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="birth_certificate" class="col-md-4 col-form-label text-md-right">Upload birth_certificate:</label>
                            <div class="col-md-6">
                                <input type="file" name="birth_certificate" >
                            </div>
                        </div>

                        <input type="hidden" name="offer_id" value="{{ $offer_id }}"> 

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#termsModal">
                                    عرض الشروط والأحكام
                                </button>
                                <button type="submit" class="btn btn-primary" id="submitBtn" disabled>
                                    ارسال
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="termsModal" tabindex="-1" role="dialog" aria-labelledby="termsModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="termsModalLabel">شروط وأحكام الحجز</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h4>سياسة البيع والإلغاء والاسترجاع</h4>
                <p>نحيطكم علماً بأن طرق الدفع المتاحة هي:</p>
                <ul>
                    <li>PayPal: نتصل بـ PayPal حيث يجب تسجيل الدخول بحسابك لإتمام الدفع. نوصي بالدفع عبر PayPal لكونه من أكثر وسائل الدفع أماناً.</li>
                </ul>
                <ul>
                    <li>يجب على الحاج أن يكون بصحة جيدة ولا يعاني من أي أمراض معدية أو مزمنة.</li>
                    <li>يجب على الحاج الاستعداد النفسي والبدني لأداء العبادات براحة وسلامة.</li>
                    <li>يجب على الحاج أن يلتزم بالتوجهات والتعليمات الصحية والأمنية خلال الرحلة وأثناء الأداء.</li>
                    <li>تخضع جميع الحجوزات للتأكيد والتوافق مع قوانين الحج والعمرة.</li>
                </ul>
                <p>1. السعر:</p>
                <ul>
                    <li>يشمل السعر تكلفة النقل ذهاباً وإياباً عند تضمين هذه الخدمة في العرض المتعاقد عليه، والإقامة، والضرائب، والدعم الفني خلال الرحلة، وأي خدمات أخرى مذكورة في العرض.</li>
                    <li>لا يشمل السعر: التأشيرات، الضرائب، شهادات التطعيم، المشروبات، الخدمات الاختيارية، إلخ.</li>
                    <li>إعادة النظر في الأسعار: قد يخضع السعر للتعديل بناءً على تغيرات أسعار الصرف، أسعار النقل، تكلفة الوقود، والضرائب. سيتم إشعار المستهلك بأي تغييرات كتابياً.</li>
                </ul>
                <p>2. طريقة الدفع والتسجيل والاسترداد:</p>
                <ul>
                    <li>يجب دفع كامل مبلغ الرحلة قبل إرسال الوثائق وقبل تاريخ المغادرة المحدد.</li>
                    <li>تعتبر عملية شراء أي منتج فعالة فقط عند تحميل المبلغ على البطاقة أو استلام التحويل.</li>
                    <li>في حالة رفض البطاقة الائتمانية لأي سبب، قد يتم إلغاء الحجز دون إشعار مسبق.</li>
                    <li>تتضمن طلبات الحجز التزاماً من المستهلك بالسماح بتحميل المبلغ على البطاقة أو الحساب المصرفي المقدم.</li>
                </ul>
                <p>3. تعديل أو إلغاء الحجز من قبل المستهلك:</p>
                <ul>
                    <li>يمكن للمستهلك إلغاء الخدمات في أي وقت، ويحق له استرداد المبالغ المدفوعة، لكنه يجب أن يعوض المنظم بمبلغ يتناسب مع الفترة المتبقية قبل الرحلة.</li>
                </ul>
                <p>4. تحويل الحجز:</p>
                <ul>
                    <li>يمكن للمستهلك تحويل الحجز لشخص آخر مع تحمل المسؤولية التضامنية عن تكلفة الرحلة والنفقات الإضافية الناتجة عن التحويل.</li>
                </ul>
                <p>5. تعديل أو إلغاء الرحلة من قبل المنظم:</p>
                <ul>
                    <li>إذا كان يجب على المنظم تعديل أو إلغاء الرحلة قبل المغادرة، يحق للمستهلك استرداد كامل المبالغ المدفوعة أو قبول تعديل العقد بما في ذلك التغيرات السعرية.</li>
                    <li>في حالة إلغاء الرحلة، يحق للمستهلك استرداد المبالغ المدفوعة أو الحصول على رحلة بديلة.</li>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                <button type="button" class="btn btn-primary" onclick="agreeTerms()">موافق</button>
            </div>
        </div>
    </div>
</div>

<script>
    function agreeTerms() {
        // Add any code to execute upon agreeing to the terms and conditions
        alert("تم الموافقة على الشروط والأحكام.");
        document.getElementById('submitBtn').disabled = false;
    }

    function validateForm() {
        if (document.getElementById('submitBtn').disabled) {
            alert("الرجاء الموافقة على الشروط والأحكام أولاً.");
            return false;
        }
        return true;
    }
</script>
@endsection
