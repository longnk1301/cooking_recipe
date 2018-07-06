@extends('layouts.app')
@section('content')
<div class="container-fluid warpper-detail">
		<div class="col-md-2 user">
			<div class="inner-user">
				<div class="row avatar">
					<img src="{{ asset($created_by->avatar) }}" alt="">
				</div>
				<div class="row user-info">
					{{ $created_by->name }}
					<p>Số công thức: {{ count($recipe_number) }} <i class="fa fa-cutlery color-rate" aria-hidden="true"></i></p>
				</div>
			</div>
			<div class="like-and-care">
				<div class="inner">
					<button type="button" class="care-number" data-id="{{ $created_by->id }}">
						<i class="fa fa-heart fa-3x text-danger"  aria-hidden="true"></i>
						<span id="cares">{{ count($cares) }}</span>
					</button>
					<button type="button" class="like-number" data-id="{{ $recipe->id }}">
						<i class="fa fa-thumbs-o-up fa-3x text-primary" aria-hidden="true"></i>
						<span id="likes">{{ count($recipe->likes) }}</span>
					</button>
				</div>
			</div>
			<div class="rates">
				<div class="inner">
					<button type="button" class="rate-number" data-id="{{ $recipe->id }}">
						<i class="fa fa-star " aria-hidden="true"></i>
						<i class="fa fa-star " aria-hidden="true"></i>
						<i class="fa fa-star " aria-hidden="true"></i>
						<i class="fa fa-star " aria-hidden="true"></i>
						<i class="fa fa-star " aria-hidden="true"></i>
						<i class="fa fa-star " aria-hidden="true"></i>
						<i class="fa fa-star " aria-hidden="true"></i>
						<i class="fa fa-star " aria-hidden="true"></i>
						<i class="fa fa-star " aria-hidden="true"></i>
						<i class="fa fa-star " aria-hidden="true"></i>
					</button>
					<button type="button" class="rate-number" data-id="{{ $recipe->id }}">
						<i class="fa fa-star " aria-hidden="true"></i>
						<i class="fa fa-star " aria-hidden="true"></i>
						<i class="fa fa-star " aria-hidden="true"></i>
						<i class="fa fa-star " aria-hidden="true"></i>
						<i class="fa fa-star " aria-hidden="true"></i>
						<i class="fa fa-star " aria-hidden="true"></i>
						<i class="fa fa-star " aria-hidden="true"></i>
						<i class="fa fa-star " aria-hidden="true"></i>
						<i class="fa fa-star " aria-hidden="true"></i>
					</button>
					<button type="button" class="rate-number" data-id="{{ $recipe->id }}">
						<i class="fa fa-star " aria-hidden="true"></i>
						<i class="fa fa-star " aria-hidden="true"></i>
						<i class="fa fa-star " aria-hidden="true"></i>
						<i class="fa fa-star " aria-hidden="true"></i>
						<i class="fa fa-star " aria-hidden="true"></i>
						<i class="fa fa-star " aria-hidden="true"></i>
						<i class="fa fa-star " aria-hidden="true"></i>
						<i class="fa fa-star " aria-hidden="true"></i>
					</button>
					<button type="button" class="rate-number" data-id="{{ $recipe->id }}">
						<i class="fa fa-star " aria-hidden="true"></i>
						<i class="fa fa-star " aria-hidden="true"></i>
						<i class="fa fa-star " aria-hidden="true"></i>
						<i class="fa fa-star " aria-hidden="true"></i>
						<i class="fa fa-star " aria-hidden="true"></i>
						<i class="fa fa-star " aria-hidden="true"></i>
						<i class="fa fa-star " aria-hidden="true"></i>
					</button>
					<button type="button" class="rate-number" data-id="{{ $recipe->id }}">
						<i class="fa fa-star " aria-hidden="true"></i>
						<i class="fa fa-star " aria-hidden="true"></i>
						<i class="fa fa-star " aria-hidden="true"></i>
						<i class="fa fa-star " aria-hidden="true"></i>
						<i class="fa fa-star " aria-hidden="true"></i>
						<i class="fa fa-star " aria-hidden="true"></i>
					</button>
					<button type="button" class="rate-number" data-id="{{ $recipe->id }}">
						<i class="fa fa-star " aria-hidden="true"></i>
						<i class="fa fa-star " aria-hidden="true"></i>
						<i class="fa fa-star " aria-hidden="true"></i>
						<i class="fa fa-star " aria-hidden="true"></i>
						<i class="fa fa-star " aria-hidden="true"></i>
					</button>
					<button type="button" class="rate-number" data-id="{{ $recipe->id }}">
						<i class="fa fa-star " aria-hidden="true"></i>
						<i class="fa fa-star " aria-hidden="true"></i>
						<i class="fa fa-star " aria-hidden="true"></i>
						<i class="fa fa-star " aria-hidden="true"></i>
					</button>
					<button type="button" class="rate-number" data-id="{{ $recipe->id }}">
						<i class="fa fa-star " aria-hidden="true"></i>
						<i class="fa fa-star " aria-hidden="true"></i>
						<i class="fa fa-star " aria-hidden="true"></i>
					</button>
					<button type="button" class="rate-number" data-id="{{ $recipe->id }}">
						<i class="fa fa-star " aria-hidden="true"></i>
						<i class="fa fa-star " aria-hidden="true"></i>
					</button>
					<button type="button" class="rate-number" data-id="{{ $recipe->id }}">
						<i class="fa fa-star " aria-hidden="true"></i>
					</button>
				</div>
			</div>
		</div>
		<div class="col-md-7 content-recipe">
			<div class="row">
				<div class="avatar">
					<img src="{{ asset($recipe->avatar) }}" alt="">
				</div>
				<div class="recipe-name">
					<p>{{ $recipe->name }}</p>
				</div>
				@php
					foreach ($recipe->courses as $course) {
					    $result_course = $course->type;
					}
					$length = count($recipe->rates);
					$total = 0;
					$result_rate = 0;
					foreach ($recipe->rates as $rate) {
						$number = $rate->rate;
						$total += $number;
					}
					if ($total === 0) {
	                    $result_rate = 0;
	                } else {
	                    $result_rate = $total/$length;
	                }
				@endphp
				<div class="info">
					<p><i class="fa fa-clock-o" aria-hidden="true"></i> Thời gian làm: {{ $recipe->time }} phút | Phần ăn: {{ $recipe->section }}</p>
					<p<i class="fa fa-cutlery" aria-hidden="true"></i> Ẩm thực: {{ $recipe->cuisine }}</p>
					<p>Độ khó: {{ $diffculty }} | Đánh gía: <i class="fa fa-star color-yellow" aria-hidden="true"></i><span id="change-rates"> {{ number_format($result_rate, 1, ",", "") }} </span></p>
				</div>
			</div>

			<div class="row">
				<div class="cooking">
					<h3>Thông tin thêm</h3>
					<p>Loại món ăn: {{ $dishtype }} | {{ $result_course }}</p>
					<p>Cách thực hiện: {{ $cooking_method }}</p>
					<h3>Nguyên liệu</h3>
					<span>- {{ $material->main_material }}</span><br>
					@php
						$properties = explode(",", $material->material);
						$i =1;
					@endphp
					@foreach ($properties as $property)
						<span>- {{ $property }}</span><br>
					@endforeach
				</div>
			</div>
			<div class="row">
				<div class="making">
					<h3>Cách làm</h3>
					@foreach ($making as $make)
						<h4>Bước {{$i++}}</h4>
						<p>{{ $make }}</p>
					@endforeach
				</div>
			</div>
		</div>
		<div class="col-md-3 same">
			<div class="row see-more">
				<div class="item">
					<div class="more">
						<h3>Một số công thức khác</h3>
					</div>
					@foreach ($recipes as $recipe)
		                <div class="inner_item">
		                    <div class="image">
		                        <a href="/recipes/{{ $recipe->id }}">
		                            <img src="{{ asset($recipe->avatar) }}">
		                        </a>
		                    </div>
		                     <div class="content-items">
		                        <a href="#">
		                            <p><b>{{ $recipe->name }}</b></p>
		                        </a>
		                        <p>
		                            <span class="text-pale">{{ $diffculty }}</span>
		                            | <span class="text-pale">{{ $material->main_material }}</span>
		                        </p>
		                        <p class="text-pale">Công thức bởi: <b>{{ $recipe->user }}</b></p>
		                        <div class="likes-number">
			                        <span><i class="fa fa-thumbs-o-up" aria-hidden="true"> {{ count($recipe->likes) }}</i></span>
			                        <span><i class="fa fa-clock-o" aria-hidden="true"></i> {{ $recipe->time }}</span>
			                    </div>
			                    <div class="vote">
			                        <span><i class="fa fa-star color-yellow" aria-hidden="true"> {{ $recipe->average }}</i></span>
			                    </div>
		                    </div>
		                </div>
		                <hr>
					@endforeach
					<div>
						<a class="f-right" href="{{ route('recipe') }}">Xem thêm</a>
					</div>
	            </div>
			</div>
		</div>
