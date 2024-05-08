@extends('layout')
@section('content')
<style>
  .push-top {
    margin-top: 50px;
  }
</style>
<div class="push-top">
  @if(session()->has('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <div class="text-right mb-3">
    <a href="{{ route('learners.create') }}" class="btn btn-success">Create</a>
  </div>
  <table class="table">
    <thead>
        <tr class="table-warning">
          <td>ID</td>
          <td>Name</td>
          <td>Email</td>
          <td>Phone</td>
     
          <td class="text-center">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($learners as $learner)
        <tr>
            <td>{{$learner->id}}</td>
            <td>{{$learner->name}}</td>
            <td>{{$learner->email}}</td>
            <td>{{$learner->phone}}</td>
          
            <td class="text-center">
                <a href="{{ route('learners.edit', $learner->id)}}" class="btn btn-primary btn-sm">Edit</a>
                <form action="{{ route('learners.destroy', $learner->id)}}" method="post" style="display: inline-block">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection
