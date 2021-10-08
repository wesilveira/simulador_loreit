
            <div class="container-menu">
                <div class="rowPrincipal">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg">
                            <div style="width:20%">
                                <a href="../index.php">
                                    <img src="assets_new/images/logo.png" alt="Logo" style="width: 150px;">
                                </a>
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="toggler-icon"></span>
                                    <span class="toggler-icon"></span>
                                    <span class="toggler-icon"></span>
                                </button>
                            </div>
                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                <ul id="nav" class="navbar-nav ml-auto">
                                    <li class="nav-item active">
                                        <a class="page-scroll" href="index.php">Inicio</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="consultor/login.php">Acompanhamento</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-info">
                                            <div>
                                                <p class="texto11-menu">Olá, <strong><?php echo $dadosUsuario["nome"]; ?></strong></p>
                                            </div>
                                            <div>
                                                <p style="margin: 0">
                                                    <a class="texto11-sair" href="#" onClick="localStorage.clear();window.location.href='?logout'">Sair</a>
                                                </p>
                                            </div>
                                        </div> 
                        </nav> 
                    </div>
                </div> 
            </div> 
        