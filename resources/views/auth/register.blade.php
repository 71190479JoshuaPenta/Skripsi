<x-guest-layout>
   
    
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-label for="name" value="{{ __('Nama') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            
            
            <div class="mt-4">
                <x-label for="role_id" value="{{ __('Mendaftar Sebagai:') }}" />
                <select id="role_id" name="role_id" class="block mt-1 w-full  focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                    <option value="1">BPJS</option>
                    <option value="2">UMUM</option>


                </select>
            </div>

          

            <div>
                <x-label for="phone" value="{{ __('No.Telpon') }}" />
                <x-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required autofocus autocomplete="phone" />
            </div>

            <div>
                <x-label for="address" value="{{ __('Alamat') }}" />
                <x-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required autofocus autocomplete="address" />
            </div>
            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>
            <div>
                <x-label for="nik" value="{{ __('Nomor KTP') }}" />
                <x-input id="nik" class="block mt-1 w-full" type="text" name="nik" :value="old('name')" required autofocus autocomplete="nik" />
            </div>


            <div id="form-bpjs" class="mt-4">
                <x-label for="nomor_kartu" value="{{ __('Nomor Kartu BPJS') }}" />
                <x-input id="nomor_kartu" class="block mt-1 w-full" type="text" name="nomor_kartu"  />
            </div>


            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

        
            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
               


            </div>
        </form>
    </x-authentication-card>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <!-- <script>
        $(document).ready(function() {
    // Listen for change event on the "role_id" dropdown
    $('#role_id').on('change', function() {
        // Get the selected value
        var selectedRole = $(this).val();

        // Disable or enable the "nomor_kartu" field based on the selected role
        if (selectedRole === '2') {
            $('#nomor_kartu').prop('disabled', true);
        } else {
            $('#nomor_kartu').prop('disabled', false);
        }
    });
});
</script> -->
<script> 
    // Get references to the select field and text field
const selectField = document.getElementById("role_id");
const textField = document.getElementById("nomor_kartu");
const formbpjs = document.getElementById("form-bpjs");
// Add an event listener to the select field
selectField.addEventListener("change", function () {
  // Check the selected value
  let selectedValue = selectField.value;

  if (selectedValue == 2) {
    textField.value = 0;
    formbpjs.style.display = "none";
  } else {

    formbpjs.style.display = "block";
  }
});

</script>

</x-guest-layout>
