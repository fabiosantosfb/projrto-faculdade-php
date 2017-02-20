<body>
    <nav class="nav has-shadow">
      <div class="nav-left">
        <a class="nav-item is-brand" href="#">
          <img src="../../app/assets/img/naoperturbe.png" alt="Não perturbe logo">
        </a>
      </div>

      <!-- Using a <label /> here -->
      <label class="nav-toggle" for="nav-toggle-state">
        <span></span>           <!-- ^^^^^^^^^^^^^^^^ -->
        <span></span>
        <span></span>
      </label>

      <!-- This checkbox is hidden -->
      <input type="checkbox" id="nav-toggle-state" />

      <div class="nav-right nav-menu">
        <span class="nav-item">
            <?php echo $HOME; ?>
        </span>
        <span class="nav-item">
            <?php echo $PESSOA; ?>
        </span>
        <span class="nav-item">
          <?php echo $LOGIN; ?>
      </span>

      </div>
    </nav>


    <section class="hero is-primary is-bold has-shadowBotom">
        <div class="hero-body">
            <div class="container is-fluid">
                <h1 class="title">
                    Registro de telefones
                </h1>
                <h2 class="subtitle">
                    Cadastro de telefones para bloqueio de ligações de empresas de telemarketing
                </h2>
            </div>
        </div>
    </section>

    <div class="container np-padding-t-15">
        <!-- <div class="principal  has-shadowHere"> -->
