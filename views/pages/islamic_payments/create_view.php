<?php require('views/parts/head.php') ?>
<?php require('views/parts/adminbar.php') ?>
<?php require('views/parts/navgtion.php') ?>
<?php require('views/parts/header.php') ?>

<main class="main_create_chatity">
    <div class="div_tbr3"> 
  <section class="donation-form">
  <div class="modal-content">
    <h1>إضافة دفعة إسلامية جديدة</h1>
    <div id="group">
    <form id="add-payment-form" action="/islamic_payments_store" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="type">نوع الدفعة:</label>
            <input type="number" id="type" name="type" required>
        </div>
        <div class="form-group">
            <label for="name">الاسم:</label>
            <input type="text" step="1" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="short_description">وصف المصرف:</label>
            <input type="text" step="1" id="short_description" name="short_description" required>
        </div>
        <div class="form-group">
            <label for="cost">التكلفة:</label>
            <input type="number" step="1" id="cost" name="cost" required>
        </div>
        <div class="form-group">
            <label for="paid_cost">المبلغ المدفوع:</label>
            <input type="number" step="1" id="paid_cost" name="paid_cost" required>
        </div>
        <div class="form-group">
            <label for="payment_date">تاريخ الدفع:</label>
            <input type="datetime-local" id="payment_date" name="payment_date">
        </div>
        <div class="form-group">
            <label for="user_id">معرف المستخدم:</label>
            <input type="text" id="user_id" name="user_id" required>
        </div>
        <div class="form-group">
            <label for="photo">صورة الدفع:</label>
            <input type="file" id="photo" name="photo" accept="image/*" required>
        </div>
        <div class="form-group">
            <button type="submit" name="submit" aria-label="اضافة">إضافة دفعة</button>
        </div>
    </form>
    </div>
</div>

  </section>
    </div>
</main>
<?php require('views/parts/footer.php') ?>