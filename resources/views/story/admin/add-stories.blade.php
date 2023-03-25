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

            <form method="POST" action="{{ route('stories.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="{{old('title')}}" required>
                    <x-custom-input-error :messages="$errors->get('title')" />
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" rows="3" name="description" required>
                        {{old('description')}}
                    </textarea>
                    <x-custom-input-error :messages="$errors->get('description')" />

                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Category</label>
                    <select class="form-select" name="category_id" required>
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                      </select>
                      <x-custom-input-error :messages="$errors->get('category_id')" />

                </div>

                <div class="mb-3">
                    <label for="location" class="form-label">Location</label>
                    <input type="text" class="form-control" id="location" placeholder="Location" name="location" {{old('location')}} required>
                    <x-custom-input-error :messages="$errors->get('location')" />

                </div>

                <div class="mb-3">
                    <label for="storyImage" class="form-label">Story Image</label>
                    <input class="form-control" type="file" id="storyImage" name="image" required>
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
