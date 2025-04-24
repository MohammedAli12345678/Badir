<?php require('views/parts/head.php') ?>
<?php require('views/parts/adminbar.php') ?>
<?php require('views/parts/navgtion.php') ?>
<?php require('views/parts/header.php') ?>

<main>
  <!-- <label for="islamic-payments-section" class="section-label visually-hidden">قسم التبرعات الإسلامية</label> -->

  <section id="islamic-payments-section" class="islamic_payments_index">
    <!-- <div class="nav_links_islamic_payments">
      <a class="zakat" href="/islamic_payments_zakat">الزكاة</a>
      <a class="charity" href="/islamic_payments_sadaqah">الصدقة</a>
      <a class="ransom" href="/islamic_payments_fidya">الفدية</a>
      <a class="atonement" href="/islamic_payments_kaffara">الكفارة و النذور</a>
      <a class="aqeeqah" href="/islamic_payments_aqiqah">العقيقة</a>
    </div> -->
    <!-- الصدقه -->
    <!-- <label for="payments-carousel" class="section-label visually-hidden">عرض التبرعات الإسلامية</label> -->
    <section id="payments-carousel" class="Carousel_card">
      <main class="main_cart">
        <!-- <label for="payments-list" class="section-label visually-hidden">بطاقات التبرعات</label> -->
        <section id="payments-list" class="container_card">

          <?php foreach ($islamic_payments as $islamic_payment): ?>

            <div class="donation-card">
              <a href="/<?= htmlspecialchars($islamic_payment['page_link'])  ?>">
                <img src="views/media/images/<?= htmlspecialchars($islamic_payment['photo'] ?? "11.png") ?>" alt="مشروع نور اليمن">
              </a>
              <h2><?= htmlspecialchars($islamic_payment['name'] ) ?></h2>
              <div class="donation-info">
              <h3><?= htmlspecialchars($islamic_payment['short_description']) ?></h3>

                <div class="details">
                  <a href="/<?= htmlspecialchars($islamic_payment['page_link'])  ?>">
                    عرض التفاصيل</a>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </section>

        <?php if(! $filtered):include('views/parts/pagination.php'); endif?>
    </section>
</main>
</section>
</section>
</main>
<?php require('views/parts/footer.php') ?>