<div class="widget">
    <div class="marked-title">
        <h3>Danh mục tin tức</h3>
    </div>
    <ul class="tags">
        <?php
            $categories = DB::table("categories")->orderBy("id","desc")->get();
        ?>
        @foreach($categories as $rows)
        <li><a class="photo" href="{{ url('news/category/'.$rows->id) }}">{{ $rows->name }}</a></li>
        @endforeach
    </ul>
    <div class="clear"></div>
</div>
