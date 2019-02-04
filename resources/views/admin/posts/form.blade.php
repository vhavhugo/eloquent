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
    <label for="categories_ids" class="col-sm-2 control-label">Categorias</label>
    <div class="col-sm-10">
        <select name="categories_ids[]" id="categories_ids" class="form-control" multiple>
            @foreach($categories as $category)
                <option 
                    {{ in_array($category->id, $post->categories->pluck('id')->all()) ? 'selected' : '' }}
                    value="{{ $category->id }}">{{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-group">
    <label for="status" class="col-sm-2 control-label">Conteúdo</label>
    <div class="col-sm-10">
        <select name="status" id="status" class="form-control">
            <option {{ @$post->details->status == 'rascunho' ? 'selected' : '' }} value="rascunho">Rascunho</option>
            <option {{ @$post->details->status == 'revisao' ? 'selected' : '' }} value="revisao">Revisão</option>
            <option {{ @$post->details->status == 'publicado' ? 'selected' : '' }} value="publicado">Publicado</option>
        </select>
    </div>
</div>
<div class="form-group">
    <label for="visibility" class="col-sm-2 control-label">Visibilidade</label>
    <div class="col-sm-10">
        <select name="visibility" id="visibility" class="form-control">
            <option {{ @$post->details->status == 'privado' ? 'selected' : '' }} value="privado">Privado</option>
            <option {{ @$post->details->status == 'publico' ? 'selected' : '' }} value="publico">Publico</option>
        </select>
    </div>
</div>

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
    <button type="submit" class="btn btn-success">Salvar</button>
    </div>
</div>
