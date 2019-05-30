
<div class="col-md-2 col-sm-2 vmenu">
        <div class="">
            <div class="card-body text-center">
                <a href="{{ route('main')}}" class="it {{ active_menu(Route::currentRouteName(), 'main', 0, 4) }}">
                        <i class="fas fa-minus-square" data-toggle="tooltip" data-placement="right" title="Dashboard"></i>
                </a><br>
                <a href="{{ route('post')}}" class="it {{ active_menu(Route::currentRouteName(), 'post', 0, 4) }}">
                        <i class="far fa-newspaper" data-toggle="tooltip" data-placement="right" title="Articles"></i>
                </a><br>
                <a href="{{ route('category')}}" class="it {{ active_menu(Route::currentRouteName(), 'category', 0, 8) }}">
                        <i class="fas fa-archive" data-toggle="tooltip" data-placement="right" title="Categories"></i>
                </a><br>
                <a href="{{ route('comment')}}" class="it {{ active_menu(Route::currentRouteName(), 'comment', 0, 7) }}">
                        <i class="far fa-comment-alt" data-toggle="tooltip" data-placement="right" title="Comments"></i>
                </a>
            </div>
        </div>
</div>

