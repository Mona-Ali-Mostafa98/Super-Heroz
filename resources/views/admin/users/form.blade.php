<div class="row mb-4">
    <label for="name" class="col-sm-2 col-form-label"> الاسم ثلاثى </label>
    <div class="col-sm-10">
        <input name="name" type="text" id="name" placeholder="أدخل الاسم ثلاثى"
            value="{{ old('name', $user->name) }}" class="form-control @error('name') is-invalid @enderror">
        @error('name')
            <p class="invalid-feedback">{{ $message }}</p>
        @enderror
    </div>
</div>
<div class="row mb-4">
    <label for="phone" class="col-sm-2 col-form-label"> رقم الهاتف </label>
    <div class="col-sm-10">
        <input name="phone" type="text" id="phone" placeholder="أدخل رقم الهاتف"
            value="{{ old('phone', $user->phone) }}" class="form-control @error('phone') is-invalid @enderror">
        @error('phone')
            <p class="invalid-feedback">{{ $message }}</p>
        @enderror
    </div>
</div>
<div class="row mb-4">
    <label for="email" class="col-sm-2 col-form-label"> البريد الالكترونى </label>
    <div class="col-sm-10">
        <input name="email" type="email" id="email" placeholder="أدخل البريد الالكترونى"
            value="{{ old('email', $user->email) }}" class="form-control @error('email') is-invalid @enderror">
        @error('email')
            <p class="invalid-feedback">{{ $message }}</p>
        @enderror
    </div>
</div>
<div class="row mb-4">
    <label for="password" class="col-sm-2 col-form-label"> كلمة المرور </label>
    <div class="col-sm-10">
        <input type="password" name="password" id="password" placeholder="أدخل كلمة المرور"
            value="{{ old('password', $user->password) }}" class="form-control @error('password') is-invalid @enderror">
        @error('password')
            <p class="invalid-feedback">{{ $message }}</p>
        @enderror
    </div>
</div>

<div class="row mb-4">
    <label class="col-sm-2 col-form-label">الصوره</label>
    <div class="col-sm-10">
        <input name="image" type="file"
            onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])"
            class="form-control mb-3 @error('image') is-invalid @enderror" value="{{ old('image', $user->image) }}">
        @error('image')
            <p class="invalid-feedback">{{ $message }}
            </p>
        @enderror
        <img id="image" src="{{ asset('storage/' . $user->image) }}" style="height: 80px; width: 100px;"
            alt="no image uploaded">
    </div>
</div>

<div class="text-center">
    <button type="submit" class="btn btn-primary">حفظ</button>
</div>
