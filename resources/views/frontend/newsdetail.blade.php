@extends("frontend.layout")
@section("do-du-lieu")
<?php
	$news = DB::table("news")->where("id","=",$id)->first();
?>
                    <article>
                    	<div class="title-box">
                            <h1>{{ $news->name }}</h1>
                        </div>
                        <div class="post-thumb">
                        	<img src="{{ asset('upload/news/'.$news->photo) }}" alt="">
                        </div>
                        <div class="post-content" style="margin-top: 10px;">
                            {!! $news->description !!}
                            {!! $news->content !!}
                            <div class="marked-title first">
                                <h3>Tin tức khác</h3>
                            </div>
                            <div class="row-fluid">
                            	<?php
                            		$otherNews = DB::table("news")->where("category_id","<",$news->category_id)->orderBy("id","desc")->offset(0)->take(4)->get();
                            	?>
                            	@foreach($otherNews as $rows)
                               <!-- other news -->
                                <div class="span4">
                                    <article class="small single">
                                        <div class="post-thumb">
                                            <a href="{{ url('news/detail/'.$rows->id) }}"><img src="{{ asset('upload/news/'.$rows->photo) }}" alt=""></a>
                                        </div>
                                        <div class="cat-post-desc">
                                            <h3><a href="{{ url('news/detail/'.$rows->id) }}">{{ $rows->name }}</a></h3>
                                        </div>
                                    </article>
                                </div>
                                <!-- end other news -->
                                @endforeach

                            </div>


                        </div>
                    </article>
                 <!-- ========================================= -->
@endsection
