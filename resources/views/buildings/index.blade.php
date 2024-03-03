@extends('layouts.app')
@section('title', __($trans . '.plural'))
@section('breadcrumbs')
    <h1 class="d-flex align-items-center text-gray-900 fw-bold my-1 fs-3">
        {{ __($trans . '.plural') }}</h1>
    <span class="h-20px border-gray-200 border-start mx-3"></span>
    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-1">
        <li class="breadcrumb-item text-muted"><a href="{{ route('home') }}"
                class="text-muted text-hover-primary">{{ __('site.home') }}</a></li>
        <li class="breadcrumb-item"><span class="bullet bg-gray-200 w-5px h-2px"></span></li>
        <li class="breadcrumb-item text-dark">{{ __($trans . '.plural') }}</li>
    </ul>
@stop
@section('style')
    <style>
        table {
            box-shadow: 0px 2px 18px 0px rgba(3, 25, 41, 0.5);

        }
    </style>

    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet" type="text/css" />
@stop
@section('content')
    <div class="container-xxl" id="kt_content_container">
        <div class="card">

            <div class="card-body pt-5">


                <h1 class="d-flex align-items-center text-gray-900 fw-bold my-1 fs-2">{{ __($trans . '.plural') }}
                    {{ $buildings->count() }} </h1>
                <div class="table-responsive">
                    @foreach ($buildings as $building)
                        <table class="table align-middle table-row-bordered fs-6 gy-5 p-5" id="buildings">
                            <thead>
                                <tr class="fw-semibold fs-7 text-primary border-bottom border-gray-200 py-4">
<<<<<<< HEAD
                                    <th style="color: red">التصنيف</th>                                   
                                    @foreach ($building->submissions as $f)
                                    <th>{{ $f->fields->label}}</th>
=======
                                    <th style="color: red">التصنيف</th>

                                    @foreach ($building->type->form->fields as $field)
                                        <th> <h1>{{ $field->id }}</h1> {{ $field->label }}</th>
>>>>>>> 003ee5513e27b5503a148045b201e5f6855a5430
                                    @endforeach
                                    <th style="color: red">تاريخ أضافه المبني</th>
                                </tr>

                            </thead>
                            <tbody class="text-gray-600">
                                <tr>
                                    <td>
                                        <span class="bullet bullet-dot h-15px w-15px"
                                            style="background:{{ $building->type->color }}"></span>
                                        <b>{{ $building->type->title }}</b>
                                    </td>
<<<<<<< HEAD
                                      

                                     
                                    
                                     @foreach ($building->submissions as $ks)
                                    <td>
                                        @if(intval($ks->field_fillable_id))
                                        
                                        <div style="color:cadetblue;">{{ $ks->bfillables->display ?? '' }}</div>
                                        
                                        @elseif ($ks->field_fillable_id == 'multiplie_answer')
                                        <div style="color: red;">multiplie_answer</div>

                                        @else

                                        <div style="color: green">{{ $ks->fill_answer_text }}</div>
 
                                     @endif

                                    </td>
                                    @endforeach 
=======
                                    @foreach ($building->submissions as $submission)
                                        <td>


                                            <h1>{{ $submission->field_id }}</h1>
  {{-- @if ($submission->fill_answer_text == 'multiplie_answer')                                             --}}
                                            {{-- {{ $submission->field->type }} --}}
                                            {{-- asdasdsa --}}
                                            {{-- @else --}}
>>>>>>> 003ee5513e27b5503a148045b201e5f6855a5430



<<<<<<< HEAD
                                   
=======
                                            {{-- @endforeach --}}

                                            
                                            {{-- {{ $submission->fill_answer_text }} --}}


                                            {{-- @endif --}}                                            

                                            {{-- @if ($submission->field_fillable_id == 'multiplie_answer')
                                            multi plie answers
                                            @elseif(!(empty($submission->field_fillable_id)))
                                            
                                            realtion relation 
                                            @endif --}}
{{--  dasdas  --}}
                                            {{-- {{ $submission->field->type }} --}}
                                            {{ $submission->fill_answer_text }}
                                            {{-- @endif --}}
                                        </td>
                                    @endforeach
>>>>>>> 003ee5513e27b5503a148045b201e5f6855a5430
                                    <td>
                                        {{ $building->created_at }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@stop
@section('scripts')


@stop
 
