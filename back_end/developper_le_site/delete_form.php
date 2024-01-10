<div class="container-fluid">

    <div class="d-flex justify-content-center">
        <h1>Suprimer un vinyle </h1>
    </div>

    <form action="delete_script.php" method="POST" enctype="multipart/form-data">

        <div class="form-group">
            <label for="titre">Title</label>
            <input type="titre" class="form-control" id="titre">
        </div>

        <div class="form-group">
            <label for="artiste">Artist</label>
            <select class="form-control" name="artiste">

                <?php foreach ($artisttable as $artist): ?>

                    <option value="<?=$artist -> artist_id; ?>">
                        <?=$artist -> artist_name; ?>
                    </option>
                    
                <?php endforeach; ?>

            </select>
        </div>

        <div class="form-group">
            <label for="annee">Year</label>
            <input type="annee" class="form-control" id="annee">
        </div>
        <div class="form-group">
            <label for="genre">Genre</label>
            <input type="genre" class="form-control" id="genre">
        </div>
        <div class="form-group">
            <label for="label">Label</label>
            <input type="label" class="form-control" id="label">
        </div>
        <div class="form-group">
            <label for="prix">Price</label>
            <input type="prix" class="form-control" id="prix">
        </div>
        <div class="form-group">
            <label for="photo">Picture</label>
            <input type="file" class="form-control-file" id="photo">
        </div>

        <label for="picture"><h5>Picture</h5></label>

        <div class="col-9 mb-4">
            <img src="">
        </div>

    </form>

</div>