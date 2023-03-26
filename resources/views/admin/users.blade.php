<x-dashboard-layout>
    <x-auth-session-status class="mb-4" :status="session('status')" />

    @section('title')
        Users
    @stop
    <div class="rol">

    </div>

    <div class="row">
        @include('messages.flash-message')
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Type</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($users as $key => $user)
                    <tr>
                        <th scope="row">
                            {{ ++$key }}
                        </th>
                        <td>
                            {{ $user->name }}

                        </td>
                        <td>
                            @foreach( $user->roles as $role)
                            <span>
                                {{$role->name}},
                            </span>
                            @endforeach

                        </td>
                        <td>
                            {{ $user->email }}
                        </td>



                    </tr>
                @endforeach
            </tbody>
        </table>
        {{-- {{ $stories->next_page_url}} --}}
        <div class="row">
            <div class=" d-flex justify-content-end">
                <div class="pagination">
                    {{ $users->links('vendor.pagination.bootstrap-5') }}
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