</div>
<script>
$(document).ready(function() {
	$('body').on('click', '.like-number', function (event) {
        event.preventDefault();
        var id = $(this).attr('data-id');
        $.ajax({
            type: "GET",
            url: '/up-like-number',
            data: {
                id:id
            },
            success: function(result) {
            	alert('Bạn đã thích bài viết này!');
            	console.log(result);
                var number = document.getElementById('likes').innerText;
                number = parseInt(number) + 1;
                document.getElementById('likes').innerText = number;
            }
        });
    });
    $('body').on('click', '.care-number', function (event) {
        event.preventDefault();
        var id = $(this).attr('data-id');
        $.ajax({
            type: "GET",
            url: '/up-care-number',
            data: {
                id:id
            },
            success: function(result) {
            	alert('Bạn đã quan tâm tới' + ' ' + result.name + ' ' + ', bạn sẽ nhận được những bài viết mới nhất của họ!');
                var number = document.getElementById('cares').innerText;
                number = parseInt(number) + 1;
                document.getElementById('cares').innerText = number;
            }
        });
    });
    $('body').on('click', '.rate-number', function (event) {
        event.preventDefault();
        var id = $(this).attr('data-id');
        var item = $(this).find('i').length;
        $.ajax({
            type: "GET",
            url: '/change-rate-number',
            data: {
                id:id,
                number_rate: item
            },
            success: function(result) {
            	alert('Cảm ơn bạn đã quan tâm và đánh gía công thức này!!');
            	var n = parseFloat(result);
            	result = Math.round(n * 10)/10;
                document.getElementById('change-rates').innerText = result;
            }
        });
    });
});
</script>
@endsection