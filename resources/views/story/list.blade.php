@foreach ($stories as $story)
<div class="row story_list p-3 mb-2">
    <div class="col-sm-4">
        <div class="left-story-image">
            <img src="{{ $story->image }}" class="img-thumbnail">
        </div>
    </div>
    <div class="col-sm-8">
        <div class="flex flex-direction-column">
            <div class="heading mb-3">
                <h3>
                    {{ $story->title }}
                </h3>
            </div>
            <div class="description">
                <p class="fixed-height-paragraph">
                    {{ $story->description }}
                </p>
            </div>

        </div>
    </div>
    <hr class="mt-2"/>
    <div class="row mt-2">
        <div class="action_button d-flex justify-content-between">

            <div>
                <a type="button" class="btn btn-outline-secondary bt-sm mb-2 btn_remove_radius"
                    href="{{ route('stories.show', ['id'=> $story->id]) }}">Detail</a>
            </div>
            <div>
                <i class="fa fa-pen"></i>
                <span>
                    {{ $story->author_name }}
                </span>
            </div>

           <div>

            <a href="{{ route('stories.like', ['story_id'=> $story->id]) }}" class="btn btn-outline-secondary bt-sm mb-2 btn_remove_radius {{ isLiked($story->id) ? 'active' : ''}}">
                <i class="fa fa-heart"></i>
                @if ($story->has('likes'))
                    <em> {{ count($story->likes) }} Likes</em>
                @else
                    <em> 0 Likes</em>
                @endif
            </a>
           </div>
        </div>
    </div>
</div>
@endforeach
<div class="row">
<div class=" d-flex justify-content-end">
    <div class="pagination">
        {{ $stories->links('vendor.pagination.bootstrap-5') }}
    </div>
</div>
</div>
