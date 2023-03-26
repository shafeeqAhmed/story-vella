<x-home-layout>
    <!-- banner-section -->
    <div class="banner_sec d-flex align-items-center justify-content-center">

        <div class="container">
            {{-- <div class="banner_content">

            </div> --}}
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

            @include('story.list')

        </div>

    </div>

</x-home-layout>

<style>
    .site_header {
        position: absolute;
    }
    .main_heading_nav {
        color: white;
    }
</style>
