<form enctype="multipart/form-data" action="{{ $storeRoute }}" method="post">
    @csrf

  

    @foreach ($fields as $field)
        <p><h1>{{ $field->display }}</h1></p>


        @if (in_array($field->type, ['textbox','numbers','date']))
            <input type="{{ $field->type }}" name="field_id[{{ $field->id }}-{{ $field->type }}]" id="{{ $field->name }}">
            {{-- <p><small>{{ $field->rules }}</small></p> --}}

            @elseif($field->type == 'textarea')
            <textarea name="field_id[{{ $field->id }}-{{ $field->type }}]"></textarea>



            @elseif($field->type == 'file')
            <p>
                <input type="file" id="{{ $field->name }}" name="field_id[{{ $field->id }}-{{ $field->type }}]">
            </p>
        @elseif($field->type == 'radiobox')
            <p>
                @foreach ($field->fillables as $fillable)
                    <input type="radio" id="{{ $field->name }}" value="{{ $fillable->id }}"
                        name="field_id[{{ $field->id }}-{{ $field->type }}]"> {{ $fillable->display }}
                @endforeach
            </p>
        @elseif($field->type == 'select')
            <p>
                <select id="{{ $field->name }}" name="field_id[{{ $field->id }}-{{ $field->type }}]">
                    @foreach ($field->fillables as $fillable)
                        <option value="{{ $fillable->id }}">{{ $fillable->display }}</option>
                    @endforeach
                </select>
            </p>
        @endif
    @endforeach
    <p>
        <input type="submit" value="Save">
    </p>
    <br>

</form>
