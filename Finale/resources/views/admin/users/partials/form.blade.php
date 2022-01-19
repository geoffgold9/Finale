@csrf
                            <div class="form-group">
                                <label for="name" class="sr-only">Name</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }} @isset($user) {{$user->name}} @endisset">
                            </div>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                            <div class="form-group">
                                <label for="email" class="sr-only">Email</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }} @isset($user) {{$user->email}} @endisset">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            @isset($create)
                            <div class="form-group mb-4">
                                <label for="password" class="sr-only">Password</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-check"> for="{{$role->name}}"
                                <input class="form-check-input" name="roles[]"
                                type ="checkbox" value="{{$role->id}}" id="{{$role->name}} "> 
                                @isset($user) @if(in_array($role->id, $user->roles, pluck ('id')->toArray)) checked @endif @endisset"> 
                            <label class="form-check-label" for="{{$role->name}}">
                                {{$role-name}}
                        </label>
                            </div>
                            @endisset
                                <button type="subtmit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection

