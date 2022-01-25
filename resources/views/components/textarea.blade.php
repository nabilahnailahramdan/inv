@props(['name'=>'','label'=>'', 'value'=>''])
<?php
$invalid = $errors->has($name) ? ' is-invalid':"";
?>
<div class="form-group">
    <label for="<?= $name ?>"><?= $label ?></label>
    <textarea
    name="<?= $name ?>" 
    id="<?= $name ?>" 

    {{ $attributes->merge(['class' => 'form-control'.$invalid]) }}></textarea>
    @error($name)
        <div class="class-feedback">
            {{ $message }}
        </div>
    @enderror
</div>

