<!-- قائمة المشرف للتحكم بي الموقع -->
<?php if ($_SESSION['user'] ?? false) : ?>
    <?php if ($_SESSION['user']['type'] == "admin" || $_SESSION['user']['type'] == "manager") : ?>
        <nav class="bar_admin">
            <ul>
                <div class="bar_divide">
                <li>
                    <form action="/islamic_endowments_manage" method="get"><input type="hidden" name="" value=""><button type="submit"  aria-label="الاوقاف">الاوقاف</button></form>
                </li>
                <li>
<<<<<<< HEAD
                    <form action="/charity_projects_manage" method="get"><input type="hidden" name="" value=""><button type="submit">المشاريع</button></form>
                </li></div>
                <div class="bar_divide">
=======
                    <form action="/charity_projects_manage" method="get"><input type="hidden" name="" value=""><button type="submit" aria-label="المشاريع">المشاريع</button></form>
                </li>
>>>>>>> main
                <li>
                    <form action="/charity_campaigns_manage" method="get"><input type="hidden" name="" value=""><button type="submit" aria-label="حملات خيرية">حملات خيرية</button></form>
                </li>
                <li>
<<<<<<< HEAD
                    <form action="/notifications_manage" method="get"><input type="hidden" name="" value=""><button type="submit">الاشعارات</button></form>
                </li></div>
                <div class="bar_divide">
=======
                    <form action="/notifications_manage" method="get"><input type="hidden" name="" value=""><button type="submit" aria-label="الاشعارات">الاشعارات</button></form>
                </li>
>>>>>>> main
                <li>
                    <form action="/users_manage" method="get"><input type="hidden" name="" value=""><button type="submit" aria-label="المستخدمين">المستخدمين</button></form>
                </li>
                <li>
<<<<<<< HEAD
                    <form action="/executive_partners_manage" method="get"><input type="hidden" name="" value=""><button type="submit">الشركاء التنفيذيين</button></form>
                </li></div>
                <div class="bar_divide">

                <li>
                    <form action="/islamic_payments_manage" method="get"><input type="hidden" name="" value=""><button type="submit"> المصارف الاسلاميه</button></form>
                </li></div>
                
=======
                    <form action="/executive_partners_manage" method="get"><input type="hidden" name="" value=""><button type="submit" aria-label="الشركاء التنفيذيين">الشركاء التنفيذيين</button></form>
                </li>
                <li>
                    <form action="/islamic_payments_manage" method="get"><input type="hidden" name="" value=""><button type="submit" aria-label="المصارف الاسلاميه"> المصارف الاسلاميه</button></form>
                </li>
>>>>>>> main

            </ul>
        </nav>
    <?php endif; ?>
<?php endif; ?>