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
        Permission::query()->truncate();
        Permission::query()->insert([


//---------------------groupPermission-----------------------
//            ['group_id'=>1,'title' => 'create_groupPermission', 'description' => 'تعریف گروه دسترسی جدید'],
//            ['group_id'=>1,'title' => 'list_groupPermission', 'description' => 'لیست گروه دسترسی'],
//            ['group_id'=>1,'title' => 'delete_groupPermission', 'description' => 'حذف گروه دسترسی'],
//            ['group_id'=>1,'title' => 'edit_groupPermission', 'description' => 'ویرایش  گروه دسترسی'],
//---------------------User-----------------------
            ['group_id'=>1,'title' => 'dashboard', 'description' => 'دسترسی به داشبورد'],
            ['group_id'=>1,'title' => 'create_user', 'description' => 'تعریف کاربر'],
            ['group_id'=>1,'title' => 'delete_user', 'description' => 'حذف کاربر'],//----------------not define
            ['group_id'=>1,'title' => 'list_users', 'description' => 'مشاهده لیست کاربران دسترسی به کاربران'],
            ['group_id'=>1,'title' => 'active_user', 'description' => 'فعال یا غیر فعال کردن کاربر'],
            ['group_id'=>1,'title' => 'change_role', 'description' => 'تغییر نقش کاربر'],
//            ['group_id'=>1,'title' => 'login', 'description' => 'دسترسی ورود به سیستم'],
            ['group_id'=>1,'title' => 'change_password', 'description' => 'تغییر رمز عبور کاربر'],
            ['group_id'=>1,'title' => 'export_user', 'description' => 'خروجی گرفتن از لیست کاربران'],

//---------------------Project-----------------------
            ['group_id'=>1,'title' => 'list_projects', 'description' => 'دسترسی به لیست پروژه ها'],
            ['group_id'=>1,'title' => 'edit_project', 'description' => 'ویرایش پروژه'],
            ['group_id'=>1,'title' => 'show_detail_project', 'description' => 'نمایش جزئیات پروژه'],
            ['group_id'=>1,'title' => 'create_project', 'description' => 'ایجاد پروژه'],
            ['group_id'=>1,'title' => 'delete_project', 'description' => 'حذف پروژه'],
            ['group_id'=>1,'title' => 'export_project', 'description' => ' خروجی گرفتن از لیست پروژه ها'],
            ['group_id'=>1,'title' => 'export_one_project', 'description' => 'خروجی گرفتن از یک پروژه'],

            ['group_id'=>1,'title' => 'assign_user_to_project', 'description' => 'تخصیص کاربر/کاربران به پروژه'],
            ['group_id'=>1,'title' => 'create_person_project', 'description' => 'ثبت افراد مرتبط به پروژه'],
            ['group_id'=>1,'title' => 'create_company_project', 'description' => 'ثبت شرکتهای مرتبط به پروژه'],
            ['group_id'=>1,'title' => 'my_project', 'description' => 'لیست پروژه های من'],



//---------------------Company--------------------
            ['group_id'=>1,'title' => 'list_companies', 'description' => 'دسترسی  به  لیست شرکت ها'],
            ['group_id'=>1,'title' => 'edit_company', 'description' => 'ویرایش مشخصات شرکت'],
            ['group_id'=>1,'title' => 'show_company', 'description' => 'نمایش مشخصات شرکت'],
            ['group_id'=>1,'title' => 'delete_company', 'description' => 'حذف شرکت'],
            ['group_id'=>1,'title' => 'create_company', 'description' => 'ثبت شرکت'],
            ['group_id'=>1,'title' => 'export_company', 'description' => 'خروجی گرفتن از لیست شرکتها'],
            ['group_id'=>1,'title' => 'export_list_personel_companies', 'description' => 'خروجی گرفتن از لیست کارکنان یک شرکت'],

            ['group_id'=>1,'title' => 'list_gallery_companies', 'description' => 'تصاویر شرکت'],
            ['group_id'=>1,'title' => 'create_picture_company', 'description' => 'ثبت تصویر شرکت'],
            ['group_id'=>1,'title' => 'delete_picture_company', 'description' => 'حذف تصویر شرکت'],

            ['group_id'=>1,'title' => 'list_syberspace_companies', 'description' => 'دسترسی به امکانات فضای مجازی شرکت'],
            ['group_id'=>1,'title' => 'create_syberspace_company', 'description' => 'ثبت فضای مجازی شرکت'],
            ['group_id'=>1,'title' => 'edit_syberspace_company', 'description' => 'ویرایش فضای مجازی شرکت'],
            ['group_id'=>1,'title' => 'delete_syberspace_company', 'description' => 'حذف فضای مجازی شرکت'],

            ['group_id'=>1,'title' => 'list_persons_companies', 'description' => 'مشاهده پرسنل شرکت'],
            ['group_id'=>1,'title' => 'create_person_company', 'description' => 'افزودن پرسنل جدید'],
            ['group_id'=>1,'title' => 'delete_person_company', 'description' => 'حذف پرسنل شرکت'],

//---------------------Person

            ['group_id'=>1,'title' => 'list_persons', 'description' => 'لیست افراد'],
            //-------------------- سوابق شغلی
            ['group_id'=>1,'title' => 'create_savabegh_jobs', 'description' => 'ثبت سوابق شغلی فرد'],
            ['group_id'=>1,'title' => 'show_savabegh_jobs', 'description' => 'نمایش سوابق شغلی فرد'],
            ['group_id'=>1,'title' => 'edit_savabegh_jobs', 'description' => 'ویرایش سوابق شغلی فرد'],
            ['group_id'=>1,'title' => 'delete_savabegh_jobs', 'description' => 'حذف سوابق شغلی فرد'],
            ['group_id'=>1,'title' => 'list_person_savabegh_export', 'description' => 'خروجی گرفتن از لیست سوابق شغلی فرد'],


            ['group_id'=>1,'title' => 'edit_person', 'description' => 'ویرایش مشخصات فرد'],
            ['group_id'=>1,'title' => 'show_person', 'description' => 'مشاهده مشخصات فرد'],
            ['group_id'=>1,'title' => 'delete_person', 'description' => 'حذف مشخصات فرد'],
            ['group_id'=>1,'title' => 'create_person', 'description' => 'ثبت مشخصات فرد'],
            ['group_id'=>1,'title' => 'export_person', 'description' => 'خروجی گرفتن از لیست افراد'],
            ['group_id'=>1,'title' => 'export_one_person', 'description' => 'خروجی گرفتن از مشخصات کامل یک فرد'],
            ['group_id'=>1,'title' => 'list_relatedPersonExport', 'description' => 'خروجی گرفتن از لیست افراد مرتبط به یک فرد'],
            ['group_id'=>1,'title' => 'list_person_educational_export', 'description' => 'خروجی گرفتن از لیست سوابق تحصیلی فرد'],


            ['group_id'=>1,'title' => 'list_gallery_persons', 'description' => 'گالری تصاویر فرد'],
            ['group_id'=>1,'title' => 'create_picture_person', 'description' => 'ثبت تصاویر فرد'],
            ['group_id'=>1,'title' => 'delete_picture_person', 'description' => 'حذف تصاویر فرد'],

            ['group_id'=>1,'title' => 'list_syberspace_persons', 'description' => 'فضای مجازی فرد'],
            ['group_id'=>1,'title' => 'create_syberspace_person', 'description' => 'ثبت اطلاعات فضای مجازی فرد'],
            ['group_id'=>1,'title' => 'update_syberspace_person', 'description' => 'ویرایش اطلاعات فضای مجازی فرد'],
            ['group_id'=>1,'title' => 'delete_syberspace_person', 'description' => ' حذف اطلاعات فضای مجازی فرد'],

            ['group_id'=>1,'title' => 'list_educationals', 'description' => 'سوابق تحصیلی فرد'],
            ['group_id'=>1,'title' => 'create_educational', 'description' => 'ثبت سوابق تحصیلی فرد'],
            ['group_id'=>1,'title' => 'delete_educational', 'description' => 'حذف سوابق تحصیلی فرد'],
            ['group_id'=>1,'title' => 'edit_educational', 'description' => 'ویرایش سوابق تحصیلی فرد'],

            ['group_id'=>1,'title' => 'list_related_persons', 'description' => 'لیست اطلاعات افراد مرتبط به فرد'],
            ['group_id'=>1,'title' => 'create_related_person', 'description' => 'ثبت اطلاعات افراد مرتبط به فرد'],
            ['group_id'=>1,'title' => 'edit_related_person', 'description' => 'ویرایش اطلاعات افراد مرتبط به فرد'],
            ['group_id'=>1,'title' => 'delete_related_person', 'description' => 'حذف اطلاعات افراد مرتبط به فرد'],

//---------------------Role---------------------

            ['group_id'=>1,'title' => 'list_roles', 'description' => 'لیست نقش ها'],
            ['group_id'=>1,'title' => 'create_role', 'description' => 'ایجاد نقش جدید'],
            ['group_id'=>1,'title' => 'edit_role', 'description' => 'ویرایش نقش'],
            ['group_id'=>1,'title' => 'delete_role', 'description' => 'حذف نقش'],


        ]);

    }
}
