@extends('layouts.app')

@section('content')
{{-- SLIDE IMAGE --}}
<div class="slideshow-container">
    <div class="mySlides fade">
        <img src="{{ asset('images/slide/slide1.jpg') }}">
    </div>

    <div class="mySlides fade">
        <img src="{{ asset('images/slide/slide2.jpg') }}">
    </div>
    <div class="mySlides fade">
        <img src="{{ asset('images/slide/slide3.jpg') }}">
    </div>
    <div class="search">
        <p>Hôm nay ăn gì?</p>
        <form action="" method="get" accept-charset="utf-8">
            <input type="text" class="form-control border-radius" name="" placeholder="Hom nay an gi?">
        </form>
    </div>

    <div class="text">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    </div>
</div>
<br>
<div style="text-align:center">
    <span class="dot" onclick="currentSlide(0)"></span> 
    <span class="dot" onclick="currentSlide(1)"></span> 
    <span class="dot" onclick="currentSlide(2)"></span> 
</div>
<!-- END SLIDE IMAGES -->

{{-- MEMBER RECIPE --}}
<div class="member-recipe container">
    <div class="row">
        <div class="items col-md-8">
            <h3>Công thức của các thành viên</h3>
            @foreach ($recipes as $recipe)
                <div class="col-md-4 item">
                    <div class="inner_item">
                        <div class="image">
                            <a href="/recipes/{{ $recipe->id }}">
                                <img src="{{ asset($recipe->avatar) }}" alt="">
                            </a>
                        </div>
                        <div class="content-items">
                            <p><b>{{ $recipe->name }}</b></p>
                            <p>
                                <span class="text-pale">{{ $recipe->diffculty }}</span>
                                | <span class="text-pale">{{ $recipe->materials->main_material }}</span>
                            </p>
                            <p class="text-pale">Công thức bởi: <b>{{ $recipe->created_by }}</b></p>
                        </div>
                        <div class="likes-number">
                            <span><i class="fa fa-thumbs-o-up" aria-hidden="true"> {{ count($recipe->likes) }}</i></span>
                            <span><i class="fa fa-clock-o" aria-hidden="true"></i> {{ $recipe->time }}</span>
                        </div>
                        <div class="vote">
                            <span><i class="fa fa-star color-yellow" aria-hidden="true"> {{ number_format($recipe->average, 1, ",","") }}</i></span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- TOP MEMBER --}}
        <div class="col-md-4">
            <div class="top-member">
                <h3>Top thành viên</h3>
                @foreach ($users as $user)
                    <div class="row inner-top-member">
                        <div class="col-md-3 col-md-offset-1 avatar">
                            <img src="{{ $user->avatar }}" alt="">
                        </div>
                        <div class="col-md-8 content">
                            <b>{!! $user->name !!}</b><br>
                            <span>Số lượng quan tâm: {{ count($user->cares) }}</span><br>
                            <span>Số lượng công thức: {{ count($user->recipe) }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="see-more">
                <a href="#">Xem thêm</a>
            </div>
        </div>
        {{-- END TOP MEMBER --}}
    </div>
</div>
{{-- END MEMBER RECIPE --}}

{{-- ADMIN RECIPE --}}
<div class="member-recipe container">
    <div class="row">
        <div class="items">
            <h3>Công thức của CRecipe</h3>
            @foreach ($recipes as $recipe)
                <div class="col-md-3 item">
                    <div class="inner_item">
                        <div class="image">
                            <a href="/recipes/{{ $recipe->id }}">
                                <img src="{{ asset($recipe->avatar) }}" alt="">
                            </a>
                        </div>
                        <div class="content-items">
                            <p><b>{{ $recipe->name }}</b></p>
                            <p>
                                <span class="text-pale">{{ $recipe->diffculty }}</span>
                                | <span class="text-pale">{{ $recipe->materials->main_material }}</span>
                            </p>
                            <p class="text-pale">Công thức bởi: <b>{{ $recipe->created_by }}</b></p>
                        </div>
                        <div class="likes-number">
                            <span><i class="fa fa-thumbs-o-up" aria-hidden="true"> {{ count($recipe->likes) }}</i></span>
                            <span><i class="fa fa-clock-o" aria-hidden="true"></i> {{ $recipe->time }}</span>
                        </div>
                        <div class="vote">
                            <span><i class="fa fa-star color-yellow" aria-hidden="true"> {{ number_format($recipe->average, 1, ",","") }}</i></span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
{{-- END ADMIN RECIPE --}}

{{-- advertisement --}}
<div clas="advertisement">
    <div class="container">
        <div class="inner-advertisement">
            <a href="#">
                <img src="{{ asset('images/slide/poster.png') }}" alt="">
            </a>
        </div>
    </div>
</div>
{{-- END advertisement --}}

{{-- BLOG --}}
<div class="member-recipe container">
    <div class="row">
        <div class="items">
            <h3>Blog</h3>
            @foreach ($recipes as $recipe)
                <div class="col-md-3 item">
                    <div class="inner_item">
                        <div class="image">
                            <a href="/recipes/{{ $recipe->id }}">
                                <img src="{{ asset($recipe->avatar) }}" alt="">
                            </a>
                        </div>
                        <div class="content-items">
                            <p><b>{{ $recipe->name }}</b></p>
                            <p>
                                <span class="text-pale">{{ $recipe->diffculty }}</span>
                                | <span class="text-pale">{{ $recipe->materials->main_material }}</span>
                            </p>
                            <p class="text-pale">Công thức bởi: <b>{{ $recipe->created_by }}</b></p>
                        </div>
                        <div class="likes-number">
                            <span><i class="fa fa-thumbs-o-up" aria-hidden="true"> {{ count($recipe->likes) }}</i></span>
                            <span><i class="fa fa-clock-o" aria-hidden="true"></i> {{ $recipe->time }}</span>
                        </div>
                        <div class="vote">
                            <span><i class="fa fa-star color-yellow" aria-hidden="true"> {{ number_format($recipe->average, 1, ",","") }}</i></span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
{{-- END BLOG --}}
<script>
  //khai báo biến slideIndex đại diện cho slide hiện tại
  var slideIndex;
  // KHai bào hàm hiển thị slide
  function showSlides() {
      var i;
      var slides = document.getElementsByClassName("mySlides");
      var dots = document.getElementsByClassName("dot");
      for (i = 0; i < slides.length; i++) {
         slides[i].style.display = "none";
      }
      for (i = 0; i < dots.length; i++) {
          dots[i].className = dots[i].className.replace(" active", "");
      }

      slides[slideIndex].style.display = "block";
      dots[slideIndex].className += " active";
      //chuyển đến slide tiếp theo
      slideIndex++;
      //nếu đang ở slide cuối cùng thì chuyển về slide đầu
      if (slideIndex > slides.length - 1) {
        slideIndex = 0
      }
      //tự động chuyển đổi slide sau 5s
      setTimeout(showSlides, 5000);
  }
  //mặc định hiển thị slide đầu tiên
  showSlides(slideIndex = 0);

  function currentSlide(n) {
    showSlides(slideIndex = n);
  }
</script>
@endsection
