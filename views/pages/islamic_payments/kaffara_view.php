<?php require('views/parts/head.php') ?>
<?php require('views/parts/adminbar.php') ?>
<?php require('views/parts/navgtion.php') ?>
<?php require('views/parts/header.php') ?>

<main class="main_islamic_payments_zakat">
  <section class="form_zakat">
  <!-- حسابة الكفاره-->

  
    <!-- فورم حساب الكفارة -->
    <form >
      <h2>احسب الكفارة حسب حالتك</h2>

      <label>اختر نوع الكفارة:</label>
      <div class="type-options">
        <div class="option-box" data-type="يمين">كفارة يمين (الحلف بالله)</div>
        <div class="option-box" data-type="صيام">كفارة إفطار في رمضان (متعمد)</div>
        <div class="option-box" data-type="ظهار">كفارة الظهار</div>
        <div class="option-box" data-type="قتل">كفارة القتل الخطأ</div>
        <div class="option-box" data-type="نذر">كفارة النذر</div>
      </div>

      <input type="hidden" id="type" name="type">

      <label for="count">كم مرة وجبت عليك الكفارة؟</label>
      <input type="number" id="count" name="count" required min="1">

      <button type="submit">احسب</button>

      <input type="text" placeholder="ناتج الكفارة التي عليك">
    </form>


  </section>



  <section >
  <!-- تعريف عام  -->
   
    <!-- معلومات حول الكفارة -->
    <div class="info-box info-section">
      <h2>ما هي الكفارة؟</h2>
      <p>
        الكفارة هي ما يُؤدى لتكفير ذنب أو مخالفة شرعية. فرضها الله في بعض الحالات للتوبة ولتطهير النفس، وهي تختلف حسب نوع المخالفة.
      </p>

      <h3>أنواع الكفارات:</h3>
      <ul>
        <li><strong>اليمين:</strong> إطعام 10 مساكين، أو كسوتهم، أو تحرير رقبة، فإن لم يجد فصيام 3 أيام.</li>
        <li><strong>الإفطار في رمضان:</strong> صيام شهرين متتابعين، أو إطعام 60 مسكينًا.</li>
        <li><strong>الظهار:</strong> تحرير رقبة، فإن لم يجد فصيام شهرين، فإن لم يستطع فإطعام 60 مسكينًا.</li>
        <li><strong>القتل الخطأ:</strong> تحرير رقبة مؤمنة، فإن لم يجد فصيام شهرين متتابعين.</li>
        <li><strong>النذر:</strong> الوفاء به، فإن تعذر فيخرج كفارة يمين.</li>
      </ul>

      <h3>شروط الكفارة:</h3>
      <ul>
        <li>النية الصادقة والإخلاص لله.</li>
        <li>القيام بالكفارة فور القدرة دون تأخير.</li>
        <li>اتباع الترتيب عند وجوبه (مثل الصيام بعد العجز عن الإطعام).</li>
      </ul>

      <h3>فوائد الكفارة:</h3>
      <ul>
        <li>تكفير الذنوب والمعاصي.</li>
        <li>تقوية الصلة بالله والتوبة النصوح.</li>
        <li>مساعدة المحتاجين والمساكين (في كفارات الإطعام).</li>
      </ul>

      <h3>آيات وأحاديث:</h3>
      <ul>
        <li>قال تعالى: ﴿ فَكَفَّارَتُهُ إِطْعَامُ عَشَرَةِ مَسَاكِينَ ﴾ [المائدة: 89]</li>
        <li>قال النبي ﷺ: "من حلف على يمين فرأى غيرها خيرًا منها فليأتِ الذي هو خير، وليكفر عن يمينه." (رواه مسلم)</li>
      </ul>
    </div>
  </section>
</main>
<?php require('views/parts/footer.php') ?>