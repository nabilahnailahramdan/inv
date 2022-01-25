@props(['name'=>'','label'=>'', 'type'=>'text','value'=>''])
<?php
$invalid = $errors->has($name) ? ' is-invalid':"";
?>
<div class="form-group">
    <label for="<?= $name ?>"><?= $label ?></label>
    <input 
    name="<?= $name ?>" 
    id="<?= $name ?>" 
    type="<?= $type ?>" 
    value="{{ old($name, $value) }}"
    {{ $attributes->merge(['class' => 'form-control'.$invalid]) }} />
    @error($name)
        <div class="class-feedback">
            {{ $message }}
        </div>
    @enderror
</div>

