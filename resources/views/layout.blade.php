<!DOCTYPE html>
<html dir="rtl" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="https://scontent.fogx1-1.fna.fbcdn.net/v/t39.30808-6/316541285_129037063300324_5412570035277399260_n.jpg?_nc_cat=104&ccb=1-7&_nc_sid=5f2048&_nc_ohc=8-66ZkO-m70Ab7gEt1_&_nc_ht=scontent.fogx1-1.fna&oh=00_AfBGFRkgfXgI6izbAMKeH172p_Fv5xh8NeQNS_8BxughUg&oe=66152935">
        <title>@yield('title')</title>
        <!-- Bootstrap CSS -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <!-- Styles -->
        <style>
            html{line-height:1.15;-webkit-text-size-adjust:100%}
            body{margin:0}
            a{background-color:transparent}
            [hidden]{display:none}
            html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}
            *,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}
            a{color:inherit;text-decoration:inherit}
            svg,video{display:block;vertical-align:middle}
            video{max-width:100%;height:auto}
            .bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}
            .bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}
            .border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}
            .border-t{border-top-width:1px}
            .flex{display:flex}
            .grid{display:grid}
            .hidden{display:none}
            .items-center{align-items:center}
            .justify-center{justify-content:center}
            .font-semibold{font-weight:600}
            .h-5{height:1.25rem}
            .h-8{height:2rem}
            .h-16{height:4rem}
            .text-sm{font-size:.875rem}
            .text-lg{font-size:1.125rem}
            .leading-7{line-height:1.75rem}
            .mx-auto{margin-left:auto;margin-right:auto}
            .ml-1{margin-left:.25rem}
            .mt-2{margin-top:.5rem}
            .mr-2{margin-right:.5rem}
            .ml-2{margin-left:.5rem}
            .mt-4{margin-top:1rem}
            .ml-4{margin-left:1rem}
            .mt-8{margin-top:2rem}
            .ml-12{margin-left:3rem}
            .-mt-px{margin-top:-1px}
            .max-w-6xl{max-width:72rem}
            .min-h-screen{min-height:100vh}
            .overflow-hidden{overflow:hidden}
            .p-6{padding:1.5rem}
            .py-4{padding-top:1rem;padding-bottom:1rem}
            .px-6{padding-left:1.5rem;padding-right:1.5rem}
            .pt-8{padding-top:2rem}
            .fixed{position:fixed}
            .relative{position:relative}
            .top-0{top:0}
            .right-0{right:0}
            .shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}
            .text-center{text-align:center}
            .text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}
            .text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}
            .text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}
            .text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}
            .text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}
            .text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}
            .text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}
            .underline{text-decoration:underline}
            .antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}
            .w-5{width:1.25rem}
            .w-8{width:2rem}
            .w-auto{width:auto}
            .grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}
            @media (min-width:640px){
                .sm\:rounded-lg{border-radius:.5rem}
                .sm\:block{display:block}
                .sm\:items-center{align-items:center}
                .sm\:justify-start{justify-content:flex-start}
                .sm\:justify-between{justify-content:space-between}
                .sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}
                .sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}
                .sm\:pt-0{padding-top:0}
                /* .sm\:text-left{text-align:left} */
                .sm\:text-right{text-align:right}
            }
                @media (min-width:768px){
                    .md\:border-t-0{border-top-width:0}
                    .md\:border-l{border-left-width:1px}
                    .md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}
                }
                    @media (min-width:1024px){
                        .lg\:px-8{padding-left:2rem;padding-right:2rem}
                    }
                    @media (prefers-color-scheme:light){
                        .dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}
                        .dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}
                        .dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}
                        .dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}
                        .dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}
                        .dark\:text-gray-500{--tw-text-opacity:1;color:#6b7280;color:rgba(107,114,128,var(--tw-text-opacity))}
                    }
        </style>
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    </head>
    <body class="antialiased">
        <div class="home">
            <section @if(Request::is('/')) 
                        class="homepageheader" 
                    @endif >
                <!-- Navigation Bar -->
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="container">
                        <!-- Toggle button for small screens -->
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        
                        <!-- Navbar links -->
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <!-- Right-aligned items -->
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item active">
                                    <a class="nav-link" href="{{ route('home.index') }}" >الرئيسية<span class="sr-only">(الصفحة الحالية)</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('offers.index') }}">عروض العمرة</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('home.about') }}">دليل العمرة</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('contacts.create') }}">اتصل بنا</a> 
                                </li>
                            </ul>
                            <!-- Center-aligned items -->
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item dropdown">
                                    @guest
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            تسجيل الدخول / التسجيل
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('login') }}">تسجيل الدخول</a>
                                            <a class="dropdown-item" href="{{ route('register') }}">اٍنشاء حساب جديد</a>
                                        </div>
                                    @else
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            {{ Auth::user()->name }} <i class="fa-light fa-user"></i>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            @if(Route::has('login'))
                                                @auth
                                                    @if (Auth::user()->utype === 'ADM')
                                                        <a class="nav-link" href="{{ route('offers.create') }}">اضافة عرض</a>
                                                        <a class="nav-link" href="{{ route('reservations.index') }}">قائمة الطلبات</a>
                                                        <a class="nav-link" href="{{ route('admin.index') }}">صفحتي</a>
                                                    @else
                                                        <a class="nav-link" href="{{ route('user.index') }}">صفحتي</a>
                                                    @endif
                                                @endauth
                                            @endif
                                            <a class="dropdown-item no-underline hover:underline" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                                خروج  
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                                {{ csrf_field() }}
                                            </form>
                                        </div>
                                    @endguest    
                                </li>
                            </ul>
                        </div>

                    </div>
                </nav>
                
                <div class="">
                    @yield('container') 
                </div>

            </section>

            <!-- main -->
            <div class="content-page">
                @yield('content')
            </div>
            <!-- end main -->

            
            <!-- Footer -->
            <footer class="footer">
                <div class="container">
                    <div class="footer-content">
                        <p class="text-footer">
                            نحن نسخر خبراتنا ومواردنا لتوفير أفضل الاختيارات وابتكار أفضل الحلول لتيسير أداء المناسك وتحسين ظروف السفر والإقامة للحفاظ على ذهن صاف وقلب مطمئن
                        </p>
                        <p>عنوان الشركة xxxxxxx</p>
                        <p>رقم الهاتف: 123456789</p>
                        <!-- Social media icons -->
                        <div class="footer-social-icons">
                            <a href="#" target="_blank"><i class="fab fa-facebook"></i></a>
                            <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
                            <a href="#" target="_blank"><i class="fab fa-youtube"></i></a>
                            <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
                            <!-- Add more social media icons as needed -->
                        </div>
                    </div>
                </div>
            </footer>
            <!--End Footer -->
        </div>    
        <script src="{{ asset('./js/script.js') }}"></script>
        <!-- Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <!-- Font Awesome -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

        


