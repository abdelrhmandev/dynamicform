@php
                                                        $fillable = '';
                                                        if (count($field->FieldFillable)) {
                                                        foreach ($field->FieldFillable as $value) {
                                                        $fillable .= "<div class=\"badge py-3 px-4 fs-7 badge-light-primary mt-1\">&nbsp;" . "<span class=\"text-primary\">".$value->display."</span></div> ";
                                                        }
                                                        } else {
                                                        $fillable = "<div class=\"badge py-3 px-4 fs-7 badge-light-warning\">&nbsp;" . "<span class=\"text-warning\">لا يوجد</span></div>";
                                                        }
                                                        echo $fillable;
                                                        @endphp   