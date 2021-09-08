{{--Name--}}
<div class="row form-group">
    <div class="col col-md-3">
        <label for="name" class=" form-control-label">Name</label>
    </div>
    <div class="col-12 col-md-9">
        <input type="text" id="name" name="name" placeholder="Enter Name"
               value="{{ old('name', isset($user) ? $user->name : '') }}"
               class="form-control @error('name') is-invalid @enderror">
        @error('name')
            <small class="error-block form-text">{{ $message }}</small>
        @enderror
    </div>
</div>

{{--Email--}}
<div class="row form-group">
    <div class="col col-md-3">
        <label for="email" class=" form-control-label">Email</label>
    </div>
    <div class="col-12 col-md-9">
        <input type="email" id="email" name="email" placeholder="Enter Email"
               value="{{ old('email', isset($user) ? $user->email : '') }}"
               class="form-control @error('email') is-invalid @enderror">
        @error('email')
            <small class="error-block form-text">{{ $message }}</small>
        @enderror
    </div>
</div>

{{--Password--}}
<div class="row form-group">
    <div class="col col-md-3">
        <label for="password" class=" form-control-label">Password</label>
    </div>
    <div class="col-12 col-md-9">
        <input type="password" id="password" name="password" placeholder="Enter Password"
               class="form-control @error('password') is-invalid @enderror">
        @error('password')
            <small class="error-block form-text">{{ $message }}</small>
        @enderror
    </div>
</div>

{{--Roles--}}
<div class="row form-group">
    <div class="col col-md-3">
        <label for="role" class=" form-control-label">Role</label>
    </div>
    <div class="col-12 col-md-9">
        <select name="role" id="role" class="form-control @error('role') is-invalid @enderror">
            <option>Please select user role</option>
            @foreach($roles as $role)
                <option value="{{ $role->id }}"
                        @if(isset($user) && $user->hasRole($role->slug)) selected @endif>
                    {{ $role->name }}
                </option>
            @endforeach
        </select>
        @error('role')
            <small class="error-block form-text">{{ $message }}</small>
        @enderror
    </div>
</div>

{{--Avatar--}}
<div class="row form-group">
    <div class="col col-md-3">
        <label for="avatar" class=" form-control-label">Avatar</label>
    </div>
    <div class="col-12 col-md-9">
        <input type="file" id="avatar" name="avatar" class="form-control-file">
    </div>
</div>
