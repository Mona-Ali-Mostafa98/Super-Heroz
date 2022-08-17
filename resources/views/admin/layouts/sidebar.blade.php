    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">
        <ul class="sidebar-nav" id="sidebar-nav">
            <li class="nav-item">
                <a class="{{ Request::is('admin/settings*') ? 'nav-link fs-6' : 'nav-link collapsed fs-6' }} "
                    href="{{ route('admin.settings.index') }}">
                    <i class="bi bi-gear"></i>
                    <span class="p-2">الاعدادات</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="{{ Request::is('admin/about*') ? 'nav-link fs-6' : 'nav-link collapsed fs-6' }} "
                    href="{{ route('admin.about.index') }}">
                    <i class="bi bi-gear"></i>
                    <span class="p-2">من نحن </span>
                </a>
            </li>

            <li class="nav-item">
                <a class="{{ Request::is('admin/social_links*') ? 'nav-link fs-6' : 'nav-link collapsed fs-6' }} "
                    href="{{ route('admin.social_links.index') }}">
                    <i class="bi bi-link-45deg"></i>
                    <span class="p-2"> روابط التواصل</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="{{ Request::is('admin/sliders*') ? 'nav-link fs-6' : 'nav-link collapsed fs-6' }} "
                    href="{{ route('admin.sliders.index') }}">
                    <i class="bi bi-info-circle"></i>
                    <span class="p-2">السليدرز</span>
                </a>
            </li>


            <l class="nav-item">
                <a class="{{ Request::is('admin/policies*') ? 'nav-link fs-6' : 'nav-link collapsed fs-6' }} "
                    href="{{ route('admin.policies.index') }}">
                    <i class="bi bi-list-stars"></i>
                    <span class="p-2">الخصوصيه </span>
                </a>
            </l>


            <li class="nav-item">
                <a class="{{ Request::is('admin/services*') ? 'nav-link fs-6' : 'nav-link collapsed fs-6' }} "
                    href="{{ route('admin.services.index') }}">
                    <i class="bi bi-info-circle"></i>
                    <span class="p-2">الخدمات</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="{{ Request::is('admin/categories*') ? 'nav-link fs-6' : 'nav-link collapsed fs-6' }} "
                    href="{{ route('admin.categories.index') }}">
                    <i class="bi bi-info-circle"></i>
                    <span class="p-2">أقسام المركز</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="{{ Request::is('admin/center_classes*') ? 'nav-link fs-6' : 'nav-link collapsed fs-6' }} "
                    href="{{ route('admin.center_classes.index') }}">
                    <i class="bi bi-info-circle"></i>
                    <span class="p-2">فصول المركز</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="{{ Request::is('admin/galleries*') ? 'nav-link fs-6' : 'nav-link collapsed fs-6' }} "
                    href="{{ route('admin.galleries.index') }}">
                    <i class="bi bi-info-circle"></i>
                    <span class="p-2">معرض الصور</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="{{ Request::is('admin/admins*') ? 'nav-link fs-6' : 'nav-link collapsed fs-6' }} "
                    href="{{ route('admin.admins.index') }}">
                    <i class="bi bi-info-circle"></i>
                    <span class="p-2">المشرفون</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="{{ Request::is('admin/users*') ? 'nav-link fs-6' : 'nav-link collapsed fs-6' }} "
                    href="{{ route('admin.users.index') }}">
                    <i class="bi bi-info-circle"></i>
                    <span class="p-2">المستخدمين</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="{{ Request::is('') ? 'nav-link fs-6' : 'nav-link collapsed fs-6' }} "
                    href="{{ route('admin.contact.index') }}">
                    <i class="bi bi-info-circle"></i>
                    <span class="p-2"> تواصل معنا</span>
                </a>
            </li>

        </ul>

    </aside><!-- End Sidebar-->
