<div class="row mb-4">
    <label for="name" class="col-sm-2 col-form-label"> الاسم </label>
    <div class="col-sm-10">
        <input name="name" type="text" id="name" placeholder="أدخل الاسم" value="{{ old('name', $admin->name) }}"
            class="form-control @error('name') is-invalid @enderror">
        @error('name')
            <p class="invalid-feedback">{{ $message }}</p>
        @enderror
    </div>
</div>

<div class="row mb-4">
    <label for="email" class="col-sm-2 col-form-label">البريد الالكترونى </label>
    <div class="col-sm-10">
        <input name="email" type="email" id="email" placeholder="ادخل عنوان البريدالالكترونى"
            value="{{ old('email', $admin->email) }}" class="form-control @error('email') is-invalid @enderror">
        @error('email')
            <p class="invalid-feedback">{{ $message }}</p>
        @enderror
    </div>
</div>

<div class="row mb-4">
    <label for="type" class="col-sm-2 col-form-label">النوع</label>
    <div class="col-sm-10">
        <select name="type" class="form-select @error('type') is-invalid @enderror"">
            <option value="أدمن" @if ($admin->type == 'أدمن' or old('type') == 'أدمن') selected @endif>أدمن
            </option>
            <option value="مدير الموقع" @if ($admin->type == 'مدير الموقع' or old('type') == 'مدير الموقع') selected @endif>مدير الموقع
            </option>
            <option value="سوبر أدمن" @if ($admin->type == 'سوبر أدمن' or old('type') == 'سوبر أدمن') selected @endif>سوبر أدمن
            </option>
        </select>
        @error('type')
            <p class="invalid-feedback">{{ $message }}</p>
        @enderror
    </div>
</div>

<div class="row mb-4">
    <label class="col-sm-2 col-form-label">الصوره</label>
    <div class="col-sm-10">
        <input name="image" type="file"
            onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])"
            class="form-control mb-3 @error('image') is-invalid @enderror" value="{{ old('image', $admin->image) }}">
        @error('image')
            <p class="invalid-feedback">{{ $message }}
            </p>
        @enderror
        <img id="image" src="{{ asset('storage/' . $admin->image) }}" style="height: 80px; width: 100px;"
            alt="no image uploaded">
    </div>
</div>
