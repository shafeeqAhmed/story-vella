<x-home-layout>

    <div class="stories_sec">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <a type="button" class="btn btn-outline-secondary bt-sm mb-2 btn_remove_radius"
                        href="{{ URL::previous() }}">Back</a>
                </div>
                <div class="col-lg-12">
                    <div class="card_2">
                        <div class="card_con">
                            <div class="card_img">
                                <img src="{{ $story->image }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="action_button d-flex justify-content-between">
                        <div class="m-3">
                            <span class="heading_label"> Category: </span> {{ $story->category_name }}
                        </div>

                        <div>
                            <span class="heading_label"> Author: </span> {{ $story->author_name }}

                        </div>

                        <div>
                            <span class="heading_label"> Likes: </span>
                            {{ $story->has('likes') ? count($story->likes) : 0 }}
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="content_3">
                        <h2>
                            {{ $story->title }}
                        </h2>
                        <p>
                            {{ $story->description }}
                        </p>

                        <a href="{{ route('stories.like', ['story_id' => $story->id]) }}"
                            class="btn btn-outline-secondary bt-sm mb-2 btn_remove_radius {{ isLiked($story->id) ? 'active' : '' }}">
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
    </div>
    </div>

</x-home-layout>


<style>
    .heading_label {
        font-weight: bold;
    }
</style>
