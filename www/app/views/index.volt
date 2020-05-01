<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Ukázka kódu</title>
        <link rel="stylesheet" href="<?php echo $this->url->get('css/materialize.css')?>">
        <link rel="stylesheet" href="<?php echo $this->url->get('css/style.css')?>">
        <script src="<?php echo $this->url->get('js/materialize.js')?>"></script>
    </head>
    <body>

        <header>
            <div class="navbar-fixed">
                <nav>
                    <div class="nav-wrapper"> 
                        <a href="/?#" class="brand-logo">Ukázka kódu</a>
                        <ul id="nav-mobile" class="right">
                            <li><a href="/company">Katalog značek</a></li>
                        </ul>
                    </div>  
                </nav>
            </div>
        </header>

        <main>
            <div class="container main-container">
                <?php echo $this->getContent(); ?>
            </div>
        </main>

        <footer class="page-footer">
            Jan Oktábec
        </footer>

    </body>
</html>
