<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="card-body">  
        <div class="alert alert-success" id="sentSuccess" style="display: none;"></div>
    <form>
        <div>
            <x-input-label for="Phone" :value="__('Phone')" />
            <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" placeholder="01*********" />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>

        <div class="mt-2" id="recaptcha-container"></div>

        <div class="flex items-center justify-center mt-4">
            <x-primary-button class="ms-3">
                {{ __('Send') }}
            </x-primary-button>
        </div>
    </form>
    </div>
    @section('js')
    <script src="https://www.gstatic.com/firebasejs/6.0.2/firebase.js"></script>
  
    <script>
          
        const firebaseConfig = {
            apiKey: "AIzaSyC2AiqOJ3CcKRcfappz54GNxlZNnmQLL5U",
            authDomain: "penta-b0191.firebaseapp.com",
            projectId: "penta-b0191",
            storageBucket: "penta-b0191.appspot.com",
            messagingSenderId: "1003768044641",
            appId: "1:1003768044641:web:9f058dbb53a3a13dadde20",
            measurementId: "G-ZT88HEGVXH"
        };
    
      firebase.initializeApp(firebaseConfig);
    </script>
    <script type="text/javascript">
  
        window.onload=function () {
          render();
        };
      
        function render() {
            window.recaptchaVerifier=new firebase.auth.RecaptchaVerifier('recaptcha-container');
            recaptchaVerifier.render();
        }
      
        function SendCode() {
               
            var number = $("#phone").val().replace(/^0/, '+20');
              
            firebase.auth().signInWithPhoneNumber(number,window.recaptchaVerifier).then(function (confirmationResult) {
                  
                window.confirmationResult=confirmationResult;
                coderesult=confirmationResult;   
                
                $("#sentSuccess").text("Message Sent Successfully.");
                $("#sentSuccess").show();
                setTimeout(() => { 
                    $("#sentSuccess").hide();
                }, 2000);
                  
            }).catch(function (error) {
                $("#error").text(error.message);
                $("#error").show();
                setTimeout(() => {
                    $("#error").hide();
                }, 2000);
            });
      
        }
      
    </script>
    @endsection
</x-guest-layout>
