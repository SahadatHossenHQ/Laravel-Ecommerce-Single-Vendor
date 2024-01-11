@extends('layouts.admin/e-commerce.app')


@section('title', 'Live Chat')

@push('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" type="text/css" rel="stylesheet">

    <style>
        .container{max-width:1170px; margin:auto;}
        img{ max-width:100%;}
        .inbox_people {
            background: #f8f8f8 none repeat scroll 0 0;
            float: left;
            overflow: hidden;
            width: 40%; border-right:1px solid #c4c4c4;
        }
        .inbox_msg {
            border: 1px solid #c4c4c4;
            clear: both;
            overflow: hidden;
        }
        .top_spac{ margin: 20px 0 0;}


        .recent_heading {float: left; width:40%;}
        .srch_bar {
            display: inline-block;
            text-align: right;
            width: 60%; padding:
        }
        .headind_srch{ padding:10px 29px 10px 20px; overflow:hidden; border-bottom:1px solid #c4c4c4;}

        .recent_heading h4 {
            color: #05728f;
            font-size: 21px;
            margin: auto;
        }
        .srch_bar input{ 
            border:1px solid #cdcdcd; 
            border-width:0 0 1px 0; 
            width:80%; padding:2px 0 4px 6px; 
            background:none;
        }
        .srch_bar .input-group-addon button {
            background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
            border: medium none;
            padding: 0;
            color: #707070;
            font-size: 18px;
        }
        .srch_bar .input-group-addon { margin: 0 0 0 -27px;}

        .chat_ib h5{ 
            font-size:15px; 
            color:#464646; 
            margin:0 0 8px 0;
        }
        .chat_ib h5 span{ font-size:13px; float:right;}
        .chat_ib p{ 
            font-size:14px; 
            color:#989898; 
            margin:auto;
            white-space: nowrap;
        }
        .chat_img {
            float: left;
            width: 11%;
        }
        .chat_ib {
            float: left;
            padding: 0 0 0 15px;
            width: 88%;
        }

        .chat_people{ overflow:hidden; clear:both;}
        .chat_list {
            border-bottom: 1px solid #c4c4c4;
            margin: 0;
            padding: 18px 16px 10px;
        }
        .inbox_chat { height: 60vh; overflow-y: scroll;}

        .active_chat{ background:#ebebeb;}

        .incoming_msg_img {
            display: inline-block;
            width: 6%;
        }
        .received_msg {
            display: inline-block;
            padding: 0 0 0 10px;
            vertical-align: top;
            width: 92%;
        }
        .received_withd_msg p {
            background: #ebebeb none repeat scroll 0 0;
            border-radius: 3px;
            color: #646464;
            font-size: 14px;
            margin: 0;
            padding: 5px 10px 5px 12px;
            width: 100%;
        }
        .time_date {
            color: #747474;
            display: block;
            font-size: 12px;
        }
        .received_withd_msg { width: 57%;}
        .mesgs {
            float: left;
            padding: 30px 15px 0 25px;
            width: 60%;
        }

        .sent_msg p {
            background: #05728f none repeat scroll 0 0;
            border-radius: 3px;
            font-size: 14px;
            margin: 0; color:#fff;
            padding: 5px 10px 5px 12px;
            width:100%;
        }
        .outgoing_msg{ overflow:hidden; margin:10px 0 10px;}
        .sent_msg {
            float: right;
            width: 46%;
        }
        .input_msg_write input {
            background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
            border: medium none;
            color: #4c4c4c;
            font-size: 15px;
            min-height: 48px;
            width: 100%;
        }

        .type_msg {border-top: 1px solid #c4c4c4;position: relative;}
        .msg_send_btn {
            background: #05728f none repeat scroll 0 0;
            border: medium none;
            border-radius: 50%;
            color: #fff;
            cursor: pointer;
            font-size: 17px;
            height: 33px;
            position: absolute;
            right: 0;
            top: 11px;
            width: 33px;
        }
        .messaging { padding: 0 0 50px 0;}
        .msg_history {
            height: 60vh;
            overflow-y: auto;
        }
    </style>
@endpush

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="">Live Chat</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active">Live Chat</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="messaging">
        <div class="inbox_msg">
            <div class="inbox_people">
                <div class="headind_srch">
                    <div class="recent_heading">
                        <h4>Member List</h4>
                    </div>

                </div>
                <div class="inbox_chat">
                    
                </div>
            </div>
            <div class="mesgs">
                <div class="msg_history">
                    
                </div>
                <div class="type_msg">
                    <form method="post">
                        @csrf
                        <div class="input_msg_write">
                            <input type="text" name="message" class="write_msg form-control" placeholder="Type a message" />
                            <input type="hidden" id="user_id" name="user_id">
                            <button type="submit" class="msg_send_btn btn" id="submit_form"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      
    </div>

</section>
<!-- /.content -->

@endsection

@push('js')

<script src="{{asset('assets/plugins/moment/moment.min.js')}}"></script>
<script>

$(document).ready(function () {
    let user_list = [];
    let user_id = 0;

    $(document).on('click', '#submit_form', function (e) {
        e.preventDefault();
        let token   = $("input[name='_token']").val();
        let message = $("input[name='message']").val();
        let user_id = $("input[name='user_id']").val();
        
        if (message != '') {
            $.ajax({
                type: "POST",
                url: "{{route('admin.connection.store.chat')}}",
                data: {
                    '_token' : token,
                    'message': message,
                    'user_id': user_id
                },
                dataType: "JSON",
                success: function (response) {

                    if (response.alert == 'success') {
                        $("input[name='message']").val('')
                        showLiveChatMessage(user_id);
                        liveChatUserList();
                    }
                    
                },
                error: function(e) {
                    console.log(e);
                }
            });
        }
        
    })


    function liveChatUserList() {

        $.ajax({
            type: "GET",
            url: "{{route('admin.connection.live.chat.user.list')}}",
            dataType: "JSON",
            success: function (response) {
                
                if (response != '') {
                    
                    // let data = '';

                    $.each(response, function (key, val) {
                        if (user_list.indexOf(val.user_id) >= 0) return;
                        
                        let className = '';
                        if (key == 0) {
                            className = 'active_chat';

                            // Get this function to this var
                            $('input#user_id').val(val.user_id);
                            user_id = val.user_id;

                        } else {
                            className = '';
                        }

                        let img = '';  
                        if (val.user.avatar != 'default.png') {
                            img = '/uploads/member/'+val.user.avatar;
                        } else {
                            img = 'https://ptetutorials.com/images/user-profile.png';
                        }
                        
                        user_list.push(val.user_id);
                        
                        data = '<div class="chat_list cursor-pointer '+className+'" id="showUserChat" data-id="'+val.user_id+'">';
                        data += '<div class="chat_people">';
                        data += '<div class="chat_img"> <img src="'+img+'" alt="'+val.user.name+'"> </div>';
                        data += '<div class="chat_ib">';
                        data += '<h5>'+val.user.name+'</h5>';
                        data += '<p>'+val.message+'</p>';
                        data += '</div>';
                        data += '</div>';
                        data += '</div>';
                        
                        $('.inbox_chat').append(data);
                    });
                    
                    
                }
            }
        });
    }
    
    function showLiveChatMessage(user_id) {
        
        $.ajax({
            type: "GET",
            url: "/admin/connection/live-chat-list/"+user_id,
            dataType: "JSON",
            success: function (response) {
                
                let img = '';  
                if (response.avatar != 'default.png') {
                    img = '/uploads/member/'+response.avatar;
                } else {
                    img = 'https://ptetutorials.com/images/user-profile.png';
                }

                let data = '';
                $.each(response.chats, function (key, val) { 
                    
                    if (val.admin_message_log == 'incoming') {
                        
                        data += '<div class="incoming_msg">';
                        data += '<div class="incoming_msg_img"> <img src="'+img+'" alt="sunil"> </div>';
                        data += '<div class="received_msg mb-2">';
                        data += '<div class="received_withd_msg">';
                        data += '<p>'+val.message+'</p>';
                        data += '<span class="time_date">'+moment(val.created_at).format('LLL')+'</span>';
                        data += '</div>';
                        data += '</div>';
                        data += '</div>';
                        
                    } else {
                        data += '<div class="outgoing_msg">';
                        data += '<div class="sent_msg">';
                        data += '<p>'+val.message+'</p>';
                        data += '<span class="time_date">'+moment(val.created_at).format('LLL')+'</span> ';
                        data += '</div>';
                        data += '</div>';
                    }  
                });

                $('.msg_history').html(data);
            }
        });
        
    }
    
    // Show Single User Message
    $(document).on('click', '#showUserChat', function (e) {
        user_id = $(this).data('id');
        $('.chat_list').removeClass('active_chat');
        $(this).addClass('active_chat');
        $('input#user_id').val(user_id);

        showLiveChatMessage(user_id);

        $.ajax({
            type: "GET",
            url: '/admin/connection/live-chat/status/'+user_id,
            dataType: "JSON",
            success: function (response) {
                console.log(response);
            }
        });
        
    });

    showLiveChatMessage(user_id);
    liveChatUserList();

    setInterval(function () {
        showLiveChatMessage(user_id);
        liveChatUserList();
    }, 5000);

});
    
</script>
@endpush