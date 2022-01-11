<!-- HEADER -->
<?php include ROOT . '/views/layouts/header.php';?>
<!-- END HEADER -->
<!-- MAIN -->
<div class="container support">
    <div class="contact-form">
    <h2>Поддержка</h2>
    <div class="form-container">
        <form class="my-form" action="/support/" method="post">
            <input
                type="email"
                name="email"
                class="text-input contact-input"
                placeholder="Ваш email..."
                required
            />
            <textarea
                type="email"
                name="message"
                class="text-input contact-input"
                placeholder="Ваше сообщение..."
                required
            ></textarea>
            <button type="submit" class="contact-btn">
                <i class="fas fa-envelope"></i>
                Отправить
            </button>
        </form>
    </div>
        <h3 class="mess"></h3>
    </div>
</div>
<!-- END MAIN -->

<!-- FOOTER -->
<?php include ROOT . '/views/layouts/footer-admin.php';?>
<!-- END FOOTER -->
