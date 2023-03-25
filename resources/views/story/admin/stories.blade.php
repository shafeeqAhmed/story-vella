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
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Image</th>
                    <th scope="col">Title</th>
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
                        <td>@mdo</td>
                        <td>
                            {{ $story->is_publishe == 1 ? 'Yes' : 'No' }}
                        </td>
                        <td>
                            <a href="#">
                                Delete
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{-- {{ $stories->next_page_url}} --}}
        <div class="row">
            <div class=" d-flex justify-content-end">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                      <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                      <li class="page-item"><a class="page-link" href="#">1</a></li>
                      <li class="page-item"><a class="page-link" href="#">2</a></li>
                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                      <li class="page-item"><a class="page-link" href="#">Next</a></li>
                    </ul>
                  </nav>
            </div>
        </div>

        <div class="pagination">
            {{ $stories->links('vendor.pagination.bootstrap-4') }}
        </div>

    </div>



</x-dashboard-layout>

<style>
    img {
        height: 70px;
        width: 70px
    }
</style>
