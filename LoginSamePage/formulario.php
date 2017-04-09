

    <div class="row">
            <form action="<?php print $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data" class="col s4 offset-s4">
                <div class="row">
                    <div class="input-field">
                        <input id="usuario" name="usuario" type="text" class="validate">
                        <label for="usuario">Usuario</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field">
                        <input id="clave" name="clave" type="text" class="validate">
                        <label for="clave">Clave</label>
                    </div>
                </div>
                <div class="row">
                    <button class="btn waves-effect waves-light col s4 offset-s4" type="submit" name="enviar">
                        Enviar
                    </button>
                </div>
            </form>
        </div>