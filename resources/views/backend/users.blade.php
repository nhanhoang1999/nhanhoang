@extends('backend.master')
@section('title','Thành viên')
@section('main')
    <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê users
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
          
            <th>Họ tên</th>
            <th>Email</th>
            <th>SĐT</th>
            <th>Admin</th>
            <th>Author</th>
            <th>User</th>
            
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($users as $user)
            <form method="POST">
              @csrf
              <tr>
               
                <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }} 
                  <input type="hidden" name="admin_email" value="{{ $user->email }}"></td>
                <td>{{ $user->phone }}</td>
                <td><input type="checkbox" name="admin_role"  {{$user->hasRole('admin') ? 'checked' : ''}}></td>
                <td><input type="checkbox" name="author_role" {{$user->hasRole('author') ? 'checked' : ''}}></td>
                <td><input type="checkbox" name="user_role"  {{$user->hasRole('user') ? 'checked' : ''}}></td>
              <td> 
                 <input type="submit" value="Áp dụng" class="btn btn-sm btn-default">
              </td> 

              </tr>
            </form>
          @endforeach
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
@stop