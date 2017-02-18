<body>
    <nav class="nav has-shadow">
        <div class="nav-left">
            <a class="nav-item">
                <img src="../../app/assets/img/naoperturbe.png" alt="Não perturbe logo">
            </a>
        </div>


        <!-- This "nav-toggle" hamburger menu is only visible on mobile -->
        <!-- You need JavaScript to toggle the "is-active" class on "nav-menu" -->
        <span class="nav-toggle">
            <span class="nav-item">
                <a class="nav-item is-active" href="pessoa-fisica">
                    Home
                </a>;
            </span>
            <span class="nav-item">
                <?php echo $PESSOA; ?>
            </span>
            <span class="nav-item">
                <?php echo $LOGIN; ?>
            </span>
        </span>

        <!-- This "nav-menu" is hidden on mobile -->
        <!-- Add the modifier "is-active" to display it on mobile -->
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
