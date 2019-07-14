<?php if (!isset($pagetype['sidebar'])):?>

<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-profile">
      <a href="#" class="nav-link">
        <div class="nav-profile-image">
          <img src="<?=base_url('aassets')?>/images/faces/face1.jpg" alt="profile">
          <span class="login-status online"></span> <!--change to offline or busy as needed-->              
        </div>
        <div class="nav-profile-text d-flex flex-column">
          <span class="font-weight-bold mb-2">
          <?php
            if ($this->session->userdata['usertype'] == 'marketing') {
              echo ucwords($this->session->userdata['profile']['full_name']);
            } else {
              echo ucwords($this->session->userdata['username']);
            }
          ?>
          </span>
          <span class="text-secondary text-small">
          <?php
            if ($this->session->userdata['usertype'] == 'marketing') {
              echo ucwords($this->session->userdata['profile']['level']);
            } else {
              echo ucwords($this->session->userdata['usertype']);
            }
          ?>
          </span>
        </div>
        <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?=base_url('dashboard')?>">
        <span class="menu-title">Dashboard</span>
        <i class="mdi mdi-home menu-icon"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#masters" aria-expanded="false" aria-controls="ui-basic">
        <span class="menu-title">Masters</span>
        <i class="menu-arrow"></i>
        <i class="mdi mdi-crosshairs-gps menu-icon"></i>
      </a>
      <div class="collapse" id="masters">
        <ul class="nav flex-column sub-menu">
          <?php if ($this->session->userdata['profile']['level'] != 3): ?>
          <li class="nav-item"> <a class="nav-link" href="<?=base_url('marketing')?>">Marketing</a></li>
          <?php endif; ?>
          <li class="nav-item"> <a class="nav-link" href="<?=base_url('client')?>">Clients</a></li>
          <?php if (in_array($this->session->userdata['usertype'], ['admin'])): ?>
          <li class="nav-item"> <a class="nav-link" href="<?=base_url('product')?>">Product</a></li>
          <?php endif; ?>
        </ul>
      </div>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="<?=base_url('sale')?>">
        <span class="menu-title">Sales</span>
        <i class="mdi mdi-contacts menu-icon"></i>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="<?=base_url('installment')?>">
        <span class="menu-title">Installment</span>
        <i class="mdi mdi-contacts menu-icon"></i>
      </a>
    </li>
  </ul>
</nav>

<?php endif; ?>