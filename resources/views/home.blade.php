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
            <div class="row">
                <div class="d-flex justify-content-between">

                    <div class="col p-2">
                        <select name="category"  class="form-control" name="category_id">
                            <option>Category</option>
                            @foreach($categories as $category)
                            <option  value="{{ $category->id }}">
                             {{ $category->name }}
                            </option>
                            @endforeach

                        </select>
                    </div>

                    <div class="col p-2">
                        <select name="category"  class="form-control">
                            <option>Location</option>
                            @foreach($locations as $location)
                            <option value="{{ $location }}">
                             {{ $location->location }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col p-2 d-flex justify-content-end">
                        <a type="button" class="btn btn-outline-secondary bt-sm mb-2 btn_remove_radius">Search</a>
                    </div>



                </div>

            </div>




            {{-- ===================================================== Story List =========================================== --}}
            @foreach($stories as $story)
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
                <div class="row mt-2">
                    <div class="action_button d-flex justify-content-between">

                        <div>
                            <a type="button" class="btn btn-outline-secondary bt-sm mb-2 btn_remove_radius"
                            href="{{ route('stories.create') }}">Add New Story</a>
                        </div>
                        <div>
                            <i class="fa fa-pen"></i>
                                <span>
                                    {{ $story->author_name }}
                                </span>
                        </div>
                        <div>
                            <i class="fa fa-heart"></i>
                            @if($story->has('likes'))
                                <em> {{ count($story->likes) }} Likes</em>
                                @else
                                <em> 0 Likes</em>

                                @endif
                        </div>
                    </div>
                </div>
            </div>

            @endforeach
        </div>





            {{-- <div class="container">
                <div class="row">
                   <div class="col-lg-4">
                    <select name="category" id="category">
                        <option value="dave">Category</option>
                      <option value="category">Dave</option>
                      <option value="pumpernickel">Pumpernickel</option>
                      <option value="reeses">Reeses</option>
                    </select>
                   </div>
                   <div class="col-lg-4">
                    <select name="category" id="Location">
                        <option value="dave">Location</option>
                      <option value="category">Dave</option>
                      <option value="pumpernickel">Pumpernickel</option>
                      <option value="reeses">Reeses</option>
                    </select>
                   </div>
                   <div class="col-lg-4">
                    <button><a href="#">Search</a></button>
                   </div>
                   <div class="col-lg-12 col_1 d-flex align-items-center justify-content-between">
                    <div class="card d-flex align-items-center justify-content-between">
                        <div class="col_lg-6">
                            <div class="left_img">
                                <img src="{{ asset('custom/assets/img/bg.jpg')}}" alt="">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="right_content position-absolute ">
                                <h3>Digital Marekting Tutorial</h3>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    Maxime mollitia,
                                    molestiae quas vel sint commodi repudiandae
                                    consequuntur voluptatum laborum
                                    numquam blanditiis harum quisquam eius sed odit fugiat
                                    </p>
                                    <button><a href="#">Marekting</a></button>
                                    <i class="fa fa-pen"></i>
                                    <span>Jhon Deo</span>
                                    <i class="fa fa-heart"></i>
                                    <em>15 Likes</em>
                            </div>
                        </div>
                    </div>
                   </div>
                </div>
            </div> --}}
    </div>

</x-home-layout>

<style>
    .site_header {
        position: absolute;
    }

</style>
