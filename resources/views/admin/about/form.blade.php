<div class="row mb-4">
    <label for="title" class="col-sm-2 col-form-label"> العنوان </label>
    <div class="col-sm-10">
        <input name="title" type="text" id="title" placeholder="أدخل العنوان"
            value="{{ old('title', $about->title) }}" class="form-control @error('title') is-invalid @enderror">
        @error('title')
            <p class="invalid-feedback">{{ $message }}</p>
        @enderror
    </div>
</div>
<div class="row mb-4">
    <label for="description" class="col-sm-2 col-form-label">الوصف</label>
    <div class="col-sm-10">
        <textarea name="description" id="description" rows="3" placeholder="ادخل الوصف"
            class="col-sm-12 form-control @error('description') is-invalid @enderror">{{ old('description', $about->description) }}</textarea>
        @error('description')
            <p class="invalid-feedback">{{ $message }}</p>
        @enderror
    </div>
</div>
<div class="row mb-4">
    <label for="parent_id" class="col-sm-2 col-form-label">الحاله </label>
    <div class="col-sm-10">
        <select name="status" class="form-select @error('status') is-invalid @enderror"">
            <option value="عرض" @if ($about->status == 'عرض' or old('status') == 'عرض') selected @endif>عرض
            </option>
            <option value="أخفاء" @if ($about->status == 'أخفاء' or old('status') == 'أخفاء') selected @endif>أخفاء
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
            class="form-control mb-3 @error('image') is-invalid @enderror" value="{{ old('image', $about->image) }}">
        @error('image')
            <p class="invalid-feedback">{{ $message }}
            </p>
        @enderror
        <img id="image" src="{{ asset('storage/' . $about->image) }}" style="height: 80px; width: 100px;"
            alt="no image uploaded">
    </div>
</div>

<div class="text-center">
    <button type="submit" class="btn btn-primary">حفظ</button>
</div>
