<div  class="content-reply">
    @foreach ($comment->replies as $reply)   
    <div class="row ml-5 mb-3">
        <div class="col-3 col-sm-2" >
            @if ($reply->admin_id)
                <img style="width: 120px; height: 120px;border-radius: 50%" src="@if(@$reply->admin->image && file_exists(public_path('uploads/users/' . @$reply->admin->image)))
                {{ asset('uploads/users/'. @$reply->admin->image) }}
                @else
                {{ asset('uploads/default-profile.png') }}
                @endif" alt="user-profile" class="img-fluid mt-4">
            @else
                <img style="width: 80px; height: 80px;border-radius: 50%" src="@if(@$reply->customer->image && file_exists(public_path('uploads/customers/' . @$reply->customer->image)))
                {{ asset('uploads/customers/'. @$reply->customer->image) }}
                @else
                {{ asset('uploads/default-profile.png') }}
                @endif" alt="user-profile" class="img-fluid mt-4">
            @endif
        </div>
        <div class="col-7 col-sm-8">
            <p class="commenter-name text-capitalize font-weight-bold">
                @if ($reply->admin_id)
                    {{ @$reply->admin->name }}
                @else
                    {{ @$reply->customer->first_name }} {{ @$reply->customer->last_name }}
                @endif
            </p>
            <div class="comment-content">
                <p>
                    {{ $reply->content }}
                </p>
            </div>
        </div>
    </div>
    @endforeach
</div>