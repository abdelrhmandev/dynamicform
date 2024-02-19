<div id="kt_docs_jkanban_fixed_height" class="kanban-fixed-height scroll-y" data-kt-jkanban-height="500"></div>
<script>
    var KTJKanbanDemoFixedHeight = function() {
        var element;
        var kanbanEl;
        // Private functions
        var exampleFixedHeight = function() {
            // Get kanban height value
            const kanbanHeight = kanbanEl.getAttribute('data-kt-jkanban-height');
            // Init jKanban
            var kanban = new jKanban({
                element: element,
                gutter: '10px',
                widthBoard: '400px',                    
                boards: [{
                        'id': '_inprocess',
                        'title': 'حقول المباني المتاحه',
                        'class': 'info',
                        'item': [
                            @foreach ($avaiableFields as $field)
                            {                             
                                'class': 'text-info',
                                'id': "{{ $field->id }}",
                                'title': '<span class="fw-bold">{{ $field->label }}</span>'
                            },
                        @endforeach
                        ]
                    },{
                        'id': '_working',
                        'title': 'الحقول المرتبطه بهذه الأستمارة',
                        'class': 'success',
                        'item': [
                            @forelse ($formFields as $field)
                                {
                                    'class': 'text-info',
                                    'id': "{{ $field->id }}",
                                    'title': '<span class="fw-bold">{{ $field->label }}</span>'
                                },
                            @empty

                            {
                                'class': 'text-info',
                                'id': "0",
                                'title': '<span class="fw-bold">لم يتم أضافه حقول بعد الي الأستمارة</span>'
                            },
                        
                            @endforelse
                        ]
                    }
                ],
                // Handle item scrolling
                dropEl: function(el, target, source, sibling) {
                    if (source === target) {
                        return;
                    }
                    var field_id = (el.dataset.eid);
                    var action = (target.parentElement.getAttribute('data-id'));

                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: "{{ route('forms.saveFormfield') }}",
                        method: "POST",
                        data: {
                            form_id: '{{ $FormId }}',
                            field_id: field_id,
                            action: action,
                            // order: order_string,
                        },
                        
                        success: function(response) {
                            toastr.options = {
                                "closeButton": false,
                                "debug": false,
                                "newestOnTop": false,
                                "progressBar": false,
                                "positionClass": "toast-top-center",
                                "preventDuplicates": false,
                                "onclick": null,
                                "showDuration": "300",
                                "hideDuration": "1000",
                                "timeOut": "5000",
                                "extendedTimeOut": "1000",
                                "showEasing": "swing",
                                "hideEasing": "linear",
                                "showMethod": "fadeIn",
                                "hideMethod": "fadeOut"
                            };
                            if (response['status'] == true) {
                                toastr.success(response['msg']);
                            }  
                            else if (response['status'] == 'info') {
                                toastr.info(response['msg']);
                            } else {
                                toastr.error(response['msg']);
                            }
                        }

                    });
                },
            });
            // Set jKanban max height
            const allBoards = kanbanEl.querySelectorAll('.kanban-drag');
            allBoards.forEach(board => {
                board.style.maxHeight = kanbanHeight + 'px';
            });
        }
        const isDragging = (e) => {
            const allBoards = kanbanEl.querySelectorAll('.kanban-drag');
            allBoards.forEach(board => {
                // Get inner item element
                const dragItem = board.querySelector('.gu-transit');

                // Stop drag on inactive board
                if (!dragItem) {
                    return;
                }

                // Get jKanban drag container
                const containerRect = board.getBoundingClientRect();

                // Get inner item size
                const itemSize = dragItem.offsetHeight;

                // Get dragging element position
                const dragMirror = document.querySelector('.gu-mirror');
                const mirrorRect = dragMirror.getBoundingClientRect();

                // Calculate drag element vs jKanban container
                const topDiff = mirrorRect.top - containerRect.top;
                const bottomDiff = containerRect.bottom - mirrorRect.bottom;

                // Scroll container
                if (topDiff <= itemSize) {
                    // Scroll up if item at top of container
                    board.scroll({
                        top: board.scrollTop - 3,
                    });
                } else if (bottomDiff <= itemSize) {
                    // Scroll down if item at bottom of container
                    board.scroll({
                        top: board.scrollTop + 3,
                    });
                } else {
                    // Stop scroll if item in middle of container
                    board.scroll({
                        top: board.scrollTop,
                    });
                }
            });
        }

        return {
            // Public Functions
            init: function() {
                element = '#kt_docs_jkanban_fixed_height';
                kanbanEl = document.querySelector(element);

                exampleFixedHeight();
            }
        };
    }();

    KTUtil.onDOMContentLoaded(function() {
  
        KTJKanbanDemoFixedHeight.init();
    });

</script>    