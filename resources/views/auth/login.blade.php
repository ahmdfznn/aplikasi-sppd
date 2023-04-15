<x-auth>
    <x-slot:title>{{ $title }}</x-slot>
        <div class="flex w-full flex-col items-center relative mt-20">
            <img src="{{ url('icon/logo.png') }}" alt="" class="w-32 absolute -top-40">
            <h1 class="relative text-2xl text-gray-500 font-bold text-center">Aplikasi SPPD Sekretariat
                Daerah<br>Kabupaten
                Tasikmalaya</h1>
            <form action="{{ url('login') }}" method="post" class="flex flex-col items-start w-full mt-3">
                @csrf
                <div class="w-full flex flex-col">
                    <x-label class="hidden" for="username" :value="__('username')" id="label-username" />
                    <x-text-input placeholder="Enter your username..." id="username" name="username" required autofocus
                        autocomplete="off" />
                </div>
                <div class="w-full flex flex-col">
                    <x-label class="hidden" for="password" :value="__('Password')" id="label-password" />
                    <div class="flex items-center">
                        <x-text-input type="password" placeholder="Enter your password..." id="password"
                            name="password" required class="relative" />
                    </div>
                    <div class="flex">
                        <input type="checkbox" name="remember" id="remember" class="mr-2">
                        <x-label for="remember" class="text-base" :value="__('Remember me')" />
                    </div>
                </div>
                <x-submit-button :value="__('Sign in')" />
                <p>Don't have an account?<a href="{{ url('register') }}" class="text-blue-600">register here!</a></p>
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
                    $(this).attr('placeholder', 'Enter your username...')
                }
            })


            // Input password on focus
            $('#password').on('focus', function() {
                $('#label-password').css('display', 'inline')
                $(this).attr('placeholder', '')
            })

            $('#password').on('blur', function() {
                if ($(this).val() == '') {
                    $('#label-password').css('display', 'none')
                    $(this).attr('placeholder', 'Enter your password...')
                }
            })

            // Show and hidden password
            $(document).ready(function() {
                $('#show').on('click', function() {
                    if ($(this).is(':checked')) {
                        $('#password').attr('type', 'text')
                    } else {
                        $('#password').attr('type', 'password')
                    }
                })
            })
        </script>
</x-auth>
