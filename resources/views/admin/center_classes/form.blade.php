<div class="row mb-4">
    <label for="title" class="col-sm-2 col-form-label"> العنوان </label>
    <div class="col-sm-10">
        <input name="title" type="text" id="title" placeholder="أدخل العنوان"
            value="{{ old('title', $center_class->title) }}" class="form-control @error('title') is-invalid @enderror">
        @error('title')
            <p class="invalid-feedback">{{ $message }}</p>
        @enderror
    </div>
</div>
<div class="row mb-4">
    <label for="age" class="col-sm-2 col-form-label"> العمر </label>
    <div class="col-sm-10">
        <input name="age" type="text" id="age" placeholder="أدخل العمر"
            value="{{ old('age', $center_class->age) }}" class="form-control @error('age') is-invalid @enderror">
        @error('age')
            <p class="invalid-feedback">{{ $message }}</p>
        @enderror
    </div>
</div>
<div class="row mb-4">
    <label for="teacher_name" class="col-sm-2 col-form-label">أسم المعلمه</label>
    <div class="col-sm-10">
        <input name="teacher_name" type="text" id="teacher_name" placeholder="أدخل اسم المعلمه"
            value="{{ old('teacher_name', $center_class->teacher_name) }}"
            class="form-control @error('teacher_name') is-invalid @enderror">
        @error('teacher_name')
            <p class="invalid-feedback">{{ $message }}</p>
        @enderror
    </div>
</div>
<div class="row mb-4">
    <label for="parent_id" class="col-sm-2 col-form-label">الحاله </label>
    <div class="col-sm-10">
        <select name="status" class="form-select @error('status') is-invalid @enderror"">
            <option value="عرض" @if ($center_class->status == 'عرض' or old('status') == 'عرض') selected @endif>عرض
            </option>
            <option value="أخفاء" @if ($center_class->status == 'أخفاء' or old('status') == 'أخفاء') selected @endif>أخفاء
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
        <input name="image" type="file" id="image"
            class="form-control mb-3 @error('image') is-invalid @enderror">
        @error('image')
            <p class="invalid-feedback">{{ $message }}</p>
        @enderror
        <img id="image" src="{{ asset('storage/' . $center_class->image) }}" style="height: 80px; width: 100px;"
            alt="no image uploaded">
    </div>
</div>

<div class="text-center">
    <button type="submit" class="btn btn-primary">حفظ</button>
</div>
