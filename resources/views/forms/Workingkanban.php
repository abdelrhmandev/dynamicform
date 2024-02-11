@extends('layouts.app')
@section('title', __($trans . '.add'))
@section('breadcrumbs')
    <h1 class="d-flex align-items-center text-gray-900 fw-bold my-1 fs-3">{{ __($trans . '.plural') }}</h1>
    <span class="h-20px border-gray-200 border-start mx-3"></span>
    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-1">
        <li class="breadcrumb-item text-muted"><a href="{{ route('home') }}"
                class="text-muted text-hover-primary">{{ __('site.home') }}</a>
        </li>
        <li class="breadcrumb-item"><span class="bullet bg-gray-200 w-5px h-2px"></span></li>
        <li class="breadcrumb-item text-dark">{{ __($trans . '.add') }}</li>
    </ul>
@stop
@section('style')
 
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/custom/jkanban/jkanban.bundle.css') }}" rel="stylesheet" type="text/css" />
@stop
@section('content')
    <div id="kt_content_container" class="container-xxl">



        <form id="Add{{ $trans }}" data-route-url="{{ $storeRoute }}" class="form d-flex flex-column flex-lg-row"
            data-form-submit-error-message="{{ __('site.form_submit_error') }}"
            data-form-agree-label="{{ __('site.agree') }}">
            <div class="d-flex flex-column gap-3 gap-lg-7 w-100 mb-2 me-lg-5">
                <div class="card card-flush py-0">
               <div id="kt_docs_jkanban_color"></div>
 
           </div>
                <x-btns.button />
            </div>
        </form>







    </div>
@stop
@section('scripts')
    <script src="{{ asset('assets/js/custom/Tachyons.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom/es6-shim.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/widgets.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/custom/handleFormSubmit.js') }}"></script>



    <script src="{{ asset('assets/plugins/custom/jkanban/jkanban.bundle.js') }}"></script>


    <script>
        var KanbanTest = new jKanban({
        element: "#kt_docs_jkanban_color",
        gutter: "10px",
        widthBoard: "450px",
        itemHandleOptions:{
          enabled: true,
        },
 
        dropEl: function(el, target, source, sibling){

          // var Fieldid  = console.log(el.dataset.eid);
          // var case = console.log(target.parentElement.getAttribute('data-id'));
         
          

          
        },
         
        itemAddOptions: {
          enabled: true,
          content: '+ Add New Card',
          class: 'custom-button',
          footer: true
        },
        boards: [
          {
            id: "_todo",
            title: "To Do (Can drop item only in working)",
            class: "info,good",
            dragTo: ["_working"],
            item: [
              {
                id: "1",
                title: "Name",           
              }, 
              {
                id: "2",
                title: "Email",           
              }, 
            ]
          },
          {
            id: "_working",
            title: "Working (Try drag me too)",
            class: "warning",
 
          },
 
        ]
      });

      var toDoButton = document.getElementById("addToDo");
      toDoButton.addEventListener("click", function() {
        KanbanTest.addElement("_todo", {
          title: "Test Add"
        });
      });

      var toDoButtonAtPosition = document.getElementById("addToDoAtPosition");
      toDoButtonAtPosition.addEventListener("click", function() {
        KanbanTest.addElement("_todo", {
          title: "Test Add at Pos"
        }, 1);
      });

      var addBoardDefault = document.getElementById("addDefault");
      addBoardDefault.addEventListener("click", function() {
        KanbanTest.addBoards([
          {
            id: "_default",
            title: "Kanban Default",
            item: [
              {
                title: "Default Item"
              },
              {
                title: "Default Item 2"
              },
              {
                title: "Default Item 3"
              }
            ]
          }
        ]);
      });

      var removeBoard = document.getElementById("removeBoard");
      removeBoard.addEventListener("click", function() {
        KanbanTest.removeBoard("_done");
      });

      var removeElement = document.getElementById("removeElement");
      removeElement.addEventListener("click", function() {
        KanbanTest.removeElement("_test_delete");
      });

      var allEle = KanbanTest.getBoardElements("_todo");
      allEle.forEach(function(item, index) {
        //console.log(item);
      });
      </script>
@stop
