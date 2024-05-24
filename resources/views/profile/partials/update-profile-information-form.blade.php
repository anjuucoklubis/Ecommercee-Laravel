<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>
        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>
    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>
    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
            <div>
                <p class="text-sm mt-2 text-gray-800">
                    {{ __('Your email address is unverified.') }}

                    <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        {{ __('Click here to re-send the verification email.') }}
                    </button>
                </p>
                @if (session('status') === 'verification-link-sent')
                <p class="mt-2 font-medium text-sm text-green-600">
                    {{ __('A new verification link has been sent to your email address.') }}
                </p>
                @endif
            </div>
            @endif
        </div>
        <div>
            <x-input-label for="city_id" :value="__('City')" />
            <span class="input-group-text">{{ $user->city->city_name }}</span>
            <p class="mt-1 text-sm text-gray-600">
                {{ __("Update your City") }}
            </p>
            <div class="d-flex flex-row">
                <br>
                <div class="col-md-5 mb-0">
                    <span class="input-group-text">Pilih Provinsi</span>
                    <select class="form-select" name="province_profile" id="province_profile">
                        <option value="">Pilih Provinsi</option>
                        @foreach($province as $prov)
                        <option value="{{ $prov->id }}">{{ $prov->province }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-5 mb-0">
                    <span class="input-group-text">Pilih Kota</span>
                    <select class="form-select" name="city_id" id="city_id">
                        <option value="">Pilih Kota</option>
                        @foreach($cities as $cityId => $cityName)
                        <option value="{{ $cityId }}">{{ $cityName }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <x-input-error class="mt-2" :messages="$errors->get('city_id')" />
        </div>
        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
            @if (session('status') === 'profile-updated')
            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="province_profile"]').on('change', function() {
                var provinceId = $(this).val();
                if (provinceId) {
                    $.ajax({
                        url: 'getCityy/ajax/' + provinceId,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            var $citySelect = $('select[name="city_id"]');
                            $citySelect.empty();
                            $.each(data, function(key, value) {
                                $citySelect.append('<option value="' + key + '" data-city-id="' + key + '">' + value + '</option>');
                            });
                        }
                    });
                } else {
                    $('select[name="city_id"]').empty();
                }
            });
            $('select[name="city_id"]').on('change', function() {
                var selectedCityId = $(this).find(':selected').data('city-id');
                $('#selected_city_id').val(selectedCityId);
            });
        });
    </script>
</section>