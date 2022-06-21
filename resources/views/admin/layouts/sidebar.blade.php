<nav class="navbar navbar-light bg-light fixed-top">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    {{-- <a class="navbar-brand" href="#">پنل مدیریتی</a> --}}
    
    <div class="offcanvas offcanvas-end col-lg-3" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">پنل مدیریتی</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/panel"><i class="fa fa-home"></i>
              صفحه اصلی</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('users.index')}}"><i class="fa fa-user" aria-hidden="true"></i>
              مدیریت کاربران</a>
          </li>
          <li class="nav-item">
            <a href="{{route('categories.index')}}" class="nav-link">
              <i class="fa fa-list" aria-hidden="true"></i>
              دسته بندی
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('products.index')}}" class="nav-link">
              <i class="fab fa-product-hunt" aria-hidden="true"></i>
              محصولات
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('comments.index')}}" class="nav-link">
              <i class='far fa-comments' aria-hidden="true"></i>
              نظرات
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
                <i class='fas fa-shopping-cart' aria-hidden="true"></i>
                سفارشات 
            </a>
          </li>
        </ul>

      </div>
    </div>
  </div>
</nav>
