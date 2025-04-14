<?php require('views/parts/head.php') ?>
<?php require('views/parts/adminbar.php') ?>
<?php require('views/parts/navgtion.php') ?>
<?php require('views/parts/header.php') ?>

<?php //dd($islamic_endowments) 
?>

<main>
 
  <section class="Carousel_card">
    <!-- حاوية البطاقات -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <main class="main_cart" >
      <section class="container_card"  >
        <?php foreach ($islamic_endowments as $islamic_endowment): ?>
          <div class="donation-card" >
            <a href="/islamic_endowments_show?endowment_id=<?= htmlspecialchars($islamic_endowment['endowment_id']) ?>">
              <img src="views/media/images/<?= htmlspecialchars($islamic_endowment['photo'] ?? "11.png") ?>" alt="صورة الوقف" loading="lazy">
            </a>
            <div class="donation-info">
              <div class="aghtha">
                <h6>بادر</h6>
                <h5>رقم الحملة : <?= htmlspecialchars($islamic_endowment['endowment_id']) ?></h5>
                <!-- <a href=""><img src="" alt="مشاركه"></a> -->
              </div>
              <h3><?= htmlspecialchars($islamic_endowment['name']) ?></h3>
              <div class="donate-section">
                <form action="/islamic_endowments_checkout" method="get" class="donate-section">
                  <input class="inp" type="number" name="cost" placeholder="$" required  >
                  <input type="hidden" name="endowment_id" value="<?= htmlspecialchars($islamic_endowment['endowment_id']) ?>">
                  <button type="submit" class="donate-btn" aria-label="تبرع الأن">تبرع الأن</button>
                </form>
                <form action="/islamic_endowments_addcart" method="post">
                  <input type="hidden" name="endowment_id" value="<?= htmlspecialchars($islamic_endowment['endowment_id']) ?>">
                  <button type="submit" class="donate_cart" aria-label="سله"><img src="views/media/images/cart.png" alt="السلة" loading="lazy"></button>
                </form>
              </div>
              <div class="details">
                <a href="/islamic_endowments_show?endowment_id=<?= htmlspecialchars($islamic_endowment['endowment_id']) ?>">عرض التفاصيل</a>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </section>

      <section class="bar_action">

      </section>
    </main>





  </section>


</main>
<?php require('views/parts/footer.php') ?>