<footer>
  <div class="bg-footer">
    <div class="inner">
      <p id="pagetop"><a href="#header"><span class="bg-replace">ページトップへ</span></a></p>
      <div id="block-left">
        <section class="tagcloud">
          <h2>タグ</h2>
          <?php wp_tag_cloud('smallest=80&largest=130&unit=%&format=list'); ?>
       </section>
      </div>
      <div id="block-center">
        <section class="tw">
         <h2><a href="http://twitter.com/driclogy" target="_blank">TWITTER</a></h2>
        <a class="twitter-timeline"  href="https://twitter.com/driclogy"  data-widget-id="338666153280954368" data-chrome="noheader nofooter" height="450">@driclogy からのツイート</a>
<script charset="utf-8">!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

        </section>
      </div>
      <div id="block-right">
        <section>
          <h2>MESSAGE</h2>
          <?php echo do_shortcode( '[contact-form-7 id="26" title="コンタクトフォーム 1"]' ); ?> </section>
      </div>
      <p id="copyright">Copyright &copy;<?php echo date('Y');?> <a href="<?php echo home_url('/'); ?>">
        <?php bloginfo('name'); ?>
        </a>. All Rights Reserved.</p>
    </div>
  </div>
</footer>
<?php wp_footer(); ?>
</body></html>
