@foreach($comments as $comment)
    <div class="display-comment" @if($comment->parent_id != null) style="margin-left:40px;" @endif>
        <div class="author-image"><img src="{{ asset('resource/frontend/images/author-2-150x150.jpg') }}" alt="Autohr Image"></div>
        <div class="comment-info">
            <h5><b class="light-color">{{ $comment->user->username }}</b></h5>
            <p>{{ $comment->content }}</p>
            <h6 class="date"><em><?php echo \Carbon\Carbon::createFromTimeStamp(strtotime($comment->created_at))->diffForHumans() ?></em></h6>
        </div>
        <form method="post" action="{{ route('postMessage') }}">
            @csrf
            <div class="form-group">
                <input type="text" name="content" class="form-control" />
                <input type="hidden" name="new_id" value="{{ $new_id }}" />
                <input type="hidden" name="parent_id" value="{{ $comment->id }}" />
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-warning" value="Reply" />
            </div>
        </form>
        @include('frontend.news.display_comment', ['comments' => $comment->replies])
    </div>
@endforeach
