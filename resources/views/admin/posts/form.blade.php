<div class="form-group">
    <label for="title" class="col-sm-2 control-label">Título</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="title" name="title" placeholder="Título" value="{{ @$post->title }}">
    </div>
</div>
<div class="form-group">
    <label for="content" class="col-sm-2 control-label">Conteúdo</label>
    <div class="col-sm-10">
        <textarea class="form-control" id="content" name="content" placeholder="Conteúdo">{{ @$post->content }}</textarea>
    </div>
</div>

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
    <button type="submit" class="btn btn-success">Salvar</button>
    </div>
</div>
