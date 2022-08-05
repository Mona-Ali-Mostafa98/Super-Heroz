<main class="main-content col-xs-12">
    <div class="breads col-xs-12" style="background-image: url(images/slide.jpg);">
        <div class="container">
            <h3>إضافة طفلك</h3>
            <ul>
                <li>
                    <a href="{{ route('website.index') }}">الرئيسية</a>
                </li>
                <li>اضافة طفل</li>
            </ul>
        </div>
    </div>
    <div class="s-wrap col-xs-12">
        <div class="container">
            <div class="kid-space col-xs-12">
                <form action="#" method="get">
                    <ul class="nav-tabs col-xs-12">
                        <li class="active">
                            <a href="#" data-toggle="tab" data-target="#kid_infos">معلومات الطفل</a>
                        </li>
                        <li class="disabled">
                            <a href="#" data-toggle="tab" data-target="#kid_enrollment">الحضور والانصراف</a>
                        </li>
                        <li class="disabled">
                            <a href="#" data-toggle="tab" data-target="#kid_medics">معلومات طبيه</a>
                        </li>
                        <li class="disabled">
                            <a href="#" data-toggle="tab" data-target="#kid_docs">المستندات المطلوبة</a>
                        </li>
                    </ul>
                    <div class="tab-content col-xs-12">
                        <div class="tab-pane fade active in" id="kid_infos">
                            <div class="c-card col-xs-12">
                                <div class="form-group col-md-3 col-sm-6 col-xs-12">
                                    <h5>اسم الطفل ثلاثي</h5>
                                    <input type="text" class="form-control" placeholder="اسم الطفل يكتب هنا">
                                </div>
                                <div class="form-group col-md-3 col-sm-6 col-xs-12">
                                    <h5>الجنس</h5>
                                    <select class="form-control">
                                        <option selected disabled>يرجى الاختيار</option>
                                        <option>اختيار1</option>
                                        <option>اختيار1</option>
                                        <option>اختيار1</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-3 col-sm-6 col-xs-12">
                                    <h5>تاريخ الميلاد</h5>
                                    <input type="text" class="form-control" placeholder="0000/00/00">
                                    <i class="la la-calendar"></i>
                                </div>
                                <div class="form-group col-md-3 col-sm-6 col-xs-12">
                                    <h5>صلة القرابة</h5>
                                    <select class="form-control">
                                        <option selected disabled>يرجى الاختيار</option>
                                        <option>اختيار1</option>
                                        <option>اختيار1</option>
                                        <option>اختيار1</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-3 col-sm-6 col-xs-12">
                                    <h5>عنوان المنزل</h5>
                                    <input type="text" class="form-control" placeholder="الحى - الشارع">
                                </div>
                                <div class="form-group col-md-3 col-sm-6 col-xs-12">
                                    <h5>هل الطفل مسجل في مدرسة</h5>
                                    <select class="form-control">
                                        <option selected disabled>يرجى الاختيار</option>
                                        <option>اختيار1</option>
                                        <option>اختيار1</option>
                                        <option>اختيار1</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-3 col-sm-6 col-xs-12">
                                    <h5>المرحلة الدراسية</h5>
                                    <input type="text" class="form-control" placeholder="اكتب المرحلة الدراسية">
                                </div>
                                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                    <h3>الرجاء إضافة شخصين في الحالات الطارئة</h3>
                                </div>
                                <div class="list-person col-xs-12">
                                    <div class="form-group col-md-4 col-sm-12 col-xs-12">
                                        <h6>1</h6>
                                        <div>
                                            <h5>الاسم الثلاثي</h5>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3 col-sm-6 col-xs-12">
                                        <h5>رقم الجوال</h5>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="form-group col-md-3 col-sm-6 col-xs-12">
                                        <h5>صلة القرابة</h5>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="list-person col-xs-12">
                                    <div class="form-group col-md-4 col-sm-12 col-xs-12">
                                        <h6>2</h6>
                                        <div>
                                            <h5>الاسم الثلاثي</h5>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3 col-sm-6 col-xs-12">
                                        <h5>رقم الجوال</h5>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="form-group col-md-3 col-sm-6 col-xs-12">
                                        <h5>صلة القرابة</h5>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group col-xs-12">
                                    <button type="button" class="btn next-step">التالى</button>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="kid_enrollment">
                            <div class="c-card col-xs-12">
                                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                    <h3>الرجاء أضافة أسماء الأشخاص المسموح لهم بأخذ الطالب من المركز</h3>
                                </div>
                                <div class="append-persons col-xs-12">
                                    <div class="list-person col-xs-12" id="p_spec">
                                        <div class="form-group col-md-4 col-sm-12 col-xs-12">
                                            <h6>1</h6>
                                            <div>
                                                <h5>الاسم الثلاثي</h5>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-3 col-sm-6 col-xs-12">
                                            <h5>رقم الجوال</h5>
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="form-group col-md-3 col-sm-6 col-xs-12">
                                            <h5>صلة القرابة</h5>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="list-person col-xs-12">
                                        <div class="form-group col-md-4 col-sm-12 col-xs-12">
                                            <h6>2</h6>
                                            <div>
                                                <h5>الاسم الثلاثي</h5>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group col-md-3 col-sm-6 col-xs-12">
                                            <h5>رقم الجوال</h5>
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="form-group col-md-3 col-sm-6 col-xs-12">
                                            <h5>صلة القرابة</h5>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-xs-12">
                                    <button type="button" class="btn add-n">
                                        <i class="la la-plus"></i>
                                        اضافة شخص اخر
                                    </button>
                                </div>
                                <div class="form-group col-xs-12">
                                    <button type="button" class="btn prev-step">السابق</button>
                                    <button type="button" class="btn next-step">التالى</button>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="kid_medics">
                            <div class="c-card col-xs-12">
                                <div class="form-group col-md-5 col-sm-6 col-xs-12">
                                    <h5>هل يعاني الطالب من الحساسية الغذائية</h5>
                                    <div class="f-labels">
                                        <label>
                                            <input type="radio" name="rad">
                                            <span>نعم</span>
                                        </label>
                                        <label>
                                            <input type="radio" name="rad">
                                            <span>لا</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group col-md-7 col-sm-6 col-xs-12">
                                    <h5>في حال الإجابة بنعم الرجاء كتابة المواد الغذائية المسببة للحساسية</h5>
                                    <input type="text" class="form-control">
                                </div>

                                <div class="form-group col-md-5 col-sm-6 col-xs-12">
                                    <h5>هل يعاني الطالب من أي نوع آخر من الحساسية</h5>
                                    <div class="f-labels">
                                        <label>
                                            <input type="radio" name="rad1">
                                            <span>نعم</span>
                                        </label>
                                        <label>
                                            <input type="radio" name="rad1">
                                            <span>لا</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group col-md-7 col-sm-6 col-xs-12">
                                    <h5>في حال الإجابة بنعم الرجاء ذكر نوع الحساسية</h5>
                                    <input type="text" class="form-control">
                                </div>


                                <div class="form-group col-md-5 col-sm-6 col-xs-12">
                                    <h5>في حال تعرض الطالب لإحدى مسببات الحساسية هل يتطلب استخدام حقنة الأدرينالين
                                        (الإبينفرين)، في حالة الطوارئ، أي عند ظهور أي عرض من أعراض صدمة الحساسية</h5>
                                    <div class="f-labels">
                                        <label>
                                            <input type="radio" name="rad2">
                                            <span>نعم</span>
                                        </label>
                                        <label>
                                            <input type="radio" name="rad2">
                                            <span>لا</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group col-md-7 col-sm-6 col-xs-12">
                                    <h5>في حال الاجابة ب لا الرجاء تقديم تقرير طبي من الطبيب يشير الى أن الحالة لا تتطلب
                                        استخدام الحقن</h5>
                                    <div class="f-upload">
                                        <input type="file">
                                        <i class="la la-file-text"></i>
                                        <input type="text" class="form-control" readonly=""
                                            placeholder="يرجي ارفاق التقرير هنا">
                                    </div>
                                </div>

                                <div class="form-group col-md-5 col-sm-6 col-xs-12">
                                    <h5>هل الطالب من ذوي الاحتياجات الخاصة</h5>
                                    <div class="f-labels">
                                        <label>
                                            <input type="radio" name="rad3">
                                            <span>نعم</span>
                                        </label>
                                        <label>
                                            <input type="radio" name="rad3">
                                            <span>لا</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group col-md-7 col-sm-6 col-xs-12">
                                    <h5>في حال الإجابة بنعم الرجاء وصف الحالة</h5>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="form-group col-xs-12">
                                    <h5>الرجاء كتابة أي أعراض صحية يعاني منها الطالب</h5>
                                    <textarea class="form-control"></textarea>
                                </div>

                                <div class="form-group col-xs-12">
                                    <button type="button" class="btn prev-step">السابق</button>
                                    <button type="button" class="btn next-step">التالى</button>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="kid_docs">
                            <div class="c-card col-xs-12">
                                <div class="form-group col-md-4 col-xs-12">
                                    <div class="prof-img">
                                        <label>
                                            <i class="la la-camera"></i>
                                            <input type="file"
                                                onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                                            <img src="" id="blah" alt="">
                                        </label>
                                        <p>صورة شخصية حديثة للطفل</p>
                                    </div>
                                </div>
                                <div class="form-group col-md-4 col-xs-12">
                                    <div class="prof-img">
                                        <label>
                                            <i class="la la-camera"></i>
                                            <input type="file"
                                                onchange="document.getElementById('blah1').src = window.URL.createObjectURL(this.files[0])">
                                            <img src="" id="blah1" alt="">
                                        </label>
                                        <p>صورة من كرت العائلة</p>
                                    </div>
                                </div>
                                <div class="form-group col-md-4 col-xs-12">
                                    <div class="prof-img">
                                        <label>
                                            <i class="la la-camera"></i>
                                            <input type="file"
                                                onchange="document.getElementById('blah2').src = window.URL.createObjectURL(this.files[0])">
                                            <img src="" id="blah2" alt="">
                                        </label>
                                        <p>صورة من شهادة الميلاد</p>
                                    </div>
                                </div>
                                <div class="form-group col-md-4 col-xs-12">
                                    <div class="prof-img">
                                        <label>
                                            <i class="la la-camera"></i>
                                            <input type="file"
                                                onchange="document.getElementById('blah3').src = window.URL.createObjectURL(this.files[0])">
                                            <img src="" id="blah3" alt="">
                                        </label>
                                        <p>صورة من كارت التطعيم</p>
                                    </div>
                                </div>
                                <div class="form-group col-md-4 col-xs-12">
                                    <div class="prof-img">
                                        <label>
                                            <i class="la la-camera"></i>
                                            <input type="file"
                                                onchange="document.getElementById('blah4').src = window.URL.createObjectURL(this.files[0])">
                                            <img src="" id="blah4" alt="">
                                        </label>
                                        <p>صورة من الشهادة الطبية للطفل</p>
                                    </div>
                                </div>
                                <div class="form-group col-md-6 col-xs-12">
                                    <div class="chx-itm">
                                        <label>
                                            <input type="checkbox">
                                            <span>اوافق على
                                                <a href="#"> الشروط والاحكام</a>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group col-md-6 col-xs-12">
                                    <div class="chx-itm">
                                        <label>
                                            <input type="checkbox">
                                            <span>اوافق على نشر صور الطفل المشترك في قنوات التواصل الاجتماعي والموقع
                                                والتطبيق والمنشورات الخاصة بمركز سوبرهيروزلاند</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group col-xs-12">
                                    <button type="button" class="btn prev-step">السابق</button>
                                    <button type="button" class="btn" data-toggle="modal"
                                        data-target="#addition_success">اضافة</button>

                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>


<div class="modal fade" id="addition_success">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal">
                <i class="la la-close"></i>
            </button>
            <div class="modal-body">
                <img src="images/check.svg" alt="">
                <p>تم إضافة الطفل بنجاح وسيتم
                    التواصل معكم لكى يتم تفعيل
                    حساب الطفل</p>
                <a href="#" class="btn">الذهاب للملف الشخصي</a>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
