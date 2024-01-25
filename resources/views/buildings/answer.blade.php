<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>أضافه المباني</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>

  <body>
<form enctype="multipart/form-data" action="{{ $storeRoute }}" method="post">
    @csrf


   <h1>
    أستمارة
        </h1>
    {{ $form->title }}
  

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
 
        @elseif($field->type == 'checkbox')
        <p>
                @foreach ($field->fillables as $fillable)
                
                    <p>{{ $fillable->id }} ------------ <input type="checkbox" id="{{ $field->name }}" value="{{ $fillable->id }}"
                        name="field_id[{{ $field->id }}-{{ $field->type }}][]"> {{ $fillable->display }}
                    </p>
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


 
  </body>
</html>
