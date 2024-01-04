@extends('layouts.admin.e-commerce.app')

@section('title', 'Ticket List')



@section('content')

<!-- Main content -->
<section class="content">
<form action="{{ route('admin.ticket.update')}}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Username:</label>
                            <input type="text" name="name" value="{{$tickets->user->username ?? ''}}" class="form-control" value="" readonly>
                        </div>
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea  cols="5" placeholder="Write size description" class="form-control" readonly>{{$tickets->body}}</textarea>
                        </div> 
                        <div class="form-group">
                            <label for="description">Admin reply:</label>
                            <textarea  cols="5" name="replay" placeholder="Write  Replay" class="form-control" ></textarea>
                            <input type="hidden" value="{{$tickets->id}}" name="gurdmen">
                        </div> 
                        
                    </div>
                    <div class="card-footer">
                        <div class="form-group">
                            <button class="mt-1 btn btn-primary">
                                    <i class="fas fa-arrow-circle-up"></i>
                                    Update
                            </button>
                        </div>
                    </div>
                </form>
    

</section>
<!-- /.content -->

@endsection
