{include file="../header.tpl"}

<a href="home">
    <img src="./images/justrojo.png" class="logo" alt="home">
</a>

<div class="d-flex justify-content-center h-100">

    <div class="card">
        <div class="card-header">
            {if $mensaje != ""}
                <div class="alert alert-danger" role="alert">
                    {$mensaje}
                </div>
            {/if}
            <h3>Sign In</h3>
            <div class="d-flex justify-content-end social_icon">
                <span><i class="fab fa-facebook-square"></i></span>
                <span><i class="fab fa-google-plus-square"></i></span>
                <span><i class="fab fa-twitter-square"></i></span>
            </div>
        </div>

        <div class="card-body">
            <form action="verificarAdmin" method="post">
                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                    <input type="text" class="form-control" placeholder="username" name="input_user">
                </div>

                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                    </div>
                    <input type="password" class="form-control" placeholder="password" name="input_password">
                </div>

                <div class="form-group">
                    <input type="submit" value="Login" class="btn float-right login_btn">
                </div>
            </form>
        </div>

        <div class="card-footer">
            <div class="d-flex justify-content-between">
                <a href="#">Registrarme</a>
                <a href="#">¿Olvidaste la contraseña?</a>
            </div>
        </div>
    </div>
</div>