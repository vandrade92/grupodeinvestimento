<label class="{{ $class ?? null}}">
  <span>{{ $label ?? $input ?? "ERRO" }}</span>
  {!! Form::select($input, $attributes); !!}
</label>
