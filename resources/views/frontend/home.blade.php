<!-- load file layout vao day -->
@extends('frontend.layout')
@section('do-du-lieu')
	<?php
		$categories = DB::table("categories")->orderBy("id","desc")->get();
	 ?>
	@foreach($categories as $rowsCategory)
	<?php
		//chi hien thi cac danh muc co tin
		//ham Count() tra ve so luong ban ghi
		$newsCount = DB::table("news")->where("category_id","=",$rowsCategory->id)->Count();
	 ?>
	 @if($newsCount > 0)
	<!-- list category tin tuc -->
	<div class="row-fluid">
	    <div class="marked-title">
	        <h3><a href="{{ url('news/category/'.$rowsCategory->id) }}" style="color:white">{{ $rowsCategory->name }}</a></h3>
	    </div>
	</div>
	<div class="row-fluid">
	    <div class="span2">
	    <!-- lay tin dau tien -->
	    <?php
	    	//offset(0) <=> tu ban ghi thu 0
	    	//take(1) <=> lay 1 ban ghi
	    	//first() <=> lay mot ban ghi -> co the xuat luon ban ghi do
	    	//get() <=> lay nhieu ban ghi, phai foreach thi moi xuat duoc
	    	$firstNews = DB::table("news")->where("category_id","=",$rowsCategory->id)->offset(0)->take(1)->first();
	     ?>
	       <!-- first news -->
	        <article>
	            <div class="post-thumb">
	                <a href="{{ url('news/detail/'.$firstNews->id) }}"><img src="{{ asset('upload/news/'.$firstNews->photo) }}" alt=""></a>
	            </div>
	            <div class="cat-post-desc">
	                <h3><a href="{{ url('news/detail/'.$firstNews->id) }}">{{ $firstNews->name }}</a></h3>
	                <!-- lien quan den ckeditor thi phai dung ky hieu sau -->
	                {!! $firstNews->description !!}
	            </div>
	        </article>
	        <!-- end first news -->
	    </div>
	    <div class="span2">
	    <?php
	    	$otherNews = DB::table("news")->where("category_id","=",$rowsCategory->id)->offset(0)->take(4)->get();
	     ?>
	     @foreach($otherNews as $rows)
	       <!-- list news -->
	        <article class="twoboxes">
	            <div class="right-desc">
	                <h3><a href="{{ url('news/detail/'.$rows->id) }}"><img src="{{ asset('upload/news/'.$rows->photo) }}" alt=""></a><a href="{{ url('news/detail/'.$rows->id) }}">{{ $rows->name }}</a></h3>
	                <div class="clear"></div>
	            </div>
	            <div class="clear"></div>
	        </article>
	        <!-- end list news -->
	     @endforeach
	    </div>
	</div>
	<div class="clear"></div>
	<!-- end list category tin tuc -->
	@endif
	@endforeach


@endsection
