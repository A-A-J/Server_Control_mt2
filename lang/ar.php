<?php

$lang = [
    //page title
    'title'         => 'Server Control',

    //before tag head
    'lang'          => 'ar', // [ar] or [fr] or [tr]
    'dir'           => 'rtl', // [rtl] => used when reading from the right | [ltr] => used when reading from the left
    'dire'          => 'left',

    //List of words or terms
    'home'          => 'الرئيسية',
    'accounts'      => 'الحسابات',
    'item'          => 'ا',
    'command'       => 'SQL',
    'faq'           => 'الإرشادات',
    'account'       => 'الحساب',
    'add_accounts'  => 'إضافة حساب',
    'show'          => 'إظهار',
    'about'         => 'عن البرنامج',
    'terms_use'     => 'شروط الاستخدام',
    'send_errors'   => 'إرسال الأخطاء',
    'contactME'     => 'التواصل معي',
    'des_app'       => 'مرحبًا، Server Control هو برنامج بسيط يسهل إدارة الخادم عن طريق ربطه من خلال قاعدة بيانات الخادم وتغيير بعض الأوامر إلى جداول بيانات. يجعل الحساب جي ام في غمضة عين. البرنامج يسهل التحكم به وأسهل من برنامج النافي كات إذا كنت مبتدئ فيه.',
    'name'          => 'الاسم',
    'password'      => 'كلمة المرور',
    'regster'       => 'تاريخ التسجيل',
    'status'        => 'الحالة',
    'control'       => 'التحكم',
    'editAccount'   => 'تحرير الحساب',
    'gold'          => 'اليانغ',
    'strong'        => 'القوة',
    'To_GM'         => 'إلى جي أم',
    'login'         => 'اسم المستخدم',
    'email'         => 'البريد الإلكتروني',
    'OK'            => 'مفعل',
    'BLOCK'         => 'غير مفعل',
    'max'           => 'أقصى',
    'exp'           => 'الخبرة',
    'gaya'          => 'الغايا',
    'won'           => 'الوون',
    'player'        => 'الشخصيات',
    'job'           => 'الشخصية',
    'level'         => 'المستوى',
    'ht'            => 'الحيوية',
    'iq'            => 'الذكاء',
    'st'            => 'القوة',
    'dx'            => 'المناورة',
    'group'         => 'المجموعة',
    'cansel'        => 'إلغاء',
    'save'          => 'حفظ',
    'edit'          => 'تحرير',
    'year'          => 'سنة',
    'Month'         => 'شهر',
    'week'          => 'اسبوع',
    'day'           => 'يوم',
    'hour'          => 'ساعة',
    'minute'        => 'دقيقة',
    'second'        => 'ثانية',
    'ago'           => 'منذ',
    'now'           => 'الآن',
    'delete'        => 'حذف',
    'p_maintenance' => "هذه الصفحة تحت الصيانة أو سيتم إصدارها مع التحديث رقم v1.2",
    'you_ps_encrypt'=> 'يجب عليك تشفير كلمة المرور عن طريق الضغط على أيقونة المفتاح داخل الحقل',
    'use_ps_blank'  => 'لا يمكنك ترك حقل اسم المستخدم أو كلمة المرور فارغًا',
    'option_post'   => 'الخيار التالي هو إذا كنت تريد حذف اللاعب من الجدول "common"',
    'previous'      => 'السابق',
    'encrypt_pass'  => 'لا يمكنك تشفير كلمة مرور مشفرة',
    'encr_pass_null'=> 'لا يمكنك تشفير كلمة مرور فارغة',
    'encr_pas_space'=> 'لا يمكنك وضع مسافة في كلمة المرور',
    'not_email'     => 'لايوجد بريد إلكتروني',
    'not_characters'=> 'تحذير .. لاتوجد شخصيات في هذا الحساب',
    'no_player_cn'  => 'لا يوجد لاعب في الجدول common ، ويمكن إضافته',
    'error_ajax'    => 'حدث خطأ في الإرسال ، يرجى تحديث الصفحة أو الاتصال بالمبرمج ، المعلومات الموجودة في صفحة الإشعارات.',
    'characters'    => [ 'محارب', 'نينجا أنثى', 'سورا', 'شامان أنثى', 'محاربة', 'نينجا', 'سورا أنثى', 'شامان', 'ليكانر'],


    'num1'  => '
        <h5><strong>ما المميز في البرنامج؟</strong></h4>
        <ol>
        <li>تحكم سريع مدعوم بالتقنية الاجاكس دون الحاجة إلى تحديث الصفحة</li>
        <li>القدرة على تقوية الحساب، وإضافة مراقبين والتزود باليانغ والعملات الأخرى مثل الغايا والوون</li>
        <li>إمكانية مشاهدة الأدوات الموجودة في جدول "item" مع مقارنة السحر وعدم وجود اي غش فيه مثلا قوي ضد البشر 555 او 15</li>
        </ol>
        
        <h5><strong>كيف يعمل البرنامج؟</strong></h5>
        <p>يعمل البرنامج بشكل أساسي على html و css و javascript و dataTable و php، ويحتاج إلى سيرفر شخصي مثل: xampp ولذلك بسبب تشغيل البرنامج عليه بشكل كامل</p>

        <h5><strong>ملاحظات مهمة</strong></h5>
        <p>حاليًا ، البرنامج في المرحلة التجريبية ، او إنطلاقه الأول، ولذلك ستكون هناك تحديثات مستقبلية مثل:-</p>
        <ol>
        <li>مراجعة جدول العتاد والتحقق من المميزات ومعرفة السحر الملعوب فيه</li>
        <li>إمكانية إضافة العتاد والابنود لدى التجار</li>
        <li>التحقق من المميزات الموجودة لدى اللاعب مثل مميزات شايغراب</li>
        </ol>
    ',

    'num2'  => '
        <ol>
            <li>من فضلك، هذا البرنامج بالكامل مجاني وتقديمه مقابل المال او الادعاء بأنه من صنعك يعتبر سرقة، ولذلك من فضلك أحترم هذا العمل المتعوب عليه، وفي الأخر لن أقدم أي دعم فني او مساعدة للسارق مهما كان.</li>
        </ol>
    '
];