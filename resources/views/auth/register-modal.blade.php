<div class="modal fade"
    @if (isset($user))
        id="exampleModalCenter-{{$user->id}}"
    @else
        id="exampleModalCenter"
    @endif
    tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content col-md-12">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="col-lg-12">
                <div class="card-body">
                    <form method="POST"
                        @if (isset($user))
                            action="{{ url("user/{$user->id}") }}"
                        @else
                            action="{{ route('register') }}">
                        @endif
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                            <div class="col-md-8">
                                <input id="name" type="text"
                                class="form-control @error('name') is-invalid @enderror" name="name"
                                @if (isset($user))
                                    value="{{$user->name}}"
                                @endif
                                required autocomplete="name"
                                autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                            <div class="col-md-8">
                                <input id="email" type="email"
                                class="form-control @error('email') is-invalid @enderror"
                                name="email"
                                @if (isset($user))
                                    value="{{$user->email}}"
                                @endif
                                required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-check form-check-inline">
                            <label for="user_type" class="col-md-4 col-form-label text-md-right">{{ __('User Type') }}</label>
                            <div class="col-md-8 form-check-inline user_type_form">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="user_role" id="therapist" value={{1}}
                                @if (isset($user) && $user->role->first()->id === 1)
                                    checked
                                @endif
                                >
                                <label class="col-md-4 col-form-label text-md-right" for="flexRadioDefault1" >
                                    Tharepist
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="user_role" id="patient" value={{2}}
                                @if ( isset($user) && $user->role->first()->id === 2)
                                    checked
                                @endif>
                                <label class="col-md-4 col-form-label text-md-right" for="flexRadioDefault1">
                                    Patient
                                </label>
                            </div>
                            </div>
                                @error('user_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row" id="password_form" style="display: none;">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                            <select class="col-md-6" name="assigned_therapist" aria-label="Default select example">
                                <option value="silas">silas</option>
                                <option value="shashank">shashank</option>
                                <option value="Tyagi">Tyagi</option>
                            </select>
                        </div>
                        @if (!Auth::check())
                        <div class="form-group row" >
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                            <div class="col-md-8">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                            <div class="col-md-8">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        @endif
                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>
                            <div class="col-md-8">
                                <input type="tel" id="phone" name="phone" placeholder="9878878909"
                                    pattern="[789][0-9]{9}" class="form-control @error('phone') is-invalid @enderror"
                                    @if (isset($user))
                                        value="{{$user->phone}}"
                                    @endif
                                    required autocomplete="phone"
                                    autofocus
                                >
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>
                            <div class="col-md-8">
                                <textarea id="address"
                                    class="form-control"
                                    name="address"
                                    rows="4"
                                    cols="50"
                                    @if (isset($user))
                                        value = "{{$user->address}}"
                                    @endif
                                >
                                    @if (isset($user))
                                        {{$user->address}}
                                    @endif
                                </textarea>
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        @if (isset($user))
                            <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                        @else
                            <button type="submit" class="btn btn-primary">{{ __('Register') }}</button>
                        @endif
                    </form>
                </div>
            <div class="modal-footer">
        </div>
      </div>
    </div>
</div>


