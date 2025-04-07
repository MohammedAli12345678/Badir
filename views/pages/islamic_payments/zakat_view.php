<?php require('views/parts/head.php') ?>
<?php require('views/parts/adminbar.php') ?>
<?php require('views/parts/navgtion.php') ?>
<?php require('views/parts/header.php') ?>

<main class="main_islamic_payments_zakat">
  <section class="form_zakat">
    <!-- <h1>حاسبة الزكاة</h1>
    <img src="views/media/images/zkat.png" alt="">
    <p>"تجب الزكاة على المال إذا حال عليه الحول، 
      أي مر عليه عامٌ كامل وفق التقويم الهجري،
       وذلك في الأموال النقدية والذهب والفضة
       وعروض التجارة. أما الزروع والثمار،
       فتجب زكاتها عند الحصاد، لقوله تعالى:
      <span> (وَآتُوا حَقَّهُ يَوْمَ حَصَادِهِ) [الأنعام: 141].</span>
       لذا، احرص على متابعة أموالك ومحاصيلك
       لتؤدي حق الله فيها في الوقت المحدد."</p>
    <div class="container">
    <table>
      <thead>
        <tr>
          <th>نوع الزكاة</th>
          <th>الكمية المراد حساب زكاتها</th>
          <th>وحدة القياس</th>
          <th>الزكاة الواجبة</th>
          <th>ما يبقى من المال</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="zakat-type">زكاة المال</td>
          <td><input type="text" placeholder="أدخل المبلغ"></td>
          <td>
            <select>
              <option>ريال</option>
              <option>دولار</option>
              <option>يورو</option>
            </select>
          </td>
          <td><input type="text" placeholder=" ادخل الكمية"></td>
          <td><input type="text" placeholder=" ادخل الكمية"></td>
        </tr>
        <tr>
          <td class="zakat-type">زكاة الفضة</td>
          <td><input type="text" placeholder="أدخل الكمية"></td>
          <td>جرام</td>
          <td><input type="text" placeholder=" ادخل الكمية"></td>
          <td><input type="text" placeholder="ادخل الكمية"></td>
        </tr>
        <tr>
          <td class="zakat-type">زكاة الذهب</td>
          <td><input type="text" placeholder="أدخل الكمية"></td>
          <td>جرام</td>
          <td><input type="text" placeholder=" ادخل الكمية"></td>
          <td><input type="text" placeholder="ادخل الكمية"></td>
        </tr>
        <tr>
          <td class="zakat-type">زكاة الإبل</td>
          <td><input type="text" placeholder="أدخل العدد"></td>
          <td>رأس</td>
          <td><input type="text" placeholder=" ادخل الكمية"></td>
          <td><input type="text" placeholder="ادخل الكمية"></td>
        </tr>
        <tr>
          <td class="zakat-type">زكاة البقر</td>
          <td><input type="text" placeholder="أدخل العدد"></td>
          <td>رأس</td>
          <td><input type="text" placeholder=" ادخل الكمية"></td>
          <td><input type="text" placeholder="ادخل الكمية"></td>
        </tr>
        <tr>
          <td class="zakat-type">الماشية (الأغنام والخرفان)</td>
          <td><input type="text" placeholder="أدخل العدد"></td>
          <td>رأس</td>
          <td><input type="text" placeholder=" ادخل الكمية"></td>
          <td><input type="text" placeholder="ادخل الكمية"></td>
        </tr>
        <tr>
          <td class="zakat-type">ما يخرج من الأرض</td>
          <td><input type="text" placeholder="أدخل الكمية"></td>
          <td>كيلو جرام</td>
          <td><input type="text" placeholder=" ادخل الكمية"></td>
          <td><input type="text" placeholder="ادخل الكمية"></td>
        </tr>
      </tbody>
    </table>

  
    <button class="calc-button" type="submit" nmae="calc_zakat">احسب الزكاة</button>
  </div>
   -->
   <img src="views/media/images/zkat.png" alt="">
   <h1>حاسبة الزكاة </h1>
   <div>
      <label >المال :</label> 
      <input type="number" placeholder="المبلغ">
      <span>ريال</span>
   </div><br>

   <div>
      <label>الفضة:</label>
      <input type="number" placeholder="وزن الفضة">
      <span>جرام</span>
  </div><br>

  <div>
      <label>الذهب:</label>
      <input type="number" placeholder="وزن الذهب">
      <span>جرام</span>
  </div><br>

  <div>
   <label>زكاة الابل:</label>
   <input type="number" placeholder="العدد">
   <span>رأس</span>
  </div><br>

  <div>
   <label>زكاة البقر:</label>
   <input type="number" placeholder="العدد">
   <span>رأس</span>
  </div><br> 

    <div>
    <button>حساب</button>  
    <button>إضافة إلى السلة</button>
    </div> 
     
  </section>
  
  
  <section >
  <!-- تعريف عام  -->

  <div>
    <p>
     <strong>قال الله تعالى :</strong>
     (خُذْ مِنْ أَمْوَالِهِمْ صَدَقَةً تُطَهِّرُهُمْ وَتُزَكِّيهِم بِهَا وَصَلِّ عَلَيْهِمْ إِنَّ صَلَاتَكَ سَكَنٌ لَّهُمْ) [التوبة: 103]
    </p>
    
    <p>
      قال رسول الله صلى الله عليه وسلم:<strong>"اتقوا النار ولو بشقِّ تمرةٍ".</strong>رواه البخاري ومسلم.
    </p>
</div>

  <div>
    <p>
      <strong> الزكاة وأحكامها:</strong><br>
      الزكاة هي الركن الثالث من أركان الإسلام، فرضها الله على المسلمين 
      القادرين تطهيرا لأموالهم، وتحقيقًا للتكافل الاجتماعي.
      <br>أحكام الزكاة:<br>
      1.حكمها:فرض عين على كل مسلم يملك النصاب ومر عليه الحول .<br>
      2.النصاب:مقدار معين من المال تجب فيه الزكاة, وهو يعادل85 جراما من الذهب .<br>
      3.الأنواع:تشمل زكاة المال ,الذهب والفضة ,الزروع والثمار ,عروضالتجارة ,الأنعام ,وزكاة الفطر .<br>
      4.المستحقون:كما ورد في سورة التوبة(60),تشمل الفقراء,المساكين,العاملين عليها,
      .المؤلفة قلوبهم,في الرقاب,الغارمين,في سبيل الله,وبن السبيل
    </p>
  </div>
  </section>
</main>
<?php require('views/parts/footer.php') ?>