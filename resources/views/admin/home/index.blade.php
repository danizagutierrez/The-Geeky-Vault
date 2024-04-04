@extends('layouts.admin')
@section('title', $viewData["title"])
@section('content')
<div class="card">
  <div class="card-header">
    Admin Panel - Home Page
  </div>
  <div class="card-body">
    Welcome to the Admin Panel, use the sidebar
    to navigate between the different options.
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-header">
            Admin Data
          </div>
          <div class="card-body">
            <p>Admin Name: {{ Auth::user()->name }}</p>
            <p>Admin Email: {{ Auth::user()->email }}</p>
          </div>
          <div class="card">
            <table class="table">
              <thead>
                <div class="card-header">
                  Current Users
                </div>
              </thead>   
                <div class="card-body">
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Balance</th> 
                    <th scope="col">Role</th> 
                    <th scope="col">Delete</th> 
                    <th scope="col">Promote</th>                                  
                  </tr>
                </div>                        
              <tbody>
                @foreach($viewData["users"] as $user)
                <tr>
                  <th scope="row">{{ $user->getId() }}</th>
                  <td>{{ $user->getName() }}</td>
                  <td>{{ $user->getEmail() }}</td>
                  <td>{{ $user->getBalance() }}</td>
                  <td>{{ $user->getRole() }}</td>
                  <td>
                    @if ($user->getRole() != 'admin')
                      <form action="{{ route('admin.home.delete', $user->getId())}}" method="POST">            
                        @method('DELETE')
                        <button class="btn btn-danger">
                          <i class="bi-trash"></i>
                        </button>                       
                      </form>                                                                                    
                    @endif  
                  </td>
                  <td>
                    @if ($user->getRole() != 'admin')
                      <form action="{{ route('admin.home.promote', $user->getId())}}" method="POST">                    
                        @method('PUT')                                                
                        <button class="btn btn-success">
                          <i class="bi-arrow-up-circle"></i>
                        </button>                       
                      </form>                                                                                    
                    @endif                  
                </tr>
                @endforeach
              </tbody>
            </table>
            <div class="card-footer">
              <form id="logout" action="{{route('logout')}}" method="POST">
                <a role="button" class="btn btn-danger" id="logout" onclick="getElementById('logout').submit();">Logout </a>
                @csrf
              </form>
            </div>
          </div>          
        </div>
      </div>
    </div>
  </div>
</div>
@endsection