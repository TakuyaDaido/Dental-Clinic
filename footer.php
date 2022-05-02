    <footer class="footer">
        <div class="footer_top">
            <div class="footer_top-wrap">
                <div class="footer_map">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d26244.540600645956!2d135.51466926446534!3d34.6908617242753!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xf01d07d5ca11e41!2sOsaka%20Castle!5e0!3m2!1sen!2sjp!4v1648950002103!5m2!1sen!2sjp"
                         style="border:0;" style="vertical-align: bottom;" allowfullscreen=""
                        loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="footer_schedule">
                    <div class="schedule">
                        <table class="schedule_table">
                            <tbody>
                                <tr>
                                    <th>診療時間</th>
                                    <th>月</th>
                                    <th>火</th>
                                    <th>水</th>
                                    <th>木</th>
                                    <th>金</th>
                                    <th>土</th>
                                    <th>日/祝</th>
                                </tr>
                                <tr>
                                    <td>08:00-12:00</td>
                                    <td>○</td><!-- 月 -->
                                    <td>○</td><!-- 火 -->
                                    <td>○</td><!-- 水 -->
                                    <td>○</td><!-- 木 -->
                                    <td>○</td><!-- 金 -->
                                    <td>○</td><!-- 土 -->
                                    <td>-</td><!-- 日 -->
                                </tr>
                                <tr>
                                    <td>13:00-17:00</td>
                                    <td>○</td><!-- 月 -->
                                    <td>○</td><!-- 火 -->
                                    <td>○</td><!-- 水 -->
                                    <td>-</td><!-- 木 -->
                                    <td>○</td><!-- 金 -->
                                    <td>○</td><!-- 土 -->
                                    <td>-</td><!-- 日 -->
                                </tr>
                            </tbody>
                        </table>
                        <div class="schedule_txt-wrap">
                            <p class="schedule_txt">TEL.<span class="schedule_txt-tel">012-345-6789</span><span class="schedule_txt-time">(受付時間
                                8:00〜17:00)</span></p>
                        </div>
                    </div>
                    <div class="txt_wrap mt20">
                        <div class="txt">
                            <p>〒540-0002 大阪市中央区大阪城1-1<br>
                                大阪市営地下鉄・中央線「谷町四丁目駅」から徒歩18分</p>
                        </div>
                        <div class="txt mt10 font14">
                            <p>※前日や当日のお問い合わせフォームからのご予約は対応が遅れる場合がございます。お電話でのお問い合わせがスムーズです。</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer_bottom">
            <div class="footer_bottom-wrap">
                <div class="footer_logo">
                    <a href=""><img src="<?php echo get_template_directory_uri(); ?>/dist/img/logo.png" alt="大道歯科クリニックのロゴ"></a>
                </div>
                <ul class="footer_list">
                    <li class="footer_item"><a href="<?php echo home_url(); ?>/">ホーム</a></li>
                    <li class="footer_item"><a href="><?php echo home_url(); ?>/clinic/">当院について</a></li>
                    <li class="footer_item"><a href="<?php echo home_url(); ?>/service/">診療案内</a></li>
                    <li class="footer_item"><a href="<?php echo home_url(); ?>/category/news/">お知らせ</a></li>
                    <li class="footer_item"><a href="<?php echo home_url(); ?>/review/">お客様の声</a></li>
                    <li class="footer_item"><a href="<?php echo home_url(); ?>/contact/">お問い合わせ</a></li>
                </ul>
            </div>
        </div>
        <div class="footer_copyright ac">
            <p><small>&copy; Daido Dental Clinic 2021</small></p>
        </div>
    </footer>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/dist/js/slick.min.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/dist/js/script.min.js"></script>
    <?php wp_footer(); ?>
</body>
</html>