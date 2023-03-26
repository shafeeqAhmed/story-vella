<x-home-layout>
    <!-- banner-section -->
    <div class="banner_sec">
        <div class="container">
            <div class="banner_content">
                <h1>Tell Something interesting!</h1>
            </div>
        </div>
    </div>
    <!-- section_2 -->
    <div class="marketing_sec">
        <div class="container">
            <form method="GET" action="{{ route('home') }}">

                <div class="row">
                    <div class="d-flex justify-content-between">

                        <div class="col p-2">
                            <select  class="form-control" name="category_id">
                                <option value="">Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">
                                        {{ $category->name }}
                                    </option>
                                @endforeach

                            </select>
                        </div>

                        <div class="col p-2">
                            <select  class="form-control" name="location">
                                <option value=""> Location </option>
                                @foreach ($locations as $location)
                                    <option value="{{ $location }}">
                                        {{ $location->location }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col p-2 d-flex justify-content-end">
                            <button type="submit"
                                class=" bt-sm mb-2 btn_remove_radius">Search
                            <span class="p-2"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </form>





            {{-- ===================================================== Story List =========================================== --}}
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
        </div>

    </div>

</x-home-layout>

<style>
    .site_header {
        position: absolute;
    }
</style>
