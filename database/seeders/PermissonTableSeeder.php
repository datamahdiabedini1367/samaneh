<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::query()->insert([

//---------------------User-----------------------
            ['title' => 'create_user', 'description' => 'تعریف کاربر'],
            ['title' => 'delete_user', 'description' => 'حذف کاربر'],//----------------not define
            ['title' => 'list_users', 'description' => 'مشاهده لیست کاربران دسترسی به کاربران'],
            ['title' => 'active_user', 'description' => 'فعال یا غیر فعال کردن کاربر'],
            ['title' => 'change_role', 'description' => 'تغییر نقش کاربر'],
//            ['title' => 'login', 'description' => 'دسترسی ورود به سیستم'],
            ['title' => 'change_password', 'description' => 'تغییر رمز عبور کاربر'],

//---------------------Project-----------------------
            ['title' => 'list_projects', 'description' => 'دسترسی به لیست پروژه ها'],
            ['title' => 'edit_project', 'description' => 'ویرایش پروژه'],
            ['title' => 'show_detail_project', 'description' => 'نمایش جزئیات پروژه'],
            ['title' => 'create_project', 'description' => 'ایجاد پروژه'],
            ['title' => 'delete_project', 'description' => 'حذف پروژه'],

            ['title' => 'assign_user_to_project', 'description' => 'تخصیص کاربر/کاربران به پروژه'],
            ['title' => 'create_person_project', 'description' => 'ثبت افراد مرتبط به پروژه'],
            ['title' => 'create_company_project', 'description' => 'ثبت شرکتهای مرتبط به پروژه'],
            ['title' => 'my_project', 'description' => 'لیست پروژه های من'],



//---------------------Company--------------------
            ['title' => 'list_companies', 'description' => 'دسترسی  به  لیست شرکت ها'],
            ['title' => 'edit_company', 'description' => 'ویرایش مشخصات شرکت'],
            ['title' => 'show_company', 'description' => 'نمایش مشخصات شرکت'],
            ['title' => 'delete_company', 'description' => 'حذف شرکت'],
            ['title' => 'create_company', 'description' => 'ثبت شرکت'],

            ['title' => 'list_gallery_companies', 'description' => 'تصاویر شرکت'],
            ['title' => 'create_picture_company', 'description' => 'ثبت تصویر شرکت'],
            ['title' => 'delete_picture_company', 'description' => 'حذف تصویر شرکت'],

            ['title' => 'list_syberspace_companies', 'description' => 'دسترسی به امکانات فضای مجازی شرکت'],
            ['title' => 'create_syberspace_company', 'description' => 'ثبت فضای مجازی شرکت'],
            ['title' => 'edit_syberspace_company', 'description' => 'ویرایش فضای مجازی شرکت'],
            ['title' => 'delete_syberspace_company', 'description' => 'حذف فضای مجازی شرکت'],

            ['title' => 'list_persons_companies', 'description' => 'مشاهده پرسنل شرکت'],
            ['title' => 'create_person_company', 'description' => 'افزودن پرسنل جدید'],
            ['title' => 'delete_person_company', 'description' => 'حذف پرسنل شرکت'],

//---------------------Person---------------------

            ['title' => 'list_persons', 'description' => 'لیست افراد'],
            ['title' => 'edit_person', 'description' => 'ویرایش مشخصات فرد'],
            ['title' => 'delete_person', 'description' => 'حذف مشصخات فرد'],
            ['title' => 'create_person', 'description' => 'ثبت مشصخات فرد'],

            ['title' => 'list_gallery_persons', 'description' => 'گالری تصاویر فرد'],
            ['title' => 'create_picture_person', 'description' => 'ثبت تصاویر فرد'],
            ['title' => 'delete_picture_person', 'description' => 'حذف تصاویر فرد'],

            ['title' => 'list_syberspace_persons', 'description' => 'فضای مجازی فرد'],
            ['title' => 'create_syberspace_person', 'description' => 'ثبت اطلاعات فضای مجازی فرد'],
            ['title' => 'update_syberspace_person', 'description' => 'ویرایش اطلاعات فضای مجازی فرد'],
            ['title' => 'delete_syberspace_person', 'description' => ' حذف اطلاعات فضای مجازی فرد'],

            ['title' => 'list_educationals', 'description' => 'سوابق تحصیلی فرد'],
            ['title' => 'create_educational', 'description' => 'ثبت سوابق تحصیلی فرد'],
            ['title' => 'delete_educational', 'description' => 'حذف سوابق تحصیلی فرد'],
            ['title' => 'edit_educational', 'description' => 'ویرایش سوابق تحصیلی فرد'],

            ['title' => 'list_related_persons', 'description' => 'لیست اطلاعات افراد مرتبط به فرد'],
            ['title' => 'create_related_person', 'description' => 'ثبت اطلاعات افراد مرتبط به فرد'],
            ['title' => 'edit_related_person', 'description' => 'ویرایش اطلاعات افراد مرتبط به فرد'],
            ['title' => 'delete_related_person', 'description' => 'حذف اطلاعات افراد مرتبط به فرد'],

//---------------------Role---------------------

            ['title' => 'list_roles', 'description' => 'لیست نقش ها'],
            ['title' => 'create_role', 'description' => 'ایجاد نقش جدید'],
            ['title' => 'edit_role', 'description' => 'ویرایش نقش'],
            ['title' => 'delete_role', 'description' => 'حذف نقش'],
//            ['title' => 'select_user_for_role', 'description' => 'انتخاب کاربر برای دادن نقش'],


        ]);

    }
}
