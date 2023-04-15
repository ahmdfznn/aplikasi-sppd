<x-auth>
    <x-slot:title>{{ $title }}</x-slot>
        <div class="flex w-full flex-col items-center relative mt-20">
            <img src="{{ url('icon/logo.png') }}" alt="" class="w-32 absolute -top-40">
            <h1 class="relative text-2xl text-gray-500 font-bold text-center">Aplikasi SPPD Sekretariat
                Daerah<br>Kabupaten
                Tasikmalaya</h1>
            <form action="{{ url('register') }}" method="post" class="flex flex-col items-start w-full mt-3">
                @csrf
                <div class="w-full flex flex-col">
                    <x-label class="hidden" for="username" :value="__('username')" id="label-username" />
                    <x-text-input placeholder="Enter username..." name="username" id="username" required autofocus
                        autocomplete="off" />
                </div>
                <div class="w-full flex flex-col">
                    <x-label class="hidden" for="email" :value="__('Email')" id="label-email" />
                    <x-text-input placeholder="Enter email..." name="email" id="email" required
                        autocomplete="off" />
                </div>
                <div class="flex justify-between w-full">
                    <div class="w-[180px] flex flex-col">
                        <x-label class="hidden" for="password" :value="__('Password')" id="label-password" />
                        <x-text-input type="password" name="password" placeholder="Enter password..." id="password"
                            required />
                    </div>
                    <div class="w-[180px] flex flex-col">
                        <x-label class="hidden" for="repeatpassword" :value="__('Repeat Password')" id="label-repeatpassword" />
                        <x-text-input type="password" placeholder="Repeat password..." id="repeatpassword" required />
                        <p id="p"></p>
                    </div>
                </div>
                <x-submit-button :value="__('Register')" id="register-button" />
                <p>Already account?<a href="{{ url('login') }}" class="text-blue-600">login here!</a></p>
            </form>
        </div>
        <script>
            // Input username on focus
            $('#username').on('focus', function() {
                $('#label-username').css('display', 'inline')
                $(this).attr('placeholder', '')
            })

            $('#username').on('blur', function() {
                if ($(this).val() == '') {
                    $('#label-username').css('display', 'none')
                    $(this).attr('placeholder', 'Enter username...')
                }
            })


            // Input password on focus
            $('#email').on('focus', function() {
                $('#label-email').css('display', 'inline')
                $(this).attr('placeholder', '')
            })

            $('#email').on('blur', function() {
                if ($(this).val() == '') {
                    $('#label-email').css('display', 'none')
                    $(this).attr('placeholder', 'Enter email...')
                }
            })

            // Input password on focus
            $('#password, #repeatpassword').on('focus', function() {
                $('#label-password').css('display', 'inline')
                $(this).attr('placeholder', '')
                $('#label-repeatpassword').css('display', 'inline')
                $('#repeatpassword').attr('placeholder', '')
            })

            $('#password, #repeatpassword').on('blur', function() {
                if ($(this).val() == '') {
                    $('#label-password').css('display', 'none')
                    $(this).attr('placeholder', 'Enter password...')
                }
                if ($('#repeatpassword').val() == '') {
                    $('#label-repeatpassword').css('display', 'none')
                    $('#repeatpassword').attr('placeholder', 'Enter repeat password...')
                }
            })

            // check password
            $('#repeatpassword').on('keyup', function() {
                if ($('#password').val() !== $('#repeatpassword').val()) {
                    $('#p').html('password tidak sama')
                }
                if ($('#password').val() == $('#repeatpassword').val()) {
                    $('#p').html('')
                }
                if ($('#repeatpassword').val() == '') {
                    $('#p').html('')
                }
            })
        </script>
</x-auth>
