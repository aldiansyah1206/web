<x-guest-layout>
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg">
                    <div class="p-3">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Register</h1>
                        </div>
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf

                                    <!-- Name -->
                                    <div class="form-group">
                                        <x-text-input id="name"  placeholder="Nama" class="form-control form-control-user" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                    </div>

                                    <!-- Email Address -->
                                    <div class="form-group">
                                        <x-text-input id="email"  placeholder="Email" class="form-control form-control-user" type="email" name="email" :value="old('email')" required autocomplete="username" />
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                    </div>

                                    <!-- Password -->
                                    <div class="form-group">
                                        <x-text-input id="password" placeholder="Password" class="form-control form-control-user"
                                                        type="password"
                                                        name="password"
                                                        required autocomplete="new-password" />

                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                    </div>

                                    <!-- Confirm Password -->
                                    <div class="form-group">
                                        <x-text-input id="password_confirmation" placeholder="Konfirmasi Password" class="form-control form-control-user"
                                                        type="password"
                                                        name="password_confirmation" required autocomplete="new-password" />

                                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                    </div>

                                    <div class="text-center">
                                        
                                        <x-primary-button class="btn btn-primary btn-user btn-block">
                                            {{ __('Register') }}
                                        </x-primary-button>

                                        <a class="small" href="{{ route('login') }}">
                                            {{ __('Already have an account? Login!') }}
                                        </a>
                                    </div>
                                </form>
                    </div>
                </div>
            </div>
</x-guest-layout>
