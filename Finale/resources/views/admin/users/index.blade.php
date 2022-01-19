@extends('templates.main')
@section('content')
<h1>Users</h1>

    <div class="row">
        <div class="col-12">
    <h1> class="float-left">Users</h1>
    <a class="btn btn-sm btn-success float-right" href="{{route('admin.users.create') }}" role="button">Edit</a>


    <div class="card">
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
      @foreach($users as $user)
      <tr>
      <th scope="row">{{$user->id}}</th>
      <td>{{$user->name}}/td>
      <td>$user->email</td>
      <a class="btn btn-sm btn- primary" href="{{route('admin.users.edit', $user->id) }}" role="button">Edit</a>
      <td></td>
    </tr>
    @end
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td colspan="2">Larry the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
  {{$users->links() }}
</table>
</div>


@endsection