<!--start slider -->
<div class="cn_wrapper">
    <div id="cn_preview" class="cn_preview">
    <!-- co the dung full sql de truy van, hoac thuc hien theo cach truy van nhu admin -->
    <?php
        $hotnews = DB::select("select * from news where hot = 1 order by id desc limit 0,4");
        //cung co the dung:
        //$hotnews = DB::table("news")->where("hot","=","1")->orderBy("id","desc")->offset(0)->take(4)->get();
        $top = 0;
     ?>
     @foreach($hotnews as $rows)
     <?php $top++; ?>
       <!-- first hot news -->
        <div class="cn_content" style="@if($top == 1) top:0px; @endif background: url('{{ asset("upload/news/".$rows->photo) }}') no-repeat center #ffffff; background-size:100%;">
            <div class="caption">
                <h3><a href="{{ url('news/detail/'.$rows->id) }}">{{ $rows->name }}</a></h3>
                <!-- lien quan den ckeditor thi phai dung ky hieu nhu sau -->
                {!! $rows->description !!}
            </div>
        </div>
        <!-- end first hot neXws -->
       @endforeach

    </div>
    <div id="cn_list" class="cn_list">
        <div class="cn_page" style="display:block;">
            @foreach($hotnews as $rows)
            <!-- list hot news -->
            <div class="cn_item">
                <div class="left-box">
                    <img src="{{ asset('upload/news/'.$rows->photo) }}" alt="">
                </div>
                <div class="right-box">
                    <h4>{{ $rows->name }}</h4>
                </div>
                <div class="clear"></div>
            </div>
            <!-- end list hot news -->
            @endforeach
        </div>


    </div>
</div>
<!-- end slider
