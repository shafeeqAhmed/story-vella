<x-dashboard-layout>
    <x-auth-session-status class="mb-4" :status="session('status')" />

    @section('title')
        Stories
    @stop
    <div class="rol">

    </div>
    <div class="row">
        <div class="col d-flex justify-content-between">
            <h3>
                Stories List
            </h3>
        </div>
        <div class="col d-flex justify-content-end">
            <a type="button" class="btn btn-outline-secondary bt-sm mb-2 btn_remove_radius"
                href="{{ route('stories.create') }}">Add New Story</a>

        </div>
    </div>
    <div class="row">
        @include('messages.flash-message')
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Image</th>
                    <th scope="col">Title</th>
                    <th scope="col">Total Likes</th>
                    @if (Auth::user()->hasRole('admin'))
                        <th scope="col">Author</th>
                    @endif
                    <th scope="col">Edit</th>
                    <th scope="col">Publish</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($stories as $key => $story)
                    <tr>
                        <th scope="row">
                            {{ ++$key }}
                        </th>
                        <td>
                            <img src="{{ $story->image }}" class="img-thumbnail" alt="...">
                        </td>
                        <td>
                            {{ $story->title }}
                        </td>
                        <td>
                            {{ totalLikes($story->id) }}
                        </td>
                        @if (Auth::user()->hasRole('admin'))
                        <td>
                            {{ $story->author_name }}
                        </td>
                        @endif
                        <td>
                            <a href="{{ route('stories.edit',['id'=> $story->id])}}">
                                Edit
                            </a>
                        </td>
                        <td class="d-flex justify-content-center">
                            <form method="post" action="{{ route('stories.update.status') }}">
                                @csrf
                                <input type="hidden" name="story_id" value="{{ $story->id }}">
                                @if ($story->is_publishe)
                                    <input class="form-check-input" type="checkbox" checked name="is_publishe"
                                        onChange="this.form.submit()">
                                @else
                                    <input class="form-check-input" type="checkbox" name="is_publishe"
                                        onChange="this.form.submit()">
                                @endif
                            </form>

                        </td>
                        <td>
                            <form method="post" action="{{ route('stories.delete') }}">
                                @csrf
                                <input type="hidden" name="story_id" value="{{ $story->id }}">
                                <div class="col d-flex justify-content-center">
                                    <button type="submit" class="btn btn-outline-secondary bt-sm mb-2 btn_remove_radius"
                                        >Delete</button>

                                </div>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{-- {{ $stories->next_page_url}} --}}
        <div class="row">
            <div class=" d-flex justify-content-end">
                <div class="pagination">
                    {{ $stories->links('vendor.pagination.bootstrap-5') }}
                </div>
            </div>
        </div>



    </div>



</x-dashboard-layout>

<style>
    img {
        height: 70px;
        width: 70px
    }
</style>
