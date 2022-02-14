@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <table class="table table-striped">
                {{-- {{dd($users->first()->role->first()->name)}} --}}
                <thead>
                  <tr>
                    <th scope="col">Sr. No.</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">User Type</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Address</th>
                    <th scope="col">Assigned Therapist</th>
                    <th  scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($users as $i => $user)
                    <tr>
                        <th scope="row">1</th>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->role->first()->name}}</td>
                        <td>{{$user->phone}}</td>
                        <td>{{$user->address}}</td>
                        <td>{{$user->assigned_therapist}}</td>
                        <td class="text-center d-flex justify-content-center">
                            <button type="button"
                                class="btn btn-primary btn-sm d-inline"
                                id="update-user-button-{{$i}}"
                                data-toggle="modal"
                                data-target="#exampleModalCenter-{{$user->id}}"
                                data-id = {{$user->id}}>
                                    {{ __('Update') }}
                            </button>
                            <form action="{{ url('delete',$user->id) }}"  class="d-inline mx-2">
                                @method('delete')
                                @csrf

                                <button type="submit"
                                  name="delete"
                                  class=" btn d-inline btn-danger btn-sm "
                                  onclick="return confirm('Are you sure, you want to delete?')"
                                  @if (Auth::user()->id === $user->id)
                                      disabled
                                      data-toggle="tooltip"
                                      data-placement="top"
                                      title="Can not delete authenticate user"
                                  @endif
                                >
                                    Delete
                                </button>
                            </form>
                    </td>
                        {{-- <td>{{$user->address}}</td> --}}
                    </tr>
                    @include('auth.register-modal')
                    @endforeach
                </tbody>
              </table>

        </div>
    </div>
</div>
@endsection
