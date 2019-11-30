<body>
    <nav class="nav has-shadow">
        <div class="nav-left">
            <a class="nav-item" href="#">
                <img class="animated fadeInDown" alt="logo">

            </a>
        </div>
        <label class="nav-toggle" for="nav-toggle-state">
            <span></span>
            <span></span>
            <span></span>
        </label>
        <input type="checkbox" id="nav-toggle-state" />

        <div class="nav-right nav-menu">
            <span class="nav-item">
                <?php echo $PESSOA; ?>
            </span>
            <span class="nav-item">
                <?php echo $LOGIN; ?>
            </span>

        </div>
    </nav>


    <section class="hero np-is-primary is-bold has-shadowBotom">
        <div class="hero-body">
            <div class="container is-fluid">
                <h1 class="title np-title-white np-is-white is-4">
                    Registro de clientes
                </h1>
                <h2 class="subtitle np-is-silver is-6">
                    Cadastro de clientes empresariais
                </h2>
            </div>
        </div>
    </section>

    <div class="container np-padding-tb-35">
