<footer>
    <div class="footer-container container">
        <div class="footer-row">
            <div class="footer-section about">
                <h3 class="logo-text">Movies</h3>
                <p>
                    Каждый день миллионы людей ищут фильмы онлайн, и никто не хочет
                    усложнять себе жизнь – и вы наверняка один из них! А раз так, то
                    Movies.com – это именно тот ресурс, который вам нужен.
                </p>
                <div class="contact">
                    <span><i class="fas fa-phone"></i>&nbsp; +380-067-410-7509</span>
                    <span
                    ><i class="fas fa-envelope"></i>&nbsp; bodyost97@gmail.com</span
                    >
                </div>
                <div class="socials">
                    <a href="#"><i class="fab fa-facebook"></i></a
                    ><a href="#"><i class="fab fa-instagram"></i></a
                    ><a href="#"><i class="fab fa-twitter"></i></a
                    ><a href="#"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
            <div class="footer-section links">
                <h3>Полезные ссылки</h3>
                <br />
                <ul>
                    <a href="/films/">
                        <li>Фильмы</li>
                    </a>
                    <a href="/cartoons/">
                        <li>Мультфильмы</li>
                    </a>
                    <a href="/serials/">
                        <li>Сериалы</li>
                    </a>
                    <a href="/support/">
                        <li>Поддержка</li>
                    </a>
                </ul>
            </div>
            <div class="footer-section contact-form">
                <h3>Контакты</h3>
                <form action="/support/" method="post">
                    <input
                        type="email"
                        name="email"
                        class="text-input contact-input"
                        placeholder="Ваш email..."
                    />
                    <textarea
                        type="email"
                        name="message"
                        class="text-input contact-input"
                        placeholder="Ваше сообщение..."
                    ></textarea>
                    <button type="submit" class="contact-btn">
                        <i class="fas fa-envelope"></i>
                        Отправить
                    </button>
                </form>
            </div>
        </div>
        <div class="footer-bottom">
            &copy; movies.com | Designer by Ostapchuk
        </div>
    </div>
</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="/template/js/sort.js"></script>
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
<script src="/template/slick/slick.min.js"></script>
<script src="/template/js/swiper.js"></script>
<script src="/template/js/burger-menu.js"></script>
<script src="/template/js/slider.js"></script>
<script src="/template/js/mode.js"></script>
<script>
    $(document).ready(function (){
        $('.add-to-save').click(function (){
            var id = $(this).attr('data-id');
            $.post('/save/add/'+id, {}, function (data){
                $('#save-count').html(data);
            });
            return false;
        });
    });
</script>
</body>
</html>