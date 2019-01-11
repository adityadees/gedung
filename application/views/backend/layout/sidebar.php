<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
  <div class="main-menu-content">
    <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
      <li class=" navigation-header">
        <span>Menu</span><i class=" ft-minus" data-toggle="tooltip" data-placement="right"
        data-original-title="General"></i>
      </li>

      <li class="nav-item">
        <a href="<?php echo base_url();?>admin"><i class="ft-home"></i>
          <span class="menu-title" data-i18n="">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="<?= base_url();?>admin/gedung"><i class="fa fa-building"></i>
          <span class="menu-title" data-i18n="">Gedung</span>
        </a>
      </li>

      <li class=" nav-item"><a href="#"><i class="fa fa-tag"></i><span class="menu-title" data-i18n="">Kriteria</span></a>
        <ul class="menu-content">
          <li><a class="menu-item" href="<?= base_url();?>admin/kriteria">Data Kriteria</a>
          </li>
          <li><a class="menu-item" href="<?= base_url();?>admin/kriteria/sub">Sub Kriteria</a>
          </li>
        </ul>
      </li>

      <li class="nav-item">
        <a href="<?php echo base_url();?>admin/user"><i class="fa fa-user"></i>
          <span class="menu-title" data-i18n="">User</span>
        </a>
      </li>
    </ul>
  </div>
</div>

