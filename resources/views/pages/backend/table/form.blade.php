<div class="row">
    <div class="form-group col-lg-6">
        <label>Table Name</label>
        <input type="text" name="table_name"
               class="form-control"
               value="{{ old('table_name', $table->table_name ?? '') }}">
    </div>

    <div class="form-group col-lg-6">
        <label>Floor</label>
        <input type="text" name="floor"
               class="form-control"
               value="{{ old('floor', $table->floor ?? '') }}">
    </div>

    <div class="form-group col-lg-6">
        <label>Type</label>
        <select name="type" class="form-control">
            @foreach(['regular','premium'] as $t)
                <option value="{{ $t }}"
                    @selected(old('type', $table->type ?? '') == $t)>
                    {{ ucfirst($t) }}
                </option>
            @endforeach
        </select>
    </div>
</div>
