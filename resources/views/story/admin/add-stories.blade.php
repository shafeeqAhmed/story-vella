<x-dashboard-layout>
    <x-auth-session-status class="mb-4" :status="session('status')" />

    @section('title')
        Stories
    @stop

    <div class="row">
        <div class="p-3 text">
            <h2>
                Edit Story Page
            </h2>
        </div>
    </div>

    <div class="row">
        <div class="col-2">

        </div>
        <div class="col-8">
            @include('messages.flash-message')

            {{-- <form method="POST" action="{{ route('stories.store') }}" enctype="multipart/form-data"> --}}
                <form method="POST" action=" {{ isset($story) ? route('stories.update', ['id'=> $story->id]) : route('stories.store') }}" enctype="multipart/form-data">
                  @if(isset($story))
                  @method('PUT')
                  @endif
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="{{ old('title', isset($story) ? $story->title : '') }}" required>
                    <x-custom-input-error :messages="$errors->get('title')" />
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" rows="3" name="description" required> {{ old('description', isset($story) ? $story->description : '') }}</textarea>
                    <x-custom-input-error :messages="$errors->get('description')" />

                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Category</label>
                    <select class="form-select" name="category_id" required>
                        <option selected>Select</option>
                       @foreach($categories as $category)
                       <option {{ isset($story) && $story->category_id == $story->category_id ? 'selected' : '' }} {{ old('category_id') && old('category_id') == $category->id ? 'selected' : '' }}  value="{{ $category->id }}">
                        {{ $category->name }}
                       </option>

                       @endforeach

                      </select>
                      <x-custom-input-error :messages="$errors->get('category_id')" />

                </div>

                <div class="mb-3">
                    <label for="location" class="form-label">Location</label>
                    <input type="text" class="form-control" id="location" placeholder="Location" name="location" value="{{ old('location', isset($story) ? $story->description : '') }}" required>
                    <x-custom-input-error :messages="$errors->get('location')" />

                </div>

                <div class="mb-3">
                    <label for="storyImage" class="form-label">Story Image</label>
                    <input class="form-control" type="file" id="storyImage" name="image" required>
                    @if(isset($story))
                    <img src="{{ $story->image }}"  class="mt-2 mb-1 story_upload_preview_image">
                    @endif
                    <x-custom-input-error :messages="$errors->get('image')" />

                  </div>
                  <div class="row">
                    <button type="submit" class="btn btn-outline-secondary bt-sm mb-2 btn_remove_radius" >Save</button>
                </div>

            </form>
        </div>
        <div class="col-2">

        </div>
    </div>
    </div>

</x-dashboard-layout>
