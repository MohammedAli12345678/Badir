<?php require('views/parts/head.php') ?>
<?php require('views/parts/adminbar.php') ?>
<?php require('views/parts/navgtion.php') ?>
<?php require('views/parts/header.php') ?>
<script src="views/javascrept/aqiqah.js"></script>


<main class="main_islamic_payments_zakat">
  <section class="form_zakat">

    <h2>احسب العقيقة</h2>
    <label>نوع المولود :</label>
      <div class="type-options">
        <div class="option-box" onclick="calculate('male')">ذكر</div>
        <div class="option-box" onclick="calculate('female')">انثى</div>
      </div>


      <label for="days">عدد الاطفال</label>
      <input type="number" id="count" name="days" required min="1">

    <!-- النتيجة -->

    <div class="donate-section">
      <form action="/islamic_payments_checkout" method="get" class="donate-section" required>
        <input class="inp" type="number" name="cost" placeholder="$" required id="result">
        <input type="hidden" name="islamic_payment_id" value="3">
        <button type="submit" class="donate-btn" aria-label="تبرع الأن">تبرع الأن</button>
      </form>
      <form action="/islamic_payments_addcart" method="post">
        <input type="hidden" name="islamic_payment_id" value="3">
        <button type="submit" class="donate_cart" aria-label="السله"><img src="views/media/images/cart.png" alt=""></button>
      </form>
    </div>


  </section>








  <section>
    <!-- تعريف عام  -->
    <div class="info-section">
      <h2>ما هي العقيقة؟</h2>
      <p>
        العقيقة هي ذبح شاة أو أكثر عن المولود في اليوم السابع من ولادته. وهي سنة مؤكدة، ولها العديد من الفوائد.
      </p>

      <h3>كيفية إخراج العقيقة:</h3>
      <ul>
        <li>يجب ذبح شاة عن المولود الذكر.</li>
        <li>يجب ذبح شاة عن المولودة الأنثى.</li>
        <li>يفضل أن تتم العقيقة في اليوم السابع من ولادة المولود.</li>
        <li>يجب أن تكون الشاة سليمة وصحية.</li>
      </ul>

      <h3>فوائد العقيقة:</h3>
      <ul>
        <li>تحقيق سنة النبي صلى الله عليه وسلم.</li>
        <li>إطعام الفقراء والمحتاجين.</li>
        <li>تحقيق الفرح والسرور للمولود وأسرته.</li>
      </ul>

      <h3>أحكام العقيقة:</h3>
      <ul>
        <li>العقيقة سنة مؤكدة عن المولود الذكر والأنثى.</li>
        <li>يمكن توزيع اللحم على الفقراء أو الأهل والأصدقاء.</li>
      </ul>
    </div>
  </section>
</main>
<?php require('views/parts/footer.php') ?>