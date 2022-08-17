<header>
    <div class="top bg-light text-center container-fluid">
        <div class="row">
            <div class="col-lg-4"></div>
            <div class="col-lg-4 title">
                <p class="p-2 text-center">ｓｈｏｐ</p>
            </div>

            <div class="col-lg-4">
                <form class="d-flex col-lg-7 search pt-2" action="/search">
                    <input class="form-control me-2" type="search" placeholder="جستجو کنید" aria-label="Search" name="search" value="{{request()->search ?? ''}}">
                    
                    <button class="btn btn-outline-success" type="submit"><i class="fa fa-search" aria-hidden="true"></i>
                    </button>
                  </form>
            </div>
            
        </div>

       
    

  <div class="d-flex align-items-center">
    <i class="fab fa-whatsapp icon" aria-hidden="true"></i>
    <i class="fab fa-instagram icon" aria-hidden="true"></i>

    <nav class="navbar navbar-expand-lg navbar-light bg-light container-fluid">
        
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse menu" id="navbarNav">
            
            <ul class="navbar-nav" style="padding-right: 0; margin-right: 5%;">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('index')}}" {{request()->is('/') ? 'class=faal' : ''}}>صفحه اصلی</a>
              </li>

              @foreach ($categories as $category)
              <li class="nav-item">
                <a class="nav-link active" href="{{route('category.show',$category->slug)}}" {{request()->is('/category/{category:slug}') ? 'class=faal' : ''}}>{{$category->name}}</a>
              </li> 
              @endforeach

              @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}" {{request()->is('/login') ? 'class=faal' : ''}}>{{ __('ورود') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}" {{request()->is('/register') ? 'class=faal' : ''}}>{{ __('ثبت نام') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end text-center" aria-labelledby="navbarDropdown">

                            @if (Auth::user()->superuser())
                            <a href="{{route('panel')}}" class="dropdown-item">پنل مدیریت</a>
                            @endif
                        
                            <a class="dropdown-item" href="{{ route('profile') }}">
                              {{ __('پروفایل کاربری') }}
                            </a>

                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('خروج') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest 
              
            </ul>
          </div>
        </nav>
          <div class="col-lg-1">
            <i class="fa fa-shopping-cart icon2" aria-hidden="true"></i>

            <a type="button" href="{{route('login')}}" class="text-dark" data-toggle="tooltip" data-placement="bottom" title="ورود">
              <i class="fa fa-user icon2" aria-hidden="true"></i>
            </a>
            {{-- <a href="{{route('login')}}" class="text-dark">
              <i class="fa fa-user icon2" aria-hidden="true"></i>
            </a> --}}
          </div>
        </div>
     
    </div>
      
</header>



