<?php require('views/parts/head.php') ?>
<?php require('views/parts/adminbar.php') ?>
<?php require('views/parts/navgtion.php') ?>
<?php require('views/parts/header.php') ?>

<main class="main_show_ch">
<!-- <label for="main-endowment-section" class="section-label visually-hidden">تفاصيل الوقف الرئيسية</label> -->

            <section id="main-endowment-section" class="card_islamic_endowments">
            <!-- <h3 style="color: var(--font-color-bh);
        font-size: var(--font-size-xl);">التفاصيل</h3> -->
            <div class="imgs">
            <img src="views/media/images/<?php  echo $endowments['0']['photo'] ?? "11.png" ?>" alt=" شعار الوقف" loading="lazy"></div>
            <p class="localshin">المنطقة <?php  echo $endowments['0']['directorate'] ?></p>
            <div>
            <h5><?php  echo $endowments['0']['name'] ?></h5>
            <p class="details_p"><?php  echo $endowments['0']['short_description'] ?></p>
        </div>
            <h5>رقم الحملة : <?php  echo $endowments['0']['endowment_id'] ?> </h5>
            <div class="progress-bar">
                <div class="progress" style="text-align: left;width:<?= htmlspecialchars(($endowments['0']['donate_cost']/$endowments['0']['cost'])*100) ?>% " >%<?= htmlspecialchars((int)(($endowments['0']['donate_cost']/$endowments['0']['cost'])*100)) ?></div>
              </div>
              <div class="donation-details">
                
                  <p><strong style="display: inline;">SR <?= htmlspecialchars($endowments['0']['donate_cost']) ?>/</strong><?= htmlspecialchars($endowments['0']['cost']) ?></p>
  
              </div>  
              <!-- <label for="donation-section" class="section-label visually-hidden">خيارات التبرع</label> -->

              <section id="donation-section" class="bar_actions">
              <div class="donate-section">
                <form action="/islamic_endowments_checkout" method="get" class="donate-section">
                  <input class="inp" type="number" name="cost" placeholder="$" required  >
                  <input type="hidden" name="endowment_id" value="<?= htmlspecialchars($endowments['0']['endowment_id']) ?>">
                  <button type="submit" class="donate-btn" aria-label="تبرع الأن">تبرع الأن</button>
                </form>
                <form action="/islamic_endowments_addcart" method="post">
                  <input type="hidden" name="endowment_id" value="<?= htmlspecialchars($islamic_endowment['endowment_id']) ?>">
                  <button type="submit" class="donate_cart" aria-label="سله"><img src="views/media/images/cart.png" alt="السلة" loading="lazy"></button>
                </form>
              </div>
</section>





</section>
<!-- باقي البينات -->
<section class="card_islamic_endowments CIE2" id="card_islamic_endowments">


<!-- <div class="details_show_ch">
                <h5>تفاصيل تكاليف العمليات</h5>
                <p>الفحوصات الطبية</p>
                <p>العمليات الجراحية</p>
                <p>الادوية</p>
        </div> -->

        <div class="card_insid" id="card_insid">
        <div>
        <h6>نوع المشروع</h6>
        <p> <?= htmlspecialchars($categories[$endowments['0']['category_id']]['name']) ?></p>
        <h6>المبلغ المستهدف</h6>
        <p><?= htmlspecialchars($endowments['0']['cost']) ?> ر.س</p>

        </div>
        <!-- <div>
        <h6>عدد المستفيدين</h6>
        <p>100 محتاج</p>
        <h6>الوقت المتبقي</h6>
        <p>يوم</p>
        </div> -->
        <div>
        <h6>المبلغ الذي تم جمعة</h6>
        <p>  <?= htmlspecialchars(isset($endowments['0']['donate_cost'])?$endowments['0']['donate_cost']:0) ?> ر.س</p>
        <h6>عدد المتبرعين</h6>
        <p><?= htmlspecialchars($endowments['0']['donate_count']) ?></p>
        </div>
    </div>
    <div class="news" >
    <h5>اخبار المشروع</h5>
        <div><p>تم جمع <?= htmlspecialchars(number_format((($endowments['0']['donate_cost']/$endowments['0']['cost'])*100) ,2) )?>% من التبرعات</p></div>
        <!-- <div>30%<p>تم الانتهاء من المرحله الاولى </p></div> -->
    </div>






</section>

</main>

<?php require('views/parts/footer.php') ?>