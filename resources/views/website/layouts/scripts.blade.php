
<script src="{{asset('website/js/jquery-1.11.1.min.js')}}"></script>
<script src="{{asset('website/js/jquery.time-to.min.js')}}"></script>
<script src="{{asset('website/js/bootstrap.min.js')}}"></script>
<script src="{{asset('website/js/all.min.js')}}"></script>
<script src="{{asset('website/js/wow.min.js')}}"></script>

<!-- Validation js (Parsleyjs) -->

<script type="text/javascript" src="{{asset('admin/assets/plugins/parsleyjs/dist/parsley.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script>

    $(document).ready(function() {
        $('form').parsley();
    });
</script>
<!-- Toastr js -->
<script src="{{asset('admin/assets/plugins/toastr/toastr.min.js')}}"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    // Initialize Firebase
    var config = {
        apiKey: "AIzaSyDYkaLf81OdUKQrb5ASJMfLRAo-zZGbhTQ",
        authDomain: "mycar-part.firebaseapp.com",
        databaseURL: "https://mycar-part.firebaseio.com",
        projectId: "mycar-part",
        storageBucket: "",
        messagingSenderId: "439752799792",
        appId: "1:439752799792:web:252944a701d8d363"
    };
    firebase.initializeApp(config);

    // Retrieve Firebase Messaging object.
    const messaging = firebase.messaging();

    messaging.requestPermission().then(function() {
        console.log('Notification permission granted.');
        // TODO(developer): Retrieve an Instance ID token for use with FCM.
        // ...
        getRegToken();


    }).catch(function(err) {
        console.log('Unable to get permission to notify.', err);
    });




    function getRegToken(){
        // Get Instance ID token. Initially this makes a network call, once retrieved
        // subsequent calls to getToken will return from cache.
        messaging.getToken().then(function(currentToken) {
            if (currentToken) {
                console.log(currentToken);
                saveTokenInDatabase(currentToken);
                // updateUIForPushEnabled(currentToken);
                setTokenSentToServer(true);
            } else {
                // Show permission request.
                console.log('No Instance ID token available. Request permission to generate one.');
                // Show permission UI.
                // updateUIForPushPermissionRequired();
                setTokenSentToServer(false);
            }
        }).catch(function(err) {
            console.log('An error occurred while retrieving token. ', err);
            //   showToken('Error retrieving Instance ID token. ', err);
            //   setTokenSentToServer(false);
        });
    }


    function setTokenSentToServer(sent) {
        window.localStorage.setItem('sentToServer', sent ? '1' : '0');
    }

    function isTokenSentToServer() {
        return window.localStorage.getItem('sentToServer') === '1';
    }

    function saveTokenInDatabase(currentToken){

        if (userId) {
            $.ajax({
                type: "POST",
                url: url,
                data: {id: userId, token: currentToken},
                success: function (data) {
                    console.log('token saved in database successfully')
                }
            });
        }

    }

    messaging.onMessage(
        alert('hello')
        //     (payload) => {
        //     console.log('Message received. ', payload);
        //     // [START_EXCLUDE]
        //     // Update the UI to include the received message.
        //     // appendMessage(payload);
        //     // [END_EXCLUDE]
        // }
    );

    // messaging.onMessage(function(payload) {
    //     alert('received');
    //     console.log('Message received. ', payload);
    //     //        title = payload.data.title;
    //     //        options = {
    //     //            'body':payload.data.body,
    //     //            'icon':payload.data.icon,
    //     //            'image':payload.data.image,
    //     //        };
    //
    //     // $('#notifyPanel').prepend(
    //     //
    //     //     '<li class="list-group-item"> '+
    //     //     '<a href="'+payload.data.click_action+'" class="user-list-item"><span class="name">'+payload.data.username+'</span>'+
    //     //     '<div class="avatar">'+
    //     //     '<img src="'+payload.data.image+'" alt="">'+
    //     //     '</div>'+
    //     //     '<div class="user-desc">'+
    //     //     '<span class="name">'+payload.data.title+'</span><span class="desc"> '+payload.data.body+' </span>'+
    //     //     '</div>'+
    //     //     '</a>'+
    //     //     '</li>'
    //     // );
    //
    //     // var sound = document.getElementById("myAudio");
    //     // if(sound.play()){
    //     //     console.log('sound played well');
    //     // }
    //     // else
    //     // {
    //     //     console.log('can not be played');
    //     // }
    //
    //
    //     toastr.options = {
    //         "closeButton": false,
    //         "debug": false,
    //         "newestOnTop": false,
    //         "progressBar": false,
    //         "positionClass": "toast-top-right",
    //         "preventDuplicates": false,
    //         "onclick": null,
    //         "showDuration": "300",
    //         "hideDuration": "1000",
    //         "timeOut": "20000",
    //         "extendedTimeOut": "20000",
    //         "showEasing": "swing",
    //         "hideEasing": "linear",
    //         "showMethod": "fadeIn",
    //         "hideMethod": "fadeOut"
    //     }
    //
    //     toastr["success"](payload.data.title,payload.data.body);
    //
    //
    // });

</script>

@yield('scripts')

<script src="{{asset('website/js/script.js')}}"></script>



