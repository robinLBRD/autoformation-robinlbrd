<div class="jumbotron">
    <div class="container mt-4">
        <h2>Inscrivez-vous :</h2>
        <form action="?controller=users&action=insert" method="POST">
            <div class="form-group">
                <label for="username">Utilisateur : </label>
                <input type="text" class="form-control" id="username" name="username" />
            </div>
            <div class="form-group">
                <label for="pwd">Mot de passe : </label>
                <input type="password" class="form-control" id="pwd" name="pwd" />
            </div>
            <div class="form-group">
                <label for="confPwd">Confirmation : </label>
                <input type="password" class="form-control" id="confPwd" name="confPwd" />
            </div>
            <input type="submit" class="btn btn-success" name="envoyer" />
        </form>
    </div>
</div>