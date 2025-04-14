<?php require('views/parts/head.php') ?>
<?php require('views/parts/adminbar.php') ?>
<?php require('views/parts/navgtion.php') ?>
<?php require('views/parts/header.php') ?>

<main class="main_create_chatity">
    <div class="div_tbr3"> 
  <section class="donation-form">
  
  <div class="modal-content">
    <h2>إضافة إشعار جديد</h2>
    <form id="add-notification-form" action="/notifications_store" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="title">عنوان الإشعار:</label>
            <input type="text" id="title" name="title" required>
        </div>
        <div class="form-group">
            <label for="content">محتوى الإشعار:</label>
            <textarea id="content" name="content" rows="4" required></textarea>
        </div>
        <div class="form-group">
            <label for="send_at">تاريخ الإرسال:</label>
            <input type="datetime-local" id="send_at" name="send_at">
        </div>
        <div class="form-group">
            <label for="photo">صورة مرفقة:</label>
            <input type="file" id="photo" name="photo" accept="image/*">
        </div>
        <div class="form-group">
            <button type="submit" name="submit" aria-label="اضافة الاشعار">إضافة الإشعار</button>
        </div>
    </form>
</div>

  </section>
    </div>
</main>
<?php require('views/parts/footer.php') ?>