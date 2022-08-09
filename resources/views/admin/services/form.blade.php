<div class="row mb-4">
    <label for="title" class="col-sm-2 col-form-label"> العنوان </label>
    <div class="col-sm-10">
        <input name="title" type="text" id="title" placeholder="أدخل العنوان"
            value="{{ old('title', $service->title) }}" class="form-control @error('title') is-invalid @enderror">
        @error('title')
            <p class="invalid-feedback">{{ $message }}</p>
        @enderror
    </div>
</div>
<div class="row mb-4">
    <label for="age" class="col-sm-2 col-form-label"> العمر </label>
    <div class="col-sm-10">
        <input name="age" type="text" id="age" placeholder="أدخل العمر"
            value="{{ old('age', $service->age) }}" class="form-control @error('age') is-invalid @enderror">
        @error('age')
            <p class="invalid-feedback">{{ $message }}</p>
        @enderror
    </div>
</div>
<div class="row mb-4">
    <label for="description" class="col-sm-2 col-form-label">الوصف</label>
    <div class="col-sm-10">
        <textarea name="description" id="description" rows="3" placeholder="ادخل الوصف"
            class="col-sm-12 form-control @error('description') is-invalid @enderror">{{ old('description', $service->description) }}</textarea>
        @error('description')
            <p class="invalid-feedback">{{ $message }}</p>
        @enderror
    </div>
</div>
<div class="row mb-4">
    <label for="advantage" class="col-sm-2 col-form-label">الميزه</label>
    <div class="col-sm-10">
        <textarea name="advantage" id="advantage" rows="3" placeholder="ادخل الوصف"
            class="col-sm-12 form-control @error('advantage') is-invalid @enderror">{{ old('advantage', $service->advantage) }}</textarea>
        @error('advantage')
            <p class="invalid-feedback">{{ $message }}</p>
        @enderror
    </div>
</div>
<div class="row mb-4">
    <label for="parent_id" class="col-sm-2 col-form-label">الحاله </label>
    <div class="col-sm-10">
        <select name="status" class="form-select @error('status') is-invalid @enderror"">
            <option value="عرض" @if ($service->status == 'عرض' or old('status') == 'عرض') selected @endif>عرض
            </option>
            <option value="أخفاء" @if ($service->status == 'أخفاء' or old('status') == 'أخفاء') selected @endif>أخفاء
            </option>
        </select>
        @error('status')
            <p class="invalid-feedback">{{ $message }}</p>
        @enderror
    </div>
</div>
<div class="row mb-4">
    <label class="col-sm-2 col-form-label">الصوره</label>
    <div class="col-sm-10">
        <input name="image" type="file"
            onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])"
            class="form-control mb-3 @error('image') is-invalid @enderror">
        @error('image')
            <p class="invalid-feedback">{{ $message }}</p>
        @enderror
        <img id="image" src="{{ asset('storage/' . $service->image) }}" style="height: 80px; width: 100px;"
            alt="no image uploaded">
    </div>
</div>

<div class="text-center">
    <button type="submit" class="btn btn-primary">حفظ</button>
</div>