{{-- <script>

document.getElementById('approveBtn').addEventListener('click', function() {
    // Create a new page content
    var pageContent = `
        <h1>Welcome to My Page</h1>
        <p>This is some content of the page...</p>
        <p>Feel free to add any content you like!</p>
    `;

    // Get the content container
    var contentContainer = document.getElementById('contentContainer');

    // Replace the content with the new page content
    contentContainer.innerHTML = pageContent;
});

document.getElementById('rejectBtn').addEventListener('click', function() {
    // Create a new page content
    var pageContent = `
        <h1>Welcome to My Page 2</h1>
        <p>This is some content of the page...</p>
        <p>Feel free to add any content you like!</p>
    `;

    // Get the content container
    var contentContainer = document.getElementById('contentContainer');

    // Replace the content with the new page content
    contentContainer.innerHTML = pageContent;
});

document.getElementById('imageInput').addEventListener('change', function(event) {
    var file = event.target.files[0];
    var downloadButton = document.getElementById('downloadButton');
    
    if (file && file.type.startsWith('image/')) {
        downloadButton.disabled = false;
        downloadButton.addEventListener('click', function() {
            var imageUrl = URL.createObjectURL(file);
            var a = document.createElement('a');
            a.href = imageUrl;
            a.download = 'image.png';
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
            URL.revokeObjectURL(imageUrl);
        });
    } else {
        downloadButton.disabled = true;
        alert('Please select an image file.');
    }
});
</script> --}}

    </body>
</html>
 