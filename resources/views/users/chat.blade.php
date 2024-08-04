@extends('admin.layouts.master').
@section('tittle')
Chat
@endsection
@section('content')
<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>

<link rel="stylesheet" href="{{ asset('chat.css') }}">
<div class="container-xl flex-grow-1 container-p-y">
    <!-- char-area -->
    <div class="row">
        <section class="message-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="chat-area">
                            <!-- chatlist -->
                            <div class="chatlist">
                                <div class="modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="chat-header">
                                            <div class="msg-search">
                                                <input type="text" class="form-control" id="inlineFormInputGroup"
                                                    placeholder="Search" aria-label="search">
                                                <a class="add" href="#"><img class="img-fluid"
                                                        src="https://mehedihtml.com/chatbox/assets/img/add.svg"
                                                        alt="add"></a>
                                            </div>

                                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link active" id="Open-tab" data-bs-toggle="tab"
                                                        data-bs-target="#Open" type="button" role="tab"
                                                        aria-controls="Open" aria-selected="true">Open</button>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link" id="Closed-tab" data-bs-toggle="tab"
                                                        data-bs-target="#Closed" type="button" role="tab"
                                                        aria-controls="Closed" aria-selected="false">Closed</button>
                                                </li>
                                            </ul>
                                        </div>

                                        <div class="modal-body">
                                            <!-- chat-list -->
                                            <div class="chat-lists">
                                                <div class="tab-content" id="myTabContent">
                                                    <div class="tab-pane fade show active" id="Open" role="tabpanel"
                                                        aria-labelledby="Open-tab">
                                                        <!-- chat-list -->
                                                        <div class="chat-list chatListOpen">
                                                        </div>
                                                        <!-- chat-list -->
                                                    </div>
                                                    <div class="tab-pane fade" id="Closed" role="tabpanel"
                                                        aria-labelledby="Closed-tab">

                                                        <!-- chat-list -->
                                                        <div class="chat-list">
                                                            <a href="#" class="d-flex align-items-center">
                                                                <div class="flex-shrink-0">
                                                                    <img class="img-fluid"
                                                                        src="https://mehedihtml.com/chatbox/assets/img/user.png"
                                                                        alt="user img">
                                                                    <span class="active"></span>
                                                                </div>
                                                                <div class="flex-grow-1 ms-3">
                                                                    <h3>Mehedi Hasan</h3>
                                                                    <p>front end developer</p>
                                                                </div>
                                                            </a>
                                                            <a href="#" class="d-flex align-items-center">
                                                                <div class="flex-shrink-0">
                                                                    <img class="img-fluid"
                                                                        src="https://mehedihtml.com/chatbox/assets/img/user.png"
                                                                        alt="user img">
                                                                </div>
                                                                <div class="flex-grow-1 ms-3">
                                                                    <h3>Ryhan</h3>
                                                                    <p>front end developer</p>
                                                                </div>
                                                            </a>
                                                            <a href="#" class="d-flex align-items-center">
                                                                <div class="flex-shrink-0">
                                                                    <img class="img-fluid"
                                                                        src="https://mehedihtml.com/chatbox/assets/img/user.png"
                                                                        alt="user img">
                                                                </div>
                                                                <div class="flex-grow-1 ms-3">
                                                                    <h3>Malek Hasan</h3>
                                                                    <p>front end developer</p>
                                                                </div>
                                                            </a>
                                                            <a href="#" class="d-flex align-items-center">
                                                                <div class="flex-shrink-0">
                                                                    <img class="img-fluid"
                                                                        src="https://mehedihtml.com/chatbox/assets/img/user.png"
                                                                        alt="user img">
                                                                </div>
                                                                <div class="flex-grow-1 ms-3">
                                                                    <h3>Sadik Hasan</h3>
                                                                    <p>front end developer</p>
                                                                </div>
                                                            </a>
                                                            <a href="#" class="d-flex align-items-center">
                                                                <div class="flex-shrink-0">
                                                                    <img class="img-fluid"
                                                                        src="https://mehedihtml.com/chatbox/assets/img/user.png"
                                                                        alt="user img">
                                                                </div>
                                                                <div class="flex-grow-1 ms-3">
                                                                    <h3>Bulu </h3>
                                                                    <p>front end developer</p>
                                                                </div>
                                                            </a>
                                                            <a href="#" class="d-flex align-items-center">
                                                                <div class="flex-shrink-0">
                                                                    <img class="img-fluid"
                                                                        src="https://mehedihtml.com/chatbox/assets/img/user.png"
                                                                        alt="user img">
                                                                </div>
                                                                <div class="flex-grow-1 ms-3">
                                                                    <h3>Maria SK</h3>
                                                                    <p>front end developer</p>
                                                                </div>
                                                            </a>
                                                            <a href="#" class="d-flex align-items-center">
                                                                <div class="flex-shrink-0">
                                                                    <img class="img-fluid"
                                                                        src="https://mehedihtml.com/chatbox/assets/img/user.png"
                                                                        alt="user img">
                                                                </div>
                                                                <div class="flex-grow-1 ms-3">
                                                                    <h3>Dipa Hasan</h3>
                                                                    <p>front end developer</p>
                                                                </div>
                                                            </a>
                                                            <a href="#" class="d-flex align-items-center">
                                                                <div class="flex-shrink-0">
                                                                    <img class="img-fluid"
                                                                        src="https://mehedihtml.com/chatbox/assets/img/user.png"
                                                                        alt="user img">
                                                                </div>
                                                                <div class="flex-grow-1 ms-3">
                                                                    <h3>Jhon Hasan</h3>
                                                                    <p>front end developer</p>
                                                                </div>
                                                            </a>
                                                            <a href="#" class="d-flex align-items-center">
                                                                <div class="flex-shrink-0">
                                                                    <img class="img-fluid"
                                                                        src="https://mehedihtml.com/chatbox/assets/img/user.png"
                                                                        alt="user img">
                                                                </div>
                                                                <div class="flex-grow-1 ms-3">
                                                                    <h3>Tumpa Moni</h3>
                                                                    <p>front end developer</p>
                                                                </div>
                                                            </a>
                                                            <a href="#" class="d-flex align-items-center">
                                                                <div class="flex-shrink-0">
                                                                    <img class="img-fluid"
                                                                        src="https://mehedihtml.com/chatbox/assets/img/user.png"
                                                                        alt="user img">
                                                                </div>
                                                                <div class="flex-grow-1 ms-3">
                                                                    <h3>Payel Akter</h3>
                                                                    <p>front end developer</p>
                                                                </div>
                                                            </a>
                                                            <a href="#" class="d-flex align-items-center">
                                                                <div class="flex-shrink-0">
                                                                    <img class="img-fluid"
                                                                        src="https://mehedihtml.com/chatbox/assets/img/user.png"
                                                                        alt="user img">
                                                                </div>
                                                                <div class="flex-grow-1 ms-3">
                                                                    <h3>Baby Akter</h3>
                                                                    <p>front end developer</p>
                                                                </div>
                                                            </a>
                                                            <a href="#" class="d-flex align-items-center">
                                                                <div class="flex-shrink-0">
                                                                    <img class="img-fluid"
                                                                        src="https://mehedihtml.com/chatbox/assets/img/user.png"
                                                                        alt="user img">
                                                                </div>
                                                                <div class="flex-grow-1 ms-3">
                                                                    <h3>Zuwel Rana</h3>
                                                                    <p>front end developer</p>
                                                                </div>
                                                            </a>
                                                            <a href="#" class="d-flex align-items-center">
                                                                <div class="flex-shrink-0">
                                                                    <img class="img-fluid"
                                                                        src="https://mehedihtml.com/chatbox/assets/img/user.png"
                                                                        alt="user img">
                                                                </div>
                                                                <div class="flex-grow-1 ms-3">
                                                                    <h3>Habib </h3>
                                                                    <p>front end developer</p>
                                                                </div>
                                                            </a>
                                                            <a href="#" class="d-flex align-items-center">
                                                                <div class="flex-shrink-0">
                                                                    <img class="img-fluid"
                                                                        src="https://mehedihtml.com/chatbox/assets/img/user.png"
                                                                        alt="user img">
                                                                </div>
                                                                <div class="flex-grow-1 ms-3">
                                                                    <h3>Jalal Ahmed</h3>
                                                                    <p>front end developer</p>
                                                                </div>
                                                            </a>
                                                            <a href="#" class="d-flex align-items-center">
                                                                <div class="flex-shrink-0">
                                                                    <img class="img-fluid"
                                                                        src="https://mehedihtml.com/chatbox/assets/img/user.png"
                                                                        alt="user img">
                                                                </div>
                                                                <div class="flex-grow-1 ms-3">
                                                                    <h3>Hasan Ali</h3>
                                                                    <p>front end developer</p>
                                                                </div>
                                                            </a>
                                                            <a href="#" class="d-flex align-items-center">
                                                                <div class="flex-shrink-0">
                                                                    <img class="img-fluid"
                                                                        src="https://mehedihtml.com/chatbox/assets/img/user.png"
                                                                        alt="user img">
                                                                </div>
                                                                <div class="flex-grow-1 ms-3">
                                                                    <h3>Mehedi Hasan</h3>
                                                                    <p>front end developer</p>
                                                                </div>
                                                            </a>

                                                        </div>
                                                        <!-- chat-list -->
                                                    </div>
                                                </div>

                                            </div>
                                            <!-- chat-list -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- chatlist -->



                            <!-- chatbox -->
                            <div class="chatbox">
                                <div class="modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="msg-head">
                                            <div class="row">
                                                <div class="col-8">
                                                    <div class="d-flex align-items-center receiverDetails" receiverId=""
                                                        roomId="">
                                                        <span class="chat-icon"><img class="img-fluid"
                                                                src="https://mehedihtml.com/chatbox/assets/img/arroleftt.svg"
                                                                alt="image title"></span>
                                                        <div class="flex-shrink-0">
                                                            <img class="img-fluid"
                                                                src="https://mehedihtml.com/chatbox/assets/img/user.png"
                                                                alt="user img">
                                                        </div>
                                                        <div class="flex-grow-1 ms-3">
                                                            <h3 class="name"></h3>
                                                            {{-- <p>front end developer</p> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <ul class="moreoption">
                                                        <li class="navbar nav-item dropdown">
                                                            <a class="nav-link dropdown-toggle" href="#" role="button"
                                                                data-bs-toggle="dropdown" aria-expanded="false"><i
                                                                    class="fa fa-ellipsis-v" aria-hidden="true"></i></a>
                                                            <ul class="dropdown-menu">
                                                                <li><a class="dropdown-item" href="#">Action</a>
                                                                </li>
                                                                <li><a class="dropdown-item" href="#">Another
                                                                        action</a></li>
                                                                <li>
                                                                    <hr class="dropdown-divider">
                                                                </li>
                                                                <li><a class="dropdown-item" href="#">Something else
                                                                        here</a></li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="modal-body">
                                            <div class="msg-body">
                                                <ul class="messages">

                                                    {{-- <li class="sender">
                                                        <p> Hey, Are you there? </p>
                                                        <span class="time">10:16 am</span>
                                                    </li>
                                                    <li class="repaly">
                                                        <p>yes!</p>
                                                        <span class="time">10:20 am</span>
                                                    </li>

                                                    <li>
                                                        <div class="divider">
                                                            <h6>Today</h6>
                                                        </div>
                                                    </li> --}}

                                                </ul>
                                            </div>
                                        </div>

                                        <div class="send-box">
                                            <form action="">
                                                <input type="text" name="msg" class="form-control" aria-label="message…"
                                                    placeholder="Write message…">

                                                <button type="button" class="sendMsg"><i class="fa fa-paper-plane"
                                                        aria-hidden="true"></i> Send</button>
                                            </form>

                                            <div class="send-btns">
                                                <div class="attach">
                                                    <div class="button-wrapper">
                                                        <span class="label">
                                                            <img class="img-fluid"
                                                                src="https://mehedihtml.com/chatbox/assets/img/upload.svg"
                                                                alt="image title"> attached file
                                                        </span>
                                                        <input type="file" name="upload" id="upload" class="upload-box"
                                                            placeholder="Upload File" aria-label="Upload File">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- chatbox -->


                    </div>
                </div>
            </div>
    </div>
</div>
</section>
<!-- char-area -->
</div>
{{-- @include('admin.layouts.footer') --}}

<script src="{{ asset('resources/js/jquery.js') }}"></script>
<script src="{{ asset('resources/js/socket.js') }}"></script>

<script>
    $().ready(function() {

       const socket = io('http://localhost:3000');

       const userId="{{ Auth::user()->id }}";
       //on connect
       socket.on('connect', () => {
           console.log('connected');
           socket.emit('usersListing',{userId:userId}); //send loggedUserId
       })

       // on disconnect
       socket.on("disconnect", () => {
           console.log(socket.id, "user disconnected");
       });

       // append users listing
       socket.on("usersListing", ({
           status,
           data:{users,newUsers}
       }) => {
           if (status) {
               const usersList = users.map((user) =>
                   `<a href="#" class="d-flex align-items-center users" userId=${user.id}>
                       <div class="flex-shrink-0">
                           <img class="img-fluid"
                               src="https://mehedihtml.com/chatbox/assets/img/user.png"
                               alt="user img">
                       </div>
                       <div class="flex-grow-1 ms-3">
                           <h3>${user.first_name} ${user.last_name}</h3>
                           <p>front end developer</p>
                       </div>
                   </a>`
                   );
               $('.chatListOpen').append(usersList)
           }
       });

       // on click user profile join room
       $(document).on('click','.users',function(){
           const receiverId = $(this).attr('userId');
           const receiverName = $(this).find('h3').text().trim();

           socket.emit('joinRoom',{senderId:userId,receiverId}); // emit socket
           const receiver=$('.receiverDetails');
           receiver.attr('receiverId',receiverId); //set receiver Id
           receiver.find('.name').text(receiverName);
       });

       //on join room receive
       socket.on('joinRoom',(params)=>{
           const {status,message,data:{chats, roomId}}=params;
           if(status){
               $('.receiverDetails').attr('roomId',roomId); // setting roomId

               $('.messages').html(''); // on room join empty the messages

               let appendMessage="";
               const messages=chats.map((chat)=>{

                   if(userId==chat.senderId){
                       appendMessage   +=` <li class="sender">
                           <p>${chat.message}</p>
                           <span class="time">10:32 am</span>
                           </li>`;
                   }else{
                         appendMessage +=`<li class="repaly">
                               <p>${chat.message}</p>
                               <span class="time">10:35 am</span>
                               </li>`;
                   }
               });

               $('.messages').append(appendMessage);
           }
       });

       $('.sendMsg').on('click',function(){
          const receiver= $('.receiverDetails'),
          receiverId=receiver.attr('receiverId'),
          roomId=receiver.attr('roomId'),
          senderId=userId;

           const input=$('input[name="msg"]'),
               message=input.val().trim();
           input.val('');

           if(message){
               const result={receiverId, senderId, message,roomId};
               socket.emit('msg',result); //send message
               // const messages = document.querySelector('.messages');
               // messages.scrollTop = messages.scrollHeight;
               // var chatMessages = $('.messages');
               // chatMessages.scrollTop(chatMessages[0].scrollHeight);

           }
       });

       //msg receive
       socket.on('msg',(params)=>{

           const {status, message, data:{id,senderId,messageType, message:msg}}=params;
           if(status){
               let appendMessage='';

               if(userId==senderId){
                    appendMessage=`<li class="repaly">
                                                       <p>${msg}</p>
                                                       <span class="time">10:20 am</span>
                                                   </li>`;
               }else{
                   appendMessage=`<li class="sender">
                                                   <p>${msg}</p>
                                                   <span class="time">10:16 am</span>
                                               </li>`;
               }

               $('.messages').append(appendMessage);
           }

       });

       $('form').on('submit',function(e){
           e.preventDefault();
       });

       $('input[name="msg"]').on('keydown',function(e){
           if(e.originalEvent.key==='Enter') $('.sendMsg').click();
       });

       $(".chat-list a").click(function() {
           $(".chatbox").addClass('showbox');
           return false;
       });

       $(".chat-icon").click(function() {
           $(".chatbox").removeClass('showbox');
       });

   });
</script>
@endsection