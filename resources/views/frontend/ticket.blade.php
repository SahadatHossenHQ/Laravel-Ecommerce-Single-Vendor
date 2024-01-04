@extends('layouts.frontend.app')


@section('title', 'Account')

@section('content')

<div class="customar-dashboard">
    <div class="container">
        <div class="customar-access row">
            <div class="customar-menu col-md-3">
                  @include('layouts.frontend.partials.userside')
            </div>
            <div class="col-md-9" style="margin-top: 20px">
              <div class="customer-right">
                    <div class="info-wrapper">
                        <!-- Button trigger modal -->
                    <button type="button" class="create-address" data-toggle="modal" data-target="#exampleModalCenter">
                        <p class="icofont icofont-plus"></p>
                       Create New Ticket
                    </button>
                    
                    <!-- Modal -->
                    <div class="modal toggle" id="exampleModalCenter" tabindex="-1" aria-labelledby="exampleModalCenterTitle" style="display: none;" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Create A Ticket</h5>
                            <button type="button" class="close model-button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{route('ticket.create')}}" method="post" id="submit_dpayment_form">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" class="form-control " name="subject" placeholder="Subject" required="">
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" name="message" id="" cols="30" rows="5" style="width: 100%;" placeholder="Write your problem"></textarea>
                                    </div>
                                   
                                   <div class="form-group">
                                        <input style="color: white;background:#007bff !important" class="mt-1 btn btn-primary btn-block" type="submit" value="send">
                                    </div>
                                </form>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                    <div class="right-wapper">
                        <h5><b>Order Ticket</b></h5>
                        <hr>
                        <table>
                           <thead>
                               <tr>
                                <th>Subject</th>
                                <th>Status</th>
                                <th>Options</th>
                               </tr>
                           </thead>
                           <tbody>
                            @foreach($tickets as $ticket)
                            <tr>
                                <td>{{$ticket->sub}}</td>
                               
                                <td>@if($ticket->status==0)review @else reply @endif</td>
                                <td>
                                <button  type="button" class="dt-h" data-toggle="modal" data-target="#ticketshow{{$ticket->id}}">
                                    <i class="icofont icofont-eye"></i>
                                </button>
                                </td>
                            </tr>
                            @endforeach
                           </tbody>
                        </table>
                        @foreach($tickets as $ticket)
                         <div class="modal toggle" id="ticketshow{{$ticket->id}}" tabindex="-1" aria-labelledby="ticketshow" style="display: none;" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Ticket details</h5>
                                        <button type="button" class="close model-button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <h4><b>Your Ticket</b></h4>
                                        <p> <td>Subject:{{$ticket->sub}}</td></p>
                                        <p> <td>Text:{{$ticket->body}}</td></p>
                                    </div>
                                    <div class="modal-body">
                                        <h4><b>Support Reply</b></h4>
                                        <p> <td>Reply:{{$ticket->reply}}</td></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                  </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('js')
<script>
    // form submit 
    $(document).on('submit', '#submit_payment_form', function(e) {
            e.preventDefault();
            
            let action   = $(this).attr('action');
            var formData = $(this).serialize();
            $.ajax({
                type: 'POST',
                url: action,
                data: formData,
                dataType: "JSON",
                beforeSend: function() {
                    loader(true);
                },
                success: function (response) {
                    responseMessage(response.alert, response.message, response.alert.toLowerCase())
                },
                complete: function() {
                    loader(false);
                },
                error: function (xhr) {
                    if (xhr.status == 422) {
                        if (typeof(xhr.responseJSON.errors) !== 'undefined') {
                            
                            $.each(xhr.responseJSON.errors, function (key, error) { 
                                $('small.'+key+'').text(error);
                                $('#'+key+'').addClass('is-invalid');
                            });
                            responseMessage('Error', xhr.responseJSON.message, 'error')
                        }

                    } else {
                        responseMessage(xhr.status, xhr.statusText, 'error')
                    }
                }
            });
        });

        // response message hande
        function responseMessage(heading, message, icon) {
            $.toast({
                heading: heading,
                text: message,
                icon: icon,
                position: 'top-right',
                stack: false
            });
        }

        // loader handle this function
        function loader(status) {
            if (status == true) {
                $('#loading-image').removeClass('d-none').addClass('d-block');

            } else {
                $('#loading-image').addClass('d-none').removeClass('d-block');
            }
        }

</script>
@endpush