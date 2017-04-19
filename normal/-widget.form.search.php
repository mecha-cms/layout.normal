<section class="widget widget--form widget--form-search">
  <section class="widget-body">
    <div class="widget-content">
      <form class="form-search" action="<?php echo $url . '/' . $state->widget['page']['path']; ?>" method="get">
        <?php echo Form::text($config->q, Request::get($config->q), $language->search . '…', ['classes' => ['input']]) . ' ' . Form::submit(null, null, "", ['classes' => ['button']]); ?>
      </form>
    </div>
  </section>
</section>