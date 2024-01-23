<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>تعديل المباني</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

    <h1>تعديل بيانات
    </h1>


    <div align="center">
    <form enctype="multipart/form-data" action="{{ $updateRoute }}" method="post">
        @csrf
        @method('PUT')



        @foreach ($fields as $field)
            <p>
            <h1>{{ $field->display }}</h1>
            </p>


            @if (in_array($field->type, ['textbox', 'numbers', 'date']))
                <input value="{{ $field->values->fill_answer_text ?? '' }}" type="{{ $field->type }}"
                    name="field_id[{{ $field->id }}-{{ $field->type }}]" id="{{ $field->name }}">
                {{-- <p><small>{{ $field->rules }}</small></p> --}}
            @elseif($field->type == 'textarea')
                <textarea name="field_id[{{ $field->id }}-{{ $field->type }}]">{{ $field->values->fill_answer_text ?? '' }}</textarea>
            @elseif($field->type == 'file')
                <p>
                    @if(!(empty($field->values->fill_answer_text)))
                    
                   
                    @if($field->attribute == '"images"')                   
                    <p>
                        <a href="{{ url(asset($field->values->fill_answer_text)) }}">  
                        <img width="150" src="{{ url(asset($field->values->fill_answer_text)) }}">
                        </a>
                    </p>
                    @elseif($field->attribute == '"documents"')
                    <p>
                        <a href="{{ url(asset($field->values->fill_answer_text)) }}">  
                         <img src="{{ asset('assets/media/svg/files/'.File::extension(url(asset($field->values->fill_answer_text))).'.svg') }}"> 
                        </a>
                    </p>

                    
                    @endif
 
                    @endif

                    <input type="file" id="{{ $field->name }}"
                        name="field_id[{{ $field->id }}-{{ $field->type }}]">
                </p>
            @elseif($field->type == 'radiobox')
                <p>
                    @foreach ($field->fillables as $fillable)
                        <input type="radio" id="{{ $field->name }}" value="{{ $fillable->id }}"
                            name="field_id[{{ $field->id }}-{{ $field->type }}]"
                            
                            {{ $fillable->id == $field->values->field_fillable_id ? 'checked':''}}
                            > {{ $fillable->display }}
                    @endforeach
                </p>
            @elseif($field->type == 'checkbox')
                <p>
                    @foreach ($field->fillables as $fillable)
                        <p style="padding:10px;">

                           
                            <input type="checkbox" id="{{ $field->name }}" value="{{ $fillable->id }}"
                                {{ in_array($fillable->id,explode(',',$field->values->field_fillable_id)) ? 'checked':'' }} name="field_id[{{ $field->id }}-{{ $field->type }}][]">
                            {{ $fillable->display }}
                        </p>
                    @endforeach
                </p>
            @elseif($field->type == 'select')
                <p>
                   
                    {{ $field->values->field_fillable_id }}
                    <select id="{{ $field->name }}" name="field_id[{{ $field->id }}-{{ $field->type }}]">
                        @foreach ($field->fillables as $fillable)
                            <option value="{{ $fillable->id }}" {{ $fillable->id == $field->values->field_fillable_id ? 'selected':''}}>{{ $fillable->display }} {{ $fillable->id }}</option>
                        @endforeach
                    </select>
                </p>
            @endif
        @endforeach
        <p>
            <br>
            <input type="submit" value="تحديث" style="font-size: 50px">
        </p>
        <br>

    </form>
    </div>



</body>

</html>
